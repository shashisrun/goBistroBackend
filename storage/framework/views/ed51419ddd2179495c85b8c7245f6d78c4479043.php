<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <?php
        $title = App\Models\GeneralSetting::find(1)->business_name;
    ?>

    <title><?php echo e($title); ?> | <?php echo e('Invoice'); ?></title>

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- General CSS Files -->
    <input type="hidden" id="mainurl" value="<?php echo e(url('/')); ?>">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>

    <!-- CSS Libraries -->

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.21/b-1.6.2/b-flash-1.6.2/b-html5-1.6.2/b-print-1.6.2/datatables.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.3/jquery.timepicker.min.css">

    <?php
        $favicon = App\Models\GeneralSetting::find(1)->company_favicon;
        $color = App\Models\GeneralSetting::find(1)->site_color;
    ?>
    <style>
        :root {
            --site_color: <?php echo $color; ?>;
            --hover_color: <?php echo $color.'c7'; ?>;
        }
    </style>

    <!-- Template CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.2.0/css/bootstrap-colorpicker.css">

    <link rel="stylesheet" href="<?php echo e(asset('css/components.css')); ?>">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(asset('css/custom.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('css/iziToast.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">

    <script src="<?php echo e(asset('js/iziToast.min.js')); ?>"></script>

    <script>
        window.print();
    </script>
</head>

<body>
    <div class="page">
        <div id="app">
            <div class="main-wrapper main-wrapper-1">
                <div class="main-content">
                    <?php
                        $discount = intval(00);
                        $cust = "";
                        $totalCust= 0;
                        $itemPrice = 0;
                    ?>
                    <?php if($order->promo_code_price != null): ?>
                        <?php
                            $discount += intval($order->promo_code_price);
                        ?>
                    <?php elseif($order->vendor_discount_price != null): ?>
                        <?php
                            $discount += intval($order->vendor_discount_price);
                        ?>
                    <?php endif; ?>

                    <?php
                        $delivery_charge = 0;
                    ?>
                    <?php if($order->delivery_charge != null): ?>
                        <?php
                            $delivery_charge = $order->delivery_charge
                        ?>
                    <?php endif; ?>

                    <?php
                        $tax = 0;
                    ?>
                    <?php if($order->tax != null): ?>
                        <?php
                            $taxs = $order->tax;
                            foreach (json_decode($taxs) as $t)
                            {
                                $tax = $tax + $t->tax;
                            }
                        ?>
                    <?php endif; ?>

                    <div class="section-body">
                        <div class="invoice">
                            <div class="invoice-print">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="invoice-title">
                                            <h2><?php echo e(__('Invoice')); ?></h2>
                                            <div class="invoice-number"><?php echo e(__('Order')); ?> <?php echo e($order->order_id); ?></div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <address>
                                                    <strong><?php echo e(__('Billed To:')); ?></strong><br>
                                                    <?php echo e($general_setting->business_name); ?><br>
                                                    <?php echo e($general_setting->business_address); ?>

                                                </address>
                                            </div>
                                            <div class="col-md-6 text-md-right">
                                                <address>
                                                    <strong><?php echo e(__('user')); ?></strong><br>
                                                    <?php echo e($order['user']->name); ?><br>
                                                    <?php echo e($order['user']->email); ?><br>
                                                    <?php echo e($order['user']->phone); ?><br>
                                                </address>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="offset-md-6 col-md-6 text-md-right">
                                                <address>
                                                    <strong><?php echo e(__('Order Date:')); ?></strong><br>
                                                    <?php echo e($order->date); ?>&nbsp;<?php echo e($order->time); ?><br><br>
                                                </address>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <div class="section-title"><?php echo e(__('Order Summary')); ?></div>
                                        <p class="section-lead"><?php echo e(__('All items here cannot be deleted.')); ?></p>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover table-md">
                                                <tbody>
                                                    <tr>
                                                        <th data-width="40" style="width: 40px;">#</th>
                                                        <th><?php echo e(__('Item')); ?></th>
                                                        <th class="text-center"><?php echo e(__('Price')); ?></th>
                                                        <th class="text-center"><?php echo e(__('Quantity')); ?></th>
                                                        <th class="text-center"><?php echo e(__('Custimization')); ?></th>
                                                        <th class="text-center"><?php echo e(__('Custimization price')); ?></th>
                                                        <th class="text-right"><?php echo e(__('Totals')); ?></th>
                                                    </tr>
                                                    <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($loop->iteration); ?></td>
                                                        <td><?php echo e($item['itemName']); ?></td>
                                                        <td class="text-center">
                                                            <?php echo e($general_setting->currency_symbol); ?><?php echo e($item->price); ?>

                                                        </td>
                                                        <td class="text-center"><?php echo e($item->qty); ?></td>
                                                        <?php if($item->custimization != null): ?>
                                                            <?php $__currentLoopData = $item->custimization; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $custimize): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php
                                                                    $cust = $cust ." ". $custimize->data->name.",";
                                                                    $totalCust += $custimize->data->price;
                                                                ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <td class="text-center"><?php echo e($cust); ?></td>
                                                            <td class="text-center"><?php echo e($totalCust); ?></td>
                                                        <?php else: ?>
                                                            <?php
                                                                $totalCust= 0;
                                                            ?>

                                                            <td class="text-center"><?php echo e(__('Not included')); ?></td>
                                                            <td class="text-center"><?php echo e(__('Not included')); ?></td>
                                                        <?php endif; ?>
                                                        <td class="text-right"><?php echo e($general_setting->currency_symbol); ?><?php echo e($item->price + $totalCust); ?></td>
                                                        <?php
                                                            $itemPrice = $item->price + $totalCust;
                                                        ?>
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>

                                            <div class="section-title mt-5"><?php echo e(__('Tax')); ?></div>
                                            <p class="section-lead"><?php echo e(__('Tax Description.')); ?></p>
                                            <table class="table table-striped table-hover table-md text-center">
                                                <tbody>
                                                    <tr>
                                                        <th data-width="40" style="width: 40px;">#</th>
                                                        <th><?php echo e(__('Tax Name')); ?></th>
                                                        <th><?php echo e(__('Tax value')); ?></th>
                                                    </tr>
                                                    <?php $__currentLoopData = json_decode($order->tax); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($loop->iteration); ?></td>
                                                        <td><?php echo e($ts->name); ?></td>
                                                        <td>
                                                            <?php echo e($general_setting->currency_symbol); ?><?php echo e($ts->tax); ?>

                                                        </td>
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="offset-lg-8 col-lg-4 text-right">
                                                <div class="invoice-detail-item">
                                                    <div class="invoice-detail-name"><?php echo e(__('Tax')); ?></div>
                                                    <div class="invoice-detail-value">
                                                        <?php echo e($general_setting->currency_symbol); ?><?php echo e($tax); ?></div>
                                                </div>
                                                <div class="invoice-detail-item">
                                                    <div class="invoice-detail-name"><?php echo e(__('Subtotal')); ?></div>
                                                    <div class="invoice-detail-value">
                                                        <?php echo e($general_setting->currency_symbol); ?><?php echo e($itemPrice); ?></div>
                                                </div>
                                                <div class="invoice-detail-item">
                                                    <div class="invoice-detail-name"><?php echo e(__('Shipping')); ?></div>
                                                    <div class="invoice-detail-value">
                                                        <?php echo e($general_setting->currency_symbol); ?><?php echo e($delivery_charge); ?>

                                                    </div>
                                                </div>

                                                <div class="invoice-detail-item">
                                                    <div class="invoice-detail-name"><?php echo e(__('Discount')); ?></div>
                                                    <div class="invoice-detail-value">
                                                        <?php echo e($general_setting->currency_symbol); ?><?php echo e($discount); ?>

                                                    </div>
                                                </div>
                                                <hr class="mt-2 mb-2">
                                                <div class="invoice-detail-item">
                                                    <div class="invoice-detail-name"><?php echo e(__('Total')); ?></div>
                                                    <div class="invoice-detail-value invoice-detail-value-lg">
                                                        <?php echo e($general_setting->currency_symbol); ?><?php echo e($order->amount); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php /**PATH /home/api.gobistro.in/public_html/resources/views/admin/order/invoice_print.blade.php ENDPATH**/ ?>