<?php $__env->startSection('title',\App\Models\BusinessSetting::where(['key'=>'business_name'])->first()->value??'Dashboard'); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <style>
        .grid-card {
            border: 2px solid #00000012;
            border-radius: 10px;
            padding: 10px;
        }

        .label_1 {
            position: absolute;
            font-size: 10px;
            background: #396786;
            color: #fff;
            width: 60px;
            padding: 3px 5px;
            font-weight: bold;
            border-radius: 6px;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <?php if(auth('admin')->user()->role_id == 1): ?>
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title"><?php echo e(translate('messages.welcome')); ?>, <?php echo e(auth('admin')->user()->f_name); ?>.</h1>
                    <p class="page-header-text"><?php echo e(translate('messages.welcome_message')); ?></p>
                </div>

                <div class="col-sm-auto" style="width: 306px;">
                    <label class="badge badge-soft-primary float-right">
                        <?php echo e(translate('messages.software_version')); ?> : <?php echo e(env('SOFTWARE_VERSION')); ?>

                    </label>
                    <select name="zone_id" class="form-control js-select2-custom"
                            onchange="fetch_data_zone_wise(this.value)">
                        <option value="all">All Zones</option>
                        <?php $__currentLoopData = \App\Models\Zone::orderBy('name')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option
                                value="<?php echo e($zone['id']); ?>" <?php echo e($params['zone_id'] == $zone['id']?'selected':''); ?>>
                                <?php echo e($zone['name']); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
        </div>
        <!-- End Page Header -->


        <!-- Stats -->
        <div class="card mb-3">
            <div class="card-body">
                <div class="row gx-2 gx-lg-3 mb-2">
                    <div class="col-9">
                        <h4><i class="tio-chart-bar-4"></i><?php echo e(translate('messages.dashboard_order_statistics')); ?></h4>
                    </div>
                    <div class="col-3">
                        <select class="custom-select" name="statistics_type" onchange="order_stats_update(this.value)">
                            <option
                                value="overall" <?php echo e($params['statistics_type'] == 'overall'?'selected':''); ?>>
                                <?php echo e(translate('messages.Overall Statistics')); ?>

                            </option>
                            <option
                                value="today" <?php echo e($params['statistics_type'] == 'today'?'selected':''); ?>>
                                <?php echo e(translate("messages.Today's Statistics")); ?>

                            </option>
                        </select>
                    </div>
                </div>
                <div class="row gx-2 gx-lg-3" id="order_stats">
                    <?php echo $__env->make('admin-views.partials._dashboard-order-stats',['data'=>$data], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>

        <!-- End Stats -->

        <div class="row gx-2 gx-lg-3">
            <div class="col-lg-12 mb-3 mb-lg-12">
                <!-- Card -->
                <div class="card h-100" id="monthly-earning-graph">
                    <!-- Body -->
                <?php echo $__env->make('admin-views.partials._monthly-earning-graph',['total_sell'=>$total_sell,'commission'=>$commission], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- End Body -->
                </div>
                <!-- End Card -->
            </div>
        </div>
        <!-- End Row -->

        <div class="row gx-2 gx-lg-3">
            <div class="col-lg-6 mb-3">
                <!-- Card -->
                <div class="card h-100">
                    <!-- Header -->
                    <div class="card-header">
                        <h5 class="card-header-title">
                            <?php echo e(translate('messages.Users Overview')); ?>

                        </h5>
                        <select class="custom-select" style="width: 30%" name="user_overview"
                                onchange="user_overview_stats_update(this.value)">
                            <option
                                value="this_month" <?php echo e($params['user_overview'] == 'this_month'?'selected':''); ?>>
                                <?php echo e(translate('This month')); ?>

                            </option>
                            <option
                                value="overall" <?php echo e($params['user_overview'] == 'overall'?'selected':''); ?>>
                                <?php echo e(translate('messages.Overall')); ?>

                            </option>
                        </select>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body" id="user-overview-board">
                        <?php if($params['zone_id']!='all'): ?>
                            <?php ($zone_name=\App\Models\Zone::where('id',$params['zone_id'])->first()->name); ?>
                        <?php else: ?>
                            <?php ($zone_name='All'); ?>
                        <?php endif; ?>
                        <label class="badge badge-soft-primary">( Zone : <?php echo e($zone_name); ?> )</label>
                        <div class="chartjs-custom mx-auto">
                            <canvas id="user-overview" class="mt-2"></canvas>
                        </div>
                        <!-- End Chart -->
                    </div>
                    <!-- End Body -->
                </div>
            </div>

            <div class="col-lg-6 mb-3">
                <!-- Card -->
                <div class="card h-100" id="top-selling-foods-view">
                    <?php echo $__env->make('admin-views.partials._top-selling-foods',['top_sell'=>$data['top_sell']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <!-- End Card -->
            </div>

            <div class="col-lg-6 mb-3">
                <!-- Card -->
                <div class="card h-100" id="popular-restaurants-view">
                    <?php echo $__env->make('admin-views.partials._popular-restaurants',['popular'=>$data['popular']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <!-- End Card -->
            </div>

            <div class="col-lg-6 mt-3">
                <!-- Card -->
                <div class="card h-100" id="top-rated-foods-view">
                    <?php echo $__env->make('admin-views.partials._top-rated-foods',['top_rated_foods'=>$data['top_rated_foods']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <!-- End Card -->
            </div>

            <div class="col-lg-6 mt-3">
                <!-- Card -->
                <div class="card h-100" id="top-deliveryman-view">
                    <?php echo $__env->make('admin-views.partials._top-deliveryman',['top_deliveryman'=>$data['top_deliveryman']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <!-- End Card -->
            </div>

            <div class="col-lg-6 mt-3">
                <!-- Card -->
                <div class="card h-100" id="top-restaurants-view">
                    <?php echo $__env->make('admin-views.partials._top-restaurants',['top_restaurants'=>$data['top_restaurants']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <!-- End Card -->
            </div>
        </div>
        <?php else: ?>
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title"><?php echo e(translate('messages.welcome')); ?>, <?php echo e(auth('admin')->user()->f_name); ?>.</h1>
                    <p class="page-header-text"><?php echo e(translate('messages.employee_welcome_message')); ?></p>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('public/assets/admin')); ?>/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="<?php echo e(asset('public/assets/admin')); ?>/vendor/chart.js.extensions/chartjs-extensions.js"></script>
    <script
        src="<?php echo e(asset('public/assets/admin')); ?>/vendor/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js"></script>
<?php $__env->stopPush(); ?>


<?php $__env->startPush('script_2'); ?>
    <script>
        // INITIALIZATION OF CHARTJS
        // =======================================================
        Chart.plugins.unregister(ChartDataLabels);

        $('.js-chart').each(function () {
            $.HSCore.components.HSChartJS.init($(this));
        });

        var updatingChart = $.HSCore.components.HSChartJS.init($('#updatingData'));
    </script>

    <script>
        var ctx = document.getElementById('user-overview');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: [
                    '<?php echo e(translate('messages.customer')); ?>',
                    '<?php echo e(translate('messages.store')); ?>',
                    '<?php echo e(translate('messages.Delivery Man')); ?>'
                ],
                datasets: [{
                    label: 'User',
                    data: ['<?php echo e($data['customer']); ?>', '<?php echo e($data['stores']); ?>', '<?php echo e($data['delivery_man']); ?>'],
                    backgroundColor: [
                        '#628395',
                        '#055052',
                        '#53B8BB'
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <script>
        function order_stats_update(type) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post({
                url: '<?php echo e(route('admin.dashboard-stats.order')); ?>',
                data: {
                    statistics_type: type
                },
                beforeSend: function () {
                    $('#loading').show()
                },
                success: function (data) {
                    insert_param('statistics_type',type);
                    $('#order_stats').html(data.view)
                },
                complete: function () {
                    $('#loading').hide()
                }
            });
        }

        function fetch_data_zone_wise(zone_id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post({
                url: '<?php echo e(route('admin.dashboard-stats.zone')); ?>',
                data: {
                    zone_id: zone_id
                },
                beforeSend: function () {
                    $('#loading').show()
                },
                success: function (data) {
                    insert_param('zone_id', zone_id);
                    $('#order_stats').html(data.order_stats);
                    $('#user-overview-board').html(data.user_overview);
                    $('#monthly-earning-graph').html(data.monthly_graph);
                    $('#popular-restaurants-view').html(data.popular_restaurants);
                    $('#top-deliveryman-view').html(data.top_deliveryman);
                    $('#top-rated-foods-view').html(data.top_rated_foods);
                    $('#top-restaurants-view').html(data.top_restaurants);
                    $('#top-selling-foods-view').html(data.top_selling_foods);
                },
                complete: function () {
                    $('#loading').hide()
                }
            });
        }

        function user_overview_stats_update(type) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post({
                url: '<?php echo e(route('admin.dashboard-stats.user-overview')); ?>',
                data: {
                    user_overview: type
                },
                beforeSend: function () {
                    $('#loading').show()
                },
                success: function (data) {
                    insert_param('user_overview',type);
                    $('#user-overview-board').html(data.view)
                },
                complete: function () {
                    $('#loading').hide()
                }
            });
        }
    </script>

    <script>
        function insert_param(key, value) {
            key = encodeURIComponent(key);
            value = encodeURIComponent(value);
            // kvp looks like ['key1=value1', 'key2=value2', ...]
            var kvp = document.location.search.substr(1).split('&');
            let i = 0;

            for (; i < kvp.length; i++) {
                if (kvp[i].startsWith(key + '=')) {
                    let pair = kvp[i].split('=');
                    pair[1] = value;
                    kvp[i] = pair.join('=');
                    break;
                }
            }
            if (i >= kvp.length) {
                kvp[kvp.length] = [key, value].join('=');
            }
            // can return this or...
            let params = kvp.join('&');
            // change url page with new params
            window.history.pushState('page2', 'Title', '<?php echo e(url()->current()); ?>?' + params);
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crelocok/public_html/resources/views/admin-views/dashboard.blade.php ENDPATH**/ ?>