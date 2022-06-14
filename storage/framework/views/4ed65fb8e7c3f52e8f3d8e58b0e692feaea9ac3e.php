<?php $__env->startSection('title','Edit Tables'); ?>

<?php $__env->startSection('content'); ?>

<section class="section">

    <div class="section-header">
        <h1><?php echo e(__('Edit Table')); ?></h1>
        <div class="section-header-breadcrumb">
            <?php if(Auth::user()->load('roles')->roles->contains('title', 'admin')): ?>
                <div class="breadcrumb-item active"><a href="<?php echo e(url('admin/home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
                <div class="breadcrumb-item"><a href="<?php echo e(url('admin/tables')); ?>"><?php echo e(__('Table')); ?></a></div>
                <div class="breadcrumb-item"><?php echo e(__('Edit a Table')); ?></div>
            <?php endif; ?>

            <?php if(Auth::user()->load('roles')->roles->contains('title', 'vendor')): ?>
                <div class="breadcrumb-item active"><a href="<?php echo e(url('vendor/vendor_home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
                <div class="breadcrumb-item"><a href="<?php echo e(url('vendor/tables')); ?>"><?php echo e(__('Table')); ?></a></div>
                <div class="breadcrumb-item"><?php echo e(__('Edit a Table')); ?></div>
            <?php endif; ?>
        </div>
    </div>
    <div class="section-body">
        <h2 class="section-title"><?php echo e(__('Table Management')); ?></h2>
        <p class="section-lead"><?php echo e(__('Edit Table')); ?></p>
        <div class="card p-3">
            <div class="card-body">
                <form class="container-fuild" action="<?php echo e(route('table.update', ['table' => $table->id])); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="Table"><?php echo e(__('Table name')); ?><span class="text-danger">&nbsp;*</span></label>
                            <input type="text" name="name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is_invalide <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('Enter Table Name')); ?>" value="<?php echo e($table->name); ?>" required="">
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="custom_error" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="capacity"><?php echo e(__('Table capacity')); ?><span class="text-danger">&nbsp;*</span></label>
                            <input type="number" name="capacity" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is_invalide <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="capacity" placeholder="<?php echo e(__('Enter Table Capacity')); ?>" value="<?php echo e($table->capacity); ?>" required="">
                            <?php $__errorArgs = ['capacity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="custom_error" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <button class="btn btn-primary" type="submit"><?php echo e(__('Update Table')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app',['activePage' => 'tables'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/api.gobistro.in/public_html/resources/views/vendor/vendor/edit_table.blade.php ENDPATH**/ ?>