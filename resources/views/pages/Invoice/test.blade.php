<!DOCTYPE html>
<h1>請求書</h1>
<p>{{ $clientsItem->company_name }}　{{ $clientsItem->ceo_name }} 様<br>
{{ $clientsItem->moldPostalcode() }} {{ $clientsItem->address1 }}{{ $clientsItem->address2 }}{{ $clientsItem->address3 }}</p><br>

<br>
<h2>内容</h2>
@for( $i = 1; $i <= 2; $i ++ )
    <p>内容{{ $i }}</p>
    <p>
    区分：　{{ $requestItem[ 'classification' . $i ] }}<br>
    単価：　{{ number_format( $requestItem[ 'unit_time' . $i  ] ) }}円/時間<br>
    時間：　{{ $requestItem[ 'unit_price' . $i ] }}時間<br>
    計：　<?php if( $requestItem[ 'tax' . $i ] === '1' ){ print('税込 ');}else{ print('税抜 ');}?>{{ number_format( $requestItem[ 'unitMass' . $i ] ) }}円</p><br>
@endfor

<p>合計：　{{ number_format( $requestItem['totalMass'] ) }}円</p><br>

<p>{{ $ourCmpItem->company_name }}　{{ $ourCmpItem->ceo_name }}<br>
{{ $ourCmpItem->moldPostalcode() }} {{ $ourCmpItem->address1 }}{{ $ourCmpItem->address2 }}{{ $ourCmpItem->address3 }}</p>