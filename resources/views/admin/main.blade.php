<!DOCTYPE html>
<html>
<head>
    <meta charaset="utf-8"/>
    <title>Admin</title>

    <link rel="stylesheet" href="{{asset('css/admin.css')}}">

    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap-theme.css')}}">

    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="{{asset('js/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap-filestyle.min.js')}}"></script>
    <script src="{{asset('js/tale.js')}}"></script>


    <script>
        tinymce.init({
            plugins: "image",
            selector: '#editor',
            selector: 'textarea',  // Ширина textarea
            /*width : 800,*/
            mode : "textareas",

            force_br_newlines : false,
            force_p_newlines : false,
            forced_root_block : ''
        });


    </script>

</head>
<body>
<div class="alert alert-success">
    <h1>Admin</h1>
</div>

<div id="content">
        @yield('content')
</div>

</body>
</html>