new Vue({
    el: '#vue_gv_orcamento',
    data: {
    },
    methods: {
        showUser: function (route) {
            buscaUsuario(route);
        },
        confirmaExclusao: function (route) {
            bootbox.dialog({
                message: "Você tem certeza que deseja deletar o registro?",
                title: "Confirmação de exclusão",
                buttons: {
                    danger: {
                        label: "Cancelar",
                        className: "btn-default btn-rounded",
                        callback: function () {
                            return;
                        }
                    },
                    success: {
                        label: "Deletar",
                        className: "btn-danger btn-rounded",
                        callback: function () {
                            window.location.href = route;
                        }
                    }

                }
            });
        },
    }
});

//$(document).ready(function(){
//
//	$(document).on('change', '.status', function(){
//		var status = $(this).val();
//		var rota = $(this).attr('rota');
//		bootbox.confirm("Você tem certeza?", function(result) {
//			if(result){
//				window.location.href = rota+'/'+status;
//			}
//		}); 
//	});
//
//
//});


function buscaUsuario(route) {
    var div_temp = "<div id='dv_temp'>carregando...</div>";
    $('#dv_dialog').html(div_temp);
    $('#dv_temp').dialog({
        modal: true,
        width: 800,
        fluid: true,
        show: "fade",
        buttons: [{
                id: "btn-cancel",
                text: "Fechar",
                class: 'btn btn-danger',
                click: function () {
                    $(this).dialog("close");
                }
            }],
        close: function () {
            $('#dv_temp').remove();
        }
    });
    $(".ui-dialog-titlebar").hide();
    $("#dv_temp").dialog("open");
    //BUSCA O FORMULARIO E COLOCA DENTRO DA DIV TEMP
    $.get(route, function (resposta) {

        $('#dv_temp').html(resposta);

    });



}