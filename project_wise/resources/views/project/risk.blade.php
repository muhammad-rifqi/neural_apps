@extends('layouts.apps')

@section('content')      
<style>
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
        <main class="main">
            <section class="welcome-section">
                
                <h2 style="margin-top:200px">Hi,{{ Auth::user()->name }}! Let’s power up your next project.</h2>
                <div class="welcome-section_tab">

                      <!-- Tabs -->
                    <ul class="nav nav-tabs mb-4">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('projects')}}">Project Information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('teamp')}}">Team & Resource Allocation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('riskp')}}">Initial Risk & Constrains</a>
                        </li>
                    </ul>


                    <div class="tab-content text-left" id="myTabContent">
                        <div class="tab-pane fade show active p-3" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="form-row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                    <label for="risk-type">Risk Type *</label>
                                    <select class="form-control" id="risk-type">
                                        <option disabled selected>Choose risk type</option>
                                        @foreach($rt as $rts)
                                            <option value="{{$rts->id}}">{{$rts->name}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>

                                 <div class="col-md-3">
                                    <div class="form-group">
                                    <label for="description">Description *</label>
                                    <input class="form-control" type="text" id="description" placeholder="Description"/>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                    <label for="impact-level">Impact Level *</label>
                                    <select class="form-control" id="impact-level">
                                        <option disabled selected>Choose level</option>
                                        <option value="low">Low</option>
                                        <option value="medium">Medium</option>
                                        <option value="high">High</option>
                                    </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                    <label for="likelihood">Likelihood *</label><br>
                                    <select class="form" style="width:150px; padding: 6px; border:1px solid #ccc; border-radius: 4px" id="likelihood">
                                        <option disabled selected>Possibility</option>
                                        <option value="unlikely">Unlikely</option>
                                        <option value="possible">Possible</option>
                                        <option value="like">Likely</option>
                                    </select> <button class="btn btn-primary">+</button>
                                    </div>
                                </div>
                            </div>

                             <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-dark w-100" onclick="save3()">Generate</button>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
            </section>
        </main>

 <script>
   function save3(){
    const www = localStorage.getItem('sess_id').split('===')[2];
    const aaa = www;
    const bbb = document.getElementById("risk-type").value;
    const ccc = document.getElementById("description").value;
    const ddd = document.getElementById("impact-level").value;
    const eee = document.getElementById("likelihood").value;
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');


    fetch('http://localhost:8000/api/risk', {
    method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
        },
        body: JSON.stringify({
            "id_project" : aaa,
            "risk_type" : bbb,
            "description" : ccc,
            "impact_level" : ddd,
            "likelihood" : eee,
        })
    })
    .then(response => response.json())
    .then(data => {     
        if(data.success){
            swal("Sukses!", "Data Risk berhasil disimpan.", "success")
            .then(() => {
                window.location.reload();
            });  
        }else{
            swal("Gagal!", "Data Risk.", "danger")
            .then(() => {
                window.location.reload();
            });  
        } 
    })
    }
</script>

@endsection
