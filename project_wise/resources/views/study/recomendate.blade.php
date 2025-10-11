@extends('layouts.apps')

@section('content')   
<style>
    .score-box {
      border-radius: 12px;
      background: #f8f9fa;
      padding: 30px;
      text-align: center;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }
    .score-value {
      font-size: 48px;
      font-weight: bold;
    }
    .score-label {
      font-size: 18px;
      font-weight: 600;
      margin-top: 10px;
    }
    .summary-box {
      border-radius: 12px;
      background: #fff;
      padding: 30px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }
    .nav-tabs .nav-link.active {
      font-weight: bold;
    }
    .top-buttons {
      text-align: right;
    }
    .top-buttons .btn {
      margin-left: 8px;
    }
  </style>

    @php
    $angka_bersih = str_replace(",", "", $alloc->ai_total_cost);
    $hasil = (int)$angka_bersih;

    $angka_bersih2 = str_replace(",", "", $alloc->ai_additional_cost);
    $hasil2 = (int)$angka_bersih2;
    @endphp

    <div class="container">
        <h1 align="center" style="margin-top:50px;">Great to see you, {{Auth::user()->name}}! These Are the Recomendation result for study Yuk Project.</h1>
        <hr/>
          <div class="container py-4">
            <!-- Top Buttons -->
            <div class="d-flex justify-content-end mb-3">
              <button class="btn btn-dark">Download Result</button> &nbsp;&nbsp;
              <button class="btn btn-outline-secondary">More</button>
            </div>

            <!-- Tabs -->
           <ul class="nav nav-tabs mb-4">
              <li class="nav-item">
                <a class="nav-link" href="{{url('study/'.$data->id)}}">Analysis &amp; Scoring</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('current/'.$data->id)}}">Current Plan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="{{url('recomendate/'.$data->id)}}">AI Recommendations</a>
              </li>
            </ul>

             <!-- Project Information -->
            <h5 class="section-title">Project Information</h5>
            <div class="row mb-3">
                <div class="col-md-4">
                <div class="label-text">Project Name</div>
                <input type="text"  class="form-control" value="{{$data->name}}" readonly>
                </div>
                <div class="col-md-4">
                <div class="label-text">Project Type</div>
                <input type="text"  class="form-control" value="{{$data->type_project}}" readonly>
                </div>
                <div class="col-md-4">
                <div class="label-text">Project Scale</div>
                <input type="text"   class="form-control" value="{{$data->scale}}" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                <div class="label-text">Estimated Budget</div>
                <input type="text"  class="form-control" value="Rp {{$hasil}}" readonly>
                </div>
                <div class="col-md-4">
                <div class="label-text">Estimated Additional Cost</div>
                <input type="text"  class="form-control" value="Rp {{$hasil2}}" readonly>
                </div>
                <div class="col-md-4">
                <div class="label-text">Life Cycle Method</div>
                <input type="text"  class="form-control" value="{{$alloc->sdlc_method_id}} week" readonly>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-4">
                <div class="label-text">Project Duration</div>
                <input type="text"  class="form-control" value="{{$alloc->ai_duration_weeks}}" readonly>
                </div>
            </div>

          
            <!-- Technology Section -->
            <h5 class="section-title">Technology, Programming Languages & Frameworks</h5>

            @foreach($pc as $projcat)
            <div class="row mb-2">
                <div class="col-md-3">
                <input type="text"  class="form-control" value="{{$projcat->tools_name}}" readonly>
                </div>
                <div class="col-md-9">
                <input type="text"  class="form-control" value="{{$projcat->description}}" readonly>
                </div>
            </div>
            @endforeach
            

            <h5 class="section-title">Team & Resource Allocation</h5>
                <div class="row font-weight-bold mb-2">
                    <div class="col-md-3">Role Name</div>
                    <div class="col-md-2">Quantity</div>
                    <div class="col-md-3">Expertise Level</div>
                    <div class="col-md-4">Average Salary</div>
                </div>

                @foreach($teams as $teamsmem)
                @php
                    $levels = [
                        1 => 'Ahli',
                        2 => 'Menengah',
                        3 => 'Pemula'
                    ];
                @endphp
                    <div class="row mb-2">
                        <div class="col-md-3"><input type="text" class="form-control" value="{{$teamsmem->role}}" readonly></div>
                        <div class="col-md-2"><input type="text" class="form-control" value="{{$teamsmem->total_team}}" readonly></div>
                        <div class="col-md-3"><input type="text" class="form-control" value="{{ $levels[$teamsmem->expertise_level_id] ?? 'Tidak diketahui' }}" readonly></div>
                        <div class="col-md-4"><input type="text" class="form-control" value="Rp {{$teamsmem->total_avg_salary}}" readonly></div>
                    </div>
                @endforeach

                <!-- Risk & Constraints -->
                <h5 class="section-title">Risk & Constraints</h5>
                <div class="row font-weight-bold mb-2">
                    <div class="col-md-2">Risk Type</div>
                    <div class="col-md-5">Description</div>
                    <div class="col-md-2">Impact Level</div>
                    <div class="col-md-3">Likelihood</div>
                </div>

                @foreach($ris as $riskproj)

                <div class="row mb-2">
                    <div class="col-md-2"><input type="text" class="form-control" value="{{$riskproj->risk_prediction}}" readonly></div>
                    <div class="col-md-5"><input type="text" class="form-control" value="Perlu Perbaikan Pada {{$riskproj->risk_type_prediction}}" readonly></div>
                    <div class="col-md-2"><input type="text" class="form-control" value="{{$riskproj->impact_level}}" readonly></div>
                    <div class="col-md-3"><input type="text" class="form-control" value="{{$riskproj->likelihood}}" readonly></div>
                </div>

                 @endforeach


          </div>
      </div>
          
@endsection
