<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\TraCuu;
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
    public function formnangcao()
    {
        return view('formnangcao');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {
        $ketqua = TraCuu::where(['code' => $code, 'type' => 0])->first();
        if ($ketqua) {
            $data = $ketqua->data;
            $params = [
                'link' => "https://thansohocsala.com/tra-cuu/$ketqua->code",
                'name' => $ketqua->name,
                'address' => $ketqua->address,
                'birthday' => $ketqua->birthdate
            ];
            return view('ketquatracuu', compact(['data', 'params']));
        }
        return view('errors.404');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function guimail(Request $request)
    {
        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ketqua(Request $request)
    {
        $dataPost = $request->only('name', 'birthday', 'email', 'phone', 'address');

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

        $tracuu = TraCuu::create([
            'code' => Str::random(60),
            'data' => $data,
            'birthdate' => $dataPost['birthday'],
            'name' => $dataPost['name'],
            'email' => $dataPost['email'],
            'phone' => $dataPost['phone'],
            'address' => $dataPost['address'],
        ]);

        return redirect("/tra-cuu/$tracuu->code");
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
