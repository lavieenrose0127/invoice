<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\clients;
use App\Models\our_company;

class PdfController extends Controller
{
    //
    public function invoice_pdf( Request $request ){
        $clientsItem = clients::clientsByCmpName( $request->input('cmpName') )->first();
        $requestItem = $request->input();
        $ourCmpItem = our_company::our_company()->first();

        //　入力内容保存
        clients::addJsonformContent($requestItem);

        // Pdf出力
        $pdf = \PDF::loadView( 'pages.pdf.pdf_temp' , [
            'clientsItem' => $clientsItem ,
            'requestItem' => $requestItem ,
            'ourCmpItem' => $ourCmpItem ,
            ] )
            ->setOption('encoding', 'utf-8');
        
        return $pdf->inline('thisis.pdf');
    }

}

// こちら参照 https://qiita.com/ats05/items/cbb2956727cad2681d1d