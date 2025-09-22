<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projects;
use App\Models\Allocations;
use App\Models\Teammember;

class StudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Projects::orderBy('id', 'desc')->first();
        $alloc = Allocations::where('project_id','=', $data->id)->first();
        $teams = Teammember::where('project_id','=', $data->id)->first();
        return view('study.index',compact('data','alloc','team'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function current()
    {
        $data = Projects::orderBy('id', 'desc')->first();
        $alloc = Allocations::where('project_id','=', $data->id)->first();
        return view('study.current', compact('data','alloc'));
    }
    public function recomendate()
    {
        $data = Projects::orderBy('id', 'desc')->first();
        $alloc = Allocations::where('project_id','=', $data->id)->first();
        return view('study.recomendate', compact('data','alloc'));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
