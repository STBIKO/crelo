<?php $__env->startSection('title',translate('messages.Add new category')); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title"><?php echo e(translate('messages.category')); ?></h1>
                </div>
                <?php if(isset($category)): ?>
                <a href="<?php echo e(route('admin.category.add')); ?>" class="btn btn-primary pull-right"><i class="tio-add-circle"></i> <?php echo e(translate('messages.add')); ?> <?php echo e(translate('messages.new')); ?> <?php echo e(translate('messages.category')); ?></a>
                <?php endif; ?>
            </div>
        </div>
        <!-- End Page Header -->

        <div class="card">
            <div class="card-header"><h5><?php echo e(isset($category)?translate('messages.update'):translate('messages.add').' '.translate('messages.new')); ?> <?php echo e(translate('messages.category')); ?></h5></div>
            <div class="card-body">
                <form action="<?php echo e(isset($category)?route('admin.category.update',[$category['id']]):route('admin.category.store')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php ($language=\App\Models\BusinessSetting::where('key','language')->first()); ?>
                    <?php ($language = $language->value ?? null); ?>
                    <?php ($default_lang = 'en'); ?>
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
                    <?php if($language): ?>
                        <?php $__currentLoopData = json_decode($language); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-group <?php echo e($lang != $default_lang ? 'd-none':''); ?> lang_form" id="<?php echo e($lang); ?>-form">
                                <label class="input-label" for="exampleFormControlInput1"><?php echo e(translate('messages.name')); ?> (<?php echo e(strtoupper($lang)); ?>)</label>
                                <input type="text" name="name[]" class="form-control" placeholder="<?php echo e(translate('messages.new_category')); ?>" maxlength="191" <?php echo e($lang == $default_lang? 'required':''); ?> oninvalid="document.getElementById('en-link').click()">
                            </div>
                            <input type="hidden" name="lang[]" value="<?php echo e($lang); ?>">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="form-group">
                            <label class="input-label" for="exampleFormControlInput1"><?php echo e(translate('messages.name')); ?></label>
                            <input type="text" name="name" class="form-control" placeholder="<?php echo e(translate('messages.new_category')); ?>" value="<?php echo e(old('name')); ?>" required maxlength="191">
                        </div>
                        <input type="hidden" name="lang[]" value="<?php echo e($lang); ?>">
                    <?php endif; ?>
                    <div class="form-group">
                        <label class="input-label"><?php echo e(translate('messages.module')); ?></label>
                        <select name="module_id" required class="form-control js-select2-custom"  data-placeholder="<?php echo e(translate('messages.select')); ?> <?php echo e(translate('messages.module')); ?>">
                                <option value="" selected disabled><?php echo e(translate('messages.select')); ?> <?php echo e(translate('messages.module')); ?></option>
                            <?php $__currentLoopData = \App\Models\Module::notParcel()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($module->id); ?>" ><?php echo e($module->module_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <small class="text-danger"><?php echo e(translate('messages.module_change_warning')); ?></small>
                    </div>
                    <input name="position" value="0" style="display: none">
                    <div class="form-group">
                        <label><?php echo e(translate('messages.image')); ?></label><small style="color: red">* ( <?php echo e(translate('messages.ratio')); ?> 1:1)</small>
                        <div class="custom-file">
                            <input type="file" name="image" id="customFileEg1" class="custom-file-input"
                                accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" required>
                            <label class="custom-file-label" for="customFileEg1"><?php echo e(translate('messages.choose')); ?> <?php echo e(translate('messages.file')); ?></label>
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:0%;">
                        <center>
                            <img style="width: 200px;border: 1px solid; border-radius: 10px;" id="viewer"
                                <?php if(isset($category)): ?>
                                src="<?php echo e(asset('storage/app/public/category')); ?>/<?php echo e($category['image']); ?>"
                                <?php else: ?>
                                src="<?php echo e(asset('public/assets/admin/img/900x400/img1.jpg')); ?>"
                                <?php endif; ?>
                                alt="image"/>
                        </center>
                    </div>
                    <div class="form-group pt-2">
                        <button type="submit" class="btn btn-primary"><?php echo e(isset($category)?translate('messages.update'):translate('messages.add')); ?></button>
                    </div>
                    
                </form>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header pb-2">
                <h5 class="col"><?php echo e(translate('messages.category')); ?> <?php echo e(translate('messages.list')); ?><span class="badge badge-soft-dark ml-2" id="itemCount"><?php echo e($categories->total()); ?></span></h5>
                <div class="col">
                    <select name="module_id" class="form-control js-select2-custom" onchange="set_filter('<?php echo e(url()->full()); ?>',this.value,'module_id')" title="<?php echo e(translate('messages.select')); ?> <?php echo e(translate('messages.modules')); ?>">
                        <option value="" <?php echo e(!request('module_id') ? 'selected':''); ?>><?php echo e(translate('messages.all')); ?> <?php echo e(translate('messages.modules')); ?></option>
                        <?php $__currentLoopData = \App\Models\Module::notParcel()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option
                                value="<?php echo e($module->id); ?>" <?php echo e(request('module_id') == $module->id?'selected':''); ?>>
                                <?php echo e($module['module_name']); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <form id="dataSearch" class="col">
                    <?php echo csrf_field(); ?>
                    <!-- Search -->
                    <div class="input-group input-group-merge input-group-flush">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tio-search"></i>
                            </div>
                        </div>
                        <input type="search" name="search" class="form-control" placeholder="<?php echo e(translate('messages.search_categories')); ?>" aria-label="<?php echo e(translate('messages.search_categories')); ?>">
                        <button type="submit" class="btn btn-light"><?php echo e(translate('messages.search')); ?></button>
                    </div>
                    <!-- End Search -->
                </form>
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
                                <th style="width: 15%"><?php echo e(translate('messages.name')); ?></th>
                                <th style="width: 15%"><?php echo e(translate('messages.module')); ?></th>
                                <th style="width: 10%"><?php echo e(translate('messages.status')); ?></th>
                                <th style="width: 20%"><?php echo e(translate('messages.priority')); ?></th>
                                <th style="width: 25%"><?php echo e(translate('messages.action')); ?></th>
                            </tr>
                        </thead>

                        <tbody id="table-div">
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($key+$categories->firstItem()); ?></td>
                                <td><?php echo e($category->id); ?></td>
                                <td>
                                    <span class="d-block font-size-sm text-body">
                                        <?php echo e(Str::limit($category['name'], 20,'...')); ?>

                                    </span>
                                </td>
                                <td>
                                    <span class="d-block font-size-sm text-body">
                                        <?php echo e(Str::limit($category->module->module_name, 15,'...')); ?>

                                    </span>
                                </td>
                                <td>
                                    <label class="toggle-switch toggle-switch-sm" for="stocksCheckbox<?php echo e($category->id); ?>">
                                    <input type="checkbox" onclick="location.href='<?php echo e(route('admin.category.status',[$category['id'],$category->status?0:1])); ?>'"class="toggle-switch-input" id="stocksCheckbox<?php echo e($category->id); ?>" <?php echo e($category->status?'checked':''); ?>>
                                        <span class="toggle-switch-label">
                                            <span class="toggle-switch-indicator"></span>
                                        </span>
                                    </label>
                                </td>
                                <td>
                                    <form action="<?php echo e(route('admin.category.priority',$category->id)); ?>">
                                    <select name="priority" id="priority" class="w-100" onchange="this.form.submit()"> 
                                        <option value="0" <?php echo e($category->priority == 0?'selected':''); ?>><?php echo e(translate('messages.normal')); ?></option>
                                        <option value="1" <?php echo e($category->priority == 1?'selected':''); ?>><?php echo e(translate('messages.medium')); ?></option>
                                        <option value="2" <?php echo e($category->priority == 2?'selected':''); ?>><?php echo e(translate('messages.high')); ?></option>
                                    </select>
                                    </form>
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-white"
                                        href="<?php echo e(route('admin.category.edit',[$category['id']])); ?>" title="<?php echo e(translate('messages.edit')); ?> <?php echo e(translate('messages.category')); ?>"><i class="tio-edit"></i>
                                    </a>
                                    <a class="btn btn-sm btn-white" href="javascript:"
                                    onclick="form_alert('category-<?php echo e($category['id']); ?>','Want to delete this category')" title="<?php echo e(translate('messages.delete')); ?> <?php echo e(translate('messages.category')); ?>"><i class="tio-delete-outlined"></i>
                                    </a>
                                    <form action="<?php echo e(route('admin.category.delete',[$category['id']])); ?>" method="post" id="category-<?php echo e($category['id']); ?>">
                                        <?php echo csrf_field(); ?> <?php echo method_field('delete'); ?>
                                    </form>
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
                            <?php echo $categories->links(); ?>

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
            

            $('#dataSearch').on('submit', function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.post({
                    url: '<?php echo e(route('admin.category.search')); ?>',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $('#loading').show();
                    },
                    success: function (data) {
                        $('#table-div').html(data.view);
                        $('#itemCount').html(data.count);
                        $('.page-area').hide();
                    },
                    complete: function () {
                        $('#loading').hide();
                    },
                });
            });


            // INITIALIZATION OF SELECT2
            // =======================================================
            $('.js-select2-custom').each(function () {
                var select2 = $.HSCore.components.HSSelect2.init($(this));
            });
        });
    </script>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#viewer').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#customFileEg1").change(function () {
            readURL(this);
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

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crelocok/public_html/resources/views/admin-views/category/index.blade.php ENDPATH**/ ?>