@extends('layouts.pdf')

@section('content')

	<div class="mainContents">
		<div class="mainContentsInner">
			<div class="containerContents">
				<section class="secContents">

					<div class="containerTblUserInfo" style="max-width: 85%;">
						<div class="tblCaption">
							<h2 class="tblCaptionTitle" style="font-size: 28px; text-align:center;">製品保証書</h2>
						</div><!-- /.tblCaption -->

						<table class="tbl-Warranty">
						<tr>
							<th>型名</th><td>{{ $prodList->prod_name }}</td>
						</tr>
						<tr>
							<th>製品シリアル</th><td>{{ $prodList->prod_serial }}</td>
						</tr>
						<tr>
							<th>お買い上げ年月日</th><td>{{ substr($prodList->buy_date,0,4) }}年{{ substr($prodList->buy_date,5,2) }}月{{ substr($prodList->buy_date,8,2) }}日</td>
						</tr>
						<tr>
							<th>保証期間</th><td>お買上げ日より1年間</td>
						</tr>
						</table>
<br>
						<table class="tbl-Warranty2">
						<tr>
							<th rowspan="4" style="width:10%;">お客様</th><th  style="width:10%;">ご住所</th><td>〒 {{ $customer->zip_code }}<br>{{ $customer->address }}</td>
						</tr>
						<tr>
							<th>電話番号</th><td>{{ $customer->tel }}</td>
						</tr>
						<tr>
							<th rowspan="2" >お名前</th><td>（フリガナ）  {{ $customer->name_kana }}</td>
						</tr>
						<tr>
							<td> {{ $customer->name }}　様</td>
						</tr>
						</table>
<br>
						<table style="width: 90%;margin:auto;">
						<tr>
							<td>
								お客様の正常なご使用状態で、万一故障した場合には、無償にて修理または代替品と交換します。
								修理は、弊社ホームページのサポートページからご連絡をお願いします。メールでも受付可能です。
								修理依頼書の内容を記述の上、送信してください。
								お手数ですが、梱包はお客様にてお願いいたします。
							</td>
						</tr>
						</table>
<br>

					</div><!-- /.containerTblUserInfo -->   

				</section><!-- /.secContents -->
			</div><!-- /.containerContents -->
		 </div><!-- /.mainContentsInner -->
	</div><!-- /.mainContents -->

@endsection
