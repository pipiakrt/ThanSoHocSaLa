<?php

namespace App\Services\ThanSoHoc;

// use App\Utility\Upload;

/**
 * Common component
 */
class UtilsComponent
{

    /**
     * get base url
     * @return mixed
     */
    public function getBaseUrl()
    {
        return 'http://' . $_SERVER['HTTP_HOST'] . '/';
    }

    public function getUniqRandomId($head = '')
    {
        $random = $this->makePassword(8);
        $id = uniqid($head);
        return $id . $random;
    }

    /**
     *
     * @param integer $pwLength
     */
    public function makePassword($pwLength)
    {
        srand((float)microtime() * 54234853);
        $character = 'abcdefghkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ2345679';
        $pw = preg_split('//', $character, 0, PREG_SPLIT_NO_EMPTY);
        $password = '';
        for ($i = 0; $i < $pwLength; $i++) {
            $password .= $pw[array_rand($pw, 1)];
        }
        return $password;
    }

    /**
     * validate email
     *
     * @param string $email
     * @return boolean
     */
    public static function isEmail($email)
    {
        return (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email)) ? FALSE : TRUE;
    }

    /**
     * contains two array
     *
     * @param string|array $searchAry
     * @param array $aryAll
     * @return boolean
     */
    public function containsArray($searchAry, $aryAll)
    {
        if (!is_array($searchAry)) {
            return false;
        }
        return !array_diff($searchAry, $aryAll);
    }

    /**
     * validate date with format yyyy-mm-dd
     *
     * @param string $date
     * @return bool
     */
    public function validateDate($date)
    {
        if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $date)) {
            return true;
        }
        return false;
    }

    /**
     * upload image
     *
     * @param unknown $itemFile
     * @param string $itemName
     * @return boolean[]|string[]|boolean[]|unknown[]
     */
    public function uploadImage($itemFile, $savePath, $itemName = 'images')
    {
        $timeCurrent = date('Y') . date('m');
        if (!file_exists($savePath . $timeCurrent)) {
            mkdir($savePath . $timeCurrent, 0777, true);
            chmod($savePath . $timeCurrent, 0777);
        }
        if ($itemFile['name'] != '') {
            $config = array();
            $config['upload_path'] = $savePath . $timeCurrent;
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|GIF|PNG|JPEG';
            $config['max_size'] = '10240';
            $config['overwrite'] = 'true';
            $x = explode('.', $itemFile['name']);
            $imageName = time() . '_' . str_replace('  ', '', str_replace("'", "", $x[0])) . '.' . end($x);
            $config['file_name'] = $imageName;

            $uploadLib = new Upload($config);
            $res = $uploadLib->do_upload($itemName);
            if ($res === true)
                return [

                    'result' => true,
                    'image_name' => $timeCurrent . DS . $uploadLib->file_name
                ];
            else
                return [

                    'result' => false,
                    'message' => $res
                ];;
        }
    }

    /**
     * @param $number
     * @return int
     */
    public function convertToInt($number)
    {
        $number = str_replace(',', '', $number);
        // $number = str_replace('.','', $number);
        return (float)$number;
    }

    /**
     * Get than so from name birthday
     * @param $name
     * @param $birthday
     * @param bool $isFree
     * @return array
     */
    public function getThanSo($name, $birthday, $isFree = true)
    {
        if ($birthday == '' || $name == '') {
            return [];
        }
        // convert birthday
        $newBirthDay = str_replace('-', '/', $birthday);
        $aryBirthDay = explode('/', $newBirthDay);
        $chiaten = explode(' ', $name);
        if (sizeof($aryBirthDay) != 3) {
            return [];
        }
        $NgayS = $this->convertNumber($aryBirthDay[0], false);
        $ThangS = $this->convertNumber($aryBirthDay[1], false);
        $NamS = $this->convertNumber($aryBirthDay[2], false);

        $aryBirthDayNumber = $this->getNumberFromBirthday($newBirthDay);
        // convert name
        list($aryVowel, $aryNoVowel, $aryNameToNumber) = $this->convertName($name);
        // run compact
        $totalBirthday = $this->convertNumber($NgayS) + $this->convertNumber($ThangS) + $this->convertNumber($NamS);
        $duongDoiNoCompact = $this->convertNumber($totalBirthday, false);
        $duongDoi = $this->convertNumber($totalBirthday);
        $suMenhNoCompact = 0;
        $aryNameNumber = [];
        foreach ($aryNameToNumber AS $aryNameVowel) {
            foreach ($aryNameVowel AS $i) {
                $aryNameNumber[] = $i;
            }
            $suMenhNoCompact += array_sum($aryNameVowel);
        }
        $suMenh = $this->convertNumberSM($suMenhNoCompact);
        $tamHonNoCompact = array_sum($aryVowel);
        $tamHon = $this->convertNumberGoc(array_sum($aryVowel));

        $suMenhNoCompact2 = 0;
        foreach ($chiaten as $namec) {
            list($arr, $arr2, $arr3) = $this->convertName2($namec);
            $suMenhNoCompact2 += $this->convertNumberGoc(array_sum($arr3));
        }

        $nhanCachNoCompact = 0;
        foreach ($chiaten as $namec) {
            list($arr, $arr2, $arr3) = $this->convertName($namec);
            $nhanCachNoCompact += $this->convertNumberGoc(array_sum($arr2));
        }
        $nhanCach = $this->convertNumberGoc(array_sum($aryNoVowel));
        //
        $khuyetThieu = $this->getKhuyetThieu($aryVowel, $aryNoVowel, $duongDoi, $suMenh, $tamHon, $nhanCach);
        $thapDinhCao = $this->getKimTuThap($this->convertNumber($NgayS), $this->convertNumber($ThangS), $this->convertNumber($NamS), $duongDoi);
        if ($isFree) {
            return [
                'duongDoi'  =>  $duongDoi,
                'suMenh'    =>  $suMenh,
                'khuyetThieu'   =>  $khuyetThieu,
                'bieuDoNangLuc' =>  [
                    $aryNameNumber,
                    $aryBirthDayNumber
                ],
                'thapDinhCao' => $thapDinhCao
            ];
        }
        $thachThuc = $this->getThachThuc($totalBirthday, $suMenhNoCompact2, $tamHonNoCompact, $nhanCachNoCompact);
        $canBangDuongDoiSuMenh = $this->convertNumberGoc($this->convertNumberNegative($this->convertNumberGoc($duongDoi) -  $this->convertNumberGoc($suMenh)));
        $truongThanh = $this->convertNumberGoc($duongDoi + $suMenh);
        $canBangTamHonNhanCach = $this->convertNumberGoc($this->convertNumberNegative($this->convertNumberGoc($tamHon) - $this->convertNumberGoc($nhanCach)));
        $phanUng = $this->convertNumberGoc($this->convertNumberGoc($NgayS) + $this->convertNumberGoc($ThangS));
        $ngaySinh = $this->convertNumber($NgayS);
        // $canBang = $this->convertNumber($this->getFirstKeyWordInName($name));
        $canBang = $this->convertNumberGoc(collect($this->getFirstKeyWordInName($name))->sum());

        $thapThachThuc = $this->getThapThachThuc($this->convertNumber($NgayS), $this->convertNumber($ThangS), $this->convertNumber($NamS), $duongDoi);
        $chuKyRenLuyenDuongDoi = $this->getChuKyRenLuyenDuongDoi($this->convertNumber($ThangS), $this->convertNumber($NgayS), $this->convertNumber($NamS),$duongDoi);
        $bieuDoNamThanSo = $this->getNamThanSo($this->convertNumber($NgayS), $this->convertNumber($ThangS));
        $chiSoLap = $this->getChiSoLap($duongDoi, $suMenh, $tamHon, $nhanCach);
        return [
            'tamHon'    =>  $tamHon,
            'nhanCach'  =>  $nhanCach,
            'canBangTamHonNhanCach'  =>  $canBangTamHonNhanCach,
            'phanUng'   =>  $phanUng,
            'ngaySinh'  =>  $ngaySinh,
            'canBang'   =>  $canBang,
            'khuyetThieu'   =>  $khuyetThieu,
            'thachThuc' =>  $thachThuc,
            'chiSoLap'  =>  $chiSoLap,
            'duongDoi'  =>  $duongDoi,
            'suMenh'    =>  $suMenh,
            'canBangDuongDoiSuMenh'    =>  $canBangDuongDoiSuMenh,
            'truongThanh'   =>  $truongThanh,
            'bieuDoNangLuc' =>  [
                $aryNameNumber,
                $aryBirthDayNumber
            ],
            'thapDinhCao'   =>  $thapDinhCao,
            'thapThachThuc' =>  $thapThachThuc,
            'chuKyRenLuyen' =>  $chuKyRenLuyenDuongDoi,
            'bieuDoNamThanSo'   =>  $bieuDoNamThanSo
        ];
    }
    private function getNumberFromBirthday($birthday)
    {
        $birthday = str_replace('/','', $birthday);
        return str_split($birthday);

    }
    /**
     * @param $NgaySinh
     * @param $ThangSinh
     * @return array
     */
    private function getNamThanSo($NgaySinh, $ThangSinh)
    {
        $currentYear = date('Y');
        $namThanSo = $this->convertNumberGoc($NgaySinh + $ThangSinh + $this->convertNumberGoc($currentYear));
        $aryYear = array();
        $startYear = $currentYear - $namThanSo + 1;
        $endYear = $currentYear - $namThanSo + 9;
        for($i = $startYear; $i <= $endYear; $i++){
            $aryYear[] = $i;
        }
        return $aryYear;
    }
    /**
     * @param $chiSoDuongDoi
     * @return array
     */
    private function getChuKyRenLuyenDuongDoi ($NgaySinh, $ThangSinh, $NamSinh, $chiSoDuongDoi)
    {
        $defineDataComponent = new DefinedDataComponent();
        return [
            $NgaySinh,
            $ThangSinh,
            $NamSinh,
            $defineDataComponent->definePyramidNumber($chiSoDuongDoi)
        ];
    }
    /**
     * @param $duongDoi
     * @param $suMenh
     * @param $tamHon
     * @param $nhanCach
     * @return array
     */
    private function getChiSoLap ($duongDoi, $suMenh, $tamHon, $nhanCach)
    {
        $array = [$duongDoi, $suMenh, $tamHon, $nhanCach];
        $aryChiSoLap = array_unique( array_diff_assoc( $array, array_unique( $array ) ) );
        return array_values($aryChiSoLap);
    }
    /**
     * @param $duongDoiNoCompact
     * @param $suMenhNoCompact
     * @param $tamHonNoCompact
     * @param $nhanCachNoCompact
     * @return array
     */
    private function getThachThuc($duongDoiNoCompact, $suMenhNoCompact, $tamHonNoCompact, $nhanCachNoCompact)
    {
        $aryThachThucDefine = ['13-4', '14-5', '16-7', '19-1'];
        $aryThachThuc = [];
        if (in_array($this->convertThachThuc($duongDoiNoCompact).'-'.$this->convertNumberGoc($duongDoiNoCompact), $aryThachThucDefine)) {
            $aryThachThuc[] = $this->convertThachThuc($duongDoiNoCompact).'-'.$this->convertNumberGoc($duongDoiNoCompact);
        }
        if (in_array($this->convertThachThuc($suMenhNoCompact).'-'.$this->convertNumberGoc($suMenhNoCompact), $aryThachThucDefine)) {
            $aryThachThuc[] = $this->convertThachThuc($suMenhNoCompact).'-'.$this->convertNumberGoc($suMenhNoCompact);
        }
        if (in_array($this->convertThachThuc($tamHonNoCompact).'-'.$this->convertNumberGoc($tamHonNoCompact), $aryThachThucDefine)) {
            $aryThachThuc[] = $this->convertThachThuc($tamHonNoCompact).'-'.$this->convertNumberGoc($tamHonNoCompact);
        }
        if (in_array($this->convertThachThuc($nhanCachNoCompact).'-'.$this->convertNumberGoc($nhanCachNoCompact), $aryThachThucDefine)) {
            $aryThachThuc[] = $this->convertThachThuc($nhanCachNoCompact).'-'.$this->convertNumberGoc($nhanCachNoCompact);
        }
        return array_unique($aryThachThuc);
    }
    /**
     * @param $aryVowel
     * @param $aryNoVowel
     * @return array|null
     */
    private function getKhuyetThieu($aryVowel, $aryNoVowel, $duongDoi, $sumenh, $tamHon, $nhanCach)
    {
        $aryReturn = array_flip([1, 2, 3, 4, 5, 6, 7, 8, 9]);
        foreach ($aryVowel AS $item) {
            if (isset($aryReturn[$item])) {
                unset($aryReturn[$item]);
            }
        }
        foreach ($aryNoVowel AS $item) {
            if (isset($aryReturn[$item])) {
                unset($aryReturn[$item]);
            }
        }
        unset($aryReturn[$duongDoi]);
        unset($aryReturn[$sumenh]);
        unset($aryReturn[$tamHon]);
        unset($aryReturn[$nhanCach]);
        return array_keys($aryReturn);
    }

    /**
     * @param $name
     * @return array
     */
    private function getFirstKeyWordInName($name)
    {
        $aryReturn = [];
        $dataDefineComponent = new DefinedDataComponent();
        // convert name
        $name = $dataDefineComponent->convertAccentedCharacters($name);
        $aryName = explode(' ', $name);
        foreach ($aryName AS $itemName) {
            if ($itemName != '') {
                $aryItem = str_split($itemName);
                $aryReturn[] = $dataDefineComponent->convertStringToInt($aryItem[0]);
            }
        }
        return $aryReturn;
    }

    /**
     * @param $name
     * @return array
     */
    private function convertName($name)
    {
        $dataDefineComponent = new DefinedDataComponent();
        // convert name
        $name = $dataDefineComponent->convertAccentedCharacters($name);
        $aryNameFull = explode(' ', $name);
        // get nguyen am
        $aryVowel = array();
        $aryNoVowel = array();
        $aryNameToNumber = array();
        foreach ($aryNameFull AS $itemName) {
            $aryName = str_split($itemName);
            foreach ($aryName as $key => $char) {
                $stringToInt = $dataDefineComponent->convertStringToInt($char);
                if ($this->checkIsVowel($char, $key, $aryName)) {
                    $aryVowel[] = $stringToInt;
                } else {
                    $aryNoVowel[] = $stringToInt;
                }
                $aryNameToNumber[$key][] = $stringToInt;
            }
        }
        return [$aryVowel, $aryNoVowel, $aryNameToNumber];
    }

    /**
     * @param $name
     * @return array
     */
    private function convertName2($name)
    {
        $dataDefineComponent = new DefinedDataComponent();
        // convert name
        $name = $dataDefineComponent->convertAccentedCharacters($name);
        $aryNameFull = explode(' ', $name);
        // get nguyen am
        $aryVowel = array();
        $aryNoVowel = array();
        $aryNameToNumber = array();
        foreach ($aryNameFull AS $itemName) {
            $aryName = str_split($itemName);
            foreach ($aryName as $key => $char) {
                $stringToInt = $dataDefineComponent->convertStringToInt($char);
                if ($this->checkIsVowel($char, $key, $aryName)) {
                    $aryVowel[] = $stringToInt;
                } else {
                    $aryNoVowel[] = $stringToInt;
                }
                $aryNameToNumber[] = $stringToInt;
            }
        }
        return [$aryVowel, $aryNoVowel, $aryNameToNumber];
    }

    /**
     * @param $soTD
     * @return array
     */
    public function drawLuanGiai($soTD)
    {
        $currentYear = date('Y');
        $number = $this->convertNumberLuanGiai($currentYear, $soTD);
        $aryYear = array();
        $startYear = $currentYear - $number + 1;
        $endYear = $currentYear - $number + 10;
        $yearTQ = $k = 1;
        for ($i = $startYear; $i <= $endYear; $i++) {
            if ($currentYear == $i) {
                $yearTQ = $k;
            }
            $aryYear[] = $i;
            ++$k;
        }
        if ($yearTQ == 10)
            $yearTQ = 1;
        return [$yearTQ, $aryYear];
    }

    /**
     * @param $NgaySinh
     * @param $ThangSinh
     * @param $NamSinh
     * @param $duongDoi
     * @return array
     */
    private function getThapThachThuc ($NgaySinh, $ThangSinh, $NamSinh, $duongDoi)
    {
        list($gd_tuoi_1, $gd_tuoi_2, $gd_tuoi_3, $gd_tuoi_4) = $this->getGiaiDoanTuoi($duongDoi);
        $dinh_1 = $this->convertNumberNegative($this->convertNumberThapTT($ThangSinh) - $this->convertNumberThapTT($NgaySinh));
        $dinh_2 = $this->convertNumberNegative($this->convertNumberThapTT($NgaySinh) - $this->convertNumberThapTT($NamSinh));
        $dinh_3 = $this->convertNumberNegative($dinh_1 - $dinh_2);
        $dinh_4 = $this->convertNumberNegative($this->convertNumberThapTT($ThangSinh) - $this->convertNumberThapTT($NamSinh));
        $ThangSinh = $this->convertNumberThapTT($ThangSinh);
        $NgaySinh = $this->convertNumberThapTT($NgaySinh);
        $NamSinh = $this->convertNumberThapTT($NamSinh);
        $dinh_1 = $this->convertNumberThapTT($dinh_1);
        $dinh_2 = $this->convertNumberThapTT($dinh_2);
        return [
            [$ThangSinh, $NgaySinh, $NamSinh, $gd_tuoi_1, $gd_tuoi_2],
            [$dinh_1, $dinh_2, $gd_tuoi_3],
            [$dinh_3, $gd_tuoi_4],
            [$dinh_4],
            [$dinh_1, $dinh_2, $dinh_3, $dinh_4]
        ];
    }
    /**
     * @param $aryBirthDay
     * @param $chisoCD
     * @return array
     */
    private function getKimTuThap($NgaySinh, $ThangSinh, $NamSinh, $duongDoi)
    {
        if ($NgaySinh == 11) {
            $NgaySinh = 2;
        }
        if ($NgaySinh == 22) {
            $NgaySinh = 4;
        }
        if ($ThangSinh == 11) {
            $ThangSinh = 2;
        }
        if ($ThangSinh == 22) {
            $ThangSinh = 4;
        }
        if ($NamSinh == 11) {
            $NamSinh = 2;
        }
        if ($NamSinh == 22) {
            $NamSinh = 4;
        }
        list($gd_tuoi_1, $gd_tuoi_2, $gd_tuoi_3, $gd_tuoi_4) = $this->getGiaiDoanTuoi($duongDoi);

        $level_1 = array($ThangSinh, $NgaySinh, $NamSinh, $gd_tuoi_1, $gd_tuoi_2);
        // build level 2
        $Dinh_1 = $this->convertNumberGoc($NgaySinh + $ThangSinh);
        $Dinh_2 = $this->convertNumberGoc($NgaySinh + $NamSinh);
        $level_2 = array($Dinh_1, $Dinh_2, $gd_tuoi_3);
        // build level 3
        $Dinh_3 = $this->convertNumber($this->convertNumberByPyramid($Dinh_1 + $Dinh_2));
        $level_3 = array($Dinh_3, $gd_tuoi_4);
        // build level 4
        $Dinh_4 = $this->convertNumberByPyramid($ThangSinh + $NamSinh);
        $level_4 = array($Dinh_4);
        return [
            $level_1,
            $level_2,
            $level_3,
            $level_4,
            [$Dinh_1, $Dinh_2, $Dinh_3, $Dinh_4]
        ];
    }

    private function getGiaiDoanTuoi($duongDoi)
    {
        // build level 1
        $gd_tuoi_1 = 36 - $duongDoi;
        $gd_tuoi_2 = $gd_tuoi_1 + 9;
        $gd_tuoi_3 = $gd_tuoi_2 + 9;
        $gd_tuoi_4 = $gd_tuoi_3 + 9;
        return [$gd_tuoi_1, $gd_tuoi_2, $gd_tuoi_3, $gd_tuoi_4];
    }

    /**
     * String is convert to accented charcters and is uppercase
     */
    public function checkIsVowel($string, $possition, $aryStrings)
    {
        $string = strtoupper($string);
        $aryVowel = array('A', 'E', 'I', 'O', 'U');
        if (in_array($string, $aryVowel)) {
            return true;
        }
        if ($string == 'Y') {
            if ($possition == 0 || (($possition + 1) == sizeof($aryStrings))) {
                return true;
            }
            /*if (isset($aryStrings[$possition]) && strtoupper($aryStrings[$possition]) == $string && sizeof($aryStrings) > 1) {
                $prev_pos = $possition - 1;
                $total = 0;
                if ($prev_pos < 0) {
                    $total += 1;
                } elseif (!in_array(strtoupper($aryStrings[$prev_pos]), $aryVowel)) {
                    $total += 1;
                }
                $next_pos = $possition + 1;
                if ($next_pos >= sizeof($aryStrings)) {
                    $total += 1;
                } elseif (!in_array(strtoupper($aryStrings[$next_pos]), $aryVowel)) {
                    $total += 1;
                }
                if ($total == 2) {
                    return true;
                }
            }*/
        }
        return false;
    }

    public function convertNumberLuanGiai($year, $chiSoCD = 0)
    {
        $number = (int)$year;
        $aryNumber = str_split($number);
        $total = $chiSoCD + array_sum($aryNumber);
        /*foreach ($aryNumber as $item) {
            $total += $item;
        }*/
        if ($total < 11) {
            return $total;
        }
        return $this->convertNumberLuanGiai($total, 0);
    }


    public function convertNumberGoc($number)
    {
        $number = (int) $number;
        if ($number < 10) {
            return $number;
        }
        $aryNumber = str_split($number);
        $total = array_sum($aryNumber);
        return $this->convertNumberGoc($total);
    }

    public function convertNumberSM($number)
    {
        $number = (int) $number;
        if ($number < 10) {
            return $number;
        }
        if ($number == 11) {
            return $number;
        }
        $aryNumber = str_split($number);
        $total = array_sum($aryNumber);
        return $this->convertNumberSM($total);
    }

    public function convertNumber($number, $isCompact = true, $isSpecial = false)
    {
        $number = (int)$number;
        if ($number < 10) {
            return $number;
        }
        if ($number == 11) {
            return $number;
        }
        if ($number == 22) {
            return $number;
        }
        $aryNumber = str_split($number);
        $total = array_sum($aryNumber);
        /*foreach ($aryNumber as $item) {
            $total += $item;
        }*/
        if ($isSpecial && in_array($total, [11, 22])) {
            return $total;
        }
        if ($isCompact)
            return $this->convertNumber($total, $isCompact, $isSpecial);
        return $total;
    }

    public function convertThachThuc($number, $isCompact = true, $isSpecial = false)
    {
        $number = (int)$number;
        if ($number < 10 || $number == 13 || $number == 14 || $number == 16 || $number == 19) {
            return $number;
        }

        $aryNumber = str_split($number);
        $total = array_sum($aryNumber);

        if ($isCompact)
            return $this->convertThachThuc($total, $isCompact, $isSpecial);
        return $total;
    }


    public function convertNumberThapTT($number, $isCompact = true, $isSpecial = false)
    {
        $number = (int)$number;
        if ($number < 10) {
            return $number;
        }

        $aryNumber = str_split($number);
        $total = array_sum($aryNumber);

        if ($isCompact)
            return $this->convertNumberThapTT($total, $isCompact);
        return $total;
    }

    public function convertNumberByPyramid($number)
    {
        $number = (int)$number;
        if ($number < 10 || in_array($number, [10, 11])) {
            return $number;
        }
        $aryNumber = str_split($number);
        $total = array_sum($aryNumber);
        /*foreach ($aryNumber as $item) {
            $total += $item;
        }*/
        return $this->convertNumberByPyramid($total);
    }

    /**
     * @param $number
     * @return float|int
     */
    private function convertNumberNegative($number)
    {
        if ($number >= 0) {
            return $number;
        }
        return -1 * $number;
    }
}
