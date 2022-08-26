<?php $__env->startSection('title', translate('messages.third_party_apis')); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title"><?php echo e(translate('messages.third_party_apis')); ?></h1>
                    <span class="badge badge-soft-dark"><?php echo e(translate('messages.map_api_hint')); ?></span><br>
                    <span class="badge badge-soft-dark"><?php echo e(translate('messages.map_api_hint_2')); ?></span><br>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="row gx-2 gx-lg-3">
        <?php ($map_api_key=\App\Models\BusinessSetting::where(['key'=>'map_api_key'])->first()); ?>
        <?php ($map_api_key=$map_api_key?$map_api_key->value:null); ?>

        <?php ($map_api_key_server=\App\Models\BusinessSetting::where(['key'=>'map_api_key_server'])->first()); ?>
        <?php ($map_api_key_server=$map_api_key_server?$map_api_key_server->value:null); ?>
        
            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                <form action="<?php echo e(env('APP_MODE')!='demo'?route('admin.business-settings.config-update'):'javascript:'); ?>" method="post"
                      enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label class="input-label" style="padding-left: 10px"><?php echo e(translate('messages.map_api_key')); ?> (<?php echo e(translate('messages.client')); ?>)</label>
                                <input type="text" placeholder="<?php echo e(translate('messages.map_api_key')); ?> (<?php echo e(translate('messages.client')); ?>)" class="form-control" name="map_api_key"
                                    value="<?php echo e(env('APP_MODE')!='demo'?$map_api_key??'':''); ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label class="input-label" style="padding-left: 10px"><?php echo e(translate('messages.map_api_key')); ?> (<?php echo e(translate('messages.server')); ?>)</label>
                                <input type="text" placeholder="<?php echo e(translate('messages.map_api_key')); ?> (<?php echo e(translate('messages.server')); ?>)" class="form-control" name="map_api_key_server"
                                    value="<?php echo e(env('APP_MODE')!='demo'?$map_api_key_server??'':''); ?>" required>
                            </div>
                        </div>
                    </div>

                    <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>" onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>" class="btn btn-primary mb-2"><?php echo e(translate('messages.save')); ?></button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crelocok/public_html/resources/views/admin-views/business-settings/config.blade.php ENDPATH**/ ?>