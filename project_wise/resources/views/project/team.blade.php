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
                            <a class="nav-link active" href="{{route('teamp')}}">Team & Resource Allocation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('riskp')}}">Initial Risk & Constrains</a>
                        </li>
                    </ul>


                    <div class="tab-content text-left" id="myTabContent">
                         <div class="tab-pane fade show active p-3" id="home" role="tabpanel" aria-labelledby="home-tab">
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
                                            <input class="form" id="salary" style="width:150px; padding: 6px; border:1px solid #ccc; border-radius: 4px" type="number"  id="salary" name="salary" placeholder="Rp Average salary" />
                                            <button class="btn btn-primary">+</button>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-dark w-100" onclick="save2()">Next Section</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

 <script>
function save2(){
    const ddd = localStorage.getItem('sess_id').split('===')[1];
    const aa = ddd;
    const bb = document.getElementById("role").value;
    const cc = document.getElementById("quantity").value;
    const dd = document.getElementById("level").value;
    const ee = document.getElementById("salary").value;
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');


    fetch('http://localhost:8000/api/team', {
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
        })
    })
    .then(response => response.json())
    .then(data => {     
        if(data.success){
            swal("Sukses!", "Data Team berhasil disimpan. Silahkan Input Risk Dan Contrain", "success")
            .then(() => {
                window.location.href='/riskp';
            });  
        }else{
            swal("Gagal!", "Data team gagal disimpan.", "danger")
            .then(() => {
                window.location.reload();
            });  
        } 
    })
    }
</script>

@endsection
