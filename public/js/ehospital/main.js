class Api {
    constructor(url, headers) {
        this.url = url;
        this.headers = headers;
    }

    async get(url) {
        loading.show()
        const req = await fetch(this.url + url)
        loading.hide()

        if (!req.ok)
            return Swal.fire({ title: 'Server error', icon: 'info' })

        const res = await req.json()
        return res
    }

    async post({ url, urlSingle, data, alert, method }) {
        loading.show()
        const urlReq = urlSingle ?? this.url + url;
        const req = await fetch(urlReq, {
            method: method || 'post',
            body: data && JSON.stringify(data),
            headers,
        })
        loading.hide()

        if (!req.ok)
            return Swal.fire({ title: 'Server error', icon: 'info' })

        const res = await req.json();
        if (alert)
            return Swal.fire({ title: res.message || 'Berhasil', icon: 'success' })
        return res
    }

}

const loading = $('.loading-wrapper')
const token = $("meta[name='token']").attr('content')
const headers = {
    'Content-Type': 'application/json',
    'X-CSRF-TOKEN': token,
}

let domain = 'http://localhost:8000'
if (window.location.hostname != 'localhost') {
    domain = 'https://sorlem.com/ehospital'
}

const api = new Api(`${window.location.href}/`, headers)

const rupiah = (value) => Intl.NumberFormat('ja-JP', {
    style: 'currency',
    currency: 'IDR'
}).format(value)

const selectPicker = elem => {
    $('select').attr('data-live-search', true)
    $('.dataTables_length select').addClass('notpicker')
    $(elem).not('.notpicker').selectpicker({
        width: '100%',
        size: 5,
    })
}

const removeItem = elem => elem.parent().fadeOut(() => elem.parent().remove())

const setValTindakan = elem => {
    const parent = elem.parents('.wrap')
    const option = elem.find(':selected')
    const input = (child, value) => parent.children(`input.${child}`).val(value)
    input('rupiah', rupiah(option.data('tarif')))
    input('tarif', option.data('tarif'))
    input('tindakan', option.text().trim())
    parent.find('.total').text(rupiah(option.data('tarif')))
}

let id = 0;
let url_satuan_obat = `${domain}/api/satuan-obat`;
const selectObat = async (select) => {
    const parent = select.parents('.wrap')
    const id = select.find(':selected').val()
    const selectSatuan = parent.find('.select-satuan')
    selectSatuan.children().remove();
    const data = await api.post({ urlSingle: url_satuan_obat, data: { id }, alert: false })
    Object.keys(data.data).map(value =>
        selectSatuan.append(
            `<option value="${data.data[value][0].satuan}" data-max="${data.data[value][0].stok_total}">${value}</option>`
        )
    )
}

const swalAlert = text => Swal.fire(text, '', 'question').then(value => value)

const selectSatuan = elem => {
    const parent = elem.parents('.wrap')
    const option = elem.find(':selected')
    parent.find('.jumlah').attr('max', option.data('max'))
}

$('.reason-span').each(function () {
    $(this).on('mouseover', function () {
        $(this).parent().find('.reason-wrapper').show()
    })
    $(this).on('mouseout', function () {
        $(this).parent().find('.reason-wrapper').hide()
    })
})

$('.btn.btn-delete').on('click', function () {
    const id = $(this).data('id')
    Swal.fire({
        title: 'Hapus data',
        icon: 'question',
        showDenyButton: true,
    }).then(res => res.isConfirmed && $(`#delete-${id}`).submit())
})
