new Vue({
    el: '#vue_motorista',
    data: {
    },
    methods: {
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
