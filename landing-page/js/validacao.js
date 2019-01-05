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

$(document).ready(() => { 
    let $cpf = $("#telefone");
    $cpf.mask('(00) 00000-0000', { reverse: false });
});