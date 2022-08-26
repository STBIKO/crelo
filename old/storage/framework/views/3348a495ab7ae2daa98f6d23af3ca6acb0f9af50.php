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
                    <a class="nav-link active"
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
            <form action="<?php echo e(route('admin.business-settings.landing-page-settings', 'testimonial')); ?>" method="POST" enctype="multipart/form-data">
                <?php ($testimonial = \App\Models\BusinessSetting::where(['key'=>'testimonial'])->first()); ?>
                <?php ($testimonial = isset($testimonial->value)?json_decode($testimonial->value, true):null); ?>

                <?php echo csrf_field(); ?>

                <div class="form-group">
                    <label class="input-label" for="reviewer_name"><?php echo e(translate('messages.reviewer')); ?></label>
                    <input type="text" placeholder="<?php echo e(translate('messages.reviewer_name')); ?>" id="reviewer_name"  name="reviewer_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="input-label" for="reviewer_designation"><?php echo e(translate('messages.designation')); ?></label>
                    <input type="text" placeholder="<?php echo e(translate('messages.reviewer_designation')); ?>" id="reviewer_designation"  name="reviewer_designation" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="input-label" for="review"><?php echo e(translate('messages.review')); ?></label>
                    <textarea type="text" id="review" placeholder="<?php echo e(translate('messages.review')); ?>"  name="review" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label class="input-label" ><?php echo e(translate('messages.image')); ?><small style="color: red">* ( <?php echo e(translate('messages.size')); ?>: 140 X 140 px )</small></label>
                    <div class="custom-file">
                        <input type="file" name="image" id="customFileEg1" class="custom-file-input"
                                accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" required>
                        <label class="custom-file-label" for="customFileEg1"><?php echo e(translate('messages.choose')); ?> <?php echo e(translate('messages.file')); ?></label>
                    </div>

                    <center style="display: none" id="image-viewer-section" class="pt-2">
                        <img style="height: 200px;border: 1px solid; border-radius: 10px;" id="viewer"
                                src="<?php echo e(asset('public/assets/admin/img/400x400/img2.jpg')); ?>" alt=""/>
                    </center>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="<?php echo e(translate('messages.submit')); ?>">
                </div>
            </form>
            <div class="col-12">
                <table class="table table-borderless table-thead-bordered table-align-middle card-table">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 10%">#</th>
                            <th scope="col" style="width: 25%"><?php echo e(translate('messages.reviewer')); ?></th>
                            <th scope="col" style="width: 15%"><?php echo e(translate('messages.designation')); ?></th>
                            <th scope="col" style="width: 40%"><?php echo e(translate('messages.review')); ?></th>
                            <th scope="col" style="width: 10%"><?php echo e(translate('messages.action')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($testimonial): ?>
                        <?php $__currentLoopData = $testimonial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$sp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td scope="row"><?php echo e($key + 1); ?></td>
                                <td>
                                    <div class="media align-items-center">
                                        <img class="avatar avatar-lg mr-3" src="<?php echo e(asset('public/assets/landing/image')); ?>/<?php echo e($sp['img']); ?>"
                                                onerror="this.src='<?php echo e(asset('public/assets/admin/img/160x160/img2.jpg')); ?>'" alt="<?php echo e($sp['name']); ?>">
                                        <div class="media-body">
                                            <h5 class="text-hover-primary mb-0"><?php echo e($sp['name']); ?></h5>
                                        </div>
                                    </div>
                                </td>
                                <td><?php echo e($sp['position']); ?></td>
                                <td style="max-width:150px;">
                                    <p class="text-justify w-100"><?php echo e($sp['detail']); ?></p>
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-white" href="javascript:"
                                        onclick="form_alert('sp-<?php echo e($key); ?>','<?php echo e(translate('messages.Want_to_delete_this_item')); ?>')" title="<?php echo e(translate('messages.delete')); ?>"><i class="tio-delete-outlined"></i>
                                    </a>
                                    <form action="<?php echo e(route('admin.business-settings.landing-page-settings-delete',['tab'=>'testimonial', 'key'=>$key])); ?>"
                                            method="post" id="sp-<?php echo e($key); ?>">
                                        <?php echo csrf_field(); ?> <?php echo method_field('delete'); ?>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#viewer').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#customFileEg1").change(function () {
            readURL(this);
            $('#image-viewer-section').show(1000);
        });

        $(document).on('ready', function () {

        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crelocok/public_html/resources/views/admin-views/business-settings/landing-page-settings/testimonial.blade.php ENDPATH**/ ?>