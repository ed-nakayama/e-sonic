<?php

namespace App\Http\Controllers\Cust;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:cust');
    }


/***************************************************
* public ダウンロード
****************************************************/
    public function pub(Request $request)
    {
		$filePath = 'public' . $request->file_path;

		$info = pathinfo($filePath);
		$fileName = $info['basename'];

		$mimeType = Storage::mimeType($filePath);

		$headers = [['Content-Type' => $mimeType]];

		return Storage::download($filePath, $fileName, $headers);

    }


/***************************************************
* secure ダウンロード
****************************************************/
    public function secure(Request $request)
    {
		$filePath = 'secure' . $request->file_path;

		$info = pathinfo($filePath);
		$fileName = $info['basename'];

		$mimeType = Storage::mimeType($filePath);

		$headers = [['Content-Type' => $mimeType]];

		return Storage::download($filePath, $fileName, $headers);

    }





}
