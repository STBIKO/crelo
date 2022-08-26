<?php $__env->startSection('title','Add new campaign'); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title"><i class="tio-add-circle-outlined"></i> <?php echo e(translate('messages.add')); ?> <?php echo e(translate('messages.new')); ?> <?php echo e(translate('messages.campaign')); ?></h1>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="row gx-2 gx-lg-3">
            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                <form action="<?php echo e(route('admin.campaign.store-basic')); ?>" method="post" enctype="multipart/form-data" id="campaign-form">
                    <?php echo csrf_field(); ?>
                    <?php ($language=\App\Models\BusinessSetting::where('key','language')->first()); ?>
                    <?php ($language = $language->value ?? null); ?>
                    <?php ($default_lang = 'bn'); ?>
                    <?php if($language): ?>
                        <?php ($default_lang = json_decode($language)[0]); ?>
                        <ul class="nav nav-tabs mb-4">
                            <?php $__currentLoopData = json_decode($language); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="nav-item">
                                    <a class="nav-link lang_link <?php echo e($lang == $default_lang? 'active':''); ?>" href="#" id="<?php echo e($lang); ?>-link"><?php echo e(\App\CentralLogics\Helpers::get_language_name($lang).'('.strtoupper($lang).')'); ?></a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <?php $__currentLoopData = json_decode($language); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card mb-1 p-4 <?php echo e($lang != $default_lang ? 'd-none':''); ?> lang_form" id="<?php echo e($lang); ?>-form">
                                <div class="form-group">
                                    <label class="input-label" for="<?php echo e($lang); ?>_title"><?php echo e(translate('messages.title')); ?> (<?php echo e(strtoupper($lang)); ?>)</label>
                                    <input type="text" <?php echo e($lang == $default_lang? 'required':''); ?> name="title[]" id="<?php echo e($lang); ?>_title" class="form-control" placeholder="<?php echo e(translate('messages.new_campaign')); ?>" oninvalid="document.getElementById('en-link').click()">
                                </div>
                                <input type="hidden" name="lang[]" value="<?php echo e($lang); ?>">
                                <div class="form-group pt-4">
                                    <label class="input-label" for="exampleFormControlInput1"><?php echo e(translate('messages.short')); ?> <?php echo e(translate('messages.description')); ?> (<?php echo e(strtoupper($lang)); ?>)</label>
                                    <textarea type="text" name="description[]" class="form-control ckeditor"></textarea>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                    <div class="card mb-1 p-4" id="<?php echo e($default_lang); ?>-form">
                        <div class="form-group">
                            <label class="input-label" for="exampleFormControlInput1"><?php echo e(translate('messages.title')); ?> (EN)</label>
                            <input type="text" name="title[]" class="form-control" placeholder="<?php echo e(translate('messages.new_food')); ?>" required>
                        </div>
                        <input type="hidden" name="lang[]" value="en">
                        <div class="form-group pt-4">
                            <label class="input-label" for="exampleFormControlInput1"><?php echo e(translate('messages.short')); ?> <?php echo e(translate('messages.description')); ?></label>
                            <textarea type="text" name="description[]" class="form-control ckeditor"></textarea>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="input-label"><?php echo e(translate('messages.module')); ?></label>
                                        <select name="module_id" required class="form-control js-select2-custom"  data-placeholder="<?php echo e(translate('messages.select')); ?> <?php echo e(translate('messages.module')); ?>" id="module_select">
                                            <option value="" selected disabled><?php echo e(translate('messages.select')); ?> <?php echo e(translate('messages.module')); ?></option>
                                            <?php $__currentLoopData = \App\Models\Module::notParcel()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($module->id); ?>"><?php echo e($module->module_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <small class="text-danger"><?php echo e(translate('messages.module_change_warning')); ?></small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="input-label" for="title"><?php echo e(translate('messages.start')); ?> <?php echo e(translate('messages.date')); ?></label>
                                        <input type="date" id="date_from" class="form-control" required="" name="start_date"> 
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="input-label" for="title"><?php echo e(translate('messages.end')); ?> <?php echo e(translate('messages.date')); ?></label>
                                    <input type="date" id="date_to" class="form-control" required="" name="end_date">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="input-label text-capitalize" for="title"><?php echo e(translate('messages.daily')); ?> <?php echo e(translate('messages.start')); ?> <?php echo e(translate('messages.time')); ?></label>
                                        <input type="time" id="start_time" class="form-control" name="start_time">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="input-label text-capitalize" for="title"><?php echo e(translate('messages.daily')); ?> <?php echo e(translate('messages.end')); ?> <?php echo e(translate('messages.time')); ?></label>
                                    <input type="time" id="end_time" class="form-control" name="end_time">
                                </div>
                            </div>
                            <div class="form-group">
                                <label><?php echo e(translate('messages.campaign')); ?> <?php echo e(translate('messages.image')); ?></label>
                                <small style="color: red">* ( <?php echo e(translate('messages.ratio')); ?> 3:1 )</small>
                                <div class="custom-file">
                                    <input type="file" name="image" id="customFileEg1" class="custom-file-input"
                                           accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" required>
                                    <label class="custom-file-label" for="customFileEg1"><?php echo e(translate('messages.choose')); ?> <?php echo e(translate('messages.file')); ?></label>
                                </div>
                            </div>


                        </div>
                        <div class="col-6" style="margin-top: auto;margin-bottom: auto;">
                            <div class="form-group" style="margin-bottom:0%;">
                                <center>
                                    <img style="width: 80%;border: 1px solid; border-radius: 10px;" id="viewer"
                                         src="<?php echo e(asset('public/assets/admin/img/900x400/img1.jpg')); ?>" alt="campaign image"/>
                                </center>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary"><?php echo e(translate('messages.submit')); ?></button>
                </form>
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
        });


        function show_item(type) {
            if (type === 'product') {
                $("#type-product").show();
                $("#type-category").hide();
            } else {
                $("#type-product").hide();
                $("#type-category").show();
            }
        }   

        $("#date_from").on("change", function () {
            $('#date_to').attr('min',$(this).val());
        });

        $("#date_to").on("change", function () {
            $('#date_from').attr('max',$(this).val());
        });
        $(document).ready(function(){
            $('#date_from').attr('min',(new Date()).toISOString().split('T')[0]);
            $('#date_to').attr('min',(new Date()).toISOString().split('T')[0]);
        });

        $('#campaign-form').on('submit', function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post({
                url: '<?php echo e(route('admin.campaign.store-basic')); ?>',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data.errors) {
                        for (var i = 0; i < data.errors.length; i++) {
                            toastr.error(data.errors[i].message, {
                                CloseButton: true,
                                ProgressBar: true
                            });
                        }
                    } else {
                        toastr.success('Campaign created successfully!', {
                            CloseButton: true,
                            ProgressBar: true
                        });
                        setTimeout(function () {
                            location.href = '<?php echo e(route('admin.campaign.list', 'basic')); ?>';
                        }, 2000);
                    }
                }
            });
        });

    </script>
    <script>
        $(".lang_link").click(function(e){
            e.preventDefault();
            $(".lang_link").removeClass('active');
            $(".lang_form").addClass('d-none');
            $(this).addClass('active');

            let form_id = this.id;
            let lang = form_id.substring(0, form_id.length - 5);
            console.log(lang);
            $("#"+lang+"-form").removeClass('d-none');
            if(lang == '<?php echo e($default_lang); ?>')
            {
                $("#from_part_2").removeClass('d-none');
            }
            else
            {
                $("#from_part_2").addClass('d-none');
            }
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crelocok/public_html/resources/views/admin-views/campaign/basic/index.blade.php ENDPATH**/ ?>