function formatRibuan(input) {
    // Ambil angka murni
    let value = input.value.replace(/\D/g, '');
    let formatted = new Intl.NumberFormat('id-ID').format(value);

    input.value = formatted;                // tampil pakai format ribuan
    document.getElementById("jumlah_asli").value = value; // hidden murni angka
}