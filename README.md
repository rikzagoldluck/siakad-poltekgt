# siakad.poltekgt
UNTUK MENJALANKAN CODING DI LOCALHOST
=====================================
Syarat :
1.  Download XAMPP
2. Pastikan project ini berada di folder xampp/htdocs
3. Konfigurasi koneksi database,buka folder function dan buka file connect.php
  Sesuaikan dengan nama databasenya contoh = "siakad".
  
	$servername	= "localhost";

	$username	= "root";

	$password	= "";

	$database		= "siakad";

3. Buka http://localhost/phpmyadmin dan buat nama database "siakad".
4. import file siakad.sql ke database siakad
5. Buka http://localhost/siakad-poltekgt
6. SELESAI


UNTUK LOGIN KE APLIKASI
============================
1. ketikan pada browser http://localhost/siakad-poltekgt/admin

2. Login:

Administrator
- Username: admin
- password: admin

Operator
- Username: operator
- password: operator
