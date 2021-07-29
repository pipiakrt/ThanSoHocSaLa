<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class pdfController extends Controller
{
    public function index()
    {
    	$pdf = PDF::loadView('pdf');
        $pdf->setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        return $pdf->download('invoice.pdf');
    }
}
