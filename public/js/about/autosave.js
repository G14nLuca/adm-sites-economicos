//Adcionar uma borda preta mais destacada ao campo de texto em uso pelo usuário
function focusText(element) {
    element.style.border = "3px solid black";
}

/*
* Salvar automaticamente no banco de dados qualquer alteração realizada pelo usuário em um campo de texto;
* O método é executado quando o input estiver fora do foco, tiver sido desselecionado pelo usuário;
* Caso o salvamento seja feito com sucesso, uma borda verde aparecerá ao redor do input.
* Do contrário, uma borda vermelha será exibida.
*/
function autosaveText(element) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
        }
    });

    // Requisição HTTP que irá enviar os dados para o backend
    $.ajax({
        type: "POST",
        url: "update/text",
        data: {
            id: 1, 
            nome: $(element).attr("name"),
            valor: $(element).val()
        },
        success: function (data) {
            element.style.borderColor = "green";
        },
        error: function (data) {
            element.style.borderColor = "red";
        }
    });

}

function autosaveRadio() {

    //resgatando valor escolhido pelo usuário
    var radio_value = $("input[name='corBotao']:checked").val();

    //adicionando token CSRF à requisição
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
        }
    });

    //Enviando requisição HTTP POST
    $.ajax({
        type: "POST",
        url: "update/text",
        data: {
            id: 1,
            nome: "corBotao",
            valor: radio_value
        }
    });
}

/*
* Salvar automaticamente no banco de dados as imagens enviadas pelo usuário;
* Caso bem-sucedido o processo, uma preview da imagem será exibida para o usuário.
* Do contrário, será exibido um aviso pedindo para o usuário tentar novamente.
*/
function imgUpload(element) {

    var img = $(element)[0].files[0];
    var tipo_imagem = $(element).attr("name");

    if (img) {

        //criando formData com os dados a serem enviados pela requisição
        var form_data = new FormData();
        form_data.append("id", 1);
        form_data.append("img", img);
        form_data.append("tipo_imagem", tipo_imagem);

        //adicionando token CSRF à requisição
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
            }
        });

        //requisição HTTP POST
        $.ajax({
            type: "POST",
            url: "/update/img",
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            success: function () {

                //Mostrando imagem para o usuário
                var preview = $(element).next().children();
                var reader = new FileReader();

                reader.onload = (e) => {
                    preview.attr("src", e.target.result);
                };

                reader.readAsDataURL(img);

            },
            error: function () {
                alert("Ocorreu um erro. Tente novamente.")
            }
        });
    }


}




