function limitarCaracteres() {
    let el = document.getElementById("nome");
    let str = el.value;
    let res = str.replace(/[^A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]/g, "");
    
    el.value = res;
}

function validarNome(){
    let nome = document.getElementById("nome").value;

    if (/\s/.test(nome))
        return true;
}

function atribuirValoresForm(){
    document.getElementById('nome2').value = document.getElementById('nome').value;
    document.getElementById('data_nasc2').value = document.getElementById('data_nascimento').value;
    document.getElementById('email2').value = document.getElementById('email').value;
    document.getElementById('telefone2').value = document.getElementById('telefone').value;
}

$(document).ready(() => { 
    let $telefone = $("#telefone");
    $telefone.mask('(00) 00000-0000', { reverse: false });
});