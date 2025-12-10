<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use App\Models\AccessReferer;
use App\Models\InqueryReferer;

class RefererController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }


/***************************************************
* Access Referer
****************************************************/
    public function access_referer(Request $request)
    {
		$referer = '';
        
		if (!empty($request->referer)) {
			$referer = $request->referer;

			$list = AccessReferer::where('url', 'like', "%{$referer}%")
			->orderBy('id', 'DESC')
				->paginate(30);
        } else {
			$list = AccessReferer::orderBy('id', 'DESC')
				->paginate(30);
		}

		$dist_list = AccessReferer::groupBy('url')
			->selectRaw('url, count(*) as count')
			->orderBy('count', 'DESC')
			->get();
        
		$mon1  = date("Y-m");
		$mon2  = date('Y-m', strtotime('-1 month'));
		$mon3  = date('Y-m', strtotime('-2 month'));
		$mon4  = date('Y-m', strtotime('-3 month'));
		$mon5  = date('Y-m', strtotime('-4 month'));
		$mon6  = date('Y-m', strtotime('-5 month'));
		$mon7  = date('Y-m', strtotime('-6 month'));
		$mon8  = date('Y-m', strtotime('-7 month'));
		$mon9  = date('Y-m', strtotime('-8 month'));
		$mon10 = date('Y-m', strtotime('-9 month'));
		$mon11 = date('Y-m', strtotime('-10 month'));
		$mon12 = date('Y-m', strtotime('-11 month'));

		$cnt = 0;
		foreach ($dist_list as $dist) {
			$monCnt = AccessReferer::select(
				\DB::raw('count(id) as count'),
				\DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month_year")
				);
				
			if (!empty($dist->url)) {
				$monCnt = $monCnt->where('url', $dist->url);
			} else {
				$monCnt = $monCnt->where(function($query) {
				    $query->whereNull('url')
						->orWhere('url' ,'');
				});
			}
			
			$monCnt = $monCnt->where('created_at', '>=', Carbon::now()->subMonths(12))
				->groupBy('month_year')
				->get();

				$dist_list[$cnt]->mon1  = 0;
				$dist_list[$cnt]->mon2  = 0;
				$dist_list[$cnt]->mon3  = 0;
				$dist_list[$cnt]->mon4  = 0;
				$dist_list[$cnt]->mon5  = 0;
				$dist_list[$cnt]->mon6  = 0;
				$dist_list[$cnt]->mon7  = 0;
				$dist_list[$cnt]->mon8  = 0;
				$dist_list[$cnt]->mon9  = 0;
				$dist_list[$cnt]->mon10 = 0;
				$dist_list[$cnt]->mon11 = 0;
				$dist_list[$cnt]->mon12 = 0;

			foreach ($monCnt as $monC) {
				
				if ($monC->month_year == $mon1)  $dist_list[$cnt]->mon1  = $monC->count;
				if ($monC->month_year == $mon2)  $dist_list[$cnt]->mon2  = $monC->count;
				if ($monC->month_year == $mon3)  $dist_list[$cnt]->mon3  = $monC->count;
				if ($monC->month_year == $mon4)  $dist_list[$cnt]->mon4  = $monC->count;
				if ($monC->month_year == $mon5)  $dist_list[$cnt]->mon5  = $monC->count;
				if ($monC->month_year == $mon6)  $dist_list[$cnt]->mon6  = $monC->count;
				if ($monC->month_year == $mon7)  $dist_list[$cnt]->mon7  = $monC->count;
				if ($monC->month_year == $mon8)  $dist_list[$cnt]->mon8  = $monC->count;
				if ($monC->month_year == $mon9)  $dist_list[$cnt]->mon9  = $monC->count;
				if ($monC->month_year == $mon10) $dist_list[$cnt]->mon10 = $monC->count;
				if ($monC->month_year == $mon11) $dist_list[$cnt]->mon11 = $monC->count;
				if ($monC->month_year == $mon12) $dist_list[$cnt]->mon12 = $monC->count;
			}

			$cnt++;
		}

		return view('admin/access_referer' ,
		[
			'referer' => $referer,
			'list' => $list,
			'dist_list' => $dist_list,
		]);

    }


/***************************************************
* Inquery Referer
****************************************************/
    public function inquery_referer(Request $request)
    {
		$referer = '';

		if (!empty($request->referer)) {
			$referer = $request->referer;
        
			$list = InqueryReferer::where('url', 'like', "%{$referer}%")
				->orderBy('id', 'DESC')
				->paginate(30);

        } else {
			$list = InqueryReferer::orderBy('id', 'DESC')
				->paginate(30);
		}

		$dist_list = InqueryReferer::groupBy('url')
			->selectRaw('url, count(*) as count')
			->orderBy('count', 'DESC')
			->get();

		$mon1  = date("Y-m");
		$mon2  = date('Y-m', strtotime('-1 month'));
		$mon3  = date('Y-m', strtotime('-2 month'));
		$mon4  = date('Y-m', strtotime('-3 month'));
		$mon5  = date('Y-m', strtotime('-4 month'));
		$mon6  = date('Y-m', strtotime('-5 month'));
		$mon7  = date('Y-m', strtotime('-6 month'));
		$mon8  = date('Y-m', strtotime('-7 month'));
		$mon9  = date('Y-m', strtotime('-8 month'));
		$mon10 = date('Y-m', strtotime('-9 month'));
		$mon11 = date('Y-m', strtotime('-10 month'));
		$mon12 = date('Y-m', strtotime('-11 month'));

		$cnt = 0;
		foreach ($dist_list as $dist) {
			$monCnt = InqueryReferer::select(
				\DB::raw('count(id) as count'),
				\DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month_year")
				);

			if (!empty($dist->url)) {
				$monCnt = $monCnt->where('url', $dist->url);
			} else {
				$monCnt = $monCnt->where(function($query) {
				    $query->whereNull('url')
						->orWhere('url' ,'');
				});
			}

			$monCnt = $monCnt->where('created_at', '>=', Carbon::now()->subMonths(12))
				->groupBy('month_year')
				->get();

				$dist_list[$cnt]->mon1  = 0;
				$dist_list[$cnt]->mon2  = 0;
				$dist_list[$cnt]->mon3  = 0;
				$dist_list[$cnt]->mon4  = 0;
				$dist_list[$cnt]->mon5  = 0;
				$dist_list[$cnt]->mon6  = 0;
				$dist_list[$cnt]->mon7  = 0;
				$dist_list[$cnt]->mon8  = 0;
				$dist_list[$cnt]->mon9  = 0;
				$dist_list[$cnt]->mon10 = 0;
				$dist_list[$cnt]->mon11 = 0;
				$dist_list[$cnt]->mon12 = 0;

			foreach ($monCnt as $monC) {
				
				if ($monC->month_year == $mon1)  $dist_list[$cnt]->mon1  = $monC->count;
				if ($monC->month_year == $mon2)  $dist_list[$cnt]->mon2  = $monC->count;
				if ($monC->month_year == $mon3)  $dist_list[$cnt]->mon3  = $monC->count;
				if ($monC->month_year == $mon4)  $dist_list[$cnt]->mon4  = $monC->count;
				if ($monC->month_year == $mon5)  $dist_list[$cnt]->mon5  = $monC->count;
				if ($monC->month_year == $mon6)  $dist_list[$cnt]->mon6  = $monC->count;
				if ($monC->month_year == $mon7)  $dist_list[$cnt]->mon7  = $monC->count;
				if ($monC->month_year == $mon8)  $dist_list[$cnt]->mon8  = $monC->count;
				if ($monC->month_year == $mon9)  $dist_list[$cnt]->mon9  = $monC->count;
				if ($monC->month_year == $mon10) $dist_list[$cnt]->mon10 = $monC->count;
				if ($monC->month_year == $mon11) $dist_list[$cnt]->mon11 = $monC->count;
				if ($monC->month_year == $mon12) $dist_list[$cnt]->mon12 = $monC->count;
			}
			$cnt++;
		}

		return view('admin/inquery_referer' ,
		[
			'referer' => $referer,
			'list' => $list,
			'dist_list' => $dist_list,
		]);

    }
}
