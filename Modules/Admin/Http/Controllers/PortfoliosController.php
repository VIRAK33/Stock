<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use DB;

class PortfoliosController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data['portfolios'] = DB::table('portfolios')
            ->join('categories', 'portfolios.category_id' ,'=', 'categories.id')

            ->where('portfolios.active', 1)
            ->orderBy('portfolios.id', 'desc')
            ->select('portfolios.*', 'categories.title as cate_name' )
            ->paginate(config('app.row'));
        $data['categories'] = DB::table('categories')
        ->where('active', 1)
        ->paginate(config('app.row'));
            // dd($data);
        return view('admin::portfolios.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $data['categories'] = DB::table('categories')
            ->where('active', 1)
            ->paginate(config('app.row'));
            // dd($data);
        return view('admin::portfolios.create',$data );
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'min:3|required'
        ]);
        $data = array(
            'title' => $request->title,
            'photo' => $request->photo,
            'category_id' => $request->category_id,
            
        );
        if($request->photo)
        {
            $data['photo'] = $request->file('photo')->store('uploads/portfolios', 'custom');
            @unlink($slide->photo);
        }
        $i = DB::table('portfolios')->insert($data);
        if($i)
        {
            return redirect('admin/portfolios/create')->with('success', 'Data has been saved!');
        }
        else{
            sess()->flash('error', 'Fail to save data!');
            return redirect('admin/portfolios/create')->withInput();
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data = DB::table('portfolios')->find($id);
        dd($data);
        return view('admin::portfolios.edit', compact('portfolios'));
        
        //return view('admin::portfolios.edit', ['portfolios'=>DB::table('portfolios')->find($id)]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'min:3|required'
        ]);
        $data = array(
            'title' => $request->title,
            'photo' => $request->photo,
            'category_id' => $request->category_id,
        );
        $slide = DB::table('portfolios')->find($id);
        if($request->photo)
        {
            $data['photo'] = $request->file('photo')->store('uploads/portfolios', 'custom');
            unlink($slide->photo);
        }
        $i = DB::table('portfolios')
            ->where('id', $id)
            ->update($data);
        if($i)
        {
            return redirect('admin/portfolios')->with('success', 'Data has been saved!');
        }
        else{
            sess()->flash('error', 'Fail to save data!');
            return redirect()->route('portfolios.edit', $id);
        }
    }
    public function delete($id)
    {
        DB::table('portfolios')
            ->where('id', $id)
            ->update(['active'=>0]);
        return redirect('admin/portfolios')->with('success', 'Data has been removed!');
    }
}
