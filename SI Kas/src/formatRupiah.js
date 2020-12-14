//inisialisasi inputan
var bayar = document.getElementById('bayar');

bayar.addEventListener('keyup', function (e) {
    bayar.value = formatRupiah(this.value, 'Rp. ');
    // harga = cleanRupiah(dengan_rupiah.value);
    // calculate(harga,service.value);
});

//generate dari inputan angka menjadi format rupiah

function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}

//generate dari inputan rupiah menjadi angka

function cleanRupiah(rupiah) {
    var clean = rupiah.replace(/\D/g, '');
    return clean;
    // console.log(clean);
}