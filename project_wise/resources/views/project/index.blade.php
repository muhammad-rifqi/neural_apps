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

                            <div class="row" style="">
                                <div class="col-md-6">
                                    <label>Type of Project *</label>
                                    <select class="form-control" required>
                                        <option>Choose type of project</option>
                                        @foreach($project as $data)
                                        <option value="{{$data->id}}">{{$data->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Project Scale *</label>
                                    <select class="form-control" required>
                                        <option disabled selected>Choose project scale</option>
                                        <option>Choose type of project</option>
                                        @foreach($project as $rows)
                                        <option value="{{$data->id}}">{{$rows->scale}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-4">
                                    <label>Start Date</label>
                                    <input  class="form-control" type="date">
                                </div>
                                <div class="col-md-4">
                                    <label>End Date</label>
                                    <input class="form-control" type="date">
                                </div>
                                <div class="col-md-4">
                                    <label>Life Cycle Method *</label>
                                    <select class="form-control" required>
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
                                    <select class="form-control">
                                        <option disabled selected>Choose technology types</option>
                                         @foreach($techs as $tech)
                                         <option value="{{$tech->id}}">{{$tech->name}}</option>
                                         @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>&nbsp;</label>
                                    <input type="text" class="form-control" placeholder="Write down what technology will be used">
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
                                        <input type="text" class="form-control" placeholder="Choose type of project">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Additional Cost Estimate</label>
                                    <div class="currency">
                                        <span>ID Rp</span>
                                        <input type="text" class="form-control" placeholder="Choose project scale">
                                    </div>
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-12 p-2">
                                    <button class="btn btn-dark w-100">Next Step</button>
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
                                        <option value=""></option>
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
                                    <button class="btn btn-dark w-100">Next Step</button>
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
                                        <option>Financial</option>
                                        <option>Operational</option>
                                        <option>Compliance</option>
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
                                    <button class="btn btn-dark w-100">Next Step</button>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </section>
        </main>
@endsection

@push('scripts') {{-- Pushing content to the 'scripts' stack --}}
    <script>
        
    </script>
@endpush