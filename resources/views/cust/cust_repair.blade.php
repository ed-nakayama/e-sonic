@extends('layouts.cust')
<head>
    <title>修理依頼 | {{ config('app.name', 'Laravel') }}</title>
	<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>

@section('content')


	<div class="mainContentsInner-oneColumn">

		<div style="display:flex;justify-content: space-between;">
			<div class="mainTtl title-main">
				<h2>修理依頼</h2>
			</div><!-- /.mainTtl -->
 		</div>

               
		<div class="containerContents">

			{{ Form::open(['url' => '/cust/repair/send', 'name' => 'regform' , 'id' => 'regform', 'files' => true]) }}
			{{ Form::hidden('prod_list_id', old('prod_list_id', $prodList->id) ) }}
			<section class="secContents-mb">
				<div class="secContentsInner">
                            
					<div class="formContainer mg-ajust-midashi">
						<div class="item-name">
							<p>お客様名</p>
  						</div><!-- /.item-name -->
						<div class="item-input">
							{{ $customer->name }}
						</div><!-- /.item-input -->
					</div>

					<div class="formContainer mg-ajust-midashi">
						<div class="item-name">
							<p>住所</p>
						</div><!-- /.item-name -->
						<div class="item-input">
							〒{{ $customer->zip_code }} {{ $customer->address }}
						</div><!-- /.item-input -->
					</div>
                              
					<div class="formContainer mg-ajust-midashi">
						<div class="item-name">
							<p>部署名</p>
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
							<p>電話番号</p>
						</div><!-- /.item-name -->
						<div class="item-input">
							{{ $customer->tel }}
						</div><!-- /.item-input -->
					</div>

					<div class="formContainer mg-ajust-midashi">
						<div class="item-name">
							<p>メールアドレス</p>
						</div><!-- /.item-name -->
						<div class="item-input">
							{{ $customer->email }}
						</div><!-- /.item-input -->
					</div>

					<div class="formContainer mg-ajust-midashi">
						<div class="item-name">
							<p>製品名</p>
						</div><!-- /.item-name -->
						<div class="item-input">
							{{ $prodList->prod_name }}
						</div><!-- /.item-input -->
					</div>

					<div class="formContainer mg-ajust-midashi">
						<div class="item-name">
							<p>製品シリアル</p>
						</div><!-- /.item-name -->
						<div class="item-input">
							{{ $prodList->prod_serial }}
						</div><!-- /.item-input -->
					</div>

					<div class="formContainer mg-ajust-midashi">
						<div class="item-name">
							<p>お買上げ年月日</p>
						</div><!-- /.item-name -->
						<div class="item-input">
							{{ $prodList->buy_date }}
						</div><!-- /.item-input -->
					</div>

					<div class="formContainer mg-ajust-midashi">
						<div class="item-name">
							<p>保守期間</p>
						</div><!-- /.item-name -->
						<div class="item-input">
							{{ $prodList->support_start_date }} ～ {{ $prodList->support_end_date }}
						</div><!-- /.item-input -->
					</div>

					<div class="formContainer mg-ajust-midashi">
						<div class="item-name">
							<p>障害内容<span class="required"><font color=red> *</font></span></p>
						</div><!-- /.item-name -->
						<div class="item-input">
							<textarea name="content" id="content" cols="80" rows="12"></textarea>
							@error('content')
								<span class="invalid-feedback" role="alert" style="color:#ff0000;">{{ $message }}</span>
							@enderror
						</div><!-- /.item-input -->
					</div>

					<div class="formContainer mg-ajust-midashi">
						<div class="item-name">
							<p></p>
						</div><!-- /.item-name -->
						<div class="item-input">
							<label class="one_half0" for="privacy">
								<br><b>個人情報収集に関しての同意<span class="required"><font color=red> *</font></span></b><br><br>
								<div class="window2">
									<p>「個人情報収集に関して」<br>
									1.個人情報収集の利用目的<br>
									　入力していただいた個人情報は、お問い合わせ内容に対する回答の連絡時に利用します。 <br>
									2.個人情報の提供<br>
									　入力していただいた個人情報を他社へ提供することはございません。 <br>
									3.個人情報の委託<br>
									　入力していただいた個人情報を業務委託することはございません。 <br>
									4.個人情報の提供の任意性とそれに対する影響<br>
									　メールアドレス、お名前等の情報を入力していただけない場合、お客様への回答が不可能になります。 <br>
									5.容易に認識できない方法による取得<br>
									　当社WEBサーバ内にアクセス時のログが残ります。 <br>
									6.個人情報の開示、訂正、追加、削除、利用及び提供の拒否<br>
									　当社へ提出していただいた個人情報は、いつでも開示、訂正、追加、削除、利用及び提供の拒否ができます。<br>
									　ただし場合によってご希望に応じられないこともありますのでご了承ください。</p>
								</div>
							</label>
							<div>
								<br>
								<input name="privacy"  type="checkbox" value="1"><b>同意します</b>
							</div><!-- /.btn-container -->
							@error('privacy')
								<span class="invalid-feedback" role="alert" style="color:#ff0000;">{{ $message }}</span>
							@enderror
						</div>
					</div>


					<div class="btnContainer">
						<br>
						<a href="javascript:regform.submit()" class="squareBtn btn-large">送信</a>
					</div><!-- /.btn-container -->
				</div><!-- /.secContentsInner -->
			</section><!-- /.secContents -->
			{{ Form::close() }}
                    
		 </div><!-- /.containerContents -->

	</div><!-- /.mainContentsInner -->


@endsection
