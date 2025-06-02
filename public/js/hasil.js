document.getElementById('printTableBtn').addEventListener('click', function () {
        // Ambil elemen tabel
        var table = document.querySelector('table').outerHTML;
        var newWin = window.open('', '', 'width=900,height=600');
        newWin.document.write('<html><head><title>Print Hasil SAW</title>');
        newWin.document.write('<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">');
        newWin.document.write('<style>');
        newWin.document.write('body { font-family: Arial, sans-serif; margin: 20px; }');
        newWin.document.write('table { width: 100%; border-collapse: collapse; margin-top: 20px; }');
        newWin.document.write('th, td { border: 1px solid black; padding: 8px; text-align: left; }');
        newWin.document.write('th { background-color: #f2f2f2; }');
        newWin.document.write('.text-center { text-align: center; margin-bottom: 20px; }');
        newWin.document.write('</style>');
        newWin.document.write('</head><body>');
        newWin.document.write('<h3 class="text-xl font-bold mb-4">Hasil Perhitungan SAW</h3>');
        newWin.document.write(table);
        newWin.document.write('</body></html>');
        newWin.document.close();
        newWin.focus();
        newWin.print();
        newWin.close();
});
