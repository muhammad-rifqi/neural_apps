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
                            <a class="nav-link" href="{{route('projects')}}">Project Information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('teamp')}}">Team & Resource Allocation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('riskp')}}">Initial Risk & Constrains</a>
                        </li>
                    </ul>


                    <div class="tab-content text-left w-100" id="myTabContent">
                         <div class="tab-pane fade show active p-3" id="home" role="tabpanel" aria-labelledby="home-tab">

                         <div class="row w-100">
                                <div class="col-md-12">
                                   <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">Role</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Expertise</th>
                                            <th scope="col">salary</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="teamps">
                                

                                         </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row w-100" style="margin-top: 20px">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="role">Role Name <span class="required">*</span></label>
                                        <select class="form-control" id="role" name="role">
                                        <option value="">Choose role</option>
                                        <?php
                                        $jum = count($roles_team);
                                        for($i = 0; $i < $jum; $i++){
                                           echo"<option value=".$roles_team[$i]['id'].">".$roles_team[$i]['name']."</option>";
                                        }?>
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
                                            <input class="form" id="salary" style="width:160px; padding: 6px; border:1px solid #ccc; border-radius: 4px" type="number"  id="salary" name="salary" placeholder="Rp Average salary" />
                                            <button class="btn btn-primary" onclick="save2()">Add</button>
                                    </div>
                                </div>
                            </div>

                        
                            <div class="row" style="width: 100%; margin-top: 20px">
                                <div class="col-md-6 text-left">
                                    <button class="btn btn-default w-10">Back</button>
                                </div>
                                <div class="col-md-6 text-right">
                                    <button class="btn btn-dark w-10" onclick="next()">Next Section</button>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </section>
        </main>

 <script>

function next(){
    window.location.href='/riskp';
}

function save2(){
    const ddd = localStorage.getItem('sess_id').split('===')[1];
    const aa = ddd;
    const bb = document.getElementById("role").value;
    const cc = document.getElementById("quantity").value;
    const dd = document.getElementById("level").value;
    const ee = document.getElementById("salary").value;
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

      let productivity = 1.0;
      let salaryMultiplier = 1.0;

      if (dd == 1) { // Ahli
        productivity = 1.2;
        salaryMultiplier = 1.5;
      } else if (dd == 2) { // Menengah
        productivity = 1.0;
        salaryMultiplier = 1.0;
      } else if (dd == 3) { // Pemula
        productivity = 0.8;
        salaryMultiplier = 0.7;
      }

      let roleBonus = 1.0;
      if (bb == 1) roleBonus = 1.3; 
      if (bb == 2) roleBonus = 1.1; 
      if (bb == 3) roleBonus = 1.2; 

      // Hitung estimasi
      const totalTeam = Math.round(cc * productivity * roleBonus);
      const totalSalary = cc * ee * salaryMultiplier;
      const avgTeamSalary = Math.round(totalSalary / totalTeam);


    fetch('/api/team', {
    method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
        },
        body: JSON.stringify({
            "id_allocation" : aa,
            "role" : bb,
            "quantity" : cc,
            "level" : dd,
            "salary" : ee,
            "total_team" : totalTeam,
            "total_salary" : totalSalary,
            "total_avg_salary" : avgTeamSalary,
        })
    })
    .then(response => response.json())
    .then(data => {     
        if(data.success){
            swal("Sukses!", "Data Team berhasil disimpan. Silahkan Input Risk Dan Contrain", "success")
            .then(() => {
                window.location.reload();
            });  
        }else{
            swal("Gagal!", "Data team gagal disimpan.", "danger")
            .then(() => {
                window.location.reload();
            });  
        } 
    })
    }


    function bacaData(){
        const eee = localStorage.getItem('sess_id').split('===')[1];
        fetch('/api/bacateam/'+ eee)
        .then(ooo => ooo.json())
        .then((rw)=>{
            console.log(rw)
            var ab = '';
            rw.data.team.forEach(elements => {
                ab +=`<tr>
                        <th scope="row">${elements.role}</th>
                        <td>${elements.quantity}</td>
                        <td>${elements.expertise_level_id}</td>
                        <td>${elements.avg_salary}</td>
                        <td><a class="btn btn-danger" href="/teamp/delete/${elements.id}" onclick="return confirm('Apakah Anda Yakin?')">Hapus</a></td>
                    </tr>`;
            });
            document.getElementById("teamps").innerHTML = ab;
        })
    }

    window.addEventListener("load",()=>{
        bacaData();
    })
</script>

@endsection
