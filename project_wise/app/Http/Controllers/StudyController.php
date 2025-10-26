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
use App\Models\Derivedmetrics;

class StudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *1234
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list($id)
    {
        $data = DB::table('projectx')->where('id', '=', $id)->first();
        $tech = DB::table('raw_tech_data')->where('project_id', '=', $data->id)->get();
        $teams = DB::table('raw_team_data')->where('project_id', '=', $data->id)->get();
        $risk = DB::table('raw_risk_data')->where('project_id', '=', $data->id)->get();
        $output = DB::table('outputs')->where('project_id', '=', $data->id)->first();
        $rek = DB::table('recommendations')->where('project_id', '=', $data->id)->get();
        $metrix = DB::table('derivedMetrics')->where('project_id', '=', $data->id)->first();
        return view('study.index',compact('data','tech','teams','risk','output','rek','metrix'));
    }




    public function index($id)
    {
        $data = Projects::where('id', '=', $id)->first();
        $alloc = Allocations::where('project_id','=', $data->id)->first();
        $teams = Teammember::where('allocation_id','=', $alloc->id)->first();   
        $resiko = Risk::where('project_id','=', $data->id)->get();   
        $totalImpact = $resiko->sum('val');
        $countImpact = $resiko->count('val');
        return view('study.list',compact('data','alloc','teams','resiko','totalImpact','countImpact'));
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */

    public function current($id)
    {
        $data = Projects::where('id', '=', $id)->first();
        $alloc = Allocations::where('project_id','=', $data->id)->first();
        $teams = Teammember::where('allocation_id','=', $alloc->id)->get();
        $pc = Projectcategory::where('project_id','=', $data->id)->get();
        $ris = Risk::where('project_id','=', $data->id)->get();
        return view('study.current', compact('data','alloc','teams','pc','ris'));
    }
    public function recomendate($id)
    {
        $data = Projects::where('id', '=', $id)->first();
        $alloc = Allocations::where('project_id','=', $data->id)->first();
        $teams = Teammember::where('allocation_id','=', $alloc->id)->get();
        $pc = Projectcategory::where('project_id','=', $data->id)->get();
        $ris = Risk::where('project_id','=', $data->id)->get();
        return view('study.recomendate', compact('data','alloc','teams','pc','ris' ));
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
