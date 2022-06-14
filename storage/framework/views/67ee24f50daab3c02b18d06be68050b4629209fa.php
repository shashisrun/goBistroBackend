<?php $__env->startSection('title','Tables'); ?>

<?php $__env->startSection('content'); ?>

<section class="section">

<div class="section-header">
    <h1><?php echo e(__('Manage Tables')); ?></h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?php echo e(url('vendor/vendor_home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
        <div class="breadcrumb-item"><?php echo e(__('Tables')); ?></div>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title"><?php echo e(__("Vendor’s Tables")); ?></h2>
    <p class="section-lead"><?php echo e(__('Add, Edit & Manage Tables')); ?></p>
    <div class="card">
        <div class="card-header">
            <h4><?php echo e(__('Vendor tables')); ?></h4>
                <div class="w-100">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('vendor_table_access')): ?>
                        <a href="<?php echo e(url('vendor/table/create')); ?>" class="btn btn-primary float-right"><?php echo e(__('Add New')); ?></a>
                    <?php endif; ?>
                </div>
        </div>
        <div class="card-body table-responsive">
            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th><?php echo e(__('Table')); ?></th>
                        <th><?php echo e(__('Capacity')); ?></th>
                        <th><?php echo e(__('QRCode')); ?></th>
                        <th><?php echo e(__('Actions')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $tables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $table): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($table->name); ?></td>
                        <td><?php echo e($table->capacity); ?></td>
                        <td><form action="<?php echo e(url('/generateqrcode')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="url" value="<?php echo e('https://gobistro.app/'.$vendor->id.'/'.$table->id); ?>"/>
                            <input type="submit" >
                        </form></td>
                        <td><a href="<?php echo e(url('/vendor/table/'.$table->id.'/edit/')); ?>"><h6>Edit</h6></a></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app',['activePage' => 'tables'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/api.gobistro.in/public_html/resources/views/vendor/vendor/table.blade.php ENDPATH**/ ?>