<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\clients;

class InvoiceController extends Controller
{
    //
    public function index( Request $request ){
        $clientsName = clients::clientsByName();
        $clientsItem = clients::clients();

        return view( 'pages.Invoice.index', compact(
            'clientsName',
            'clientsItem'
        ) );
    }
}
