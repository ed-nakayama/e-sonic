@extends('layouts.app')

@section('content')

<div class="sdw"></div>
<!-- content --><!-- InstanceBeginEditable name="EditRegion3" -->
<div class="wrapper row3">
  <div id="container">
    <div class="three_quarter first">
      <section class="clear">
        <h1>アクセス</h1>
        <div>{{ config('const.comp_name') }}<br>
        〒{{ config('const.comp_zip') }}
          {{ config('const.comp_address') }}
          {{ config('const.comp_bld') }}<br>
          <br>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3240.2234134489445!2d139.7682230122493!3d35.696119429039925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188c02dce1f741%3A0xb00c84b875e4b34!2z44CSMTAxLTAwNDEg5p2x5Lqs6YO95Y2D5Luj55Sw5Yy656We55Sw6aCI55Sw55S677yR5LiB55uu77yX4oiS77yYIFZvcnQg56eL6JGJ5Y6fIElW!5e0!3m2!1sja!2sjp!4v1744228250854!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <br />
          </div>
      </section>
    </div>
    <!-- 〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓 -->
    <div id="sidebar_1" class="sidebar one_quarter">
      <aside> 
        <!-- 〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓 -->
        <h2>会社概要</h2>
        <nav>
          <ul>
            <li><a href="/corporate/outline">会社概要</a></li>
            <li><a href="/corporate/policy">カンパニーポリシー</a></li>
            <li><a href="/corporate/access" class="last">アクセス</a></li>
          </ul>
        </nav>
        <!-- /nav --> 
        <!-- /section --> 
        <!-- 〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓 --> 
      </aside>
    </div>
    <!-- 〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓 -->
    <div class="clear"></div>
  </div>
</div>

@endsection
