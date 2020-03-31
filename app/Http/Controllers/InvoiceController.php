<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

use App\Models\clients;

class InvoiceController extends Controller
{
    /**
     * スペースやインデントに関してはPSR-2に準拠すると吉
     * http://www.infiniteloop.co.jp/docs/psr/psr-2-coding-style-guide.html
     */

    public function index(Request $request){
        // 1. $dataとかにまとめたほうが冗長にならないで済む
        // 2. 変数名はスネークケース $clientsName => $clients_name 今回は$data[$var]
        // 4. 変数名にもう少し意味を持たせる。

        // 現状のソースをそのまま表現するならこう書くかなあ・・・
        $data['clients_searched_by_name'] = Client::nameIs('company_name_hogehoge')->get();
        $data['clients'] = Client::all();

        return view( 'pages.Invoice.index', $data);
    }
}
