<?php $__env->startSection('title', translate('DB_clean')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-sm mb-2 mb-sm-0">
                <h1 class="page-header-title"><?php echo e(translate('Clean database')); ?></h1>
            </div>
        </div>
    </div>
    <!-- End Page Header -->
    <div class="row">
        <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
            <div class="alert alert-danger mx-2" role="alert">
                <?php echo e(translate('This_page_contains_sensitive_information.Make_sure_before_changing.')); ?>

            </div>
            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                <form action="<?php echo e(route('admin.business-settings.clean-db')); ?>" method="post"
                      enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <?php $__currentLoopData = $tables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$table): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-3">
                                <div class="form-group form-check">
                                    <input type="checkbox" name="tables[]" value="<?php echo e($table); ?>"
                                           class="form-check-input"
                                           id="<?php echo e($table); ?>">
                                    <label class="form-check-label text-dark"
                                           style="<?php echo e(Session::get('direction') === "rtl" ? 'margin-right: 1.25rem;' : ''); ?>;"
                                           for="<?php echo e($table); ?>"><?php echo e(Str::limit($table, 20)); ?></label>
                                    <span class="badge-pill badge-secondary mx-2"><?php echo e($rows[$key]); ?></span>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <hr>
                    <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                            onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>"
                            class="btn btn-primary mb-2 float-right"><?php echo e(translate('Clear')); ?></button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>
<script>
    var store_dependent = ['stores','store_schedule', 'discounts'];
    var order_dependent = ['order_delivery_histories','d_m_reviews', 'delivery_histories', 'track_deliverymen', 'order_details', 'reviews'];
    var zone_dependent = ['stores','vendors', 'orders'];
    $(document).ready(function () {
        $('.form-check-input').on('change', function(event){
            if($(this).is(':checked')){
                if(event.target.id == 'zones' || event.target.id == 'stores' || event.target.id == 'vendors') {
                    checked_stores(true);
                }

                if(event.target.id == 'zones' || event.target.id == 'orders') {
                    checked_orders(true);
                }                
            } else {
                if(store_dependent.includes(event.target.id)) {
                    if(check_store() || check_zone()){
                        console.log('store_checked');
                        $(this).prop('checked', true);
                    }
                } else if(order_dependent.includes(event.target.id)) {
                    if(check_orders() || check_zone()){
                        $(this).prop('checked', true);
                    }
                } else if(zone_dependent.includes(event.target.id)) {
                    if(check_zone()){
                        $(this).prop('checked', true);
                    }
                } 
            }

        });

        $("#purchase_code_div").click(function () {
            var type = $('#purchase_code').get(0).type;
            if (type === 'password') {
                $('#purchase_code').get(0).type = 'text';
            } else if (type === 'text') {
                $('#purchase_code').get(0).type = 'password';
            }
        });
    })

    function checked_stores(status) {
        store_dependent.forEach(function(value){
            $('#'+value).prop('checked', status);
        });
        $('#vendors').prop('checked', status);
        
    }

    function checked_orders(status) {
        order_dependent.forEach(function(value){
            $('#'+value).prop('checked', status);
        });
        $('#orders').prop('checked', status);
    }



    function check_zone() {
        if($('#zones').is(':checked')) {
            toastr.warning("<?php echo e(translate('messages.table_unchecked_warning',['table'=>'zones'])); ?>");
            return true;
        }
        return false;
    }

    function check_orders() {
        if($('#orders').is(':checked')) {
            toastr.warning("<?php echo e(translate('messages.table_unchecked_warning',['table'=>'orders'])); ?>");
            return true;
        }
        return false;
    }

    function check_store() {
        if($('#stores').is(':checked') || $('#vendors').is(':checked')) {
            toastr.warning("<?php echo e(translate('messages.table_unchecked_warning',['table'=>'stores/vendors'])); ?>");
            return true;
        }
        return false;
    }

</script>

<script>
    $("form").on('submit',function(e) {
        e.preventDefault();
        Swal.fire({
            title: '<?php echo e(translate('Are you sure?')); ?>',
            text: "<?php echo e(translate('Sensitive_data! Make_sure_before_changing.')); ?>",
            type: 'warning',
            showCancelButton: true,
            cancelButtonColor: 'default',
            confirmButtonColor: '#FC6A57',
            cancelButtonText: 'No',
            confirmButtonText: 'Yes',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                this.submit();
            }else{
                e.preventDefault();
                toastr.success("<?php echo e(translate('Cancelled')); ?>");
                location.reload();
            }
        })
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crelocok/public_html/resources/views/admin-views/business-settings/db-index.blade.php ENDPATH**/ ?>