<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PdfController extends Controller
{
    //
    public function index( Request $request ){
        $pdf = \PDF::loadView('pages.pdf.pdf_temp');
        return $pdf->inline('thisis.pdf');
    }
}

// こちら参照 https://qiita.com/ats05/items/cbb2956727cad2681d1d