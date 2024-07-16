@extends('layouts.app')

@section('content')

<div class="sdw"></div>
<!-- content --><!-- InstanceBeginEditable name="EditRegion3" -->
<div class="wrapper row3">
  <div id="container">
    <div class="three_quarter">
      <div id="respond">
        <h2>お問い合わせ</h2>
        <form class="rnd5" action="/contact/complete" method="post">
        @csrf
        <input type="hidden" name="name" value="{{ $name }}">
        <input type="hidden" name="mail" value="{{ $mail }}">
        <input type="hidden" name="title" value="{{ $title }}">
        <input type="hidden" name="content" value="{{ $content }}">
        <input type="hidden" name="known" value="{{ $known }}">
          <div class="form-input clear">
            <label class="one_half" for="name">お名前<span class="required">*</span><br>
              {{ $name }} </label>
            <label class="one_half" for="mail">E-mail<span class="required">*</span><br>
              {{ $mail }} </label>
            <label class="one_half" for="subject">件名<span class="required">*</span><br>
              {{ $title }} </label>
          </div>
          <div class="form-message">
            <label class="two_third" for="content">お問い合わせ内容<span class="required">*</span><br>
              {!! nl2br($content) !!}</label>
          </div>
          <div class="form-input clear">
            <label class="one_half" for="name">どこで弊社をお知りになりましたか？<span class="required">*</span><br>
              {{ $known }} </label>
          </div>
          <div class="form-input clear">
            <label class="one_half" for="privacy"> 個人情報収集に関しての同意<span class="required">*</span><br>
              同意します</label>
          </div>
          <div class="clear"></div>
          <p>
            <input type="submit" value="送　信" class="send" name="send">
            &nbsp;
            <input type="button" value="戻　る" class="back" onClick="javascript:history.back();">
        </form>
        <br>
        </p>
      </div>
    </div>
    <div class="clear"></div>
  </div>
</div>

@endsection
