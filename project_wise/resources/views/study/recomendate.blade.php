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
                <input type="text"  class="form-control" value="Rp {{$alloc->total_development_cost}}" readonly>
                </div>
                <div class="col-md-4">
                <div class="label-text">Estimated Additional Cost</div>
                <input type="text"  class="form-control" value="Rp {{$alloc->additional_cost}}" readonly>
                </div>
                <div class="col-md-4">
                <div class="label-text">Life Cycle Method</div>
                <input type="text"  class="form-control" value="{{$alloc->sdlc_method_id}}" readonly>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-4">
                <div class="label-text">Project Duration</div>
                <input type="text"  class="form-control" value="{{$alloc->duration_months}}" readonly>
                </div>
            </div>

            <!-- Technology Section -->
            <h5 class="section-title">Technology, Programming Languages & Frameworks</h5>
            <div class="row mb-2">
                <div class="col-md-3">
                <input type="text"  class="form-control" value="Frontend" readonly>
                </div>
                <div class="col-md-9">
                <input type="text"  class="form-control" value="HTML5, CSS3, JS" readonly>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-3">
                <input type="text"   class="form-control" value="Backend" readonly>
                </div>
                <div class="col-md-9">
                <input type="text"  class="form-control" value="Java EE 5" readonly>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-3">
                <input type="text"  class="form-control" value="Database" readonly>
                </div>
                <div class="col-md-9">
                <input type="text"  class="form-control" value="Oracle 11g" readonly>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-3">
                <input type="text"  class="form-control" value="DevOps" readonly>
                </div>
                <div class="col-md-9">
                <input type="text"  class="form-control" value="Apache Maven, Jenkins" readonly>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-3">
                <input type="text"  class="form-control" value="Mobile" readonly>
                </div>
                <div class="col-md-9">
                <input type="text"  class="form-control" value="Android SDK" readonly>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-3">
                <input type="text"  class="form-control" value="QA" readonly>
                </div>
                <div class="col-md-9">
                <input type="text"  class="form-control" value="HP Quality Center" readonly>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-3">
                <input type="text"  class="form-control" value="Operating System" readonly>
                </div>
                <div class="col-md-9">
                <input type="text"  class="form-control" value="AIX 6.1" readonly>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-3">
                <input type="text"  class="form-control" value="Security Tool" readonly>
                </div>
                <div class="col-md-9">
                <input type="text"  class="form-control" value="IBM Tivoli Security" readonly>
                </div>
            </div>

                <h5 class="section-title">Team & Resource Allocation</h5>
                <div class="row font-weight-bold mb-2">
                    <div class="col-md-3">Role Name</div>
                    <div class="col-md-2">Quantity</div>
                    <div class="col-md-3">Expertise Level</div>
                    <div class="col-md-4">Average Salary</div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-3"><input type="text" class="form-control" value="Project Manager" readonly></div>
                    <div class="col-md-2"><input type="text" class="form-control" value="1" readonly></div>
                    <div class="col-md-3"><input type="text" class="form-control" value="Expert" readonly></div>
                    <div class="col-md-4"><input type="text" class="form-control" value="Rp 14.000.000" readonly></div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-3"><input type="text" class="form-control" value="Business Analyst" readonly></div>
                    <div class="col-md-2"><input type="text" class="form-control" value="1" readonly></div>
                    <div class="col-md-3"><input type="text" class="form-control" value="Advanced" readonly></div>
                    <div class="col-md-4"><input type="text" class="form-control" value="Rp 8.000.000" readonly></div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-3"><input type="text" class="form-control" value="System Analyst" readonly></div>
                    <div class="col-md-2"><input type="text" class="form-control" value="1" readonly></div>
                    <div class="col-md-3"><input type="text" class="form-control" value="Intermediate" readonly></div>
                    <div class="col-md-4"><input type="text" class="form-control" value="Rp 6.500.000" readonly></div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-3"><input type="text" class="form-control" value="UI/UX Designer" readonly></div>
                    <div class="col-md-2"><input type="text" class="form-control" value="2" readonly></div>
                    <div class="col-md-3"><input type="text" class="form-control" value="Advanced" readonly></div>
                    <div class="col-md-4"><input type="text" class="form-control" value="Rp 7.000.000" readonly></div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-3"><input type="text" class="form-control" value="Front End Developer" readonly></div>
                    <div class="col-md-2"><input type="text" class="form-control" value="3" readonly></div>
                    <div class="col-md-3"><input type="text" class="form-control" value="Intermediate" readonly></div>
                    <div class="col-md-4"><input type="text" class="form-control" value="Rp 7.000.000" readonly></div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-3"><input type="text" class="form-control" value="Back End Developer" readonly></div>
                    <div class="col-md-2"><input type="text" class="form-control" value="3" readonly></div>
                    <div class="col-md-3"><input type="text" class="form-control" value="Intermediate" readonly></div>
                    <div class="col-md-4"><input type="text" class="form-control" value="Rp 7.000.000" readonly></div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-3"><input type="text" class="form-control" value="Database Administrator" readonly></div>
                    <div class="col-md-2"><input type="text" class="form-control" value="2" readonly></div>
                    <div class="col-md-3"><input type="text" class="form-control" value="Advanced" readonly></div>
                    <div class="col-md-4"><input type="text" class="form-control" value="Rp 8.000.000" readonly></div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-3"><input type="text" class="form-control" value="DevOps Engineer" readonly></div>
                    <div class="col-md-2"><input type="text" class="form-control" value="1" readonly></div>
                    <div class="col-md-3"><input type="text" class="form-control" value="Expert" readonly></div>
                    <div class="col-md-4"><input type="text" class="form-control" value="Rp 9.000.000" readonly></div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-3"><input type="text" class="form-control" value="QA Tester" readonly></div>
                    <div class="col-md-2"><input type="text" class="form-control" value="3" readonly></div>
                    <div class="col-md-3"><input type="text" class="form-control" value="Advanced" readonly></div>
                    <div class="col-md-4"><input type="text" class="form-control" value="Rp 6.500.000" readonly></div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-3"><input type="text" class="form-control" value="IT Support" readonly></div>
                    <div class="col-md-2"><input type="text" class="form-control" value="2" readonly></div>
                    <div class="col-md-3"><input type="text" class="form-control" value="Novice" readonly></div>
                    <div class="col-md-4"><input type="text" class="form-control" value="Rp 6.000.000" readonly></div>
                </div>

                <!-- Risk & Constraints -->
                <h5 class="section-title">Risk & Constraints</h5>
                <div class="row font-weight-bold mb-2">
                    <div class="col-md-2">Risk Type</div>
                    <div class="col-md-5">Description</div>
                    <div class="col-md-2">Impact Level</div>
                    <div class="col-md-3">Likelihood</div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-2"><input type="text" class="form-control" value="Human Resource" readonly></div>
                    <div class="col-md-5"><input type="text" class="form-control" value="Lack of qualified personnel or sudden team m..." readonly></div>
                    <div class="col-md-2"><input type="text" class="form-control" value="High" readonly></div>
                    <div class="col-md-3"><input type="text" class="form-control" value="Medium" readonly></div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-2"><input type="text" class="form-control" value="Budget" readonly></div>
                    <div class="col-md-5"><input type="text" class="form-control" value="Cost overruns due to unexpected expenses or..." readonly></div>
                    <div class="col-md-2"><input type="text" class="form-control" value="Medium" readonly></div>
                    <div class="col-md-3"><input type="text" class="form-control" value="High" readonly></div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-2"><input type="text" class="form-control" value="Timeline" readonly></div>
                    <div class="col-md-5"><input type="text" class="form-control" value="Delays in project delivery caused by scope ex..." readonly></div>
                    <div class="col-md-2"><input type="text" class="form-control" value="High" readonly></div>
                    <div class="col-md-3"><input type="text" class="form-control" value="High" readonly></div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-2"><input type="text" class="form-control" value="Technology" readonly></div>
                    <div class="col-md-5"><input type="text" class="form-control" value="Use of unstable, unsupported, or unfamiliar te..." readonly></div>
                    <div class="col-md-2"><input type="text" class="form-control" value="High" readonly></div>
                    <div class="col-md-3"><input type="text" class="form-control" value="Medium" readonly></div>
                </div>






          </div>
      </div>
          
@endsection
