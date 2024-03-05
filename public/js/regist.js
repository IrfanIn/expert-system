const registration = async (event) => {
    event.preventDefault();
    $('.loading-wrapper').show();

    let data = {};
    $(event.target).find('[name]').each(function () {
        data[$(this).attr('name')] = $(this).val()
    })

    const req = await fetch(app_url + '/registration', {
        method: 'POST',
        headers,
        body: JSON.stringify(data),
    })
    if (req.ok) {
        loading.hide()
        const res = await req.json();
        if (res.status != 201) return Swal.fire('Akun terdaftar', 'akun sudah terdaftar, silahkan login', 'info')

        Swal.fire('Akun terbuat', res.message, 'success')
        setTimeout(() => {
            window.location = app_url + '/login';
        }, 1000);
    }
}

$('.btn-register').attr('disabled', true).addClass('disabled');
function verifyUserRegist() {
    setTimeout(() => {
        $('.btn-register').attr('disabled', false).removeClass('disabled')
    }, 500);
}

