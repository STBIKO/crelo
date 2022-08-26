<!-- Header -->
<div class="card-header">
    <h5 class="card-header-title">
        <i class="tio-bike"></i> <?php echo e(translate('messages.top_deliveryman')); ?>

    </h5>
    <?php ($params=session('dash_params')); ?>
    <?php if($params['zone_id']!='all'): ?>
        <?php ($zone_name=\App\Models\Zone::where('id',$params['zone_id'])->first()->name); ?>
    <?php else: ?>
        <?php ($zone_name='All'); ?>
    <?php endif; ?>
    <label class="badge badge-soft-primary">( <?php echo e(translate('messages.zone')); ?> : <?php echo e($zone_name); ?> )</label>
</div>
<!-- End Header -->

<!-- Body -->
<div class="card-body">
    <div class="row">
        <?php $__currentLoopData = $top_deliveryman; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 col-6 mt-2" style="padding-left: 6px;padding-right: 6px">
                <div class="grid-card" style="min-height: 170px">
                    <label class="label_1">Orders : <?php echo e($item['order_count']); ?></label>
                    <center class="mt-6">
                        <img style="border-radius: 50%;width: 60px;height: 60px"
                             onerror="this.src='<?php echo e(asset('public/assets/admin/img/160x160/img1.jpg')); ?>'"
                             src="<?php echo e(asset('storage/app/public/delivery-man')); ?>/<?php echo e($item['image']??''); ?>">
                    </center>
                    <div class="text-center mt-2">
                                            <span class=""
                                                  style="font-size: 10px"><?php echo e($item['f_name']??'Not exist'); ?></span>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<!-- End Body -->
<?php /**PATH /home/crelocok/public_html/resources/views/admin-views/partials/_top-deliveryman.blade.php ENDPATH**/ ?>