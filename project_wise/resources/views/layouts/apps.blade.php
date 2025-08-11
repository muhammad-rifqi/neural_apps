<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('ProjectWise Dashboard') }}</title>
    <link rel="stylesheet" href="assets/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <div class="container_native">
        <aside class="sidebar">
            <div class="top-section">
                <div class="logo">💡 ProjectWise<sup>Beta</sup></div>
                <button class="new-project" onclick="window.location.href='/project'">+ New project</button>
                <aside class="project-list">
                    <ul>
                        <li>📄 <a href="{{ route('study') }}">StudiYuk </a></li>
                        <li>📄 NusaConnect</li>
                        <li>📄 SiTani Pintar</li>
                        <li>📄 RuangUsaha</li>
                        <li>📄 DailyQuo</li>
                    </ul>
                </aside>
            </div>
            <div class="bottom-links">
                <aside class="project-list">
                    <ul>
                        <li>📄 Data History</li>
                        <li>📄 Light Mode</li>
                        <li>📄 <a href="{{ route('retraining') }}">Model Retraining</a> </li>
                        <li>📄 <a href="{{ route('account') }}"> My Account </a> </li>
                        <li>📄 <a href="{{ route('faq') }}">  Update & Faq </a> </li>
                        <li>📄 <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>    
                        </li>
                    </ul>
                </aside>
            </div>
        </aside>

        @yield('content')

        </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>