{{ html()->form('POST', '/lp/confirm')->attribute('name', 'lpform')->open() }}
	<div class="form">
		<h2>お問い合わせフォーム</h2>
		<div class="form-group">
			<label for="name">お名前</label>
			{{ html()->text('name')->style('width:68%;font-size:1.0rem;') }}
		</div>
		<div class="form-group">
			<label for="email">メールアドレス</label>
			{{ html()->text('email')->style('width:68%;font-size:1.0rem;') }}
		</div>
		<div class="form-group">
			<label for="inquiry">件名</label>
			{{ html()->text('dummy_title',$title)->style('width:68%;font-size:1.0rem;')->disabled() }}
			{{ html()->hidden('title',$title) }}
		</div>
		<div class="form-group">
			<label for="inquiry">お問合せ内容</label>
			{{ html()->textarea('inquiry')->rows('10') }}
		</div>
			<div class="form-group">

			<label for="inquiry" style="font-size:1.0rem;">個人情報収集に関しての同意</label>
			<textarea id="inquiry" name="inquiry" rows="10" disabled>
「個人情報収集に関して」

1.個人情報収集の利用目的
　入力していただいた個人情報は、お問い合わせ内容に対する回答の連絡時に利用します。 

2.個人情報の提供
　入力していただいた個人情報を他社へ提供することはございません。

3.個人情報の委託
　入力していただいた個人情報を業務委託することはございません。

4.個人情報の提供の任意性とそれに対する影響
　メールアドレス、お名前等の情報を入力していただけない場合、お客様への回答が不可能になります。

5.容易に認識できない方法による取得
　当社WEBサーバ内にアクセス時のログが残ります。

6.個人情報の開示、訂正、追加、削除、利用及び提供の拒否
　当社へ提出していただいた個人情報は、いつでも開示、訂正、追加、削除、利用及び提供の拒否ができます。ただし場合によってご希望に応じられないこともありますのでご了承ください。</textarea>
		</div>

		<div class="form-group" style="font-size:1.0rem;margin: -25px 0 0 0;">
			<label for="privacy"></label>
			<input name="privacy"  type="checkbox" value="1" @if (old('privacy') == '1')  checked="checked" @endif><p style="font-size:1.0rem;">同意します</p>
		</div>

		<center>
			@foreach ($errors->all() as $error)
				<li style="list-style:none; color:red;font-size:1.0rem;">{{ $error }}</li>
			@endforeach
		</center>
		<br>
		<a href="javascript:lpform.submit()" class="button">確認</a>
	</div>
{{ html()->form()->close() }}

