$(".new_a_liyi").on('click', function () {
    let url = '';
    let number = Number($(this).find('.likes_count').text());
    if ($(this).hasClass('active')) {
        //-
        $(this).removeClass('active');
        url = $(this).find('.remove').val();
        liyiAjaxLikesNumber(url, $(this), number, 0);
    } else {
        //+
        url = $(this).find('.add').val();
        $(this).addClass('active');
        liyiAjaxLikesNumber(url, $(this), number, 1);
    }
});

function liyiAjaxLikesNumber(url, that, number, type) {
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        beforeSend: function () {
            that.find('.spinner-border').show();
            that.find('svg').hide();
        },
        success: function (res) {
            that.find('.spinner-border').hide();
            that.find('svg').show();
            console.log(number);
            if (res.status) {
                if (type === 1) {
                    that.find('.likes_count').text(++number);
                } else {
                    if (number >= 1) {
                        number = --number;
                    } else {
                        number = 0;
                    }
                    that.find('.likes_count').text(number);
                }
            }
        },
        error: function (err) {
            that.find('.spinner-border').hide();
            that.find('svg').show();
        }
    })
}
