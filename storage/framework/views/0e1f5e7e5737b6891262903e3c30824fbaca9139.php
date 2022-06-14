<?php $__env->startSection('title','Ratting'); ?>

<?php $__env->startSection('content'); ?>

<section class="section">

<div class="section-header">
    <h1><?php echo e(__('Rating and reviews')); ?></h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?php echo e(url('vendor/vendor_home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
        <div class="breadcrumb-item"><?php echo e(__('Review Rating')); ?></div>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title"><?php echo e(__("Vendor’s Review and Ratings")); ?></h2>
    <p class="section-lead"><?php echo e(__('Add, Ratings, and Reviews.  (Add, Edit & Manage Reviews and Ratings)')); ?></p>
    <div class="card">
        <div class="card-header">
            <div class="w-100">
                <?php echo e(__('Vendor reviews')); ?>

            </div>
        </div>
        <div class="card-body table-responsive">
            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th><?php echo e(__('Order Id')); ?></th>
                        <th><?php echo e(__('User name')); ?></th>
                        <th><?php echo e(__('Review')); ?></th>
                        <th><?php echo e(__('Rate')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($review->order); ?></td>
                        <td><?php echo e($review->user['name']); ?></td>
                        <td><?php echo e($review->comment); ?></td>
                        <td>
                            <?php for($i = 1; $i < 6; $i++): ?>
                                <?php if($review->rate >= $i): ?>
                                    <i class="fas fa-star text-warning"></i>
                                <?php else: ?>
                                    <i class="far fa-star"></i>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app',['activePage' => 'rattings'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/api.gobistro.in/public_html/resources/views/vendor/vendor/ratting.blade.php ENDPATH**/ ?>