@extends('layouts.admin')
<head>
    <title>Access Referer | {{ config('app.name', 'Laravel') }}</title>
	<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>

@section('content')


	<div class="mainContentsInner-oneColumn">

		<div style="display:flex;justify-content: space-between;">
			<div class="mainTtl title-main">
				<h2>Access Referer</h2>
			</div><!-- /.mainTtl -->
		</div>

		{{ html()->form('GET', '/admin/access_referer')->id('searchform')->attribute('name', 'searchform')->open() }}
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
							<tr @if ( (strpos($ref->url ,'metoree.com') !== false) || (strpos($ref->url ,'atpress.ne.jp') !== false) ) style="background-color:yellow;" @endif>
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

					<table class="tbl-refererlist mb-ajust" id="refTable">
						<tr>
							<th>referer</th><th>count</th>
						</tr>
                               
						@foreach ($dist_list as $ref)
								<td @if ( (strpos($ref->url ,'metoree.com') !== false) || (strpos($ref->url ,'atpress.ne.jp') !== false) ) style="background-color:yellow;" @endif>{{ $ref->url }}</td>
								<td>{{ $ref->count }}</td>
							</tr>
						@endforeach
					</table>

				</div><!-- /.secContentsInner -->
			</section><!-- /.secContents -->
                    
		 </div><!-- /.containerContents -->

	</div><!-- /.mainContentsInner -->



@endsection
