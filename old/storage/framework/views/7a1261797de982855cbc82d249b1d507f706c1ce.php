<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="card mt-6">
            <div class="card-body">
                <div class="card-header">
                    <div class="row" style="width: 100%">
                        <div class="col-12">
                            <?php if(session()->has('error')): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo e(session('error')); ?>

                                </div>
                            <?php endif; ?>
                            <div class="mar-ver pad-btm text-center">
                                <h1 class="h3">Purchase Code</h1>
                                <p>
                                    Provide your codecanyon purchase code.<br>
                                    <a href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code"
                                       class="text-info">Where to get purchase code?</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pt-5">
                    <div class="col-3"></div>
                    <div class="col-md-6">
                        <div class="text-muted font-13">
                            <form method="POST" action="<?php echo e(route('purchase.code')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label for="purchase_code">Codecanyon Username</label>
                                    <input type="text" value="<?php echo e(env('BUYER_USERNAME')); ?>" class="form-control"
                                           id="username"
                                           name="username" required>
                                </div>

                                <div class="form-group">
                                    <label for="purchase_code">Purchase Code</label>
                                    <input type="text" value="<?php echo e(env('PURCHASE_CODE')); ?>" class="form-control"
                                           id="purchase_key"
                                           name="purchase_key" required>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-info">Continue</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-3"></div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.blank', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crelocok/public_html/resources/views/installation/step2.blade.php ENDPATH**/ ?>