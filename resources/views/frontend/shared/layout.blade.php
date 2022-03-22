<!DOCTYPE html>
<html>
    <head>
        
        {!! SEOMeta::generate() !!}
        {!! OpenGraph::generate() !!}
        {!! Twitter::generate() !!}
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!--<title>Prowork 2.0</title>-->

        <!-- Bootstrap core CSS -->
        <link href="{{ url() }}/frontend/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ url() }}/frontend/css/bootstrap-block-grids.css" rel="stylesheet">
        <link href="{{ url() }}/frontend/css/normalize.css" rel="stylesheet">
        <link href="{{ url() }}/frontend/css/animate.min.css" rel="stylesheet">


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Custom styles for this template -->
        
        <link rel="stylesheet" href="{{ url() }}/frontend/css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
        
    </head>
    <body>

        @yield('conteudo')

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{ url() }}/frontend/js/bootstrap.min.js"></script>
        <script src="{{ url() }}/frontend/js/jquery.waypoints.min.js"></script>
        <script src="{{ url() }}/frontend/js/parallax.min.js"></script>

        @yield('script')

    </body>
</html>