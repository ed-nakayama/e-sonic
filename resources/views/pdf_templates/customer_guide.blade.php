@extends('layouts.pdf')

@section('content')

	<div class="mainContents">
		<div class="mainContentsInner">
			<div class="containerContents">
				<section class="secContents">

					<div class="containerTblUserInfo" style="max-width: 85%;">
						<div class="tblCaption">
							<h2 class="tblCaptionTitle" style="font-size: 28px; text-align:center;">お客様マイページのご案内</h2>
						</div><!-- /.tblCaption -->

						<div>
							<p>お客様の登録情報の変更、お客様がご購入した製品の基本仕様のダウンロードや修理依頼をすることができます。<br>
								<br>
								URL：https://www.e-sonic.co.jp/cust<br>
								<br>
								下記の基本情報のメールアドレス、パスワードにてログインできます。<br>
								マイページから「お客様情報変更」により登録情報の変更が可能です。<br>
								<br>
								<font color="red">※基本仕様書には、ご使用上の注意がありますので、必ずご一読ください。</font><br><br>
							</p>
						</div>
 
						<h2 style="font-size: 20px; text-align:center;">基本情報</h2>

						<table class="tblUserInfo">

							<tr>
								<th align="left" width="50%">【お客様名】</th>
							</tr>
							<tr>
								<td>{{ $customer->name }}　　（ID:{{ $customer->id }}）</td>
							</tr>

							<tr>
								<th align="left" width="50%">【住所】</th>
							</tr>
							<tr>
								<td>〒{{ $customer->zip_code }}　{{ $customer->address }} </td>
							</tr>

							<tr>
								<th align="left" width="50%">【部署】</th>
							</tr>
							<tr>
								<td>{{ $customer->unit_name }}</td>
							</tr>

							<tr>
								<th align="left" width="50%">【ご担当者】</th>
							</tr>
							<tr>
								<td>{{ $customer->person_name }}&nbsp;&nbsp;&nbsp;&nbsp;様</td>
							</tr>

							<tr>
								<th align="left" width="50%">【電話番号】</th>
							</tr>
							<tr>
								<td>{{ $customer->tel }} </td>
							</tr>

							<tr>
								<th align="left" width="50%">【メールアドレス】</th>
							</tr>
							<tr>
								<td>{{ $customer->email }}</td>
							</tr>

							<tr>
								<th align="left" width="50%">【パスワード】</th>
							</tr>
							<tr>
								<td>{{ $customer->pw_raw }}</td>
							</tr>

						</table><!-- /.tblUserInfo -->
					</div><!-- /.containerTblUserInfo -->   

				</section><!-- /.secContents -->
			</div><!-- /.containerContents -->
		 </div><!-- /.mainContentsInner -->
	</div><!-- /.mainContents -->

@endsection
