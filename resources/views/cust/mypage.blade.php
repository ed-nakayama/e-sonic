@extends('layouts.cust')
<head>
    <title>マイページ | {{ config('app.name', 'Laravel') }}</title>
	<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>

@section('content')

	<div class="mainContentsInner-oneColumn">

		<div style="display:flex;justify-content: space-between;">
			<div class="mainTtl title-main">
				<h2>マイページ</h2>
			</div><!-- /.mainTtl -->
			<div style="text-align: right;margin-bottom: 10px;">
				<a href="/cust/mypage/edit" class="squareBtn" style="width: 140px;height: 30px;padding: 5px 0;">お客様情報変更</a>
			</div>
			<div style="text-align: right;margin-bottom: 10px;">
				<a href="{{ route('cust.password.edit') }}" onclick="event.preventDefault(); document.getElementById('password_edit-form').submit();" class="squareBtn"  style="width: 140px;height: 30px;padding: 5px 0;">パスワード変更</a>
				<a href="{{ route('cust.logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="squareBtn"  style="width: 140px;height: 30px;padding: 5px 0;">ログアウト</a>
                        <form id="password_edit-form" action="{{ route('cust.password.edit') }}" method="GET" style="display: none;">
                        </form>
                         <form id="logout-form" action="{{ route('cust.logout') }}" method="POST" style="display: none;">
                             @csrf
                         </form>
			</div>
 		</div>
               
		<div class="containerContents">

			<section class="secContents-mb">
				<div class="secContentsInner">

					<div class="formContainer mg-ajust-midashi">
						<div class="item-name">
							<p>企業名称</p>
						</div><!-- /.item-name -->
						<div class="item-input">
							{{ $customer->name }}
						</div><!-- /.item-input -->
					</div>

					<div class="formContainer mg-ajust-midashi">
						<div class="item-name">
							<p>郵便番号</p>
						</div><!-- /.item-name -->
						<div class="item-input">
							{{ $customer->zip_code }}
						</div><!-- /.item-input -->
					</div>

					<div class="formContainer mg-ajust-midashi">
						<div class="item-name">
							<p>住所</p>
						</div><!-- /.item-name -->
						<div class="item-input">
							{{ $customer->address }}
						</div><!-- /.item-input -->
					</div>

					<div class="formContainer mg-ajust-midashi">
						<div class="item-name">
							<p>部署</p>
						</div><!-- /.item-name -->
						<div class="item-input">
							{{ $customer->unit_name }}
						</div><!-- /.item-input -->
					</div>

					<div class="formContainer mg-ajust-midashi">
						<div class="item-name">
							<p>担当者名</p>
						</div><!-- /.item-name -->
						<div class="item-input">
							{{ $customer->person_name }}
						</div><!-- /.item-input -->
					</div>

					<div class="formContainer mg-ajust-midashi">
						<div class="item-name">
							<p>メールアドレス</p>
						</div><!-- /.item-name -->
						<div class="item-input">
							{{ html()->form('POST', '/cust/email/change')->id('mailform')->attribute('name', 'mailform')->open() }}

							{{ csrf_field() }}
							{{ $customer->email }}　　　　　　　　　新メールアドレス　<input type="text" name="email" value="" style="width: 300px;"> <a href="javascript:mailform.submit()" class="squareBtn btn-medium" style="width: 70px;height: 40px;">変更</a>
							{{ html()->form()->close() }}

						<div class="item-input">
							@error('email')
								<span class="invalid-feedback" role="alert" style="color:#ff0000;">{{ $message }}</span>
							@enderror
							<!-- フラッシュメッセージ -->
							@if (session('success_message'))
								 <div class="alert alert-success"  style="color:#0000ff;">
								{{ session('success_message') }}
								</div>
							@endif
							@if (session('error_message'))
								 <div class="alert alert-success"  style="color:#ff0000;">
								{{ session('error_message') }}
								</div>
							@endif
						</div>
						</div><!-- /.item-input -->
					</div>

					<div class="formContainer mg-ajust-midashi">
						<div class="item-name">
							<p>電話番号</p>
						</div><!-- /.item-name -->
						<div class="item-input">
							{{ $customer->tel }}
						</div><!-- /.item-input -->
					</div>
<br><br>


@if(isset($prodList[0]))
					<table class="tbl-prodlist mb-ajust" id="prodTable">
						<tr>
							<th>製品名</th><th>購入日</th><th>数量</th><th>製品シリアル/備考</th><th>保守開始日</th><th>保守終了日</th><th></th><th></th><th></th>
						</tr>
                               
						@foreach ($prodList as $prod)
							<tr>
								{{ html()->form('POST', '/cust/spec')->attribute('name', 'specform' .  $prod->id)->open() }}
								{{ html()->hidden('prod_list_id', $prod->id) }}
								{{ html()->form()->close() }}

								{{ html()->form('GET', '/cust/repair')->attribute('name', 'supform' .  $prod->id )->open() }}
								{{ html()->hidden('prod_list_id', $prod->id) }}
								{{ html()->form()->close() }}

								{{ html()->form('GET', '/cust/warranty')->attribute('name',  'warrantyform' .  $prod->id )->open() }}
								{{ html()->hidden('prod_list_id', $prod->id) }}
								{{ html()->form()->close() }}

								{{ html()->form('GET', '/cust/license')->attribute('name', 'licenseform' .  $prod->id)->target('_blank')->open() }}
								{{ html()->hidden('prod_list_id', $prod->id) }}
								{{ html()->form()->close() }}

								<td>{{ $prod->prod_name }}</td>
								<td>{{ $prod->buy_date }}</td>
								<td>{{ $prod->prod_num }}</td>
								<td>{!! nl2br(e($prod->prod_serial)) !!}</td>
								<td>{{ $prod->support_start_date }}</td>
								<td>{{ $prod->support_end_date }}</td>

								<td>
									<div class="btnContainer"  id="{{ 'spec' . $prod->id }}">
										@if (!empty($prod->dl_url))
											@if ($prod->secure_flag == '1')
												{{ html()->form('POST', '/cust/download/secure')->id('regform' . $prod->id )->attribute('name', 'regform' .  $prod->id)->open() }}
											@else
												{{ html()->form('POST', '/cust/download/pub')->id('regform' . $prod->id )->attribute('name', 'regform' .  $prod->id)->open() }}
											@endif
											{{ html()->hidden('file_path', $prod->dl_url) }}
											{{ html()->form()->close() }}
											<a href="javascript:regform{{ $prod->id }}.submit()" class="squareBtn btn-medium" style="width: 90px;">ダウンロード</a>
										@endif
									</div><!-- /.btn-container -->
								</td>

								<td>
									@if ($prod->repair_flag == '1')
										<div class="btnContainer"  id="{{ 'warranty' . $prod->id }}">
											<a href="javascript:warrantyform{{ $prod->id }}.submit()" class="squareBtn btn-medium" style="width: 70px;">保証書</a>
										</div><!-- /.btn-container -->
									@elseif ($prod->license_flag == '1')
										<div class="btnContainer"  id="{{ 'license' . $prod->id }}">
											<a href="javascript:licenseform{{ $prod->id }}.submit()" class="squareBtn btn-medium" style="width: 70px;">ライセンス</a>
										</div><!-- /.btn-container -->
									@endif
								</td>

								<td>
									@if ($prod->repair_flag == '1')
									<div class="btnContainer"  id="{{ 'support' . $prod->id }}">
										<a href="javascript:supform{{ $prod->id }}.submit()" class="squareBtn btn-medium" style="width: 70px;">修理依頼</a>
									</div><!-- /.btn-container -->
									@endif
								</td>
							</tr>
						@endforeach

					</table>
@endif

				</div><!-- /.secContentsInner -->
			</section><!-- /.secContents-mb -->

		</div><!-- /.containerContents -->
	</div><!-- /.mainContentsInner-oneColumn -->


@endsection
