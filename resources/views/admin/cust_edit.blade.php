@extends('layouts.admin')
<head>
    <title>お客様情報 | {{ config('app.name', 'Laravel') }}</title>
	<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>

@section('content')


	<div class="mainContentsInner-oneColumn">

		<div style="display:flex;justify-content: space-between;">
			<div class="mainTtl title-main">
				<h2>お客様情報　登録／編集</h2>
			</div><!-- /.mainTtl -->
 		</div>

               
		<div class="containerContents">

			{{ html()->form('POST', '/admin/cust/store')->attribute('name', 'regform')->open() }}
			{{ html()->hidden('cust_id', $customer->id) }}
			<section class="secContents-mb">
				<div class="secContentsInner">
                            
					<div class="formContainer mg-ajust-midashi">
						<div class="item-name">
							<p>お客様名<span class="required"><font color=red> *</font></span></p>
  						</div><!-- /.item-name -->
						<div class="item-input">
							<input type="text" name="name" value="{{ old('name' ,$customer->name) }}" style="width: 600px;">
							@error('name')
								<br>
								<span class="invalid-feedback" role="alert" style="color:#ff0000;">{{ $message }}</span>
							@enderror
						</div><!-- /.item-input -->
					</div>

					<div class="formContainer mg-ajust-midashi">
						<div class="item-name">
							<p>お客様名カナ<span class="required"><font color=red> *</font></span></p>
  						</div><!-- /.item-name -->
						<div class="item-input">
							<input type="text" name="name_kana" value="{{ old('name_kana' ,$customer->name_kana) }}" style="width: 600px;">
							@error('name_kana')
								<br>
								<span class="invalid-feedback" role="alert" style="color:#ff0000;">{{ $message }}</span>
							@enderror
						</div><!-- /.item-input -->
					</div>


					<div class="formContainer mg-ajust-midashi">
						<div class="item-name">
							<p>郵便番号<span class="required"><font color=red> *</font></span></p>
						</div><!-- /.item-name -->
						<div class="item-input">
							<input type="text" name="zip_code" value="{{ old('zip_code' ,$customer->zip_code) }}"  style="width: 100px;">
							@error('zip_code')
								<br>
								<span class="invalid-feedback" role="alert" style="color:#ff0000;">{{ $message }}</span>
							@enderror
						</div><!-- /.item-input -->
					</div>

					<div class="formContainer mg-ajust-midashi">
						<div class="item-name">
							<p>住所<span class="required"><font color=red> *</font></span></p>
						</div><!-- /.item-name -->
						<div class="item-input">
							<input type="text" name="address" value="{{ old('address' ,$customer->address) }}">
							@error('address')
								<br>
								<span class="invalid-feedback" role="alert" style="color:#ff0000;">{{ $message }}</span>
							@enderror
						</div><!-- /.item-input -->
					</div>
                              
					<div class="formContainer mg-ajust-midashi">
						<div class="item-name">
							<p>部署名</p>
						</div><!-- /.item-name -->
						<div class="item-input">
							<input type="text" name="unit_name" value="{{ old('unit_name' ,$customer->unit_name) }}" style="width: 400px;">
						</div><!-- /.item-input -->
					</div>

					<div class="formContainer mg-ajust-midashi">
						<div class="item-name">
							<p>担当者名<span class="required"><font color=red> *</font></span></p>
						</div><!-- /.item-name -->
						<div class="item-input">
							<input type="text" name="person_name" value="{{ old('person_name' ,$customer->person_name) }}" style="width: 300px;">
							@error('person_name')
								<br>
								<span class="invalid-feedback" role="alert" style="color:#ff0000;">{{ $message }}</span>
							@enderror
						</div><!-- /.item-input -->
						</div><!-- /.item-input -->
					</div>

					<div class="formContainer mg-ajust-midashi">
						<div class="item-name">
							<p>パスワード</p>
						</div><!-- /.item-name -->
						<div class="item-input">
							{{ $customer->pw_raw }}
						</div><!-- /.item-input -->
					</div>

					<div class="formContainer mg-ajust-midashi">
						<div class="item-name">
							<p>メールアドレス<span class="required"><font color=red> *</font></span></p>
						</div><!-- /.item-name -->
						<div class="item-input">
							<input type="text" name="email" value="{{ old('email' ,$customer->email) }}" style="width: 300px;">
							@error('email')
								<br>
								<span class="invalid-feedback" role="alert" style="color:#ff0000;">{{ $message }}</span>
							@enderror
						</div><!-- /.item-input -->
					</div>

					<div class="formContainer mg-ajust-midashi">
						<div class="item-name">
							<p>電話番号<span class="required"><font color=red> *</font></span></p>
						</div><!-- /.item-name -->
						<div class="item-input">
							<input type="text" name="tel" value="{{ old('tel' ,$customer->tel) }}" style="width: 200px;">
							@error('tel')
								<br>
								<span class="invalid-feedback" role="alert" style="color:#ff0000;">{{ $message }}</span>
							@enderror
						</div><!-- /.item-input -->
					</div>
<br>
					<div class="btnContainer">
						<a href="javascript:regform.submit()" class="squareBtn btn-large">保存</a>
					</div><!-- /.btn-container -->
				</div><!-- /.secContentsInner -->
			</section><!-- /.secContents -->
			{{ html()->form()->close() }}
                    
		 </div><!-- /.containerContents -->

	</div><!-- /.mainContentsInner -->




@endsection
