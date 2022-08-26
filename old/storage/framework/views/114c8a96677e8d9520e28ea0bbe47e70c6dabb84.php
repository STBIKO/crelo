<?php $__env->startSection('title',translate('messages.landing_page_settings')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <!-- Custom styles for this page -->
    <link href="<?php echo e(asset('public/assets/admin/css/croppie.css')); ?>" rel="stylesheet">
    <style>
        .flex-item{
            padding: 10px;
            flex: 20%;
        }

        /* Responsive layout - makes a one column-layout instead of a two-column layout */
        @media (max-width: 768px) {
            .flex-item{
                flex: 50%;
            }
        }

        @media (max-width: 480px) {
            .flex-item{
                flex: 100%;
            }
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="content container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(translate('messages.dashboard')); ?></a></li>
            <li class="breadcrumb-item" aria-current="page"><?php echo e(translate('messages.landing_page_settings')); ?></li>
        </ol>
    </nav>

    <!-- Page Header -->
    <div class="page-header">
        <h1 class="page-header-title"><?php echo e(translate('messages.landing_page_settings')); ?></h1>
        <!-- Nav Scroller -->
        <div class="js-nav-scroller hs-nav-scroller-horizontal">
            <!-- Nav -->
            <ul class="nav nav-tabs page-header-tabs">
                <li class="nav-item">
                    <a class="nav-link"
                        href="<?php echo e(route('admin.business-settings.landing-page-settings', 'index')); ?>"><?php echo e(translate('messages.text')); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active"
                        href="<?php echo e(route('admin.business-settings.landing-page-settings', 'links')); ?>"
                        aria-disabled="true"><?php echo e(translate('messages.button_links')); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                        href="<?php echo e(route('admin.business-settings.landing-page-settings', 'speciality')); ?>"
                        aria-disabled="true"><?php echo e(translate('messages.speciality')); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                        href="<?php echo e(route('admin.business-settings.landing-page-settings', 'testimonial')); ?>"
                        aria-disabled="true"><?php echo e(translate('messages.testimonial')); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                        href="<?php echo e(route('admin.business-settings.landing-page-settings', 'feature')); ?>"
                        aria-disabled="true"><?php echo e(translate('messages.feature')); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                        href="<?php echo e(route('admin.business-settings.landing-page-settings', 'image')); ?>"
                        aria-disabled="true"><?php echo e(translate('messages.image')); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                        href="<?php echo e(route('admin.business-settings.landing-page-settings', 'background-change')); ?>"
                        aria-disabled="true"><?php echo e(translate('messages.background_color')); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                        href="<?php echo e(route('admin.business-settings.landing-page-settings', 'web-app')); ?>"
                        aria-disabled="true"><?php echo e(translate('messages.web_app')); ?></a>
                </li>
            </ul>
            <!-- End Nav -->
        </div>
        <!-- End Nav Scroller -->
    </div>
        <!-- End Page Header -->
    <!-- Page Heading -->

    <div class="card my-2">
        <div class="card-body">
            <form action="<?php echo e(route('admin.business-settings.landing-page-settings', 'links')); ?>" method="POST">
                <?php ($landing_page_links = \App\Models\BusinessSetting::where(['key'=>'landing_page_links'])->first()); ?>
                <?php ($landing_page_links = isset($landing_page_links->value)?json_decode($landing_page_links->value, true):null); ?>

                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group p-2 border">
                            <label class="d-flex justify-content-between switch toggle-switch-sm text-dark" for="app_url_android_status">
                                <span><?php echo e(translate('messages.app_url')); ?> (<?php echo e(translate('messages.play_store')); ?>) <span class="input-label-secondary" title=""><img src="<?php echo e(asset('/public/assets/admin/img/info-circle.svg')); ?>" alt=""></span></span>
                                <input type="checkbox" class="toggle-switch-input" name="app_url_android_status" id="app_url_android_status" value="1" <?php echo e((isset($landing_page_links) && $landing_page_links['app_url_android_status'])?'checked':''); ?>>
                                <span class="toggle-switch-label">
                                    <span class="toggle-switch-indicator"></span>
                                </span>
                            </label>
                            <input type="text" id="app_url_android"  name="app_url_android" class="form-control" value="<?php echo e(isset($landing_page_links)?$landing_page_links['app_url_android']:''); ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group p-2 border">
                            <label class="d-flex justify-content-between switch toggle-switch-sm text-dark" for="app_url_ios_status">
                                <span><?php echo e(translate('messages.app_url')); ?> (<?php echo e(translate('messages.app_store')); ?>) <span class="input-label-secondary" title=""><img src="<?php echo e(asset('/public/assets/admin/img/info-circle.svg')); ?>" alt=""></span></span>
                                <input type="checkbox" class="toggle-switch-input" name="app_url_ios_status" id="app_url_ios_status" value="1" <?php echo e((isset($landing_page_links) && $landing_page_links['app_url_ios_status'])?'checked':''); ?>>
                                <span class="toggle-switch-label">
                                    <span class="toggle-switch-indicator"></span>
                                </span>
                            </label>
                            <input type="text" id="app_url_ios" name="app_url_ios" class="form-control" value="<?php echo e(isset($landing_page_links)?$landing_page_links['app_url_ios']:''); ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group p-2 border">
                            <label class="d-flex justify-content-between switch toggle-switch-sm text-dark" for="web_app_url_status">
                                <span><?php echo e(translate('messages.web_app_url')); ?> <span class="input-label-secondary" title=""><img src="<?php echo e(asset('/public/assets/admin/img/info-circle.svg')); ?>" alt=""></span></span>
                                <input type="checkbox" class="toggle-switch-input" name="web_app_url_status" id="web_app_url_status" value="1" <?php echo e((isset($landing_page_links) && $landing_page_links['web_app_url_status'])?'checked':''); ?>>
                                <span class="toggle-switch-label">
                                    <span class="toggle-switch-indicator"></span>
                                </span>
                            </label>
                            <input type="text" id="web_app_url" name="web_app_url" class="form-control" value="<?php echo e(isset($landing_page_links)?$landing_page_links['web_app_url']:''); ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="<?php echo e(translate('messages.submit')); ?>">
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>
    <script>
        $(document).on('ready', function () {
            // $("#app_url_android_status").on('change', function(){
            //     if($("#app_url_android_status").is(':checked')){
            //         $('#app_url_android').removeAttr('readonly');
            //     } else {
            //         $('#app_url_android').attr('readonly', true);
            //     }
            // });
            // $("#app_url_ios_status").on('change', function(){
            //     if($("#app_url_ios_status").is(':checked')){
            //         $('#app_url_ios').removeAttr('readonly');
            //     } else {
            //         $('#app_url_ios').attr('readonly', true);
            //     }
            // });
            // $("#web_app_url_status").on('change', function(){
            //     if($("#web_app_url_status").is(':checked')){
            //         $('#web_app_url').removeAttr('readonly');
            //     } else {
            //         $('#web_app_url').attr('readonly', true);
            //     }
            // });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crelocok/public_html/resources/views/admin-views/business-settings/landing-page-settings/links.blade.php ENDPATH**/ ?>