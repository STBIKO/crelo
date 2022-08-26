<?php $__env->startSection('title', translate('mail_config')); ?>

<?php $__env->startPush('css_or_js'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title"><?php echo e(translate('messages.smtp')); ?> <?php echo e(translate('messages.mail')); ?>

                        <?php echo e(translate('messages.setup')); ?></h1>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="row pb-2">
            <div class="col-md-6 col-sm-8 card">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-10">
                            <button class="btn btn-secondary" type="button" data-toggle="collapse"
                                data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                <i class="tio-email-outlined"></i>
                                <?php echo e(translate('test_your_email_integration')); ?>

                            </button>
                        </div>
                        <div class="col-2 float-right">
                            <i class="tio-telegram float-right"></i>
                        </div>
                    </div>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            <form class="" action="javascript:">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group mb-2">
                                            <label for="inputPassword2" class="sr-only">
                                                <?php echo e(translate('mail')); ?></label>
                                            <input type="email" id="test-email" class="form-control"
                                                placeholder="Ex : jhon@email.com">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <button type="button" onclick="<?php echo e(env('APP_MODE') == 'demo' ? 'call_demo()' : 'send_mail()'); ?>" class="btn btn-primary mb-2 btn-block">
                                            <i class="tio-telegram"></i>
                                            <?php echo e(translate('send_mail')); ?>

                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row gx-2 gx-lg-3">
            <?php ($config = \App\Models\BusinessSetting::where(['key' => 'mail_config'])->first()); ?>
            <?php ($data = $config ? json_decode($config['value'], true) : null); ?>
            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2 card">
                <form class="card-body"
                    action="<?php echo e(env('APP_MODE') != 'demo' ? route('admin.business-settings.mail-config') : 'javascript:'); ?>"
                    method="post" enctype="multipart/form-data">

                    <?php echo csrf_field(); ?>
                    
                    <div class="form-group mb-2 text-center">
                        <label class="control-label h3"><?php echo e(translate('smtp_mail_config')); ?></label>
                    </div>
                    <div class="form-group mb-2">
                        <label style="padding-left: 10px"><?php echo e(translate('status')); ?></label>
                    </div>
                    <div class="form-group mb-2 mt-2">
                        <input type="radio" name="status" value="1"
                            <?php echo e(isset($data['status']) && $data['status'] == 1 ? 'checked' : ''); ?>>
                        <label style="padding-left: 10px"><?php echo e(translate('Active')); ?></label>
                        <br>
                    </div>
                    <div class="form-group mb-2">
                        <input type="radio" name="status" value="0"
                            <?php echo e(isset($data['status']) && $data['status'] == 0 ? 'checked' : ''); ?>>
                        <label style="padding-left: 10px"><?php echo e(translate('Inactive')); ?></label>
                        <br>
                    </div>
                    <div class="form-group mb-2">
                        <label style="padding-left: 10px"><?php echo e(translate('messages.mailer')); ?>

                            <?php echo e(translate('messages.name')); ?></label><br>
                        <input type="text" placeholder="ex : Alex" class="form-control" name="name"
                            value="<?php echo e(env('APP_MODE') != 'demo' ? $data['name'] ?? '' : ''); ?>" required>
                    </div>

                    <div class="form-group mb-2">
                        <label style="padding-left: 10px"><?php echo e(translate('messages.host')); ?></label><br>
                        <input type="text" class="form-control" name="host"
                            value="<?php echo e(env('APP_MODE') != 'demo' ? $data['host'] ?? '' : ''); ?>" required>
                    </div>
                    <div class="form-group mb-2">
                        <label style="padding-left: 10px"><?php echo e(translate('messages.driver')); ?></label><br>
                        <input type="text" class="form-control" name="driver"
                            value="<?php echo e(env('APP_MODE') != 'demo' ? $data['driver'] ?? '' : ''); ?>" required>
                    </div>
                    <div class="form-group mb-2">
                        <label style="padding-left: 10px"><?php echo e(translate('messages.port')); ?></label><br>
                        <input type="text" class="form-control" name="port"
                            value="<?php echo e(env('APP_MODE') != 'demo' ? $data['port'] ?? '' : ''); ?>" required>
                    </div>

                    <div class="form-group mb-2">
                        <label style="padding-left: 10px"><?php echo e(translate('messages.username')); ?></label><br>
                        <input type="text" placeholder="ex : ex@yahoo.com" class="form-control" name="username"
                            value="<?php echo e(env('APP_MODE') != 'demo' ? $data['username'] ?? '' : ''); ?>" required>
                    </div>

                    <div class="form-group mb-2">
                        <label style="padding-left: 10px"><?php echo e(translate('messages.email')); ?>

                            <?php echo e(translate('messages.id')); ?></label><br>
                        <input type="text" placeholder="ex : ex@yahoo.com" class="form-control" name="email"
                            value="<?php echo e(env('APP_MODE') != 'demo' ? $data['email_id'] ?? '' : ''); ?>" required>
                    </div>

                    <div class="form-group mb-2">
                        <label style="padding-left: 10px"><?php echo e(translate('messages.encryption')); ?></label><br>
                        <input type="text" placeholder="ex : tls" class="form-control" name="encryption"
                            value="<?php echo e(env('APP_MODE') != 'demo' ? $data['encryption'] ?? '' : ''); ?>" required>
                    </div>

                    <div class="form-group mb-2">
                        <label style="padding-left: 10px"><?php echo e(translate('messages.password')); ?></label><br>
                        <input type="text" class="form-control" name="password"
                            value="<?php echo e(env('APP_MODE') != 'demo' ? $data['password'] ?? '' : ''); ?>" required>
                    </div>

                    <button type="<?php echo e(env('APP_MODE') != 'demo' ? 'submit' : 'button'); ?>"
                        onclick="<?php echo e(env('APP_MODE') != 'demo' ? '' : 'call_demo()'); ?>"
                        class="btn btn-primary mb-2"><?php echo e(translate('messages.save')); ?></button>

                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script_2'); ?>
    <script>
        function ValidateEmail(inputText) {
            var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if (inputText.match(mailformat)) {
                return true;
            } else {
                return false;
            }
        }

        function send_mail() {
            if (ValidateEmail($('#test-email').val())) {
                Swal.fire({
                    title: '<?php echo e(translate('Are you sure?')); ?>?',
                    text: "<?php echo e(translate('a_test_mail_will_be_sent_to_your_email')); ?>!",
                    showCancelButton: true,
                    confirmButtonColor: '#377dff',
                    cancelButtonColor: 'secondary',
                    confirmButtonText: '<?php echo e(translate('Yes')); ?>!'
                }).then((result) => {
                    if (result.value) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: "<?php echo e(route('admin.business-settings.mail.send')); ?>",
                            method: 'GET',
                            data: {
                                "email": $('#test-email').val()
                            },
                            beforeSend: function() {
                                $('#loading').show();
                            },
                            success: function(data) {
                                if (data.success === 2) {
                                    toastr.error(
                                        '<?php echo e(translate('email_configuration_error')); ?> !!'
                                    );
                                } else if (data.success === 1) {
                                    toastr.success(
                                        '<?php echo e(translate('email_configured_perfectly!')); ?>!'
                                    );
                                } else {
                                    toastr.info(
                                        '<?php echo e(translate('email_status_is_not_active')); ?>!'
                                    );
                                }
                            },
                            complete: function() {
                                $('#loading').hide();

                            }
                        });
                    }
                })
            } else {
                toastr.error('<?php echo e(translate('invalid_email_address')); ?> !!');
            }
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crelocok/public_html/resources/views/admin-views/business-settings/mail-index.blade.php ENDPATH**/ ?>