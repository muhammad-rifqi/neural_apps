 <?php
    use App\Models\Projectx;
    $projects_list = Projectx::all();
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('ProjectWise Dashboard') }}</title>
    <link rel="stylesheet" href="/assets/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
       <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script> -->

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@4.20.0/dist/tf.min.js"></script>
 <style>
    .white-text {
  color: white;
}
</style>

</head>

<body>
    <div class="container_native">
        <aside class="sidebar">
            <div class="top-section">
                <div class="logo" id="warna_logo">💡 ProjectWise<sup>Beta</sup></div>
                <button class="new-project" onclick="window.location.href='/project'">+ New project</button>
                <aside class="project-list" id="warna_box" style="height:200px; overflow-y: scroll; overflow-x:hidden;">
                    <ul>
                        @foreach($projects_list as $rows)
                            <li>📄 <a href="{{ url('/study/' . $rows->id) }}" class="warna_text">{{ $rows->projectName }}</a></li>
                        @endforeach        
                    </ul>
                </aside>
            </div> 
            <div class="bottom-links">
                <aside class="project-list" id="warna_box2">
                    <ul>
                        <li>📄 <a href="{{ route('history') }}" class="warna_text"> Data History </a></li>
                        <li>📄 <a href="#" class="warna_text" onclick="localStorage.setItem('warna', 'light'); window.location.href='/home';">  Light Mode </a> </li>
                        <li>📄 <a href="{{ route('retraining') }}" class="warna_text">Model Retraining</a> </li>
                        <li>📄 <a href="{{ route('account') }}" class="warna_text"> My Account </a> </li>
                        <li>📄 <a href="{{ route('faq') }}" class="warna_text">  Update & Faq </a> </li>
                        <li>📄 <a href="{{ route('logout') }}" class="warna_text"
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

    <script>
        window.addEventListener("load",() => {
            var mmm =localStorage.getItem('warna');
              if(mmm == '' || mmm == undefined || mmm == 'light'){
                    document.body.style.backgroundColor = 'white';
                    document.body.style.color = '#000';
                    document.getElementById("warna_logo").style.color = 'black';
                    document.getElementById("warna_text").style.color='black';
                }else{
                    document.body.style.backgroundColor = 'black';
                    document.body.style.color = '#fff';
                    document.getElementById("warna_logo").style.color = 'black';
                    document.getElementById("warna_text").style.color='white';
                }
        })



        function gantiwarna(e){
            var yyy = localStorage.setItem('warna', e);
            var lll = localStorage.getItem('warna');
                if(lll == 'light'){
                    document.body.style.backgroundColor = 'white';
                    document.body.style.color = '#000';
                    // document.getElementById("warna_box").style.backgroundColor = 'white';
                    document.getElementById("warna_text").style.color='black';
                    document.getElementById("warna_logo").style.color = 'black';
                    // document.getElementById("warna_box2").style.backgroundColor = 'white';
                }else{
                    document.body.style.backgroundColor = 'black';
                    document.body.style.color = '#fff';
                    // document.getElementById("warna_box").style.backgroundColor = 'black';
                    document.getElementById("warna_text").style.color='white'; 
                    document.getElementById("warna_logo").style.color = 'black';
                    // document.getElementById("warna_box2").style.backgroundColor = 'black';
                }
            }
    </script>

</body>

</html>