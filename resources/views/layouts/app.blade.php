<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | SKPD</title>
    <link rel="shortcut icon" href="{{ asset('images/icon.png') }}" type="image/x-icon">

    @stack('before-style')

    @include('includes.style')

    @stack('after-style')
</head>

<body>
    @include('partials.navbar-side')


    <div id="right-panel" class="right-panel">
        <!-- Header-->
        @include('partials.navbar-top')
        <!-- /#header -->
        <!-- Content -->
        @yield('content')
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">Copyright &copy; 2023 Badan Pengelola Keuangan dan Aset Daerah Jawa Timur
                    </div>
                </div>
            </div>
        </footer>
        <!-- /.site-footer -->
    </div>

    @stack('before-script')

    @include('includes.script')

    @stack('after-script')
</body>

</html>
