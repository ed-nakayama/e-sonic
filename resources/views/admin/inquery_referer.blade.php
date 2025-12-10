@extends('layouts.admin')
<head>
    <title>Inquery Referer | {{ config('app.name', 'Laravel') }}</title>
	<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>

@section('content')


	<div class="mainContentsInner-oneColumn">

		<div style="display:flex;justify-content: space-between;">
			<div class="mainTtl title-main">
				<h2>Inquery Referer</h2>
			</div><!-- /.mainTtl -->
		</div>

		{{ html()->form('GET', '/admin/inquery_referer')->id('searchform')->attribute('name', 'searchform')->open() }}
		<div class="secBtnHead">
			<div class="secBtnHead-btn">
				<ul class="item-btn" style="align-items: center;">
					<li style="width: 400px;margin-left: 0px;">Referer
						{{ html()->text('referer', $referer) }}
					</li>
					<li style="margin-top: 20px;"><a href="javascript:searchform.submit()" class="squareBtn">検索</a></li>
				</ul><!-- /.item -->
			</div><!-- /.secBtnHead-btn -->
		</div>
		{{ html()->form()->close() }}
               
		<div class="containerContents">

			<section class="secContents-mb">
				<div class="secContentsInner">

					<table class="tbl-refererlist mb-ajust" id="refTable">
						<tr>
							<th>id</th><th>日付</th><th>URL</th>
						</tr>
                               
						@foreach ($list as $ref)
							<tr @if (strpos($ref->url ,'metoree.com') !== false) style="background-color:#f0e68c;" @elseif (strpos($ref->url ,'atpress.ne.jp') !== false) style="background-color:#ffd700;" @endif>
								<td>{{ $ref->id }}</td>
								<td>{{ str_replace('-','/', $ref->created_at) }}</td>
								<td>{{ $ref->url }}</td>
							</tr>
						@endforeach
					</table>

				</div><!-- /.secContentsInner -->
			</section><!-- /.secContents -->
                    
		 </div><!-- /.containerContents -->
		<div class="pager">
			{{ $list->links('pagination.admin') }}
		</div>

		<div class="containerContents">

			<section class="secContents-mb">
				<div class="secContentsInner">

					<table class="tbl-refererlist2 mb-ajust" id="refTable">
						<tr>
							<th>referer</th><th>総カウント</th>
							<th>{{ date("Y/m") }}</th>
							<th>{{ date('Y/m', strtotime('-1 month')) }}</th>
							<th>{{ date('Y/m', strtotime('-2 month')) }}</th>
							<th>{{ date('Y/m', strtotime('-3 month')) }}</th>
							<th>{{ date('Y/m', strtotime('-4 month')) }}</th>
							<th>{{ date('Y/m', strtotime('-5 month')) }}</th>
							<th>{{ date('Y/m', strtotime('-6 month')) }}</th>
							<th>{{ date('Y/m', strtotime('-7 month')) }}</th>
							<th>{{ date('Y/m', strtotime('-8 month')) }}</th>
							<th>{{ date('Y/m', strtotime('-9 month')) }}</th>
							<th>{{ date('Y/m', strtotime('-10 month')) }}</th>
							<th>{{ date('Y/m', strtotime('-11 month')) }}</th>
						</tr>
                               
						@foreach ($dist_list as $ref)
							<tr @if (strpos($ref->url ,'metoree.com') !== false) style="background-color:#f0e68c;" @elseif (strpos($ref->url ,'atpress.ne.jp') !== false) style="background-color:#ffd700;" @endif>
								<td style="text-align: left;">{{ $ref->url }}</td>
								<td>{{ $ref->count }}</td>
								<td>{{ $ref->mon1 }}</td>
								<td>{{ $ref->mon2 }}</td>
								<td>{{ $ref->mon3 }}</td>
								<td>{{ $ref->mon4 }}</td>
								<td>{{ $ref->mon5 }}</td>
								<td>{{ $ref->mon6 }}</td>
								<td>{{ $ref->mon7 }}</td>
								<td>{{ $ref->mon8 }}</td>
								<td>{{ $ref->mon9 }}</td>
								<td>{{ $ref->mon10 }}</td>
								<td>{{ $ref->mon11 }}</td>
								<td>{{ $ref->mon12 }}</td>
							</tr>
						@endforeach
					</table>

				</div><!-- /.secContentsInner -->
			</section><!-- /.secContents -->
                    
		 </div><!-- /.containerContents -->

	</div><!-- /.mainContentsInner -->



@endsection
