@section('css')
<link rel="stylesheet" href="{{url()}}/minovate/assets/js/vendor/magnific-popup/magnific-popup.css">
@stop
<div class="tile-body p-0">
    <div class="row mix-grid">
        <div class="gallery" data-lightbox="gallery">
            @foreach ($galeria->imagens()->get() as $key => $val)
            <div class="col-md-4 col-sm-6 mb-20">
                <div class="tile">
                    <div class="tile-header">

                        @if ($galeria->img_capa == $val->caminho)
                        <h4 class="custom-font text-uppercase"><strong><i class="fa fa-check-square padding-7"></i> Capa</strong> </h4>
                        @else
                        <h4 class="custom-font text-uppercase"><a class="text-white" href="{!! route('galeria-imagem.imagem.setImgCapaGaleria', $val->id) !!}"><strong><i class="fa fa-square-o"></i> Definir como Capa</strong></a></h4>
                        @endif
                        <ul class="controls">
                            @if ($galeria->img_capa != $val->caminho)
                            <li><a href="javascript:void(0)" class="btn btn-danger btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" v-on="click:confirmaExclusao('{!! route('galeria-imagem.imagem.destroy', $val->id) !!}')" title='Deletar'><i class='fa fa-trash pt-10'></i><span>Deletar</span></a></li>
                            @endif
                        </ul>
                    </div>

                    <div>
                        <div class="mix">
                            <div class="img-container">
                                <img class="img-responsive" src="{!! Config::get('prowork.base_img') !!}{{$val->caminho}}" />
                                <div class="img-details">
                                    <div class="img-controls">
                                        <a class="img-preview" data-lightbox="gallery-item" href="{!! Config::get('prowork.base_img') !!}{{$val->caminho}}">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</div>
