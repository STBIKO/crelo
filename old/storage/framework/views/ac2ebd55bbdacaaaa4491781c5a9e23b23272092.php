<?php $__env->startSection('title',translate('messages.add_new_addon')); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title"><?php echo e(translate('messages.addon')); ?></h1>
                </div>
                <?php if(isset($addon)): ?>
                <a href="<?php echo e(route('admin.addon.add-new')); ?>" class="btn btn-primary pull-right"><i class="tio-add-circle"></i> <?php echo e(translate('messages.add')); ?> <?php echo e(translate('messages.new')); ?> <?php echo e(translate('messages.addon')); ?></a>
                <?php endif; ?>
            </div>
        </div>
        <!-- End Page Header -->
        <?php ($language=\App\Models\BusinessSetting::where('key','language')->first()); ?>
        <?php ($language = $language->value ?? null); ?>
        <?php ($default_lang = 'en'); ?>
        <div class="card">
            <div class="card-header"> <h5><?php echo e(translate('messages.add').' '.translate('messages.new')); ?> <?php echo e(translate('messages.addon')); ?></h5></div>
            <div class="card-body">
                <form action="<?php echo e(isset($addon)?route('admin.addon.update',[$addon['id']]):route('admin.addon.store')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php if($language): ?>
                        <?php ($default_lang = json_decode($language)[0]); ?>
                        <ul class="nav nav-tabs mb-4">
                            <?php $__currentLoopData = json_decode($language); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="nav-item">
                                    <a class="nav-link lang_link <?php echo e($lang == $default_lang? 'active':''); ?>" href="#" id="<?php echo e($lang); ?>-link"><?php echo e(\App\CentralLogics\Helpers::get_language_name($lang).'('.strtoupper($lang).')'); ?></a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-12">
                        <?php if($language): ?>
                            <?php $__currentLoopData = json_decode($language); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-group <?php echo e($lang != $default_lang ? 'd-none':''); ?> lang_form" id="<?php echo e($lang); ?>-form">
                                    <label class="input-label" for="exampleFormControlInput1"><?php echo e(translate('messages.name')); ?> (<?php echo e(strtoupper($lang)); ?>)</label>
                                    <input type="text" name="name[]" class="form-control" placeholder="<?php echo e(translate('messages.new_addon')); ?>" maxlength="191" <?php echo e($lang == $default_lang? 'required':''); ?> oninvalid="document.getElementById('en-link').click()">
                                </div>
                                <input type="hidden" name="lang[]" value="<?php echo e($lang); ?>">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <div class="form-group">
                                <label class="input-label" for="exampleFormControlInput1"><?php echo e(translate('messages.name')); ?></label>
                                <input type="text" name="name" class="form-control" placeholder="<?php echo e(translate('messages.new_addon')); ?>" value="<?php echo e(old('name')); ?>" required maxlength="191">
                            </div>
                            <input type="hidden" name="lang[]" value="<?php echo e($lang); ?>">
                        <?php endif; ?>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="input-label" for="exampleFormControlSelect1"><?php echo e(translate('messages.store')); ?><span
                                        class="input-label-secondary"></span></label>
                                <select name="store_id" id="store_id" class="js-data-example-ajax form-control"  data-placeholder="<?php echo e(translate('messages.select')); ?> <?php echo e(translate('messages.store')); ?>" oninvalid="this.setCustomValidity('<?php echo e(translate('messages.please_select_store')); ?>')">

                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="input-label" for="exampleFormControlInput1"><?php echo e(translate('messages.price')); ?></label>
                                <input type="number" min="0" max="999999999999.99" name="price" step="0.01" value="<?php echo e(old('price')); ?>" class="form-control" placeholder="100" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><?php echo e(isset($addon)?translate('messages.update'):translate('messages.add')); ?></button>
                    </div>
                    
                </form>
            </div>
        </div>

        <div class="card mt-1">
            <div class="card-header">
                <h5 class="card-header-title"> <?php echo e(translate('messages.addon')); ?> <?php echo e(translate('messages.list')); ?><span class="badge badge-soft-dark ml-2" id="itemCount"><?php echo e($addons->total()); ?></span></h5>
                <div class="col-sm-auto" style="width: 306px;">
                    <select name="store_id" id="store" onchange="set_store_filter('<?php echo e(route('admin.addon.add-new')); ?>',this.value)" data-placeholder="<?php echo e(translate('messages.select')); ?> <?php echo e(translate('messages.store')); ?>" class="js-data-example-ajax form-control"   title="Select Restaurant">
                    <?php if(isset($store)): ?>    
                    <option value="<?php echo e($store->id); ?>" selected><?php echo e($store->name); ?></option>
                    <?php else: ?>
                    <option value="all" selected><?php echo e(translate('messages.all_stores')); ?></option>
                    <?php endif; ?>
                    </select>
                </div>
            </div>
            <div class="card-body">
                <div class="row justify-content-between align-items-center flex-grow-1 mb-1">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <form id="search-form">
                            <?php echo csrf_field(); ?>
                            <!-- Search -->
                            <div class="input-group input-group-merge input-group-flush">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="tio-search"></i>
                                    </div>
                                </div>
                                <input id="datatableSearch" type="search" name="search" class="form-control" placeholder="<?php echo e(translate('messages.search_addons')); ?>" aria-label="Search addons">
                            </div>
                            <!-- End Search -->
                        </form>
                    </div>

                    <div class="col-auto">
                        <div class="hs-unfold">
                        <a class="js-hs-unfold-invoker btn btn-white" href="javascript:;"
                            data-hs-unfold-options='{
                            "target": "#showHideDropdown",
                            "type": "css-animation"
                            }'>
                            <i class="tio-table mr-1"></i> <?php echo e(translate('messages.columns')); ?> <span class="badge badge-soft-dark rounded-circle ml-1">5</span>
                        </a>

                        <div id="showHideDropdown" class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-right dropdown-card" style="width: 15rem;">
                            <div class="card card-sm">
                                <div class="card-body">
                                    
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="mr-2"><?php echo e(translate('messages.name')); ?></span>
                                        <!-- Checkbox Switch -->
                                        <label class="toggle-switch toggle-switch-sm" for="toggleColumn_name">
                                            <input type="checkbox" class="toggle-switch-input" id="toggleColumn_name" checked>
                                            <span class="toggle-switch-label">
                                            <span class="toggle-switch-indicator"></span>
                                            </span>
                                        </label>
                                    <!-- End Checkbox Switch -->
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="mr-2"><?php echo e(translate('messages.price')); ?></span>
                                        <!-- Checkbox Switch -->
                                        <label class="toggle-switch toggle-switch-sm" for="toggleColumn_price">
                                            <input type="checkbox" class="toggle-switch-input" id="toggleColumn_price" checked>
                                            <span class="toggle-switch-label">
                                            <span class="toggle-switch-indicator"></span>
                                            </span>
                                        </label>
                                        <!-- End Checkbox Switch -->
                                    </div>


                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="mr-2"><?php echo e(translate('messages.store')); ?></span>

                                        <!-- Checkbox Switch -->
                                        <label class="toggle-switch toggle-switch-sm" for="toggleColumn_vendor">
                                            <input type="checkbox" class="toggle-switch-input" id="toggleColumn_vendor" checked>
                                            <span class="toggle-switch-label">
                                            <span class="toggle-switch-indicator"></span>
                                            </span>
                                        </label>
                                        <!-- End Checkbox Switch -->
                                    </div>

                                
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="mr-2"><?php echo e(translate('messages.status')); ?></span>

                                        <!-- Checkbox Switch -->
                                        <label class="toggle-switch toggle-switch-sm" for="toggleColumn_status">
                                            <input type="checkbox" class="toggle-switch-input" id="toggleColumn_status" checked>
                                            <span class="toggle-switch-label">
                                            <span class="toggle-switch-indicator"></span>
                                            </span>
                                        </label>
                                        <!-- End Checkbox Switch -->
                                    </div>
                                    
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="mr-2"><?php echo e(translate('messages.action')); ?></span>

                                        <!-- Checkbox Switch -->
                                        <label class="toggle-switch toggle-switch-sm" for="toggleColumn_action">
                                            <input type="checkbox" class="toggle-switch-input" id="toggleColumn_action" checked>
                                            <span class="toggle-switch-label">
                                            <span class="toggle-switch-indicator"></span>
                                            </span>
                                        </label>
                                        <!-- End Checkbox Switch -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <!-- End Unfold -->
                    </div>
                </div>
                <div class="table-responsive datatable-custom">
                    <table id="datatable" class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table"  data-hs-datatables-options='{
                        "search": "#datatableSearch",
                        "entries": "#datatableEntries",
                        "isResponsive": false,
                        "isShowPaging": false,
                        "paging":false
                            }'>
                        <thead class="thead-light">
                        <tr>
                            <th><?php echo e(translate('messages.#')); ?></th>
                            <th style="width: 20%"><?php echo e(translate('messages.name')); ?></th>
                            <th style="width: 20%"><?php echo e(translate('messages.price')); ?></th>
                            <th style="width: 30%"><?php echo e(translate('messages.store')); ?></th>
                            <th style="width: 10%"><?php echo e(translate('messages.status')); ?></th>
                            <th style="width: 10%"><?php echo e(translate('messages.action')); ?></th>
                        </tr>
                        </thead>

                        <tbody id="set-rows">
                        <?php $__currentLoopData = $addons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$addon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($key+ $addons->firstItem()); ?></td>
                                <td>
                                <span class="d-block font-size-sm text-body">
                                    <?php echo e(Str::limit($addon['name'],20,'...')); ?>

                                </span>
                                </td>
                                <td><?php echo e(\App\CentralLogics\Helpers::format_currency($addon['price'])); ?></td>
                                <td><?php echo e(Str::limit($addon->store?$addon->store->name:translate('messages.store').' '.translate('messages.deleted'),25,'...')); ?></td>
                                <td>    
                                    <label class="toggle-switch toggle-switch-sm" for="stausCheckbox<?php echo e($addon->id); ?>">
                                    <input type="checkbox" onclick="location.href='<?php echo e(route('admin.addon.status',[$addon['id'],$addon->status?0:1])); ?>'"class="toggle-switch-input" id="stausCheckbox<?php echo e($addon->id); ?>" <?php echo e($addon->status?'checked':''); ?>>
                                        <span class="toggle-switch-label">
                                            <span class="toggle-switch-indicator"></span>
                                        </span>
                                    </label>
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-white"
                                        href="<?php echo e(route('admin.addon.edit',[$addon['id']])); ?>" title="<?php echo e(translate('messages.edit')); ?> <?php echo e(translate('messages.addon')); ?>"><i class="tio-edit"></i></a>
                                    <a class="btn btn-sm btn-white"     href="javascript:"
                                        onclick="form_alert('addon-<?php echo e($addon['id']); ?>','Want to delete this addon ?')" title="<?php echo e(translate('messages.delete')); ?> <?php echo e(translate('messages.addon')); ?>"><i class="tio-delete-outlined"></i></a>
                                    <form action="<?php echo e(route('admin.addon.delete',[$addon['id']])); ?>"
                                                method="post" id="addon-<?php echo e($addon['id']); ?>">
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
                <!-- Pagination -->
                <div class="row justify-content-center justify-content-sm-between align-items-sm-center page-area"> 
                    <div class="col-sm-auto">
                        <div class="d-flex justify-content-center justify-content-sm-end">
                            <!-- Pagination -->
                            <?php echo $addons->links(); ?>

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
            var datatable = $.HSCore.components.HSDatatables.init($('#datatable'), {
            select: {
                style: 'multi',
                classMap: {
                checkAll: '#datatableCheckAll',
                counter: '#datatableCounter',
                counterInfo: '#datatableCounterInfo'
                }
          },
          language: {
            zeroRecords: '<div class="text-center p-4">' +
                '<img class="mb-3" src="<?php echo e(asset('public/assets/admin/svg/illustrations/sorry.svg')); ?>" alt="Image Description" style="width: 7rem;">' +
                '<p class="mb-0">No data to show</p>' +
                '</div>'
          }
        });

        $('#datatableSearch').on('mouseup', function (e) {
          var $input = $(this),
            oldValue = $input.val();

          if (oldValue == "") return;

          setTimeout(function(){
            var newValue = $input.val();

            if (newValue == ""){
              // Gotcha
              datatable.search('').draw();
            }
          }, 1);
        });

        $('#toggleColumn_index').change(function (e) {
          datatable.columns(0).visible(e.target.checked)
        })
        $('#toggleColumn_name').change(function (e) {
          datatable.columns(1).visible(e.target.checked)
        })

        $('#toggleColumn_vendor').change(function (e) {
          datatable.columns(3).visible(e.target.checked)
        })

        $('#toggleColumn_status').change(function (e) {
          datatable.columns(4).visible(e.target.checked)
        })
        $('#toggleColumn_price').change(function (e) {
          datatable.columns(2).visible(e.target.checked)
        })
        $('#toggleColumn_action').change(function (e) {
          datatable.columns(5).visible(e.target.checked)
        })


            // INITIALIZATION OF SELECT2
            // =======================================================
            $('.js-select2-custom').each(function () {
                var select2 = $.HSCore.components.HSSelect2.init($(this));
            });
        });

        $('#store').select2({
            ajax: {
                url: '<?php echo e(url('/')); ?>/admin/vendor/get-stores',
                data: function (params) {
                    return {
                        q: params.term, // search term
                        all:true,
                        module_type:'food',
                        page: params.page
                    };
                },
                processResults: function (data) {
                    return {
                    results: data
                    };
                },
                __port: function (params, success, failure) {
                    var $request = $.ajax(params);

                    $request.then(success);
                    $request.fail(failure);

                    return $request;
                }
            }
        });

        $('#store_id').select2({
            ajax: {
                url: '<?php echo e(url('/')); ?>/admin/vendor/get-stores',
                data: function (params) {
                    return {
                        q: params.term, // search term
                        module_type:'food',
                        page: params.page
                    };
                },
                processResults: function (data) {
                    return {
                    results: data
                    };
                },
                __port: function (params, success, failure) {
                    var $request = $.ajax(params);

                    $request.then(success);
                    $request.fail(failure);

                    return $request;
                }
            }
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
                url: '<?php echo e(route('admin.addon.search')); ?>',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('#loading').show();
                },
                success: function (data) {
                    $('#set-rows').html(data.view);
                    $('.page-area').hide();
                },
                complete: function () {
                    $('#loading').hide();
                },
            });
        });
    </script>
    <script>
        $(".lang_link").click(function(e){
            e.preventDefault();
            $(".lang_link").removeClass('active');
            $(".lang_form").addClass('d-none');
            $(this).addClass('active');

            let form_id = this.id;
            let lang = form_id.substring(0, form_id.length - 5);
            console.log(lang);
            $("#"+lang+"-form").removeClass('d-none');
            if(lang == '<?php echo e($default_lang); ?>')
            {
                $(".from_part_2").removeClass('d-none');
            }
            else
            {
                $(".from_part_2").addClass('d-none');
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crelocok/public_html/resources/views/admin-views/addon/index.blade.php ENDPATH**/ ?>