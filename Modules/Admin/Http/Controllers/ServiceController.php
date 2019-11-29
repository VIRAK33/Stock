<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use DB;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data['service'] = DB::table('service')
        ->where('active', 1)
        ->paginate(config('app.row'));
        return view('admin::service.index', $data);

   
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::service.create');
    
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = array(
            'title' =>$r->title,
            'description' => $r->description,
            'icon' => $r->icon
        );
        
        $i=DB::table('service')->insert($data);
        if($i){
            return redirect()->route('service.create')
            ->with('success', 'Data success');
        }
        else{
            session()->flash('error', 'Fail to save data!');
            return redirect()->route('service.create')
                ->withInput();
        }
    }


    public function delete($id, Request $r){
        DB:: table('service')
        ->where('id', $id)
        //->delete();
        ->update(['active'=>0]);
        $r->session()->flash('success', 'Data has been removed!');
        return redirect()->route('service.index');
    }


    public function update($id,Request $r){
        $data = array(
            'title'=>$r->title,
            'icon'=>$r->icon,
            'description' => $r->description

        );
        $i = DB::table('service')
        ->where('id', $id)
        ->update($data);

        if($i){
            return redirect('admin/service')->with('success', 'Data has been saved!');
        }else{
            $r->session()->flash('error', 'Data update fail!');
           // return redirect()->route('service.edit', $id)->withInput();
           return redirect()->route('service.edit', $id);
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
        $data['service']=DB::table('service')->find($id);
        
        return view('admin::service.edit', $data);
    }

  
    public function destroy($id)
    {
        //
    }
}
