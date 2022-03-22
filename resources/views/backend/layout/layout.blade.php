<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Prowork 2.0 | Agência Dona Graça</title>
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
        <link rel="stylesheet" href="{{ url()}}/minovate/assets/js/vendor/daterangepicker/daterangepicker-bs3.css">
        <link rel="stylesheet" href="{{ url()}}/minovate/assets/js/vendor/owl-carousel/owl.carousel.css">
        <link rel="stylesheet" href="{{ url()}}/minovate/assets/js/vendor/owl-carousel/owl.theme.css">
        <link rel="stylesheet" href="{{ url()}}/minovate/assets/js/vendor/datetimepicker/css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="{{ url()}}/minovate/assets/js/vendor/datatables/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="{{ url()}}/minovate/assets/js/vendor/datatables/datatables.bootstrap.min.css">
        <link rel="stylesheet" href="{{ url()}}/minovate/assets/js/vendor/summernote/summernote.css">

        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="{{ url()}}/plugins/select2/select2.css">
        <link href="{{ url()}}/plugins/multiplefiles/dropzone.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ url()}}/dist/css/bootstrap-block-grids.css">

        <!-- project main css files -->
        <link rel="stylesheet" href="{{ url()}}/minovate/assets/css/main.css">
        <link rel="stylesheet" href="{{ url()}}/dist/css/style.css">
        <!--/ stylesheets -->
        @yield('css')

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


            <!-- ===============================================
            ================= HEADER Content ===================
            ================================================ -->
            <section id="header">
                <header class="clearfix">

                    <!-- Branding -->
                    <div class="branding">
                        <a class="brand" href="{!! route('admin') !!}">
                            <span><strong>Pro</strong>Work2</span>
                        </a>
                        <a role="button" tabindex="0" class="offcanvas-toggle visible-xs-inline"><i class="fa fa-bars"></i></a>
                    </div>
                    <!-- Branding end -->


                    <!-- Right-side navigation -->
                    <ul class="nav-right pull-right list-inline">

                        <li class="dropdown nav-profile">

                            <a href class="dropdown-toggle" data-toggle="dropdown">
                                @if(Auth::user()->imagem_perfil)
                                <img src="{!! Config::get('prowork.base_img') !!}{{Auth::user()->present()->getThumbUrl(Auth::user()->imagem_perfil, 150, 150)}}" alt="" class="img-circle size-30x30">
                                @else
                                <img src="{{ url()}}/dist/img/usuario-padrao.jpg" alt="" class="img-circle size-30x30">
                                @endif

                                <span class="hidden-xs">{{ Auth::user()->name }}</span>
                            </a>

                            <ul class="dropdown-menu animated littleFadeInRight" role="menu">
                                <li>
                                    <a href="{!! route('auth.logout') !!}" role="button" tabindex="0">
                                        <i class="fa fa-sign-out"></i>Logout
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                    <!-- Right-side navigation end -->
                </header>
            </section>
            <!--/ HEADER Content  -->


            <!-- =================================================
            ================= CONTROLS Content ===================
            ================================================== -->
            <div id="controls">


                <!-- ================================================
                ================= SIDEBAR Content ===================
                ================================================= -->
                <aside id="sidebar">


                    <div id="sidebar-wrap">

                        <div class="panel-group slim-scroll" role="tablist">
                            <div class="panel panel-default">

                                <div id="sidebarNav" class="panel-collapse collapse in" role="tabpanel">
                                    <div class="panel-body">


                                        <!-- ===================================================
                                        ================= NAVIGATION Content ===================
                                        ==================================================== -->
                                        <ul id="navigation">
                                            
                                            <!--INSTITUCIONAL -->
                                            @shield('institucional.total')
                                            <li class="{{isset($menu) ? (($menu == "institucional") ? 'active' : '') : ''}}">
                                                <a href="{!! route('institucional.index') !!}">
                                                    <i class="fa fa-file-text-o"></i> <span>Institucional</span>
                                                </a>
                                            </li>
                                            @endshield
                                            
                                            <!--MENU BANNER-->
                                            @shield('banner.total')
                                            <li class="{{isset($menu) ? (($menu == "banner") ? 'active' : '') : ''}}">
                                                <a href="{!! route('banner.index') !!}">
                                                    <i class="fa fa-television"></i><span>Banners</span>
                                                </a>
                                            </li>
                                            @endshield

                                            <!--MENU BLOG-->
                                            @shield('blog.total')
                                            <li class="{{isset($menu) ? (($menu == "blog") ? 'active open' : '') : ''}}">
                                                <a role="button" tabindex="0">
                                                    <i class="fa fa-comments-o"></i> <span>Blog</span>
                                                </a>
                                                <ul>
                                                    <li class="{{isset($submenu) ? (($submenu == "blog-categoria") ? 'active' : '') : ''}}"><a href="{!! route('blog.categoria.index') !!}">Categorias</a></li>
                                                    <li class="{{isset($submenu) ? (($submenu == "blog-post") ? 'active' : '') : ''}}"><a href="{!! route('blog.post.index') !!}">Posts</a></li>
                                                </ul>
                                            </li>
                                            @endshield

                                            <!--MENU UND-->
                                            @shield('und.total')
                                            <li class="{{isset($menu) ? (($menu == "und") ? 'active open' : '') : ''}}">
                                                <a role="button" tabindex="0">
                                                    <i class="fa fa-clipboard"></i> <span>Universidade Digital</span>
                                                </a>
                                                <ul>
                                                    <li class="{{isset($submenu) ? (($submenu == "und-categoria") ? 'active' : '') : ''}}"><a href="{!! route('und.categoria.index') !!}">Categorias</a></li>
                                                    <li class="{{isset($submenu) ? (($submenu == "und-post") ? 'active' : '') : ''}}"><a href="{!! route('und.post.index') !!}">Publicações</a></li>
                                                </ul>
                                            </li>
                                            @endshield
                                            
                                            <!--MENU PRODUTOS-->
                                            @shield('produtos.total')
                                            <li class="{{isset($menu) ? (($menu == "produtos") ? 'active open' : '') : ''}}">
                                                <a role="button" tabindex="0">
                                                    <i class="fa fa-barcode"></i> <span>Produtos</span>
                                                </a>
                                                <ul>
                                                    <li class="{{isset($submenu) ? (($submenu == "produtos-categoria") ? 'active' : '') : ''}}"><a href="{!! route('produto.categoria.index') !!}">Categorias</a></li>
                                                    <li class="{{isset($submenu) ? (($submenu == "produto") ? 'active' : '') : ''}}"><a href="{!! route('produto.index') !!}">Produtos</a></li>
                                                </ul>
                                            </li>
                                            @endshield

                                            <!--MENU biblioteca virtual-->
                                            @shield('bv.total')
                                            <li class="{{isset($menu) ? (($menu == "biblioteca-virtual") ? 'active' : '') : ''}}">
                                                <a href="{!! route('bv.index') !!}">
                                                    <i class="fa fa-book"></i> <span>Biblioteca Virtual</span>
                                                </a>
                                            </li>
                                            @endshield

                                            <!--MENU agenda de eventos-->
                                            @shield('ae.total')
                                            <li class="{{isset($menu) ? (($menu == "eventos") ? 'active' : '') : ''}}">
                                                <a href="{!! route('galeria-evento.index') !!}">
                                                    <i class="fa fa-calendar"></i> <span>Agenda de Eventos</span>
                                                </a>
                                            </li>
                                            @endshield

                                            <!--MENU galeria de imagens-->
                                            @shield('gi.total')
                                            <li class="{{isset($menu) ? (($menu == "galeria-imagens") ? 'active' : '') : ''}}">
                                                <a href="{!! route('galeria-imagem.index') !!}">
                                                    <i class="fa fa-image"></i> <span>Galeria de Imagem</span>
                                                </a>
                                            </li>
                                            @endshield

                                            <!--MENU galeria de videos-->
                                            @shield('gv.total')
                                            <li class="{{isset($menu) ? (($menu == "galeria-videos") ? 'active' : '') : ''}}">
                                                <a href="{!! route('galeria-video.index') !!}">
                                                    <i class="fa fa-video-camera"></i> <span>Galeria de Vídeos</span>
                                                </a>
                                            </li>
                                            @endshield

                                            <!--MENU enquetes-->
                                            @shield('enquete.total')
                                            <li class="{{isset($menu) ? (($menu == "enquete") ? 'active' : '') : ''}}">
                                                <a href="{!! route('enquete.index') !!}">
                                                    <i class="fa fa-retweet"></i> <span>Enquete</span>
                                                </a>
                                            </li>
                                            @endshield

                                            <!--MENU orçamento e coleta-->
                                            @shield('operacao.total')
                                            <li class="{{isset($menu) ? (($menu == "orcamento") ? 'active open' : '') : ''}}">
                                                <a role="button" tabindex="0">
                                                    <i class="fa fa-navicon"></i> <span>Orçamento e Coleta</span>
                                                </a>
                                                <ul>
                                                    <li class="{{isset($submenu) ? (($submenu == "orcamento") ? 'active' : '') : ''}}"><a href="{!! route('operacao.index') !!}">Solicitações de Orçamento</a></li>
                                                    <li class="{{isset($submenu) ? (($submenu == "coleta") ? 'active' : '') : ''}}"><a href="{!! route('operacao.coleta.index') !!}">Solicitações de Coleta</a></li>
                                                </ul>
                                            </li>
                                            @endshield

                                            <!--MENU rastreio-->
                                            @shield('rastreio.total')
                                            <li class="{{isset($menu) ? (($menu == "rastreio") ? 'active open' : '') : ''}}">
                                                <a role="button" tabindex="0">
                                                    <i class="fa fa-navicon"></i> <span>Rastreio</span>
                                                </a>
                                                <ul>
                                                    <li class="{{isset($submenu) ? (($submenu == "transporte-carga") ? 'active' : '') : ''}}"><a href="{!! route('rastreio.index') !!}">Transporte de Cargas</a></li>
                                                </ul>
                                            </li>
                                            @endshield

                                            <!--MENU banco de motoristas-->
                                            @shield('motorista.total')
                                            <li class="{{isset($menu) ? (($menu == "motoristas") ? 'active' : '') : ''}}">
                                                <a href="{!! route('motorista.index') !!}">
                                                    <i class="fa fa-truck"></i> <span>Banco de Motoristas</span>
                                                </a>
                                            </li>
                                            @endshield

                                            <!--MENU RD DIGITAL-->
                                            @shield('rd.total')
                                            <li class="{{isset($menu) ? (($menu == "rd-digital") ? 'active' : '') : ''}}">
                                                <a href="{!! route('rd-digital.arquivo.index') !!}">
                                                    <i class="fa fa-files-o"></i> <span>Rd Digital</span>
                                                </a>
                                            </li>
                                            @endshield

                                            <!--MENU usuarios-->
                                            @shield('usuario.total')
                                            <li class="{{isset($menu) ? (($menu == "usuarios") ? 'active' : '') : ''}}">
                                                <a href="{!! route('usuario.index') !!}">
                                                    <i class="fa fa-users"></i> <span>Usuários</span>
                                                </a>
                                            </li>
                                            @endshield
                                            
                                            <!--SEO -->
                                            @shield('seo.total')
                                            <li class="{{isset($menu) ? (($menu == "seo") ? 'active' : '') : ''}}">
                                                <a href="{!! route('seo.index') !!}">
                                                    <i class="fa fa-cog"></i> <span>Seo</span>
                                                </a>
                                            </li>
                                            @endshield
                                            

                                        </ul>
                                        <!--/ NAVIGATION Content -->


                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>


                </aside>
                <!--/ SIDEBAR Content -->





            </div>
            <!--/ CONTROLS Content -->




            <!-- ====================================================
            ================= CONTENT ===============================
            ===================================================== -->
            <section id="content">

                <div class="page">

                    <div class="pageheader">
                        @yield('titulo')
                        <div class="page-bar">
                            @yield('cabecalho')
                        </div>
                    </div>

                    <div class="pagecontent" id="@yield('vue-model')">
                        @yield('conteudo')
                    </div><!-- /.content -->

                </div>

            </section>
            <!--/ CONTENT -->

        </div>
        <!--/ Application Content -->


        <!-- ============================================
        ============== Vendor JavaScripts ===============
        ============================================= -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="{{ url()}}/minovate/assets/js/vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="{{ url() }}/minovate/assets/js/vendor/bootstrap/bootstrap.min.js"></script>

        <script src="{{ url() }}/minovate/assets/js/vendor/slimscroll/jquery.slimscroll.min.js"></script>

        <!--js para site responsivo-->
        <script src="{{ url() }}/minovate/assets/js/vendor/jRespond/jRespond.min.js"></script>

        <!--animações-->
        <script src="{{ url() }}/minovate/assets/js/vendor/animsition/js/jquery.animsition.min.js"></script>

        <!--tela cheia-->
        <script src="{{ url() }}/minovate/assets/js/vendor/screenfull/screenfull.min.js"></script>

        <!--slide-->
        <script src="{{ url() }}/minovate/assets/js/vendor/owl-carousel/owl.carousel.min.js"></script>

        <!--selecionar datas-->
        <script src="{{ url() }}/minovate/assets/js/vendor/daterangepicker/moment.min.js"></script>
        <script src="{{ url() }}/minovate/assets/js/vendor/daterangepicker/moment-pt-br.js"></script>
        <script src="{{ url() }}/minovate/assets/js/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
        
        <!--tabelas datatable-->
        <script src="{{ url() }}/minovate/assets/js/vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="{{ url() }}/minovate/assets/js/vendor/datatables/extensions/dataTables.bootstrap.js"></script>

        <!--editor de texto-->
        <script src="{{ url() }}/minovate/assets/js/vendor/summernote/summernote.min.js"></script>
        <script src="{{ url() }}/plugins/sommernote/summernote-video-ext.js"></script>
        <script src="{{ url() }}/plugins/sommernote/summernote-pt-BR.js"></script>

        <script src="{{ url() }}/plugins/vuejs/vue.js"></script>
        <!--alert box-->        
        <script src="{{ url() }}/plugins/bootbox/bootbox.min.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 

        <!--/ vendor javascripts -->


        <!-- ============================================
        ============== Custom JavaScripts ===============
        ============================================= -->
        <script src="{{ url() }}/minovate/assets/js/main.js"></script>
        <!--/ custom javascripts -->

        @yield('scripts')
        <div id="dv_dialog"></div>

    </body>
</html>