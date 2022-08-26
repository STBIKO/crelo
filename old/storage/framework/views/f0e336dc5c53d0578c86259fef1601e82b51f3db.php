<?php $__env->startSection('title',translate('messages.modules')); ?>

<?php $__env->startPush('css_or_js'); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/assets/admin/css/radio-image.css')); ?>">

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-sm mb-2 mb-sm-0">
                <h1 class="page-header-title"><?php echo e(translate('messages.module')); ?></h1>
            </div>
        </div>
    </div>
    <!-- End Page Header -->

    <div class="card">
        <div class="card-header">
            <h5><?php echo e(translate('messages.add').' '.translate('messages.new')); ?> <?php echo e(translate('messages.module')); ?></h5>
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('admin.module.store')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php ($language=\App\Models\BusinessSetting::where('key','language')->first()); ?>
                <?php ($language = $language->value ?? null); ?>
                <?php ($default_lang = 'en'); ?>
                <?php if($language): ?>
                <?php ($default_lang = json_decode($language)[0]); ?>
                <ul class="nav nav-tabs mb-4">
                    <?php $__currentLoopData = json_decode($language); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="nav-item">
                        <a class="nav-link lang_link <?php echo e($lang == $default_lang? 'active':''); ?>" href="#" id="<?php echo e($lang); ?>-link"><?php echo e(\App\CentralLogics\Helpers::get_language_name($lang).'('.strtoupper($lang).')'); ?></a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <?php endif; ?>
                <?php if($language): ?>
                <?php $__currentLoopData = json_decode($language); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card card-body <?php echo e($lang != $default_lang ? 'd-none':''); ?> lang_form p-1 mb-2" id="<?php echo e($lang); ?>-form">
                    <div class="form-group">
                        <label class="input-label text-capitalize" for="exampleFormControlInput1"><?php echo e(translate('messages.module')); ?> <?php echo e(translate('messages.name')); ?> (<?php echo e(strtoupper($lang)); ?>)</label>
                        <input type="text" name="module_name[]" class="form-control" maxlength="191" <?php echo e($lang == $default_lang? 'required':''); ?> oninvalid="document.getElementById('en-link').click()">
                    </div>
                    <div class="form-group">
                        <label class="input-label" for="module_type"><?php echo e(translate('messages.description')); ?> (<?php echo e(strtoupper($lang)); ?>)</label>
                        <textarea class="ckeditor form-control" name="description[]"></textarea>
                    </div>                
                </div>

                <input type="hidden" name="lang[]" value="<?php echo e($lang); ?>">
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                <div class="form-group">
                    <label class="input-label" for="exampleFormControlInput1"><?php echo e(translate('messages.module')); ?> <?php echo e(translate('messages.name')); ?></label>
                    <input type="text" name="module_name" class="form-control" placeholder="<?php echo e(translate('messages.new_category')); ?>" value="<?php echo e(old('name')); ?>" required maxlength="191">
                </div>
                <div class="form-group">
                    <label class="input-label" for="module_type"><?php echo e(translate('messages.description')); ?></label>
                    <textarea class="ckeditor form-control" name="description"></textarea>
                </div>
                <input type="hidden" name="lang[]" value="<?php echo e($lang); ?>">
                <?php endif; ?>
                <!-- <div class="form-group">
                        <label class="input-label" for="exampleFormControlInput1"><?php echo e(translate('messages.name')); ?></label>
                        <input type="text" name="name" value="<?php echo e(isset($module)?$module['name']:''); ?>" class="form-control" placeholder="New Category" required>
                    </div> -->
                <div class="row mt-2">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="input-label" for="module_type"><?php echo e(translate('messages.module_type')); ?></label>
                            <select name="module_type" id="module_type" class="form-control text-capitalize" onchange="modulChange(this.value)">
                                <option disabled selected><?php echo e(translate('messages.select')); ?> <?php echo e(translate('messages.module_type')); ?></option>
                                <?php $__currentLoopData = config('module.module_type'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option class="" value="<?php echo e($key); ?>"><?php echo e($key); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <small class="text-danger"><?php echo e(translate('messages.module_type_change_warning')); ?></small>
                            <div class="card mt-1" id="module_des_card" style="display: none;">
                                <div class="card-body" id="module_description"></div>
                            </div>
                        </div>                        
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group" id="zone_check">
                            <label class="input-label"><?php echo e(translate('Store can serve in')); ?> <small style="color: red"><span class="input-label-secondary"
                                        title="<?php echo e(translate('messages.module_all_zone_hint')); ?>">
                                        <img src="<?php echo e(asset('/public/assets/admin/img/info-circle.svg')); ?>"
                                            alt="<?php echo e(translate('messages.module_all_zone_hint')); ?>" style="height: 10px; width: 10px;">
                                </span> *</small></label>
                            <div class="input-group input-group-md-down-break">
                                <!-- Custom Radio -->
                                <div class="form-control">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" value="1"
                                            name="customer_verification" id="all_zone_service1">
                                        <label class="custom-control-label" for="all_zone_service1"><?php echo e(translate('messages.All Zones')); ?></label>
                                    </div>
                                </div>
                                <!-- End Custom Radio -->

                                <!-- Custom Radio -->
                                <div class="form-control">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" value="0"
                                            name="customer_verification" id="all_zone_service2" >
                                        <label class="custom-control-label"
                                            for="all_zone_service2"><?php echo e(translate('One Zone')); ?></label>
                                    </div>
                                </div>
                                <!-- End Custom Radio -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group" id="module_theme">
                    <label class="input-label" for="module_type"><?php echo e(translate('messages.select_theme')); ?></label>
                    <div class="row">
                        <div class='col-md-3 col-sm-6 col-12 text-center'>
                            <input type="radio" name="theme" require id="img1" class="d-none imgbgchk" value="1">
                            <label for="img1">
                                <img class="img-thumbnail rounded" src="<?php echo e(asset('public/assets/admin/img/Theme-1.png')); ?>" alt="Image 1">
                            </label>
                        </div>
                        <div class='col-md-3 col-sm-6 col-12 text-center'>
                            <input type="radio" name="theme" require id="img2" class="d-none imgbgchk" value="2">
                            <label for="img2">
                                <img class="img-thumbnail rounded" src="<?php echo e(asset('public/assets/admin/img/Theme-2.png')); ?>" alt="Image 2">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><?php echo e(translate('messages.icon')); ?></label><small style="color: red">* ( <?php echo e(translate('messages.ratio')); ?> 1:1)</small>
                            <div class="custom-file">
                                <input type="file" name="icon" id="customFileEg1" class="custom-file-input" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" required>
                                <label class="custom-file-label" for="customFileEg1"><?php echo e(translate('messages.choose')); ?> <?php echo e(translate('messages.file')); ?></label>
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom:0%;">
                            <center>
                                <img style="width: 150px; height:150px; border: 1px solid; border-radius: 10px;" id="viewer" src="<?php echo e(asset('public/assets/admin/img/400x400/img2.jpg')); ?>" alt="image" />
                            </center>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><?php echo e(translate('messages.thumbnail')); ?></label><small style="color: red">* ( <?php echo e(translate('messages.ratio')); ?> 1:1)</small>
                            <div class="custom-file">
                                <input type="file" name="thumbnail" id="customFileEg2" class="custom-file-input" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" required>
                                <label class="custom-file-label" for="customFileEg2"><?php echo e(translate('messages.choose')); ?> <?php echo e(translate('messages.file')); ?></label>
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom:0%;">
                            <center>
                                <img style="width: 200px; height:200px; border: 1px solid; border-radius: 10px;" id="viewer2" src="<?php echo e(asset('public/assets/admin/img/400x400/img2.jpg')); ?>" alt="image" />
                            </center>
                        </div>
                    </div>
                </div>

                <div class="form-group pt-2">
                    <button type="submit" class="btn btn-primary"><?php echo e(translate('messages.add')); ?></button>
                </div>

            </form>
        </div>
    </div>

</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>
<script>
    function modulChange(id) {
        $.get({
            url: "<?php echo e(url('/')); ?>/admin/module/type/?module_type=" + id,
            dataType: 'json',
            success: function(data) {
                if(data.data.description.length)
                {
                    $('#module_des_card').show();
                    $('#module_description').html(data.data.description);                    
                }
                else
                {
                    $('#module_des_card').hide();
                }
                if(id=='parcel')
                {
                    $('#module_theme').hide();
                    $('#zone_check').hide();
                }
                else{
                    $('#module_theme').show();
                    $('#zone_check').show();
                }
            },
        });
    }

    function readURL(input, id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#' + id).attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#customFileEg1").change(function() {
        readURL(this, 'viewer');
    });
    
    $("#customFileEg2").change(function() {
        readURL(this, 'viewer2');
    });
</script>
<script>
    $(".lang_link").click(function(e) {
        e.preventDefault();
        $(".lang_link").removeClass('active');
        $(".lang_form").addClass('d-none');
        $(this).addClass('active');

        let form_id = this.id;
        let lang = form_id.substring(0, form_id.length - 5);
        console.log(lang);
        $("#" + lang + "-form").removeClass('d-none');
        if (lang == '<?php echo e($default_lang); ?>') {
            $(".from_part_2").removeClass('d-none');
        } else {
            $(".from_part_2").addClass('d-none');
        }
    });
</script>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crelocok/public_html/resources/views/admin-views/module/create.blade.php ENDPATH**/ ?>