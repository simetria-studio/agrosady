<div class="tile-body p-0">
    <div class="row mix-grid">
        <div class="gallery">
            @foreach ($galerias->getCollection()->all() as $key => $val)
            <div class="col-md-4 col-sm-6 mb-20">
                <div class="tile">

                    <div class="tile-header">
                        <h4 class="custom-font text-uppercase"><strong>{{$val->titulo}}</strong> </h4>
                        <ul class="controls">
                            <li><a class="btn btn-warning btn-ef btn-ef-5 btn-ef-5b btn-sm" href="{{ url(route('galeria-video.galeria.edit', $val->id)) }}" title='Editar'><i class='fa fa-edit pt-10'></i><span>Editar</span></a></li>

                            <li><a class="btn btn-danger btn-ef btn-ef-5 btn-ef-5b btn-sm" href='javascript:void(0)' v-on="click:confirmaExclusao('{!! route('galeria-video.galeria.destroy', $val->id) !!}')" title='Deletar'><i class='fa fa-trash pt-10'></i><span>Deletar</span></a></li>
                        </ul>
                    </div>

                    <div>
                        <div class="mix">
                            <div class="img-container">
                                <a href="{!!route('galeria-video.video.create', $val->id)!!}">
                                    @if($val->img_capa == '')
                                    <img class="img-responsive margem-auto" src="{{ url () }}/dist/img/backend/galeria-padrao.jpg" alt="">
                                    @else
                                    <img class="img-responsive" alt="" src="{!! Config::get('prowork.base_img') !!}{{$val->present()->getThumbUrl($val->img_capa, 510, 260)}}">
                                    @endif
                                    <div class="img-details">
                                        <h4 class="custom-font ng-binding">{{$val->titulo}}</h4>
                                        <div class="img-controls">
                                            <span href="" title="{{$val->titulo}}" class="img-link">
                                                <i class="fa fa-search"></i>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
    <div class='row mt-20'>
        <div class='col-md-5'>
            <p class="text-sm">Mostrando {{$galerias->count()}} do total de {{$galerias->total()}} registros encontrados.</p>
        </div>
        <div class='col-md-7 text-right'>
            {!! $galerias->appends(Request::input())->render() !!}
        </div>

    </div>
</div>

@section('scripts')
<script src="{{ url() }}/js_models/galeria-video/galeria.js"></script>
<script src="{{ url() }}/js_models/galeria-video/video.js"></script>
@stop
