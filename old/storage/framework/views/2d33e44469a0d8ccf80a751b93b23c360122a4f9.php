<!-- Header -->
<div class="card-header">
    <h5 class="card-header-title">
        <i class="tio-medal"></i> <?php echo e(translate('messages.top_stores')); ?>

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
        <div class="col-12">
            <table class="table">
                <tbody>
                <?php $__currentLoopData = $top_restaurants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr onclick="location.href='<?php echo e(route('admin.vendor.view', $item->id)); ?>'"
                        style="cursor: pointer">
                        <td scope="row">
                            <img height="35" style="border-radius: 5px"
                                 onerror="this.src='<?php echo e(asset('public/assets/admin/img/160x160/img1.jpg')); ?>'"
                                 src="<?php echo e(asset('storage/app/public/store')); ?>/<?php echo e($item['logo']); ?>">
                            <span class="ml-2">
                                    <?php echo e(Str::limit($item->name??translate('messages.store deleted!'), 20, '...')); ?>

                            </span>
                        </td>
                        <td>
                            <span style="font-size: 18px">
                                <?php echo e($item['order_count']); ?> <i class="tio-shopping-cart text-primary"></i>
                            </span>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- End Body -->
<?php /**PATH /home/crelocok/public_html/resources/views/admin-views/partials/_top-restaurants.blade.php ENDPATH**/ ?>