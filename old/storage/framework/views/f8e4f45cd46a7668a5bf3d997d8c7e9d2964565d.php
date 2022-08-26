<?php $__env->startSection('title', 'Contact Us'); ?>

<?php $__env->startSection('content'); ?>
    <main>
        <div class="main-body-div">
            <!-- Top Start -->
            <section class="top-start" style="min-height: 100px">
                <div class="container">
                    <div class="row">
                        <div class="col-12 mt-2 text-center">
                            
                        </div>
                        <div class="col-12">
                            <center>
                                <img class="img-fluid w-20" src="<?php echo e(asset('public/assets/landing/image/contact.png')); ?>">
                                <h6 class="mt-4">
                                    Phone : <?php echo e(\App\CentralLogics\Helpers::get_settings('phone')); ?>,
                                    Email : <?php echo e(\App\CentralLogics\Helpers::get_settings('email_address')); ?>

                                </h6><br>
                                <h6>
                                    Address : <?php echo e(\App\CentralLogics\Helpers::get_settings('address')); ?>

                                </h6>
                            </center>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Top End -->
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.landing.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crelocok/public_html/resources/views/contact-us.blade.php ENDPATH**/ ?>