<header class="topo-interno">
    <div class="topo-grande">
        <!-- <div class="visible-sm visible-md visible-lg informacoes-topo">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10">
                        <ul class="list-inline margem-0 margem-cima5">
                            <li class="cor-branco thin"><i class="fa fa-phone cor-verde" aria-hidden="true"></i> Telefone: (77) 3424-0092</li>
                            <li class="cor-branco thin"><a class="botao-whatsapp" target="_blank" href="https://api.whatsapp.com/send?phone=557734222428"><i class="fa fa-whatsapp cor-verde" aria-hidden="true"></i> Whatsapp: (77) 3422-2428</a></li>
                            <li class="cor-branco thin"><i class="fa fa-envelope cor-verde" aria-hidden="true"></i> E-mail: contato@agrosady.com.br</li>
                            <li class="cor-branco thin"><i class="fa fa-clock-o cor-verde" aria-hidden="true"></i> Seg - Sex 07:30h - 18:00h / Sáb – 07:30h – 13:00h</li>
                        </ul>
                    </div>
                    <div class="col-sm-2 text-right">
                        <ul class="list-inline margem-0">
                            <li><a class="cor-branco font-size20 margem-rigth10" href="https://www.facebook.com/AgroSadyGeomembrana/" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
                            <li><a class="cor-branco font-size20" href="https://www.instagram.com/agrosady_/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> -->
        <nav class="visible-sm visible-md visible-lg menu-grande">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <a class="logo" href="{!! route('page.home') !!}"><img class="img-responsive margem-auto" src="{{ url() }}/frontend/img/logo-interno.jpg"></a>
                    </div>
                    <div class="col-sm-9">
                        <ul class="block-grid-sm-7">
                            <li><a class="menu-grande-item {{isset($menu) ? (($menu == "quem-somos") ? 'active' : '') : ''}}" href="{!! route('page.quem-somos') !!}">Quem Somos</a></li>
                            <li><a class="menu-grande-item" target="_blank" href="https://www.tudojardim.com.br">Loja Virtual</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle menu-grande-item {{isset($menu) ? (($menu == "produtos") ? 'active' : '') : ''}}" data-toggle="dropdown" href="#">Serviços</a>
                                <ul class="dropdown-menu">
                                    @foreach ($cats_menu as $categoria)
                                    <li><a class=" {{isset($submenu) ? (($submenu == $categoria->nome) ? 'active' : '') : ''}}" href="{!! route('page.produtos-categoria-list', $categoria->slug) !!}">{{$categoria->nome}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a class="menu-grande-item {{isset($menu) ? (($menu == "tabela-de-kits") ? 'active' : '') : ''}}" href="{!! route('page.tabela-de-kits') !!}">Kits Tanques</a></li>
                            <li><a class="menu-grande-item {{isset($menu) ? (($menu == "obras") ? 'active' : '') : ''}}" href="{!! route('page.galerias-imagem') !!}">Nossas Obras</a></li>
                            <li><a class="menu-grande-item {{isset($menu) ? (($menu == "noticias") ? 'active' : '') : ''}}" href="{!! route('page.blog-list') !!}">Notícias</a></li>
                            <li><a class="menu-grande-item {{isset($menu) ? (($menu == "contato") ? 'active' : '') : ''}}" href="{!! route('page.contato') !!}">Contato</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <nav class="navbar navbar-default navbar-fixed-top visible-xs">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href=""><img class="img-responsive" src="{{ url() }}/frontend/img/logo-celular.png" alt="Máximas" title="Máximas"></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a class="{{isset($menu) ? (($menu == "quem-somos") ? 'active' : '') : ''}}" href="{!! route('page.quem-somos') !!}">Quem Somos</a></li>
                    <li><a target="_blank" href="https://www.tudojardim.com.br">Loja Virtual</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle{{isset($menu) ? (($menu == "produtos") ? 'active' : '') : ''}}" data-toggle="dropdown" href="#">Serviços</a>
                        <ul class="dropdown-menu">
                            @foreach ($cats_menu as $categoria)
                            <li><a class=" {{isset($submenu) ? (($submenu == $categoria->nome) ? 'active' : '') : ''}}" href="{!! route('page.produtos-categoria-list', $categoria->slug) !!}">{{$categoria->nome}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a class="{{isset($menu) ? (($menu == "tabela-de-kits") ? 'active' : '') : ''}}" href="{!! route('page.tabela-de-kits') !!}">Kits Tanques</a></li>
                    <li><a class="{{isset($menu) ? (($menu == "obras") ? 'active' : '') : ''}}" href="{!! route('page.galerias-imagem') !!}">Nossas Obras</a></li>
                    <li><a class="{{isset($menu) ? (($menu == "noticias") ? 'active' : '') : ''}}" href="{!! route('page.blog-list') !!}">Notícias</a></li>
                    <li><a class="{{isset($menu) ? (($menu == "contato") ? 'active' : '') : ''}}" href="{!! route('page.contato') !!}">Contato</a></li>
                </ul>
            </div>
        </div>
    </nav>

</header>

