@extends('layouts.apps')

@section('content')   
    <div class="container">
        <h1 align="center">Great to see you, {{Auth::user()->name}}! Let’s boost performance with retraining.</h1>
        <p class="subtitle" align="center">
         Discover the latest product updates, feature enhancements, and answers to frequently asked questions.
    This section helps you stay up to date with system improvements, understand new capabilities,
    and resolve common issues quickly, so you can focus on what truly matters: delivering your best work.
        </p>
        <hr/>
            <div class="row">
              <div class="col-md-12">
                <div class="container my-4">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4>Project List</h4>
                    <div>
                      <button class="btn btn-primary btn-sm">Upload Data History</button>
                      <button class="btn btn-light btn-sm">More</button>
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
                          <th style="width: 50px;">#</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>NeoLearn Academy</td>
                          <td>Software Development</td>
                          <td>2025-01-08 10:14</td>
                          <td>2025-06-16 14:10</td>
                          <td><button class="btn btn-sm btn-outline-secondary">i</button></td>
                        </tr>
                        <tr>
                          <td>ComLeek ERP</td>
                          <td>Infrastructure Upgrade</td>
                          <td>2025-05-20 10:30</td>
                          <td>2025-06-27 11:20</td>
                          <td><button class="btn btn-sm btn-outline-secondary">i</button></td>
                        </tr>
                        <tr>
                          <td>StockWise</td>
                          <td>Software Development</td>
                          <td>2025-02-10 11:20</td>
                          <td>2025-06-09 11:55</td>
                          <td><button class="btn btn-sm btn-outline-secondary">i</button></td>
                        </tr>
                        <tr>
                          <td>PeopleHub Portal</td>
                          <td>Software Development</td>
                          <td>2025-03-15 15:00</td>
                          <td>2025-06-11 11:40</td>
                          <td><button class="btn btn-sm btn-outline-secondary">i</button></td>
                        </tr>
                        <!-- Tambahkan baris lain sesuai kebutuhan -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
      </div>
          
@endsection
