<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use DB;
class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data['teams'] = DB::table('teams')
        ->where('active', 1)
        ->orderBy('id', 'desc')
        ->paginate(config('app.row'));
    return view('admin::teams.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::teams.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'min:3|required'
        ]);
        $data = array(
            'name' => $request->name,
            'position' => $request->position,
            'profile' => $request->profile,
            'facebook' => $request->facebook,
            'linkin' => $request->linkin

        );
        if($request->photo)
        {
            $data['photo'] = $request->file('photo')->store('uploads/teams', 'custom');
            @unlink($slide->photo);
        }
        $i = DB::table('teams')->insert($data);
        if($i)
        {
            return redirect('admin/team/create')->with('success', 'Data has been saved!');
        }
        else{
            sess()->flash('error', 'Fail to save data!');
            return redirect('admin/team/create')->withInput();
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
        // $team = DB::table('teams')->find($id);
        // return view('admin::teams.edit', compact('team'));
        return view('admin::teams.edit', ['team'=>DB::table('teams')->find($id)]);
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
            'name' => 'min:3|required'
        ]);
        $data = array(
            'name' => $request->name,
            'position' => $request->position,
            'profile' => $request->profile,
            'facebook' => $request->facebook,
            'linkin' => $request->linkin
        );
        $team = DB::table('teams')->find($id);
        if($request->photo)
        {
            $data['photo'] = $request->file('photo')->store('uploads/teams', 'custom');
            unlink($team->photo);
        }
        $i = DB::table('teams')
            ->where('id', $id)
            ->update($data);
        if($i)
        {
            return redirect('admin/team')->with('success', 'Data has been saved!');
        }
        else{
            sess()->flash('error', 'Fail to save data!');
            return redirect()->route('team.edit', $id);
        }
    }
    public function delete($id)
    {
        DB::table('teams')
            ->where('id', $id)
            ->update(['active'=>0]);
        return redirect('admin/team')->with('success', 'Data has been removed!');
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
