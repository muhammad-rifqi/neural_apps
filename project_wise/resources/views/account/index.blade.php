@extends('layouts.apps')

@section('content')   
    <div class="container">
        <h1 align="center">Great to see you, {{Auth::user()->name}}! Let’s boost performance with retraining.</h1>
        <p class="subtitle" align="center">
        Configure and initiate the retraining process to update and improve the accuracy of your predictive machine learning models.
        </p>
        <hr/>
            <h4>Profile Settings</h4>
            <form>
                 <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fullName">Full Name <span class="text-danger">*</span> <small class="text-muted">(required)</small></label>
                                    <input type="text" class="form-control" id="fullName" value="Andika Noor Ismawan" required>
                                </div>
                                <div class="form-group">
                                    <label for="nickName">Nick Name <span class="text-danger">*</span> <small class="text-muted">(required)</small></label>
                                    <input type="text" class="form-control" id="nickName" value="Andika" required>
                                </div>
                                <div class="form-group">
                                    <label for="role">Role <span class="text-danger">*</span> <small class="text-muted">(required)</small></label>
                                    <input type="text" class="form-control" id="role" value="Project Manager" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email Address <span class="text-danger">*</span> <small class="text-muted">(required)</small></label>
                                    <input type="email" class="form-control" id="email" value="noorismawanandika@gmail.com" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone Number <span class="text-danger">*</span> <small class="text-muted">(required)</small></label>
                                    <input type="tel" class="form-control is-invalid" id="phone" value="+62 81312004621" required>
                                    <div class="invalid-feedback">
                                        Please enter a valid phone number.
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="company">Company <span class="text-danger">*</span> <small class="text-muted">(required)</small></label>
                                    <input type="text" class="form-control" id="company" value="Anugerah Nusa Teknologi" required>
                                </div>
                            </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="mt-4">Appearance Settings</h4>
                        <div class="form-group">
                            <label for="theme">Theme</label>
                            <select class="form-control" id="theme" style="width:100%;">
                                <option>Light</option>
                                <option>Dark</option>
                            </select>
                        </div>
                    </div>
                </div>
                
            </form>
    </div>

@endsection