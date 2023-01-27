function focusText(element){
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

    console.log(img + '\n' + tipoImg);

    if (img) {

        var formData = new FormData();
        formData.append('id', 1);
        formData.append('img', img);
        formData.append('tipoImg', tipoImg);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

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




