<?php $__env->startSection('title',__('User Wallet')); ?>

<?php $__env->startSection('content'); ?>

<section class="section">
    <div class="section-header">
        <h1><?php echo e($user->name); ?><?php echo e('  wallet transaction'); ?></h1>
        <div class="section-header-breadcrumb">
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(url('admin/home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
                <div class="breadcrumb-item"><?php echo e(__('User')); ?></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-coins"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4><?php echo e(__('Total Balance')); ?></h4>
                    </div>
                    <div class="card-body">
                        <?php echo e($currency); ?><?php echo e($user->balance); ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-money-check"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4><?php echo e(__('Deposit')); ?></h4>
                    </div>
                    <div class="card-body">
                        <?php echo e($currency); ?><?php echo e($user->deposit); ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-money-bill-alt"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4><?php echo e(__('WithDraw')); ?></h4>
                    </div>
                    <div class="card-body">
                        <?php echo e($currency); ?><?php echo e($user->withdraw); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card p-3">
                    <form action="<?php echo e(url('admin/user/user_wallet/'.$user->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-12">
                                <input type="text" name="date_range" class="form-control">
                            </div>
                            <div class="col-md-6 col-lg-6 col-12">
                                <input type="submit" value="<?php echo e(__('apply')); ?>" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4><?php echo e($user->name); ?><?php echo e((' total wallet balance')); ?><?php echo e(' '); ?><?php echo e($currency); ?><?php echo e($user->balance); ?></h4>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    <?php echo e(__('Add New')); ?>

                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered text-center report" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo e(__('Amount')); ?></th>
                                <th><?php echo e(__('Type')); ?></th>
                                <th><?php echo e(__('Payment Type')); ?></th>
                                <th><?php echo e(__('Payment Token')); ?></th>
                                <th><?php echo e(__('Date')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($currency); ?><?php echo e($transaction->amount); ?></td>
                                    <td>
                                        <span class="badge badge-pill <?php echo e($transaction->type == 'withdraw' ? 'badge-danger' : 'badge-success'); ?>">
                                            <?php echo e($transaction->type); ?>

                                        </span>
                                        <?php if($transaction->type == 'deposit'): ?>
                                            <span>(<?php echo e('added by'); ?><?php echo e(' '); ?><?php echo e($transaction->payment_details['added_by']); ?>)</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($transaction->payment_details): ?>
                                            <?php echo e($transaction->payment_details['payment_type']); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($transaction->payment_details): ?>
                                            <?php echo e($transaction->payment_details['payment_token']); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($transaction->date); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?php echo e(url('admin/user/add_wallet')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('Wallet Amount')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="name"><?php echo e(__('Amount')); ?><span class="text-danger">&nbsp;*</span></label>
                            <input type="number" name="amount" class="form-control <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is_invalide <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('Amount')); ?>" value="<?php echo e(old('Wallet Amount')); ?>" required="">
                            <?php $__errorArgs = ['amount'];
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                    <button type="submit" class="btn btn-primary"><?php echo e(__('Save')); ?></button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app',['activePage' => 'user'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/api.gobistro.in/public_html/resources/views/admin/user/user_wallet.blade.php ENDPATH**/ ?>