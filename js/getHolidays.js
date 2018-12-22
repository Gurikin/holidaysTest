function getHolidays(getUrl) {
    $('#holidays').submit(function (e) {
        var $form = $(this);
        var res = $("#result");
        //отмена действия по умолчанию для кнопки submit
        e.preventDefault();
        $.ajax({
            type: $form.attr('method'),
            url: getUrl,
            data: $form.serialize(),
            success: function (result) {
                res.html(result);
            }
        }).done(function () {
            console.log('success');
        }).fail(function () {
            console.log('fail');
        });
    });
}
