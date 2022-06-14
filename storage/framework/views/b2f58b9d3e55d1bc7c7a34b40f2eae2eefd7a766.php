<?php $__env->startSection('title','Create Banner'); ?>

<?php $__env->startSection('content'); ?>

<section class="section">
    <div class="section-header">
        <h1><?php echo e(__('Create banner')); ?></h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo e(url('admin/home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
            <div class="breadcrumb-item"><a href="<?php echo e(url('admin/banner')); ?>"><?php echo e(__('Create banner')); ?></a></div>
            <div class="breadcrumb-item"><?php echo e(__('Create a banner')); ?></div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title"><?php echo e(__('Banner Management System')); ?></h2>
        <p class="section-lead"><?php echo e(__('Create your banner.')); ?></p>
        <form class="container-fuild" action="<?php echo e(url('admin/banner')); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="card p-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-5">
                            <label for="Promo code name"><?php echo e(__('Banner image')); ?></label>
                            <div class="logoContainer">
                                <img id="image" src="<?php echo e(url('images/upload/impageplaceholder.png')); ?>" width="180" height="150">
                            </div>
                            <div class="fileContainer sprite">
                                <span><?php echo e(__('Image')); ?></span>
                                <input type="file" name="image" value="Choose File" id="previewImage" data-id="add" accept=".png, .jpg, .jpeg, .svg">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for=""><?php echo e(__('Name of Banner')); ?><span class="text-danger">&nbsp;*</span></label>
                            <input type="text" id="update_name" placeholder="<?php echo e(__('Enter Banner Name')); ?>" name="name" value="<?php echo e(old('update_name')); ?>" class="form-control" required="true">
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
                        <button type="submit" class="btn btn-primary"><?php echo e(__('Create banner')); ?></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app',['activePage' => 'banner'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/api.gobistro.in/public_html/resources/views/admin/banner/create_banner.blade.php ENDPATH**/ ?>