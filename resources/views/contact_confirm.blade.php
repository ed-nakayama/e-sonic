@extends('layouts.app')

{{-- recaptcha --}}
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

@section('content')

<div class="sdw"></div>
<!-- content --><!-- InstanceBeginEditable name="EditRegion3" -->
<div class="wrapper row3">
	<div id="container">
		<div class="three_quarter">
			<div id="respond">
				<h2>お問い合わせ</h2>
				{{ html()->form('POST', '/contact/complete')->id('inquiry')->class('rnd5')->open() }}
				{{ html()->hidden('name', $name) }}
				{{ html()->hidden('mail', $mail) }}
				{{ html()->hidden('title', $title) }}
				{{ html()->hidden('content', $content) }}
				{{ html()->hidden('known', $known) }}

				<div class="form-input clear">
					<label class="one_half" for="name">お名前<span class="required">*</span><br>{{ $name }} </label>
					<label class="one_half" for="mail">E-mail<span class="required">*</span><br>{{ $mail }} </label>
					<label class="one_half" for="subject">件名<span class="required">*</span><br>{{ $title }} </label>
				</div>
				<div class="form-message">
					<label class="two_third" for="content">お問い合わせ内容<span class="required">*</span><br>{!! nl2br($content) !!}</label>
				</div>
				<div class="form-input clear">
					<label class="one_half" for="name">どこで弊社をお知りになりましたか？<span class="required">*</span><br>{{ $known }} </label>
				</div>
				<div class="form-input clear">
					<label class="one_half" for="privacy"> 個人情報収集に関しての同意<span class="required">*</span><br>同意します</label>
				</div>
				<div class="clear"></div>
				<p>
					{{-- html()->hidden('recaptchaResponse', '') --}}
					<div class="g-recaptcha" data-sitekey="6Lf9oPwrAAAAAKyRh3pDS6QevgES0czUURVdaND8" data-callback="verifyCallback" data-expired-callback="expiredCallback"></div><br>
					<input type="submit" value="送　信" class="sendBtn" id="sendBtn" name="sendBtn">
					&nbsp;
					<input type="button" value="戻　る" class="back" onClick="javascript:history.back();">
					{{ html()->form()->close() }}
					<br>
				</p>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>


@endsection

