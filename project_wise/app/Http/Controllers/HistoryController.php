<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Projects;
use App\Models\Allocations;
use App\Models\Teammember;
use App\Models\Projectcategory;
use App\Models\Risk;
use Illuminate\Support\Facades\DB;
use App\Models\Projectx;
use App\Models\Rawriskdata;
use App\Models\Rawtechdata;
use App\Models\Rawteamdata;
use App\Models\Outputs;
use App\Models\Recomendations;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $data = Projects::all();
        // $data = DB::table('projectx')->get();
        return view('history.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $data = Projects::where('id', '=', $id)->first();
        $alloc = Allocations::where('project_id','=', $data->id)->first();
        $teams = Teammember::where('allocation_id','=', $alloc->id)->first();   
        $resiko = Risk::where('project_id','=', $data->id)->get();   
        $totalImpact = $resiko->sum('val');
        $countImpact = $resiko->count('val');
        return view('history.list',compact('data','alloc','teams','resiko','totalImpact','countImpact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Projects::where('id', '=', $id)->first();
        $alloc = Allocations::where('project_id','=', $data->id)->first();
        $teams = Teammember::where('allocation_id','=', $alloc->id)->first();   
        $resiko = Risk::where('project_id','=', $data->id)->get();   
        $totalImpact = $resiko->sum('val');
        $countImpact = $resiko->count('val');
        return view('history.list',compact('data','alloc','teams','resiko','totalImpact','countImpact'));
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
