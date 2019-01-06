$(document).ready(function () {
    $.getJSON('view/assets/js/regioes-unidades.json', function (data) {
        let items = [];
        let options = '<option value="" selected disabled>Selecione a região</option>';

        $.each(data, function (key, val) {
            options += '<option value="' + val.nome + '">' + val.nome + '</option>';
        });

        $("#regiao").html(options);

        $("#regiao").change(function () {
            let options_unidades = '<option value="" selected disabled>Selecione a unidade mais próxima</option>';
            let str = "";

            $("#regiao option:selected").each(function () {
                str += $(this).text();
            });

            $.each(data, function (key, val) {
                if (val.nome == str) {
                    if(val.cidades == 0){
                        options_unidades = '<option value="INDISPONÍVEL" selected>Não possui disponibilidade.</option>';
                    }
                    else{
                        $.each(val.cidades, function (key_city, val_city) {
                            options_unidades += '<option value="' + val_city + '">' + val_city + '</option>';
                        });
                    }
                }
            });
            
            $("#unidade").html(options_unidades);
        }).change();
    });
});