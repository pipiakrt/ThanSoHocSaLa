<?php

namespace App\Services\ThanSoHoc;

/**
 * DefinedData component
 */
class DefinedDataComponent
{

    /**
     * @param $number
     * @return array
     */
    public function definePyramidNumber($number)
    {
        $aryNumber = array();
        switch ($number) {
            case 1:
                $aryNumber = [0, 27, 54];
                break;
            case 2:
            case 11:
                $aryNumber = [0, 26, 53];
                break;
            case 3:
                $aryNumber = [0, 34, 61];
                break;
            case 4:
            case 22:
                $aryNumber = [0, 33, 60];
                break;
            case 5:
                $aryNumber = [0, 32, 59];
                break;
            case 6:
            case 33:
                $aryNumber = [0, 31, 58];
                break;
            case 7:
                $aryNumber = [0, 30, 57];
                break;
            case 8:
                $aryNumber = [0, 29, 56];
                break;
            case 9:
                $aryNumber = [0, 28, 55];
                break;
        }
        return $aryNumber;
    }
    /**
     * convert string to int
     */
    public function convertStringToInt($string)
    {
        $string = strtoupper($string);
        $number = 0;
        switch ($string) {
            case 'A':
            case 'J':
            case 'S':
                $number = 1;
                break;
            case 'B':
            case 'K':
            case 'T':
                $number = 2;
                break;
            case 'C':
            case 'L':
            case 'U':
                $number = 3;
                break;
            case 'D':
            case 'M':
            case 'V':
                $number = 4;
                break;
            case 'E':
            case 'N':
            case 'W':
                $number = 5;
                break;
            case 'F':
            case 'O':
            case 'X':
                $number = 6;
                break;
            case 'G':
            case 'P':
            case 'Y':
                $number = 7;
                break;
            case 'H':
            case 'Q':
            case 'Z':
                $number = 8;
                break;
            case 'I':
            case 'R':
                $number = 9;
                break;
        }
        return $number;
    }

    /**
     * convert accented characters
     */

    public function convertAccentedCharacters($string)
    {
        return strtr($string, array(
            'ấ' => 'a', 'ầ' => 'a', 'ẩ' => 'a', 'ẫ' => 'a', 'ậ' => 'a', 'Ấ' => 'A', 'Ầ' => 'A', 'Ẩ' => 'A', 'Ẫ' => 'A', 'Ậ' => 'A', 'ắ' => 'a', 'ằ' => 'a', 'ẳ' => 'a',
            'ẵ' => 'a', 'ặ' => 'a', 'Ắ' => 'A', 'Ằ' => 'A', 'Ẳ' => 'A', 'Ẵ' => 'A', 'Ặ' => 'A', 'á' => 'a', 'à' => 'a', 'ả' => 'a', 'ã' => 'a', 'ạ' => 'a', 'â' => 'a', 'ă' => 'a',
            'Á' => 'A', 'À' => 'A', 'Ả' => 'A', 'Ã' => 'A', 'Ạ' => 'A', 'Â' => 'A', 'Ă' => 'A',
            'ế' => 'e', 'ề' => 'e', 'ể' => 'e', 'ễ' => 'e', 'ệ' => 'e', 'Ế' => 'E', 'Ề' => 'E', 'Ể' => 'E', 'Ễ' => 'E', 'Ệ' => 'E',
            'é' => 'e', 'è' => 'e', 'ẻ' => 'e', 'ẽ' => 'e', 'ẹ' => 'e', 'ê' => 'e', 'É' => 'E', 'È' => 'E', 'Ẻ' => 'E', 'Ẽ' => 'E', 'Ẹ' => 'E', 'Ê' => 'E',
            'í' => 'i', 'ì' => 'i', 'ỉ' => 'i', 'ĩ' => 'i', 'ị' => 'i', 'Í' => 'I', 'Ì' => 'I', 'Ỉ' => 'I', 'Ĩ' => 'I', 'Ị' => 'I',
            'ố' => 'o', 'ồ' => 'o', 'ổ' => 'o', 'ỗ' => 'o', 'ộ' => 'o', 'Ố' => 'O', 'Ồ' => 'O', 'Ổ' => 'O', 'Ô' => 'O', 'Ộ' => 'O',
            'ớ' => 'o', 'ờ' => 'o', 'ở' => 'o', 'ỡ' => 'o', 'ợ' => 'o', 'Ớ' => 'O', 'Ờ' => 'O', 'Ở' => 'O', 'Ỡ' => 'O', 'Ợ' => 'O', 'ó' => 'o', 'ò' => 'o',
            'ỏ' => 'o', 'õ' => 'o', 'ọ' => 'o', 'ô' => 'o', 'ơ' => 'o', 'Ó' => 'O', 'Ò' => 'O', 'Ỏ' => 'O', 'Õ' => 'O', 'Ọ' => 'O', 'Ô' => 'O', 'Ơ' => 'O',
            'ứ' => 'u', 'ừ' => 'u', 'ử' => 'u', 'ữ' => 'u', 'ự' => 'u', 'Ứ' => 'U', 'Ừ' => 'U', 'Ử' => 'U', 'Ữ' => 'U', 'Ự' => 'U', 'ú' => 'u', 'ù' => 'u', 'ủ' => 'u', 'ũ' => 'u',
            'ụ' => 'u', 'ư' => 'u', 'Ú' => 'U', 'Ù' => 'U', 'Ủ' => 'U', 'Ũ' => 'U', 'Ụ' => 'U', 'Ư' => 'U',
            'ý' => 'y', 'ỳ' => 'y', 'ỷ' => 'y', 'ỹ' => 'y', 'ỵ' => 'y', 'Ý' => 'Y', 'Ỳ' => 'Y', 'Ỷ' => 'Y', 'Ỹ' => 'Y', 'Ỵ' => 'Y',
            'đ' => 'd', 'Đ' => 'D'
        ));
    }
}
