$('.icon-validation').hide()

$('input').attr('required', true)

$('#reset-form').hide();
$('#helpEmail').hide();
$('.send-token').hide();
$('.btn-reset').hide();
$('#token').parent().hide();

$(document).ready(function () {
    loading.hide();
})

$('#form-new-password').on('submit', event => {
    event.preventDefault();
})

$('.eye-icon').each(function () {
    $(this).on('click', function () {
        $(this).toggleClass('text-primary')
        const input = $(this).parent().find('input');
        if (input.attr('type') == 'password') return input.attr('type', 'text')
        input.attr('type', 'password')
    })
})

if (typeof grecaptcha === 'undefined') {
    grecaptcha = {};
}

grecaptcha.ready = function (cb) {
    if (typeof grecaptcha === 'undefined') {
        const c = '___grecaptcha_cfg';
        window[c] = window[c] || {};
        (window[c]['fns'] = window[c]['fns'] || []).push(cb);
    } else {
        cb();
    }
}

grecaptcha.ready(function () {
    grecaptcha.render("container", {
        sitekey: "6LfKUVQmAAAAAJAlaMih_8jebQj8N8gnvzr989cH",
        callback: verifyUserRegist
    });
});


// forget password section
const data = [];

$('.check-email').on('click', async () => {
    const email = $('#email').val()
    $('#email').removeClass('border-danger')
    $('#helpEmail').hide().removeClass(['text-primary', 'text-danger']);
    loading.show()
    try {
        const url = await fetch(`${app_url}/api/email/${email}`);
        const res = await url.json();
        if (res.status == 200) {
            data.push(res)
            loading.hide()
            $('#helpEmail').show().text('Check email anda!').addClass('text-primary')
            $('.user-id').val(res.user)
            $('.send-token').show()
            $('.check-email').hide()
            $('#token').parent().show()
        } else {
            setTimeout(() => {
                loading.hide()
                $('#helpEmail').show().addClass('text-danger')
                $('#email').addClass('border-danger')
            }, 700);
        }
    } catch (error) {
        loading.hide()
    }
})

$('.send-token').on('click', () => {
    loading.show()
    const token = $('#token').val()
    if (data[0].data == token) {
        $('#form-new-password').unbind('submit')
        setTimeout(() => {
            $('.send-token').hide()
            loading.hide()
            $('.btn-reset').show();
            $('#verification').hide();
            $('#reset-form').show();
        }, 700);
    } else {
        setTimeout(() => {
            loading.hide()
            $('#token').addClass('border-danger')
        }, 500);
    }
})
