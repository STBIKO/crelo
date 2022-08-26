<?php $__env->startSection('title', translate('messages.landing_page_settings')); ?>
<?php $__env->startPush('css_or_js'); ?>
    <!-- Custom styles for this page -->
    <link href="<?php echo e(asset('public/assets/admin/css/croppie.css')); ?>" rel="stylesheet">
    <style>
        .flex-item {
            padding: 10px;
            flex: 20%;
        }

        /* Responsive layout - makes a one column-layout instead of a two-column layout */
        @media (max-width: 768px) {
            .flex-item {
                flex: 50%;
            }
        }

        @media (max-width: 480px) {
            .flex-item {
                flex: 100%;
            }
        }

    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(translate('messages.dashboard')); ?></a>
                </li>
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
                        <a class="nav-link"
                            href="<?php echo e(route('admin.business-settings.landing-page-settings', 'links')); ?>"
                            aria-disabled="true"><?php echo e(translate('messages.button_links')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link "
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
                        <a class="nav-link active"
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
                <form action="<?php echo e(route('admin.business-settings.landing-page-settings', 'background-change')); ?>"
                    method="POST">
                    <?php ($backgroundChange = \App\Models\BusinessSetting::where(['key' => 'backgroundChange'])->first()); ?>
                    <?php ($backgroundChange = isset($backgroundChange->value) ? json_decode($backgroundChange->value, true) : null); ?>
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-2">
                            <label class="form-label"><?php echo e(translate('messages.change_header_bg')); ?></label>
                        </div>
                        <div class="col-2">
                            <input name="header-bg" type="color" class="form-control form-control-color" value="<?php echo e(isset($backgroundChange['header-bg']) ? $backgroundChange['header-bg'] : '#EF7822'); ?>">
                        </div>
                        <div class="col-2">
                            <label class="form-label"><?php echo e(translate('messages.change_footer_bg')); ?></label>
                        </div>
                        <div class="col-2">
                            <input name="footer-bg" type="color" class="form-control form-control-color" value="<?php echo e(isset($backgroundChange['footer-bg']) ? $backgroundChange['footer-bg'] :'#333E4F'); ?>">
                        </div>
                        <div class="col-2">
                            <label class="form-label"><?php echo e(translate('messages.landing_page_bg')); ?></label>
                        </div>
                        <div class="col-2">
                            <input name="landing-page-bg" type="color" class="form-control form-control-color"
                                value="<?php echo e(isset($backgroundChange['landing-page-bg']) ? $backgroundChange['landing-page-bg'] : '#ffffff'); ?>">

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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crelocok/public_html/resources/views/admin-views/business-settings/landing-page-settings/backgroundChange.blade.php ENDPATH**/ ?>