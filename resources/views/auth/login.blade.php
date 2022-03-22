<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Prowork2 | Agência Dona Graça</title>
        <link rel="icon" type="image/ico" href="assets/images/favicon.ico" />
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- ============================================
        ================= Stylesheets ===================
        ============================================= -->
        <!-- vendor css files -->
        <link rel="stylesheet" href="{{ url()}}/minovate/assets/css/vendor/bootstrap.min.css">
        <link rel="stylesheet" href="{{ url()}}/minovate/assets/css/vendor/animate.css">
        <link rel="stylesheet" href="{{ url()}}/minovate/assets/css/vendor/font-awesome.min.css">
        <link rel="stylesheet" href="{{ url()}}/minovate/assets/js/vendor/animsition/css/animsition.min.css">

        <!-- project main css files -->
        <link rel="stylesheet" href="{{ url()}}/minovate/assets/css/main.css">
        <link rel="stylesheet" href="{{ url()}}/dist/css/style.css">
        <!--/ stylesheets -->

        <!-- ==========================================
        ================= Modernizr ===================
        =========================================== -->
        <script src="{{ url()}}/minovate/assets/js/vendor/modernizr/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <!--/ modernizr -->
    </head>

    <body id="minovate" class="appWrapper">


        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- ====================================================
        ================= Application Content ===================
        ===================================================== -->
        <div id="wrap" class="animsition">
            <div class="page page-core page-login">

                <div class="text-center"><h3 class="text-light text-white"><span class="text-lightred">P</span>ROWORK 2</h3></div>

                <div class="container w-420 p-15 bg-white mt-40">


                    <h2 class="text-light text-greensea text-center">Informe suas credenciais de acesso</h2>

                    @if ($errors->any())
                    <ul class="alert alert-warning">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul><br><br>
                    @endif

                    <form method="POST" action="{{ route('auth.login') }}" name="form" class="form-validation mt-20">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control underline-input pl-10 pr-10" placeholder="E-mail">
                        </div>

                        <div class="form-group">
                            <label for="password">Senha</label>
                            <input type="password" name="password" id="password" placeholder="Senha" class="form-control underline-input pl-10 pr-10">
                        </div>

                        <div class="form-group text-left mt-20">
                            <a href="{{ route('resetar-senha-email') }}" class="mt-10">Perdeu a senha?</a>
                            <button type="submit" class="pull-right btn btn-greensea b-0 br-2 mr-5">Entrar</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
        <!--/ Application Content -->

        <!-- ============================================
        ============== Vendor JavaScripts ===============
        ============================================= -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="{{ url()}}/minovate/assets/js/vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="{{ url()}}/minovate/assets/js/vendor/bootstrap/bootstrap.min.js"></script>

        <script src="{{ url()}}/minovate/assets/js/vendor/jRespond/jRespond.min.js"></script>

        <script src="{{ url()}}/minovate/assets/js/vendor/sparkline/jquery.sparkline.min.js"></script>

        <script src="{{ url()}}/minovate/assets/js/vendor/slimscroll/jquery.slimscroll.min.js"></script>

        <script src="{{ url()}}/minovate/assets/js/vendor/animsition/js/jquery.animsition.min.js"></script>

        <script src="{{ url()}}/minovate/assets/js/vendor/screenfull/screenfull.min.js"></script>
        <!--/ vendor javascripts -->

        <!-- ============================================
        ============== Custom JavaScripts ===============
        ============================================= -->
        <script src="{{ url()}}/minovate/assets/js/main.js"></script>
        <!--/ custom javascripts -->

        <!-- ===============================================
        ============== Page Specific Scripts ===============
        ================================================ -->
        <script>
$(window).load(function () {


});
        </script>
        <!--/ Page Specific Scripts -->

    </body>
</html>

