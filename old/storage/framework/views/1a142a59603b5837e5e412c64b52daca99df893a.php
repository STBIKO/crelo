<?php $__env->startSection('title','Add new delivery-man'); ?>

<?php $__env->startPush('css_or_js'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css" integrity="sha512-gxWow8Mo6q6pLa1XH/CcH8JyiSDEtiwJV78E+D+QP0EVasFs8wKXq16G8CLD4CJ2SnonHr4Lm/yY2fSI2+cbmw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .iti{
            width:100%;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title"><i class="tio-add-circle-outlined"></i> <?php echo e(translate('messages.add')); ?> <?php echo e(translate('messages.new')); ?> <?php echo e(translate('messages.deliveryman')); ?></h1>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="row gx-2 gx-lg-3">
            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                <form action="<?php echo e(route('admin.delivery-man.store')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="input-label" for="exampleFormControlInput1"><?php echo e(translate('messages.first')); ?> <?php echo e(translate('messages.name')); ?></label>
                                <input type="text" name="f_name" class="form-control" placeholder="<?php echo e(translate('messages.first')); ?> <?php echo e(translate('messages.name')); ?>"
                                       required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="input-label" for="exampleFormControlInput1"><?php echo e(translate('messages.last')); ?> <?php echo e(translate('messages.name')); ?></label>
                                <input type="text" name="l_name" class="form-control" placeholder="<?php echo e(translate('messages.last')); ?> <?php echo e(translate('messages.name')); ?>"
                                       required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4 col-12">
                            <div class="form-group">
                                <label class="input-label" for="exampleFormControlInput1"><?php echo e(translate('messages.email')); ?></label>
                                <input type="email" name="email" class="form-control" placeholder="Ex : ex@example.com"
                                       required>
                            </div>
                        </div>

                        <div class="col-sm-4 col-12">
                            <div class="form-group">
                                <label class="input-label" for="exampleFormControlInput1"><?php echo e(translate('messages.deliveryman')); ?> <?php echo e(translate('messages.type')); ?></label>
                                <select name="earning" class="form-control">
                                    <option value="1"><?php echo e(translate('messages.freelancer')); ?></option>
                                    <option value="0"><?php echo e(translate('messages.salary_based')); ?></option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-4 col-12">
                            <div class="form-group">
                                <label class="input-label" for="exampleFormControlInput1"><?php echo e(translate('messages.zone')); ?></label>
                                <select name="zone_id" class="form-control" required data-placeholder="<?php echo e(translate('messages.select')); ?> <?php echo e(translate('messages.zone')); ?>">
                                <option value="" readonly="true" hidden="true"><?php echo e(translate('messages.select')); ?> <?php echo e(translate('messages.zone')); ?></option>
                                <?php $__currentLoopData = \App\Models\Zone::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(isset(auth('admin')->user()->zone_id)): ?>
                                        <?php if(auth('admin')->user()->zone_id == $zone->id): ?>
                                            <option value="<?php echo e($zone->id); ?>" selected><?php echo e($zone->name); ?></option>
                                        <?php endif; ?>
                                    <?php else: ?>
                                    <option value="<?php echo e($zone->id); ?>"><?php echo e($zone->name); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="input-label" for="exampleFormControlInput1"><?php echo e(translate('messages.identity')); ?> <?php echo e(translate('messages.type')); ?></label>
                                <select name="identity_type" class="form-control">
                                    <option value="passport"><?php echo e(translate('messages.passport')); ?></option>
                                    <option value="driving_license"><?php echo e(translate('messages.driving')); ?> <?php echo e(translate('messages.license')); ?></option>
                                    <option value="nid"><?php echo e(translate('messages.nid')); ?></option>
                                    <option value="store_id"><?php echo e(translate('messages.store')); ?> <?php echo e(translate('messages.id')); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="input-label" for="exampleFormControlInput1"><?php echo e(translate('messages.identity')); ?> <?php echo e(translate('messages.number')); ?></label>
                                <input type="text" name="identity_number" class="form-control"
                                       placeholder="Ex : DH-23434-LS"
                                       required>
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label class="input-label" for="exampleFormControlInput1"><?php echo e(translate('messages.identity')); ?> <?php echo e(translate('messages.image')); ?></label>
                                <div>
                                    <div class="row" id="coba"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <small class="nav-subtitle text-secondary border-bottom"><?php echo e(translate('messages.login')); ?> <?php echo e(translate('messages.info')); ?></small>
                    <br>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="input-label" for="phone"><?php echo e(translate('messages.phone')); ?></label>
                                <div class="input-group">
                                    <input type="tel" name="tel" id="phone" placeholder="Ex : 017********" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="input-label" for="exampleFormControlInput1"><?php echo e(translate('messages.password')); ?></label>
                                <input type="text" name="password" class="form-control" placeholder="Ex : password"
                                    required>
                            </div>
                        </div>
                    </div>
 

                    <div class="form-group">
                        <label><?php echo e(translate('messages.deliveryman')); ?> <?php echo e(translate('messages.image')); ?></label><small style="color: red">* ( <?php echo e(translate('messages.ratio')); ?> 1:1 )</small>
                        <div class="custom-file">
                            <input type="file" name="image" id="customFileEg1" class="custom-file-input"
                                   accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" required>
                            <label class="custom-file-label" for="customFileEg1"><?php echo e(translate('messages.choose')); ?> <?php echo e(translate('messages.file')); ?></label>
                        </div>
                        
                        <center class="pt-4">
                            <img style="height: 200px;border: 1px solid; border-radius: 10px;" id="viewer"
                                 src="<?php echo e(asset('public/assets/admin/img/400x400/img2.jpg')); ?>" alt="delivery-man image"/>
                        </center>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary"><?php echo e(translate('messages.submit')); ?></button>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput.min.js" integrity="sha512-QMUqEPmhXq1f3DnAVdXvu40C8nbTgxvBGvNruP6RFacy3zWKbNTmx7rdQVVM2gkd2auCWhlPYtcW2tHwzso4SA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput-jquery.min.js" integrity="sha512-hkmipUFWbNGcKnR0nayU95TV/6YhJ7J9YUAkx4WLoIgrVr7w1NYz28YkdNFMtPyPeX1FrQzbfs3gl+y94uZpSw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/utils.min.js" integrity="sha512-lv6g7RcY/5b9GMtFgw1qpTrznYu1U4Fm2z5PfDTG1puaaA+6F+aunX+GlMotukUFkxhDrvli/AgjAu128n2sXw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <link rel="shortcut icon" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/img/flags.png" type="image/x-icon">
    <link rel="shortcut icon" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/img/flags@2x.png" type="image/x-icon">
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
        <?php ($country=\App\Models\BusinessSetting::where('key','country')->first()); ?>
        var phone = $("#phone").intlTelInput({
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js",
            autoHideDialCode: true,
            autoPlaceholder: "ON",
            dropdownContainer: document.body,
            formatOnDisplay: true,
            hiddenInput: "phone",
            initialCountry: "<?php echo e($country?$country->value:auto); ?>",
            placeholderNumberType: "MOBILE",
            separateDialCode: true
        });
        // $("#phone").on('change', function(){
        //     $(this).val(phone.getNumber());
        // })

        
    </script>

    <script src="<?php echo e(asset('public/assets/admin/js/spartan-multi-image-picker.js')); ?>"></script>
    <script type="text/javascript">
        $(function () {
            $("#coba").spartanMultiImagePicker({
                fieldName: 'identity_image[]',
                maxCount: 5,
                rowHeight: '120px',
                groupClassName: 'col-lg-2 col-md-4 col-sm-4 col-6',
                maxFileSize: '',
                placeholderImage: {
                    image: '<?php echo e(asset('public/assets/admin/img/400x400/img2.jpg')); ?>',
                    width: '100%'
                },
                dropFileLabel: "Drop Here",
                onAddRow: function (index, file) {

                },
                onRenderedPreview: function (index) {

                },
                onRemoveRow: function (index) {

                },
                onExtensionErr: function (index, file) {
                    toastr.error('<?php echo e(translate('messages.please_only_input_png_or_jpg_type_file')); ?>', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                },
                onSizeErr: function (index, file) {
                    toastr.error('<?php echo e(translate('messages.file_size_too_big')); ?>', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crelocok/public_html/resources/views/admin-views/delivery-man/index.blade.php ENDPATH**/ ?>