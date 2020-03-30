
@extends('common.common')
@section('content')
<?php
/*
foreach( $clientsItem as $item ){
    var_dump( json_decode( $item->formContent ) );
}
*/
?>

    <form action="/invoice/pdf" method="post">
    {{ csrf_field() }}
    請求先：
    <select class="__invoice_company_operator" name="cmpName" id="">
        @foreach( $clientsName as $client )
            <option value="{{ $client->company_name }}">{{ $client->company_name }}</option>
        @endforeach
    </select>
    <section>
        <dl style="display:flex;">
            <dt>内容1</dt>
            <dd>
                <select class="__invoice_value_operator" name="classification1" id="">
                    <option value="業務委託料（準委任）" selected>業務委託料（準委任）</option>
                    <option value="業務委託料（請負）">業務委託料（請負）</option>
                </select>
            </dd>
            <dd>
                時間：<input class="__invoice_value_operator __invoice_unit_time" type="number" name="unit_time1" value="1" id="">
            </dd>
            <dd>
                単価：<input class="__invoice_value_operator __invoice_unit_price" type="number" name="unit_price1" value="1000" id="">
            </dd>
            <dd>
                <label>
                    <input class="__invoice_value_operator __invoice_tax" type="radio" name="tax1" value="1" id="" checked>
                    税込
                </label>
                <label>
                    <input class="__invoice_value_operator __invoice_tax" type="radio" name="tax1" value="0" id="">
                    税抜
                </label>
            </dd>
        </dl>
        <input class="__invoice_value_unitMass" type="hidden" name="unitMass1" value="1100">
    </section>
    <section data-unitmass='1100'>
        <dl style="display:flex;">
            <dt>内容2</dt>
            <dd>
                <select class="__invoice_value_operator" name="classification2" id="">
                    <option value="業務委託料（準委任）" selected>業務委託料（準委任）</option>
                    <option value="業務委託料（請負）">業務委託料（請負）</option>
                </select>
            </dd>
            <dd>
                時間：<input class="__invoice_value_operator __invoice_unit_time" type="number" name="unit_time2" value="1" id="">
            </dd>
            <dd>
                単価：<input class="__invoice_value_operator __invoice_unit_price" type="number" name="unit_price2" value="1000" id="">
            </dd>
            <dd>
                <label>
                    <input class="__invoice_value_operator __invoice_tax" type="radio" name="tax2" value="1" id="" checked>
                    税込
                </label>
                <label>
                    <input class="__invoice_value_operator __invoice_tax" type="radio" name="tax2" value="0" id="">
                    税抜
                </label>
            </dd>
        </dl>
        <input class="__invoice_value_unitMass" type="hidden" name="unitMass2" value="1100">
    </section>
    <input class="__invoice_value_totalMass" name="totalMass"  value="2200">
    <button type="submit">
        pdfを出力
    </button>
    </form>
@endsection
@section('script')
<script type="text/javascript" src="/js/invoice/invoice.js"></script>
@endsection