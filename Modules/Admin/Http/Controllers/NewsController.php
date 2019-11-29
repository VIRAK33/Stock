<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use DB;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data['news'] = DB::table('news')
        ->where('active', 1)
        ->orderBy('id', 'desc')
        ->paginate(config('app.row'));
    return view('admin::news.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::news.create');
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
            'description' => $request->description,
           

        );
        if($request->photo)
        {
            $data['photo'] = $request->file('photo')->store('uploads/news', 'custom');
            @unlink($news->photo);
        }
        $i = DB::table('news')->insert($data);
        if($i)
        {
            return redirect('admin/news/create')->with('success', 'Data has been saved!');
        }
        else{
            sess()->flash('error', 'Fail to save data!');
            return redirect('admin/news/create')->withInput();
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
        $news = DB::table('news')->find($id);
        return view('admin::news.edit', compact('news'));
        //return view('admin::news.edit', ['news'=>DB::table('news')->find($id)]);
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
            'description' => $request->description,
           

        );
        $news = DB::table('news')->find($id);
        if($request->photo)
        {
            $data['photo'] = $request->file('photo')->store('uploads/news', 'custom');
            @unlink($news->photo);
        }
        $i = DB::table('news')
            ->where('id', $id)
            ->update($data);
        if($i)
        {
            return redirect('admin/news')->with('success', 'Data has been saved!');
        }
        else{
            sess()->flash('error', 'Fail to save data!');
            return redirect()->route('news.edit', $id);
        }
    }

    public function delete($id)
    {
        DB::table('news')
            ->where('id', $id)
            ->update(['active'=>0]);
        return redirect('admin/news')->with('success', 'Data has been removed!');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
