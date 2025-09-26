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
use Illuminate\Support\Facades\DB;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

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

    public function riskp()
    {
        $project = Projects::all();
        $sdlcs = Sdlcs::all();
        $techs = Technologys::all();
        $roles = ['System Administrator','Frontend Dev','Backend Dev'];
        $exp = ExpertiseLevel::all();
        $rt = Risktype::all();
        $pt = Projecttype::all();
        $ps = Projectscale::all();
        return view('project.risk',compact('project','sdlcs','techs','roles','exp','rt','pt','ps'));

    }

    public function teamp()
    {
        $project = Projects::all();
        $sdlcs = Sdlcs::all();
        $techs = Technologys::all();
        $roles = ['System Administrator','Frontend Dev','Backend Dev'];
        $exp = ExpertiseLevel::all();
        $rt = Risktype::all();
        $pt = Projecttype::all();
        $ps = Projectscale::all();
        return view('project.team',compact('project','sdlcs','techs','roles','exp','rt','pt','ps'));

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
        DB::beginTransaction();

        try {
            $a = new Projects();
            $a->name = $request->input('project_name');
            $a->type_project = $request->input('project_type');
            $a->scale = $request->input('project_scale');
            $a->start_date = $request->input('start_date');
            $a->end_date = $request->input('end_date');

            if (!$a->save()) {
                throw new \Exception("Project gagal disimpan");
            }

            $lastId = $a->id;

            $techData = [];
            foreach ($request->input('technology_use', []) as $tech) {
                $pch = explode("-",$tech['id']);
                $techData[] = [
                    'project_id'          => $lastId,
                    'technology_type_id'  => $pch[1],
                    'tools_name'          => $tech['name'],
                    'description'          => $tech['tools'],
                ];
            }

            if (!empty($techData)) {
                ProjectCategory::insert($techData);
            }

            $c = new Allocations();
            $c->project_id = $lastId;
            $c->sdlc_method_id = $request->input('sdlc');
            $c->total_development_cost = $request->input('budge');
            $c->additional_cost = $request->input('cost_estimate');

            if (!$c->save()) {
                throw new \Exception("Allocation gagal disimpan");
            }

            DB::commit();
            return response()->json([
                "success"      => true,
                "id_project"   => $lastId,
                "id_allocation"=> $c->id
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                "success" => false,
                "error"   => $e->getMessage()
            ], 500);
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
