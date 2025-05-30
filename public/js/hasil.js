document.getElementById('printTableBtn').addEventListener('click', function () {
        // Ambil elemen tabel
        var table = document.querySelector('table');
        var newWin = window.open('', '', 'width=900,height=600');
        newWin.document.write('<html><head><title>Print Hasil SAW</title>');
        newWin.document.write('<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">');
        newWin.document.write('</head><body>');
        newWin.document.write('<h3 class="text-xl font-bold mb-4">Hasil Perhitungan SAW</h3>');
        newWin.document.write(table.outerHTML);
        newWin.document.write('</body></html>');
        newWin.document.close();
        newWin.focus();
        newWin.print();
        newWin.close();
});
