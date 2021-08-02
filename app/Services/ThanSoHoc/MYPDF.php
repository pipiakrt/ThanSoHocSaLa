<?php

namespace App\Services\ThanSoHoc;



class MYPDF extends \TCPDF {



    //Page header

    public function Header() {

        $this->SetTextColor(0, 0, 0, 50);

        $this->SetFont('dejavusans', 'I', 10);

        $this->Cell(0, 10, 'Học viện cổ học SaLa', 0, false, 'L', 0, '', 0, false);

    }



    // Page footer

    public function Footer() {

        $this->SetY(-15);

        $this->SetFont('dejavusans', 'I', 8);

        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');

    }

}

?>
