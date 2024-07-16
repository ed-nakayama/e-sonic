@extends('layouts.admin')
<head>
    <title>マイページ | {{ config('app.name', 'Laravel') }}</title>
	<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>

@section('content')

	<div class="mainContentsInner-oneColumn">

		<div style="display:flex;justify-content: space-between;">
			<div class="mainTtl title-main">
				<h2>管理者マイページ</h2>
			</div><!-- /.mainTtl -->
 		</div>
               
		<div class="containerContents">

			<section class="secContents-mb">
				<div class="secContentsInner">

					<a href="/admin/cust/edit"  class="squareBtn"  style="width: 140px;height: 30px;padding: 5px 0;">新規顧客登録</a><br>
@if(isset($custList[0]))
					<table class="tbl-custlist mb-ajust" id="custTable">
						<tr>
							<th>ID</th><th>顧客名</th><th>住所</th><th>担当者</th><th></th><th></th><th></th>
						</tr>
                               
						@foreach ($custList as $cust)
							<tr>
								{{ Form::open(['url' => '/admin/cust/edit', 'name' => 'supform' .  $cust->id ,'method' => 'get' ]) }}
								{{ Form::hidden('cust_id', $cust->id) }}
								{{ Form::close() }}

								{{ Form::open(['url' => '/admin/cust/hold', 'name' => 'holdform' .  $cust->id ,'method' => 'get' ]) }}
								{{ Form::hidden('cust_id', $cust->id) }}
								{{ Form::close() }}

								{{ Form::open(['url' => '/admin/cust/guide', 'name' => 'guideform' .  $cust->id ,'method' => 'post' ]) }}
								{{ Form::hidden('cust_id', $cust->id) }}
								{{ Form::close() }}

								<td>{{ $cust->id }}</td>
								<td>{{ $cust->name }}</td>
								<td>{{ $cust->zip_code }}<br>{{ $cust->address }}</td>
								<td>{{ $cust->person_name }}</td>

								<td>
									<div class="btnContainer"  id="{{ 'inmailsave' . $cust->id }}">
										<a href="javascript:supform{{ $cust->id }}.submit()" class="squareBtn btn-medium" style="width: 60px;">編集</a>
									</div><!-- /.btn-container -->
								</td>

								<td>
									<div class="btnContainer"  id="{{ 'hold' . $cust->id }}">
										<a href="javascript:holdform{{ $cust->id }}.submit()" class="squareBtn btn-medium" style="width: 60px;">保有製品</a>
									</div><!-- /.btn-container -->
								</td>

								<td>
									<div class="btnContainer"  id="{{ 'guide' . $cust->id }}">
										<a href="javascript:guideform{{ $cust->id }}.submit()" class="squareBtn btn-medium" style="width: 60px;">案内状</a>
									</div><!-- /.btn-container -->
								</td>
							</tr>
						@endforeach

					</table>
@endif

				</div><!-- /.secContentsInner -->
			</section><!-- /.secContents-mb -->

		</div><!-- /.containerContents -->
	</div><!-- /.mainContentsInner-oneColumn -->


@endsection
