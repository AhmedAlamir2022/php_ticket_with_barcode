<?php require ('../admin/include/dbcon.php'); ?>
<?php require ('session.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ticket Management System</title>

    <!-- Bootstrap core CSS -->

    <link href="../admin/css/bootstrap.min.css" rel="stylesheet">

    <link href="../admin/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="../admin/css/animate.min.css" rel="stylesheet">
    <!-- Custom styling plus plugins -->
    <link href="../admin/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../admin/css/maps/jquery-jvectormap-2.0.1.css" />
    <link href="../admin/css/icheck/flat/green.css" rel="stylesheet" />
    <link href="../admin/css/floatexamples.css" rel="stylesheet" type="text/css" />
    <link href="../admin/css/datatables/tools/css/dataTables.tableTools.css" rel="stylesheet">
    <!-- select2 -->
    <link href="../admin/css/select/select2.min.css" rel="stylesheet">
	
    <!-- Bootstrap core CSS -->

    <link href="../admin/css/bootstrap.min.css" rel="stylesheet">

    <link href="../admin/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="../admin/css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="../admin/css/custom.css" rel="stylesheet">
    <link href="../admin/css/icheck/flat/green.css" rel="stylesheet">
    <!-- ion_range -->
    <link rel="stylesheet" href="../admin/css/normalize.css" />
    <link rel="stylesheet" href="../admin/css/ion.rangeSlider.css" />
    <link rel="stylesheet" href="../admin/css/ion.rangeSlider.skinFlat.css" />

    <!-- colorpicker -->
    <link href="../admin/css/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet">
    
    <script src="../admin/js/jquery.min.js"></script>	
    <!-- ion_range -->
    <link rel="stylesheet" href="../admin/css/normalize.css" />
    <link rel="stylesheet" href="../admin/css/ion.rangeSlider.css" />
    <link rel="stylesheet" href="../admin/css/ion.rangeSlider.skinFlat.css" />
	<link id="bootstrap-style" href="../admin/css/slide.css" rel="stylesheet">
    <!-- Bootstrap --> 
        <link rel="stylesheet" type="text/css" href="../admin/css/DT_bootstrap.css">
		<script src="../admin/js/jquery.js" type="text/javascript"></script>
		<script src="../admin/js/bootstrap.js" type="text/javascript"></script>
		
		<script type="text/javascript" charset="utf-8" language="javascript" src="../admin/js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8" language="javascript" src="../admin/js/DT_bootstrap.js"></script>
		<script src="../admin/js/nprogress.js"></script>
		
    <script>
        NProgress.start();
    </script>
    
</head>


<body class="nav-md">


    <div class="container body">
        <div class="main_container">

			<?php include ('sidebar_menu.php'); ?>
				<?php include ('top_nav.php'); ?>
			<?php //include 'slidebar_with_nav.php' ?>	
					<!-- page content -->
					<div class="right_col" role="main">
						<div class="">