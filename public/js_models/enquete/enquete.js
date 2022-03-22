new Vue({
    el: '#vue_enquete',
    data: {
        pergunta: '',
        oldRequest: '',
        marcouOpcaoCorreta: false,
        opcoes: [
            {placeholder: "Opção 1", opcao: ''},
            {placeholder: "Opção 2", opcao: ''}
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
        adicionaOpcao: function () {
            this.opcoes.push({placeholder: 'Nova Opção', opcao: ''});
        },
        removeOpcao: function (index) {
            this.opcoes.splice(index, 1);
        },
        validaOpcoes: function (e) {

            if (this.pergunta == '') {
                bootbox.alert('O campo Pergunta é obrigatório');
                e.preventDefault();
                return false;
            }
            for (i = 0; i < this.opcoes.length; i++) {
                if (this.opcoes[i].opcao == '') {
                    bootbox.alert('Por favor, preencha todos os campos de opção criados.');
                    e.preventDefault();
                    return false;
                }
            }

        },
    }
}); 