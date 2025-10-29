@extends('layouts.apps')

@section('content')   
    <div class="container" style="height: 700px; overflow-y:scroll">
        <h1 align="center" style="margin-top:50px;">Great to see you, {{Auth::user()->name}}! Let’s boost performance with retraining.</h1>
        <p class="subtitle" align="center">
         Discover the latest product updates, feature enhancements, and answers to frequently asked questions.
    This section helps you stay up to date with system improvements, understand new capabilities,
    and resolve common issues quickly, so you can focus on what truly matters: delivering your best work.
        </p>
        <hr/><br />
           
            <div class="table-responsive text-dark bg-white p-5" style="height: 500px; overflow-y:scroll">
                <table class="table table-bordered table-striped w-100">
                    <thead class="thead-default">
                    <tr>
                        <th width="30%">Frequently Asked Questions</th>
                        <th width="20%">Updates Timeline</th>
                        <th width="50%">Details</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><input type="text" class="form-control" id="one" value="What is the purpose of this system?" required></td>
                        <td>June 2025</td>
                        <td>Core features released: manual data input, health score generation, and static reporting.</td>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control" id="two" value="How often is the prediction model updated?" required></td>
                        <td>July 2025</td>
                        <td>Hybrid ML model (Gradient Boosting, ANN, Naive Bayes) integrated for risk and resource prediction.</td>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control" id="two" value="What kind of data do I need to input to get predictions?" required></td>
                        <td>August 2025</td>
                        <td>AI recommendations introduced for team, budget, tech stack, and risk mitigation.</td>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control" id="two" value="Can I compare current and recommended project plans?" required></td>
                        <td>September 2025</td>
                        <td>3-tab visual report launched with scoring comparison and exportable insights.</td>
                    </tr>
                    <tr>
                        <td> <input type="text" class="form-control" id="two" value="Is my project data secure?" required></td>
                        <td>October 2025</td>
                        <td>Model retraining via CLI added. "My Account" and FAQ features implemented.</td>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control" id="two" value="What does Project Health Score mean?" required></td>
                        <td>November 2025</td>
                        <td>Final release candidate with UI/UX polishing, onboarding, and deployment readiness.</td>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control" id="two" value="Can I download the reports?" required></td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    </tbody>
                </table>
                </div>
        </div>

@endsection