<?php $__env->startSection('title',translate('messages.deliverymen')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title"><i class="tio-filter-list"></i> <?php echo e(translate('messages.deliverymen')); ?></h1>
                </div>
                
                
                <?php if(!isset(auth('admin')->user()->zone_id)): ?>
                <div class="col-sm-auto" style="width: 306px;">
                    <select name="zone_id" class="form-control js-select2-custom"
                            onchange="set_zone_filter('<?php echo e(route('admin.delivery-man.list')); ?>', this.value)">
                        <option value="all">All Zones</option>
                        <?php $__currentLoopData = \App\Models\Zone::orderBy('name')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $z): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option
                                value="<?php echo e($z['id']); ?>" <?php echo e(isset($zone) && $zone->id == $z['id']?'selected':''); ?>>
                                <?php echo e($z['name']); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="row gx-2 gx-lg-3">
            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                <!-- Card -->
                <div class="card">
                    <!-- Header -->
                    <div class="card-header p-1">
                        <h5><?php echo e(translate('messages.deliveryman')); ?> <?php echo e(translate('messages.list')); ?><span class="badge badge-soft-dark ml-2" id="itemCount"><?php echo e($delivery_men->total()); ?></span></h5>
                        <form action="javascript:" id="search-form" >
                                        <!-- Search -->
                            <?php echo csrf_field(); ?>
                            <div class="input-group input-group-merge input-group-flush">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="tio-search"></i>
                                    </div>
                                </div>
                                <input id="datatableSearch_" type="search" name="search" class="form-control"
                                        placeholder="<?php echo e(translate('messages.search')); ?>" aria-label="Search" required>
                                <button type="submit" class="btn btn-light"><?php echo e(translate('messages.search')); ?></button>

                            </div>
                            <!-- End Search -->
                        </form>
                    </div>
                    <!-- End Header -->

                    <!-- Table -->
                    <div class="table-responsive datatable-custom">
                        <table id="columnSearchDatatable"
                               class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                               data-hs-datatables-options='{
                                 "order": [],
                                 "orderCellsTop": true,
                                 "paging":false
                               }'>
                            <thead class="thead-light">
                            <tr>
                                <th class="text-capitalize"><?php echo e(translate('messages.#')); ?></th>
                                <th class="text-capitalize"><?php echo e(translate('messages.name')); ?></th>
                                <th class="text-capitalize"><?php echo e(translate('messages.zone')); ?></th>
                                <th class="text-capitalize"><?php echo e(translate('messages.availability')); ?> <?php echo e(translate('messages.status')); ?></th>
                                <th class="text-capitalize"><?php echo e(translate('messages.phone')); ?></th>
                                <th class="text-capitalize"><?php echo e(translate('messages.action')); ?></th>
                            </tr>
                            </thead>

                            <tbody id="set-rows">
                            <?php $__currentLoopData = $delivery_men; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$dm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($key+$delivery_men->firstItem()); ?></td>
                                    <td>
                                        <a class="media align-items-center" href="<?php echo e(route('admin.delivery-man.preview',[$dm['id']])); ?>">
                                            <img class="avatar avatar-lg mr-3" onerror="this.src='<?php echo e(asset('public/assets/admin/img/160x160/img1.jpg')); ?>'"
                                                    src="<?php echo e(asset('storage/app/public/delivery-man')); ?>/<?php echo e($dm['image']); ?>" alt="<?php echo e($dm['f_name']); ?> <?php echo e($dm['l_name']); ?>">
                                            <div class="media-body">
                                                <h5 class="text-hover-primary mb-0"><?php echo e($dm['f_name'].' '.$dm['l_name']); ?></h5>
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <?php if($dm->zone): ?>
                                        <label class="badge badge-soft-info"><?php echo e($dm->zone->name); ?></label>
                                        <?php else: ?>
                                        <label class="badge badge-soft-warning"><?php echo e(translate('messages.zone').' '.translate('messages.deleted')); ?></label>
                                        <?php endif; ?>
                                        
                                    </td>
                                    <td class="text-center">
                                        <?php if($dm->application_status == 'approved'): ?>
                                            <?php if($dm->active): ?>
                                            <label class="badge badge-soft-primary"><?php echo e(translate('messages.online')); ?></label>
                                            <?php else: ?>
                                            <label class="badge badge-soft-secondary"><?php echo e(translate('messages.offline')); ?></label>
                                            <?php endif; ?>
                                        <?php elseif($dm->application_status == 'denied'): ?>
                                            <label class="badge badge-soft-danger"><?php echo e(translate('messages.denied')); ?></label>
                                        <?php else: ?>
                                            <label class="badge badge-soft-info"><?php echo e(translate('messages.pending')); ?></label>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a class="deco-none" href="tel:<?php echo e($dm['phone']); ?>"><?php echo e($dm['phone']); ?></a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-white" href="<?php echo e(route('admin.delivery-man.edit',[$dm['id']])); ?>" title="<?php echo e(translate('messages.edit')); ?>"><i class="tio-edit"></i>
                                        </a>
                                        <a class="btn btn-sm btn-white text-danger" href="javascript:" onclick="form_alert('delivery-man-<?php echo e($dm['id']); ?>','Want to remove this deliveryman ?')" title="<?php echo e(translate('messages.delete')); ?>"><i class="tio-delete-outlined"></i>
                                        </a>
                                        <form action="<?php echo e(route('admin.delivery-man.delete',[$dm['id']])); ?>" method="post" id="delivery-man-<?php echo e($dm['id']); ?>">
                                            <?php echo csrf_field(); ?> <?php echo method_field('delete'); ?>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <hr>

                        <div class="page-area">
                            <table>
                                <tfoot>
                                <?php echo $delivery_men->links(); ?>

                                </tfoot>
                            </table>
                        </div>

                    </div>
                    <!-- End Table -->
                </div>
                <!-- End Card -->
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>
    <script>
        $(document).on('ready', function () {
            // INITIALIZATION OF DATATABLES
            // =======================================================
            var datatable = $.HSCore.components.HSDatatables.init($('#columnSearchDatatable'));

            $('#column1_search').on('keyup', function () {
                datatable
                    .columns(1)
                    .search(this.value)
                    .draw();
            });

            $('#column2_search').on('keyup', function () {
                datatable
                    .columns(2)
                    .search(this.value)
                    .draw();
            });

            $('#column3_search').on('keyup', function () {
                datatable
                    .columns(3)
                    .search(this.value)
                    .draw();
            });

            $('#column4_search').on('keyup', function () {
                datatable
                    .columns(4)
                    .search(this.value)
                    .draw();
            });


            // INITIALIZATION OF SELECT2
            // =======================================================
            $('.js-select2-custom').each(function () {
                var select2 = $.HSCore.components.HSSelect2.init($(this));
            });
        });
    </script>

    <script>
        $('#search-form').on('submit', function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post({
                url: '<?php echo e(route('admin.delivery-man.search')); ?>',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('#loading').show();
                },
                success: function (data) {
                    $('#set-rows').html(data.view);
                    $('#itemCount').html(data.count);
                    $('.page-area').hide();
                },
                complete: function () {
                    $('#loading').hide();
                },
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crelocok/public_html/resources/views/admin-views/delivery-man/list.blade.php ENDPATH**/ ?>