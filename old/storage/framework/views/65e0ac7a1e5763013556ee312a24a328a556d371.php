<div class="col-12">
    <?php ($params=session('dash_params')); ?>
    <?php if($params['zone_id']!='all'): ?>
        <?php ($zone_name=\App\Models\Zone::where('id',$params['zone_id'])->first()->name); ?>
    <?php else: ?>
        <?php ($zone_name='All'); ?>
    <?php endif; ?>
    <label class="badge badge-soft-primary">( <?php echo e(translate('messages.zone')); ?> : <?php echo e($zone_name); ?> )</label>
</div>

<div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
    <!-- Card -->
    <a class="card card-hover-shadow h-100" href="<?php echo e(route('admin.dispatch.list',['searching_for_deliverymen'])); ?>"
       style="background: #0468A6;">
        <div class="card-body">
            <h6 class="card-subtitle"
                style="color: white!important;"><?php echo e(translate('order_texts.searching_for_delivery_man')); ?></h6>
            <div class="row align-items-center gx-2 mb-1">
                <div class="col-6">
                                        <span class="card-title h2" style="color: white!important;">
                                            <?php echo e($data['searching_for_dm']); ?>

                                        </span>
                </div>
                <div class="col-6 mt-2">
                    <i class="tio-man" style="font-size: 30px;color: white"></i>
                    <i class="tio-search"
                       style="font-size: 22px;margin-left:-10px;color: white"></i>
                </div>
            </div>
            <!-- End Row -->
        </div>
    </a>
    <!-- End Card -->
</div>

<div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
    <!-- Card -->
    <a class="card card-hover-shadow h-100" href="<?php echo e(route('admin.order.list',['accepted'])); ?>"
       style="background: #2AA26A;">
        <div class="card-body">
            <h6 class="card-subtitle"
                style="color: white!important;"><?php echo e(translate('order_texts.accepted_by_delivery_man')); ?></h6>

            <div class="row align-items-center gx-2 mb-1">
                <div class="col-6">
                        <span class="card-title h2" style="color: white!important;">
                            <?php echo e($data['accepted_by_dm']); ?>

                        </span>
                </div>

                <div class="col-6 mt-2">
                    <i class="tio-man" style="font-size: 30px;color: white"></i>
                    <i class="tio-checkmark-circle-outlined"
                       style="font-size: 22px;margin-left:-10px;color: white"></i>
                </div>
            </div>
            <!-- End Row -->
        </div>
    </a>
    <!-- End Card -->
</div>

<div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
    <!-- Card -->
    <a class="card card-hover-shadow h-100" href="<?php echo e(route('admin.order.list',['processing'])); ?>"
       style="background: #308575;">
        <div class="card-body">
            <h6 class="card-subtitle"
                style="color: white!important;"><?php echo e(translate('order_texts.preparing_in_restaurants')); ?></h6>

            <div class="row align-items-center gx-2 mb-1">
                <div class="col-6">
                        <span class="card-title h2" style="color: white!important;">
                            <?php echo e($data['preparing_in_rs']); ?>

                        </span>
                </div>

                <div class="col-6 mt-2">
                    <i class="tio-man" style="font-size: 30px;color: white"></i>
                    <i class="tio-restaurant"
                       style="font-size: 22px;margin-left:-10px;color: white"></i>
                </div>
            </div>
            <!-- End Row -->
        </div>
    </a>
    <!-- End Card -->
</div>

<div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
    <!-- Card -->
    <a class="card card-hover-shadow h-100" href="<?php echo e(route('admin.order.list',['item_on_the_way'])); ?>"
       style="background: #4D6F72;">
        <div class="card-body">
            <h6 class="card-subtitle"
                style="color: white!important;"><?php echo e(translate('order_texts.picked_up')); ?></h6>

            <div class="row align-items-center gx-2 mb-1">
                <div class="col-6">
                    <span class="card-title h2" style="color: white!important;">
                        <?php echo e($data['picked_up']); ?>

                    </span>
                </div>

                <div class="col-6 mt-2">
                    <i class="tio-bike" style="font-size: 30px;color: white"></i>
                    <i class="tio-gift"
                       style="font-size: 22px;margin-left:-6px;color: white"></i>
                </div>
            </div>
            <!-- End Row -->
        </div>
    </a>
    <!-- End Card -->
</div>

<div class="col-12">
    <div class="card card-body" style="background: #F5F5F5!important; box-shadow:0;">
        <div class="row gx-lg-4">
            <div class="col-sm-6 col-lg-3">
                <div class="media" style="cursor: pointer"
                     onclick="location.href='<?php echo e(route('admin.order.list',['delivered'])); ?>'">
                    <div class="media-body">
                        <h6 class="card-subtitle"><?php echo e(translate('messages.delivered')); ?></h6>
                        <span class="card-title h3">
                                             <?php echo e($data['delivered']); ?>

                                            </span>
                    </div>
                    <span class="icon icon-sm icon-soft-primary icon-circle ml-3">
                                          <i class="tio-checkmark-circle-outlined"></i>
                                        </span>
                </div>
                <div class="d-lg-none">
                    <hr>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 column-divider-sm">
                <div class="media" style="cursor: pointer"
                     onclick="location.href='<?php echo e(route('admin.order.list',['canceled'])); ?>'">
                    <div class="media-body">
                        <h6 class="card-subtitle"><?php echo e(translate('messages.canceled')); ?></h6>
                        <span
                            class="card-title h3"><?php echo e($data['canceled']); ?></span>
                    </div>
                    <span class="icon icon-sm icon-soft-primary icon-circle ml-3">
                                          <i class="tio-remove-from-trash"></i>
                                        </span>
                </div>
                <div class="d-lg-none">
                    <hr>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 column-divider-lg">
                <div class="media" style="cursor: pointer"
                     onclick="location.href='<?php echo e(route('admin.order.list',['failed'])); ?>'">
                    <div class="media-body">
                        <h6 class="card-subtitle"><?php echo e(translate('messages.payment')); ?> <?php echo e(translate('messages.failed')); ?></h6>
                        <span
                            class="card-title h3"><?php echo e($data['refund_requested']); ?></span>
                    </div>
                    <span class="icon icon-sm icon-soft-primary icon-circle ml-3">
                                          <i class="tio-hand-wave"></i>
                                        </span>
                </div>
                <div class="d-lg-none">
                    <hr>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 column-divider-sm">
                <div class="media" style="cursor: pointer"
                     onclick="location.href='<?php echo e(route('admin.order.list',['refunded'])); ?>'">
                    <div class="media-body">
                        <h6 class="card-subtitle"><?php echo e(translate('messages.refunded')); ?></h6>
                        <span
                            class="card-title h3"><?php echo e($data['refunded']); ?></span>
                    </div>
                    <span class="icon icon-sm icon-soft-primary icon-circle ml-3">
                                          <i class="tio-history"></i>
                                        </span>
                </div>
                <div class="d-lg-none">
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/crelocok/public_html/resources/views/admin-views/partials/_dashboard-order-stats.blade.php ENDPATH**/ ?>