<!-- @extends('layouts.app') -->
@extends('layouts.apps')

@section('content')
<main class="main">
    <section class="welcome-section">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <h2>Hi, {{ Auth::user()->name }} ! Let’s power up your next project.</h2>
        <div class="buttons">
            <button class="retrain-btn">Retraining Model</button>
            <button class="new-project-btn">New Project</button>
        </div>
    </section>
</main>
@endsection
