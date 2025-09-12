@extends('layouts.apps')

@section('content')        
        
        <main class="main">
            <section class="welcome-section">
                <h2>Hi,{{ Auth::user()->name }}! Let’s power up your next project.</h2>
                <div class="welcome-section_tab">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">Project Information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">Team & Resource Allocation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                aria-controls="contact" aria-selected="false">Initial Risk & Constrains</a>
                        </li>
                    </ul>
                    <div class="tab-content text-left" id="myTabContent">
                        <div class="tab-pane fade show active p-3" id="home" role="tabpanel" aria-labelledby="home-tab">

                            <div class="row">
                                <div class="col-md-12">
                                    <label>Project Name</label>
                                   <input  class="form-control" type="text" id="project_name">
                                </div>
                            </div>
                            <hr>

                            <div class="row" style="">
                                <div class="col-md-6">
                                    <label>Type of Project *</label>
                                    <select class="form-control" id="project_type" required>
                                        <option>Choose type of project</option>
                                        @foreach($pt as $data)
                                        <option value="{{$data->name}}">{{$data->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Project Scale *</label>
                                    <select class="form-control" id="project_scale" required>
                                        <option disabled selected>Choose project scale</option>
                                        @foreach($ps as $rows)
                                        <option value="{{$rows->name}}">{{$rows->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-4">
                                    <label>Start Date</label>
                                    <input  class="form-control" type="date" id="start_date">
                                </div>
                                <div class="col-md-4">
                                    <label>End Date</label>
                                    <input class="form-control" type="date" id="end_date">
                                </div>
                                <div class="col-md-4">
                                    <label>Life Cycle Method *</label>
                                    <select class="form-control" id="sdlc" required>
                                        <option disabled selected>Choose method</option>
                                        @foreach($sdlcs as $sdlc)
                                        <option value="{{$sdlc->id}}">{{$sdlc->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Technologies Used *</label>
                                    <select class="form-control" id="technology_use">
                                        <option disabled selected>Choose technology types</option>
                                         @foreach($techs as $tech)
                                         <option value="{{$tech->id}}">{{$tech->name}}</option>
                                         @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>&nbsp;</label>
                                    <input type="text" id="technology_use_description" class="form-control" placeholder="Write down what technology will be used">
                                </div>
                                <div class="col-md-2">
                                    <label>&nbsp;</label><br>
                                    <button type="button" class="btn btn-primary">+</button>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Total Budget Estimate *</label>
                                    <div class="currency">
                                        <span>ID Rp</span>
                                        <input type="number" id="budge" class="form-control" placeholder="Choose type of project">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Additional Cost Estimate</label>
                                    <div class="currency">
                                        <span>ID Rp</span>
                                        <input type="number" id="cost_estimate" class="form-control" placeholder="Choose project scale">
                                    </div>
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-12 p-2">
                                    <button class="btn btn-dark w-100" onclick="save1()">Next Section</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade p-3" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="role">Role Name <span class="required">*</span></label>
                                        <select class="form-control" id="role" name="role">
                                        <option value="">Choose role</option>
                                        @foreach($roles as $values)
                                            <option value="{{$values}}">{{$values}}</option>
                                        @endforeach
                                        <!-- Tambahkan opsi lainnya di sini -->
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                     <div class="form-group">
                                        <label for="quantity">Quantity <span class="required">*</span></label>
                                        <input class="form-control" type="number" id="quantity" name="quantity" placeholder="Quantity" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="level">Expertise Level <span class="required">*</span></label>
                                        <select class="form-control" id="level" name="level">
                                        <option value="">Choose level</option>
                                        @foreach($exp as $exps)
                                            <option value="{{$exps->id}}">{{$exps->name}}</option>
                                        @endforeach
                                        <!-- Tambahkan opsi lainnya di sini -->
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group salary">
                                        <label for="salary">Average Salary <span class="required">*</span></label>
                                            <input class="form" style="width:150px; padding: 6px; border:1px solid #ccc; border-radius: 4px" type="number"  id="salary" name="salary" placeholder="Rp Average salary" />
                                            <button class="btn btn-primary">+</button>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-dark w-100">Next Section</button>
                                </div>
                            </div>
                            
                        </div>

                        <div class="tab-pane fade p-3" id="contact" role="tabpanel" aria-labelledby="contact-tab">
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
                                    <input class="form-control" type="text" id="description" placeholder="Quantity"/>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                    <label for="impact-level">Impact Level *</label>
                                    <select class="form-control" id="impact-level">
                                        <option disabled selected>Choose level</option>
                                        <option>Low</option>
                                        <option>Medium</option>
                                        <option>High</option>
                                    </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                    <label for="likelihood">Likelihood *</label><br>
                                    <select class="form" style="width:150px; padding: 6px; border:1px solid #ccc; border-radius: 4px" id="likelihood">
                                        <option disabled selected>Possibility</option>
                                        <option>Unlikely</option>
                                        <option>Possible</option>
                                        <option>Likely</option>
                                    </select> <button class="btn btn-primary">+</button>
                                    </div>
                                </div>
                            </div>

                             <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-dark w-100">Next Section</button>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </section>
        </main>

 <script>
    function save1(){
    const a = document.getElementById("project_type").value;
    const b = document.getElementById("project_scale").value;
    const c = document.getElementById("start_date").value;
    const d = document.getElementById("end_date").value;
    const e = document.getElementById("sdlc").value;
    const f = document.getElementById("technology_use").value;
    const g = document.getElementById("technology_use_description").value;
    const h = document.getElementById("budge").value;
    const i = document.getElementById("cost_estimate").value;
    const j = document.getElementById("project_name").value;
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');


    fetch('http://localhost:8000/api/project_information', {
    method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
        },
        body: JSON.stringify({
            "project_name" : j,
            "project_type" : a,
            "project_scale" : b,
            "start_date" : c,
            "end_date" : d,
            "sdlc" : e,
            "technology_use" : f,
            "technology_use_description" : g,
            "budge" : h,
            "cost_estimate" : i,
        })
    })
    .then(response => response.json())
    .then(data => {     
        if(data.success){
            swal("Sukses!", "Data Project Information berhasil disimpan. Silahkan Input Team Dan Resource Allocation", "success")
            .then(() => {
                const userAgent = window.navigator.userAgent;
                localStorage.setItem('sess_id',userAgent + '====' + data?.id_allocation + '===' + data?.id_project)
                window.location.reload();
            });  
        }else{
            swal("Gagal!", "Data Project Information gagal disimpan.", "danger")
            .then(() => {
                window.location.reload();
            });  
        } 
    })
    }
</script>

@endsection
