<!-- www.malasngoding.com -->
 
<?php 
// menghubungkan dengan koneksi
include 'connection.php';
// menghubungkan dengan library excel reader
include "excel_reader2.php";


$event_id =  $_POST['EVENT_ID'];
echo $event_id;

?>
 
<?php
// upload file xls
$target = basename($_FILES['filepegawai']['name']) ;
move_uploaded_file($_FILES['filepegawai']['tmp_name'], $target);
 
// beri permisi agar file xls dapat di baca
chmod($_FILES['filepegawai']['name'],0777);
 
// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['filepegawai']['name'],false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);
 
// jumlah default data yang berhasil di import
$berhasil = 0;
for ($i=2; $i<=$jumlah_baris; $i++){
 
	// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
	$kpk     = str_replace("'", '', $data->val($i, 1));
	$employee_name  = str_replace("'", '', $data->val($i, 2));
	try {
		 if($employee_name != "" && $kpk != ""){
			// input data ke database (table data_pegawai)
			mysqli_query($connection,"INSERT into employee (KPK,EMPLOYEE_NAME,event_id,CREATED_AT) values('$kpk','$employee_name','$event_id','')");
			
		}
	 
	}
	catch(Exception $e) {
	  echo 'Message: ' .$e->getMessage();
	}
	
}
 
// hapus kembali file .xls yang di upload tadi
unlink($_FILES['filepegawai']['name']);
 
// alihkan halaman ke index.php
header("location:index");
?>