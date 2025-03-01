<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="<?php echo e(asset('adminbackend/assets/images/favicon-32x32.png')); ?>" type="image/png" />
	
	<link href="<?php echo e(asset('adminbackend/assets/plugins/input-tags/css/tagsinput.css')); ?>" rel="stylesheet" />

	<!--plugins-->
	<link href="<?php echo e(asset('adminbackend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')); ?>" rel="stylesheet"/>
	<link href="<?php echo e(asset('adminbackend/assets/plugins/simplebar/css/simplebar.css')); ?>" rel="stylesheet" />
	<link href="<?php echo e(asset('adminbackend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')); ?>" rel="stylesheet" />
	<link href="<?php echo e(asset('adminbackend/assets/plugins/metismenu/css/metisMenu.min.css')); ?>" rel="stylesheet" />
	<!-- loader-->
	<link href="<?php echo e(asset('adminbackend/assets/css/pace.min.css')); ?>" rel="stylesheet" />
	<script src="<?php echo e(asset('adminbackend/assets/js/pace.min.js')); ?>"></script>
	<!-- Bootstrap CSS -->
	<link href="<?php echo e(asset('adminbackend/assets/css/bootstrap.min.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('adminbackend/assets/css/app.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('adminbackend/assets/css/icons.css')); ?>" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link href="<?php echo e(asset('adminbackend/assets/plugins/datatable/css/dataTables.bootstrap5.min.css')); ?>" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="<?php echo e(asset('adminbackend/assets/css/dark-theme.css')); ?>" />
	<link rel="stylesheet" href="<?php echo e(asset('adminbackend/assets/css/semi-dark.css')); ?>" />
	<link rel="stylesheet" href="<?php echo e(asset('adminbackend/assets/css/header-colors.css')); ?>" />
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

	
	<title>Admin Dashboard</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<?php echo $__env->make('admin.body.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<!--end sidebar wrapper -->
		<!--start header -->
		<?php echo $__env->make('admin.body.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<?php echo $__env->yieldContent('admin'); ?>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<!-- <div class="overlay toggle-icon"></div> -->
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<?php echo $__env->make('admin.body.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</div>
	<!--end wrapper-->
	<!--start switcher-->
	
	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="<?php echo e(asset('adminbackend/assets/js/bootstrap.bundle.min.js')); ?>"></script>
	<!--plugins-->
	<script src="<?php echo e(asset('adminbackend/assets/js/jquery.min.js')); ?>"></script>
	<script src="<?php echo e(asset('adminbackend/assets/plugins/simplebar/js/simplebar.min.js')); ?>"></script>
	<script src="<?php echo e(asset('adminbackend/assets/plugins/metismenu/js/metisMenu.min.js')); ?>"></script>
	<script src="<?php echo e(asset('adminbackend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')); ?>"></script>
	<script src="<?php echo e(asset('adminbackend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('adminbackend/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')); ?>"></script>
	<script src="<?php echo e(asset('adminbackend/assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js')); ?>"></script>
	<script src="<?php echo e(asset('adminbackend/assets/plugins/sparkline-charts/jquery.sparkline.min.js')); ?>"></script>
	<script src="<?php echo e(asset('adminbackend/assets/plugins/jquery-knob/excanvas.js')); ?>"></script>
	<script src="<?php echo e(asset('adminbackend/assets/plugins/datatable/js/jquery.dataTables.min.js')); ?>"></script>
	<script src="<?php echo e(asset('adminbackend/assets/js/validate.min.js')); ?>"></script>


	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>

	
	<script src="<?php echo e(asset('adminbackend/assets/plugins/jquery-knob/jquery.knob.js')); ?>"></script>
	  <script>
		  $(function() {
			  $(".knob").knob();
		  });
	  </script>
	  <script src="<?php echo e(asset('adminbackend/assets/js/index.js')); ?>"></script>

	<!--app JS-->
	<script src="<?php echo e(asset('adminbackend/assets/js/app.js')); ?>"></script>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
 <?php if(Session::has('message')): ?>
 var type = "<?php echo e(Session::get('alert-type','info')); ?>"
 switch(type){
    case 'info':
    toastr.info(" <?php echo e(Session::get('message')); ?> ");
    break;

    case 'success':
    toastr.success(" <?php echo e(Session::get('message')); ?> ");
    break;

    case 'warning':
    toastr.warning(" <?php echo e(Session::get('message')); ?> ");
    break;

    case 'error':
    toastr.error(" <?php echo e(Session::get('message')); ?> ");
    break; 
 }
 <?php endif; ?> 
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="<?php echo e(asset('adminbackend/assets/js/code.js')); ?>"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?php echo e(asset('adminbackend/assets/plugins/input-tags/js/tagsinput.js')); ?>"></script>


<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>	</script>
	<script>
		tinymce.init({
		  selector: '#mytextarea'
		});
	</script>



</body>

</html><?php /**PATH E:\Cuata\laravel10\resources\views/admin/admin_dashboard.blade.php ENDPATH**/ ?>