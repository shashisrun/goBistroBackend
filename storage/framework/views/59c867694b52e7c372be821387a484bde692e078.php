<?php $__env->startSection('title','Menu'); ?>

<?php $__env->startSection('content'); ?>

<section class="section">
    <?php if(Session::has('msg')): ?>
        <?php echo $__env->make('layouts.msg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php if(old('old_value') == "add_submenu"): ?>
        <script type="text/javascript">
             $(function ()
             {
                $('#insert_model').modal();
                $('#insert_model').addClass('show');
            });
        </script>
    <?php endif; ?>

    <?php if(old('old_value') == "update_submenu"): ?>
    <script type="text/javascript">
        window.onload = () =>
        {
            document.querySelector('[data-target="#edit_modal"]').click();
        }
    </script>
    <?php endif; ?>
    <div class="section-header">
        <h1><?php echo e(__('SubMenu')); ?></h1>
        <div class="section-header-breadcrumb">
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(url('vendor/vendor_home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
                <div class="breadcrumb-item active"><a href="<?php echo e(url('vendor/vendor_menu')); ?>"><?php echo e($menu->name); ?></a></div>
                <div class="breadcrumb-item"><?php echo e(__('Submenu')); ?></div>
            </div>
        </div>
    </div>
    <div class="section-body">
        <h2 class="section-title"><?php echo e(__("Submenu listing")); ?></h2>
        <p class="section-lead"><?php echo e(__('Submenu')); ?></p>
        <div class="card">
            <div class="card-header">
                <div>
                    <select name="submenu_filter" class="form-control">
                        <option value="all"><?php echo e(__('All')); ?></option>
                        <option value="excel"><?php echo e(__('Data added from excel')); ?></option>
                        <option value="panel"><?php echo e(__('Data added from panel')); ?></option>
                        <option value="veg"><?php echo e(__('Veg menu')); ?></option>
                        <option value="non_veg"><?php echo e(__('Non veg menu')); ?></option>
                    </select>
                </div>
                <div class="dropdown d-inline mr-2 w-100">
                    <button class="btn btn-primary dropdown-toggle float-right" type="button" id="dropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo e(__('More')); ?>

                    </button>
                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
                        <a class="dropdown-item" href="<?php echo e(url('admin/download_pdf/sub_menu.xlsx')); ?>"><?php echo e(__('Download Sample file')); ?></a>
                        <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"><?php echo e(__('Import Excel File')); ?></a>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('vendor_submenu_add')): ?>
                            <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-toggle="modal" data-target="#insert_model"><?php echo e(__('Add submenu')); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="display_submenu">
                    <?php echo $__env->make('vendor.submenu.display_submenu',$menu->submenu, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
            <div class="card-footer">
                <input type="button" value="Delete selected" onclick="deleteAll('submenu_multi_delete')" class="btn btn-primary">
            </div>
        </div>
    </div>
</section>

<div class="modal right fade" id="insert_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="container-fuild" action="<?php echo e(url('admin/submenu')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="old_value" value="add_submenu">
                <input type="hidden" name="vendor_id" value="<?php echo e($menu->vendor_id); ?>">
                <input type="hidden" name="menu_id" value="<?php echo e($menu->id); ?>">
                <div class="modal-header">
                    <h5 class="text-primary"><?php echo e(__('Add Submenu')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image" accept=".png, .jpg, .jpeg, .svg" lang="en">
                            <label class="custom-file-label"><?php echo e(__('Select file')); ?></label>
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
                        <label class="form-control-label"><?php echo e(__('Item name')); ?><span class="text-danger">&nbsp;*</span></label>
                        <input class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" type="text" placeholder="<?php echo e(__('Item Name')); ?>" value="<?php echo e(old('name')); ?>" required>

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
                        <label class="form-control-label"><?php echo e(__('Item price')); ?><span class="text-danger">&nbsp;*</span></label>
                        <input class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="price" min=1 type="number" placeholder="<?php echo e(__('Item Price')); ?>" required value="<?php echo e(old('price')); ?>">

                        <?php $__errorArgs = ['price'];
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
                        <label class="form-control-label"><?php echo e(__('Description')); ?><span class="text-danger">&nbsp;*</span></label>
                        <textarea name="description" required class="form-control"></textarea>

                        <?php $__errorArgs = ['price'];
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
                        <label class="form-control-label"><?php echo e(__('type')); ?><span class="text-danger">&nbsp;*</span></label>
                        <select name="type" class="form-control">
                            <option value="none"><?php echo e(__('none')); ?></option>
                            <option value="veg"><?php echo e(__('Veg')); ?></option>
                            <option value="non_veg"><?php echo e(__('Non Veg')); ?></option>
                        </select>

                        <?php $__errorArgs = ['price'];
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
                        <label class="form-control-label"><?php echo e(__('Total Item reset ?')); ?></label>
                        <input class="form-control <?php $__errorArgs = ['item_reset_value'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="item_reset_value" min=1 type="number" placeholder="<?php echo e(__('Item Reset Value')); ?>" required value="0" disabled>
                        <?php $__errorArgs = ['item_reset_value'];
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
                        <div class="control-label"><?php echo e(__('Quantity reset?')); ?><span class="text-danger">&nbsp;*</span></div>
                        <div class="custom-switches-stacked mt-2">
                          <label class="custom-switch">
                            <input type="radio" name="qty_reset" value="never" class="custom-switch-input" checked="">
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description"><?php echo e(__('never')); ?></span>
                          </label>
                          <label class="custom-switch">
                            <input type="radio" name="qty_reset" value=daily class="custom-switch-input">
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description"><?php echo e(__('daily')); ?></span>
                          </label>
                        </div>
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
            <form id="update_submenu_form" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <input type="hidden" name="old_value" value="update_submenu">
                <div class="modal-header">
                    <h5 class="text-primary"><?php echo e(__('update Submenu')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="text-center">
                        <img src="" id="update_image" width="200" height="200" class="rounded-lg p-2"/>
                    </div>

                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image" accept=".png, .jpg, .jpeg, .svg" lang="en">
                            <label class="custom-file-label"><?php echo e(__('Select file')); ?></label>
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
                        <label class="form-control-label"><?php echo e(__('Item name')); ?><span class="text-danger">&nbsp;*</span></label>
                        <input class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" type="text"
                            placeholder="<?php echo e(__('Item Name')); ?>" value="<?php echo e(old('name')); ?>" id="update_name" required>

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
                        <label class="form-control-label"><?php echo e(__('Item price')); ?><span class="text-danger">&nbsp;*</span></label>
                        <input class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="price" type="number"
                            placeholder="<?php echo e(__('Item price')); ?>" id="update_price" min=1 required value="<?php echo e(old('price')); ?>">

                        <?php $__errorArgs = ['price'];
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
                        <label class="form-control-label"><?php echo e(__('Description')); ?><span class="text-danger">&nbsp;*</span></label>
                        <textarea name="description" id="update_description" required class="form-control"></textarea>

                        <?php $__errorArgs = ['price'];
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
                        <label class="form-control-label"><?php echo e(__('type')); ?><span class="text-danger">&nbsp;*</span></label>
                        <select name="type" id="type" class="form-control">
                            <option value="none"><?php echo e(__('none')); ?></option>
                            <option value="veg"><?php echo e(__('Veg')); ?></option>
                            <option value="non_veg"><?php echo e(__('Non Veg')); ?></option>
                        </select>

                        <?php $__errorArgs = ['price'];
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
                        <div class="control-label"><?php echo e(__('Quantity reset?')); ?><span class="text-danger">&nbsp;*</span></div>
                        <div class="custom-switches-stacked mt-2">
                          <label class="custom-switch">
                            <input type="radio" name="qty_reset" id="never" value="never" class="custom-switch-input">
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description"><?php echo e(__('never')); ?></span>
                          </label>
                          <label class="custom-switch">
                            <input type="radio" name="qty_reset" id="daily" value="daily" class="custom-switch-input">
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description"><?php echo e(__('daily')); ?></span>
                          </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-control-label"><?php echo e(__('Total Item reset ?')); ?></label>
                        <input class="form-control <?php $__errorArgs = ['item_reset_value'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="item_reset_value" min=1 type="number" placeholder="<?php echo e(__('Item Reset Value')); ?>" required value="0" disabled>
                        <?php $__errorArgs = ['item_reset_value'];
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php
                $vendor = App\Models\Vendor::where('user_id',auth()->user()->id)->first();
            ?>
            <form action="<?php echo e(url('admin/submenu_import/'.$vendor->id)); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('Import excel file')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="file" class="form-control" name="file" accept=".xlsx" lang="en">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                    <button type="Submit" class="btn btn-primary"><?php echo e(__('Submit')); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app',['activePage' => 'vendor_menu'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/api.gobistro.in/public_html/resources/views/vendor/submenu/submenu.blade.php ENDPATH**/ ?>