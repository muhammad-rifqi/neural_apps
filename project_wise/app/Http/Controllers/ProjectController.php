<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projects;
use App\Models\Sdlcs;
use App\Models\Technologys;
use App\Models\ExpertiseLevel;
use App\Models\Risktype;
use App\Models\Projecttype;
use App\Models\Allocations;
use App\Models\Projectscale;
use App\Models\Projectcategory;
use App\Models\Teammember;
use App\Models\Risk;
use Illuminate\Http\JsonResponse;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project = Projects::all();
        $sdlcs = Sdlcs::all();
        $techs = Technologys::all();
        $roles = ['System Administrator','Frontend Dev','Backend Dev'];
        $exp = ExpertiseLevel::all();
        $rt = Risktype::all();
        $pt = Projecttype::all();
        $ps = Projectscale::all();
        return view('project.index',compact('project','sdlcs','techs','roles','exp','rt','pt','ps'));

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
        
            $a = new Projects();
            $a->name = $request->project_name;
            $a->type_project = $request->project_type;
            $a->scale = $request->project_scale;
            $a->start_date = $request->start_date;
            $a->end_date = $request->end_date;
            if($a->save()){
                $lastId = $a->id;
                $b = new Projectcategory();
                $b->project_id = $lastId;
                $b->technology_type_id = $request->technology_use;
                $b->tools_name = $request->technology_use_description;
                if($b->save()){
                    $c = new Allocations();
                    $c->project_id = $lastId;
                    $c->sdlc_method_id = $request->sdlc;
                    $c->total_development_cost = $request->budge;
                    $c->additional_cost = $request->cost_estimate;
                    if($c->save()){
                        return response()->json(["success"=>true, "id_project" => $lastId , "id_allocation" => $c->id], 200);
                    }else{
                        return response()->json(["success"=>false], 500);                        
                    }
                }else{
                    return response()->json(["allocation"=>"failed"], 500);
                }
            }else{
                return response()->json(["project_type"=>"failed"], 500);
            }   
    }

    public function team(Request $request)
    {
        
            $a = new Teammember();
            $a->allocation_id = $request->id_allocation;
            $a->role = $request->role;
            $a->quantity = $request->quantity;
            $a->expertise_level_id = $request->level;
            $a->avg_salary = $request->salary;
            if($a->save()){
                return response()->json(["success"=>true], 200); 
            }else{
                return response()->json(["success"=>false], 500); 
            }

                   
    }

    public function risk(Request $request)
    {
        
            $a = new Risk();
            $a->project_id = $request->id_project;
            $a->risk_type_id = $request->risk_type;
            $a->description = $request->description;
            $a->impact_level = $request->impact_level;
            $a->likelihood = $request->likelihood;
            if($a->save()){
                return response()->json(["success"=>true], 200); 
            }else{
                return response()->json(["success"=>false], 500); 
            }

                   
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
