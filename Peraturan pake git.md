1. wajib melakukan pull sebelum mengedit kodingan!!!!
2. wajib melakukan pull sebelum melakukan push!!!!
3. wajib melakukan backup di localfile masing masing!!!!
4. jika terjadi tabrakan saat melakukan push backup dulu file biar aman kemudian masukan command berikut:
   git filter-branch --index-filter 'git rm -r --cached --ignore-unmatch <file/dir>' --all
   setelah itu silahkan pull file kembali lalu lakukan push
