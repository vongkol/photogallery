<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            app()->setLocale(Session::get("lang"));
             return $next($request);
         });
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["categories"] = DB::table('categories')
        ->where('active',1)
        ->get();

        $data["gallerys"] = DB::table('gallerys')
        ->join('categories', 'categories.id', '=', 'gallerys.category_id')
        ->where('gallerys.active',1)
        ->paginate(25);
        return view('upload_gallerys.index', $data);
    }
}
