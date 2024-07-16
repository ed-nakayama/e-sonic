@extends('layouts.app')

@section('content')

<div class="sdw"></div>
<!-- content --><!-- InstanceBeginEditable name="EditRegion3" -->
<div class="wrapper row3">
  <div id="container">
    <div class="three_quarter">
      <div id="respond">
        <h2>お問い合わせ</h2>
        <form name="form1" class="rnd5" action="/contact/confirm" method="post">
        @csrf
          <div class="form-input clear">
            <label class="one_half" for="name">お名前<span class="required">*</span><br>
              <input type="text" name="name" id="author" value="" size="22">
				@error('name')
					<span class="invalid-feedback" role="alert" style="color:#ff0000;">{{ $message }}</span>
				@enderror
            </label>
            <label class="one_half" for="mail">E-mail <span class="required">*</span><br>
              <input type="text" name="mail" id="email" value="" size="22">
				@error('mail')
					<span class="invalid-feedback" role="alert" style="color:#ff0000;">{{ $message }}</span>
				@enderror
            </label>
            <label class="one_half" for="subject">件名<span class="required">*</span><br>
              <input type="text" name="title" id="subject" value="" size="22">
				@error('title')
					<span class="invalid-feedback" role="alert" style="color:#ff0000;">{{ $message }}</span>
				@enderror
            </label>
          </div>
          <div class="form-message">
            <label class="two_third" for="content">お問い合わせ内容<span class="required">*</span><br>
              <textarea name="content" id="message" cols="25" rows="10"></textarea>
				@error('content')
					<span class="invalid-feedback" role="alert" style="color:#ff0000;">{{ $message }}</span>
				@enderror
            </label>
          </div>
          <div class="form-input clear">
            <label class="one_half" for="content">どこで弊社をお知りになりましたか？<span class="required">*</span>
            <select name="known">
              <option value="検索サイト">検索サイト</option>
              <option value="プレスリリース">プレスリリース</option>
              <option value="プレスリリース">SNS</option>
              <option value="展示会">展示会</option>
              <option value="雑誌">雑誌</option>
              <option value="知人から">知人から</option>
              <option value="その他">その他</option>
            </select>
            </label><br><br>
          </div>
          <div class="form-input clear">
            <label class="one_half" for="privacy">
            個人情報収集に関しての同意<span class="required">*</span>
            <div class="window">
              <p>「個人情報収集に関して」<br>
                1.個人情報収集の利用目的
                入力していただいた個人情報は、お問い合わせ内容に対する回答の連絡時に利用します。 <br>
                2.個人情報の提供
                入力していただいた個人情報を他社へ提供することはございません。 <br>
                3.個人情報の委託
                入力していただいた個人情報を業務委託することはございません。 <br>
                4.個人情報の提供の任意性とそれに対する影響
                メールアドレス、お名前等の情報を入力していただけない場合、お客様への回答が不可能になります。 <br>
                5.容易に認識できない方法による取得
                当社WEBサーバ内にアクセス時のログが残ります。 <br>
                6.個人情報の開示、訂正、追加、削除、利用及び提供の拒否
                当社へ提出していただいた個人情報は、いつでも開示、訂正、追加、削除、利用及び提供の拒否ができます。ただし場合によってご希望に応じられないこともありますのでご了承ください。</p>
            </div>
            <input name="privacy"  type="checkbox" value="1">
            同意します
				@error('privacy')
					<br><span class="invalid-feedback" role="alert" style="color:#ff0000;">{{ $message }}</span>
				@enderror
            </label>
          </div>
          <div class="clear"></div>
          <p>
            <input type="button" value="確　認" class="send" name="send" onClick="document.form1.submit()">
            &nbsp;
            <input type="reset" value="リセット"　class="reset">
          </p>
        </form>
      </div>
    </div>
    <div class="clear"></div>
  </div>
</div>

@endsection
