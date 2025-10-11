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
                <a class="nav-link active" href="{{url('study/'.$data->id)}}">Analysis &amp; Scoring</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('current/'.$data->id)}}">Current Plan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('recomendate/'.$data->id)}}">AI Recommendations</a>
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

          <?php
            $tim_a = ($teams->quantity / $teams->total_team) * 100;
            if($tim_a >= 90 && $tim_a <= 100){
              $nilai = "Perfect";
              $keterangannya = "Perfect Team";
            }

            if($tim_a >= 70 && $tim_a <= 89){
              $nilai = "Good";
              $keterangannya = "Good Team";
            }

            if($tim_a >= 50 && $tim_a <= 69){
              $nilai = "Enough";
              $keterangannya = "Enough Team";
            }

            if($tim_a >= 1 && $tim_a <= 49){
              $nilai = "Bad";
              $keterangannya = "Bad Team";
            }

            $angka_bersih = str_replace(",", "", $alloc->ai_total_cost);
            $hasil1 = (int)$angka_bersih;
            $angka_bersih2 = str_replace(",", "", $alloc->ai_additional_cost);
            $hasil2 = (int)$angka_bersih2;
            $hasil3 = $alloc->additional_cost + $alloc->total_development_cost;
            $hasil4 = $hasil1 + $hasil2 ;
            $hasil_akhir = ($hasil3 / $hasil4) * 100;

            if($hasil_akhir >= 90 && $hasil_akhir <= 100){
              $bd = "Perfect";
              $bdk = "Perfect Budged";
            }

            if($hasil_akhir >= 70 && $hasil_akhir <= 89){
              $bd = "Good";
              $bdk = "Good Budged";
            }

            if($hasil_akhir >= 50 && $hasil_akhir <= 69){
              $bd = "Enough";
              $bdk = "Enough Budged";
            }

            if($hasil_akhir >= 1 && $hasil_akhir <= 49){
              $bd = "Bad";
              $bdk = "Bad Budged";
            }

            $waktu = ($alloc->duration_months / $alloc->ai_duration_weeks) * 100;
             if($waktu >= 90 && $waktu <= 100){
              $wkt = "Perfect";
              $wktk = "Perfect Time";
            }

            if($waktu >= 70 && $waktu <= 89){
              $wkt = "Good";
              $wktk = "Good Time";
            }

            if($waktu >= 50 && $waktu <= 69){
              $wkt = "Enough";
              $wktk = "Enough Time";
            }

            if($waktu >= 1 && $waktu <= 49){
              $wkt = "Bad";
              $wktk = "Bad Time";
            }

           $tI =  ceil($totalImpact / $countImpact); 
          ?>
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
                <td><input type="text" class="form-control" value="{{ceil($tim_a)}}" readonly></td>
                <td><input type="text" class="form-control" value="{{$nilai}}" readonly></td>
                <td><input type="text" class="form-control" value="{{$keterangannya}}" readonly></td>
              </tr>
              <tr>
                <td><input type="text" class="form-control" value="Budget Adequacy" readonly></td>
                <td><input type="text" class="form-control" value="{{ceil($hasil_akhir)}}" readonly></td>
                <td><input type="text" class="form-control" value="{{$bd}}" readonly></td>
                <td><input type="text" class="form-control"  value="{{$bdk}}" readonly></td>
              </tr>
              <tr>
                <td><input type="text" class="form-control" value="Timeline Feasibility" readonly></td>
                <td><input type="text" class="form-control" value="{{ceil($waktu)}}" readonly></td>
                <td><input type="text" class="form-control" value="{{$wkt}}" readonly></td>
                <td><input type="text" class="form-control"  value="{{$wktk}}" readonly></td>
              </tr>
              <tr>
                <td><input type="text" class="form-control" value="Technology Relevance" readonly></td>
                <td><input type="text" class="form-control" value="85" readonly></td>
                <td><input type="text" class="form-control" value="Excellent" readonly></td>
                <td><input type="text" class="form-control"  class="form-control"  value="Tools used are very appropriate" readonly></td>
              </tr>
              <tr>
                <td><input type="text" class="form-control" value="Risk Exposure" readonly></td>
                <td><input type="text" class="form-control" value="{{$tI}}" readonly></td>
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
              <input type="text" class="form-control" value="{{$alloc->duration_months}}" readonly>
            </div>
            <div class="col-md-4 text-center">
              <input type="text" class="form-control" value="{{$alloc->ai_duration_weeks}}" readonly>
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
              <input type="text" class="form-control" value="Rp {{$alloc->total_development_cost}}" readonly>
            </div>
            <div class="col-md-4 text-center">
              <input type="text" class="form-control" value="Rp {{$hasil1}}" readonly>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-4">
              <input type="text" class="form-control" value="Estimated additional cost" readonly>
            </div>
            <div class="col-md-4 text-center">
              <input type="text" class="form-control" value="Rp {{$alloc->additional_cost}}" readonly>
            </div>
            <div class="col-md-4 text-center">
              <input type="text" class="form-control" value="Rp {{$hasil2}}" readonly>
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
              <input type="text" class="form-control" value="{{$teams->quantity}}" readonly>
            </div>
            <div class="col-md-4 text-center">
              <input type="text" class="form-control" value="{{$teams->total_team}}" readonly>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-4">
              <input type="text" class="form-control" value="Average team expenditure per" readonly>
            </div>
            <div class="col-md-4 text-center">
              <input type="text" class="form-control" value="Rp {{$teams->avg_salary}}" readonly>
            </div>
            <div class="col-md-4 text-center">
              <input type="text" class="form-control" value="Rp {{$teams->total_avg_salary}}" readonly>
            </div>
          </div>

          </div>





      </div>
          
@endsection
