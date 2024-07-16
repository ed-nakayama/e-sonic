@extends('layouts.cust')
<head>
    <title>お客様情報 | {{ config('app.name', 'Laravel') }}</title>
	<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>

@section('content')


	<div class="mainContentsInner-oneColumn">

		<div style="display:flex;justify-content: space-between;">
			<div class="mainTtl title-main">
				<h2>お客様情報　編集</h2>
			</div><!-- /.mainTtl -->
 		</div>

               
		<div class="containerContents">

			{{ Form::open(['url' => '/cust/mypage/store', 'name' => 'regform' , 'id' => 'regform', 'files' => true]) }}
			<section class="secContents-mb">
				<div class="secContentsInner">
                            
					<div class="formContainer mg-ajust-midashi">
						<div class="item-name">
							<p>お客様名</p>
  						</div><!-- /.item-name -->
						<div class="item-input">
							<input type="text" name="name" value="{{ old('name' ,$customer->name) }}" style="width: 600px;">
						</div><!-- /.item-input -->
					</div>


					<div class="formContainer mg-ajust-midashi">
						<div class="item-name">
							<p>郵便番号</p>
						</div><!-- /.item-name -->
						<div class="item-input">
							<input type="text" name="zip_code" value="{{ old('zip_code' ,$customer->zip_code) }}"  style="width: 100px;">
						</div><!-- /.item-input -->
					</div>
                              

					<div class="formContainer mg-ajust-midashi">
						<div class="item-name">
							<p>住所</p>
						</div><!-- /.item-name -->
						<div class="item-input">
							<input type="text" name="address" value="{{ old('address' ,$customer->address) }}">
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
							<p>担当者名</p>
						</div><!-- /.item-name -->
						<div class="item-input">
							<input type="text" name="person_name" value="{{ old('person_name' ,$customer->person_name) }}" style="width: 300px;">
						</div><!-- /.item-input -->
					</div>

					<div class="formContainer mg-ajust-midashi">
						<div class="item-name">
							<p>電話番号</p>
						</div><!-- /.item-name -->
						<div class="item-input">
							<input type="text" name="tel" value="{{ old('tel' ,$customer->tel) }}" style="width: 200px;">
						</div><!-- /.item-input -->
					</div>
<br>
					<div class="btnContainer">
						<a href="javascript:regform.submit()" class="squareBtn btn-large">保存</a>
					</div><!-- /.btn-container -->
				</div><!-- /.secContentsInner -->
			</section><!-- /.secContents -->
			{{ Form::close() }}
                    
		 </div><!-- /.containerContents -->

	</div><!-- /.mainContentsInner -->




@endsection
