<?php

namespace App\Http\Controllers;

use App\Models\ThanSo as Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Services\ThanSoHoc\UtilsComponent;

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
        return Model::where('page_code', 'MP-' . $key . '-' . $chiSo)->first();
    }

}
