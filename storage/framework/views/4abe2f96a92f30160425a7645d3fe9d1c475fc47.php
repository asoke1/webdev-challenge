<?php $__env->startSection('title','NRI Challenge'); ?>


<?php $__env->startSection('content'); ?>
    <h3 class="text-center">NRI Challenge Solution</h3>
    <h4>Result Data</h4>
    <div>Post title is <?php echo e($title); ?></div>
   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>