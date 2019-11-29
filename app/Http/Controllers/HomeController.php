<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
   
    public function index()
    {
            $data['slides'] = DB::table('slides')
            ->where('active', 1)
            ->orderBy('sequence')
            ->paginate(config('app.row'));
            $data['about'] = DB::table('abouts')->find(1);
            $data['services'] = DB::table('service')
            ->where('active' ,1)
            ->get();

            $data['teams'] = DB::table('teams')
            ->where('active', 1)
            ->get();

            $data['news'] = DB::table('news')
            ->where('active', 1)
            ->get();
        // dd($data);
        return view('index',$data);
    }
}
