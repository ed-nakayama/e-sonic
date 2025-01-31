@extends('layouts.admin')
<head>
    <title>製品マスタ | {{ config('app.name', 'Laravel') }}</title>
	<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>

@section('content')


	<div class="mainContentsInner-oneColumn">

		<div style="display:flex;justify-content: space-between;">
			<div class="mainTtl title-main">
				<h2>製品マスタ</h2>
			</div><!-- /.mainTtl -->
		</div>

               
		<div class="containerContents">

			<section class="secContents-mb">
				<div class="secContentsInner">

						<tr>
							<td>
								@foreach ($errors->all() as $error)
									<li><span class="invalid-feedback" role="alert" style="color:#ff0000;">{{ $error }}</span></li>
								@endforeach
							</td>
						</tr>

					<table class="tbl-prodlist mb-ajust" id="prodTable">
						<tr>
							<th>製品タイプ</th><th>カテゴリ</th><th>製品名</th><th>Repair</th><th>Secure</th><th></th>
						</tr>
						<tr>
							<th colspan="5">Download URL</th><th></th>
						</tr>
                               
						<tr>
							{{ html()->form('POST', '/admin/product/store')->attribute('name', 'newform')->open() }}
							{{ html()->hidden('id', '') }}
							<td>
								<div class="selectWrap"  style="text-align:left;">
									<select name="prod_type"  id="prod_type" class="select-no">
										<option value=""> </option>
										@foreach ($prodTypeList as $prod)
											<option value="{{ $prod->id }}"  @if (old('prod_type') == $prod->id)  selected @endif>{{ $prod->name }}</option>
										@endforeach
									</select>
								</div>
							</td>
							<td>
								<div class="selectWrap"  style="text-align:left;">
									<select name="cat_id"  id="cat_id" class="select-no">
										<option value=""> </option>
										@foreach ($prodCatList as $prod)
											<option value="{{ $prod->id }}"  @if (old('cat_id') == $prod->id)  selected @endif>{{ $prod->name }}</option>
										@endforeach
									</select>
								</div>
							</td>
							<td><input type="text" name="name" value="{{ old('name') }}"></td>
							<td align="center"><input type="checkbox" name="repair_flag" value="1" @if (old('repair_flag') == '1') checked @endif></td>
							<td align="center"><input type="checkbox" name="secure_flag" value="1" @if (old('secure_flag') == '1') checked @endif></td>

							<td>
								<div class="btnContainer">
									<a href="javascript:newform.submit()" class="squareBtn btn-medium" style="width: 70px;">新規登録</a>
								</div><!-- /.btn-container -->
							</td>
						</tr>

						<tr>
							<td colspan="5"><input type="text" name="dl_url" value="{{ old('dl_url') }}"  placeholder="Download URL"></td><td></td>
							{{ html()->form()->close() }}
						</tr>

					</table>

{{-- 検索領域 --}}
					{{ html()->form('POST', '/admin/product')->attribute('name', 'searchform')->open() }}
					<div style="display:flex;font-size: 12px;">
						<div style="padding: 10px 10px;">
							製品タイプ
						</div>
						<div class="selectWrap" style="text-align:left;width:100px;">
							<select name="search_prod_type"  id="search_prod_type" class="select-no">
								<option value=""> </option>
								@foreach ($prodTypeList as $prod)
									<option value="{{ $prod->id }}"  @if (old('search_prod_type', $search_prod_type) == $prod->id)  selected @endif>{{ $prod->name }}</option>
								@endforeach
							</select>
						</div>
						<div style="padding: 10px 10px;">
							　カテゴリ
						</div>
						<div class="selectWrap" style="text-align:left;width:100px;">
							<select name="search_cat_id"  id="search_cat_id" class="select-no">
								<option value=""> </option>
								@foreach ($prodCatList as $prod)
									<option value="{{ $prod->id }}"  @if (old('search_cat_id' ,$search_cat_id) == $prod->id)  selected @endif>{{ $prod->name }}</option>
								@endforeach
							</select>
						</div>
						　<a href="javascript:searchform.submit()" class="squareBtn btn-medium" style="width: 70px;">検索</a>
					</div>
					{{ html()->form()->close() }}
					<br>

@if(isset($prodList[0]))
					<table class="tbl-prodlist mb-ajust" id="prodTable">
						<tr>
							<th>製品タイプ</th><th>カテゴリ</th><th>製品名</th><th>Repair</th><th>Secure</th><th></th>
						</tr>
						<tr>
							<th colspan="5">Download URL</th><th></th>
						</tr>
                               
						@foreach ($prodList as $list)
							<tr>
								{{ html()->form('POST', '/admin/product/store')->attribute('saveform' .  $list->id)->open() }}
								{{ html()->hidden('id', $list->id) }}
								{{ html()->hidden('search_prod_type', $search_prod_type) }}
								{{ html()->hidden('search_cat_id', $search_cat_id) }}
								<td>
									<div class="selectWrap"  style="text-align:left;">
										<select name="prod_type"  id="prod_type" class="select-no">
											<option value=""> </option>
											@foreach ($prodTypeList as $prod)
												<option value="{{ $prod->id }}"  @if (old('prod_type' ,$list->prod_type) == $prod->id)  selected @endif>{{ $prod->name }}</option>
											@endforeach
										</select>
									</div>
								</td>
								<td>
									<div class="selectWrap"  style="text-align:left;">
										<select name="cat_id"  id="cat_id" class="select-no">
											<option value=""> </option>
											@foreach ($prodCatList as $prod)
												<option value="{{ $prod->id }}"  @if (old('cat_id' ,$list->cat_id) == $prod->id)  selected @endif>{{ $prod->name }}</option>
											@endforeach
										</select>
									</div>
								</td>
								<td><input type="text" name="name" value="{{ old('name' ,$list->name) }}"></td>
								<td align="center"><input type="checkbox" name="repair_flag" value="1" @if (old('repair_flag' ,$list->repair_flag) == '1') checked @endif></td>
								<td align="center"><input type="checkbox" name="secure_flag" value="1" @if (old('secure_flag' ,$list->secure_flag) == '1') checked @endif></td>
									<td>
										<div class="btnContainer"  id="{{ 'save' . $list->id }}">
											<a href="javascript:saveform{{ $list->id }}.submit()" class="squareBtn btn-medium" style="width: 70px;">保存</a>
										</div><!-- /.btn-container -->
									</td>
							</tr>
							<tr>
								<td colspan="5"><input type="text" name="dl_url" value="{{ old('dl_url' ,$list->dl_url) }}"></td>
								<td align="center"><input type="checkbox" name="del_flag" value="1">削除</td>
								{{ html()->form()->close() }}
							</tr>
						@endforeach

					</table>
@endif

				</div><!-- /.secContentsInner -->
			</section><!-- /.secContents -->
                    
		 </div><!-- /.containerContents -->

	</div><!-- /.mainContentsInner -->




@endsection
