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

               
		<div class="containerContents">

			<section class="secContents-mb">
				<div class="secContentsInner">

					<table class="tbl-refererlist mb-ajust" id="refTable">
						<tr>
							<th>id</th><th>日付</th><th>URL</th>
						</tr>
                               
						@foreach ($list as $ref)
							<tr>
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

	</div><!-- /.mainContentsInner -->



@endsection
