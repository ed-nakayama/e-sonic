@extends('layouts.admin')
<head>
    <title>管理者ログイン | {{ config('app.name', 'Laravel') }}</title>
	<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>

@section('content')

	<div class="mainContentsInner">

		<div class="mainTtl title-main">
			<h2>管理者ログイン</h2>
		</div><!-- /.mainTtl -->

		<div class="containerContents">

			<section class="secContents">
				<div class="secContentsInner">

					<form method="POST" name ="form1" action="{{ route('admin.login') }}">
					@csrf

					<div class="formContainer mg-ajust-midashi">
						<div class="item-name" style="width:10px;"></div>
						<div class="item-name" style="width:150px;"><p>メールアドレス</p></div>
						<div class="item-input">
							<input id="email" type="email" style="width:300px;"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
							@error('email')
								<br>
								<span class="invalid-feedback" role="alert" style="color:#ff0000;">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div><!-- /.item-input -->
					</div>

					<div class="formContainer mg-ajust-midashi">
						<div class="item-name" style="width:10px;"></div>
						<div class="item-name" style="width:150px;"><p>パスワード</p></div>
						<div class="item-input">
							<input id="password" type="password" style="width:300px;" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
							　<span id="buttonEye" class="fa fa-eye" onclick="pushHideButton()"></span>
							@error('password')
								<br>
								<span class="invalid-feedback" role="alert" style="color:#ff0000;">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div><!-- /.item-input -->
					</div>

					<div class="formContainer mg-ajust-midashi">
						<div class="item-name" style="width:10px;"></div>
						<div class="item-name" style="width:150px;"></div>
						<div class="item-input">
							<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
							<label class="form-check-label" for="remember">記憶する</label>
						</div><!-- /.item-input -->
					</div>

					<div class="btnContainer">
						<a href="javascript:form1.submit()" class="squareBtn btn-large">ログイン</a>
					</div>

					<br>
					{{ Form::close() }}

				</div><!-- /.secContentsInner -->
			</section><!-- /.secContents-mb -->
		</div><!-- /.containerContents -->
	</div><!-- /.mainContentsInner-oneColumn -->



<script language="javascript">

	function pushHideButton() {
		var txtPass = document.getElementById("password");
		var btnEye = document.getElementById("buttonEye");
		if (txtPass.type === "text") {
			txtPass.type = "password";
			btnEye.className = "fa fa-eye";
		} else {
			txtPass.type = "text";
			btnEye.className = "fa fa-eye-slash";
		}
	}

</script>

@endsection
