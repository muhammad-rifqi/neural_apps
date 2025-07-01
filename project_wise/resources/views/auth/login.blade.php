<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('ProjectWise Login') }}</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css')}}" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container_native">
        <aside class="sidebar">
            <div class="top-section">
                <div class="logo">💡 ProjectWise<sup>Beta</sup></div>
                <button class="new-project">+ New project</button>
            </div>
            <div class="bottom-links">
                <button class="light-mode">🌞 Light mode</button>
                <a href="#" class="faq">Updates & FAQ</a>
            </div>
        </aside>
        <main class="main">
            <div class="login-box">
                <h1 class="title">💡 ProjectWise <sup class="beta">Beta</sup></h1>
                <p class="description">
                    A smart application that helps project managers predict resource needs and continuously identify
                    risks.
                    With real-time data analysis and scenario simulation, it enables faster, more accurate, and
                    responsible decision-making.
                </p>

                <form class="login-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <input type="email" id="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email address" required />
                     @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password" />
                      @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror

                    <button type="submit" class="login-btn">{{ __('Login') }}</button>
                </form>

                <div class="divider">Or continue with</div>
                <div class="social-login">
                    <button class="facebook">f</button>
                    <button class="google">G</button>
                    <button class="apple"></button>
                </div>
            </div>
        </main>
    </div>
</body>

</html>