<!DOCTYPE html>
<html>
<head>
	<title><?php echo $__env->yieldContent('title'); ?></title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
				<?php echo $__env->yieldContent('content'); ?>
				<?php if($errors->any()): ?>
				<h4><?php echo e($errors->first()); ?></h4>
				<?php endif; ?>
		</div>
</div>
</body>
</html>