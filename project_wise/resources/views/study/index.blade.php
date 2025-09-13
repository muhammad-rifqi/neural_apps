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
        <h1 align="center">Great to see you, {{Auth::user()->name}}! These Are the Recomendation result for study Yuk Project.</h1>
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
                <a class="nav-link active" href="{{route('study')}}">Analysis &amp; Scoring</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('current')}}">Current Plan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('recomendate')}}">AI Recommendations</a>
              </li>
            </ul>

            <!-- Content -->
            <div class="row">
              <!-- Left: Score -->
              <div class="col-md-4">
                <div class="score-box">
                  <h5 class="mb-3">Project Health Score</h5>
                  <div class="score-value">73</div>
                  <div class="score-label text-white bg-dark d-inline-block px-3 py-1 rounded">Moderate</div>
                  <p class="mt-3 text-muted small">
                    Project aspect is acceptable but may need attention to avoid potential issues.
                  </p>
                </div>
              </div>

              <!-- Right: Summary -->
              <div class="col-md-8">
                <div class="summary-box">
                  <h5 class="mb-3 font-weight-bold">Summary Description</h5>
                  <p>
                    A project health score of 73 indicates a moderate condition. This suggests the project is progressing with a reasonable degree of stability. Most foundational elements are in place, but there may be imbalances or inefficiencies in areas like budget allocation, team composition, or risk mitigation that could impact overall outcomes if left unaddressed.
                  </p>
                  <p>
                    While the project is still on track, it is recommended to review key metrics and implement minor adjustments. Proactive refinements at this stage can elevate performance, minimize risks, and strengthen the likelihood of project success.
                  </p>
                </div>
              </div>
            </div>
          </div>

          <h5 class="section-title">Category Breakdown</h5>
          <table class="table table-custom">
            <thead class="d-none">
              <tr>
                <th>Category</th>
                <th>Score</th>
                <th>Status</th>
                <th>Notes</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><input type="text" class="form-control" value="Team Readiness" readonly></td>
                <td><input type="text" class="form-control" value="82" readonly></td>
                <td><input type="text" class="form-control" value="Good" readonly></td>
                <td><input type="text" class="form-control" value="Team is quite complete & proportional" readonly></td>
              </tr>
              <tr>
                <td><input type="text" class="form-control" value="Budget Adequacy" readonly></td>
                <td><input type="text" class="form-control" value="65" readonly></td>
                <td><input type="text" class="form-control" value="Medium" readonly></td>
                <td><input type="text" class="form-control"  value="Budget is tight, but still feasible" readonly></td>
              </tr>
              <tr>
                <td><input type="text" class="form-control" value="Timeline Feasibility" readonly></td>
                <td><input type="text" class="form-control" value="71" readonly></td>
                <td><input type="text" class="form-control" value="Moderate" readonly></td>
                <td><input type="text" class="form-control"  value="Aggressive schedule, potential for delays" readonly></td>
              </tr>
              <tr>
                <td><input type="text" class="form-control" value="Technology Relevance" readonly></td>
                <td><input type="text" class="form-control" value="90" readonly></td>
                <td><input type="text" class="form-control" value="Excellent" readonly></td>
                <td><input type="text" class="form-control"  class="form-control"  value="Tools used are very appropriate" readonly></td>
              </tr>
              <tr>
                <td><input type="text" class="form-control" value="Risk Exposure" readonly></td>
                <td><input type="text" class="form-control" value="58" readonly></td>
                <td><input type="text" class="form-control" value="High Risk" readonly></td>
                <td><input type="text" class="form-control"  class="form-control"  value="Need further mitigation" readonly></td>
              </tr>
            </tbody>
          </table>

          <!-- User Input vs AI Comparison -->
          <h5 class="section-title">User Input vs AI Comparison</h5> <hr>

          <div class="row font-weight-bold mb-2">
            <div class="col-md-4">Project Duration</div>
            <div class="col-md-4 text-center">User Input</div>
            <div class="col-md-4 text-center">AI</div>
          </div>

          <div class="row mb-3">
            <div class="col-md-4">
              <input type="text" class="form-control" value="Estimated project running in weeks" readonly>
            </div>
            <div class="col-md-4 text-center">
              <input type="text" class="form-control" value="9" readonly>
            </div>
            <div class="col-md-4 text-center">
              <input type="text" class="form-control" value="12" readonly>
            </div>
          </div>

          <div class="row font-weight-bold mb-2">
            <div class="col-md-4">Project Budget</div>
            <div class="col-md-4 text-center">User Input</div>
            <div class="col-md-4 text-center">AI</div>
          </div>

          <div class="row mb-3">
            <div class="col-md-4">
              <input type="text" class="form-control" value="Estimated budget" readonly>
            </div>
            <div class="col-md-4 text-center">
              <input type="text" class="form-control" value="Rp 300.000.000" readonly>
            </div>
            <div class="col-md-4 text-center">
              <input type="text" class="form-control" value="Rp 350.000.000" readonly>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-4">
              <input type="text" class="form-control" value="Estimated additional cost" readonly>
            </div>
            <div class="col-md-4 text-center">
              <input type="text" class="form-control" value="Rp 35.000.000" readonly>
            </div>
            <div class="col-md-4 text-center">
              <input type="text" class="form-control" value="Rp 50.000.000" readonly>
            </div>
          </div>

          <div class="row font-weight-bold mb-2">
            <div class="col-md-4">Team & Resource Allocation</div>
            <div class="col-md-4 text-center">User Input</div>
            <div class="col-md-4 text-center">AI</div>
          </div>

          <div class="row mb-3">
            <div class="col-md-4">
              <input type="text" class="form-control" value="Total team size" readonly>
            </div>
            <div class="col-md-4 text-center">
              <input type="text" class="form-control" value="19" readonly>
            </div>
            <div class="col-md-4 text-center">
              <input type="text" class="form-control" value="17" readonly>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-4">
              <input type="text" class="form-control" value="Average team expenditure per" readonly>
            </div>
            <div class="col-md-4 text-center">
              <input type="text" class="form-control" value="Rp 141.000.000" readonly>
            </div>
            <div class="col-md-4 text-center">
              <input type="text" class="form-control" value="Rp 126.000.000" readonly>
            </div>
          </div>

          </div>





      </div>
          
@endsection
