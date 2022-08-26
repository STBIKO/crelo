<?php $__env->startSection('title','Terms & Conditions'); ?>

<?php $__env->startSection('content'); ?>
    <main>
        <div class="main-body-div">
            <!-- Top Start -->
            <section class="top-start" style="min-height: 100px">
                <div class="container">
                    <div class="row">
                        <div class="col-12 mt-2 text-center">
                           <h1><?php echo e(translate('messages.terms_and_condition')); ?></h1>
                        </div>
                        <div class="col-12">
                            <?php echo $data; ?>

                        </div>
                    </div>
                </div>
            </section>
            <!-- Top End -->
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.landing.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crelocok/public_html/resources/views/terms-and-conditions.blade.php ENDPATH**/ ?>