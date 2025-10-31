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
            <section class="welcome-section" style="height: 1200px; overflow-y:scroll;scrollbar-width: none;">
                
                <h2 style="margin-top:200px" id="warna_text">Hi,{{ Auth::user()->name }}! Let’s power up your next project.</h2>
                <div class="welcome-section_tab">

                      <!-- Tabs -->
                    <ul class="nav nav-tabs mb-4">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('projects')}}">Project Information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('teamp')}}">Team & Resource Allocation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('riskp')}}">Initial Risk & Constrains</a>
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
                             
                            <div class="row tech-row">
                                <div class="col-md-5">
                                    <label>Technologies Used *</label>
                                    <select class="form-control" id="technology_use" required>
                                        <option value="-">Choose Technology</option>
                                        @foreach($techs as $tech)
                                        <option value="{{$tech->id}}-{{$tech->name}}">{{$tech->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <label>&nbsp;</label>
                                    <input type="text" id="technology_use_description" class="form-control" placeholder="Write down what technology will be used">
                                </div>
                                <div class="col-md-2">
                                    <label>&nbsp;</label><br>
                                    <button type="button" class="btn btn-primary" onclick="setLocalStorage()">Add Temp</button>
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
                            <div class="row p-2" style="margin-top: 40px">
                                <div class="col-md-12 p-2">
                                    <button class="btn btn-dark w-100" onclick="save1()">Next Section</button>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>
        </main>

<!-- <script>
  new Choices('#technology_use', {
    removeItemButton: true,
    placeholder: true,
    placeholderValue: 'Choose Technology'
  });
</script> -->


 <script>

    function predict(project) {
      // Hitung durasi manual (minggu)
      const start = new Date(project.startDate);
      const end = new Date(project.endDate);
      const durationWeeks = Math.ceil((end - start) / (1000 * 60 * 60 * 24 * 7));

      // Linear regression sederhana (dummy):
      let budgetFactor = 1;
      if (project.scale === "Medium") budgetFactor = 1.5;
      if (project.scale === "Large") budgetFactor = 2;

      let lifecycleFactor = project.lifecycle === "Agile" ? 1.2 : project.lifecycle === "Scrum" ? 1.1 : 1;

      const estimatedBudget = project.budget * budgetFactor * lifecycleFactor;
      const estimatedAdditional = project.addCost * lifecycleFactor;

      return {
        weeks: durationWeeks,
        budget: estimatedBudget,
        additional: estimatedAdditional
      };
    }

    function setLocalStorage(){
        var tuse = document.getElementById('technology_use').value;
        if(tuse == "-"){
            alert('please choose'); return false;
        }else{
        var tuse2 = tuse.split('-');
        var tusedesc = document.getElementById('technology_use_description').value;
        localStorage.setItem('tech-'+tuse2[0],tuse2[1]+'-'+tusedesc);
        swal("Success!", "Technology Have Been Save!", "success")
            .then(() => {
               return false;
            });     
        }
    }



function save1(){

   let techArray = [];     

    Object.keys(localStorage).forEach(key => {
        if (key.startsWith("tech-")) {
            let value = localStorage.getItem(key);
            techArray.push({ id: key, name: value.split('-')[0], tools :  value.split('-')[1]});
        }
    });

    const a = document.getElementById("project_type").value;
    const b = document.getElementById("project_scale").value;
    const c = document.getElementById("start_date").value;
    const d = document.getElementById("end_date").value;
    const e = document.getElementById("sdlc").value;
    const f = techArray;
    const g = document.getElementById("technology_use_description").value;
    const h = document.getElementById("budge").value;
    const i = document.getElementById("cost_estimate").value;
    const j = document.getElementById("project_name").value;
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');


    const project = {
        name: document.getElementById("project_name").value,
        type: document.getElementById("project_type").value,
        scale: document.getElementById("project_scale").value,
        startDate: document.getElementById("start_date").value,
        endDate: document.getElementById("end_date").value,
        tech: "javascript",
        budget: parseFloat(document.getElementById("budge").value),
        addCost: parseFloat(document.getElementById("cost_estimate").value),
        lifecycle: document.getElementById("sdlc").value
    };
    const result = predict(project);

    fetch('/api/project_information', {
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
            "weeks" : result.weeks,
            "budget" : result.budget.toLocaleString(),
            "additional" : result.additional.toLocaleString(),
        }),
        credentials: "same-origin" 
    })
    .then(response => response.json())
    .then(data => {     
        // console.log(data)
        if(data.success){
            swal("Sukses!", "Data Project Information berhasil disimpan. Silahkan Input Team Dan Resource Allocation", "success")
            .then(() => {
                const userAgent = window.navigator.userAgent;
                localStorage.setItem('sess_id',userAgent + '===' + data?.id_allocation + '===' + data?.id_project)
                window.location.href='/teamp';
            });  
        }else{
            swal("Gagal!", "Data Project Information gagal disimpan.", "danger")
            .then(() => {
                // window.location.reload();
            });  
        } 
    })
    }
</script>
@endsection
