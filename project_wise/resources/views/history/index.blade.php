@extends('layouts.apps')
@section('content')   

 <div class="container" style="height: 700px; overflow-y:scroll">
        <h1 align="center" style="margin-top: 50px">Great to see you, {{Auth::user()->name}}! Let’s Learn your post project.</h1>
        <hr/><br />

        <div class="container mt-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Project List</h3>
            <div>
                <button class="btn btn-dark btn-sm">Upload Data History</button>
                <button class="btn btn-outline-secondary btn-sm">Filter</button>
                <button class="btn btn-outline-dark btn-sm">More</button>
            </div>
            </div>

            <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                <tr>
                    <th>Project Name</th>
                    <th>Project Type</th>
                    <th>Date Created</th>
                    <th>Last Edited</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $rows)
                <tr>
                    <td>{{$rows->name}}</td>
                    <td>{{$rows->type_project}}</td>
                    <td>{{$rows->start_date}}</td>
                    <td>{{$rows->end_date}}</td>
                    <td>
                        <button class="btn btn-sm btn-outline-secondary" onclick="window.location.href='/history/view/{{$rows->id}}'">View</button>
                        <button class="btn btn-sm btn-outline-secondary" onclick="window.location.href='/history/edit/{{$rows->id}}'">Edit</button>
                    </td>
                </tr>
                 @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
  @endsection