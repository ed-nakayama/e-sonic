@extends('layouts.pdf')

@section('content')

	<div class="mainContents">
		<div class="mainContentsInner">
			<div class="containerContents">
				<section class="secContents">

					<div class="containerTblUserInfo" style="max-width: 85%;">
						<div class="tblCaption">
							<h2 class="tblCaptionTitle" style="font-size: 28px; text-align:center;">開発SDK（開発キット）ライセンス</h2>
						</div><!-- /.tblCaption -->

						<table class="tbl-Warranty">
						<tr>
							<th>型名</th><td>{{ $prodList->prod_name }}</td>
						</tr>
						<tr>
							<th>お買い上げ年月日</th><td>{{ substr($prodList->buy_date,0,4) }}年{{ substr($prodList->buy_date,5,2) }}月{{ substr($prodList->buy_date,8,2) }}日</td>
						</tr>
						</table>
<br>
						<table class="tbl-Warranty2">
						<tr>
							<th rowspan="4" style="width:10%;">お客様</th><th  style="width:10%;">ご住所</th><td>〒 {{ $customer->zip_code }}<br>{{ $customer->address }}</td>
						</tr>
						<tr>
							<th>電話番号</th><td>{{ $customer->tel }}</td>
						</tr>
						<tr>
							<th rowspan="2" >お名前</th><td>（フリガナ）  {{ $customer->name_kana }}</td>
						</tr>
						<tr>
							<td> {{ $customer->name }}　様</td>
						</tr>
						</table>
<br>
						<table style="width: 90%;margin:auto;">
						<tr>
							<td>
								＜開発SDK（開発キット）の使用＞<br>
								・開発ライセンスを購入した個人、および法人のみ使用することができます。<br>
								・開発ライセンスを購入した顧客がアプリ開発を第三者に委託する場合、その委託形態（請負、委任、<br>
								&nbsp;&nbsp;準委任、常駐型等）によらず、委託内容の範囲、期間に限り委託先にも一時的に当該ライセンスの<br>
								&nbsp;&nbsp;許諾が及ぶものとします。<br>
								&nbsp;&nbsp;※ただし、委託者は委託先が正しくライセンスを使用するように監督する責任を負います。<br>
								・上記条件を満たす限りにおいて、ライブライリを使用する人数、コンピューターの台数に制限は<br>
								&nbsp;&nbsp;ありません。<br>
								・その他、ライセンスの及ぶ範囲については経済産業省の『電子商取引及び情報財取引等に関する<br>
								&nbsp;&nbsp;準則 - 「電子商取引及び情報財取引等に関する準則」 - 「III 情報財の取引等に関する論点」 - <br>
								&nbsp;&nbsp;「III-6 ソフトウェアの使用許諾が及ぶ人的範囲」』に準拠するものとします。<br>
								&nbsp;&nbsp;https://www.meti.go.jp/policy/it_policy/ec/110627jyunsoku.html<br>
								＜禁止事項＞<br>
								・SDK（開発キット）の再配布。<br>
								&nbsp;&nbsp;当該SDK（開発キット）を使用して開発したアプリ内部には当該SDK（開発キット）が含まれますが、<br>
								&nbsp;&nbsp;その開発したアプリを配布することを禁止するものではありません。<br>
								・SDK（開発キット）の改変、逆アセンブル等の行為。<br>
								・開発ライセンスの譲渡、貸与、リース
							</td>
						</tr>
						</table>
<br>

					</div><!-- /.containerTblUserInfo -->   

				</section><!-- /.secContents -->
			</div><!-- /.containerContents -->
		 </div><!-- /.mainContentsInner -->
	</div><!-- /.mainContents -->

@endsection
