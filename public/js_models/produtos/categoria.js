new Vue({
    el: '#vue_produtos_categoria',
    data: {
    },
    methods: {
        confirmaExclusao: function (route) {
            bootbox.dialog({
                message: "Ao deletar uma categoria todas as subcategorias também serão deletadas. Você tem certeza que deseja deletar o registro?",
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
        }
    }
});