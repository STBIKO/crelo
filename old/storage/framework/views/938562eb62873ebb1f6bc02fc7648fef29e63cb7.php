<?php $__env->startSection('title','Payment Setup'); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title"><?php echo e(translate('messages.payment')); ?> <?php echo e(translate('messages.gateway')); ?> <?php echo e(translate('messages.setup')); ?></h1>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="row" style="padding-bottom: 20px">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body" style="padding: 20px">
                        <h5 class="text-center"><?php echo e(translate('messages.payment')); ?> <?php echo e(translate('messages.method')); ?></h5>
                        <?php ($config=\App\CentralLogics\Helpers::get_business_settings('cash_on_delivery')); ?>
                        <form action="<?php echo e(route('admin.business-settings.payment-method-update',['cash_on_delivery'])); ?>"
                              method="post">
                            <?php echo csrf_field(); ?>
                            
                                <div class="form-group mb-2">
                                    <label class="control-label"><?php echo e(translate('messages.cash_on_delivery')); ?></label>
                                </div>
                                <div class="form-group mb-2 mt-2">
                                    <input type="radio" name="status" value="1" <?php echo e($config?($config['status']==1?'checked':''):''); ?>>
                                    <label style="padding-left: 10px"><?php echo e(translate('messages.active')); ?></label>
                                    <br>
                                </div>
                                <div class="form-group mb-2">
                                    <input type="radio" name="status" value="0" <?php echo e($config?($config['status']==0?'checked':''):''); ?>>
                                    <label
                                        style="padding-left: 10px"><?php echo e(translate('messages.inactive')); ?></label>
                                    <br>
                                </div>
                                <button type="submit" class="btn btn-primary mb-2"><?php echo e(translate('messages.save')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body" style="padding: 20px">
                        <h5 class="text-center"><?php echo e(translate('messages.payment')); ?> <?php echo e(translate('messages.method')); ?></h5>
                        <?php ($digital_payment=\App\CentralLogics\Helpers::get_business_settings('digital_payment')); ?>
                        <form action="<?php echo e(route('admin.business-settings.payment-method-update',['digital_payment'])); ?>"
                              method="post">
                            <?php echo csrf_field(); ?>
                                <div class="form-group mb-2">
                                    <label
                                        class="control-label text-capitalize"><?php echo e(translate('messages.digital')); ?> <?php echo e(translate('messages.payment')); ?></label>
                                </div>
                                <div class="form-group mb-2 mt-2">
                                    <input type="radio" class="digital_payment" name="status" value="1" <?php echo e($digital_payment?($digital_payment['status']==1?'checked':''):''); ?>>
                                    <label style="padding-left: 10px"><?php echo e(translate('messages.active')); ?></label>
                                    <br>
                                </div>
                                <div class="form-group mb-2">
                                    <input type="radio" class="digital_payment" name="status" value="0" <?php echo e($digital_payment?($digital_payment['status']==0?'checked':''):''); ?>>
                                    <label
                                        style="padding-left: 10px"><?php echo e(translate('messages.inactive')); ?></label>
                                    <br>
                                </div>
                                <button type="submit" class="btn btn-primary mb-2"><?php echo e(translate('messages.save')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row digital_payment_methods" style="padding-bottom: 20px">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body" style="padding: 20px">
                        <h5 class="text-center"><?php echo e(translate('messages.sslcommerz')); ?></h5>
                        <?php ($config=\App\CentralLogics\Helpers::get_business_settings('ssl_commerz_payment')); ?>
                        <form
                            action="<?php echo e(env('APP_MODE')!='demo'?route('admin.business-settings.payment-method-update',['ssl_commerz_payment']):'javascript:'); ?>"
                            method="post">
                            <?php echo csrf_field(); ?>
                                <div class="form-group mb-2">
                                    <label
                                        class="control-label"><?php echo e(translate('messages.sslcommerz')); ?> <?php echo e(translate('messages.payment')); ?></label>
                                </div>
                                <div class="form-group mb-2 mt-2">
                                    <input type="radio" name="status" value="1" <?php echo e($config?($config['status']==1?'checked':''):''); ?>>
                                    <label style="padding-left: 10px"><?php echo e(translate('messages.active')); ?></label>
                                    <br>
                                </div>
                                <div class="form-group mb-2">
                                    <input type="radio" name="status" value="0" <?php echo e($config?($config['status']==0?'checked':''):''); ?>>
                                    <label
                                        style="padding-left: 10px"><?php echo e(translate('messages.inactive')); ?></label>
                                    <br>
                                </div>
                                <div class="form-group mb-2">
                                    <label
                                        style="padding-left: 10px"><?php echo e(translate('messages.store')); ?> <?php echo e(translate('messages.id')); ?> </label><br>
                                    <input type="text" class="form-control" name="store_id"
                                           value="<?php echo e(env('APP_MODE')!='demo'?($config?$config['store_id']:''):''); ?>">
                                </div>
                                <div class="form-group mb-2">
                                    <label
                                        style="padding-left: 10px"><?php echo e(translate('messages.store')); ?> <?php echo e(translate('messages.password')); ?></label><br>
                                    <input type="text" class="form-control" name="store_password"
                                           value="<?php echo e(env('APP_MODE')!='demo'?($config?$config['store_password']:''):''); ?>">
                                </div>
                                <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                                        onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>"
                                        class="btn btn-primary mb-2"><?php echo e(translate('messages.save')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body" style="padding: 20px">
                        <h5 class="text-center"><?php echo e(translate('messages.razorpay')); ?></h5>
                        <?php ($config=\App\CentralLogics\Helpers::get_business_settings('razor_pay')); ?>
                        <form
                            action="<?php echo e(env('APP_MODE')!='demo'?route('admin.business-settings.payment-method-update',['razor_pay']):'javascript:'); ?>"
                            method="post">
                            <?php echo csrf_field(); ?>
                                <div class="form-group mb-2">
                                    <label class="control-label"><?php echo e(translate('messages.razorpay')); ?></label>
                                </div>
                                <div class="form-group mb-2 mt-2">
                                    <input type="radio" name="status" value="1" <?php echo e($config?($config['status']==1?'checked':''):''); ?>>
                                    <label style="padding-left: 10px"><?php echo e(translate('messages.active')); ?></label>
                                    <br>
                                </div>
                                <div class="form-group mb-2">
                                    <input type="radio" name="status" value="0" <?php echo e($config?($config['status']==0?'checked':''):''); ?>>
                                    <label
                                        style="padding-left: 10px"><?php echo e(translate('messages.inactive')); ?></label>
                                    <br>
                                </div>
                                <div class="form-group mb-2">
                                    <label style="padding-left: 10px"><?php echo e(translate('messages.razorkey')); ?></label><br>
                                    <input type="text" class="form-control" name="razor_key"
                                           value="<?php echo e(env('APP_MODE')!='demo'?($config?$config['razor_key']:''):''); ?>">
                                </div>
                                <div class="form-group mb-2">
                                    <label style="padding-left: 10px"><?php echo e(translate('messages.razorsecret')); ?></label><br>
                                    <input type="text" class="form-control" name="razor_secret"
                                           value="<?php echo e(env('APP_MODE')!='demo'?($config?$config['razor_secret']:''):''); ?>">
                                </div>
                                <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                                        onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>"
                                        class="btn btn-primary mb-2"><?php echo e(translate('messages.save')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pt-4">
                <div class="card">
                    <div class="card-body" style="padding: 20px">
                        <h5 class="text-center"><?php echo e(translate('messages.paypal')); ?></h5>
                        <?php ($config=\App\CentralLogics\Helpers::get_business_settings('paypal')); ?>
                        <form
                            action="<?php echo e(env('APP_MODE')!='demo'?route('admin.business-settings.payment-method-update',['paypal']):'javascript:'); ?>"
                            method="post">
                            <?php echo csrf_field(); ?>
                                <div class="form-group mb-2">
                                    <label class="control-label"><?php echo e(translate('messages.paypal')); ?></label>
                                </div>
                                <div class="form-group mb-2 mt-2">
                                    <input type="radio" name="status" value="1" <?php echo e($config?($config['status']==1?'checked':''):''); ?>>
                                    <label style="padding-left: 10px"><?php echo e(translate('messages.active')); ?></label>
                                    <br>
                                </div>
                                <div class="form-group mb-2">
                                    <input type="radio" name="status" value="0" <?php echo e($config?($config['status']==0?'checked':''):''); ?>>
                                    <label style="padding-left: 10px"><?php echo e(translate('messages.inactive')); ?></label>
                                    <br>
                                </div>
                                <div class="form-group mb-2">
                                    <label
                                        style="padding-left: 10px"><?php echo e(translate('messages.paypal')); ?> <?php echo e(translate('messages.client')); ?> <?php echo e(translate('messages.id')); ?></label><br>
                                    <input type="text" class="form-control" name="paypal_client_id"
                                           value="<?php echo e(env('APP_MODE')!='demo'?($config?$config['paypal_client_id']:''):''); ?>">
                                </div>
                                <div class="form-group mb-2">
                                    <label style="padding-left: 10px"><?php echo e(translate('messages.paypalsecret')); ?> </label><br>
                                    <input type="text" class="form-control" name="paypal_secret"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['paypal_secret']??'':''); ?>">
                                </div>
                                <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                                        onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>"
                                        class="btn btn-primary mb-2"><?php echo e(translate('messages.save')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pt-4">
                <div class="card">
                    <div class="card-body" style="padding: 20px">
                        <h5 class="text-center"><?php echo e(translate('messages.stripe')); ?></h5>
                        <?php ($config=\App\CentralLogics\Helpers::get_business_settings('stripe')); ?>
                        <form action="<?php echo e(env('APP_MODE')!='demo'?route('admin.business-settings.payment-method-update',['stripe']):'javascript:'); ?>"
                              method="post">
                            <?php echo csrf_field(); ?>
                                <div class="form-group mb-2">
                                    <label class="control-label"><?php echo e(translate('messages.stripe')); ?></label>
                                </div>
                                <div class="form-group mb-2 mt-2">
                                    <input type="radio" name="status" value="1" <?php echo e($config?($config['status']==1?'checked':''):''); ?>>
                                    <label style="padding-left: 10px"><?php echo e(translate('messages.active')); ?></label>
                                    <br>
                                </div>
                                <div class="form-group mb-2">
                                    <input type="radio" name="status" value="0" <?php echo e($config?($config['status']==0?'checked':''):''); ?>>
                                    <label style="padding-left: 10px"><?php echo e(translate('messages.inactive')); ?> </label>
                                    <br>
                                </div>
                                <div class="form-group mb-2">
                                    <label
                                        style="padding-left: 10px"><?php echo e(translate('messages.published')); ?> <?php echo e(translate('messages.key')); ?></label><br>
                                    <input type="text" class="form-control" name="published_key"
                                           value="<?php echo e(env('APP_MODE')!='demo'?($config?$config['published_key']:''):''); ?>">
                                </div>

                                <div class="form-group mb-2">
                                    <label
                                        style="padding-left: 10px"><?php echo e(translate('messages.api')); ?> <?php echo e(translate('messages.key')); ?></label><br>
                                    <input type="text" class="form-control" name="api_key"
                                           value="<?php echo e(env('APP_MODE')!='demo'?($config?$config['api_key']:''):''); ?>">
                                </div>
                                <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>" onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>" class="btn btn-primary mb-2"><?php echo e(translate('messages.save')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6" style="margin-top: 26px!important;">
                <div class="card">
                    <div class="card-body" style="padding: 20px">
                        <h5 class="text-center"><?php echo e(translate('messages.paystack')); ?></h5>
                        <span class="badge badge-soft-danger"><?php echo e(translate('messages.paystack_callback_warning')); ?></span>
                        <?php ($config=\App\CentralLogics\Helpers::get_business_settings('paystack')); ?>
                        <form
                            action="<?php echo e(env('APP_MODE')!='demo'?route('admin.business-settings.payment-method-update',['paystack']):'javascript:'); ?>"
                            method="post">
                            <?php echo csrf_field(); ?>
                            <?php if(isset($config)): ?>
                                <div class="form-group mb-2">
                                    <label class="control-label"><?php echo e(translate('messages.paystack')); ?></label>
                                </div>
                                <div class="form-group mb-2 mt-2">
                                    <input type="radio" name="status" value="1" <?php echo e($config['status']==1?'checked':''); ?>>
                                    <label style="padding-left: 10px"><?php echo e(translate('messages.active')); ?></label>
                                    <br>
                                </div>
                                <div class="form-group mb-2">
                                    <input type="radio" name="status" value="0" <?php echo e($config['status']==0?'checked':''); ?>>
                                    <label style="padding-left: 10px"><?php echo e(translate('messages.inactive')); ?></label>
                                    <br>
                                </div>
                                <div class="form-group mb-2">
                                    <label
                                        style="padding-left: 10px"><?php echo e(translate('messages.publicKey')); ?></label><br>
                                    <input type="text" class="form-control" name="publicKey"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['publicKey']:''); ?>">
                                </div>
                                <div class="form-group mb-2">
                                    <label class="text-capitalize" style="padding-left: 10px"><?php echo e(translate('messages.secret')); ?> <?php echo e(translate('messages.key')); ?> </label><br>
                                    <input type="text" class="form-control" name="secretKey"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['secretKey']:''); ?>">
                                </div>
                                <div class="form-group mb-2">
                                    <label class="text-capitalize" style="padding-left: 10px"><?php echo e(translate('messages.payment')); ?> <?php echo e(translate('messages.url')); ?></label><br>
                                    <input type="text" class="form-control" name="paymentUrl"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['paymentUrl']:''); ?>">
                                </div>
                                <div class="form-group mb-2">
                                    <label class="text-capitalize" style="padding-left: 10px"><?php echo e(translate('messages.merchant')); ?> <?php echo e(translate('messages.email')); ?></label><br>
                                    <input type="text" class="form-control" name="merchantEmail"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['merchantEmail']:''); ?>">
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                                        onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>"
                                        class="btn btn-primary mb-2"><?php echo e(translate('messages.save')); ?></button>
                                    <button type="button" class="btn btn-info mb-2 pull-right" onclick="copy_text('<?php echo e(url('/')); ?>/paystack-callback')"><?php echo e(translate('messages.copy_callback')); ?></button>        
                                </div>

                                
                            <?php else: ?>
                                <button type="submit"
                                        class="btn btn-primary mb-2"><?php echo e(translate('messages.configure')); ?></button>
                                

                                
                            <?php endif; ?>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pt-4">
                <div class="card">
                    <div class="card-body" style="padding: 20px">
                        <h5 class="text-center"><?php echo e(translate('messages.senang')); ?> <?php echo e(translate('messages.pay')); ?></h5>
                        <?php ($config=\App\CentralLogics\Helpers::get_business_settings('senang_pay')); ?>
                        <form action="<?php echo e(env('APP_MODE')!='demo'?route('admin.business-settings.payment-method-update',['senang_pay']):'javascript:'); ?>"
                              method="post">
                            <?php echo csrf_field(); ?>
                            <?php if(isset($config)): ?>
                                <div class="form-group mb-2">
                                    <label class="control-label"><?php echo e(translate('messages.senang')); ?> <?php echo e(translate('messages.pay')); ?></label>
                                </div>
                                <div class="form-group mb-2 mt-2">
                                    <input type="radio" name="status" value="1" <?php echo e($config['status']==1?'checked':''); ?>>
                                    <label style="padding-left: 10px"><?php echo e(translate('messages.active')); ?></label>
                                    <br>
                                </div>
                                <div class="form-group mb-2">
                                    <input type="radio" name="status" value="0" <?php echo e($config['status']==0?'checked':''); ?>>
                                    <label style="padding-left: 10px"><?php echo e(translate('messages.inactive')); ?> </label>
                                    <br>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="text-capitalize"
                                        style="padding-left: 10px"><?php echo e(translate('messages.secret')); ?> <?php echo e(translate('messages.key')); ?></label><br>
                                    <input type="text" class="form-control" name="secret_key"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['secret_key']:''); ?>">
                                </div>

                                <div class="form-group mb-2">
                                    <label
                                        style="padding-left: 10px"><?php echo e(translate('messages.merchant')); ?> <?php echo e(translate('messages.id')); ?></label><br>
                                    <input type="text" class="form-control" name="merchant_id"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['merchant_id']:''); ?>">
                                </div>
                                <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>" onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>" class="btn btn-primary mb-2"><?php echo e(translate('messages.save')); ?></button>
                            <?php else: ?>
                                <button type="submit"
                                        class="btn btn-primary mb-2"><?php echo e(translate('messages.configure')); ?></button>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Flutterwave -->
            <div class="col-md-6 pt-4">
                <div class="card">
                    <div class="card-body" style="padding: 20px">
                        <h5 class="text-center"><?php echo e(translate('messages.flutterwave')); ?></h5>
                        <?php ($config=\App\CentralLogics\Helpers::get_business_settings('flutterwave')); ?>
                        <form action="<?php echo e(env('APP_MODE')!='demo'?route('admin.business-settings.payment-method-update',['flutterwave']):'javascript:'); ?>"
                              method="post">
                            <?php echo csrf_field(); ?>
                            <?php if(isset($config)): ?>
                                <div class="form-group mb-2">
                                    <label class="control-label"><?php echo e(translate('messages.flutterwave')); ?></label>
                                </div>
                                <div class="form-group mb-2 mt-2">
                                    <input type="radio" name="status" value="1" <?php echo e($config['status']==1?'checked':''); ?>>
                                    <label style="padding-left: 10px"><?php echo e(translate('messages.active')); ?></label>
                                    <br>
                                </div>
                                <div class="form-group mb-2">
                                    <input type="radio" name="status" value="0" <?php echo e($config['status']==0?'checked':''); ?>>
                                    <label style="padding-left: 10px"><?php echo e(translate('messages.inactive')); ?> </label>
                                    <br>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="text-capitalize"
                                        style="padding-left: 10px"><?php echo e(translate('messages.publicKey')); ?></label><br>
                                    <input type="text" class="form-control" name="public_key"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['public_key']:''); ?>">
                                </div>
                                <div class="form-group mb-2">
                                    <label class="text-capitalize"
                                        style="padding-left: 10px"><?php echo e(translate('messages.secret')); ?> <?php echo e(translate('messages.key')); ?></label><br>
                                    <input type="text" class="form-control" name="secret_key"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['secret_key']:''); ?>">
                                </div>
                                <div class="form-group mb-2">
                                    <label class="text-capitalize"
                                        style="padding-left: 10px"><?php echo e(translate('messages.hash')); ?></label><br>
                                    <input type="text" class="form-control" name="hash"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['hash']:''); ?>">
                                </div>

                                <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>" onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>" class="btn btn-primary mb-2"><?php echo e(translate('messages.save')); ?></button>
                            <?php else: ?>
                                <button type="submit"
                                        class="btn btn-primary mb-2"><?php echo e(translate('messages.configure')); ?></button>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>

            <!-- MercadoPago -->
            <div class="col-md-6 pt-4">
                <div class="card">
                    <div class="card-body" style="padding: 20px">
                        <h5 class="text-center"><?php echo e(translate('messages.mercadopago')); ?></h5>
                        <?php ($config=\App\CentralLogics\Helpers::get_business_settings('mercadopago')); ?>
                        <form action="<?php echo e(env('APP_MODE')!='demo'?route('admin.business-settings.payment-method-update',['mercadopago']):'javascript:'); ?>"
                              method="post">
                            <?php echo csrf_field(); ?>
                            <?php if(isset($config)): ?>
                                <div class="form-group mb-2">
                                    <label class="control-label"><?php echo e(translate('messages.mercadopago')); ?></label>
                                </div>
                                <div class="form-group mb-2 mt-2">
                                    <input type="radio" name="status" value="1" <?php echo e($config['status']==1?'checked':''); ?>>
                                    <label style="padding-left: 10px"><?php echo e(translate('messages.active')); ?></label>
                                    <br>
                                </div>
                                <div class="form-group mb-2">
                                    <input type="radio" name="status" value="0" <?php echo e($config['status']==0?'checked':''); ?>>
                                    <label style="padding-left: 10px"><?php echo e(translate('messages.inactive')); ?> </label>
                                    <br>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="text-capitalize"
                                        style="padding-left: 10px"><?php echo e(translate('messages.publicKey')); ?></label><br>
                                    <input type="text" class="form-control" name="public_key"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['public_key']:''); ?>">
                                </div>
                                <div class="form-group mb-2">
                                    <label class="text-capitalize"
                                        style="padding-left: 10px"><?php echo e(translate('messages.access_token')); ?></label><br>
                                    <input type="text" class="form-control" name="access_token"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['access_token']:''); ?>">
                                </div>

                                <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>" onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>" class="btn btn-primary mb-2"><?php echo e(translate('messages.save')); ?></button>
                            <?php else: ?>
                                <button type="submit"
                                        class="btn btn-primary mb-2"><?php echo e(translate('messages.configure')); ?></button>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-body" style="padding: 20px">
                        <h5 class="text-center"><?php echo e(translate('messages.paymob_accept')); ?></h5>
                        <?php ($config=\App\CentralLogics\Helpers::get_business_settings('paymob_accept')); ?>
                        <form
                            action="<?php echo e(env('APP_MODE')!='demo'?route('admin.business-settings.payment-method-update',['paymob_accept']):'javascript:'); ?>"
                            method="post">
                            <?php echo csrf_field(); ?>
                            <?php if(isset($config)): ?>
                                <div class="form-group mb-2">
                                    <label class="control-label"><?php echo e(translate('messages.paymob_accept')); ?></label>
                                </div>
                                <div class="form-group mb-2 mt-2">
                                    <input type="radio" name="status" value="1" <?php echo e($config['status']==1?'checked':''); ?>>
                                    <label style="padding-left: 10px"><?php echo e(translate('messages.active')); ?></label>
                                    <br>
                                </div>
                                <div class="form-group mb-2">
                                    <input type="radio" name="status" value="0" <?php echo e($config['status']==0?'checked':''); ?>>
                                    <label style="padding-left: 10px"><?php echo e(translate('messages.inactive')); ?> </label>
                                    <br>
                                </div>

                                <div class="form-group mb-2">
                                    <label
                                        style="padding-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 10px"><?php echo e(translate('messages.callback')); ?></label>
                                    <span class="btn btn-secondary btn-sm m-2"
                                          onclick="copyToClipboard('#id_paymob_accept')"><i class="tio-copy"></i> <?php echo e(translate('messages.copy_callback')); ?></span>
                                    <br>
                                    <p class="form-control" id="id_paymob_accept"><?php echo e(url('/')); ?>/paymob-callback</p>
                                </div>

                                <div class="form-group mb-2">
                                    <label style="padding-left: 10px"><?php echo e(translate('messages.api_key')); ?></label><br>
                                    <input type="text" class="form-control" name="api_key"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['api_key']:''); ?>">
                                </div>

                                <div class="form-group mb-2">
                                    <label style="padding-left: 10px"><?php echo e(translate('messages.iframe_id')); ?></label><br>
                                    <input type="text" class="form-control" name="iframe_id"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['iframe_id']:''); ?>">
                                </div>

                                <div class="form-group mb-2">
                                    <label
                                        style="padding-left: 10px"><?php echo e(translate('messages.integration_id')); ?></label><br>
                                    <input type="text" class="form-control" name="integration_id"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['integration_id']:''); ?>">
                                </div>

                                <div class="form-group mb-2">
                                    <label style="padding-left: 10px"><?php echo e(translate('messages.HMAC')); ?></label><br>
                                    <input type="text" class="form-control" name="hmac"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['hmac']:''); ?>">
                                </div>


                                <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                                        onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>"
                                        class="btn btn-primary mb-2"><?php echo e(translate('messages.save')); ?></button>
                            <?php else: ?>
                                <button type="submit"
                                        class="btn btn-primary mb-2"><?php echo e(translate('messages.configure')); ?></button>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mt-4" style="display: block">
                <div class="card">
                    <div class="card-body" style="padding: 20px">
                        <h5 class="text-center"><?php echo e(translate('messages.bkash')); ?></h5>
                        <?php ($config=\App\CentralLogics\Helpers::get_business_settings('bkash')); ?>
                        <form
                            action="<?php echo e(env('APP_MODE')!='demo'?route('admin.business-settings.payment-method-update',['bkash']):'javascript:'); ?>"
                            method="post">
                            <?php echo csrf_field(); ?>
                            <?php if(isset($config)): ?>
                                <div class="form-group mb-2">
                                    <label class="control-label"><?php echo e(translate('messages.bkash')); ?></label>
                                </div>

                                <div class="form-group mb-2 mt-2">
                                    <input type="radio" name="status" value="1" <?php echo e($config['status']==1?'checked':''); ?>>
                                    <label style="padding-left: 10px"><?php echo e(translate('messages.active')); ?></label>
                                    <br>
                                </div>

                                <div class="form-group mb-2">
                                    <input type="radio" name="status" value="0" <?php echo e($config['status']==0?'checked':''); ?>>
                                    <label style="padding-left: 10px"><?php echo e(translate('messages.inactive')); ?> </label>
                                    <br>
                                </div>

                                <div class="form-group mb-2">
                                    <label style="padding-left: 10px"><?php echo e(translate('api_key')); ?></label><br>
                                    <input type="text" class="form-control" name="api_key"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['api_key']:''); ?>">
                                </div>

                                <div class="form-group mb-2">
                                    <label style="padding-left: 10px"><?php echo e(translate('messages.api_secret')); ?></label><br>
                                    <input type="text" class="form-control" name="api_secret"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['api_secret']:''); ?>">
                                </div>

                                <div class="form-group mb-2">
                                    <label
                                        style="padding-left: 10px"><?php echo e(translate('messages.username')); ?></label><br>
                                    <input type="text" class="form-control" name="username"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['username']:''); ?>">
                                </div>

                                <div class="form-group mb-2">
                                    <label style="padding-left: 10px"><?php echo e(translate('messages.password')); ?></label><br>
                                    <input type="text" class="form-control" name="password"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['password']:''); ?>">
                                </div>


                                <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                                        onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>"
                                        class="btn btn-primary mb-2"><?php echo e(translate('messages.save')); ?></button>
                            <?php else: ?>
                                <button type="submit"
                                        class="btn btn-primary mb-2"><?php echo e(translate('messages.configure')); ?></button>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mt-4" style="display: block">
                <div class="card">
                    <div class="card-body" style="padding: 20px">
                        <h5 class="text-center"><?php echo e(translate('messages.paytabs')); ?></h5>
                        <?php ($config=\App\CentralLogics\Helpers::get_business_settings('paytabs')); ?>
                        <form
                            action="<?php echo e(env('APP_MODE')!='demo'?route('admin.business-settings.payment-method-update',['paytabs']):'javascript:'); ?>"
                            method="post">
                            <?php echo csrf_field(); ?>
                            <?php if(isset($config)): ?>
                                <div class="form-group mb-2">
                                    <label class="control-label"><?php echo e(translate('messages.paytabs')); ?></label>
                                </div>

                                <div class="form-group mb-2 mt-2">
                                    <input type="radio" name="status" value="1" <?php echo e($config['status']==1?'checked':''); ?>>
                                    <label style="padding-left: 10px"><?php echo e(translate('messages.active')); ?></label>
                                    <br>
                                </div>

                                <div class="form-group mb-2">
                                    <input type="radio" name="status" value="0" <?php echo e($config['status']==0?'checked':''); ?>>
                                    <label style="padding-left: 10px"><?php echo e(translate('messages.inactive')); ?> </label>
                                    <br>
                                </div>

                                <div class="form-group mb-2">
                                    <label style="padding-left: 10px"><?php echo e(translate('messages.profile_id')); ?></label><br>
                                    <input type="text" class="form-control" name="profile_id"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['profile_id']:''); ?>">
                                </div>

                                <div class="form-group mb-2">
                                    <label style="padding-left: 10px"><?php echo e(translate('messages.server')); ?></label><br>
                                    <input type="text" class="form-control" name="server_key"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['server_key']:''); ?>">
                                </div>

                                <div class="form-group mb-2">
                                    <label
                                        style="padding-left: 10px"><?php echo e(translate('messages.base_url_by_region')); ?></label><br>
                                    <input type="text" class="form-control" name="base_url"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['base_url']:''); ?>">
                                </div>


                                <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                                        onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>"
                                        class="btn btn-primary mb-2"><?php echo e(translate('messages.save')); ?></button>
                            <?php else: ?>
                                <button type="submit"
                                        class="btn btn-primary mb-2"><?php echo e(translate('messages.configure')); ?></button>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-body" style="padding: 20px">
                        <h5 class="text-center"><?php echo e(translate('messages.paytm')); ?></h5>
                        <?php ($config=\App\CentralLogics\Helpers::get_business_settings('paytm')); ?>
                        <form
                            action="<?php echo e(env('APP_MODE')!='demo'?route('admin.business-settings.payment-method-update',['paytm']):'javascript:'); ?>"
                            method="post">
                            <?php echo csrf_field(); ?>
                            <?php if(isset($config)): ?>
                                <div class="form-group mb-2">
                                    <label class="control-label"><?php echo e(translate('messages.paytm')); ?></label>
                                </div>
                                <div class="form-group mb-2 mt-2">
                                    <input type="radio" name="status" value="1" <?php echo e($config['status']==1?'checked':''); ?>>
                                    <label style="padding-left: 10px"><?php echo e(translate('messages.active')); ?></label>
                                    <br>
                                </div>
                                <div class="form-group mb-2">
                                    <input type="radio" name="status" value="0" <?php echo e($config['status']==0?'checked':''); ?>>
                                    <label style="padding-left: 10px"><?php echo e(translate('messages.inactive')); ?> </label>
                                    <br>
                                </div>

                                <div class="form-group mb-2">
                                    <label style="padding-left: 10px"><?php echo e(translate('messages.paytm_merchant_key')); ?></label><br>
                                    <input type="text" class="form-control" name="paytm_merchant_key"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['paytm_merchant_key']:''); ?>">
                                </div>

                                <div class="form-group mb-2">
                                    <label style="padding-left: 10px"><?php echo e(translate('messages.paytm_merchant_mid')); ?></label><br>
                                    <input type="text" class="form-control" name="paytm_merchant_mid"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['paytm_merchant_mid']:''); ?>">
                                </div>

                                <div class="form-group mb-2">
                                    <label
                                        style="padding-left: 10px"><?php echo e(translate('messages.paytm_merchant_website')); ?></label><br>
                                    <input type="text" class="form-control" name="paytm_merchant_website"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['paytm_merchant_website']:''); ?>">
                                </div>

                                <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                                        onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>"
                                        class="btn btn-primary mb-2"><?php echo e(translate('messages.save')); ?></button>
                            <?php else: ?>
                                <button type="submit"
                                        class="btn btn-primary mb-2"><?php echo e(translate('messages.configure')); ?></button>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6 pt-4">
                <div class="card">
                    <div class="card-body" style="padding: 20px">
                        <h5 class="text-center"><?php echo e(translate('messages.liqpay')); ?></h5>
                        <?php ($config=\App\CentralLogics\Helpers::get_business_settings('liqpay')); ?>
                        <form action="<?php echo e(env('APP_MODE')!='demo'?route('admin.business-settings.payment-method-update',['liqpay']):'javascript:'); ?>"
                              method="post">
                            <?php echo csrf_field(); ?>
                            <?php if(isset($config)): ?>
                                <div class="form-group mb-2">
                                    <label class="control-label"><?php echo e(translate('messages.liqpay')); ?></label>
                                </div>
                                <div class="form-group mb-2 mt-2">
                                    <input type="radio" name="status" value="1" <?php echo e($config['status']==1?'checked':''); ?>>
                                    <label style="padding-left: 10px"><?php echo e(translate('messages.active')); ?></label>
                                    <br>
                                </div>
                                <div class="form-group mb-2">
                                    <input type="radio" name="status" value="0" <?php echo e($config['status']==0?'checked':''); ?>>
                                    <label style="padding-left: 10px"><?php echo e(translate('messages.inactive')); ?> </label>
                                    <br>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="text-capitalize"
                                           style="padding-left: 10px"><?php echo e(translate('messages.publicKey')); ?></label><br>
                                    <input type="text" class="form-control" name="public_key"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['public_key']:''); ?>">
                                </div>
                                <div class="form-group mb-2">
                                    <label class="text-capitalize"
                                           style="padding-left: 10px"><?php echo e(translate('messages.privateKey')); ?></label><br>
                                    <input type="text" class="form-control" name="private_key"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['private_key']:''); ?>">
                                </div>

                                <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>" onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>" class="btn btn-primary mb-2"><?php echo e(translate('messages.save')); ?></button>
                            <?php else: ?>
                                <button type="submit"
                                        class="btn btn-primary mb-2"><?php echo e(translate('messages.configure')); ?></button>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>
<script>
    <?php if(!isset($digital_payment) || $digital_payment['status']==0): ?>
        $('.digital_payment_methods').hide();
    <?php endif; ?>
    $(document).ready(function () {
        $('.digital_payment').on('click', function(){
            if($(this).val()=='0')
            {
                $('.digital_payment_methods').hide();
            }
            else
            {
                $('.digital_payment_methods').show();
            }
        })
    });
    function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        $temp.remove();

        toastr.success("<?php echo e(translate('messages.text_copied')); ?>");
    }

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crelocok/public_html/resources/views/admin-views/business-settings/payment-index.blade.php ENDPATH**/ ?>