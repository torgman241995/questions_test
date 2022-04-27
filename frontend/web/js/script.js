$(document).on('click', '.query-send', function (event) {
    event.preventDefault();
    var data = $('.question-form').serialize();
    var url = $('.question-form').attr('action');

    if($('#firstname_input').val().length > 2 && $('#lastname_input').val().length > 2){
        $.post({
            url: url,
            type: 'post',
            dataType: 'json',
            data: data
        })
            .done(function(response) {
                alert(response.data.message);
                window.location.reload();
        });
    }else{
        alert('Please input correct data');
        return false;
    }

    return false;
});