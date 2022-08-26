<?php $__env->startSection('title',translate('messages.app_settings')); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title text-capitalize"><?php echo e(translate('messages.app_settings')); ?></h1>
                </div>
            </div>
        </div>
        <!-- End Page Header -->

        <?php ($app_minimum_version_android=\App\Models\BusinessSetting::where(['key'=>'app_minimum_version_android'])->first()); ?>
        <?php ($app_minimum_version_android=$app_minimum_version_android?$app_minimum_version_android->value:null); ?>

        <?php ($app_url_android=\App\Models\BusinessSetting::where(['key'=>'app_url_android'])->first()); ?>
        <?php ($app_url_android=$app_url_android?$app_url_android->value:null); ?>

        <?php ($app_minimum_version_ios=\App\Models\BusinessSetting::where(['key'=>'app_minimum_version_ios'])->first()); ?>
        <?php ($app_minimum_version_ios=$app_minimum_version_ios?$app_minimum_version_ios->value:null); ?>

        <?php ($app_url_ios=\App\Models\BusinessSetting::where(['key'=>'app_url_ios'])->first()); ?>
        <?php ($app_url_ios=$app_url_ios?$app_url_ios->value:null); ?>
        <div class="card">
            <div class="card-body">
                <div class="row gx-2 gx-lg-3">
                    <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                        <form action="<?php echo e(route('admin.business-settings.app-settings')); ?>" method="post"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label  class="input-label d-inline text-capitalize"><?php echo e(translate('messages.app_minimum_version')); ?> (<?php echo e(translate('messages.android')); ?>)</label>
                                        <input type="number" placeholder="<?php echo e(translate('messages.app_minimum_version')); ?>" class="form-control" name="app_minimum_version_android"
                                            value="<?php echo e(env('APP_MODE')!='demo'?$app_minimum_version_android??'':''); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="input-label d-inline text-capitalize"><?php echo e(translate('messages.app_url')); ?> (<?php echo e(translate('messages.android')); ?>)</label>
                                        <input type="text" placeholder="<?php echo e(translate('messages.app_url')); ?>" class="form-control" name="app_url_android"
                                            value="<?php echo e(env('APP_MODE')!='demo'?$app_url_android??'':''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label  class="input-label d-inline text-capitalize"><?php echo e(translate('messages.app_minimum_version')); ?> (<?php echo e(translate('messages.ios')); ?>)</label>
                                        <input type="number" placeholder="<?php echo e(translate('messages.app_minimum_version')); ?>" class="form-control" name="app_minimum_version_ios"
                                            value="<?php echo e(env('APP_MODE')!='demo'?$app_minimum_version_ios??'':''); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="input-label d-inline text-capitalize"><?php echo e(translate('messages.app_url')); ?> (<?php echo e(translate('messages.ios')); ?>)</label>
                                        <input type="text" placeholder="<?php echo e(translate('messages.app_url')); ?>" class="form-control" name="app_url_ios"
                                            value="<?php echo e(env('APP_MODE')!='demo'?$app_url_ios??'':''); ?>">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>" onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>" class="btn btn-primary mb-2"><?php echo e(translate('messages.submit')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crelocok/public_html/resources/views/admin-views/business-settings/app-settings.blade.php ENDPATH**/ ?>