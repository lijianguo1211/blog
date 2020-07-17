$(".new_a_liyi").on('click', function () {
    let url = '';
    let number = Number($(this).find('.likes_count').text());
    if ($(this).hasClass('active')) {
        //-
        $(this).removeClass('active');
        url = $(this).find('.remove').val();
        jayAjaxLikesNumber(url, $(this), number, 0);
    } else {
        //+
        url = $(this).find('.add').val();
        $(this).addClass('active');
        jayAjaxLikesNumber(url, $(this), number, 1);
    }
});

function jayAjaxLikesNumber(url, that, number, type) {
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

$('.box_margin_max_35').find('.jay-float-right').on('click', function () {
    let content = simplemde.value();
    let token = $(this).closest('.card-body').find("[name=_token]").val();
    let url = $(this).closest('.card-body').find('.comment').val();
    jayComment(url, {'content': content, '_token': token})
});

function jayComment(url, data)
{
    $.ajax({
        url: url,
        type: 'POST',
        data:data,
        dataType: 'json',
        beforeSend: function () {

        },
        success: function (res) {
            console.log(res);
        },
        error: function (err) {

        }
    })
}

$('.jay-ajax-many-blog').on('click', function () {
    let page = $(this).data('key');
    ++page;
    let url = 'blog-list/'+page;
    ajaxGetManyBlog(page, $(this), url, 2);
});

$('.jay-ajax-many-home').on('click', function () {
    let page = $(this).data('key');
    ++page;
    let url = 'home-list/'+page;
    ajaxGetManyBlog(page, $(this), url, 1);
});

/**
 *
 * @param page
 * @param that
 * @param url
 * @param type 1 => home; 2 => blog
 */
function ajaxGetManyBlog(page, that, url, type)
{
    $.ajax({
        url: url,
        dataType: 'json',
        method: "GET",
        beforeSend: function () {
            that.prop('disabled', true);
            that.find('.jay-loading-text').text('正在加载');
            that.find('.spinner-border').show();
        },
        success: function (res) {
            if (res.status) {
                that.data('key', page);
                if (res.message) {
                    that.prop('disabled', false);
                    that.find('.jay-loading-text').text('加载更多');
                    that.find('.spinner-border').hide();
                    switch (type) {
                        case 1:
                            that.closest('.blog-main').find('.jay-list').append(res.message);
                            break;
                        case 2:
                            that.closest('.container').find('.row:first').append(res.message);
                            break;
                    }
                } else {
                    that.find('.spinner-border').hide();
                    that.find('.jay-loading-text').text('没有数据啦');
                }
            } else {
                that.prop('disabled', false);
                that.find('.jay-loading-text').text('加载更多');
            }
        },
        error: function (err) {
            that.prop('disabled', false);
            that.find('.jay-loading-text').text('加载更多');
        }
    });
}

$('#toTop').on('click', function (e) {
    e.preventDefault();
    $('html,body').animate({scrollTop: 0}, 500);
});

$(window).scroll(function() {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        $('#toTop').fadeIn(500);
    } else {
        $('#toTop').fadeOut(500);
    }
});
