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


$(document).on('click', '.jay-ajax-search', function () {

})

$(document).on('click', '.qrcode-content-submit', function () {
    let text = $(this).closest('.qrcode-content-form').find("#qrcode-content").val();
    let htmlAlert = '';
    if (!text) {
        htmlAlert = alertMessage('error!!!', '请添加需要转化的文字内容', 3000);
        $('.jay-alert').html(htmlAlert);
        return false;
    }
    let url = $(this).closest('.qrcode-content-form').find("[name=ajaxUrl]").val();

    let data = {'text': text};
    ajaxQrcode(data, url);
});

function ajaxQrcode(data, url)
{
    let htmlAlert = '';
    $.ajax({
        url: url,
        data: data,
        dataType: 'json',
        type: 'GET',
        success: function (res) {
            if (res.code === 200 && res.status) {
                htmlAlert = alertMessage('success!!!', '', 3000, 3);
                $('.jay-alert').html(htmlAlert);
                $('.jay-qrocde-show').html(res.data);

                let svgW = $('.jay-qrocde-show').find('svg').width();
                // let downloadW = $('.jay-qrcode-download').find('span').outerWidth();
                let downloadW = 96;
                let pw = (svgW-downloadW) / 2;
                $('.jay-qrcode-download').css('padding-left', pw);
                $('.jay-qrcode-download').toggle();
            } else {
                htmlAlert = alertMessage('error!!!', res.message, 3000);
                $('.jay-alert').html(htmlAlert);
            }
        },
        error: function (error) {
            console.log(error);
        }
    });
}

$(document).on('click', '.jay-qrcode-download', function () {
    let url, data, navId;

    navId =  $('#jay-nav-tab').find('.active').attr('aria-controls');

    url = $("#"+navId).find("[name=ajaxUrl]").val();
    console.log(url);
    data = {text: $("#"+navId).find('#qrcode-content').val(), download: 'yes'};
    ajaxQrcode(data, url);
});



function alertMessage(title, message, time, level)
{
    let alertLevel = '';
    if (typeof level === 'number') {
        alertLevel = switchAlert(level);
    } else if (typeof level === 'string') {
        alertLevel = level;
    } else {
        alertLevel = 'alert-dark';
    }

    let alertHtml = '<div role="alert" class="alert alert-dismissible fade show '+alertLevel+'">';
    alertHtml += '<strong class="alert-title">'+title+'</strong>';
    alertHtml += '<span class="alert-message">'+message+'</span>';
    alertHtml += '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
    alertHtml += '<span aria-hidden="true">&times;</span>';
    alertHtml += '</button>';
    alertHtml += '</div>';

    window.setTimeout(function(){
        $('[data-dismiss="alert"]').alert('close');
    },time);

    return alertHtml;
}

function switchAlert(levelNumber)
{
    let messageAlert = 'alert-';
    switch (levelNumber) {
        case 1:
            messageAlert += 'primary';
            break;
        case 2:
            messageAlert += 'secondary';
            break;
        case 3:
            messageAlert += 'success';
            break;
        case 4:
            messageAlert += 'danger';
            break;
        case 5:
            messageAlert += 'warning';
            break;
        case 6:
            messageAlert += 'info';
            break;
        case 7:
            messageAlert += 'light';
            break;
        case 8:
            messageAlert += 'dark';
            break;
        default:
            messageAlert += 'primary';
            break;
    }

    return messageAlert;
}
