@extends('layouts.apps')
@section('content')   

 <div class="container">
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
                <tr>
                    <td>NovaLearn Academy</td>
                    <td>Software Development</td>
                    <td>2025-06-01 09:45</td>
                    <td>2025-06-15 14:10</td>
                    <td><button class="btn btn-sm btn-outline-secondary">...</button></td>
                </tr>
                <tr>
                    <td>CoreLink ERP</td>
                    <td>Infrastructure Upgrade</td>
                    <td>2025-05-20 10:30</td>
                    <td>2025-06-01 17:25</td>
                    <td><button class="btn btn-sm btn-outline-secondary">...</button></td>
                </tr>
                <tr>
                    <td>StockWise</td>
                    <td>Software Development</td>
                    <td>2025-04-10 11:20</td>
                    <td>2025-06-10 13:55</td>
                    <td><button class="btn btn-sm btn-outline-secondary">...</button></td>
                </tr>
                <tr>
                    <td>PeopleHub Portal</td>
                    <td>Software Development</td>
                    <td>2025-03-15 15:00</td>
                    <td>2025-06-11 11:40</td>
                    <td><button class="btn btn-sm btn-outline-secondary">...</button></td>
                </tr>
                <tr>
                    <td>TrustBank Legacy Revamp</td>
                    <td>Software Development</td>
                    <td>2025-02-05 08:15</td>
                    <td>2025-05-25 10:20</td>
                    <td><button class="btn btn-sm btn-outline-secondary">...</button></td>
                </tr>
                <tr>
                    <td>AgriSense Dashboard</td>
                    <td>IoT/Embedded</td>
                    <td>2025-05-12 13:50</td>
                    <td>2025-06-14 09:30</td>
                    <td><button class="btn btn-sm btn-outline-secondary">...</button></td>
                </tr>
                <tr>
                    <td>LeadFlow Mobile CRM</td>
                    <td>Mobile Development</td>
                    <td>2025-04-01 10:10</td>
                    <td>2025-06-03 14:00</td>
                    <td><button class="btn btn-sm btn-outline-secondary">...</button></td>
                </tr>
                <tr>
                    <td>VoxPulse Analyzer</td>
                    <td>AI/ML</td>
                    <td>2025-05-05 09:00</td>
                    <td>2025-05-29 18:45</td>
                    <td><button class="btn btn-sm btn-outline-secondary">...</button></td>
                </tr>
                <tr>
                    <td>SparkWeb Revamp</td>
                    <td>Web Development</td>
                    <td>2025-03-22 12:35</td>
                    <td>2025-05-20 16:30</td>
                    <td><button class="btn btn-sm btn-outline-secondary">...</button></td>
                </tr>
                <tr>
                    <td>ShieldScan Suite</td>
                    <td>Cybersecurity</td>
                    <td>2025-01-17 14:20</td>
                    <td>2025-05-12 13:00</td>
                    <td><button class="btn btn-sm btn-outline-secondary">...</button></td>
                </tr>
                <tr>
                    <td>DesaCerdas Platform</td>
                    <td>Government/Smart City</td>
                    <td>2025-02-10 07:50</td>
                    <td>2025-05-15 15:25</td>
                    <td><button class="btn btn-sm btn-outline-secondary">...</button></td>
                </tr>
               <tr>
                <tr>
                    <td>SkyFleet Monitor</td>
                    <td>IoT/Drone Tech</td>
                    <td>2025-04-22 09:25</td>
                    <td>2025-06-10 12:10</td>
                    <td><button class="btn btn-sm btn-outline-secondary">...</button></td>
                </tr>
                <tr>
                    <td>SmartHire Screener</td>
                    <td>AI/ML</td>
                    <td>2025-04-12 10:45</td>
                    <td>2025-06-09 11:35</td>
                    <td><button class="btn btn-sm btn-outline-secondary">...</button></td>
                </tr>
                <tr>
                    <td>TripSync Gateway</td>
                    <td>Backend/API Development</td>
                    <td>2025-03-08 13:10</td>
                    <td>2025-05-30 16:50</td>
                    <td><button class="btn btn-sm btn-outline-secondary">...</button></td>
                </tr>
                <tr>
                    <td>FinSight Dashboard</td>
                    <td>Data Analytics</td>
                    <td>2025-05-02 11:15</td>
                    <td>2025-06-02 14:40</td>
                    <td><button class="btn btn-sm btn-outline-secondary">...</button></td>
                </tr>
                <tr>
                    <td>ParkSmart System</td>
                    <td>IoT/Smart Infrastructure</td>
                    <td>2025-03-14 08:30</td>
                    <td>2025-05-28 10:55</td>
                    <td><button class="btn btn-sm btn-outline-secondary">...</button></td>
                </tr>
                <tr>
                    <td>HomeTalk Voice Assistant</td>
                    <td>Embedded Systems</td>
                    <td>2025-02-26 09:45</td>
                    <td>2025-04-10 10:25</td>
                    <td><button class="btn btn-sm btn-outline-secondary">...</button></td>
                </tr>
                <tr>
                    <td>LexParse AI</td>
                    <td>NLP/AI</td>
                    <td>2025-04-05 15:30</td>
                    <td>2025-06-07 13:50</td>
                    <td><button class="btn btn-sm btn-outline-secondary">...</button></td>
                </tr>
                <tr>
                    <td>PulseFit App</td>
                    <td>Mobile Development</td>
                    <td>2025-05-16 14:20</td>
                    <td>2025-06-10 09:40</td>
                    <td><button class="btn btn-sm btn-outline-secondary">...</button></td>
                </tr>
                <tr>
                    <td>MindConnect Portal</td>
                    <td>Software Development</td>
                    <td>2025-03-25 11:00</td>
                    <td>2025-06-01 10:50</td>
                    <td><button class="btn btn-sm btn-outline-secondary">...</button></td>
                </tr>
                <tr>
                    <td>VoteChain System</td>
                    <td>Blockchain</td>
                    <td>2025-04-30 16:00</td>
                    <td>2025-06-11 17:30</td>
                    <td><button class="btn btn-sm btn-outline-secondary">...</button></td>
                </tr>
                <tr>
                    <td>EcoTrack Monitoring Suite</td>
                    <td>IoT/Sensor Network</td>
                    <td>2025-03-12 07:30</td>
                    <td>2025-06-08 08:45</td>
                    <td><button class="btn btn-sm btn-outline-secondary">...</button></td>
                </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
  @endsection