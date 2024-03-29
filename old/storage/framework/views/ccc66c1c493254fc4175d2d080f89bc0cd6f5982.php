<?php $__env->startSection('title',translate('messages.landing_page_image_settings')); ?>

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
                    <a class="nav-link"
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
                    <a class="nav-link active"
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
            <?php ($landing_page_images = \App\Models\BusinessSetting::where(['key'=>'landing_page_images'])->first()); ?>
            <?php ($landing_page_images = isset($landing_page_images->value)?json_decode($landing_page_images->value, true):null); ?>

            <form action="<?php echo e(route('admin.business-settings.landing-page-settings', 'image')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label class="input-label" ><?php echo e(translate('messages.top_content_image')); ?><small style="color: red">* ( <?php echo e(translate('messages.size')); ?>: 772 X 899 px )</small></label>
                    <div class="custom-file">
                        <input type="file" name="top_content_image" id="customFileEg1" class="custom-file-input"
                                accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" >
                        <label class="custom-file-label" for="customFileEg1"><?php echo e(translate('messages.choose')); ?> <?php echo e(translate('messages.file')); ?></label>
                    </div>

                    <center id="image-viewer-section" class="pt-2">
                        <img style="height: 200px;border: 1px solid; border-radius: 10px;" id="viewer"
                                src="<?php echo e(asset('public/assets/landing')); ?>/image/<?php echo e(isset($landing_page_images['top_content_image'])?$landing_page_images['top_content_image']:'double_screen_image.png'); ?>"
                                onerror="this.src='<?php echo e(asset('public/assets/admin/img/400x400/img2.jpg')); ?>'"
                                alt=""/>
                    </center>
                </div>
                <div class="form-group text-center">
                    <input type="submit" class="btn btn-success" value="<?php echo e(translate('messages.upload')); ?>">
                </div>
            </form>
            <form action="<?php echo e(route('admin.business-settings.landing-page-settings', 'image')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label class="input-label" ><?php echo e(translate('messages.about_us_image')); ?><small style="color: red">* ( <?php echo e(translate('messages.size')); ?>: 1241 X 1755 px )</small></label>
                    <div class="custom-file">
                        <input type="file" name="about_us_image" id="customFileEg2" class="custom-file-input"
                                accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" >
                        <label class="custom-file-label" for="customFileEg2"><?php echo e(translate('messages.choose')); ?> <?php echo e(translate('messages.file')); ?></label>
                    </div>

                    <center id="image-viewer-section2" class="pt-2">
                        <img style="height: 200px;border: 1px solid; border-radius: 10px;" id="viewer2"
                                src="<?php echo e(asset('public/assets/landing')); ?>/image/<?php echo e(isset($landing_page_images['about_us_image'])?$landing_page_images['about_us_image']:'about_us_image.png'); ?>"
                                onerror="this.src='<?php echo e(asset('public/assets/admin/img/400x400/img2.jpg')); ?>'"
                                alt=""/>
                    </center>
                </div>
                <div class="form-group text-center">
                    <input type="submit" class="btn btn-success" value="<?php echo e(translate('messages.upload')); ?>">
                </div>
            </form>
            <form action="<?php echo e(route('admin.business-settings.landing-page-settings', 'image')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label class="input-label" ><?php echo e(translate('messages.feature_section_image')); ?><small style="color: red">* ( <?php echo e(translate('messages.size')); ?>: 1241 X 1755 px )</small></label>
                    <div class="custom-file">
                        <input type="file" name="feature_section_image" id="customFileEg3" class="custom-file-input"
                                accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" >
                        <label class="custom-file-label" for="customFileEg3"><?php echo e(translate('messages.choose')); ?> <?php echo e(translate('messages.file')); ?></label>
                    </div>

                    <center id="image-viewer-section3" class="pt-2">
                        <img style="height: 200px;border: 1px solid; border-radius: 10px;" id="viewer3"
                                src="<?php echo e(asset('public/assets/landing')); ?>/image/<?php echo e(isset($landing_page_images['feature_section_image'])?$landing_page_images['feature_section_image']:'feature_section_image.png'); ?>"
                                onerror="this.src='<?php echo e(asset('public/assets/admin/img/400x400/img2.jpg')); ?>'"
                                alt=""/>
                    </center>
                </div>
                <div class="form-group text-center">
                    <input type="submit" class="btn btn-success" value="<?php echo e(translate('messages.upload')); ?>">
                </div>
            </form>
            <form action="<?php echo e(route('admin.business-settings.landing-page-settings', 'image')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label class="input-label" ><?php echo e(translate('messages.mobile_app_section_image')); ?><small style="color: red">* ( <?php echo e(translate('messages.size')); ?>: 1241 X 1755 px )</small></label>
                    <div class="custom-file">
                        <input type="file" name="mobile_app_section_image" id="customFileEg4" class="custom-file-input"
                                accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" >
                        <label class="custom-file-label" for="customFileEg4"><?php echo e(translate('messages.choose')); ?> <?php echo e(translate('messages.file')); ?></label>
                    </div>

                    <center id="image-viewer-section4" class="pt-2">
                        <img style="height: 200px;border: 1px solid; border-radius: 10px;" id="viewer4"
                                src="<?php echo e(asset('public/assets/landing')); ?>/image/<?php echo e(isset($landing_page_images['mobile_app_section_image'])?$landing_page_images['mobile_app_section_image']:'our_app_image.png.png'); ?>"
                                onerror="this.src='<?php echo e(asset('public/assets/admin/img/400x400/img2.jpg')); ?>'"
                                alt=""/>
                    </center>
                </div>

                <div class="form-group text-center">
                    <input type="submit" class="btn btn-success" value="<?php echo e(translate('messages.upload')); ?>">
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>
    <script>
        function readURL(input, viewer) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#'+viewer).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#customFileEg1").change(function () {
            readURL(this, 'viewer');
            $('#image-viewer-section').show(1000);
        });


        $("#customFileEg2").change(function () {
            readURL(this ,'viewer2');
            $('#image-viewer-section2').show(1000);
        });

        $("#customFileEg3").change(function () {
            readURL(this ,'viewer3');
            $('#image-viewer-section3').show(1000);
        });

        $("#customFileEg4").change(function () {
            readURL(this ,'viewer4');
            $('#image-viewer-section4').show(1000);
        });

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crelocok/public_html/resources/views/admin-views/business-settings/landing-page-settings/image.blade.php ENDPATH**/ ?>