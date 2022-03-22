new Vue({
    el: '#vue_produto',
    data: {
        oldRequest: '',
        atributos: [
            
        ]
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
        
        adicionaAtributo: function () {
            this.atributos.push({placeholder_atributo: 'Novo atributo', atributo: '',  placeholder_valor: 'Valor', valor: ''});
        },
        removeAtributo: function (index) {
            this.atributos.splice(index, 1);
            this.valores.splice(index, 1);
        },
        validaAtributos: function (e) {

            for (i = 0; i < this.atributos.length; i++) {
                if (this.atributos[i].atributo == '' || this.atributos[i].valor == '') {
                    bootbox.alert('Por favor, preencha todos os campos dos atributos criados.');
                    e.preventDefault();
                    return false;
                }
            }

        },
        
        filtrar: function () {
            alert('busca');
        }

    }
});

