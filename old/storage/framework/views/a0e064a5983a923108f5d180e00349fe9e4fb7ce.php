<?php $__env->startSection('title','Employee List'); ?>
<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="content container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(translate('messages.dashboard')); ?></a></li>
            <li class="breadcrumb-item" aria-current="page"><?php echo e(translate('messages.Employee')); ?></li>
            <li class="breadcrumb-item" aria-current="page"><?php echo e(translate('messages.list')); ?></li>
        </ol>
    </nav>
    <!-- Page Heading -->
    <div class="d-md-flex_ align-items-center justify-content-between mb-2">
        <div class="row">
            <div class="col-md-8">
                <h3 class="h3 mb-0 text-black-50"><?php echo e(translate('messages.Employee')); ?> <?php echo e(translate('messages.list')); ?></h3>
            </div>

            <div class="col-md-4">
                <a href="<?php echo e(route('admin.employee.add-new')); ?>" class="btn btn-primary  float-right">
                    <i class="tio-add-circle"></i>
                    <span class="text"><?php echo e(translate('messages.add')); ?> <?php echo e(translate('messages.new')); ?></span>
                </a>
            </div>
        </div>
    </div>

    <div class="row" style="margin-top: 20px">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header py-0">
                    <h5><?php echo e(translate('messages.Employee')); ?> <?php echo e(translate('messages.table')); ?> <span class="badge badge-soft-dark ml-2" id="itemCount"><?php echo e($em->total()); ?></span></h5>
                    <form action="javascript:" id="search-form">
                        <?php echo csrf_field(); ?>
                        <!-- Search -->
                        <div class="input-group input-group-merge input-group-flush">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tio-search"></i>
                                </div>
                            </div>
                            <input id="datatableSearch_" type="search" name="search" class="form-control" placeholder="<?php echo e(translate('messages.search')); ?>" aria-label="Search">
                            <button type="submit" class="btn btn-light"><?php echo e(translate('messages.search')); ?></button>
                        </div>
                        <!-- End Search -->
                    </form>
                </div>
                <div class="card-body" style="padding: 0">
                    <div class="table-responsive">
                        <table id="datatable"
                               class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                               style="width: 100%"
                               data-hs-datatables-options='{
                                 "order": [],
                                 "orderCellsTop": true,
                                 "paging":false
                               }'>
                            <thead class="thead-light">
                            <tr>
                                <th><?php echo e(translate('messages.#')); ?></th>
                                <th><?php echo e(translate('messages.name')); ?></th>
                                <th><?php echo e(translate('messages.email')); ?></th>
                                <th><?php echo e(translate('messages.phone')); ?></th>
                                <th><?php echo e(translate('messages.Role')); ?></th>
                                <th style="width: 50px"><?php echo e(translate('messages.action')); ?></th>
                            </tr>
                            </thead>
                            <tbody id="set-rows">
                            <?php $__currentLoopData = $em; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e($k+$em->firstItem()); ?></th>
                                    <td class="text-capitalize"><?php echo e($e['f_name']); ?> <?php echo e($e['l_name']); ?></td>
                                    <td >
                                      <?php echo e($e['email']); ?>

                                    </td>
                                    <td><?php echo e($e['phone']); ?></td>
                                    <td><?php echo e($e->role?$e->role['name']:translate('messages.role_deleted')); ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-white"
                                            href="<?php echo e(route('admin.employee.edit',[$e['id']])); ?>" title="<?php echo e(translate('messages.edit')); ?> <?php echo e(translate('messages.Employee')); ?>"><i class="tio-edit"></i>
                                        </a>
                                        <a class="btn btn-sm btn-danger" href="javascript:"
                                            onclick="form_alert('employee-<?php echo e($e['id']); ?>','<?php echo e(translate('messages.Want_to_delete_this_role')); ?>')" title="<?php echo e(translate('messages.delete')); ?> <?php echo e(translate('messages.Employee')); ?>"><i class="tio-delete-outlined"></i>
                                        </a>
                                        <form action="<?php echo e(route('admin.employee.delete',[$e['id']])); ?>"
                                                method="post" id="employee-<?php echo e($e['id']); ?>">
                                            <?php echo csrf_field(); ?> <?php echo method_field('delete'); ?>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="page-area">
                        <table>
                            <tfoot>
                            <?php echo $em->links(); ?>

                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>
    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
        $('#search-form').on('submit', function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post({
                url: '<?php echo e(route('admin.employee.search')); ?>',
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

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crelocok/public_html/resources/views/admin-views/employee/list.blade.php ENDPATH**/ ?>