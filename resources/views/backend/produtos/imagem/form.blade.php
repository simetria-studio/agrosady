	

<div class="dz-message needsclick">
    <img src="{{ url() }}/dist/img/icon-drop-file.png">
    <h3>Solte arquivos aqui ou clique para fazer upload.</h3>
    <p class="help-block">Tamanho sugerido: 600px largura X 400px altura.</p>
</div>



@section('scripts')
<script src="{{ url() }}/js_models/produtos/imagem.js"></script>
<script src="{{ url() }}/plugins/multiplefiles/dropzone.js"></script>
<script src="{{ url() }}/minovate/assets/js/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="{{ url() }}/minovate/assets/js/vendor/mixitup/jquery.mixitup.min.js"></script>

<script>
$(window).load(function () {

    $('.mix-grid').mixItUp();

});
</script>
<script>
    Dropzone.options.galeriaDropzone = {
        headers: {
            'X-CSRF-Token': $('input[name="_token"]').val()
        },
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        dictInvalidFileType: "Este formato de imagem não é suportado. As imagens podem ser do tipo: jpeg, jpg, png, gif",
        init: function () {
            this.on("complete", function () {
                if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                    location.reload();
                }
            });
        }
    };
</script>
@stop