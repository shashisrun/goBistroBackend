<?php $__env->startSection('title','Cutimization submenu'); ?>

<?php $__env->startSection('content'); ?>
<?php if(Session::has('msg')): ?>
    <?php echo $__env->make('layouts.msg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<section class="section">
    <div class="section-header">
        <h1><?php echo e($submenu->name); ?></h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo e(url('admin/home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
            <div class="breadcrumb-item active"><a href="<?php echo e(url('admin/vendor/'.$submenu->vendor_id)); ?>"><?php echo e(App\Models\Vendor::find($submenu->vendor_id)->name); ?></a></div>
            <div class="breadcrumb-item active"><a href="<?php echo e(url('admin/menu/'.$submenu->menu_id)); ?>"><?php echo e(App\Models\Menu::find($submenu->menu_id)->name); ?></a></div>
            <div class="breadcrumb-item"><?php echo e(__('Custimization')); ?></div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title"><?php echo e(__('Custimization submenu')); ?></h2>
        <p class="section-lead"><?php echo e(__('Custimization add, edit')); ?></p>
        <div class="card">
            <div class="card-header">
                <h4><?php echo e(__('Customise')); ?></h4>
                <div class="w-100">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_custimization_type_add')): ?>
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                        data-target="#staticBackdrop"><?php echo e(__('Add customization type')); ?>

                    </button>
                    <?php endif; ?>
                </div>
            </div>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_custimization_type_access')): ?>
                <div class="card-body">
                    <div id="accordion">
                        <?php $__currentLoopData = $custimization_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $custimization_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="accordion">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="accordion-header collapsed" role="button" data-toggle="collapse" aria-expanded="false" href="#panel-body-1<?php echo e($custimization_type['id']); ?>">
                                            <h4><?php echo e($custimization_type->name); ?>

                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_custimization_type_edit')): ?>
                                        <span>
                                            <button type="button" data-toggle="modal" data-target="#edit_modal" onclick="update_submenucustimization(<?php echo e($custimization_type->id); ?>)" class="btn btn-primary"><?php echo e(__('Edit')); ?></button>
                                        </span>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_custimization_type_delete')): ?>
                                        <span>
                                            <a href="javascript:void(0);" class="table-action btn btn-primary btn-action" onclick="deleteData('admin/customization_type',<?php echo e($custimization_type->id); ?>,'Custimization')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="accordion-body collapse" id="panel-body-1<?php echo e($custimization_type['id']); ?>" data-parent="#accordion" style="">
                                    <div class="table-responsive">
                                        <form action="<?php echo e(url('admin/customization_type/updateItem')); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="custimization_type_id" value="<?php echo e($custimization_type->id); ?>">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <td><?php echo e(__('Item name')); ?><span class="text-danger">&nbsp;*</span></td>
                                                        <td><?php echo e(__('Price')); ?>(<?php echo e($currency_symbol); ?>)<span class="text-danger">&nbsp;*</span></td>
                                                        <td><?php echo e(__('Default')); ?><span class="text-danger">&nbsp;*</span></td>
                                                        <td><?php echo e(__('Active')); ?><span class="text-danger">&nbsp;*</span></td>
                                                        <td></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <table class="table table_custimization text-center">
                                                        <tbody id="<?php echo e('custom'.$custimization_type->id); ?>">
                                                            <?php
                                                                $items = json_decode($custimization_type->custimazation_item);
                                                            ?>
                                                            <?php if($items): ?>
                                                                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <tr>
                                                                        <td>
                                                                            <input type="text" name="<?php echo e(str_replace(' ', '_', strtolower('name'.$custimization_type->name.'[]'))); ?>" placeholder="<?php echo e(__('Item name')); ?>" value="<?php echo e($item->name); ?>" class="form-control">
                                                                        </td>
                                                                        <td>
                                                                            <input type="number" min=1 name="price[]" value="<?php echo e($item->price); ?>" placeholder="<?php echo e(__('Price')); ?>" class="form-control">
                                                                        </td>
                                                                        <td>
                                                                            <input type="radio" id="<?php echo e('radio'.$custimization_type->id.'_'.$loop->index); ?>" value="<?php echo e($loop->index); ?>" name="<?php echo e(str_replace(' ', '_', strtolower('isDefault_'.$custimization_type->name))); ?>" <?php echo e($item->isDefault == 1 ? 'checked' : ''); ?>>
                                                                            <label for="<?php echo e('radio'.$custimization_type->id.'_'.$loop->index); ?>"><?php echo e(__('Default')); ?></label>
                                                                        </td>
                                                                        <td>
                                                                            <input type="checkbox" id="<?php echo e('status'.$custimization_type->id.'_'.$loop->index); ?>" name="status<?php echo e($loop->index); ?>" <?php echo e($item->status == 1 ? 'checked' : ''); ?>>
                                                                            <label for="<?php echo e('status'.$custimization_type->id.'_'.$loop->index); ?>"><?php echo e(__('Status')); ?></label>
                                                                        </td>
                                                                        <?php if($loop->iteration == 1): ?>
                                                                            <td>
                                                                                <button type="button" class="btn btn-primary update_custimization" onclick="update_custimization(<?php echo e($custimization_type->id); ?>,'<?php echo e(str_replace(' ', '_', strtolower($custimization_type->name))); ?>')">+</button>
                                                                            </td>
                                                                        <?php else: ?>
                                                                            <td>
                                                                                <button type="button" class="btn btn-primary removebtn"><i class="fas fa-times"></i></button>
                                                                            </td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php else: ?>
                                                                <tr id="<?php echo e('custom'.$custimization_type->id); ?>">
                                                                    <td>
                                                                        <input type="text" required name="<?php echo e(str_replace(' ', '_', strtolower('name'.$custimization_type->name.'[]'))); ?>" placeholder="<?php echo e(__('Item name')); ?>" class="form-control">
                                                                    </td>
                                                                    <td>
                                                                        <input type="number" min=1 required name="price[]" placeholder="<?php echo e(__('Price')); ?>" class="form-control">
                                                                    </td>
                                                                    <td>
                                                                        <input type="radio" id="1" value="0" name="<?php echo e(str_replace(' ', '_', strtolower('isDefault_'.$custimization_type->name))); ?>" checked>
                                                                        <label for="1"><?php echo e(__('Default')); ?></label>
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox" id="chkbox" name="<?php echo e('status0'); ?>" checked>
                                                                        <label for="chkbox"><?php echo e(__('Status')); ?></label>
                                                                    </td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-primary" onclick="update_custimization(<?php echo e($custimization_type->id); ?>,'<?php echo e(str_replace(' ', '_', strtolower($custimization_type->name))); ?>')">+</button>
                                                                    </td>
                                                                </tr>
                                                            <?php endif; ?>
                                                        </tbody>
                                                    </table>
                                                    <div class="w-100 text-center">
                                                        <button type="submit" class="btn btn-primary"><?php echo e(__('Add')); ?></button>
                                                    </div>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<div class="modal right fade" id="staticBackdrop" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form action="<?php echo e(url('admin/customization_type')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="vendor_id" value="<?php echo e($submenu->vendor_id); ?>">
                <input type="hidden" name="menu_id" value="<?php echo e($submenu->menu_id); ?>">
                <input type="hidden" name="submenu_id" value="<?php echo e($submenu->id); ?>">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="staticBackdropLabel"><?php echo e(__('Add customization type')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row mt-5">
                        <div class="col-md-12">
                            <label for=""><?php echo e(__('Name of Custimization type')); ?></label>
                            <input type="text" name="name" required class="form-control" required="true" style="text-transform : none;">
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-12">
                            <label for=""><?php echo e(__('Minimum Item selection')); ?></label>
                            <select name="min_item_selection" class="form-control">
                                <?php for($i = 1; $i < 21; $i++): ?> <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                                    <?php endfor; ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-12">
                            <label for=""><?php echo e(__('Maximum Item selection')); ?></label>
                            <select name="max_item_selection" class="form-control">
                                <?php for($i = 1; $i < 21; $i++): ?> <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                                    <?php endfor; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group mt-5">
                        <div class="control-label"><?php echo e(__('Type')); ?></div>
                        <div class="custom-switches-stacked mt-2">
                            <label class="custom-switch">
                                <input type="radio" name="type" value="veg" class="custom-switch-input" checked="">
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description"><?php echo e(__('veg')); ?></span>
                            </label>
                            <label class="custom-switch">
                                <input type="radio" name="type" value="non_veg" class="custom-switch-input">
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description"><?php echo e(__('Non veg')); ?></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                    <button type="submit" class="btn btn-primary"><?php echo e(__('Save')); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal right fade" id="edit_modal" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form id="update_cutimization_form" method="post">
                <?php echo method_field('PUT'); ?>
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="staticBackdropLabel"><?php echo e(__('Update Custimization')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row mt-5">
                        <div class="col-md-12">
                            <label for=""><?php echo e(__('Name of Custimization type')); ?></label>
                            <input type="text" name="name" id="update_name" required class="form-control" required="true" style="text-transform : none;">
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-12">
                            <label for=""><?php echo e(__('Minimum Item selection')); ?></label>
                            <select name="min_item_selection" id="update_min_item_selection" class="form-control">
                                <?php for($i = 0; $i < 21; $i++): ?>
                                    <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-12">
                            <label for=""><?php echo e(__('Maximum Item selection')); ?></label>
                            <select name="max_item_selection" id="update_max_item_selection" class="form-control">
                                <?php for($i = 0; $i < 21; $i++): ?> <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                                    <?php endfor; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group mt-5">
                        <div class="control-label"><?php echo e(__('Type')); ?></div>
                        <div class="custom-switches-stacked mt-2">
                            <label class="custom-switch">
                                <input type="radio" name="type" id="veg" value="veg" class="custom-switch-input" checked="">
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description"><?php echo e(__('veg')); ?></span>
                            </label>
                            <label class="custom-switch">
                                <input type="radio" name="type" id="non_veg" value="non_veg" class="custom-switch-input">
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description"><?php echo e(__('Non veg')); ?></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                    <button type="submit" class="btn btn-primary"><?php echo e(__('Save')); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app',['activePage' => 'vendor'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/api.gobistro.in/public_html/resources/views/admin/custimization submenu/custimization_submenu.blade.php ENDPATH**/ ?>