<?php $__env->startSection('title','Cuisine'); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <?php if(Session::has('msg')): ?>
            <?php echo $__env->make('layouts.msg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <div class="section-header">
            <h1><?php echo e(__('cuisines')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(url('admin/home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
                <div class="breadcrumb-item active"><a href="<?php echo e(url('admin/cuisine')); ?>"><?php echo e(__('Create cuisine')); ?></a></div>
                <div class="breadcrumb-item"><?php echo e(__('Cuisine')); ?></div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title"><?php echo e(__('Cuisine menu')); ?></h2>
            <p class="section-lead"><?php echo e(__('Add, Edit, Manage Cuisine')); ?></p>
            <form class="container-fuild" action="<?php echo e(url('admin/cuisine')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="card p-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-5">
                                <label for="Promo code name"><?php echo e(__('cuisine')); ?></label>
                                <div class="logoContainer">
                                    <img id="image" src="<?php echo e(url('images/upload/impageplaceholder.png')); ?>" width="180" height="150">
                                </div>
                                <div class="fileContainer sprite">
                                    <span><?php echo e(__('Image')); ?></span>
                                    <input type="file" name="image" value="Choose File" id="previewImage"  data-id="add" accept=".png, .jpg, .jpeg, .svg">
                                </div>
                                <?php $__errorArgs = ['image'];
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
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for=""><?php echo e(__('Name of Cuisine')); ?><span class="text-danger">&nbsp;*</span></label>
                                <input type="text" name="name" placeholder="<?php echo e(__('Enter Cuisine Name')); ?>" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is_invalide <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required="true">
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
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="status"><?php echo e(__('Status')); ?></label><br>
                                <label class="switch">
                                    <input type="checkbox" name="status">
                                    <div class="slider"></div>
                                </label>
                            </div>
                        </div>

                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary"><?php echo e(__('Create Cuisine')); ?></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app',['activePage' => 'cuisine'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/api.gobistro.in/public_html/resources/views/admin/cuisine/create_cuisine.blade.php ENDPATH**/ ?>