@extends('layouts.apps')

@section('content')        
        
        <main class="main">
            <section class="welcome-section">
                <h2>Hi,{{ Auth::user()->name }}! Let’s power up your next project.</h2>
                <div class="welcome-section_tab">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">Analisa Dan Scoring </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">Current Plan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                aria-controls="contact" aria-selected="false">AI Recomendation</a>
                        </li>
                    </ul>
                    <div class="tab-content text-left" id="myTabContent">
                        <div class="tab-pane fade show active p-3" id="home" role="tabpanel" aria-labelledby="home-tab">


                        </div>
                        <div class="tab-pane fade p-3" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            
                            
                        </div>

                        <div class="tab-pane fade p-3" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            
                            
                        </div>
                    </div>
                </div>
            </section>
        </main>
@endsection