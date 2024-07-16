{{ $customer->name }} {{ $prodList->person_name }}　様

修理依頼が完了しました。
後ほどメールまたはお電話にてご連絡させていただきますので
しばらくお待ちください。
どうぞよろしくお願い致します。

【お客様名】
{{ $customer->name }}

【住所】
〒{{ $customer->zip_code }} {{ $customer->address }}

【部署名】
{{ $customer->unit_name }}

【担当者名】
{{ $customer->person_name }}

【電話番号】
{{ $customer->tel }}

【メールアドレス】
{{ $customer->email }}

【製品名】
{{ $prodList->prod_name }}

【製品シリアル】
{{ $prodList->prod_serial }}

【お買上げ年月日】
{{ $prodList->buy_date }}

【保守期間】
{{ $prodList->support_start_date }} ～ {{ $prodList->support_end_date }}

【障害内容】
{{ $content }}

@include('mail_templates.sign')