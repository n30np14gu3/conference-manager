<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <title>@yield('page-title')</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{url('/semantic-ui/semantic.min.css')}}">
    <link rel="stylesheet" href="{{url('/assets/css/main.css')}}">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <script src="{{url('/assets/js/vendor/jquery-3.1.1.min.js')}}" type="text/javascript"></script>
</head>
<body>
<div class="ui menu">
    <a href="/" class="header item">
        Conference manager
    </a>
    <div class="ui simple dropdown item">
        Tasks <i class="dropdown icon"></i>
        <div class="menu">
            <a href="{{url('/tasks/1')}}" class="item @yield('task-1')">Task 1</a>
            <a href="{{url('/tasks/2')}}" class="item @yield('task-2')">Task 2</a>
            <a href="{{url('/tasks/3')}}" class="item @yield('task-3')">Task 3</a>
            <a href="{{url('/tasks/4')}}" class="item @yield('task-4')">Task 4</a>
            <a href="{{url('/tasks/5')}}" class="item @yield('task-5')">Task 5</a>
            <a href="{{url('/tasks/6')}}" class="item @yield('task-6')">Task 6</a>
        </div>
    </div>
    <a class="item" onclick="getAccounts()">Генерация готовых заявок</a>
    <a class="item @yield('all')" href="{{url('/all')}}">Выдать приглашение всем</a>
</div>
<div class="ui fluid container">
    <div style="padding: 15px">
        @yield('main-content')
    </div>
</div>
<script src="{{url('/assets/js/vendor/popper.min.js')}}"></script>
<script src="{{url('/semantic-ui/semantic.min.js')}}"></script>
<script src="{{url('/assets/js/main.js')}}"></script>
</body>
</html>
