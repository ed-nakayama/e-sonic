<?php

namespace App\Http\Controllers\Cust;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResetCompleteController extends Controller
{
    public function index()
    {
      return view('cust.auth.passwords.complete');
    }

}
