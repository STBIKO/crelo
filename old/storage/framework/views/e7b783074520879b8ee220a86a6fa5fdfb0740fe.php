<?php $__env->startSection('title','Review List'); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title"><?php echo e(translate('messages.deliveryman')); ?> <?php echo e(translate('messages.reviews')); ?><span class="badge badge-soft-dark ml-2" id="itemCount"><?php echo e($reviews->total()); ?></span></h1>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="row gx-2 gx-lg-3">
            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                <!-- Card -->
                <div class="card">
                    <!-- Header -->
                    <div class="card-header">
                        <h5 class="card-header-title"></h5>
                    </div>
                    <!-- End Header -->

                    <!-- Table -->
                    <div class="table-responsive datatable-custom">
                        <table id="columnSearchDatatable"
                               class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                               data-hs-datatables-options='{
                                 "order": [],
                                 "orderCellsTop": true,
                                 "paging": false
                               }'>
                            <thead class="thead-light">
                            <tr>
                                <th><?php echo e(translate('messages.#')); ?></th>
                                <th style="width: 30%"><?php echo e(translate('messages.deliveryman')); ?></th>
                                <th style="width: 25%"><?php echo e(translate('messages.customer')); ?></th>
                                <th><?php echo e(translate('messages.review')); ?></th>
                                <th><?php echo e(translate('messages.rating')); ?></th>
                                <th><?php echo e(translate('messages.status')); ?></th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(isset($review->delivery_man)): ?>
                                    <tr>
                                        <td><?php echo e($key+1); ?></td>
                                        <td>
                                        <span class="d-block font-size-sm text-body">
                                            <a href="<?php echo e(route('admin.delivery-man.preview',[$review['delivery_man_id']])); ?>">
                                                <?php echo e($review->delivery_man->f_name.' '.$review->delivery_man->l_name); ?>

                                            </a>
                                        </span>
                                        </td>
                                        <td>
                                            <?php if($review->customer): ?>
                                            <a href="<?php echo e(route('admin.customer.view',[$review->user_id])); ?>">
                                                <?php echo e($review->customer?$review->customer->f_name:""); ?> <?php echo e($review->customer?$review->customer->l_name:""); ?>

                                            </a>                                                
                                            <?php else: ?>
                                                <?php echo e(translate('messages.customer_not_found')); ?>

                                            <?php endif; ?>

                                        </td>
                                        <td>
                                            <?php echo e($review->comment); ?>

                                        </td>
                                        <td>
                                            <label class="badge badge-soft-info">
                                                <?php echo e($review->rating); ?> <i class="tio-star"></i>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="toggle-switch toggle-switch-sm" for="reviewCheckbox<?php echo e($review->id); ?>">
                                                <input type="checkbox" onclick="status_form_alert('status-<?php echo e($review['id']); ?>','<?php echo e($review->status?translate('messages.you_want_to_hide_this_review_for_customer'):translate('messages.you_want_to_show_this_review_for_customer')); ?>', event)" class="toggle-switch-input" id="reviewCheckbox<?php echo e($review->id); ?>" <?php echo e($review->status?'checked':''); ?>>
                                                <span class="toggle-switch-label">
                                                    <span class="toggle-switch-indicator"></span>
                                                </span>
                                            </label>
                                            <form action="<?php echo e(route('admin.delivery-man.reviews.status',[$review['id'],$review->status?0:1])); ?>" method="get" id="status-<?php echo e($review['id']); ?>">
                                            </form>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <hr>
                        <table>
                            <tfoot>
                            <?php echo $reviews->links(); ?>

                            </tfoot>
                        </table>
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

        });

        function status_form_alert(id, message, e) {
            e.preventDefault();
            Swal.fire({
                title: '<?php echo e(translate('messages.are_you_sure')); ?>',   
                text: message,
                type: 'warning',
                showCancelButton: true,
                cancelButtonColor: 'default',
                confirmButtonColor: '#FC6A57',
                cancelButtonText: 'No',
                confirmButtonText: 'Yes',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $('#'+id).submit()
                }
            })
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crelocok/public_html/resources/views/admin-views/delivery-man/reviews-list.blade.php ENDPATH**/ ?>