<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">

	@yield('addheader')

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WCMDKWRN');</script>
<!-- End Google Tag Manager -->

	<link rel="canonical" href="{{ url()->current() }}" />
	<meta property="og:url" content="{{ url()->current() }}" />
	<meta property="og:site_name" content="{{ config('app.name') }}" />

<!-- InstanceEndEditable -->
<link rel="shortcut icon" href="favicon.ico" />

<link href="/layout/styles/main.css" rel="stylesheet" type="text/css" media="all">
<link href="/layout/styles/mediaqueries.css" rel="stylesheet" type="text/css" media="all">

</head>

<body>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WCMDKWRN"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

@if ( config('app.env') == 'Staging')
	<center>
	<div style="background-color:red;color:white;font-weight:bolder;font-size:16px;">
		{{ config('app.env') }}
	</div>
	</center>
@endif

<div  class="wrapper row1">
  <header id="header" class="full_width clear">
    <hgroup>
      <h1><a href="/"><img src="/images/logo.png" alt="株式会社イーソニック"></a></h1>
    </hgroup>
  </header>
</div>


	@yield('content')

	<center>
	<div class="footer">
         Copyright © 2013-{{ \Carbon\Carbon::today()->format('Y') }} e-sonic co.,ltd. All Rights Reserved.
    </div>
	</center>

</body>
</html>