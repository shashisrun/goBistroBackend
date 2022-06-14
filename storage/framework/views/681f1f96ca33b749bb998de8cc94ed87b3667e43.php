<?php $__env->startSection('title','Notification Setting'); ?>

<?php $__env->startSection('content'); ?>

    <?php if(Session::has('msg')): ?>
    <?php echo $__env->make('layouts.msg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <section class="section">
        <div class="section-header">
            <h1><?php echo e(__('Notification and mail setting')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(url('admin/home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
                <div class="breadcrumb-item active"><a href="<?php echo e(url('admin/setting')); ?>"><?php echo e(__('Setting')); ?></a></div>
                <div class="breadcrumb-item"><?php echo e(__('Notification and mail setting')); ?></div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title"><?php echo e(__('notification related setting')); ?></h2>
            <p class="section-lead"><?php echo e(__('notification related setting')); ?></p>

            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills" id="myTab3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home"
                                aria-selected="false"><?php echo e(__('Push notification')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab"
                                aria-controls="profile" aria-selected="true"><?php echo e(__('Mail notification')); ?></a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent2">
                        <div class="tab-pane fade active show" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                            <div class="card">
                                <div class="card-header">
                                    <h4><?php echo e(__('notification setting')); ?></h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="<?php echo e(__('customer_notification')); ?>"><?php echo e(__('Customer notification')); ?></label><br>
                                            <label class="switch">
                                                <input type="checkbox" name="customer_notification" <?php echo e($notification_setting->customer_notification == '1' ? 'checked' : ''); ?>>
                                                <div class="slider"></div>
                                            </label>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="<?php echo e(__('vendor_notification')); ?>"><?php echo e(__('vendor notification')); ?></label><br>
                                            <label class="switch">
                                                <input type="checkbox" name="vendor_notification" <?php echo e($notification_setting->vendor_notification == '1' ? 'checked' : ''); ?>>
                                                <div class="slider"></div>
                                            </label>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="<?php echo e(__('driver_notification')); ?>"><?php echo e(__('driver notification')); ?></label><br>
                                            <label class="switch">
                                                <input type="checkbox" name="driver_notification" <?php echo e($notification_setting->driver_notification == '1' ? 'checked' : ''); ?>>
                                                <div class="slider"></div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-5 customer_notification_card <?php echo e($notification_setting->customer_notification == 0 ? 'hide' : ''); ?>">
                                <div class="card-header">
                                    <h4><?php echo e(__('customer notification')); ?></h4>
                                </div>
                                <form action="<?php echo e(url('admin/update_customer_notification')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="onesignal_app_id"><?php echo e(__('One signal app id')); ?></label>
                                                <input type="text" name="customer_app_id" value="<?php echo e($notification_setting->customer_app_id); ?>" required class="form-control text_transform_none">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="onesignal_app_id"><?php echo e(__('One signal auth key')); ?></label>
                                                <input type="text" name="customer_auth_key" value="<?php echo e($notification_setting->customer_auth_key); ?>" required class="form-control text_transform_none">
                                            </div>
                                        </div>

                                        <div class="row mb-12">
                                            <div class="col-md-12">
                                                <label for="onesignal_app_id"><?php echo e(__('One signal api key')); ?></label>
                                                <input type="text" name="customer_api_key" value="<?php echo e($notification_setting->customer_api_key); ?>"  required class="form-control text_transform_none">
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-md-12">
                                                <input type="submit" value="<?php echo e(__('Update')); ?>"  class="btn btn-primary float-right">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="card mt-5 driver_notification_card <?php echo e($notification_setting->driver_notification == 0 ? 'hide' : ''); ?>">
                                <div class="card-header">
                                    <h4><?php echo e(__('Driver notification')); ?></h4>
                                </div>
                                <form action="<?php echo e(url('admin/update_driver_notification')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="onesignal_app_id"><?php echo e(__('One signal app id')); ?></label>
                                                <input type="text" required value="<?php echo e($notification_setting->driver_app_id); ?>" name="driver_app_id" class="form-control">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="onesignal_app_id"><?php echo e(__('One signal auth key')); ?></label>
                                                <input type="text" required value="<?php echo e($notification_setting->driver_auth_key); ?>" name="driver_auth_key" class="form-control">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="onesignal_app_id"><?php echo e(__('One signal api key')); ?></label>
                                                <input type="text" required value="<?php echo e($notification_setting->driver_api_key); ?>"  name="driver_api_key" class="form-control">
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-md-12">
                                                <input type="submit" value="<?php echo e(__('Update')); ?>"  class="btn btn-primary float-right">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="card mt-5 vendor_notification_card <?php echo e($notification_setting->vendor_notification == 0 ? 'hide' : ''); ?>">
                                <div class="card-header">
                                    <?php echo e(__('vendor notification')); ?>

                                </div>
                                <form action="<?php echo e(url('admin/update_vendor_notification')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="onesignal_app_id"><?php echo e(__('One signal app id')); ?></label>
                                                <input type="text" name="vendor_app_id" required value="<?php echo e($notification_setting->vendor_app_id); ?>" class="form-control">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="onesignal_app_id"><?php echo e(__('One signal auth key')); ?></label>
                                                <input type="text" name="vendor_auth_key" required value="<?php echo e($notification_setting->vendor_auth_key); ?>" class="form-control">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="onesignal_app_id"><?php echo e(__('One signal api key')); ?></label>
                                                <input type="text" name="vendor_api_key" required value="<?php echo e($notification_setting->vendor_api_key); ?>" class="form-control">
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-md-12">
                                                <input type="submit" value="<?php echo e(__('Update')); ?>"  class="btn btn-primary float-right">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                            <form action="<?php echo e(url('admin/update_mail_setting')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="<?php echo e(__('customer_notification')); ?>"><?php echo e(__('Customer mail notification')); ?></label><br>
                                        <label class="switch">
                                            <input type="checkbox" name="customer_mail" <?php echo e($notification_setting->customer_mail == '1' ? 'checked' : ''); ?>>
                                            <div class="slider"></div>
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="<?php echo e(__('vendor_notification')); ?>"><?php echo e(__('vendor mail notification')); ?></label><br>
                                        <label class="switch">
                                            <input type="checkbox" name="vendor_mail" <?php echo e($notification_setting->vendor_mail == '1' ? 'checked' : ''); ?>>
                                            <div class="slider"></div>
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="<?php echo e(__('driver_notification')); ?>"><?php echo e(__('driver mail notification')); ?></label><br>
                                        <label class="switch">
                                            <input type="checkbox" name="driver_mail" <?php echo e($notification_setting->driver_mail == '1' ? 'checked' : ''); ?>>
                                            <div class="slider"></div>
                                        </label>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="onesignal_app_id"><?php echo e(__('Mail Host')); ?></label>
                                            <input type="text" required value="<?php echo e($notification_setting->mail_host); ?>" name="mail_host" class="form-control" style="text-transform: none;">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="onesignal_app_id"><?php echo e(__('Mail user name')); ?></label>
                                            <input type="text" required value="<?php echo e($notification_setting->mail_username); ?>"  name="mail_username" class="form-control" style="text-transform: none;">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="onesignal_app_id"><?php echo e(__('Mail password')); ?></label>
                                            <input type="password" required value="<?php echo e($notification_setting->mail_password); ?>"  name="mail_password" class="form-control" style="text-transform: none;">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="onesignal_app_id"><?php echo e(__('Mail Encryption')); ?></label>
                                            <input type="text" required value="<?php echo e($notification_setting->mail_encryption); ?>"  name="mail_encryption" class="form-control" style="text-transform: none;">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="onesignal_app_id"><?php echo e(__('Mail From address')); ?></label>
                                            <input type="text" required value="<?php echo e($notification_setting->mail_from_address); ?>"  name="mail_from_address" class="form-control" style="text-transform: none;">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="onesignal_app_id"><?php echo e(__('Mail port')); ?></label>
                                            <input type="text" required value="<?php echo e($notification_setting->mail_port); ?>"  name="mail_port" class="form-control" style="text-transform: none;">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <input type="submit" value="<?php echo e(__('Update')); ?>" class="btn btn-primary float-right">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app',['activePage' => 'setting'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/api.gobistro.in/public_html/resources/views/admin/setting/notification_setting.blade.php ENDPATH**/ ?>