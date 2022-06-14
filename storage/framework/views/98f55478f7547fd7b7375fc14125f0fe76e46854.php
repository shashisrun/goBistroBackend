<?php $__env->startSection('title','Vendor Dashboard'); ?>

<?php $__env->startSection('content'); ?>

<section class="section">
    <?php if(Session::has('msg')): ?>
        <?php echo $__env->make('layouts.msg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <div class="section-header">
        <h1><?php echo e(__('Vendor dashboard')); ?></h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-hero">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-sort"></i>
                        </div>
                        <h4><?php echo e(count($today_orders)); ?></h4>
                        <div class="card-description"><?php echo e(__("Today’s order")); ?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-hero">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-globe"></i>
                        </div>
                        <h4><?php echo e(count($total_orders)); ?></h4>
                        <div class="card-description"><?php echo e(__('Total orders')); ?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-hero">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <h4><?php echo e($currency); ?><?php echo e($today_earnings); ?></h4>
                        <div class="card-description"><?php echo e(__("Today's earning")); ?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-hero">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-file-invoice"></i>
                        </div>
                        <h4><?php echo e($currency); ?><?php echo e($total_earnings); ?></h4>
                        <div class="card-description"><?php echo e(__('Total earnings')); ?></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4><?php echo e(__("Today's pending order")); ?></h4>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
                                <?php $__currentLoopData = $pending_today_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <input type="hidden" name="order_id" value="<?php echo e($order->id); ?>">
                                    <td><?php echo e($loop->iteration); ?></td>
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

                                        <?php if($order->order_status == 'REJECT'): ?>
                                            <span class="badge badge-pill reject"><?php echo e(__('REJECT')); ?></span>
                                        <?php endif; ?>

                                        <?php if($order->order_status == 'CANCEL'): ?>
                                            <span class="badge badge-pill cancel"><?php echo e(__('CANCEL')); ?></span>
                                        <?php endif; ?>

                                        <?php if($order->order_status == 'ACCEPT'): ?>
                                            <span class="badge badge-pill accept"><?php echo e(__('ACCEPT')); ?></span>
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
                                                        <option value="PENDING" disabled <?php echo e($order->order_status == 'PENDING' ? 'selected' : ''); ?>><?php echo e(__('PENDING')); ?></option>
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
                                                        <option value="PENDING" disabled <?php echo e($order->order_status == 'PENDING' ? 'selected' : ''); ?>><?php echo e(__('PENDING')); ?></option>
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
                                            <select name="assign_driver" onchange="driver_assign(<?php echo e($order->id); ?>)" id="driver_id<?php echo e($order->id); ?>" <?php echo e($order->delivery_person_id != null ? 'disabled' : ''); ?> <?php echo e($order->order_status == 'CANCEL' ? 'disabled' : ''); ?> <?php echo e($order->delivery_type == 'SHOP' ? 'disabled' : ''); ?> class="form-control">
                                                <option value=""><?php echo e(__('select Drivers')); ?></option>
                                                <?php $__currentLoopData = $delivery_persons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $delivery_person): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($delivery_person->id); ?>" <?php echo e($delivery_person->id == $order->delivery_person_id ? 'selected' : ""); ?>><?php echo e($delivery_person->first_name.' '.$delivery_person->last_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </td>
                                    <?php endif; ?>
                                    <td>
                                        <a href="<?php echo e(url('vendor/order/'.$order->id)); ?>" onclick="show_order(<?php echo e($order->id); ?>)" data-toggle="modal" data-target="#view_order"><?php echo e(__('View Order')); ?></a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-6 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-dark"><?php echo e(__('Orders chart')); ?></h4>
                    </div>
                    <div class="card-body">
                        <canvas id="userChart" class="chartjs-render-monitor"
                            style="display: block; width: 580px; height: 250px"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-dark"><?php echo e(__('Revenue chart')); ?></h4>
                    </div>
                    <div class="card-body">
                        <canvas id="revenueChart" class="chartjs-render-monitor"
                            style="display: block; width: 580px; height: 250px"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4><?php echo e(__('Top selling Items')); ?></h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo e(__('Items name')); ?></th>
                                    <th><?php echo e(__('Price')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $topItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th><?php echo e($loop->iteration); ?></th>
                                    <th>
                                        <a href="<?php echo e(url('admin/menu/'.$topItem->menu_id)); ?>" class="nav-link active">
                                            <?php echo e($topItem->itemName); ?>

                                        </a>
                                    </th>
                                    <th><?php echo e($currency); ?><?php echo e($topItem->price); ?></th>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4><?php echo e(__('Top Selling Items')); ?></h4>
                    </div>
                    <div class="card-body">
                        <?php $__currentLoopData = $topItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="tickets-list">
                                <a class="ticket-item">
                                    <div class="ticket-title text-muted">
                                        <h4><?php echo e($topItem->itemName); ?></h4>
                                    </div>
                                    <div class="ticket-info">
                                        <div><?php echo e($topItem->total); ?><?php echo e(' time served'); ?></div>
                                        <div class="w-100">
                                            <?php if($topItem->type == 'veg'): ?>
                                                <img src="<?php echo e(url('images/veg.png')); ?>" class="float-right" alt="">
                                            <?php else: ?>
                                                <img src="<?php echo e(url('images/non-veg.png')); ?>" class="float-right" alt="">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
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




<?php echo $__env->make('layouts.app',['activePage' => 'home'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/api.gobistro.in/public_html/resources/views/vendor/vendor_home.blade.php ENDPATH**/ ?>