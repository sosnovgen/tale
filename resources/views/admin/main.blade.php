<!DOCTYPE html>
<html>
<head>
    <meta charaset="utf-8"/>
    <title>Admin</title>

    <link rel="shortcut icon" href="{{asset('images/frontsite/icon_logo_16.png')}}" type="image/png">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">

    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap-theme.css')}}">

    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap-filestyle.min.js')}}"></script>
    <script src="{{asset('js/tale.js')}}"></script>

    <script src="{{asset('tinymce/tinymce.min.js')}}"></script>
    <script>
        tinymce.init({
            plugins: "image",
            selector: '#editor',
            selector: 'textarea',  // Ширина textarea
            /*width : 800,*/
            mode : "textareas",
            force_br_newlines : true,
            /*force_br_newlines : false,*/
            force_p_newlines : false,

            toolbar: 'fontsizeselect | forecolor backcolor',
            fontsize_formats: '8pt 9pt 10pt 11pt 12pt 14pt 16pt 18pt 24pt 36pt',
            plugins: 'textcolor',




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

<br><br>

<div class="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12 widget">© 2016 | Created YourWebSite <span class="pull-right">Minimize your browser »</span>
            </div>
        </div>
    </div>
</div>

</body>
</html>