<!--
	Imam Pirdaus
	namasayaimam@gmail.com
	-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Imam Pirdaus</title>

    <link rel="stylesheet" href="css/reset-font.css" media="screen">
    <link rel="stylesheet" href="css/screen.css" media="screen">

    <script type="text/javascript" src= "js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#tab1').fadeIn('slow'); //tab pertama ditampilkan
            $('ul#nav li a').click(function() { //jika link di tab di klik
                $('ul#nav li a').removeClass('active'); //menghilangkan class active (yang tampil)
                $(this).addClass("active"); // menambahkan class active pada link yang diklik
                $('.tab_konten').hide(); // menutup semua konten tab
                var aktif = $(this).attr('href') // mencari mana tab yang harus ditampilkan
                $(aktif).fadeIn('slow'); // tab yang dipilih, ditampilkan
                return false;
            })
        });
    </script>

</head>



<body>
<div id="container">
  <h1>Imam Pirdaus</h1>
  <h5>Programmer</h5>
  <ul id="nav">
    <li><a href="#tab1" class="active">ABOUT</a></li>
    <li><a href="#tab2">SKILLS</a></li>
    <li><a href="#tab3">EXPERINCE</a></li>
    <li><a href="#tab4">EDUCATION</a></li>
    <li><a href="#tab5">CONTACT</a></li>
	<li><a href="#tab6">JOB OFFER</a></li>
  </ul>

  <div class="clear"></div>

  <div id="konten">

    <div style="display:none;" id="tab1" class="tab_konten">
	<?php
	include('menu/about.php');
	?>	
    </div>

    <div style="display:none;" id="tab2" class="tab_konten">
	<?php
	include('menu/skil.php');
	?>		
	</div>

    <div style="display:none;" id="tab3" class="tab_konten">
	<?php
	include('menu/experince.php');
	?>	
    </div>

    <div style="display:none;" id="tab4" class="tab_konten">
	<?php
	include('menu/education.php');
	?>	
    </div>

	<div style="display:none;" id="tab5" class="tab_konten">
	<?php
	include('menu/contact.php');
	?>	
    </div>

	<div style="display:none;" id="tab6" class="tab_konten">
	<?php
	include('menu/jobover.php');
	?>	
    </div>

	</div>

  <div id="footer"></div>
</div>
</body>

</html>
