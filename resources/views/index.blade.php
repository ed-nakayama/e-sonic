@extends('layouts.app')

@section('content')

<style>
/* 点滅 */
.blinking{
	-webkit-animation:blink 1.5s ease-in-out infinite alternate;
    -moz-animation:blink 1.5s ease-in-out infinite alternate;
    animation:blink 0.5s ease-in-out infinite alternate;
}
@-webkit-keyframes blink{
    0% {opacity:0;}
    100% {opacity:1;}
}
@-moz-keyframes blink{
    0% {opacity:0;}
    100% {opacity:1;}
}
@keyframes blink{
    0% {opacity:0;}
    100% {opacity:1;}
}
</style>


<!-- content --><!-- InstanceBeginEditable name="EditRegion3" -->
<div class="wrapper row3">
  <div id="container"> 
    <!-- 〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓 -->
	<div style="text-align: right;margin-bottom: 10px;">
		<a href="/cust" class="squareBtn" style="display:inline-block; background-color:#001E6F; color: #fff; text-align: center; width:140px; height:20px; padding: 5px 0;">お客様ログイン</a>
	</div>

    <div id="homepage" class="clear">

      <section class="main_slider"><img src="images/top-main.png" alt=""></section>
      <!-- 〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓 -->
      <section class="clear">
        <div class="two_third first">
          <article>
            <h2><img src="images/logo_e.png" alt="イーソニック">音波(Sonic Wave)、画像(Picuture)のコラボレーション！</h2>
            <!--画像があればコメント外す --> 
            <table>
            <tr>
              <td>
            <p>・ハードウェア設計（電子回路）から製造まで <br>
              ・ソフトウェア設計からプログラミングまで<br>
              ・マーケティングから販売まで <br>
              他にスマートフォンアプリ開発等行っております
              </p>
              </td>
              <td>
              		<font size="4" color="red">レンタルもしています。</font><br><br>
					<a href="/storage/parametric_doc/rental_price_list_20230701.pdf" target="_blank"><u>指向性超音波スピーカー レンタル価格表</u></a><br><br>
              </td>
              </tr>
			</table>
			
              <table style="border-style: none;">
              <tr>
              <td width="50%" align="center">

              <img src="images/catch.png" alt="catch"  style="width: 100%; height: auto;"><br><br>
               <a href="/parametric" style="font-size:1.4rem;text-decoration:underline;">パラメトリックスピーカーとは</a><br><br>

               <img src="parametric_images/IMG_1759_R_C.JPG" alt="parametric"  style="width: 80%; height: auto;"><br><br>
				<span  class="blinking" style="color:#ffffff; background-color:#ff0000; padding:2px 2px 2px 2px">NEW</span>
               <font size="4" color="red"><b>指向性超音波スピーカー<br>　　　　／標準コンパクトタイプ V2」</b></font><br>
               <div style="text-align: left;">
               <b>標準タイプと同じ個数の超音波素子に国産の小型タイプで、同程度の音圧でライトタイプのコンパクトさを実現！<br>
               国産の超音波素子の採用により、価格は上がってしまいますが、音質は従来品よりよくなっています。</b><br>
             </div>
               <b>本体価格：120,000円(税抜)</b>
             <a href="/storage/parametric_doc/parametoric_compact_V2_spec.pdf" target="_blank"><br><u>指向性超音波スピーカー<br>/標準コンパクトタイプ V2 基本仕様</u></a>
             <br><br>
               <div style="text-align: left;">
               <font size="3" color="red">騒音下での利用目的に超音波素子を増やしたカスタマイズ品の要望が増えています。</font>
             </div>
               <img src="parametric_images/item01.png" alt="parametric"  style="width: 80%; height: auto;"><br>
               <p style="color:red;font-size:1.2rem;font-weight:bold;">「指向性超音波スピーカー／大音圧タイプ<br>（カスタマイズ品／注文生産）」</p>
               <p style="font-weight:bold;">超音波素子 約 1,200個　　850,000円～　筐体は別途<br>
               	工場内、交通量の多い道路での使用を想定。
               </p>
             
			<br><br>
{{--
              <img src="parametric_images/light_type.JPG" alt="parametric"  style="width: 70%; height: auto;"><br><br>
               <font size="4" color="red"><b>「指向性超音波スピーカー<br>　　　　　　　／ライトタイプ）」</b></font><br>
               <B>コスト重視！Web会議にピッタリ！</b><br>
               <B>本体価格：70,000円(税抜)</b>
              <a href="/storage/parametric_doc/parametoric_light_spec.pdf" target="_blank"><br><u>指向性超音波スピーカー/ライトタイプ 基本仕様</u></a><br><br>
--}}
			<img src="parametric_images/IMG_1760_R_C.JPG" alt="parametric"  style="width: 80%; height: auto;"><br><br>
			<font size="4" color="red"><b>「指向性超音波スピーカー／標準タイプ」</b></font>
			<div style="text-align: left;">
			<b>海外製の超音波素子38個 直径16mmタイプで、10mm超音波素子より少ない個数で同等の音圧が得られます！</b><br>
			</div>
			<b>本体価格：100,000円(税抜)</b>
			<a href="/storage/parametric_doc/parametoric_standard_spec.pdf" target="_blank"><br><u>指向性超音波スピーカー/標準タイプ 基本仕様</u></a>
			<br><br><br>

              <img src="parametric_images/IMG_0447_R.JPG" alt="parametric"  style="width: 90%; height: auto;"><br><br>
               <font size="4" color="red"><b>「指向性超音波スピーカー<br>　　　　　　　／音圧アップタイプ）」</b></font><br>
               <font size="3">受注生産</font><br>
               <font size="3">特許第6707242号（特願2019-176180）</font>
             <a href="/storage/parametric_doc/parametoric_spl_up_spec.pdf" target="_blank"><br><u>指向性超音波スピーカー/音圧タイプ 基本仕様</u></a>
<!--             <a href="/storage/parametric_doc/parametoric_spl_up_mk2_spec.pdf" target="_blank"><br><u>指向性超音波スピーカー/音圧タイプMKⅡ 基本仕様</u></a>-->
<br>
<!--               <font size="5" color="red"><b>販売中！</b></font>-->
               <br><br>


              <table style="border-style: none; margin-left: 20px;">
              <tr><td>
              <a href="/storage/parametric_doc/parametric2.pdf" target="_blank"><br><u>指向性超音波スピーカー</u></a><br>
              ・日本の大手自動車部品メーカーのライセンスを受けて製造／販売しています。<br>
              ・筐体は別途有償にてカスタマイズ可能です。<br>
              ・筐体無しの販売も可能です。<br>
              </td></tr>
              </table>
               
            </td>
              <td width="50%" align="center">
              <img src="images/catch_beacon.png" alt="catch_beacon"  style="width: 100%; height: auto;"><br><br>
               <a href="/beacon" style="font-size:1.4rem;text-decoration:underline;">指向性超音波ビーコンとは</a><br><br>

              <img src="beacon_images/IMG_0399_R4.png" alt="SonicBeacon" style="width: 50%; height: auto;"><br><br>
              <font size="4"><font size="4" color="red"><b>「指向性超音波ビ－コン」</b></font></font><br>
              <a href="/storage/beacon_doc/beacon_spec.pdf" target="_blank"><u>指向性超音波ビーコン 基本仕様</u></a><br>
              <a href="/storage/beacon_doc/sonic_beacon_jirei.pdf" target="_blank"><br><u>特徴＆想定利用事例</u></a><br><br>
             <font size="4" color="red">最小構成 お試しセットをご用意！</font><br>
              <table style="border-style: none; margin-left: 20px;">
              <tr><td>
              ＜お試しセット＞<br>
              　・指向性超音波ビーコン 2台（追加購入可）<br>
              　・SDKおよびランタイム (Android用 または iOS用)<br>
              　・サンプルアプリ (Android版 または iOS版)<br>
              　・ID書き換えプログラム (Windows版)<br>
              　・受信ID確認アプリ (Android版)<br>
              　・各種ドキュメント
              </td></tr>
              </table>
              <table style="border-style: none; margin-left: 20px;">
              <tr><td>
              <a href="/storage/beacon_doc/sonic_beacon.pdf" target="_blank"><br><u>指向性超音波ビ－コン</u></a>
              <a href="/storage/beacon_doc/sonic_beacon2.pdf" target="_blank"><u>Newパンフレット</u></a><br>
              ・日本の大手自動車部品メーカーのライセンスを受けて製造／販売しています。<br>
              ・設置場所により有償で筐体のカスタマイズも承ります。<br>
              ・自社でアプリ開発をしたいお客様のため、個別販売も対応します。<br>
              ・筐体無しの販売も可能です。<br>
              ・装置の単体販売も承ります。<br><br>
              ※最小購入台数あり<br><br>
              </td></tr>
               <tr><td align="center">
             <font size="4" color="red">カスタマイズも可能！</font><br><br>
              <img src="beacon_images/customize.JPG" alt="customize" style="width: 65%; height: auto;"><br>
              指向性超音波ビ－コン　カスタマイズ試作品<br>
              （騒音下、５mを超える距離対応品として製作）
              </td></tr>
             </table>
              </td>
              </tr>
              <tr align="center">
              <td colspan="2"><br>
                 <font size="4"><b>弊社にて直接購入可能ですので、お気軽に<a href="/contact_contactus.php"><u>お問い合わせ</u></a>ください。</b></font>
              </td>
              </tr>
            </table>
            <!--footer class="read-more"><a href="service_service01.php">さらに詳しく読む &raquo;</a></footer-->
          </article>
        </div>
        <div class="one_third">
          <h2>TOPICS</h2>
          <ul class="nospace spacing clear">
            <li>
              <figure class="clear">
                <figcaption>20225/02/20<br>
                  　<b><font color="red">「指向性超音波スピーカー<br>　　／標準コンパクトタイプ V2」　販売開始！</font></b><br>
                  　　<b>従来の国産素子を37個から61個に増量で価格据え置き！</b><br><br>

                <figcaption>2024/06/26<br>
                  　<b><a href="https://metoree.com/">「メトリー」</a>に掲載されました。</b><br>
                  　<b><a href="https://metoree.com/categories/8754/">「パラメトリックスピーカー」</a>の監修もしています。</font><br><br>
                  
                <figcaption>2024/05/31<br>
                  　<b><font color="red">「指向性超音波スピーカー<br>　　／大音圧タイプ」　カスタマイズ提供開始！</font></b><br>
                  　　<b>超音波素子を大幅に増やすことにより騒音下での利用可能！</b><br><br>

                <figcaption>2022/04/01<br>
                  　<b><font color="red">「指向性超音波スピーカー<br>　　／標準コンパクトタイプ」　販売開始！</font></b><br>
                  　　<b>国産小型素子採用によりコンパクトで標準タイプと同等の音圧を実現。さらに音質もアップ！</b><br><br>
                <figcaption>2021/11/01<br>
                  　<b><font color="red">事務所移転</font>しました。</b><br><br>
                <figcaption>2021/07/01<br>
                  　<b><font color="red">電話番号が変更</font>になりました。</b><br><br>

                <figcaption>2021/03/02<br>
                  　<b><font color="red">センサイト・プロジェクト</font>に寄稿。</b><br>
                  <b>　　<a href="https://sensait.jp/16176/" style="text-decoration:underline;">「超音波屋内位置測位技術(1)」</u></a></b><br>
                  <b>　　<a href="https://sensait.jp/16198/" style="text-decoration:underline;">「超音波屋内位置測位技術(2)」</u></a></b><br>
				<br>
                <figcaption>2020/03/09<br>
                  　<b><font color="red">「指向性超音波スピーカー／ライト」<br>
                  　　　販売開始！　<b>コスト重視！</b></font><br><br>
                <figcaption>2020/02/23<br>
                  　<b>「屋外対応 指向性超音波スピーカー／ライト」<br>
                  　　3月初旬 販売開始！　コスト重視！</b><br><br>
                <figcaption>2020/02/19<br>
                  　<b><font color="red">「屋外対応 指向性超音波スピーカー<br>　　　　　／音圧アップタイプMKⅡ」　販売開始！</font></b><br>
                  　　<b>新素子採用＆最大対応電圧変更で<br>　　　　さらに音圧アップ！</b><br><br>
                <figcaption>2019/09/30<br>
                  　<b>「屋外対応 指向性超音波スピーカー<br>　　　　　　　　　　／音圧アップタイプ」</b><br>
                  　　<b>販売開始！</b><br><br>
                <figcaption>2019/09/12<br>
                  　<b>「屋外対応 指向性超音波スピーカー<br>　　　　　　　　　　／音圧アップタイプ」</b><br>
                  　　ただいま製作中！<br>
                  　　9月下旬～10月上旬に販売開始予定！<br><br>
                <figcaption>2019/06/19～21<br>
                  <b>「<a href="/casestudy/case02"><u>第7回 看板・ディスプレイ EXPO【夏】(旧称：店舗販促EXPO)</u></a></b>」に出展しました。<br>
                   会期： 2019年6月19日(水)～21日(金)<br>
                   会場： 東京ビッグサイト
                  <br><br>
                <figcaption>2019/05/21<br>
                  <b>「第7回 看板・ディスプレイ EXPO 夏</b>」に出展します。<br>
                   会期： 2019年6月19日(水)～21日(金)<br>
                   会場： 東京ビッグサイト
                  <br><br>
                 <figcaption>2019/01/30<br>
                  　<b>指向性超音波スピーカー(オールインワン タイプ)</b><br>
                  　法人向けレンタルを2月中旬より開始！<br>
                  　お試しレンタルも1日 5,000円～<br>
                  　展示会など短期のイベントにも利用可能です。
                  <br><br>
               <figcaption>2019/01/01<br>
                  　<b>指向性超音波ビーコン</b> 販売開始！
                  <br><br>
                <figcaption>2015/01/09<br>
                  ギャラリー追加！ 
                  <br><br>
                <figcaption>2013/06/06<br>
                  ホームページリニューアル！ 
                  <!--<footer class="read-more"><a href="#">さらに詳しく読む &raquo;</a></footer> --> 
                </figcaption>
              </figure>
            </li>
            <!--            <li>
              <figure class="clear">
                <div class="imgl boxholder"><img src="images/demo/80x80.gif" alt=""></div>
                <figcaption>画像があるパターンはこちらこちらに記事を書いてください。
                  <footer class="read-more"><a href="#">さらに詳しく読む &raquo;</a></footer>
                </figcaption>
              </figure>
            </li> --> 
            <!--記事追加 --> 
            <!--            <li>
              <figure class="clear">
                <div class="imgl boxholder"><img src="images/demo/80x80.gif" alt=""></div>
                <figcaption>画像があるパターンはこちらこちらに記事を書いてください。
                  <footer class="read-more"><a href="#">さらに詳しく読む &raquo;</a></footer>
                </figcaption>
              </figure>
            </li> -->
          </ul>
        </div>
      </section>
      <!-- 〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓 --> 
    </div>
    <!-- 〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓 -->
    <div class="clear"></div>
  </div>
</div>

@endsection
