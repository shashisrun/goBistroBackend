<?php $__env->startSection('title','Menu Category'); ?>

<?php $__env->startSection('content'); ?>

<section class="section">
    <?php if(Session::has('msg')): ?>
        <?php echo $__env->make('layouts.msg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <?php if(old('old_value') == "add_menu"): ?>
        <script type="text/javascript">
             $(function ()
             {
                $('#insert_modal').modal();
                $('#insert_modal').addClass('show');
            });
        </script>
    <?php endif; ?>

    <?php if(old('old_value') == "update_menu"): ?>
        <script type="text/javascript">
            window.onload = () =>
            {
                document.querySelector('[data-target="#edit_modal"]').click();
            }
        </script>
    <?php endif; ?>

    <div class="section-header">
        <h1><?php echo e(__('Menu Category')); ?></h1>
        <div class="section-header-breadcrumb">
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(url('vendor/vendor_home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
                <div class="breadcrumb-item"><?php echo e(__('Menu')); ?></div>
            </div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title"><?php echo e(__("Menu category management")); ?></h2>
        <p class="section-lead"><?php echo e(__('Add, and categorize the menu adding sub-menus. (Add,Edit & Manage Menu Categories )')); ?></p>
        <div class="card">
            <div class="card-header">
                <div class="w-100">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('vendor_menu_access')): ?>
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#insert_modal"><?php echo e(__('Add menu')); ?>

                        </button>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card-body">
                <table id="datatable" class="table table-striped table-bordered text-center" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>
                                <input name="select_all" value="1" id="master" type="checkbox" />
                                <label for="master"></label>
                            </th>
                            <th><?php echo e(__('Menu Category ID')); ?></th>
                            <th><?php echo e(__('Menu Image')); ?></th>
                            <th><?php echo e(__('Menu name')); ?></th>
                            <th><?php echo e(__('Enable')); ?></th>
                            <th><?php echo e(__('Action')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $vendor->menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <input name="id[]" value="<?php echo e($menu->id); ?>" id="<?php echo e($menu->id); ?>" data-id="<?php echo e($menu->id); ?>" class="sub_chk" type="checkbox" />
                                <label for="<?php echo e($menu->id); ?>"></label>
                            </td>
                            <td><?php echo e($menu->id); ?></td>
                            <td><img src="<?php echo e($menu->image); ?>" class="rounded" width="50" height="50" alt=""></td>
                            <td><?php echo e($menu->name); ?></td>
                            <td>
                                <label class="switch">
                                    <input type="checkbox" name="status" onclick="change_status('admin/menu',<?php echo e($menu->id); ?>)" <?php echo e(($menu->status == 1) ? 'checked' : ''); ?>>
                                    <div class="slider"></div>
                                </label>
                            </td>
                            <td>
                                <button type="button" onclick="update_menu(<?php echo e($menu->id); ?>)" class="btn btn-primary" data-toggle="modal" data-target="#edit_modal"><i class="fas fa-pencil-alt"></i></button>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('vendor_submenu_access')): ?>
                                    <a href="<?php echo e(url('vendor/vendor_menu/'.$menu->id)); ?>" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" data-original-title="<?php echo e(__('Add menu')); ?>">
                                        <i class="fas fa-utensils"></i>
                                    </a>
                                <?php endif; ?>
                                <a href="javascript:void(0);" class="table-action btn btn-danger btn-action" onclick="deleteData('admin/menu',<?php echo e($menu->id); ?>,'Menu')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <input type="button" value="Delete selected" onclick="deleteAll('menu_multi_delete')" class="btn btn-primary">
            </div>
        </div>
    </div>

</section>

<div class="modal right fade" id="insert_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="container-fuild" action="<?php echo e(url('admin/menu')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="old_value" value="add_menu">
                <input type="hidden" name="vendor_id" value="<?php echo e($vendor->id); ?>">
                <div class="modal-header">
                    <h5 class="text-primary"><?php echo e(__('Add menu')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image" accept=".png, .jpg, .jpeg, .svg"
                                id="customFileLang1" lang="en">
                            <label class="custom-file-label" for="customFileLang1"><?php echo e(__('Select file')); ?></label>
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

                    <div class="form-group">
                        <label class="form-control-label"><?php echo e(__('menu name')); ?><span class="text-danger">&nbsp;*</span></label>
                        <input class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" type="text" placeholder="<?php echo e(__('Menu Name')); ?>" required value="<?php echo e(old('name')); ?>">

                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="form-group">
                        <label for="<?php echo e(__('status')); ?>"><?php echo e(__('Status')); ?></label><br>
                        <label class="switch">
                            <input type="checkbox" name="status">
                            <div class="slider"></div>
                        </label>
                    </div>
                    <hr class="my-3">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <input type="submit" value="<?php echo e(__('Save')); ?>" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal right fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="container-fuild" id="update_menu_form" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <input type="hidden" name="old_value" value="update_menu">
                <input type="hidden" name="vendor_id" value="<?php echo e($vendor->id); ?>">
                <div class="modal-header">
                    <h5 class="text-primary"><?php echo e(__('Update menu')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img src="" id="update_image" width="200" height="200" class="rounded-lg p-2"/>
                    </div>
                    <div class="form-group mt-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image" accept=".png, .jpg, .jpeg, .svg"
                                id="customFileLang" lang="en">
                            <label class="custom-file-label" for="customFileLang"><?php echo e(__('Select file')); ?></label>
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

                    <div class="form-group">
                        <label class="form-control-label"><?php echo e(__('menu name')); ?><span class="text-danger">&nbsp;*</span></label>
                        <input class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" type="text"
                            placeholder="<?php echo e(__('Menu Name')); ?>" id="update_menu" required value="<?php echo e(old('name')); ?>">

                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <input type="submit" value="<?php echo e(__('Update')); ?>" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app',['activePage' => 'vendor_menu'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/api.gobistro.in/public_html/resources/views/vendor/menu/menu.blade.php ENDPATH**/ ?>