<div class="tile-body p-0">
    <div class="row gallery">
        @foreach ($galeria->videos()->get() as $key => $val)
        <div class="col-md-4 col-sm-6 mb-20">
            <div class="tile">
                <div class="tile-header">
                    <h4 class="custom-font text-uppercase"><strong>{{$val->titulo}}</strong></h4>
                    <ul class="controls">
                        <li><a href="javascript:void(0)" class="btn btn-danger btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" v-on="click:confirmaExclusao('{!! route('galeria-video.video.destroy', $val->id) !!}')" title='Deletar'><i class='fa fa-trash pt-10'></i><span>Deletar</span></a></li>
                    </ul>
                </div>

                <div>
                    <figure>
                        <div class="boxVideo">
                            {!! $val->caminho !!}
                        </div>
                    </figure>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

