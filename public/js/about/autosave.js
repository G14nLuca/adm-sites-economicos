function focusText(element) {
    element.style.borderColor = '#131147';
}

function autosaveText(element) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'POST',
        url: 'update/text',
        data: {
            id: 1,
            nome: $(element).attr('name'),
            valor: $(element).val()
        },
        success: function (data) {
            element.style.borderColor = 'green';
        },
        error: function (data) {
            element.style.borderColor = 'red';
            alert("Ocorreu um erro ao salvar suas alterações. Tente novamente.")
        }
    });

}

function imgUpload(element) {

    var img = $(element)[0].files[0];
    var tipoImg = $(element).attr('name');

    if (img) {

        //mostrando preview da imagem na página
        var reader = new FileReader();
        
        reader.onload = (e) => {
            $(element).next().children().attr("src", e.target.result);
        };

        reader.readAsDataURL(img);
        

        //criando formData com os dados a serem enviados pela requisição
        var formData = new FormData();
        formData.append('id', 1);
        formData.append('img', img);
        formData.append('tipoImg', tipoImg);

        //adicionando token CSRF à requisição
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //requisição HTTP POST
        $.ajax({
            type: 'POST',
            url: '/update/img',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                element.parentElement.style.border = '1px solid green';
            },
            error: function () {
                element.parentElement.style.border = '1px solid red';
                alert("Ocorreu um erro ao enviar a imagem. Tente novamente.")
            }
        });
    }


}




