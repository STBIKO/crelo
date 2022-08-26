<?php $__env->startSection('title', translate('messages.reCaptcha Setup')); ?>

<?php $__env->startPush('css_or_js'); ?>
<style>
    .flex-between {
        display: flex;
        justify-content: space-between;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-sm-0">
                    <h1 class="page-header-title"><?php echo e(translate('messages.reCaptcha')); ?> <?php echo e(translate('messages.credentials')); ?> <?php echo e(translate('messages.setup')); ?></h1>
                </div>
            </div>
        </div>
        <!-- End Page Header -->

        <div class="row" style="padding-bottom: 20px">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body" style="padding: 20px">
                        <div class="flex-between">
                            <h3><?php echo e(translate('messages.google')); ?> <?php echo e(translate('messages.reCaptcha')); ?></h3>
                            <div class="btn-sm btn-dark p-2" data-toggle="modal" data-target="#recaptcha-modal"
                                 style="cursor: pointer">
                                <i class="tio-info-outined"></i> <?php echo e(translate('messages.Credentials SetUp')); ?>

                            </div>
                        </div>
                        <div class="mt-4">
                            <?php ($config=\App\CentralLogics\Helpers::get_business_settings('recaptcha')); ?>
                            <form
                                action="<?php echo e(env('APP_MODE')!='demo'?route('admin.business-settings.recaptcha_update',['recaptcha']):'javascript:'); ?>"
                                method="post">
                                <?php echo csrf_field(); ?>

                                <div class="form-group mb-2 mt-2">
                                    <input type="radio" name="status"
                                           value="1" <?php echo e(isset($config) && $config['status']==1?'checked':''); ?>>
                                    <label style="padding-left: 10px"><?php echo e(translate('messages.active')); ?></label>
                                    <br>
                                </div>
                                <div class="form-group mb-2">
                                    <input type="radio" name="status"
                                           value="0" <?php echo e(isset($config) && $config['status']==0?'checked':''); ?>>
                                    <label
                                        style="padding-left: 10px"><?php echo e(translate('messages.inactive')); ?> </label>
                                    <br>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="text-capitalize"
                                           style="padding-left: 10px"><?php echo e(translate('messages.Site Key')); ?></label><br>
                                    <input type="text" class="form-control" name="site_key"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['site_key']??"":''); ?>">
                                </div>

                                <div class="form-group mb-2">
                                    <label class="text-capitalize"
                                           style="padding-left: 10px"><?php echo e(translate('messages.Secret Key')); ?></label><br>
                                    <input type="text" class="form-control" name="secret_key"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['secret_key']??"":''); ?>">
                                </div>

                                <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                                        onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>"
                                        class="btn btn-primary mb-2"><?php echo e(translate('messages.save')); ?></button>
                            </form>
                            
                            <div class="modal fade" id="recaptcha-modal" data-backdrop="static" data-keyboard="false"
                                 tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content"
                                         style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                                        <div class="modal-header">
                                            <h5 class="modal-title"
                                                id="staticBackdropLabel"><?php echo e(translate('messages.reCaptcha credential Set up Instructions')); ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <ol>
                                                <li><?php echo e(translate('messages.Go to the Credentials page')); ?>

                                                    (<?php echo e(translate('messages.Click')); ?> <a
                                                        href="https://www.google.com/recaptcha/admin/create"
                                                        target="_blank"><?php echo e(translate('messages.here')); ?></a>)
                                                </li>
                                                <li><?php echo e(translate('messages.Add a ')); ?>

                                                    <b><?php echo e(translate('messages.label')); ?></b> <?php echo e(translate('messages.(Ex: Test Label)')); ?>

                                                </li>
                                                <li>
                                                    <?php echo e(translate('messages.Select reCAPTCHA v2 as ')); ?>

                                                    <b><?php echo e(translate('messages.reCAPTCHA Type')); ?></b>
                                                    (<?php echo e(translate("Sub type: I'm not a robot Checkbox")); ?>

                                                    )
                                                </li>
                                                <li>
                                                    <?php echo e(translate('messages.Add')); ?>

                                                    <b><?php echo e(translate('messages.domain')); ?></b>
                                                    <?php echo e(translate('messages.(For ex: demo.6amtech.com)')); ?>

                                                </li>
                                                <li>
                                                    <?php echo e(translate('messages.Check in ')); ?>

                                                    <b><?php echo e(translate('messages.Accept the reCAPTCHA Terms of Service')); ?></b>
                                                </li>
                                                <li>
                                                    <?php echo e(translate('messages.Press')); ?>

                                                    <b><?php echo e(translate('messages.Submit')); ?></b>
                                                </li>
                                                <li><?php echo e(translate('messages.Copy')); ?> <b>Site
                                                        Key</b> <?php echo e(translate('messages.and')); ?> <b>Secret
                                                        Key</b>, <?php echo e(translate('messages.paste in the input filed below and')); ?>

                                                    <b>Save</b>.
                                                </li>
                                            </ol>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary"
                                                    data-dismiss="modal"><?php echo e(translate('messages.Close')); ?></button>
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
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crelocok/public_html/resources/views/admin-views/business-settings/recaptcha-index.blade.php ENDPATH**/ ?>