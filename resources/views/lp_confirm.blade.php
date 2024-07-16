@extends('layouts.lp')

@section('addheader')
	<title>お問い合わせ 確認 ｜ 株式会社イーソニック</title>
@endsection

@section('content')

<style>
/*ボタン*/
  .button {
    display: block;
    font-size: 1.2rem;
    font-weight: normal;
    width: 160px;
    margin: 0 auto;
    padding: 10px 0;
    background-color: #07A3D7;
    border: 2px solid #07A3D7;
    color: #fff;
    text-align: center;
    text-decoration: none;
    border-radius: 30px;
    transition: all 0.3s ease;
  }
  .bk_button {
    display: block;
    font-size: 1.2rem;
    font-weight: normal;
    width: 160px;
    margin: 0 auto;
    padding: 10px 0;
    background-color: #a9a9a9;
    border: 2px solid #a9a9a9;
    color: #fff;
    text-align: center;
    text-decoration: none;
    border-radius: 30px;
    transition: all 0.3s ease;
  }
</style>


<div class="sdw"></div>
<!-- content --><!-- InstanceBeginEditable name="EditRegion3" -->
<div class="wrapper row3">
  <div id="container">
    <div class="three_quarter">
      <div id="respond">
        <h2>お問い合わせ 確認</h2>
        <form action="/lp/complete" method="post" name="inqform">
        @csrf
        <input type="hidden" name="name" value="{{ $name }}">
        <input type="hidden" name="email" value="{{ $email }}">
        <input type="hidden" name="title" value="{{ $title }}">
        <input type="hidden" name="inquiry" value="{{ $inquiry }}">
          <div class="form-input clear">
            <label class="one_half" for="name"><p style="font-weight:bold;">お名前<span class="required">*</span></p>
              {{ $name }}</label>
            <label class="one_half" for="mail"><p style="font-weight:bold;">メールアドレス<span class="required">*</span></p>
              {{ $email }} </label>
            <label class="one_half" for="subject"><p style="font-weight:bold;">件名<span class="required">*</span></p>
              {{ $title }} </label>
          </div>
          <div class="form-message">
            <label class="two_third" for="content"><p style="font-weight:bold;">お問い合わせ内容<span class="required">*</span></p>
              {!! nl2br(e($inquiry)) !!}</label>
          </div>
          <div class="form-input clear">
            <label class="one_half" for="privacy"><p style="font-weight:bold;">個人情報収集に関しての同意<span class="required">*</span></p>
              同意します</label>
          </div>
          <div class="clear"></div>
          <p>
            <div style="display:flex;width:60%;">
				<a href="javascript:history.back();" class="bk_button">戻る</a>
				<a href="javascript:inqform.submit();" class="button">送信</a>
			</div>
        </form>
        <br>
        </p>
      </div>
    </div>
    <div class="clear"></div>
  </div>
</div>

@endsection
