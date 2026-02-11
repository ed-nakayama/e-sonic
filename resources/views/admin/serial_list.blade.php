@extends('layouts.admin')
<head>
    <title>Inquery Referer | {{ config('app.name', 'Laravel') }}</title>
	<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>

@section('content')


	<div class="mainContentsInner-oneColumn">

		<div style="display:flex;justify-content: space-between;">
			<div class="mainTtl title-main">
				<h2>シリアル一覧</h2>
			</div><!-- /.mainTtl -->
		</div>

		<div class="containerContents">

			<section class="secContents-mb">
				<div class="secContentsInner">

					<table class="tbl-seriallist mb-ajust" id="refTable">
						<tr>
							<th>パラメトリック</th><th>S/N</th><th>顧客ID</th><th>顧客名</th><th>購入日付</th>
						</tr>
                               
						@foreach ($param_list as $ref)
							<tr>
								<td>{{ $ref->name }}</td>
								<td>{{ $ref->prod_serial }}</td>
								<td>{{ $ref->customer_id }}</td>
								<td>{{ $ref->getCustomerName() }}</td>
								<td>{{ str_replace('-','/', $ref->buy_date) }}</td>
							</tr>
						@endforeach
					</table>

					<table class="tbl-seriallist mb-ajust" id="refTable">
						<tr>
							<th>ビーコン</th><th>S/N</th><th>顧客ID</th><th>顧客名</th><th>購入日付</th>
						</tr>
                               
						@foreach ($beacon_list as $ref)
							<tr>
								<td>{{ $ref->name }}</td>
								<td>{{ $ref->prod_serial }}</td>
								<td>{{ $ref->customer_id }}</td>
								<td>{{ $ref->getCustomerName() }}</td>
								<td>{{ str_replace('-','/', $ref->buy_date) }}</td>
							</tr>
						@endforeach
					</table>

				</div><!-- /.secContentsInner -->
			</section><!-- /.secContents -->
                    
		 </div><!-- /.containerContents -->

	</div><!-- /.mainContentsInner -->



@endsection
