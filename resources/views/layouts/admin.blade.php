<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('assets/admin/css/destyle.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/remodal.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/admin/css/remodal-default-theme.css') }}" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body class="bg-admin">

    <header class="header">
        <div class="headInner">
            <h1 class="logo"><a href="/admin/login"><img src="/images/logo.png" width="200"></a></h1>
			<div style="text-align: right;margin-bottom: 10px;">
@auth
				<a href="{{ route('admin.product') }}"  class="squareBtn"  style="width: 140px;height: 30px;padding: 5px 0;">製品マスタ</a>
				<a href="{{ route('admin.logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="squareBtn"  style="width: 140px;height: 30px;padding: 5px 0;">ログアウト</a>
 				<form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
				@csrf
				</form>
@endauth
			</div>
        </div><!-- /.headInner -->
    </header>

    <main class="main">
        <div class="mainContents">
            @yield('content')
        </div>
    </main>

    <footer class="footer">
        <small>Copyright © 2013-{{ \Carbon\Carbon::today()->format('Y') }} e-sonic co.,ltd. All Rights Reserved.</small>
    </footer>

    <script src="{{ asset('assets/admin/js/script.js') }}"></script>

</body>

<style>
input[type="email"] {
    width: 60%;
    padding: 7px 10px;
    background-color: #fff;
    border: 1px solid #C7C7C7;
    border-radius: 3px;
}
input[type="password"] {
    width: 60%;
    padding: 7px 10px;
    background-color: #fff;
    border: 1px solid #C7C7C7;
    border-radius: 3px;
}

</html>