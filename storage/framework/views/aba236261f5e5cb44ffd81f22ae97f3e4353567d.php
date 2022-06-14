<?php $__env->startSection('title','Order'); ?>

<?php $__env->startSection('content'); ?>

<section class="section">
    <div class="section-header">
        <h1><?php echo e(__('Orders')); ?></h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo e(url('vendor/vendor_home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
            <div class="breadcrumb-item"><?php echo e(__('order')); ?></div>
        </div>
    </div>
    <div class="section-body">
        <input type="hidden" name="currency" value="<?php echo e($currency); ?>">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card p-3">
                    <form action="<?php echo e(url('vendor/Orders')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-12">
                                <input type="text" name="date_range" class="form-control">
                            </div>
                            <div class="col-md-6 col-lg-6 col-12">
                                <input type="button" value="<?php echo e(__('apply')); ?>" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-pills orderStatusUl" id="myTab3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active show" id="all-tab3" data-toggle="tab" href="#all3" role="tab"aria-controls="home" aria-selected="true"><?php echo e(__('All')); ?>(<?php echo e(count($orders)); ?>)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pending-tab3" data-toggle="tab" href="#pending3" role="tab" aria-controls="profile" aria-selected="false"><?php echo e(__('Pending')); ?>(<?php echo e(count($pendingOrders)); ?>)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="approve-tab3" data-toggle="tab" href="#approve3" role="tab" aria-controls="approve" aria-selected="false"><?php echo e(__('Approve')); ?>(<?php echo e(count($approveOrders)); ?>)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="delivered-tab3" data-toggle="tab" href="#delivered3" role="tab" aria-controls="delivered" aria-selected="false"><?php echo e(__('Delivered')); ?>(<?php echo e(count($deliveredOrders)); ?>)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pickup-tab3" data-toggle="tab" href="#pickup3" role="tab" aria-controls="pickup" aria-selected="false"><?php echo e(__('PickUp')); ?>(<?php echo e(count($pickUpOrders)); ?>)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="cancel-tab3" data-toggle="tab" href="#cancel3" role="tab" aria-controls="contact" aria-selected="false"><?php echo e(__('cancel')); ?>(<?php echo e(count($cancelOrders)); ?>)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="complete-tab3" data-toggle="tab" href="#complete3" role="tab" aria-controls="complete" aria-selected="false"><?php echo e(__('Complete')); ?>(<?php echo e(count($completeOrders)); ?>)</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4><?php echo e(__('Order')); ?></h4>
                <div class="w-100">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('vendor_order_add')): ?>
                        <a href="<?php echo e(url('vendor/order/create')); ?>" class="btn btn-primary float-right"><?php echo e(__('Add New')); ?></a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card-body">
                <div class="tab-content" id="myTabContent2">
                    <div class="tab-pane fade active show" id="all3" role="tabpanel" aria-labelledby="all-tab3">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered orderTable" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>
                                            <input name="select_all" value="1" id="master" type="checkbox" />
                                            <label for="master"></label>
                                        </th>
                                        <th><?php echo e(__('Order Id')); ?></th>
                                        <th><?php echo e(__('Vendor name')); ?></th>
                                        <th><?php echo e(__('User Name')); ?></th>
                                        <th><?php echo e(__('Date')); ?></th>
                                        <th><?php echo e(__('Time')); ?></th>
                                        <th><?php echo e(__('Order Status')); ?></th>
                                        <th><?php echo e(__('Amount')); ?></th>
                                        <th><?php echo e(__('Payment status')); ?></th>
                                        <th><?php echo e(__('Payment type')); ?></th>
                                        <th><?php echo e(__('Order Accept')); ?></th>
                                        <?php if(Session::get('vendor_driver') == 1): ?>
                                            <th><?php echo e(__('Assign Driver')); ?></th>
                                        <?php endif; ?>
                                        <th><?php echo e(__('Delivery Person Name')); ?></th>
                                        <?php if(Session::get('vendor_driver') == 0): ?>
                                            <th><?php echo e(__('Received Amount From Delivery Person')); ?></th>
                                            <th><?php echo e(__('Received Amount?')); ?></th>
                                        <?php endif; ?>
                                        <th><?php echo e(__('View')); ?></th>
                                        <th><?php echo e(__('Delete')); ?></th>
                                        <th><?php echo e(__('Print')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <input name="id[]" value="<?php echo e($order->id); ?>" id="<?php echo e($order->id); ?>" data-id="<?php echo e($order->id); ?>" class="sub_chk" type="checkbox" />
                                                <label for="<?php echo e($order->id); ?>"></label>
                                            </td>
                                            <input type="hidden" name="order_id" value="<?php echo e($order->id); ?>">
                                            <td><?php echo e($order->order_id); ?></td>
                                            <td><?php echo e($order['vendor']->name); ?></td>
                                            <td><?php echo e($order['user']->name); ?></td>
                                            <td><?php echo e($order->date); ?></td>
                                            <td><?php echo e($order->time); ?></td>
                                            <td class="orderStatusTd<?php echo e($order->id); ?>">
                                                <?php if($order->order_status == 'PENDING'): ?>
                                                    <span class="badge badge-pill pending"><?php echo e(__('PENDING')); ?></span>
                                                <?php endif; ?>

                                                <?php if($order->order_status == 'APPROVE'): ?>
                                                    <span class="badge badge-pill approve"><?php echo e(__('APPROVE')); ?></span>
                                                <?php endif; ?>

                                                <?php if($order->order_status == 'ACCEPT'): ?>
                                                    <span class="badge badge-pill accept"><?php echo e(__('ACCEPT')); ?></span>
                                                <?php endif; ?>

                                                <?php if($order->order_status == 'REJECT'): ?>
                                                    <span class="badge badge-pill reject"><?php echo e(__('REJECT')); ?></span>
                                                <?php endif; ?>

                                                <?php if($order->order_status == 'CANCEL'): ?>
                                                    <span class="badge badge-pill cancel"><?php echo e(__('CANCEL')); ?></span>
                                                <?php endif; ?>

                                                <?php if($order->order_status == 'PICKUP'): ?>
                                                    <span class="badge badge-pill pickup"><?php echo e(__('PICKUP')); ?></span>
                                                <?php endif; ?>

                                                <?php if($order->order_status == 'DELIVERED'): ?>
                                                    <span class="badge badge-pill delivered"><?php echo e(__('DELIVERED')); ?></span>
                                                <?php endif; ?>

                                                <?php if($order->order_status == 'COMPLETE'): ?>
                                                    <span class="badge badge-pill complete"><?php echo e(__('COMPLETE')); ?></span>
                                                <?php endif; ?>

                                                <?php if($order->order_status == 'PREPARE_FOR_ORDER'): ?>
                                                    <span class="badge badge-pill preparre-food"><?php echo e(__('PREPARE FOR ORDER')); ?></span>
                                                <?php endif; ?>

                                                <?php if($order->order_status == 'READY_FOR_ORDER'): ?>
                                                    <span class="badge badge-pill ready_for_food"><?php echo e(__('READY FOR ORDER')); ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($currency); ?><?php echo e($order->amount); ?></td>
                                            <td>
                                                <?php if($order->payment_status == 1): ?>
                                                    <div class="span"><?php echo e(__('payment complete')); ?></div>
                                                <?php endif; ?>

                                                <?php if($order->payment_status == 0): ?>
                                                    <div class="span"><?php echo e(__('payment not complete')); ?></div>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($order->payment_type); ?></td>
                                            <td>
                                                <?php if($order->delivery_type == 'SHOP'): ?>
                                                    <?php if($order->order_status == 'COMPLETE' || $order->order_status == 'CANCEL' || $order->order_status == 'REJECT'): ?>
                                                        <select class="form-control w-auto" disabled name="order_status_change" id="<?php echo e($order->id); ?>">
                                                            <option value="COMPLETE" <?php echo e($order->order_status == 'COMPLETE' ? 'selected' : ''); ?>><?php echo e(__('Complete')); ?></option>
                                                        </select>
                                                    <?php else: ?>
                                                        <?php if($order->order_status == 'PENDING'): ?>
                                                            <select class="form-control w-auto" onchange="order_status(<?php echo e($order->id); ?>)" id="status<?php echo e($order->id); ?>">
                                                                <option value="PENDING" disabled <?php echo e($order->order_status == 'PENDING' ? 'selected' : ''); ?>><?php echo e(__('Pending')); ?></option>
                                                                <option value="APPROVE" <?php echo e($order->order_status == 'APPROVE' ? 'selected' : ''); ?>><?php echo e(__('Approve')); ?></option>
                                                                <option value="REJECT" <?php echo e($order->order_status == 'REJECT' ? 'selected' : ''); ?>><?php echo e(__('Reject')); ?></option>
                                                            </select>
                                                        <?php endif; ?>
                                                        <?php if($order->order_status == 'APPROVE' || $order->order_status == 'PREPARE_FOR_ORDER' || $order->order_status == 'READY_FOR_ORDER' || $order->order_status == 'COMPLETE'): ?>
                                                            <select class="form-control w-auto" onchange="order_status(<?php echo e($order->id); ?>)" id="status<?php echo e($order->id); ?>">
                                                                <option value="APPROVE" <?php echo e($order->order_status == 'APPROVE' ? 'selected' : ''); ?> disabled><?php echo e(__('Approve')); ?></option>
                                                                <option value="PREPARE_FOR_ORDER" <?php echo e($order->order_status == 'PREPARE_FOR_ORDER' ? 'selected' : ''); ?> ><?php echo e(__('Prepare for order')); ?></option>
                                                                <option value="READY_FOR_ORDER" <?php echo e($order->order_status == 'READY_FOR_ORDER' ? 'selected' : ''); ?>><?php echo e(__('Ready for order')); ?></option>
                                                                <option value="COMPLETE" <?php echo e($order->order_status == 'COMPLETE' ? 'selected' : ''); ?>><?php echo e(__('Complete')); ?></option>
                                                            </select>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <?php if($order->order_status == 'COMPLETE' || $order->order_status == 'CANCEL'): ?>
                                                        <select class="form-control w-auto" disabled name="order_status_change" id="<?php echo e($order->id); ?>">
                                                            <option value="COMPLETE" <?php echo e($order->order_status == 'COMPLETE' ? 'selected' : ''); ?>><?php echo e(__('Complete')); ?></option>
                                                            <option value="CANCEL" <?php echo e($order->order_status == 'CANCEL' ? 'selected' : ''); ?>><?php echo e(__('Cancel')); ?></option>
                                                        </select>
                                                    <?php else: ?>
                                                        <?php if($order->order_status == 'PENDING'): ?>
                                                            <select class="form-control w-auto" onchange="order_status(<?php echo e($order->id); ?>)" name="order_status_change" id="status<?php echo e($order->id); ?>">
                                                                <option value="PENDING" disabled <?php echo e($order->order_status == 'PENDING' ? 'selected' : ''); ?>><?php echo e(__('Pending')); ?></option>
                                                                <option value="APPROVE" <?php echo e($order->order_status == 'APPROVE' ? 'selected' : ''); ?>><?php echo e(__('Approve')); ?></option>
                                                                <option value="REJECT" <?php echo e($order->order_status == 'REJECT' ? 'selected' : ''); ?>><?php echo e(__('Reject')); ?></option>
                                                            </select>
                                                        <?php endif; ?>

                                                        <?php if($order->order_status == 'APPROVE' || $order->order_status == 'PICKUP' || $order->order_status == 'DELIVERED' || $order->order_status == 'COMPLETE'): ?>
                                                            <select class="form-control w-auto" onchange="order_status(<?php echo e($order->id); ?>)" name="order_status_change" id="status<?php echo e($order->id); ?>">
                                                                <option value="APPROVE" disabled <?php echo e($order->order_status == 'APPROVE' ? 'selected' : ''); ?>><?php echo e(__('Approve')); ?></option>
                                                                <option value="PICKUP" <?php echo e($order->order_status == 'PICKUP' ? 'selected' : ''); ?>><?php echo e(__('pickup')); ?></option>
                                                                <option value="DELIVERED" <?php echo e($order->order_status == 'DELIVERED' ? 'selected' : ''); ?>><?php echo e(__('Delivered')); ?></option>
                                                                <option value="COMPLETE" <?php echo e($order->order_status == 'COMPLETE' ? 'selected' : ''); ?>><?php echo e(__('Complete')); ?></option>
                                                            </select>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </td>
                                            <?php if(Session::get('vendor_driver') == 1): ?>
                                                <td>
                                                    <select name="assign_driver" onchange="driver_assign(<?php echo e($order->id); ?>)" id="driver_id<?php echo e($order->id); ?>" <?php echo e($order->delivery_person_id != null ? 'disabled' : ''); ?> <?php echo e($order->delivery_type == 'SHOP' ? 'disabled' : ''); ?> class="form-control w-auto">
                                                        <option value=""><?php echo e(__('select Drivers')); ?></option>
                                                        <?php $__currentLoopData = $delivery_persons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $delivery_person): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($delivery_person->id); ?>" <?php echo e($delivery_person->id == $order->delivery_person_id ? 'selected' : ""); ?>><?php echo e($delivery_person->first_name.' '.$delivery_person->last_name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </td>
                                            <?php endif; ?>
                                            <td><?php echo e($order->deliver_person_name); ?></td>
                                            <?php if(Session::get('vendor_driver') == 0): ?>
                                                <?php if($order->payment_type == 'COD' && $order->vendor_pending_amount == 0 && $order->order_status == 'COMPLETE'): ?>
                                                    <td><?php echo e($currency); ?><?php echo e($order->amount); ?></td>
                                                    <td>
                                                        <a href="<?php echo e(url('vendor/deliveryPerson/pending_amount/'.$order->id)); ?>" class="text-danger"><?php echo e(__('Pending Amount')); ?></a>
                                                    </td>
                                                <?php else: ?>
                                                    <td><?php echo e($currency); ?><?php echo e(00); ?></td>
                                                    <td>
                                                        <span class="text-primary"><?php echo e(__('Recieved Amount')); ?></span>
                                                    </td>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <td>
                                                <a href="<?php echo e(url('vendor/order/'.$order->id)); ?>" onclick="show_order(<?php echo e($order->id); ?>)" data-toggle="modal" data-target="#view_order"><?php echo e(__('View Order')); ?></a>
                                            </td>
                                            <td>
                                                <a href="javascript:void(0);" class="table-action btn btn-danger btn-action" onclick="deleteData('vendor/order',<?php echo e($order->id); ?>,'Order')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?php echo e(url('vendor/print_thermal/'.$order->id)); ?>">
                                                    <?php echo e(__('Print Bill')); ?>

                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                <tfoot class="tfoot-light">
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <?php if(Session::get('vendor_driver') == 1): ?>
                                            <th></th>
                                        <?php endif; ?>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pending3" role="tabpanel" aria-labelledby="pending-tab3">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered orderTable" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><?php echo e(__('Order Id')); ?></th>
                                        <th><?php echo e(__('Vendor name')); ?></th>
                                        <th><?php echo e(__('User Name')); ?></th>
                                        <th><?php echo e(__('Date')); ?></th>
                                        <th><?php echo e(__('Time')); ?></th>
                                        <th><?php echo e(__('Order Status')); ?></th>
                                        <th><?php echo e(__('Amount')); ?></th>
                                        <th><?php echo e(__('Payment status')); ?></th>
                                        <th><?php echo e(__('Payment type')); ?></th>
                                        <th><?php echo e(__('Order Accept')); ?></th>
                                        <th><?php echo e(__('View')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $pendingOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pendingOrder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <input type="hidden" name="order_id" value="<?php echo e($pendingOrder->id); ?>">
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($pendingOrder->order_id); ?></td>
                                            <td><?php echo e($pendingOrder['vendor']->name); ?></td>
                                            <td><?php echo e($pendingOrder['user']->name); ?></td>
                                            <td><?php echo e($pendingOrder->date); ?></td>
                                            <td><?php echo e($pendingOrder->time); ?></td>
                                            <td class="orderStatusTd<?php echo e($pendingOrder->id); ?>">
                                                <?php if($pendingOrder->order_status == 'PENDING'): ?>
                                                    <span class="badge badge-pill pending"><?php echo e(__('PENDING')); ?></span>
                                                <?php endif; ?>

                                                <?php if($pendingOrder->order_status == 'APPROVE'): ?>
                                                    <span class="badge badge-pill approve"><?php echo e(__('APPROVE')); ?></span>
                                                <?php endif; ?>

                                                <?php if($pendingOrder->order_status == 'REJECT'): ?>
                                                    <span class="badge badge-pill reject"><?php echo e(__('REJECT')); ?></span>
                                                <?php endif; ?>

                                                <?php if($pendingOrder->order_status == 'CANCEL'): ?>
                                                    <span class="badge badge-pill cancel"><?php echo e(__('CANCEL')); ?></span>
                                                <?php endif; ?>

                                                <?php if($pendingOrder->order_status == 'PICKUP'): ?>
                                                    <span class="badge badge-pill pickup"><?php echo e(__('PICKUP')); ?></span>
                                                <?php endif; ?>

                                                <?php if($pendingOrder->order_status == 'DELIVERED'): ?>
                                                    <span class="badge badge-pill delivered"><?php echo e(__('DELIVERED')); ?></span>
                                                <?php endif; ?>

                                                <?php if($pendingOrder->order_status == 'COMPLETE'): ?>
                                                    <span class="badge badge-pill complete"><?php echo e(__('COMPLETE')); ?></span>
                                                <?php endif; ?>

                                                <?php if($pendingOrder->order_status == 'PREPARE_FOR_ORDER'): ?>
                                                    <span class="badge badge-pill preparre-food"><?php echo e(__('PREPARE FOR ORDER')); ?></span>
                                                <?php endif; ?>

                                                <?php if($pendingOrder->order_status == 'READY_FOR_ORDER'): ?>
                                                    <span class="badge badge-pill ready_for_food"><?php echo e(__('READY FOR ORDER')); ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($currency); ?><?php echo e($pendingOrder->amount); ?></td>
                                            <td>
                                                <?php if($pendingOrder->payment_status == 1): ?>
                                                    <div class="span"><?php echo e(__('payment complete')); ?></div>
                                                <?php endif; ?>

                                                <?php if($pendingOrder->payment_status == 0): ?>
                                                    <div class="span"><?php echo e(__('payment not complete')); ?></div>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($pendingOrder->payment_type); ?></td>
                                            <td>
                                                <?php if($pendingOrder->delivery_type == 'SHOP'): ?>
                                                    <?php if($pendingOrder->order_status == 'COMPLETE' || $pendingOrder->order_status == 'CANCEL'): ?>
                                                        <select class="form-control w-auto" disabled name="order_status_change" id="<?php echo e($pendingOrder->id); ?>">
                                                            <option value="COMPLETE" <?php echo e($pendingOrder->order_status == 'COMPLETE' ? 'selected' : ''); ?>><?php echo e(__('Complete')); ?></option>
                                                        </select>
                                                    <?php else: ?>
                                                        <select class="form-control w-auto" onchange="order_status(<?php echo e($pendingOrder->id); ?>)" id="status<?php echo e($pendingOrder->id); ?>">
                                                            <option value="PENDING" <?php echo e($pendingOrder->order_status == 'PENDING' ? 'selected' : ''); ?>><?php echo e(__('Pending')); ?></option>
                                                            <option value="APPROVE" <?php echo e($pendingOrder->order_status == 'APPROVE' ? 'selected' : ''); ?>><?php echo e(__('Approve')); ?></option>
                                                            <option value="PREPARE_FOR_ORDER" <?php echo e($pendingOrder->order_status == 'PREPARE_FOR_ORDER' ? 'selected' : ''); ?>><?php echo e(__('Prepare for order')); ?></option>
                                                            <option value="READY_FOR_ORDER" <?php echo e($pendingOrder->order_status == 'READY_FOR_ORDER' ? 'selected' : ''); ?>><?php echo e(__('Ready for order')); ?></option>
                                                            <option value="REJECT" <?php echo e($pendingOrder->order_status == 'REJECT' ? 'selected' : ''); ?>><?php echo e(__('Reject')); ?></option>
                                                            <option value="COMPLETE" <?php echo e($pendingOrder->order_status == 'COMPLETE' ? 'selected' : ''); ?>><?php echo e(__('Complete')); ?></option>
                                                        </select>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <?php if($pendingOrder->order_status == 'COMPLETE' || $pendingOrder->order_status == 'CANCEL'): ?>
                                                        <select class="form-control w-auto" disabled name="order_status_change" id="<?php echo e($pendingOrder->id); ?>">
                                                            <option value="COMPLETE" <?php echo e($pendingOrder->order_status == 'COMPLETE' ? 'selected' : ''); ?>><?php echo e(__('Complete')); ?></option>
                                                            <option value="CANCEL" <?php echo e($pendingOrder->order_status == 'CANCEL' ? 'selected' : ''); ?>><?php echo e(__('Cancel')); ?></option>
                                                        </select>
                                                    <?php else: ?>
                                                        <select class="form-control w-auto" onchange="order_status(<?php echo e($pendingOrder->id); ?>)" name="order_status_change" id="status<?php echo e($pendingOrder->id); ?>">
                                                            <option value="PENDING" <?php echo e($pendingOrder->order_status == 'PENDING' ? 'selected' : ''); ?>><?php echo e(__('Pending')); ?></option>
                                                            <option value="APPROVE" <?php echo e($pendingOrder->order_status == 'APPROVE' ? 'selected' : ''); ?>><?php echo e(__('Approve')); ?></option>
                                                            <option value="REJECT" <?php echo e($pendingOrder->order_status == 'REJECT' ? 'selected' : ''); ?>><?php echo e(__('Reject')); ?></option>
                                                            <option value="PICKUP" <?php echo e($pendingOrder->order_status == 'PICKUP' ? 'selected' : ''); ?>><?php echo e(__('pickup')); ?></option>
                                                            <option value="DELIVERED" <?php echo e($pendingOrder->order_status == 'DELIVERED' ? 'selected' : ''); ?>><?php echo e(__('Delivered')); ?></option>
                                                            <option value="COMPLETE" <?php echo e($pendingOrder->order_status == 'COMPLETE' ? 'selected' : ''); ?>><?php echo e(__('Complete')); ?></option>
                                                        </select>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo e(url('vendor/order/'.$pendingOrder->id)); ?>" onclick="show_order(<?php echo e($pendingOrder->id); ?>)" data-toggle="modal" data-target="#view_order"><?php echo e(__('View Order')); ?></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                <tfoot class="tfoot-light">
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="approve3" role="tabpanel" aria-labelledby="approve-tab3">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered orderTable" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><?php echo e(__('Order Id')); ?></th>
                                        <th><?php echo e(__('Vendor name')); ?></th>
                                        <th><?php echo e(__('User Name')); ?></th>
                                        <th><?php echo e(__('Date')); ?></th>
                                        <th><?php echo e(__('Time')); ?></th>
                                        <th><?php echo e(__('Order Status')); ?></th>
                                        <th><?php echo e(__('Amount')); ?></th>
                                        <th><?php echo e(__('Payment status')); ?></th>
                                        <th><?php echo e(__('Payment type')); ?></th>
                                        <th><?php echo e(__('Order Accept')); ?></th>
                                        <?php if(Session::get('vendor_driver') == 1): ?>
                                            <th><?php echo e(__('Assign Driver')); ?></th>
                                        <?php endif; ?>
                                        <th><?php echo e(__('View')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $approveOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $approveOrder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <input type="hidden" name="order_id" value="<?php echo e($approveOrder->id); ?>">
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($approveOrder->order_id); ?></td>
                                            <td><?php echo e($approveOrder['vendor']->name); ?></td>
                                            <td><?php echo e($approveOrder['user']->name); ?></td>
                                            <td><?php echo e($approveOrder->date); ?></td>
                                            <td><?php echo e($approveOrder->time); ?></td>
                                            <td class="orderStatusTd<?php echo e($approveOrder->id); ?>">
                                                <?php if($approveOrder->order_status == 'PENDING'): ?>
                                                    <span class="badge badge-pill pending"><?php echo e(__('PENDING')); ?></span>
                                                <?php endif; ?>

                                                <?php if($approveOrder->order_status == 'APPROVE'): ?>
                                                    <span class="badge badge-pill approve"><?php echo e(__('APPROVE')); ?></span>
                                                <?php endif; ?>

                                                <?php if($approveOrder->order_status == 'REJECT'): ?>
                                                    <span class="badge badge-pill reject"><?php echo e(__('REJECT')); ?></span>
                                                <?php endif; ?>

                                                <?php if($approveOrder->order_status == 'CANCEL'): ?>
                                                    <span class="badge badge-pill cancel"><?php echo e(__('CANCEL')); ?></span>
                                                <?php endif; ?>

                                                <?php if($approveOrder->order_status == 'PICKUP'): ?>
                                                    <span class="badge badge-pill pickup"><?php echo e(__('PICKUP')); ?></span>
                                                <?php endif; ?>

                                                <?php if($approveOrder->order_status == 'DELIVERED'): ?>
                                                    <span class="badge badge-pill delivered"><?php echo e(__('DELIVERED')); ?></span>
                                                <?php endif; ?>

                                                <?php if($approveOrder->order_status == 'COMPLETE'): ?>
                                                    <span class="badge badge-pill complete"><?php echo e(__('COMPLETE')); ?></span>
                                                <?php endif; ?>

                                                <?php if($approveOrder->order_status == 'PREPARE_FOR_ORDER'): ?>
                                                    <span class="badge badge-pill preparre-food"><?php echo e(__('PREPARE FOR ORDER')); ?></span>
                                                <?php endif; ?>

                                                <?php if($approveOrder->order_status == 'READY_FOR_ORDER'): ?>
                                                    <span class="badge badge-pill ready_for_food"><?php echo e(__('READY FOR ORDER')); ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($currency); ?><?php echo e($approveOrder->amount); ?></td>
                                            <td>
                                                <?php if($approveOrder->payment_status == 1): ?>
                                                    <div class="span"><?php echo e(__('payment complete')); ?></div>
                                                <?php endif; ?>

                                                <?php if($approveOrder->payment_status == 0): ?>
                                                    <div class="span"><?php echo e(__('payment not complete')); ?></div>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($approveOrder->payment_type); ?></td>
                                            <td>
                                                <?php if($approveOrder->delivery_type == 'SHOP'): ?>
                                                    <?php if($approveOrder->order_status == 'COMPLETE' || $approveOrder->order_status == 'CANCEL'): ?>
                                                        <select class="form-control w-auto" disabled name="order_status_change" id="<?php echo e($approveOrder->id); ?>">
                                                            <option value="COMPLETE" <?php echo e($approveOrder->order_status == 'COMPLETE' ? 'selected' : ''); ?>><?php echo e(__('Complete')); ?></option>
                                                        </select>
                                                    <?php else: ?>
                                                        <select class="form-control w-auto" onchange="order_status(<?php echo e($approveOrder->id); ?>)" id="status<?php echo e($approveOrder->id); ?>">
                                                            <option value="PENDING" <?php echo e($approveOrder->order_status == 'PENDING' ? 'selected' : ''); ?>><?php echo e(__('Pending')); ?></option>
                                                            <option value="APPROVE" <?php echo e($approveOrder->order_status == 'APPROVE' ? 'selected' : ''); ?>><?php echo e(__('Approve')); ?></option>
                                                            <option value="PREPARE_FOR_ORDER" <?php echo e($approveOrder->order_status == 'PREPARE_FOR_ORDER' ? 'selected' : ''); ?>><?php echo e(__('Prepare for order')); ?></option>
                                                            <option value="READY_FOR_ORDER" <?php echo e($approveOrder->order_status == 'READY_FOR_ORDER' ? 'selected' : ''); ?>><?php echo e(__('Ready for order')); ?></option>
                                                            <option value="REJECT" <?php echo e($approveOrder->order_status == 'REJECT' ? 'selected' : ''); ?>><?php echo e(__('Reject')); ?></option>
                                                            <option value="COMPLETE" <?php echo e($approveOrder->order_status == 'COMPLETE' ? 'selected' : ''); ?>><?php echo e(__('Complete')); ?></option>
                                                        </select>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <?php if($approveOrder->order_status == 'COMPLETE' || $approveOrder->order_status == 'CANCEL'): ?>
                                                        <select class="form-control w-auto" disabled name="order_status_change" id="<?php echo e($approveOrder->id); ?>">
                                                            <option value="COMPLETE" <?php echo e($approveOrder->order_status == 'COMPLETE' ? 'selected' : ''); ?>><?php echo e(__('Complete')); ?></option>
                                                            <option value="CANCEL" <?php echo e($approveOrder->order_status == 'CANCEL' ? 'selected' : ''); ?>><?php echo e(__('Cancel')); ?></option>
                                                        </select>
                                                    <?php else: ?>
                                                        <select class="form-control w-auto" onchange="order_status(<?php echo e($approveOrder->id); ?>)" name="order_status_change" id="status<?php echo e($approveOrder->id); ?>">
                                                            <option value="PENDING" <?php echo e($approveOrder->order_status == 'PENDING' ? 'selected' : ''); ?>><?php echo e(__('Pending')); ?></option>
                                                            <option value="APPROVE" <?php echo e($approveOrder->order_status == 'APPROVE' ? 'selected' : ''); ?>><?php echo e(__('Approve')); ?></option>
                                                            <option value="REJECT" <?php echo e($approveOrder->order_status == 'REJECT' ? 'selected' : ''); ?>><?php echo e(__('Reject')); ?></option>
                                                            <option value="PICKUP" <?php echo e($approveOrder->order_status == 'PICKUP' ? 'selected' : ''); ?>><?php echo e(__('pickup')); ?></option>
                                                            <option value="DELIVERED" <?php echo e($approveOrder->order_status == 'DELIVERED' ? 'selected' : ''); ?>><?php echo e(__('Delivered')); ?></option>
                                                            <option value="COMPLETE" <?php echo e($approveOrder->order_status == 'COMPLETE' ? 'selected' : ''); ?>><?php echo e(__('Complete')); ?></option>
                                                        </select>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </td>
                                            <?php if(Session::get('vendor_driver') == 1): ?>
                                                <td>
                                                    <select name="assign_driver w-auto" onchange="driver_assign(<?php echo e($approveOrder->id); ?>)" id="driver_id<?php echo e($approveOrder->id); ?>" <?php echo e($approveOrder->delivery_person_id != null ? 'disabled' : ''); ?> class="form-control">
                                                        <option value=""><?php echo e(__('select Drivers')); ?></option>
                                                        <?php $__currentLoopData = $delivery_persons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $delivery_person): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($delivery_person->id); ?>" <?php echo e($delivery_person->id == $approveOrder->delivery_person_id ? 'selected' : ""); ?>><?php echo e($delivery_person->first_name.' '.$delivery_person->last_name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </td>
                                            <?php endif; ?>
                                            <td>
                                                <a href="<?php echo e(url('vendor/order/'.$approveOrder->id)); ?>" onclick="show_order(<?php echo e($approveOrder->id); ?>)" data-toggle="modal" data-target="#view_order"><?php echo e(__('View Order')); ?></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                <tfoot class="tfoot-light">
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="delivered3" role="tabpanel" aria-labelledby="delivered-tab3">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered orderTable" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><?php echo e(__('Order Id')); ?></th>
                                        <th><?php echo e(__('Vendor name')); ?></th>
                                        <th><?php echo e(__('User Name')); ?></th>
                                        <th><?php echo e(__('Date')); ?></th>
                                        <th><?php echo e(__('Time')); ?></th>
                                        <th><?php echo e(__('Order Status')); ?></th>
                                        <th><?php echo e(__('Amount')); ?></th>
                                        <th><?php echo e(__('Payment status')); ?></th>
                                        <th><?php echo e(__('Payment type')); ?></th>
                                        <th><?php echo e(__('Order Accept')); ?></th>
                                        <th><?php echo e(__('View')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $deliveredOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deliveryOrder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <input type="hidden" name="order_id" value="<?php echo e($deliveryOrder->id); ?>">
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($deliveryOrder->order_id); ?></td>
                                            <td><?php echo e($deliveryOrder['vendor']->name); ?></td>
                                            <td><?php echo e($deliveryOrder['user']->name); ?></td>
                                            <td><?php echo e($deliveryOrder->date); ?></td>
                                            <td><?php echo e($deliveryOrder->time); ?></td>
                                            <td class="orderStatusTd<?php echo e($deliveryOrder->id); ?>">
                                                <?php if($deliveryOrder->order_status == 'PENDING'): ?>
                                                    <span class="badge badge-pill pending"><?php echo e(__('PENDING')); ?></span>
                                                <?php endif; ?>

                                                <?php if($deliveryOrder->order_status == 'APPROVE'): ?>
                                                    <span class="badge badge-pill approve"><?php echo e(__('APPROVE')); ?></span>
                                                <?php endif; ?>

                                                <?php if($deliveryOrder->order_status == 'REJECT'): ?>
                                                    <span class="badge badge-pill reject"><?php echo e(__('REJECT')); ?></span>
                                                <?php endif; ?>

                                                <?php if($deliveryOrder->order_status == 'CANCEL'): ?>
                                                    <span class="badge badge-pill cancel"><?php echo e(__('CANCEL')); ?></span>
                                                <?php endif; ?>

                                                <?php if($deliveryOrder->order_status == 'PICKUP'): ?>
                                                    <span class="badge badge-pill pickup"><?php echo e(__('PICKUP')); ?></span>
                                                <?php endif; ?>

                                                <?php if($deliveryOrder->order_status == 'DELIVERED'): ?>
                                                    <span class="badge badge-pill delivered"><?php echo e(__('DELIVERED')); ?></span>
                                                <?php endif; ?>

                                                <?php if($deliveryOrder->order_status == 'COMPLETE'): ?>
                                                    <span class="badge badge-pill complete"><?php echo e(__('COMPLETE')); ?></span>
                                                <?php endif; ?>

                                                <?php if($deliveryOrder->order_status == 'PREPARE_FOR_ORDER'): ?>
                                                    <span class="badge badge-pill preparre-food"><?php echo e(__('PREPARE FOR ORDER')); ?></span>
                                                <?php endif; ?>

                                                <?php if($deliveryOrder->order_status == 'READY_FOR_ORDER'): ?>
                                                    <span class="badge badge-pill ready_for_food"><?php echo e(__('READY FOR ORDER')); ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($currency); ?><?php echo e($deliveryOrder->amount); ?></td>
                                            <td>
                                                <?php if($deliveryOrder->payment_status == 1): ?>
                                                    <div class="span"><?php echo e(__('payment complete')); ?></div>
                                                <?php endif; ?>

                                                <?php if($deliveryOrder->payment_status == 0): ?>
                                                    <div class="span"><?php echo e(__('payment not complete')); ?></div>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($deliveryOrder->payment_type); ?></td>
                                            <td>
                                                <?php if($deliveryOrder->delivery_type == 'SHOP'): ?>
                                                    <?php if($deliveryOrder->order_status == 'COMPLETE' || $deliveryOrder->order_status == 'CANCEL'): ?>
                                                        <select class="form-control w-auto" disabled name="order_status_change" id="<?php echo e($deliveryOrder->id); ?>">
                                                            <option value="COMPLETE" <?php echo e($deliveryOrder->order_status == 'COMPLETE' ? 'selected' : ''); ?>><?php echo e(__('Complete')); ?></option>
                                                        </select>
                                                    <?php else: ?>
                                                        <select class="form-control w-auto" onchange="order_status(<?php echo e($deliveryOrder->id); ?>)" id="status<?php echo e($deliveryOrder->id); ?>">
                                                            <option value="PENDING" <?php echo e($deliveryOrder->order_status == 'PENDING' ? 'selected' : ''); ?>><?php echo e(__('Pending')); ?></option>
                                                            <option value="APPROVE" <?php echo e($deliveryOrder->order_status == 'APPROVE' ? 'selected' : ''); ?>><?php echo e(__('Approve')); ?></option>
                                                            <option value="PREPARE_FOR_ORDER" <?php echo e($deliveryOrder->order_status == 'PREPARE_FOR_ORDER' ? 'selected' : ''); ?>><?php echo e(__('Prepare for order')); ?></option>
                                                            <option value="READY_FOR_ORDER" <?php echo e($deliveryOrder->order_status == 'READY_FOR_ORDER' ? 'selected' : ''); ?>><?php echo e(__('Ready for order')); ?></option>
                                                            <option value="REJECT" <?php echo e($deliveryOrder->order_status == 'REJECT' ? 'selected' : ''); ?>><?php echo e(__('Reject')); ?></option>
                                                            <option value="COMPLETE" <?php echo e($deliveryOrder->order_status == 'COMPLETE' ? 'selected' : ''); ?>><?php echo e(__('Complete')); ?></option>
                                                        </select>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <?php if($deliveryOrder->order_status == 'COMPLETE' || $deliveryOrder->order_status == 'CANCEL'): ?>
                                                        <select class="form-control w-auto" disabled name="order_status_change" id="<?php echo e($deliveryOrder->id); ?>">
                                                            <option value="COMPLETE" <?php echo e($deliveryOrder->order_status == 'COMPLETE' ? 'selected' : ''); ?>><?php echo e(__('Complete')); ?></option>
                                                            <option value="CANCEL" <?php echo e($deliveryOrder->order_status == 'CANCEL' ? 'selected' : ''); ?>><?php echo e(__('Cancel')); ?></option>
                                                        </select>
                                                    <?php else: ?>
                                                        <select class="form-control w-auto" onchange="order_status(<?php echo e($deliveryOrder->id); ?>)" name="order_status_change" id="status<?php echo e($deliveryOrder->id); ?>">
                                                            <option value="PENDING" <?php echo e($deliveryOrder->order_status == 'PENDING' ? 'selected' : ''); ?>><?php echo e(__('Pending')); ?></option>
                                                            <option value="APPROVE" <?php echo e($deliveryOrder->order_status == 'APPROVE' ? 'selected' : ''); ?>><?php echo e(__('Approve')); ?></option>
                                                            <option value="REJECT" <?php echo e($deliveryOrder->order_status == 'REJECT' ? 'selected' : ''); ?>><?php echo e(__('Reject')); ?></option>
                                                            <option value="PICKUP" <?php echo e($deliveryOrder->order_status == 'PICKUP' ? 'selected' : ''); ?>><?php echo e(__('pickup')); ?></option>
                                                            <option value="DELIVERED" <?php echo e($deliveryOrder->order_status == 'DELIVERED' ? 'selected' : ''); ?>><?php echo e(__('Delivered')); ?></option>
                                                            <option value="COMPLETE" <?php echo e($deliveryOrder->order_status == 'COMPLETE' ? 'selected' : ''); ?>><?php echo e(__('Complete')); ?></option>
                                                        </select>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo e(url('vendor/order/'.$deliveryOrder->id)); ?>" onclick="show_order(<?php echo e($deliveryOrder->id); ?>)" data-toggle="modal" data-target="#view_order"><?php echo e(__('View Order')); ?></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                <tfoot class="tfoot-light">
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pickup3" role="tabpanel" aria-labelledby="pickup-tab3">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered orderTable" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><?php echo e(__('Order Id')); ?></th>
                                        <th><?php echo e(__('Vendor name')); ?></th>
                                        <th><?php echo e(__('User Name')); ?></th>
                                        <th><?php echo e(__('Date')); ?></th>
                                        <th><?php echo e(__('Time')); ?></th>
                                        <th><?php echo e(__('Order Status')); ?></th>
                                        <th><?php echo e(__('Amount')); ?></th>
                                        <th><?php echo e(__('Payment status')); ?></th>
                                        <th><?php echo e(__('Payment type')); ?></th>
                                        <th><?php echo e(__('Order Accept')); ?></th>
                                        <th><?php echo e(__('View')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $pickUpOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pickUpOrder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <input type="hidden" name="order_id" value="<?php echo e($pickUpOrder->id); ?>">
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($pickUpOrder->order_id); ?></td>
                                            <td><?php echo e($pickUpOrder['vendor']->name); ?></td>
                                            <td><?php echo e($pickUpOrder['user']->name); ?></td>
                                            <td><?php echo e($pickUpOrder->date); ?></td>
                                            <td><?php echo e($pickUpOrder->time); ?></td>
                                            <td class="orderStatusTd<?php echo e($pickUpOrder->id); ?>">
                                                <?php if($pickUpOrder->order_status == 'PENDING'): ?>
                                                    <span class="badge badge-pill pending"><?php echo e(__('PENDING')); ?></span>
                                                <?php endif; ?>

                                                <?php if($pickUpOrder->order_status == 'APPROVE'): ?>
                                                    <span class="badge badge-pill approve"><?php echo e(__('APPROVE')); ?></span>
                                                <?php endif; ?>

                                                <?php if($pickUpOrder->order_status == 'REJECT'): ?>
                                                    <span class="badge badge-pill reject"><?php echo e(__('REJECT')); ?></span>
                                                <?php endif; ?>

                                                <?php if($pickUpOrder->order_status == 'CANCEL'): ?>
                                                    <span class="badge badge-pill cancel"><?php echo e(__('CANCEL')); ?></span>
                                                <?php endif; ?>

                                                <?php if($pickUpOrder->order_status == 'PICKUP'): ?>
                                                    <span class="badge badge-pill pickup"><?php echo e(__('PICKUP')); ?></span>
                                                <?php endif; ?>

                                                <?php if($pickUpOrder->order_status == 'DELIVERED'): ?>
                                                    <span class="badge badge-pill delivered"><?php echo e(__('DELIVERED')); ?></span>
                                                <?php endif; ?>

                                                <?php if($pickUpOrder->order_status == 'COMPLETE'): ?>
                                                    <span class="badge badge-pill complete"><?php echo e(__('COMPLETE')); ?></span>
                                                <?php endif; ?>

                                                <?php if($pickUpOrder->order_status == 'PREPARE_FOR_ORDER'): ?>
                                                    <span class="badge badge-pill preparre-food"><?php echo e(__('PREPARE FOR ORDER')); ?></span>
                                                <?php endif; ?>

                                                <?php if($pickUpOrder->order_status == 'READY_FOR_ORDER'): ?>
                                                    <span class="badge badge-pill ready_for_food"><?php echo e(__('READY FOR ORDER')); ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($currency); ?><?php echo e($pickUpOrder->amount); ?></td>
                                            <td>
                                                <?php if($pickUpOrder->payment_status == 1): ?>
                                                    <div class="span"><?php echo e(__('payment complete')); ?></div>
                                                <?php endif; ?>

                                                <?php if($pickUpOrder->payment_status == 0): ?>
                                                    <div class="span"><?php echo e(__('payment not complete')); ?></div>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($pickUpOrder->payment_type); ?></td>
                                            <td>
                                                <?php if($pickUpOrder->delivery_type == 'SHOP'): ?>
                                                    <?php if($pickUpOrder->order_status == 'COMPLETE' || $pickUpOrder->order_status == 'CANCEL'): ?>
                                                        <select class="form-control w-auto" disabled name="order_status_change" id="<?php echo e($pickUpOrder->id); ?>">
                                                            <option value="COMPLETE" <?php echo e($pickUpOrder->order_status == 'COMPLETE' ? 'selected' : ''); ?>><?php echo e(__('Complete')); ?></option>
                                                        </select>
                                                    <?php else: ?>
                                                        <select class="form-control w-auto" onchange="order_status(<?php echo e($pickUpOrder->id); ?>)" id="status<?php echo e($pickUpOrder->id); ?>">
                                                            <option value="PENDING" <?php echo e($pickUpOrder->order_status == 'PENDING' ? 'selected' : ''); ?>><?php echo e(__('Pending')); ?></option>
                                                            <option value="APPROVE" <?php echo e($pickUpOrder->order_status == 'APPROVE' ? 'selected' : ''); ?>><?php echo e(__('Approve')); ?></option>
                                                            <option value="PREPARE_FOR_ORDER" <?php echo e($pickUpOrder->order_status == 'PREPARE_FOR_ORDER' ? 'selected' : ''); ?>><?php echo e(__('Prepare for order')); ?></option>
                                                            <option value="READY_FOR_ORDER" <?php echo e($pickUpOrder->order_status == 'READY_FOR_ORDER' ? 'selected' : ''); ?>><?php echo e(__('Ready for order')); ?></option>
                                                            <option value="REJECT" <?php echo e($pickUpOrder->order_status == 'REJECT' ? 'selected' : ''); ?>><?php echo e(__('Reject')); ?></option>
                                                            <option value="COMPLETE" <?php echo e($pickUpOrder->order_status == 'COMPLETE' ? 'selected' : ''); ?>><?php echo e(__('Complete')); ?></option>
                                                        </select>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <?php if($pickUpOrder->order_status == 'COMPLETE' || $pickUpOrder->order_status == 'CANCEL'): ?>
                                                        <select class="form-control w-auto" disabled name="order_status_change" id="<?php echo e($pickUpOrder->id); ?>">
                                                            <option value="COMPLETE" <?php echo e($pickUpOrder->order_status == 'COMPLETE' ? 'selected' : ''); ?>><?php echo e(__('Complete')); ?></option>
                                                            <option value="CANCEL" <?php echo e($pickUpOrder->order_status == 'CANCEL' ? 'selected' : ''); ?>><?php echo e(__('Cancel')); ?></option>
                                                        </select>
                                                    <?php else: ?>
                                                        <select class="form-control w-auto" onchange="order_status(<?php echo e($pickUpOrder->id); ?>)" name="order_status_change" id="status<?php echo e($pickUpOrder->id); ?>">
                                                            <option value="PENDING" <?php echo e($pickUpOrder->order_status == 'PENDING' ? 'selected' : ''); ?>><?php echo e(__('Pending')); ?></option>
                                                            <option value="APPROVE" <?php echo e($pickUpOrder->order_status == 'APPROVE' ? 'selected' : ''); ?>><?php echo e(__('Approve')); ?></option>
                                                            <option value="REJECT" <?php echo e($pickUpOrder->order_status == 'REJECT' ? 'selected' : ''); ?>><?php echo e(__('Reject')); ?></option>
                                                            <option value="PICKUP" <?php echo e($pickUpOrder->order_status == 'PICKUP' ? 'selected' : ''); ?>><?php echo e(__('pickup')); ?></option>
                                                            <option value="DELIVERED" <?php echo e($pickUpOrder->order_status == 'DELIVERED' ? 'selected' : ''); ?>><?php echo e(__('Delivered')); ?></option>
                                                            <option value="COMPLETE" <?php echo e($pickUpOrder->order_status == 'COMPLETE' ? 'selected' : ''); ?>><?php echo e(__('Complete')); ?></option>
                                                        </select>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo e(url('vendor/order/'.$pickUpOrder->id)); ?>" onclick="show_order(<?php echo e($pickUpOrder->id); ?>)" data-toggle="modal" data-target="#view_order"><?php echo e(__('View Order')); ?></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                <tfoot class="tfoot-light">
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="cancel3" role="tabpanel" aria-labelledby="cancel-tab3">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered orderTable" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><?php echo e(__('Order Id')); ?></th>
                                        <th><?php echo e(__('Vendor name')); ?></th>
                                        <th><?php echo e(__('User Name')); ?></th>
                                        <th><?php echo e(__('Date')); ?></th>
                                        <th><?php echo e(__('Time')); ?></th>
                                        <th><?php echo e(__('Order Status')); ?></th>
                                        <th><?php echo e(__('Amount')); ?></th>
                                        <th><?php echo e(__('Cancel by')); ?></th>
                                        <th><?php echo e(__('Cancel reason')); ?></th>
                                        <th><?php echo e(__('Payment status')); ?></th>
                                        <th><?php echo e(__('Payment type')); ?></th>
                                        <th><?php echo e(__('Order Accept')); ?></th>
                                        <th><?php echo e(__('View')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $cancelOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cancelOrder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <input type="hidden" name="order_id" value="<?php echo e($cancelOrder->id); ?>">
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($cancelOrder->order_id); ?></td>
                                            <td><?php echo e($cancelOrder['vendor']->name); ?></td>
                                            <td><?php echo e($cancelOrder['user']->name); ?></td>
                                            <td><?php echo e($cancelOrder->date); ?></td>
                                            <td><?php echo e($cancelOrder->time); ?></td>
                                            <td class="orderStatusTd<?php echo e($cancelOrder->id); ?>">
                                                <?php if($cancelOrder->order_status == 'PENDING'): ?>
                                                    <span class="badge badge-pill pending"><?php echo e(__('PENDING')); ?></span>
                                                <?php endif; ?>

                                                <?php if($cancelOrder->order_status == 'APPROVE'): ?>
                                                    <span class="badge badge-pill approve"><?php echo e(__('APPROVE')); ?></span>
                                                <?php endif; ?>

                                                <?php if($cancelOrder->order_status == 'REJECT'): ?>
                                                    <span class="badge badge-pill reject"><?php echo e(__('REJECT')); ?></span>
                                                <?php endif; ?>

                                                <?php if($cancelOrder->order_status == 'CANCEL'): ?>
                                                    <span class="badge badge-pill cancel"><?php echo e(__('CANCEL')); ?></span>
                                                <?php endif; ?>

                                                <?php if($cancelOrder->order_status == 'PICKUP'): ?>
                                                    <span class="badge badge-pill pickup"><?php echo e(__('PICKUP')); ?></span>
                                                <?php endif; ?>

                                                <?php if($cancelOrder->order_status == 'DELIVERED'): ?>
                                                    <span class="badge badge-pill delivered"><?php echo e(__('DELIVERED')); ?></span>
                                                <?php endif; ?>

                                                <?php if($cancelOrder->order_status == 'COMPLETE'): ?>
                                                    <span class="badge badge-pill complete"><?php echo e(__('COMPLETE')); ?></span>
                                                <?php endif; ?>

                                                <?php if($cancelOrder->order_status == 'PREPARE_FOR_ORDER'): ?>
                                                    <span class="badge badge-pill preparre-food"><?php echo e(__('PREPARE FOR ORDER')); ?></span>
                                                <?php endif; ?>

                                                <?php if($cancelOrder->order_status == 'READY_FOR_ORDER'): ?>
                                                    <span class="badge badge-pill ready_for_food"><?php echo e(__('READY FOR ORDER')); ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($currency); ?><?php echo e($cancelOrder->amount); ?></td>
                                            <td><?php echo e($cancelOrder->cancel_by); ?></td>
                                            <td><?php echo e($cancelOrder->cancel_reason); ?></td>
                                            <td>
                                                <?php if($cancelOrder->payment_status == 1): ?>
                                                    <div class="span"><?php echo e(__('payment complete')); ?></div>
                                                <?php endif; ?>

                                                <?php if($cancelOrder->payment_status == 0): ?>
                                                    <div class="span"><?php echo e(__('payment not complete')); ?></div>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($cancelOrder->payment_type); ?></td>
                                            <td>
                                                <?php if($cancelOrder->delivery_type == 'SHOP'): ?>
                                                    <?php if($cancelOrder->order_status == 'COMPLETE' || $cancelOrder->order_status == 'CANCEL'): ?>
                                                        <select class="form-control w-auto" disabled name="order_status_change" id="<?php echo e($cancelOrder->id); ?>">
                                                            <option value="COMPLETE" <?php echo e($cancelOrder->order_status == 'COMPLETE' ? 'selected' : ''); ?>><?php echo e(__('Complete')); ?></option>
                                                        </select>
                                                    <?php else: ?>
                                                        <select class="form-control w-auto" onchange="order_status(<?php echo e($cancelOrder->id); ?>)" id="status<?php echo e($cancelOrder->id); ?>">
                                                            <option value="PENDING" <?php echo e($cancelOrder->order_status == 'PENDING' ? 'selected' : ''); ?>><?php echo e(__('Pending')); ?></option>
                                                            <option value="APPROVE" <?php echo e($cancelOrder->order_status == 'APPROVE' ? 'selected' : ''); ?>><?php echo e(__('Approve')); ?></option>
                                                            <option value="PREPARE_FOR_ORDER" <?php echo e($cancelOrder->order_status == 'PREPARE_FOR_ORDER' ? 'selected' : ''); ?>><?php echo e(__('Prepare for order')); ?></option>
                                                            <option value="READY_FOR_ORDER" <?php echo e($cancelOrder->order_status == 'READY_FOR_ORDER' ? 'selected' : ''); ?>><?php echo e(__('Ready for order')); ?></option>
                                                            <option value="REJECT" <?php echo e($cancelOrder->order_status == 'REJECT' ? 'selected' : ''); ?>><?php echo e(__('Reject')); ?></option>
                                                            <option value="COMPLETE" <?php echo e($cancelOrder->order_status == 'COMPLETE' ? 'selected' : ''); ?>><?php echo e(__('Complete')); ?></option>
                                                        </select>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <?php if($cancelOrder->order_status == 'COMPLETE' || $cancelOrder->order_status == 'CANCEL'): ?>
                                                        <select class="form-control w-auto" disabled name="order_status_change" id="<?php echo e($cancelOrder->id); ?>">
                                                            <option value="COMPLETE" <?php echo e($cancelOrder->order_status == 'COMPLETE' ? 'selected' : ''); ?>><?php echo e(__('Complete')); ?></option>
                                                            <option value="CANCEL" <?php echo e($cancelOrder->order_status == 'CANCEL' ? 'selected' : ''); ?>><?php echo e(__('Cancel')); ?></option>
                                                        </select>
                                                    <?php else: ?>
                                                        <select class="form-control w-auto" onchange="order_status(<?php echo e($cancelOrder->id); ?>)" name="order_status_change" id="status<?php echo e($cancelOrder->id); ?>">
                                                            <option value="PENDING" <?php echo e($cancelOrder->order_status == 'PENDING' ? 'selected' : ''); ?>><?php echo e(__('Pending')); ?></option>
                                                            <option value="APPROVE" <?php echo e($cancelOrder->order_status == 'APPROVE' ? 'selected' : ''); ?>><?php echo e(__('Approve')); ?></option>
                                                            <option value="REJECT" <?php echo e($cancelOrder->order_status == 'REJECT' ? 'selected' : ''); ?>><?php echo e(__('Reject')); ?></option>
                                                            <option value="PICKUP" <?php echo e($cancelOrder->order_status == 'PICKUP' ? 'selected' : ''); ?>><?php echo e(__('pickup')); ?></option>
                                                            <option value="DELIVERED" <?php echo e($cancelOrder->order_status == 'DELIVERED' ? 'selected' : ''); ?>><?php echo e(__('Delivered')); ?></option>
                                                            <option value="COMPLETE" <?php echo e($cancelOrder->order_status == 'COMPLETE' ? 'selected' : ''); ?>><?php echo e(__('Complete')); ?></option>
                                                        </select>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo e(url('vendor/order/'.$cancelOrder->id)); ?>" onclick="show_order(<?php echo e($cancelOrder->id); ?>)" data-toggle="modal" data-target="#view_order"><?php echo e(__('View Order')); ?></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                <tfoot class="tfoot-light">
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="complete3" role="tabpanel" aria-labelledby="complete-tab3">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered orderTable" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><?php echo e(__('Order Id')); ?></th>
                                        <th><?php echo e(__('Vendor name')); ?></th>
                                        <th><?php echo e(__('User Name')); ?></th>
                                        <th><?php echo e(__('Date')); ?></th>
                                        <th><?php echo e(__('Time')); ?></th>
                                        <th><?php echo e(__('Order Status')); ?></th>
                                        <th><?php echo e(__('Amount')); ?></th>
                                        <th><?php echo e(__('Payment status')); ?></th>
                                        <th><?php echo e(__('Payment type')); ?></th>
                                        <th><?php echo e(__('Order Accept')); ?></th>
                                        <th><?php echo e(__('View')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $completeOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $completeOrder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <input type="hidden" name="order_id" value="<?php echo e($completeOrder->id); ?>">
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($completeOrder->order_id); ?></td>
                                            <td><?php echo e($completeOrder['vendor']->name); ?></td>
                                            <td><?php echo e($completeOrder['user']->name); ?></td>
                                            <td><?php echo e($completeOrder->date); ?></td>
                                            <td><?php echo e($completeOrder->time); ?></td>
                                            <td class="orderStatusTd<?php echo e($completeOrder->id); ?>">
                                                <?php if($completeOrder->order_status == 'PENDING'): ?>
                                                    <span class="badge badge-pill pending"><?php echo e(__('PENDING')); ?></span>
                                                <?php endif; ?>

                                                <?php if($completeOrder->order_status == 'APPROVE'): ?>
                                                    <span class="badge badge-pill approve"><?php echo e(__('APPROVE')); ?></span>
                                                <?php endif; ?>

                                                <?php if($completeOrder->order_status == 'REJECT'): ?>
                                                    <span class="badge badge-pill reject"><?php echo e(__('REJECT')); ?></span>
                                                <?php endif; ?>

                                                <?php if($completeOrder->order_status == 'CANCEL'): ?>
                                                    <span class="badge badge-pill cancel"><?php echo e(__('CANCEL')); ?></span>
                                                <?php endif; ?>

                                                <?php if($completeOrder->order_status == 'PICKUP'): ?>
                                                    <span class="badge badge-pill pickup"><?php echo e(__('PICKUP')); ?></span>
                                                <?php endif; ?>

                                                <?php if($completeOrder->order_status == 'DELIVERED'): ?>
                                                    <span class="badge badge-pill delivered"><?php echo e(__('DELIVERED')); ?></span>
                                                <?php endif; ?>

                                                <?php if($completeOrder->order_status == 'COMPLETE'): ?>
                                                    <span class="badge badge-pill complete"><?php echo e(__('COMPLETE')); ?></span>
                                                <?php endif; ?>

                                                <?php if($completeOrder->order_status == 'PREPARE_FOR_ORDER'): ?>
                                                    <span class="badge badge-pill preparre-food"><?php echo e(__('PREPARE FOR ORDER')); ?></span>
                                                <?php endif; ?>

                                                <?php if($completeOrder->order_status == 'READY_FOR_ORDER'): ?>
                                                    <span class="badge badge-pill ready_for_food"><?php echo e(__('READY FOR ORDER')); ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($currency); ?><?php echo e($completeOrder->amount); ?></td>
                                            <td>
                                                <?php if($completeOrder->payment_status == 1): ?>
                                                    <div class="span"><?php echo e(__('payment complete')); ?></div>
                                                <?php endif; ?>

                                                <?php if($completeOrder->payment_status == 0): ?>
                                                    <div class="span"><?php echo e(__('payment not complete')); ?></div>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($completeOrder->payment_type); ?></td>
                                            <td>
                                                <?php if($completeOrder->delivery_type == 'SHOP'): ?>
                                                    <?php if($completeOrder->order_status == 'COMPLETE' || $completeOrder->order_status == 'CANCEL'): ?>
                                                        <select class="form-control w-auto" disabled name="order_status_change" id="<?php echo e($completeOrder->id); ?>">
                                                            <option value="COMPLETE" <?php echo e($completeOrder->order_status == 'COMPLETE' ? 'selected' : ''); ?>><?php echo e(__('Complete')); ?></option>
                                                        </select>
                                                    <?php else: ?>
                                                        <select class="form-control w-auto" onchange="order_status(<?php echo e($completeOrder->id); ?>)" id="status<?php echo e($completeOrder->id); ?>">
                                                            <option value="PENDING" <?php echo e($completeOrder->order_status == 'PENDING' ? 'selected' : ''); ?>><?php echo e(__('Pending')); ?></option>
                                                            <option value="APPROVE" <?php echo e($completeOrder->order_status == 'APPROVE' ? 'selected' : ''); ?>><?php echo e(__('Approve')); ?></option>
                                                            <option value="PREPARE_FOR_ORDER" <?php echo e($completeOrder->order_status == 'PREPARE_FOR_ORDER' ? 'selected' : ''); ?>><?php echo e(__('Prepare for order')); ?></option>
                                                            <option value="READY_FOR_ORDER" <?php echo e($completeOrder->order_status == 'READY_FOR_ORDER' ? 'selected' : ''); ?>><?php echo e(__('Ready for order')); ?></option>
                                                            <option value="REJECT" <?php echo e($completeOrder->order_status == 'REJECT' ? 'selected' : ''); ?>><?php echo e(__('Reject')); ?></option>
                                                            <option value="COMPLETE" <?php echo e($completeOrder->order_status == 'COMPLETE' ? 'selected' : ''); ?>><?php echo e(__('Complete')); ?></option>
                                                        </select>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <?php if($completeOrder->order_status == 'COMPLETE' || $completeOrder->order_status == 'CANCEL'): ?>
                                                        <select class="form-control w-auto" disabled name="order_status_change" id="<?php echo e($completeOrder->id); ?>">
                                                            <option value="COMPLETE" <?php echo e($completeOrder->order_status == 'COMPLETE' ? 'selected' : ''); ?>><?php echo e(__('Complete')); ?></option>
                                                            <option value="CANCEL" <?php echo e($completeOrder->order_status == 'CANCEL' ? 'selected' : ''); ?>><?php echo e(__('Cancel')); ?></option>
                                                        </select>
                                                    <?php else: ?>
                                                        <select class="form-control w-auto" onchange="order_status(<?php echo e($completeOrder->id); ?>)" name="order_status_change" id="status<?php echo e($completeOrder->id); ?>">
                                                            <option value="PENDING" <?php echo e($completeOrder->order_status == 'PENDING' ? 'selected' : ''); ?>><?php echo e(__('Pending')); ?></option>
                                                            <option value="APPROVE" <?php echo e($completeOrder->order_status == 'APPROVE' ? 'selected' : ''); ?>><?php echo e(__('Approve')); ?></option>
                                                            <option value="REJECT" <?php echo e($completeOrder->order_status == 'REJECT' ? 'selected' : ''); ?>><?php echo e(__('Reject')); ?></option>
                                                            <option value="PICKUP" <?php echo e($completeOrder->order_status == 'PICKUP' ? 'selected' : ''); ?>><?php echo e(__('pickup')); ?></option>
                                                            <option value="DELIVERED" <?php echo e($completeOrder->order_status == 'DELIVERED' ? 'selected' : ''); ?>><?php echo e(__('Delivered')); ?></option>
                                                            <option value="COMPLETE" <?php echo e($completeOrder->order_status == 'COMPLETE' ? 'selected' : ''); ?>><?php echo e(__('Complete')); ?></option>
                                                        </select>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo e(url('vendor/order/'.$completeOrder->id)); ?>" onclick="show_order(<?php echo e($completeOrder->id); ?>)" data-toggle="modal" data-target="#view_order"><?php echo e(__('View Order')); ?></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                <tfoot class="tfoot-light">
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <input type="button" value="Delete selected" onclick="deleteAll('order_multi_delete','Order')" class="btn btn-primary">
            </div>
        </div>
    </div>
</section>

<div class="modal right fade" id="view_order" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="staticBackdropLabel"><?php echo e(__('View order')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tr>
                        <th><?php echo e(__('Order Id')); ?></th>
                        <td class="show_order_id"></td>
                    </tr>
                    <tr>
                        <th><?php echo e(__('User name')); ?></th>
                        <td class="show_user_name"></td>
                    </tr>
                    <tr>
                        <th><?php echo e(__('date')); ?></th>
                        <td class="show_date"></td>
                    </tr>
                    <tr>
                        <th><?php echo e(__('time')); ?></th>
                        <td class="show_time"></td>
                    </tr>
                    <tr>
                        <th><?php echo e(__('Delivery At')); ?></th>
                        <td class="show_delivery_at"></td>
                    </tr>
                    <tr>
                        <th><?php echo e(__('Discount')); ?></th>
                        <td class="show_discount"></td>
                    </tr>
                    <tr>
                        <th><?php echo e(__('Total Amount')); ?></th>
                        <td class="show_total_amount"></td>
                    </tr>
                    <tr>
                        <th><?php echo e(__('Admin Commission')); ?></th>
                        <td class="show_admin_commission"></td>
                    </tr>
                    <tr>
                        <th><?php echo e(__('Vendor Commission')); ?></th>
                        <td class="show_vendor_amount"></td>
                    </tr>
                </table>
                <h6><?php echo e(__('tax')); ?></h6>
                <table class="table TaxTable">
                </table>
                <h6><?php echo e(__('Items')); ?></h6>
                <table class="table show_order_table">
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app',['activePage' => 'order'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/api.gobistro.in/public_html/resources/views/vendor/order/order.blade.php ENDPATH**/ ?>