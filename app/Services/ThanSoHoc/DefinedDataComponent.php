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
            '???' => 'a', '???' => 'a', '???' => 'a', '???' => 'a', '???' => 'a', '???' => 'A', '???' => 'A', '???' => 'A', '???' => 'A', '???' => 'A', '???' => 'a', '???' => 'a', '???' => 'a',
            '???' => 'a', '???' => 'a', '???' => 'A', '???' => 'A', '???' => 'A', '???' => 'A', '???' => 'A', '??' => 'a', '??' => 'a', '???' => 'a', '??' => 'a', '???' => 'a', '??' => 'a', '??' => 'a',
            '??' => 'A', '??' => 'A', '???' => 'A', '??' => 'A', '???' => 'A', '??' => 'A', '??' => 'A',
            '???' => 'e', '???' => 'e', '???' => 'e', '???' => 'e', '???' => 'e', '???' => 'E', '???' => 'E', '???' => 'E', '???' => 'E', '???' => 'E',
            '??' => 'e', '??' => 'e', '???' => 'e', '???' => 'e', '???' => 'e', '??' => 'e', '??' => 'E', '??' => 'E', '???' => 'E', '???' => 'E', '???' => 'E', '??' => 'E',
            '??' => 'i', '??' => 'i', '???' => 'i', '??' => 'i', '???' => 'i', '??' => 'I', '??' => 'I', '???' => 'I', '??' => 'I', '???' => 'I',
            '???' => 'o', '???' => 'o', '???' => 'o', '???' => 'o', '???' => 'o', '???' => 'O', '???' => 'O', '???' => 'O', '??' => 'O', '???' => 'O',
            '???' => 'o', '???' => 'o', '???' => 'o', '???' => 'o', '???' => 'o', '???' => 'O', '???' => 'O', '???' => 'O', '???' => 'O', '???' => 'O', '??' => 'o', '??' => 'o',
            '???' => 'o', '??' => 'o', '???' => 'o', '??' => 'o', '??' => 'o', '??' => 'O', '??' => 'O', '???' => 'O', '??' => 'O', '???' => 'O', '??' => 'O', '??' => 'O',
            '???' => 'u', '???' => 'u', '???' => 'u', '???' => 'u', '???' => 'u', '???' => 'U', '???' => 'U', '???' => 'U', '???' => 'U', '???' => 'U', '??' => 'u', '??' => 'u', '???' => 'u', '??' => 'u',
            '???' => 'u', '??' => 'u', '??' => 'U', '??' => 'U', '???' => 'U', '??' => 'U', '???' => 'U', '??' => 'U',
            '??' => 'y', '???' => 'y', '???' => 'y', '???' => 'y', '???' => 'y', '??' => 'Y', '???' => 'Y', '???' => 'Y', '???' => 'Y', '???' => 'Y',
            '??' => 'd', '??' => 'D'
        ));
    }
}
