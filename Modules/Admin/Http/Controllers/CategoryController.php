<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data['categories'] = DB::table('categories')
            ->where('active', 1)
            ->paginate(config('app.row'));
        return view('admin::categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::categories.create');
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
            'category' => $request->category,
        );
        $i = DB::table('categories')->insert($data);
        if($i)
        {
            return redirect('admin/category/create')->with('success', 'Data has been saved!');
        }
        else{
            sess()->flash('error', 'Fail to save data!');
            return redirect('admin/category/create')->withInput();
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
        // $slide = DB::table('slides')->find($id);
        // return view('admin::slides.edit', compact('slide'));
        return view('admin::categories.edit', ['category'=>DB::table('categories')->find($id)]);
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
            'category' => $request->category
           
        );
        $i = DB::table('categories')
            ->where('id', $id)
            ->update($data);
        if($i)
        {
            return redirect('admin/category')->with('success', 'Data has been saved!');
        }
        else{
            sess()->flash('error', 'Fail to save data!');
            return redirect()->route('category.edit', $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function delete($id)
    {
        DB::table('categories')
            ->where('id', $id)
            ->update(['active'=>0]);
        return redirect('admin/category')->with('success', 'Data has been removed!');
    }
}
