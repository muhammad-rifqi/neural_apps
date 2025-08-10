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
            <div class="col-md-6">
                <h5>Frequently Asked Questions</h5>
                    <div class="form-group">
                        <input type="text" class="form-control" id="one" value="What is the purpose of this system?" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="two" value="How often is the prediction model updated?" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="two" value="What kind of data do I need to input to get predictions?" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="two" value="Can I compare current and recommended project plans?" required>
                    </div>
                     <div class="form-group">
                        <input type="text" class="form-control" id="two" value="Is my project data secure?" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="two" value="What does Project Health Score mean?" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="two" value="Can I download the reports?" required>
                    </div>
                </div>

                <div class="col-md-6">
                <h5>Updates Timeline</h5>
                
                <div class="update-item">
                    <div class="update-date">June 2025</div>
                    <div>Core features released: manual data input, health score generation, and static reporting.</div>
                </div>
                <div class="update-item">
                    <div class="update-date">July 2025</div>
                    <div>Hybrid ML model (Gradient Boosting, ANN, Naive Bayes) integrated for risk and resource prediction.</div>
                </div>
                <div class="update-item">
                    <div class="update-date">August 2025</div>
                    <div>AI recommendations introduced for team, budget, tech stack, and risk mitigation.</div>
                </div>
                <div class="update-item">
                    <div class="update-date">September 2025</div>
                    <div>3-tab visual report launched with scoring comparison and exportable insights.</div>
                </div>
                <div class="update-item">
                    <div class="update-date">October 2025</div>
                    <div>Model retraining via CLI added. "My Account" and FAQ features implemented.</div>
                </div>
                <div class="update-item">
                    <div class="update-date">November 2025</div>
                    <div>Final release candidate with UI/UX polishing, onboarding, and deployment readiness.</div>
                </div>

                </div>
            </div>
        </div>

@endsection