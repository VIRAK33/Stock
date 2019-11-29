<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use DB;
class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data['about'] = DB::table('abouts')
            ->where('id', 1)
            ->first();
        return view('admin::abouts.index', $data);
    }

   
    public function edit($id)
    {
        $data['about'] = DB::table('abouts')->find(1);
        return view('admin::abouts.edit', $data);
    }

    public function update(Request $r)
    {
        $data = array(
            'title' => $r->title,
            'description' => $r->description
        );
        if($r->photo)
        {
            $data['featured_photo'] = $r->file('photo')->store('uploads/abouts', 'custom');
        }
        $i = DB::table('abouts')
            ->where('id', 1)
            ->update($data);
        if($i)
        {
            return redirect('admin/about')
                ->with('success', 'Data has been saved!');
        }
        else{
            return redirect('admin/about/edit/1')
                ->with('error', 'Fail to save changes!');
        }
    }
}
