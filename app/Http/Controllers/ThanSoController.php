<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\ThanSo as Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Services\ThanSoHoc\UtilsComponent;
use App\Services\ThanSoHoc\DefinedDataComponent;

class ThanSoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tracuu');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ketqua(Request $request)
    {
        $dataPost = $request->only('name', 'birthday');

        $name = $dataPost['name'];
        $birthday = $dataPost['birthday'];
        if ($birthday != '') {
            $strToTime = strtotime(str_replace('/','-', $birthday));
            $birthday = date('d/m/Y', $strToTime);
            $dataPost['birthday'] = $birthday;
        }
        $utilsComponent = new UtilsComponent();
        $aryThanSo = $utilsComponent->getThanSo($name, $birthday);
        if (!empty($aryThanSo)) {
            if (!empty($aryThanSo['khuyetThieu'])) {
                foreach ($aryThanSo['khuyetThieu'] AS $khuyetThieu) {
                    $aryReturn['KHUYET_THIEU'][] = $this->getContents('KT', $khuyetThieu);
                }
            }
            $aryReturn['BIEU_DO_NANG_LUC'] = $aryThanSo['bieuDoNangLuc'];
            $aryReturn['DUONG_DOI'] = $this->getContents('DD', $aryThanSo['duongDoi']);
            $aryReturn['SU_MENH'] = $this->getContents('SM', $aryThanSo['suMenh']);
            unset($aryThanSo['thapDinhCao'][4]);
            $aryReturn['DINH_CAO'] = $aryThanSo['thapDinhCao'];
            $aryReturn['soDuongDoi'] = $aryThanSo['duongDoi'];
        }
        $data = $aryReturn;
        $params = $dataPost;
        return view('ketquatracuu', compact(['data', 'params']));
    }

    /**
     * @param $key
     * @param $chiSo
     * @return string
     */
    private function getContents($key, $chiSo)
    {
        $content = '';
        $data = Model::where('page_code', 'MP-' . $key . '-' . $chiSo)->first();
        if ($data) {
            $content = $data->page_content;
        }
        return $content;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ketquanangcao(Request $request)
    {
        $user = $request->user();
        if (!$user->birthdate) {
            return redirect('/tai-khoan')->with('error', 'Bạn hãy nhập đầy đủ thông tin!');
        }

        // get thanso
        $dataDefineComponent = new DefinedDataComponent();
        $name = $user->name;
        $buildName = $dataDefineComponent->convertAccentedCharacters($name);
        $buildNameFile = str_replace(' ', '-', $buildName);
        $birthday = Carbon::parse($user->birthdate)->format('m/d/Y');
        $dayBirth = Carbon::parse($user->birthdate)->format('m');

        $utilsComponent = new UtilsComponent();
        $aryThanSo = $utilsComponent->getThanSo($name, $birthday, false);
        // $this->contentModel = new ContentsTable();
        $aryReturn['BIEU_DO'] = [
            'NANG_LUC'  =>  $aryThanSo['bieuDoNangLuc'],
            'DINH_CAO'  =>  $aryThanSo['thapDinhCao'],
            'THACH_THUC'  =>  $aryThanSo['thapThachThuc'],
            'CHU_KY_REN_LUYEN'  =>  $aryThanSo['chuKyRenLuyen'],
            'NAM_THAN_SO'  =>  $aryThanSo['bieuDoNamThanSo']
        ];
        $aryReturn['LUAN_GIAI'] = [
            'DINH_CAO'  =>  [],
            'THACH_THUC'  =>  [],
            'CHU_KY_REN_LUYEN'  =>  [],
            'NAM_THAN_SO'  =>  []
        ];
        foreach ($aryThanSo['thapDinhCao'][4] as $dinhCao) {
            $aryReturn['LUAN_GIAI']['DINH_CAO'][] = $this->getContentCS('TDC', $dinhCao);
        }
        foreach ($aryThanSo['thapThachThuc'][4] as $tThachThuc) {
            $aryReturn['LUAN_GIAI']['THACH_THUC'][] = $this->getContentCS('TTT', $tThachThuc);
        }
        $aryReturn['LUAN_GIAI']['CHU_KY_REN_LUYEN'][] = '- Chu kỳ 1: 0-' . $aryThanSo['chuKyRenLuyen'][3][1] . ' tuổi: ' . $this->getContentCS('RLDD', $aryThanSo['chuKyRenLuyen'][0]);
        $aryReturn['LUAN_GIAI']['CHU_KY_REN_LUYEN'][] = '- Chu kỳ 2: ' . ($aryThanSo['chuKyRenLuyen'][3][1] + 1) . '-' . $aryThanSo['chuKyRenLuyen'][3][2] . ' tuổi: ' . $this->getContentCS('RLDD', $aryThanSo['chuKyRenLuyen'][1]);
        $aryReturn['LUAN_GIAI']['CHU_KY_REN_LUYEN'][] = '- Chu kỳ 3: ' . $aryThanSo['chuKyRenLuyen'][3][2] . '++ tuổi: ' . $this->getContentCS('RLDD', $aryThanSo['chuKyRenLuyen'][2]);

        $flipNamThanSo = array_flip($aryThanSo['bieuDoNamThanSo']);
        $dinhNam_1 = $flipNamThanSo[date('Y')] + 1;
        $dinhNam_2 = $dinhNam_1 + 1;
        if ($dinhNam_2 > 9) {
            $dinhNam_2 = 1;
        }
        $dinhNam_3 = $dinhNam_2 + 1;
        if ($dinhNam_3 > 9) {
            $dinhNam_3 = 1;
        }
        $firstYear = $aryThanSo['bieuDoNamThanSo'][$dinhNam_1 - 1];
        $aryReturn['LUAN_GIAI']['NAM_THAN_SO'][] = '- Năm ' . $firstYear . ': ' . $this->getContentCS('NTS', $dinhNam_1);
        $aryReturn['LUAN_GIAI']['NAM_THAN_SO'][] = '- Năm ' . ($firstYear + 1) . ': ' . $this->getContentCS('NTS', $dinhNam_2);
        $aryReturn['LUAN_GIAI']['NAM_THAN_SO'][] = '- Năm ' . ($firstYear + 2) . ': ' . $this->getContentCS('NTS', $dinhNam_3);
        // Tam hon
        $aryReturn['TAM_HON'] = $this->getContentCS('TH', $aryThanSo['tamHon']);
        // Nhan cach
        $aryReturn['NHAN_CACH'] = $this->getContentCS('NC', $aryThanSo['nhanCach']);
        $aryReturn['CAN_BANG_TH_NC'] = $this->getContentCS('CTN', $aryThanSo['canBangTamHonNhanCach']);
        $aryReturn['PHAN_UNG'] = $this->getContentCS('PU', $aryThanSo['phanUng']);
        $aryReturn['NGAY_SINH'] = $this->getContentCS('NGS', $aryThanSo['ngaySinh']);
        $aryReturn['CAN_BANG'] = $this->getContentCS('CB', $aryThanSo['canBang']);
        if (!empty($aryThanSo['khuyetThieu'])) {
            foreach ($aryThanSo['khuyetThieu'] as $khuyetThieu) {
                $aryReturn['KHUYET_THIEU'][] = $this->getContentCS('KT', $khuyetThieu);
            }
        }
        if (!empty($aryThanSo['chiSoLap'])) {
            foreach ($aryThanSo['chiSoLap'] as $chiSoLap) {
                $aryReturn['CHI_SO_LAP'][] = $this->getContentCS('CL', $chiSoLap);
            }
        }
        $aryReturn['THACH_THUC'] = [];
        if (!empty($aryThanSo['thachThuc'])) {
            foreach ($aryThanSo['thachThuc'] as $thachThuc) {
                $aryReturn['THACH_THUC'][] = $this->getContentCS('TT', $thachThuc);
            }
        }
        $aryReturn['DUONG_DOI'] = $this->getContentCS('DD', $aryThanSo['duongDoi']);
        $aryReturn['soDuongDoi'] = $aryThanSo['duongDoi'];
        $aryReturn['SU_MENH'] = $this->getContentCS('SM', $aryThanSo['suMenh']);
        $aryReturn['CAN_BANG_DD_SM'] = $this->getContentCS('CDS', $aryThanSo['canBangDuongDoiSuMenh']);
        $aryReturn['TRUONG_THANH'] = $this->getContentCS('TRT', $aryThanSo['truongThanh']);
        $data = $aryReturn;
        return view('ketquatracuunangcao', compact(['data', 'user']));
    }

    private function getContentCS($key, $chiSo)
    {
        $content = '';
        $data = Model::where('page_code', 'CS-' . $key . '-' . $chiSo)->first();
        if ($data) {
            $content = $data->page_content;
        }
        return $content;
    }
}
