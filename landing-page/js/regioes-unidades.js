$(document).ready(function () {
    $.getJSON('js/regioes-unidades.json', function (data) {
        var items = [];
        var options = '<option value="" selected disabled>Selecione a região</option>';

        $.each(data, function (key, val) {
            options += '<option value="' + val.sigla + '">' + val.nome + '</option>';
        });

        $("#regiao").html(options);

        $("#regiao").change(function () {
            var options_unidades = '<option value="" selected disabled>Selecione a unidade mais próxima</option>';
            var str = "";

            $("#regiao option:selected").each(function () {
                str += $(this).text();
            });

            $.each(data, function (key, val) {
                if (val.nome == str) {
                    if(val.cidades == 0){
                        options_unidades = '<option value="INDISPONÍVEL">Não possui disponibilidade.</option>';
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