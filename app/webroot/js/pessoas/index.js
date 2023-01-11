const pessoaEditarModal =  new bootstrap.Modal(document.getElementById("pessoaEditarModal"), {});
const pessoaInserirModal =  new bootstrap.Modal(document.getElementById("pessoaInserirModal"), {});
const modalEditarBody = document.getElementById('modalEditarBody');

actionButtons()
mascara()
function getPessoa(ID_PESSOA){
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if(request.readyState === 4) {
            if(request.status === 200) { 
                modalEditarBody.innerHTML = request.responseText; 
                pessoaEditarModal.show()
                mascara()
            } else {
                modalEditarBody.innerHTML = 'Houve um erro na requisição: ' +  request.status + ' ' + request.statusText;
                pessoaEditarModal.show()
            } 
        }
    }
    request.open('GET', BASE_URL+'pessoas/getPessoa/'+ID_PESSOA , true);
    request.send();
}

function actionButtons(){
    document.querySelectorAll('.btn-editar').forEach( function(item) {
        item.addEventListener('click', function(event){
            var ID_PESSOA = event.currentTarget.getAttribute('data-pessoa-id')
            getPessoa(ID_PESSOA)
        })
    });
    document.querySelectorAll('.btn-deletar').forEach( function(item) {
        item.addEventListener('click', function(event){
            var ID_PESSOA = event.currentTarget.getAttribute('data-pessoa-id')
            if(confirm("Tem certeza que deseja deletar essa pessoa?")){
                deletePessoa(ID_PESSOA)
            }            
        })
    });
    const btnInserir = document.getElementById("btn-inserir")
    btnInserir.addEventListener('click',function(event){
        pessoaInserirModal.show()
    })
}


const btnSalvarEdicao = document.getElementById('btn-salvar-edicao')
btnSalvarEdicao.addEventListener('click', function(event){
    putPessoa()
})
function putPessoa(){
    let form = document.querySelector('#editarPessoa');
    var data = new FormData(form);
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", form.getAttribute('action'), true); 
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
            if(this.status == 200){
                mainContent = document.getElementById('main-content')
                var response = this.responseText;
                mainContent.innerHTML = response;
                pessoaEditarModal.hide()
                actionButtons()
                toastSuccess("<strong>Pessoa atualizada com sucesso!</strong>")
            }else if(this.status == 400){
                let respostaHtml = '<strong>Houve erros no formulário:</strong> <br>'
                jsonResposta = JSON.parse(this.responseText);
                for (var key in jsonResposta) {
                    const inputElem = form.querySelector('input[name='+key+']');
                    inputElem.classList.add('is-invalid')
                    jsonResposta[key].forEach( function(item) {
                        respostaHtml += '<p class="mb-0">'+item+'</p>'
                    })
                }
                toastError(respostaHtml)
            }else{
                var error = 'Houve um erro na requisição: ' +  this.status + ' ' + this.statusText;
                toastError(error)
            }            
        }
    }
    xhttp.send(data);
}

function deletePessoa(ID_PESSOA) {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if(request.readyState === 4) {
            if(request.status === 200) { 
                mainContent = document.getElementById('main-content')
                var response = this.responseText;
                mainContent.innerHTML = response;
                actionButtons()
            } else {
                var error = 'Houve um erro na requisição: ' +  request.status + ' ' + request.statusText;
                alert(error);
            } 
        }
    }
    request.open('GET', BASE_URL+'pessoas/deletar/'+ID_PESSOA , true);
    request.send();
}

const btnInserirPessoa = document.getElementById('btn-salvar-inserir')
btnInserirPessoa.addEventListener('click', function(event){
    postPessoa()
})
function postPessoa() {
    let form = document.querySelector('#inserirPessoa');
    var data = new FormData(form);
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", form.getAttribute('action'), true); 
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
            if(this.status == 200){
                mainContent = document.getElementById('main-content')
                var response = this.responseText;
                mainContent.innerHTML = response;
                pessoaInserirModal.hide()
                actionButtons()
                form.reset()
                resetValidation()
                toastSuccess("<strong>Pessoa inserida com sucesso!</strong>")
            }else if(this.status == 400){
                let respostaHtml = '<strong>Houve erros no formulário:</strong> <br>'
                jsonResposta = JSON.parse(this.responseText);
                for (var key in jsonResposta) {
                    const inputElem = form.querySelector('input[name='+key+']');
                    inputElem.classList.add('is-invalid')
                    jsonResposta[key].forEach( function(item) {
                        respostaHtml += '<p class="mb-0">'+item+'</p>'
                    })
                }
                toastError(respostaHtml)
            }else{
                var error = 'Houve um erro na requisição: ' +  this.status + ' ' + this.statusText;
                toastError(error);
            }            
        }
    }
    xhttp.send(data);
}

function resetValidation(){
    document.querySelectorAll('.is-invalid').forEach( function(item) {
        item.classList.remove('is-invalid')
    });
}

function toastError(mensagem) {    
    var toastBody = document.getElementById('toast-error-body')
    toastBody.innerHTML = mensagem
    const toastError = document.getElementById('toast-error')
    const toast = new bootstrap.Toast(toastError)
    toast.show()
}
function toastSuccess(mensagem) {    
    var toastBody = document.getElementById('toast-success-body')
    toastBody.innerHTML = mensagem
    const toastSuccess = document.getElementById('toast-success')
    const toast = new bootstrap.Toast(toastSuccess)
    toast.show()
}

function mascara(){
    document.querySelectorAll('.cpfMask').forEach( function(item) {
        var maskOptionsCpf = {mask: '000.000.000-00'};
        var cpf = IMask(item, maskOptionsCpf);
    });
    document.querySelectorAll('.rgMask').forEach( function(item) {
        var maskOptionsRg = {mask: '00.000.000-00'};
        var rg = IMask(item, maskOptionsRg);
    });
    document.querySelectorAll('.telefoneMask').forEach( function(item) {
        var maskOptionsTelefone = {mask: '(00) 0000-0000'};
        var telefone = IMask(item, maskOptionsTelefone);
    });
    document.querySelectorAll('.celularMask').forEach( function(item) {
        var maskOptionsCelular = {mask: '(00) 00000-0000'};
        var celular = IMask(item, maskOptionsCelular);
    });
}