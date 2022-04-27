$(document).on('click', '.query-send', function (event) {
    event.preventDefault();
    var data = $('.question-form').serialize();
    var url = $('.question-form').attr('action');
    var first_name = $('.question-form');
    var last_name = $('.question-form');

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
    return false;
});