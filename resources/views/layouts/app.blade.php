<!DOCTYPE html>
<html lang="ja"><!-- InstanceBegin template="/Templates/page.dwt" codeOutsideHTMLIsLocked="false" -->
<meta charset="utf-8">
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
<head>

<!-- InstanceBeginEditable name="doctitle" -->
<title>株式会社イーソニック</title>

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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="/layout/styles/main.css" rel="stylesheet" type="text/css" media="all">
<link href="/layout/styles/mediaqueries.css" rel="stylesheet" type="text/css" media="all">
<!--[if lt IE 9]>
<link href="../layout/styles/ie/ie8.css" rel="stylesheet" type="text/css" media="all">
<script src="../layout/scripts/ie/css3-mediaqueries.min.js"></script>
<script src="../layout/scripts/layout/scripts/ie/html5shiv.min.js"></script>
<![endif]-->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
	$('a[href^=#]').click(function(){
		var speed = 500;
		var href= $(this).attr("href");
		var target = $(href == "#" || href == "" ? 'html' : href);
		var position = target.offset().top;
		$("html, body").animate({scrollTop:position}, speed, "swing");
		return false;
	});
});
</script>
</head>
<body>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WCMDKWRN"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div  class="wrapper row1">
  <header id="header" class="full_width clear">
    <hgroup>
      <h1><a href="/"><img src="/images/logo.png" alt="株式会社イーソニック" title="音波(Sonic Wave)、画像(Picuture)のコラボレーション！"></a></h1>
    </hgroup>
  </header>
</div>

<!-- 〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓 -->
<div class="wrapper row2">
  <nav id="topnav">
    <ul class="clear">
      <li class="active"><a href="/"><img src="/images/mainmenu01.png" alt="Home"></a></li>
      <li><a class="drop" href="/corporate/outline"><img src="/images/mainmenu02.png" alt="会社概要" class="pc"><strong class="mb">会社概要</strong></a>
        <ul>
          <li><a href="/corporate/outline">会社概要</a></li>
          <li><a href="/corporate/policy">カンパニーポリシー</a></li>
          <li><a href="/corporate/access">アクセス</a></li>
        </ul>
      </li>
      <li><a class="drop" href="/service#header"><img src="/images/mainmenu03.png" alt="業務案内" class="pc"><strong class="mb">業務案内</strong></a>
        <ul>
          <li><a href="/service#header">超音波関連装置の開発、設計、製造、販売</a></li>
          <li><a href="/service#ec">弊社装置を使用したソリューションの提供</a></li>
          <li><a href="/service#application">スマートフォンアプリ開発</a></li>
        </ul>
      </li>
      <!--li><a class="drop" href="/casestudy/case01#header"><img src="/images/mainmenu04.png" alt="事例紹介" class="pc"><strong class="mb">事例紹介</strong></a>
        <ul>
          <li><a href="/casestudy/case01#header">超音波関連装置の開発、設計、製造、販売</a></li>
          <li><a href="/casestudy/case01#case02">弊社装置を使用したサービスの提供</a></li>
          <li><a href="/casestudy/case01#case03">スマートフォンアプリ開発</a></li>
        </ul>
      </li-->
      <li><a class="drop" href="/casestudy/case02#header"><img src="/images/mainmenu06.png" alt="ワーキングギャラリー" class="pc"><strong class="mb">ワーキングギャラリー</strong></a>
        <!--ul>
          <li><a href="/casestudy/case02#header">展示会2018/07</a></li>
          <li><a href="/casestudy/case02#case02">簡易特定周波数レベルメーター</a></li>
          <li><a href="/casestudy/case02#case03">音響コード取得アプリ</a></li>
        </ul-->
      </li>
      <li><a href="/contact"><img src="/images/mainmenu05.png" alt="お問い合わせ" class="pc"><strong class="mb">お問い合わせ</strong></a></li>
    </ul>
  </nav>
</div>
      <div align="right"><a href="https://gaishiit.com">外資IT.com</a></div>

	@yield('content')

<!-- InstanceEndEditable --><!-- Footer -->
<div class="sdw2"></div>
<div class="wrapper row4">
<div id="copyright" class="clear">
    Copyright © 2013-{{ \Carbon\Carbon::today()->format('Y') }} e-sonic co.,ltd. All Rights Reserved.
</div>
</div>
<!-- Scripts --> 
<script type="text/javascript" src="layout/scripts/jquery-1.10.0.min.js"></script> 
<script src="https://code.jquery.com/jquery-latest.min.js"></script> 
<script src="https://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script> 
<script src="layout/scripts/jquery-mobilemenu.min.js"></script> 
<script src="layout/scripts/custom.js"></script>

</body>
</html>