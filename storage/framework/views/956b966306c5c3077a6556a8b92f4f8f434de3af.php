<?php $__env->startSection('title','NRI Challenge'); ?>


<?php $__env->startSection('content'); ?>
    <h3 class="text-center">NRI Challenge Solution</h3>

    <form method="post" action="/do_upload" enctype="multipart/form-data">
    	<?php echo csrf_field(); ?>
    	<div class="form-group">
	    	<label>Upload File:</label>
	    	<input type="file" name="csvfile" accept=".csv" class="form-control" required>
	    </div>

	    <button name="btn_upload" class="btn btn-primary btn-md">Upload</button>

    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>