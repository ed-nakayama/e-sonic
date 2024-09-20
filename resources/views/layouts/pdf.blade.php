<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('assets/cust/css/destyle.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/cust/css/style.css') }}" rel="stylesheet">

<style>
    @font-face{
        font-family: ipag;
        font-style: normal;
        font-weight: normal;
        src: url("{{ storage_path('fonts/ipaexg.ttf')}}") format('truetype');
    }
    @font-face{
        font-family: ipag;
        font-style: bold;
        font-weight: bold;
        src: url("{{ storage_path('fonts/ipaexg.ttf')}}") format('truetype');
    }
        
@charset "UTF-8";
html,body{
	height: 100%;
}
body {
    font-size: 14px;
    font-family: ipag;
    line-height: 1.4;
    -webkit-text-size-adjust: 100%;

    /* footar用 */ 
    display: flex;
    flex-direction: column;
}


/*/////////////////////////////
 PDF footer
/////////////////////////////*/
.footerPdf {
    width: 100%;
    max-width: 100%;
    padding: 8px 0;
    text-align: center;
}


.logos {
    position: relative; /*相対位置*/
}


.bg{
    /*位置の設定*/
    width: 100%;
    height: 75%;
    position: absolute;
    top: 40;
    left: 0;

    /*背景画像の設定*/
    background: url('images/logo_trans.png');
    background-size: cover;

}

</style>

</head>
<body class="bg-admin">

    <main class="main">

        <div class="mainContents">
            @yield('content')
        </div>

		<br>
		<table style="width: 90%;margin:auto;">
			<tr>
				<td style="width: 45%;"></td>
				<td style="width: 8%;vertical-align:top;">
				</td>
				<td>
					〒 151-0053<br>
					東京都渋谷区代々木 1-21-10<br>
					インターパーク代々木 4F<br>
					株式会社 イーソニック<br>
					サポート　：　https://www.e-sonic.co.jp/cust<br>
					メール　：　sonic_b@e-sonic.co.jp<br>
					TEL ： 03-4572-0683<br>
				</td>
			</tr>
		</table>


    </main>
        
    <footer class="footerPdf">
        <small>Copyright © 2013-{{ \Carbon\Carbon::today()->format('Y') }} e-sonic co.,ltd. All Rights Reserved.</small>
    </footer>


</body>
</html>

