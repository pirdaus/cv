<!--
	Imam Pirdaus
	namasayaimam@gmail.com
	-->
<?php
include "../config/koneksi.php";

	//if(@$_GET['page'] == 'tambah'){
    $name_job = @$_POST['name_job'];
    //echo "halo, inputan". $nama;
    $mail_job = @$_POST['mail_job'];
    $desc_job = @$_POST['desc_job'];
    $salary_job = @$_POST['salary_job'];

 if(@$_GET['page']=='tambah'){
  $insert = $db->prepare("INSERT INTO jobover(name_job, mail_job, desc_job, salary_job) VALUES(?,?,?,?)");
  $insert->bindParam(1, $name_job);
  $insert->bindParam(2, $mail_job);
  $insert->bindParam(3, $desc_job);
  $insert->bindParam(4, $salary_job);
  $insert ->execute();
  if($insert->rowCount() > 0){
      echo "sukses";
  }
}
?>