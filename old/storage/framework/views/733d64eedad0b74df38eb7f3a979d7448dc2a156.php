<?php $__env->startSection('title',translate('messages.modules')); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title"><?php echo e(translate('messages.module')); ?></h1>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="card mt-3">
            <div class="card-header pb-0">
                <h5><?php echo e(translate('messages.module')); ?> <?php echo e(translate('messages.list')); ?><span class="badge badge-soft-dark ml-2" id="itemCount"><?php echo e($modules->total()); ?></span></h5>
                
            </div>
            <div class="card-body">
                <div class="table-responsive datatable-custom">
                    <table id="columnSearchDatatable"
                        class="table table-borderless table-thead-bordered table-align-middle" style="width:100%;"
                        data-hs-datatables-options='{
                            "isResponsive": false,
                            "isShowPaging": false,
                            "paging":false,
                        }'>
                        <thead class="thead-light">
                            <tr>
                                <th style="width: 5%"><?php echo e(translate('messages.#')); ?></th>
                                <th style="width: 10%"><?php echo e(translate('messages.id')); ?></th>
                                <th style="width: 20%"><?php echo e(translate('messages.name')); ?></th>
                                <th style="width: 20%"><?php echo e(translate('messages.module_type')); ?></th>
                                <th style="width: 10%"><?php echo e(translate('messages.status')); ?></th>
                                <th style="width: 20%"><?php echo e(translate('messages.store_count')); ?></th>
                                <th style="width: 15%"><?php echo e(translate('messages.action')); ?></th>
                            </tr>
                        </thead>

                        <tbody id="table-div">
                        <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($key+$modules->firstItem()); ?></td>
                                <td><?php echo e($module->id); ?></td>
                                <td>
                                    <span class="d-block font-size-sm text-body">
                                        <?php echo e(Str::limit($module['module_name'], 20,'...')); ?>

                                    </span>
                                </td>
                                <td>
                                    <span class="d-block font-size-sm text-body text-capitalize">
                                        <?php echo e(Str::limit($module['module_type'], 20,'...')); ?>

                                    </span>
                                </td>
                                <td>
                                    <label class="toggle-switch toggle-switch-sm" for="stocksCheckbox<?php echo e($module->id); ?>">
                                    <input type="checkbox" onclick="location.href='<?php echo e(route('admin.module.status',[$module['id'],$module->status?0:1])); ?>'"class="toggle-switch-input" id="stocksCheckbox<?php echo e($module->id); ?>" <?php echo e($module->status?'checked':''); ?>>
                                        <span class="toggle-switch-label">
                                            <span class="toggle-switch-indicator"></span>
                                        </span>
                                    </label>
                                </td>
                                <td><?php echo e($module->stores_count); ?></td>
                                <td>
                                    <a class="btn btn-sm btn-white"
                                        href="<?php echo e(route('admin.module.edit',[$module['id']])); ?>" title="<?php echo e(translate('messages.edit')); ?> <?php echo e(translate('messages.category')); ?>"><i class="tio-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer page-area">
                <!-- Pagination -->
                <div class="row justify-content-center justify-content-sm-between align-items-sm-center"> 
                    <div class="col-sm-auto">
                        <div class="d-flex justify-content-center justify-content-sm-end">
                            <!-- Pagination -->
                            <?php echo $modules->links(); ?>

                        </div>
                    </div>
                </div>
                <!-- End Pagination -->
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>
    <script>
        $(document).on('ready', function () {
            // INITIALIZATION OF DATATABLES
            // =======================================================
            

            


            // INITIALIZATION OF SELECT2
            // =======================================================
            $('.js-select2-custom').each(function () {
                var select2 = $.HSCore.components.HSSelect2.init($(this));
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crelocok/public_html/resources/views/admin-views/module/index.blade.php ENDPATH**/ ?>