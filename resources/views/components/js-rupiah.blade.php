<script type="text/javascript">
    let rupiah = document.querySelectorAll("form#input-keuangan input");

    for(let i = 0; i < rupiah.length; i ++) {
        rupiah[i].addEventListener("keyup", function(e) {
            rupiah[i].value = formatRupiah(this.value, "Rp. ");
        });
    } 

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
        let number_string = angka.replace(/[^,\d]/g, "").toString(),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
    }
</script>