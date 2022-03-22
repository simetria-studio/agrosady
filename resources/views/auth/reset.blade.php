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

                <div class="text-center"><h3 class="text-light text-white"><span class="text-lightred">M</span>INOVATE</h3></div>

                <div class="container w-420 p-15 bg-white mt-40 text-center">

                    <h2 class="text-light text-greensea">Resetar senha</h2>
                    @if ($errors->any())
                    <ul class="alert alert-warning">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif

                    @if (session('status'))
                    <div class="text-center margem-baixo40 alert-success">{{ session('status') }}</div>
                    @endif 

                    <form method="POST" action="{{ route('enviar-resetar-senha') }}" class="form-validation mt-20">
                        {!! csrf_field() !!}
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                            <input class="form-control" type="email" name="email" placeholder="E-mail" value="{{ old('email') }}">
                        </div>

                        <div class="form-group">
                            <input class="form-control" type="password" placeholder="Nova Senha" name="password">
                        </div>

                        <div class="form-group">
                            <input class="form-control" type="password" placeholder="Confirmar senha" name="password_confirmation">
                        </div>

                        <div class="bg-slategray lt wrap-reset mt-40 text-left">
                            <p class="m-0 text-right">
                                <button class="btn btn-greensea b-0 text-uppercase" type="submit">
                                    Resetar a senha
                                </button>
                            </p>
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

