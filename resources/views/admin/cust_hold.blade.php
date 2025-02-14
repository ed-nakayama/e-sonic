@extends('layouts.admin')
<head>
    <title>顧客保有製品 | {{ config('app.name', 'Laravel') }}</title>
	<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>

@section('content')


	<div class="mainContentsInner-oneColumn">

		<div style="display:flex;justify-content: space-between;">
			<div class="mainTtl title-main">
				<h2>顧客保有製品</h2>
			</div><!-- /.mainTtl -->
		</div>

               
		<div class="containerContents">

			<section class="secContents-mb">
				<div class="secContentsInner">
                            
					<div class="formContainer mg-ajust-midashi">
						<div class="item-name">
							<p>顧客名</p>
  						</div><!-- /.item-name -->
						<div class="item-input">
							{{ $customer->name }}　　（ID:{{ $customer->id }}）
						</div><!-- /.item-input -->
					</div>

					<div class="formContainer mg-ajust-midashi">
						<div class="item-name">
							<p>住所</p>
						</div><!-- /.item-name -->
						<div class="item-input">
							〒{{ $customer->zip_code }}　{{ $customer->address }}
						</div><!-- /.item-input -->
					</div>
                              
					<div class="formContainer mg-ajust-midashi">
						<div class="item-name">
							<p>担当者名</p>
						</div><!-- /.item-name -->
						<div class="item-input">
							{{ $customer->person_name }}
						</div><!-- /.item-input -->
						</div><!-- /.item-input -->
					</div>
<br>

						<tr>
							<td>
								@foreach ($errors->all() as $error)
									<li><span class="invalid-feedback" role="alert" style="color:#ff0000;">{{ $error }}</span></li>
								@endforeach
							</td>
						</tr>

					<table class="tbl-holdlist mb-ajust" id="prodTable">
						<tr>
							<th>製品名</th><th>購入日</th><th>台数</th><th>保守開始日</th><th>保守終了日</th><th></th>
						</tr>
						<tr>
							<th>製品シリアル</th><th>請求No.</th><th colspan="4">備考</th>
						</tr>
                               
						{{ html()->form('POST', '/admin/cust/hold/save')->attribute('name', 'newform')->open() }}
						{{ html()->hidden('new_cust_id', $customer->id) }}

						<tr>
							<td>
								<div class="selectWrap"  style="text-align:left;">
									<select name="new_prod_id"  id="prod_id" class="select-no">
										<option value=""></option>
										@foreach ($product as $hold)
											<option value="{{ $hold->id }}"  @if (old('new_prod_id') == $hold->id)  selected @endif>{{ $hold->name }}</option>
										@endforeach
									</select>
								</div>
							</td>
							<td><input type="date" name="new_buy_date" value="{{ old('new_buy_date') }}"></td>
							<td><input type="text" name="new_prod_num" value="{{ old('new_prod_num') }}"></td>
							<td><input type="date" name="new_support_start_date" value="{{ old('new_support_start_date') }}"></td>
							<td><input type="date" name="new_support_end_date" value="{{ old('new_support_end_date') }}"></td>

							<td>
								<div class="btnContainer">
									<a href="javascript:newform.submit()" class="squareBtn btn-medium" style="width: 70px;">新規登録</a>
								</div><!-- /.btn-container -->
							</td>
						</tr>
						<tr class="bd-bottom">
							<td>
								<textarea class="form-mt" name="new_prod_serial" id="" cols="30" rows="1" placeholder="製品シリアル">{{ old('new_prod_serial') }}</textarea>
							</td>
							<td><input type="text" name="new_claim_no" value="{{ old('new_claim_no') }}"  placeholder="請求No."></td>
							<td colspan="4">
								<textarea class="form-mt" name="new_comment" id="" cols="30" rows="1"  placeholder="備考">{{ old('new_comment') }}</textarea>
							</td>
						</tr>
						{{ html()->form()->close() }}

					</table>

@if(isset($prodList[0]))
					<table class="tbl-holdlist mb-ajust" id="prodTable">
						<tr>
							<th>製品名</th><th>購入日</th><th>台数</th><th>保守開始日</th><th>保守終了日</th><th></th>
						</tr>
						<tr>
							<th>製品シリアル</th><th>請求No.</th><th colspan="3">備考</th><th></th>
						</tr>
                               
						@foreach ($prodList as $list)
							{{ html()->form('POST', '/admin/cust/hold/save')->attribute('name', 'saveform' .  $list->id)->open() }}
							{{ html()->hidden('cust_id', $customer->id) }}
							{{ html()->hidden('prod_list_id', $list->id) }}
							<tr>

								<td>
									<div class="selectWrap"  style="text-align:left;">
										<select name="prod_id"  id="prod_id{{ $loop->index }}" class="select-no">
											<option value=""></option>
											@foreach ($product as $prod)
												<option value="{{ $prod->id }}"  @if (old('prod_id' ,$list->product_id) == $prod->id)  selected @endif>{{ $prod->name }}</option>
											@endforeach
										</select>
									</div>
								</td>
								<td><input type="date" name="buy_date" value="{{ old('buy_date' ,$list->buy_date) }}"></td>
								<td><input type="text" name="prod_num" value="{{ old('prod_num' ,$list->prod_num) }}"></td>
								<td><input type="date" name="support_start_date" value="{{  old('support_start_date' ,$list->support_start_date) }}"></td>
								<td><input type="date" name="support_end_date" value="{{ old('support_end_date' ,$list->support_end_date) }}"></td>

								<td>
									<div class="btnContainer"  id="{{ 'save' . $list->id }}">
										<a href="javascript:saveform{{ $list->id }}.submit()" class="squareBtn btn-medium" style="width: 70px;">保存</a>
									</div><!-- /.btn-container -->
								</td>
							</tr>
							<tr class="bd-bottom">
								<td>
									<textarea class="form-mt" name="prod_serial" id="" cols="30" rows="1" placeholder="製品シリアル">{{ old('prod_serial' ,$list->prod_serial) }}</textarea>
								</td>
								<td><input type="text" name="claim_no" value="{{ old('claim_no' ,$list->claim_no)  }}" placeholder="請求No."></td>
								<td colspan="3">
									<textarea class="form-mt" name="comment" id="" cols="30" rows="1" placeholder="備考">{{ old('comment' ,$list->comment) }}</textarea>
								</td>
								<td><input type="checkbox" name="del_flag" value="1">削除</td>
							</tr>
							{{ html()->form()->close() }}

						@endforeach

					</table>
@endif

				</div><!-- /.secContentsInner -->
			</section><!-- /.secContents -->
                    
		 </div><!-- /.containerContents -->

	</div><!-- /.mainContentsInner -->




@endsection
