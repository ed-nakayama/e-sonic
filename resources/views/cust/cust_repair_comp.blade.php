@extends('layouts.cust')
<head>
    <title>修理依頼 | {{ config('app.name', 'Laravel') }}</title>
	<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>

@section('content')


	<div class="mainContentsInner-oneColumn">

		<div style="display:flex;justify-content: space-between;">
			<div class="mainTtl title-main">
				<h2>修理依頼 完了</h2>
			</div><!-- /.mainTtl -->
 		</div>

               
		<div class="containerContents">
		<br>
			<div class="form-input clear" > 送信完了致しました。 </div>
			<div class="clear"></div>
		</div><!-- /.containerContents -->

	</div><!-- /.mainContentsInner -->


@endsection
