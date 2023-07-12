<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyek = project::all();
        foreach ($proyek as $status) {
            switch ($status->status) {
                case '1':
                    $sts[] = 'Pending';
                    break;
                case '2':
                    $sts[] = 'Progress';
                    break;
                case '3':
                    $sts[] = 'Finished';
                    break;
            }
        }
        return view('menus.data-project',compact('proyek','sts'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menus.create-project');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        project::create([
            'name' => $request->name,
            'start_date' => $request->start_date,
            'finish_date' => $request->finish_date,
            'status' => $request->status,
        ]);
        
        return redirect()->route('dataProject.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proyek = project::find($id);
        switch ($proyek->status) {
            case '1':
                $sts = 'Pending';
                break;
            case '2':
                $sts = 'Progress';
                break;
            case '3':
                $sts = 'Finished';
                break;
        }
        return view('menus.edit-project',compact('proyek', 'sts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $proyek = project::find($id);
        $proyek->update([
            'name' => $request->name,
            'start_date' => $request->start_date,
            'finish_date' => $request->finish_date,
            'status' => $request->status,
        ]);
        
        return redirect()->route('dataProject.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = project::find($id);
        $delete->delete();
        return redirect()->route('dataProject.index');
    }
}
