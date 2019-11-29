<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Auth;
use DB;
class SlideShowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data['slides'] = DB::table('slides')
            ->where('active', 1)
            ->orderBy('id', 'desc')
            ->paginate(config('app.row'));
        return view('admin::slides.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::slides.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'min:9|required'
        ]);
        $data = array(
            'title' => $request->title,
            'short_description' => $request->description,
            'sequence' => $request->order
        );
        if($request->photo)
        {
            $data['photo'] = $request->file('photo')->store('uploads/slides', 'custom');
            @unlink($slide->photo);
        }
        $i = DB::table('slides')->insert($data);
        if($i)
        {
            return redirect('admin/slide/create')->with('success', 'Data has been saved!');
        }
        else{
            sess()->flash('error', 'Fail to save data!');
            return redirect('admin/slide/create')->withInput();
        }
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
        return view('admin::slides.edit', ['slide'=>DB::table('slides')->find($id)]);
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
            'title' => 'min:9|required'
        ]);
        $data = array(
            'title' => $request->title,
            'short_description' => $request->description,
            'sequence' => $request->order
        );
        $slide = DB::table('slides')->find($id);
        if($request->photo)
        {
            $data['photo'] = $request->file('photo')->store('uploads/slides', 'custom');
            unlink($slide->photo);
        }
        $i = DB::table('slides')
            ->where('id', $id)
            ->update($data);
        if($i)
        {
            return redirect('admin/slide')->with('success', 'Data has been saved!');
        }
        else{
            sess()->flash('error', 'Fail to save data!');
            return redirect()->route('slide.edit', $id);
        }
    }
    public function delete($id)
    {
        DB::table('slides')
            ->where('id', $id)
            ->update(['active'=>0]);
        return redirect('admin/slide')->with('success', 'Data has been removed!');
    }
}
