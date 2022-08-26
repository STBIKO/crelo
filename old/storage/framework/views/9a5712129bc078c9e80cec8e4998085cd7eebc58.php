<style>
    .nav-sub {
        background: #213A36 !important;
    }
</style>

<div id="sidebarMain" class="d-none">
    <aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered  ">
        <div class="navbar-vertical-container">
            <div class="navbar-brand-wrapper justify-content-between">
                <!-- Logo -->
                <?php ($store_logo = \App\Models\BusinessSetting::where(['key' => 'logo'])->first()->value); ?>
                <a class="navbar-brand" href="<?php echo e(route('admin.dashboard')); ?>" aria-label="Front">
                    <img class="navbar-brand-logo" style="max-height: 55px; border-radius: 8px;max-width: 100%!important;" onerror="this.src='<?php echo e(asset('public/assets/admin/img/160x160/img2.jpg')); ?>'" src="<?php echo e(asset('storage/app/public/business/' . $store_logo)); ?>" alt="Logo">
                    <img class="navbar-brand-logo-mini" style="max-height: 55px; border-radius: 8px;max-width: 100%!important;" onerror="this.src='<?php echo e(asset('public/assets/admin/img/160x160/img2.jpg')); ?>'" src="<?php echo e(asset('storage/app/public/business/' . $store_logo)); ?>" alt="Logo">
                </a>
                <!-- End Logo -->

                <!-- Navbar Vertical Toggle -->
                <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-vertical-aside-toggle btn btn-icon btn-xs btn-ghost-dark">
                    <i class="tio-clear tio-lg"></i>
                </button>
                <!-- End Navbar Vertical Toggle -->
            </div>

            <!-- Content -->
            <div class="navbar-vertical-content" style="background-color: #213A36;">
                <ul class="navbar-nav navbar-nav-lg nav-tabs">
                    <!-- Dashboards -->
                    <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin') ? 'show' : ''); ?>">
                        <a class="js-navbar-vertical-aside-menu-link nav-link" href="<?php echo e(route('admin.dashboard')); ?>" title="<?php echo e(translate('messages.dashboard')); ?>">
                            <i class="tio-home-vs-1-outlined nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                <?php echo e(translate('messages.dashboard')); ?>

                            </span>
                        </a>
                    </li>
                    <!-- End Dashboards -->

                    <li class="nav-item">
                        <small class="nav-subtitle" title="<?php echo e(translate('messages.module')); ?> <?php echo e(translate('messages.section')); ?>"><?php echo e(translate('messages.module')); ?>

                            <?php echo e(translate('messages.management')); ?></small>
                        <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                    </li>

                    <?php if(\App\CentralLogics\Helpers::module_permission_check('module')): ?>
                    <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/module*') ? 'active' : ''); ?>">
                        <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:" title="<?php echo e(translate('messages.module')); ?>">
                            <i class="tio-globe nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(translate('messages.module')); ?></span>
                        </a>
                        <ul class="js-navbar-vertical-aside-submenu nav nav-sub" style="display: <?php echo e(Request::is('admin/module*') ? 'block' : 'none'); ?>">
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/module/create') ? 'active' : ''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link" href="<?php echo e(route('admin.module.create')); ?>" title="<?php echo e(translate('messages.add')); ?> <?php echo e(translate('messages.module')); ?>">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <?php echo e(translate('messages.add')); ?> <?php echo e(translate('messages.module')); ?>

                                    </span>
                                </a>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/module') ? 'active' : ''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link" href="<?php echo e(route('admin.module.index')); ?>" title="<?php echo e(translate('messages.models')); ?>">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <?php echo e(translate('messages.modules')); ?>

                                    </span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <?php endif; ?>

                    <?php if(\App\CentralLogics\Helpers::module_permission_check('pos')): ?>
                    <li class="nav-item">
                        <small class="nav-subtitle"><?php echo e(translate('messages.pos')); ?> <?php echo e(translate('messages.system')); ?></small>
                        <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                    </li>


                    <!-- POS -->
                    <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/pos/*')?'active':''); ?>">
                        <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:">
                            <i class="tio-shopping nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(translate('messages.pos')); ?></span>
                        </a>
                        <ul class="js-navbar-vertical-aside-submenu nav nav-sub" style="display: <?php echo e(Request::is('admin/pos/*')?'block':'none'); ?>">
                            <li class="nav-item <?php echo e(Request::is('admin/pos/')?'active':''); ?>">
                                <a class="nav-link " href="<?php echo e(route('admin.pos.index')); ?>" title="<?php echo e(translate('messages.pos')); ?>">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate"><?php echo e(translate('messages.pos')); ?></span>
                                </a>
                            </li>
                            <li class="nav-item <?php echo e(Request::is('admin/pos/orders')?'active':''); ?>">
                                <a class="nav-link " href="<?php echo e(route('admin.pos.orders')); ?>" title="<?php echo e(translate('messages.orders')); ?>">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate"><?php echo e(translate('messages.orders')); ?>

                                        <span class="badge badge-info badge-pill ml-1">
                                            <?php echo e(\App\Models\Order::Pos()->count()); ?>

                                        </span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- End POS -->
                    <?php endif; ?>
                    <!-- Orders -->
                    <?php if(\App\CentralLogics\Helpers::module_permission_check('order')): ?>
                    <li class="nav-item">
                        <small class="nav-subtitle"><?php echo e(translate('messages.order')); ?>

                            <?php echo e(translate('messages.section')); ?></small>
                        <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                    </li>

                    <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/order*') ? 'active' : ''); ?>">
                        <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:" title="<?php echo e(translate('messages.order')); ?>">
                            <i class="tio-shopping-cart nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                <?php echo e(translate('messages.orders')); ?>

                            </span>
                        </a>
                        <ul class="js-navbar-vertical-aside-submenu nav nav-sub" style="display: <?php echo e(Request::is('admin/order*') ? 'block' : 'none'); ?>">
                            <li class="nav-item <?php echo e(Request::is('admin/order/list/pending') ? 'active' : ''); ?>">
                                <a class="nav-link " href="<?php echo e(route('admin.order.list', ['pending'])); ?>" title="<?php echo e(translate('messages.pending')); ?> <?php echo e(translate('messages.orders')); ?>">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">
                                        <?php echo e(translate('messages.pending')); ?>

                                        <span class="badge badge-soft-info badge-pill ml-1">
                                            <?php echo e(\App\Models\Order::Pending()->OrderScheduledIn(30)->StoreOrder()->count()); ?>

                                        </span>
                                    </span>
                                </a>
                            </li>

                            <li class="nav-item <?php echo e(Request::is('admin/order/list/accepted') ? 'active' : ''); ?>">
                                <a class="nav-link " href="<?php echo e(route('admin.order.list', ['accepted'])); ?>" title="<?php echo e(translate('messages.acceptedbyDM')); ?>">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">
                                        <?php echo e(translate('messages.accepted')); ?>

                                        <span class="badge badge-soft-success badge-pill ml-1">
                                            <?php echo e(\App\Models\Order::AccepteByDeliveryman()->OrderScheduledIn(30)->StoreOrder()->count()); ?>

                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item <?php echo e(Request::is('admin/order/list/processing') ? 'active' : ''); ?>">
                                <a class="nav-link " href="<?php echo e(route('admin.order.list', ['processing'])); ?>" title="<?php echo e(translate('messages.preparingInRestaurants')); ?>">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">
                                        <?php echo e(translate('messages.processing')); ?>

                                        <span class="badge badge-warning badge-pill ml-1">
                                            <?php echo e(\App\Models\Order::Preparing()->OrderScheduledIn(30)->StoreOrder()->count()); ?>

                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item <?php echo e(Request::is('admin/order/list/item_on_the_way') ? 'active' : ''); ?>">
                                <a class="nav-link text-capitalize" href="<?php echo e(route('admin.order.list', ['item_on_the_way'])); ?>" title="<?php echo e(translate('messages.itemOnTheWay')); ?>">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">
                                        <?php echo e(translate('messages.itemOnTheWay')); ?>

                                        <span class="badge badge-warning badge-pill ml-1">
                                            <?php echo e(\App\Models\Order::ItemOnTheWay()->OrderScheduledIn(30)->StoreOrder()->count()); ?>

                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item <?php echo e(Request::is('admin/order/list/delivered') ? 'active' : ''); ?>">
                                <a class="nav-link " href="<?php echo e(route('admin.order.list', ['delivered'])); ?>" title="<?php echo e(translate('messages.delivered')); ?>">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">
                                        <?php echo e(translate('messages.delivered')); ?>

                                        <span class="badge badge-success badge-pill ml-1">
                                            <?php echo e(\App\Models\Order::Delivered()->StoreOrder()->count()); ?>

                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item <?php echo e(Request::is('admin/order/list/canceled') ? 'active' : ''); ?>">
                                <a class="nav-link " href="<?php echo e(route('admin.order.list', ['canceled'])); ?>" title="<?php echo e(translate('messages.canceled')); ?>">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">
                                        <?php echo e(translate('messages.canceled')); ?>

                                        <span class="badge badge-soft-warning bg-light badge-pill ml-1">
                                            <?php echo e(\App\Models\Order::Canceled()->StoreOrder()->count()); ?>

                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item <?php echo e(Request::is('admin/order/list/failed') ? 'active' : ''); ?>">
                                <a class="nav-link " href="<?php echo e(route('admin.order.list', ['failed'])); ?>" title="<?php echo e(translate('messages.payment')); ?> <?php echo e(translate('messages.failed')); ?>">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate text-capitalize">
                                        <?php echo e(translate('messages.payment')); ?> <?php echo e(translate('messages.failed')); ?>

                                        <span class="badge badge-soft-danger bg-light badge-pill ml-1">
                                            <?php echo e(\App\Models\Order::failed()->StoreOrder()->count()); ?>

                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item <?php echo e(Request::is('admin/order/list/refunded') ? 'active' : ''); ?>">
                                <a class="nav-link " href="<?php echo e(route('admin.order.list', ['refunded'])); ?>" title="<?php echo e(translate('messages.refunded')); ?>">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">
                                        <?php echo e(translate('messages.refunded')); ?>

                                        <span class="badge badge-soft-danger bg-light badge-pill ml-1">
                                            <?php echo e(\App\Models\Order::Refunded()->StoreOrder()->count()); ?>

                                        </span>
                                    </span>
                                </a>
                            </li>

                            <li class="nav-item <?php echo e(Request::is('admin/order/list/scheduled') ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(route('admin.order.list', ['scheduled'])); ?>" title="<?php echo e(translate('messages.scheduled')); ?>">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">
                                        <?php echo e(translate('messages.scheduled')); ?>

                                        <span class="badge badge-info badge-pill ml-1">
                                            <?php echo e(\App\Models\Order::Scheduled()->StoreOrder()->count()); ?>

                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item <?php echo e(Request::is('admin/order/list/all') ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(route('admin.order.list', ['all'])); ?>" title="<?php echo e(translate('messages.all')); ?> <?php echo e(translate('messages.orders')); ?>">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">
                                        <?php echo e(translate('messages.all')); ?>

                                        <span class="badge badge-info badge-pill ml-1">
                                            <?php echo e(\App\Models\Order::StoreOrder()->count()); ?>

                                        </span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- Order dispachment -->
                    <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/dispatch/*') ? 'active' : ''); ?>">
                        <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:" title="<?php echo e(translate('messages.dispatchManagement')); ?>">
                            <i class="tio-clock nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                <?php echo e(translate('messages.dispatchManagement')); ?>

                            </span>
                        </a>
                        <ul class="js-navbar-vertical-aside-submenu nav nav-sub" style="display: <?php echo e(Request::is('admin/dispatch*') ? 'block' : 'none'); ?>">
                            <li class="nav-item <?php echo e(Request::is('admin/dispatch/list/searching_for_deliverymen') ? 'active' : ''); ?>">
                                <a class="nav-link " href="<?php echo e(route('admin.dispatch.list', ['searching_for_deliverymen'])); ?>" title="<?php echo e(translate('messages.searchingDM')); ?>">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">
                                        <?php echo e(translate('messages.searchingDM')); ?>

                                        <span class="badge badge-soft-info badge-pill ml-1">
                                            <?php echo e(\App\Models\Order::SearchingForDeliveryman()->OrderScheduledIn(30)->StoreOrder()->count()); ?>

                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item <?php echo e(Request::is('admin/dispatch/list/on_going') ? 'active' : ''); ?>">
                                <a class="nav-link " href="<?php echo e(route('admin.dispatch.list', ['on_going'])); ?>" title="<?php echo e(translate('messages.ongoingOrders')); ?>">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">
                                        <?php echo e(translate('messages.ongoingOrders')); ?>

                                        <span class="badge badge-soft-dark bg-light badge-pill ml-1">
                                            <?php echo e(\App\Models\Order::Ongoing()->OrderScheduledIn(30)->StoreOrder()->count()); ?>

                                        </span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- Order dispachment End-->
                    <?php endif; ?>
                    <!-- End Orders -->

                    <!-- Parcel Section -->
                    <li class="nav-item">
                        <small class="nav-subtitle" title="<?php echo e(translate('messages.parcel')); ?> <?php echo e(translate('messages.section')); ?>"><?php echo e(translate('messages.parcel')); ?>

                            <?php echo e(translate('messages.section')); ?></small>
                        <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                    </li>

                    <?php if(\App\CentralLogics\Helpers::module_permission_check('parcel')): ?>
                    <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/parcel*') ? 'active' : ''); ?>">
                        <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:" title="<?php echo e(translate('messages.parcel')); ?>">
                            <i class="tio-bus nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(translate('messages.parcel')); ?></span>
                        </a>
                        <ul class="js-navbar-vertical-aside-submenu nav nav-sub" style="display: <?php echo e(Request::is('admin/parcel*') ? 'block' : 'none'); ?>">
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/parcel/category') ? 'active' : ''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link" href="<?php echo e(route('admin.parcel.category.index')); ?>" title="<?php echo e(translate('messages.parcel_category')); ?>">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <?php echo e(translate('messages.parcel_category')); ?>

                                    </span>
                                </a>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/parcel/orders*') ? 'active' : ''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link" href="<?php echo e(route('admin.parcel.orders')); ?>" title="<?php echo e(translate('messages.parcel')); ?> <?php echo e(translate('messages.orders')); ?>">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <?php echo e(translate('messages.parcel')); ?> <?php echo e(translate('messages.orders')); ?>

                                    </span>
                                </a>
                            </li>

                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/parcel/settings') ? 'active' : ''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link" href="<?php echo e(route('admin.parcel.settings')); ?>" title="<?php echo e(translate('messages.parcel')); ?> <?php echo e(translate('messages.settings')); ?>">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <?php echo e(translate('messages.parcel')); ?> <?php echo e(translate('messages.settings')); ?>

                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <!--End Parcel Section -->

                    <!-- Restaurant -->
                    <li class="nav-item">
                        <small class="nav-subtitle" title="<?php echo e(translate('messages.store')); ?> <?php echo e(translate('messages.section')); ?>"><?php echo e(translate('messages.store')); ?>

                            <?php echo e(translate('messages.management')); ?></small>
                        <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                    </li>

                    <?php if(\App\CentralLogics\Helpers::module_permission_check('zone')): ?>
                    <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/zone*') ? 'active' : ''); ?>">
                        <a class="js-navbar-vertical-aside-menu-link nav-link" href="<?php echo e(route('admin.zone.home')); ?>" title="<?php echo e(translate('messages.zone')); ?>">
                            <i class="tio-city nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                <?php echo e(translate('messages.delivery_zone')); ?> </span>
                        </a>
                    </li>
                    <?php endif; ?>

                    <?php if(\App\CentralLogics\Helpers::module_permission_check('store')): ?>
                    <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/vendor*') && !Request::is('admin/vendor/withdraw_list') ? 'active' : ''); ?>">
                        <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:" title="<?php echo e(translate('messages.store')); ?>">
                            <i class="tio-filter-list nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(translate('messages.stores')); ?></span>
                        </a>
                        <ul class="js-navbar-vertical-aside-submenu nav nav-sub" style="display: <?php echo e(Request::is('admin/vendor*') && !Request::is('admin/vendor/withdraw_list') ? 'block' : 'none'); ?>">
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/vendor/add') ? 'active' : ''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link" href="<?php echo e(route('admin.vendor.add')); ?>" title="<?php echo e(translate('messages.register')); ?> <?php echo e(translate('messages.store')); ?>">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <?php echo e(translate('messages.add')); ?> <?php echo e(translate('messages.store')); ?>

                                    </span>
                                </a>
                            </li>

                            <li class="navbar-item <?php echo e(Request::is('admin/vendor/list') ? 'active' : ''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link" href="<?php echo e(route('admin.vendor.list')); ?>" title="<?php echo e(translate('messages.store')); ?> <?php echo e(translate('messages.list')); ?>">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(translate('messages.stores')); ?>

                                        <?php echo e(translate('list')); ?></span>
                                </a>
                            </li>
                            <li class="nav-item <?php echo e(Request::is('admin/vendor/bulk-import') ? 'active' : ''); ?>">
                                <a class="nav-link " href="<?php echo e(route('admin.vendor.bulk-import')); ?>" title="<?php echo e(translate('messages.bulk_import')); ?>">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate text-capitalize"><?php echo e(translate('messages.bulk_import')); ?></span>
                                </a>
                            </li>
                            <li class="nav-item <?php echo e(Request::is('admin/vendor/bulk-export') ? 'active' : ''); ?>">
                                <a class="nav-link " href="<?php echo e(route('admin.vendor.bulk-export-index')); ?>" title="<?php echo e(translate('messages.bukl_export')); ?>">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate text-capitalize"><?php echo e(translate('messages.bulk_export')); ?></span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <?php endif; ?>
                    <!-- End Restaurant -->

                    <li class="nav-item">
                        <small class="nav-subtitle" title="<?php echo e(translate('messages.item')); ?> <?php echo e(translate('messages.section')); ?>"><?php echo e(translate('messages.item')); ?>

                            <?php echo e(translate('messages.management')); ?></small>
                        <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                    </li>

                    <!-- Category -->
                    <?php if(\App\CentralLogics\Helpers::module_permission_check('category')): ?>
                    <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/category*') ? 'active' : ''); ?>">
                        <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:" title="<?php echo e(translate('messages.category')); ?>">
                            <i class="tio-category nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(translate('messages.categories')); ?></span>
                        </a>
                        <ul class="js-navbar-vertical-aside-submenu nav nav-sub" style="display: <?php echo e(Request::is('admin/category*') ? 'block' : 'none'); ?>">
                            <li class="nav-item <?php echo e(Request::is('admin/category/add') ? 'active' : ''); ?>">
                                <a class="nav-link " href="<?php echo e(route('admin.category.add')); ?>" title="<?php echo e(translate('messages.category')); ?>">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate"><?php echo e(translate('messages.category')); ?></span>
                                </a>
                            </li>

                            <li class="nav-item <?php echo e(Request::is('admin/category/add-sub-category') ? 'active' : ''); ?>">
                                <a class="nav-link " href="<?php echo e(route('admin.category.add-sub-category')); ?>" title="<?php echo e(translate('messages.sub_category')); ?>">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate"><?php echo e(translate('messages.sub_category')); ?></span>
                                </a>
                            </li>

                            
                    <li class="nav-item <?php echo e(Request::is('admin/category/bulk-import') ? 'active' : ''); ?>">
                        <a class="nav-link " href="<?php echo e(route('admin.category.bulk-import')); ?>" title="<?php echo e(translate('messages.bulk_import')); ?>">
                            <span class="tio-circle nav-indicator-icon"></span>
                            <span class="text-truncate text-capitalize"><?php echo e(translate('messages.bulk_import')); ?></span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo e(Request::is('admin/category/bulk-export') ? 'active' : ''); ?>">
                        <a class="nav-link " href="<?php echo e(route('admin.category.bulk-export-index')); ?>" title="<?php echo e(translate('messages.bukl_export')); ?>">
                            <span class="tio-circle nav-indicator-icon"></span>
                            <span class="text-truncate text-capitalize"><?php echo e(translate('messages.bulk_export')); ?></span>
                        </a>
                    </li>
                </ul>
                </li>
                <?php endif; ?>
                <!-- End Category -->

                <!-- Attributes -->
                <?php if(\App\CentralLogics\Helpers::module_permission_check('attribute')): ?>
                <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/attribute*') ? 'active' : ''); ?>">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="<?php echo e(route('admin.attribute.add-new')); ?>" title="<?php echo e(translate('messages.attributes')); ?>">
                        <i class="tio-apps nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                            <?php echo e(translate('messages.attributes')); ?>

                        </span>
                    </a>
                </li>
                <?php endif; ?>
                <!-- End Attributes -->

                <!-- Unit -->
                <?php if(\App\CentralLogics\Helpers::module_permission_check('unit')): ?>
                <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/unit*') ? 'active' : ''); ?>">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="<?php echo e(route('admin.unit.index')); ?>" title="<?php echo e(translate('messages.unit')); ?>">
                        <i class="tio-ruler nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate text-capitalize">
                            <?php echo e(translate('messages.unit')); ?>

                        </span>
                    </a>
                </li>
                <?php endif; ?>
                <!-- End Unit -->

                <!-- AddOn -->
                <?php if(\App\CentralLogics\Helpers::module_permission_check('addon')): ?>
                <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/addon*') ? 'active' : ''); ?>">
                    <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:" title="<?php echo e(translate('messages.addons')); ?>">
                        <i class="tio-add-circle-outlined nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(translate('messages.addons')); ?></span>
                    </a>
                    <ul class="js-navbar-vertical-aside-submenu nav nav-sub" style="display: <?php echo e(Request::is('admin/addon*') ? 'block' : 'none'); ?>">
                        <li class="nav-item <?php echo e(Request::is('admin/addon/add-new') ? 'active' : ''); ?>">
                            <a class="nav-link " href="<?php echo e(route('admin.addon.add-new')); ?>" title="<?php echo e(translate('messages.addon')); ?> <?php echo e(translate('messages.list')); ?>">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate"><?php echo e(translate('messages.list')); ?></span>
                            </a>
                        </li>

                        <li class="nav-item <?php echo e(Request::is('admin/addon/bulk-import') ? 'active' : ''); ?>">
                            <a class="nav-link " href="<?php echo e(route('admin.addon.bulk-import')); ?>" title="<?php echo e(translate('messages.bulk_import')); ?>">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate text-capitalize"><?php echo e(translate('messages.bulk_import')); ?></span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e(Request::is('admin/addon/bulk-export') ? 'active' : ''); ?>">
                            <a class="nav-link " href="<?php echo e(route('admin.addon.bulk-export-index')); ?>" title="<?php echo e(translate('messages.bukl_export')); ?>">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate text-capitalize"><?php echo e(translate('messages.bulk_export')); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
                <!-- End AddOn -->
                <!-- Food -->
                <?php if(\App\CentralLogics\Helpers::module_permission_check('item')): ?>
                <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/item*') ? 'active' : ''); ?>">
                    <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:" title="<?php echo e(translate('messages.item')); ?>">
                        <i class="tio-premium-outlined nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate text-capitalize"><?php echo e(translate('messages.items')); ?></span>
                    </a>
                    <ul class="js-navbar-vertical-aside-submenu nav nav-sub" style="display: <?php echo e(Request::is('admin/item*') ? 'block' : 'none'); ?>">
                        <li class="nav-item <?php echo e(Request::is('admin/item/add-new') ? 'active' : ''); ?>">
                            <a class="nav-link " href="<?php echo e(route('admin.item.add-new')); ?>" title="<?php echo e(translate('messages.add')); ?> <?php echo e(translate('messages.new')); ?>">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate"><?php echo e(translate('messages.add')); ?>

                                    <?php echo e(translate('messages.new')); ?></span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e(Request::is('admin/item/list') ? 'active' : ''); ?>">
                            <a class="nav-link " href="<?php echo e(route('admin.item.list')); ?>" title="<?php echo e(translate('messages.item')); ?> <?php echo e(translate('messages.list')); ?>">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate"><?php echo e(translate('messages.list')); ?></span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e(Request::is('admin/item/reviews') ? 'active' : ''); ?>">
                            <a class="nav-link " href="<?php echo e(route('admin.item.reviews')); ?>" title="<?php echo e(translate('messages.review')); ?> <?php echo e(translate('messages.list')); ?>">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate"><?php echo e(translate('messages.review')); ?></span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e(Request::is('admin/item/bulk-import') ? 'active' : ''); ?>">
                            <a class="nav-link " href="<?php echo e(route('admin.item.bulk-import')); ?>" title="<?php echo e(translate('messages.bulk_import')); ?>">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate text-capitalize"><?php echo e(translate('messages.bulk_import')); ?></span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e(Request::is('admin/item/bulk-export') ? 'active' : ''); ?>">
                            <a class="nav-link " href="<?php echo e(route('admin.item.bulk-export-index')); ?>" title="<?php echo e(translate('messages.bukl_export')); ?>">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate text-capitalize"><?php echo e(translate('messages.bulk_export')); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
                <!-- End Food -->
                <!-- DeliveryMan -->
                <?php if(\App\CentralLogics\Helpers::module_permission_check('deliveryman')): ?>
                <li class="nav-item">
                    <small class="nav-subtitle" title="<?php echo e(translate('messages.deliveryman')); ?> <?php echo e(translate('messages.section')); ?>"><?php echo e(translate('messages.deliveryman')); ?>

                        <?php echo e(translate('messages.section')); ?></small>
                    <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                </li>
                <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/delivery-man/add') ? 'active' : ''); ?>">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="<?php echo e(route('admin.delivery-man.add')); ?>" title="<?php echo e(translate('messages.add_delivery_man')); ?>">
                        <i class="tio-running nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                            <?php echo e(translate('messages.add_delivery_man')); ?>

                        </span>
                    </a>
                </li>

                <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/delivery-man/list') ? 'active' : ''); ?>">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="<?php echo e(route('admin.delivery-man.list')); ?>" title="<?php echo e(translate('messages.deliveryman')); ?> <?php echo e(translate('messages.list')); ?>">
                        <i class="tio-filter-list nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                            <?php echo e(translate('messages.deliverymen')); ?>

                        </span>
                    </a>
                </li>

                <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/delivery-man/reviews/list') ? 'active' : ''); ?>">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="<?php echo e(route('admin.delivery-man.reviews.list')); ?>" title="<?php echo e(translate('messages.reviews')); ?>">
                        <i class="tio-star-outlined nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                            <?php echo e(translate('messages.reviews')); ?>

                        </span>
                    </a>
                </li>
                <?php endif; ?>
                <!-- End DeliveryMan -->

                <!-- Customer Section -->
                <?php if(\App\CentralLogics\Helpers::module_permission_check('customerList')): ?>
                <li class="nav-item">
                    <small class="nav-subtitle" title="<?php echo e(translate('messages.customer')); ?> <?php echo e(translate('messages.section')); ?>"><?php echo e(translate('messages.customer')); ?>

                        <?php echo e(translate('messages.section')); ?></small>
                    <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                </li>
                <!-- Custommer -->

                <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/customer*') ? 'active' : ''); ?>">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="<?php echo e(route('admin.customer.list')); ?>" title="<?php echo e(translate('messages.customers')); ?>">
                        <i class="tio-poi-user nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                            <?php echo e(translate('messages.customers')); ?>

                        </span>
                    </a>
                </li>

                <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/customer/wallet*') ? 'active' : ''); ?>">

                    <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:" title="<?php echo e(__('messages.addons')); ?>">
                        <i class="tio-wallet nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate  text-capitalize">
                            <?php echo e(__('messages.customer')); ?> <?php echo e(__('messages.wallet')); ?>

                        </span>
                    </a>

                    <ul class="js-navbar-vertical-aside-submenu nav nav-sub" style="display: <?php echo e(Request::is('admin/customer/wallet*') ? 'block' : 'none'); ?>">
                        <li class="nav-item <?php echo e(Request::is('admin/customer/wallet/add-fund') ? 'active' : ''); ?>">
                            <a class="nav-link " href="<?php echo e(route('admin.customer.wallet.add-fund')); ?>" title="<?php echo e(__('messages.add_fund')); ?>">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate text-capitalize"><?php echo e(__('messages.add_fund')); ?></span>
                            </a>
                        </li>

                        <li class="nav-item <?php echo e(Request::is('admin/customer/wallet/report*') ? 'active' : ''); ?>">
                            <a class="nav-link " href="<?php echo e(route('admin.customer.wallet.report')); ?>" title="<?php echo e(__('messages.report')); ?>">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate text-capitalize"><?php echo e(__('messages.report')); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/customer/loyalty-point*') ? 'active' : ''); ?>">
                    <a class="js-navbar-vertical-aside-menu-link nav-link  nav-link-toggle" href="javascript:" title="<?php echo e(__('messages.customer_loyalty_point')); ?>">
                        <i class="tio-medal nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate  text-capitalize">
                            <?php echo e(__('messages.customer_loyalty_point')); ?>

                        </span>
                    </a>

                    <ul class="js-navbar-vertical-aside-submenu nav nav-sub" style="display: <?php echo e(Request::is('admin/customer/loyalty-point*') ? 'block' : 'none'); ?>">
                        <li class="nav-item <?php echo e(Request::is('admin/customer/loyalty-point/report*') ? 'active' : ''); ?>">
                            <a class="nav-link " href="<?php echo e(route('admin.customer.loyalty-point.report')); ?>" title="<?php echo e(__('messages.report')); ?>">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate text-capitalize"><?php echo e(__('messages.report')); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- End Custommer -->
                <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/customer/subscribed') ? 'active' : ''); ?>">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="<?php echo e(route('admin.customer.subscribed')); ?>" title="Subscribed emails">
                        <i class="tio-email-outlined nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                            <?php echo e(translate('messages.subscribed_mail_list')); ?>

                        </span>
                    </a>
                </li>
                <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/customer/settings') ? 'active' : ''); ?>">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="<?php echo e(route('admin.customer.settings')); ?>" title="<?php echo e(__('messages.Customer')); ?> <?php echo e(__('messages.settings')); ?>">
                        <i class="tio-settings nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                            <?php echo e(__('messages.Customer')); ?> <?php echo e(__('messages.settings')); ?>

                        </span>
                    </a>
                </li>
                <?php endif; ?>
                <!-- End customer Section -->
                <!-- Marketing section -->
                <li class="nav-item">
                    <small class="nav-subtitle" title="<?php echo e(translate('messages.employee_handle')); ?>"><?php echo e(translate('messages.marketing')); ?>

                        <?php echo e(translate('messages.section')); ?></small>
                    <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                </li>
                <!-- Campaign -->
                <?php if(\App\CentralLogics\Helpers::module_permission_check('campaign')): ?>
                <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/campaign*') ? 'active' : ''); ?>">
                    <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:" title="<?php echo e(translate('messages.campaign')); ?>">
                        <i class="tio-layers-outlined nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(translate('messages.campaigns')); ?></span>
                    </a>
                    <ul class="js-navbar-vertical-aside-submenu nav nav-sub" style="display: <?php echo e(Request::is('admin/campaign*') ? 'block' : 'none'); ?>">

                        <li class="nav-item <?php echo e(Request::is('admin/campaign/basic/*') ? 'active' : ''); ?>">
                            <a class="nav-link " href="<?php echo e(route('admin.campaign.list', 'basic')); ?>" title="<?php echo e(translate('messages.basic_campaign')); ?>">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate"><?php echo e(translate('messages.basic_campaign')); ?></span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e(Request::is('admin/campaign/item/*') ? 'active' : ''); ?>">
                            <a class="nav-link " href="<?php echo e(route('admin.campaign.list', 'item')); ?>" title="<?php echo e(translate('messages.item')); ?> <?php echo e(translate('messages.campaign')); ?>">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate"><?php echo e(translate('messages.item')); ?>

                                    <?php echo e(translate('messages.campaign')); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
                <!-- End Campaign -->
                <!-- Banner -->
                <?php if(\App\CentralLogics\Helpers::module_permission_check('banner')): ?>
                <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/banner*') ? 'active' : ''); ?>">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="<?php echo e(route('admin.banner.add-new')); ?>" title="<?php echo e(translate('messages.banner')); ?>">
                        <i class="tio-image nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(translate('messages.banners')); ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <!-- End Banner -->
                <!-- Coupon -->
                <?php if(\App\CentralLogics\Helpers::module_permission_check('coupon')): ?>
                <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/coupon*') ? 'active' : ''); ?>">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="<?php echo e(route('admin.coupon.add-new')); ?>" title="<?php echo e(translate('messages.coupon')); ?>">
                        <i class="tio-gift nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(translate('messages.coupons')); ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <!-- End Coupon -->
                <!-- Notification -->
                <?php if(\App\CentralLogics\Helpers::module_permission_check('notification')): ?>
                <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/notification*') ? 'active' : ''); ?>">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="<?php echo e(route('admin.notification.add-new')); ?>" title="<?php echo e(translate('messages.send')); ?> <?php echo e(translate('messages.notification')); ?>">
                        <i class="tio-notifications nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                            <?php echo e(translate('messages.push')); ?> <?php echo e(translate('messages.notification')); ?>

                        </span>
                    </a>
                </li>
                <?php endif; ?>
                <!-- End Notification -->

                <!-- End marketing section -->

                <!-- Business Section-->
                <li class="nav-item">
                    <small class="nav-subtitle" title="<?php echo e(translate('messages.business')); ?> <?php echo e(translate('messages.section')); ?>"><?php echo e(translate('messages.business')); ?>

                        <?php echo e(translate('messages.section')); ?></small>
                    <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                </li>

                <!-- withdraw -->
                <?php if(\App\CentralLogics\Helpers::module_permission_check('withdraw_list')): ?>
                <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/vendor/withdraw*') ? 'active' : ''); ?>">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="<?php echo e(route('admin.vendor.withdraw_list')); ?>" title="<?php echo e(translate('messages.store')); ?> <?php echo e(translate('messages.withdraws')); ?>">
                        <i class="tio-table nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(translate('messages.store')); ?>

                            <?php echo e(translate('messages.withdraws')); ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <!-- End withdraw -->
                <!-- account -->
                <?php if(\App\CentralLogics\Helpers::module_permission_check('account')): ?>
                <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/account-transaction*') ? 'active' : ''); ?>">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="<?php echo e(route('admin.account-transaction.index')); ?>" title="<?php echo e(translate('messages.collect')); ?> <?php echo e(translate('messages.cash')); ?>">
                        <i class="tio-money nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(translate('messages.collect')); ?>

                            <?php echo e(translate('messages.cash')); ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <!-- End account -->

                <!-- provide_dm_earning -->
                <?php if(\App\CentralLogics\Helpers::module_permission_check('provide_dm_earning')): ?>
                <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/provide-deliveryman-earnings*') ? 'active' : ''); ?>">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="<?php echo e(route('admin.provide-deliveryman-earnings.index')); ?>" title="<?php echo e(translate('messages.deliverymen_earning_provide')); ?>">
                        <i class="tio-send nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(translate('messages.deliverymen_earning_provide')); ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <!-- End provide_dm_earning -->

                <!-- Business Settings -->
                <?php if(\App\CentralLogics\Helpers::module_permission_check('settings')): ?>
                <li class="nav-item">
                    <small class="nav-subtitle" title="<?php echo e(translate('messages.business')); ?> <?php echo e(translate('messages.settings')); ?>"><?php echo e(translate('messages.business')); ?>

                        <?php echo e(translate('messages.settings')); ?></small>
                    <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                </li>
                <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/business-settings/business-setup') ? 'active' : ''); ?>">
                    <a class="nav-link " href="<?php echo e(route('admin.business-settings.business-setup')); ?>" title="<?php echo e(translate('messages.business')); ?> <?php echo e(translate('messages.setup')); ?>">
                        <span class="tio-settings nav-icon"></span>
                        <span class="text-truncate"><?php echo e(translate('messages.business')); ?>

                            <?php echo e(translate('messages.setup')); ?></span>
                    </a>
                </li>
                <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/business-settings/social-media')?'active':''); ?>">
                    <a class="nav-link " href="<?php echo e(route('admin.business-settings.social-media.index')); ?>" title="<?php echo e(translate('messages.Social Media')); ?>">
                        <span class="tio-facebook nav-icon"></span>
                        <span class="text-truncate"><?php echo e(translate('messages.Social Media')); ?></span>
                    </a>
                </li>
                <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/business-settings/payment-method') ? 'active' : ''); ?>">
                    <a class="nav-link " href="<?php echo e(route('admin.business-settings.payment-method')); ?>" title="<?php echo e(translate('messages.payment')); ?> <?php echo e(translate('messages.methods')); ?>">
                        <span class="tio-atm nav-icon"></span>
                        <span class="text-truncate"><?php echo e(translate('messages.payment')); ?>

                            <?php echo e(translate('messages.methods')); ?></span>
                    </a>
                </li>
                <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/business-settings/mail-config') ? 'active' : ''); ?>">
                    <a class="nav-link " href="<?php echo e(route('admin.business-settings.mail-config')); ?>" title="<?php echo e(translate('messages.mail')); ?> <?php echo e(translate('messages.config')); ?>">
                        <span class="tio-email nav-icon"></span>
                        <span class="text-truncate"><?php echo e(translate('messages.mail')); ?>

                            <?php echo e(translate('messages.config')); ?></span>
                    </a>
                </li>
                <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/business-settings/sms-module') ? 'active' : ''); ?>">
                    <a class="nav-link " href="<?php echo e(route('admin.business-settings.sms-module')); ?>" title="<?php echo e(translate('messages.sms')); ?> <?php echo e(translate('messages.module')); ?>">
                        <span class="tio-message nav-icon"></span>
                        <span class="text-truncate"><?php echo e(translate('messages.sms')); ?>

                            <?php echo e(translate('messages.module')); ?></span>
                    </a>
                </li>

                <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/business-settings/fcm-index') ? 'active' : ''); ?>">
                    <a class="nav-link " href="<?php echo e(route('admin.business-settings.fcm-index')); ?>" title="<?php echo e(translate('messages.push')); ?> <?php echo e(translate('messages.notification')); ?>">
                        <span class="tio-notifications nav-icon"></span>
                        <span class="text-truncate"><?php echo e(translate('messages.notification')); ?>

                            <?php echo e(translate('messages.settings')); ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <!-- End Business Settings -->

                <!-- web & adpp Settings -->
                <?php if(\App\CentralLogics\Helpers::module_permission_check('settings')): ?>
                <li class="nav-item">
                    <small class="nav-subtitle" title="<?php echo e(translate('messages.business')); ?> <?php echo e(translate('messages.settings')); ?>"><?php echo e(translate('messages.web_and_app')); ?>

                        <?php echo e(translate('messages.settings')); ?></small>
                    <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                </li>
                <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/business-settings/app-settings*') ? 'active' : ''); ?>">
                    <a class="nav-link " href="<?php echo e(route('admin.business-settings.app-settings')); ?>" title="<?php echo e(translate('messages.app_settings')); ?>">
                        <span class="tio-android nav-icon"></span>
                        <span class="text-truncate"><?php echo e(translate('messages.app_settings')); ?></span>
                    </a>
                </li>
                <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/business-settings/landing-page-settings*') ? 'active' : ''); ?>">
                    <a class="nav-link " href="<?php echo e(route('admin.business-settings.landing-page-settings', 'index')); ?>" title="<?php echo e(translate('messages.landing_page_settings')); ?>">
                        <span class="tio-website nav-icon"></span>
                        <span class="text-truncate"><?php echo e(translate('messages.landing_page_settings')); ?></span>
                    </a>
                </li>
                <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/business-settings/config*') ? 'active' : ''); ?>">
                    <a class="nav-link " href="<?php echo e(route('admin.business-settings.config-setup')); ?>" title="<?php echo e(translate('messages.third_party_apis')); ?>">
                        <span class="tio-key nav-icon"></span>
                        <span class="text-truncate"><?php echo e(translate('messages.third_party_apis')); ?></span>
                    </a>
                </li>

                <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/business-settings/pages*') ? 'active' : ''); ?>">
                    <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:" title="<?php echo e(translate('messages.pages')); ?> <?php echo e(translate('messages.setup')); ?>">
                        <i class="tio-pages nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(translate('messages.pages')); ?>

                            <?php echo e(translate('messages.setup')); ?></span>
                    </a>
                    <ul class="js-navbar-vertical-aside-submenu nav nav-sub" style="display: <?php echo e(Request::is('admin/business-settings/pages*') ? 'block' : 'none'); ?>">

                        <li class="nav-item <?php echo e(Request::is('admin/business-settings/pages/terms-and-conditions') ? 'active' : ''); ?>">
                            <a class="nav-link " href="<?php echo e(route('admin.business-settings.terms-and-conditions')); ?>" title="<?php echo e(translate('messages.terms_and_condition')); ?>">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate"><?php echo e(translate('messages.terms_and_condition')); ?></span>
                            </a>
                        </li>

                        <li class="nav-item <?php echo e(Request::is('admin/business-settings/pages/privacy-policy') ? 'active' : ''); ?>">
                            <a class="nav-link " href="<?php echo e(route('admin.business-settings.privacy-policy')); ?>" title="<?php echo e(translate('messages.privacy_policy')); ?>">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate"><?php echo e(translate('messages.privacy_policy')); ?></span>
                            </a>
                        </li>

                        <li class="nav-item <?php echo e(Request::is('admin/business-settings/pages/about-us') ? 'active' : ''); ?>">
                            <a class="nav-link " href="<?php echo e(route('admin.business-settings.about-us')); ?>" title="<?php echo e(translate('messages.about_us')); ?>">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate"><?php echo e(translate('messages.about_us')); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/file-manager*') ? 'active' : ''); ?>">
                    <a class="nav-link " href="<?php echo e(route('admin.file-manager.index')); ?>" title="<?php echo e(translate('messages.third_party_apis')); ?>">
                        <span class="tio-album nav-icon"></span>
                        <span class="text-truncate text-capitalize"><?php echo e(translate('messages.gallery')); ?></span>
                    </a>
                </li>

                

                <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/business-settings/recaptcha*') ? 'active' : ''); ?>">
                    <a class="nav-link " href="<?php echo e(route('admin.business-settings.recaptcha_index')); ?>" title="<?php echo e(translate('messages.reCaptcha')); ?>">
                        <span class="tio-top-security-outlined nav-icon"></span>
                        <span class="text-truncate"><?php echo e(translate('messages.reCaptcha')); ?></span>
                    </a>
                </li>

                <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/business-settings/db-index')?'active':''); ?>">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="<?php echo e(route('admin.business-settings.db-index')); ?>">
                        <i class="tio-cloud nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                            <?php echo e(translate('clean_database')); ?>

                        </span>
                    </a>
                </li>
                <?php endif; ?>
                <!-- End web & adpp Settings -->

                <!-- Report -->
                <?php if(\App\CentralLogics\Helpers::module_permission_check('report')): ?>
                <li class="nav-item">
                    <small class="nav-subtitle" title="<?php echo e(translate('messages.report_and_analytics')); ?>"><?php echo e(translate('messages.report_and_analytics')); ?></small>
                    <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                </li>

                <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/report/day-wise-report') ? 'active' : ''); ?>">
                    <a class="nav-link " href="<?php echo e(route('admin.report.day-wise-report')); ?>" title="<?php echo e(translate('messages.day_wise_report')); ?>">
                        <span class="tio-chart-pie-1 nav-icon"></span>
                        <span class="text-truncate"><?php echo e(translate('messages.day_wise_report')); ?></span>
                    </a>
                </li>

                <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/report/item-wise-report') ? 'active' : ''); ?>">
                    <a class="nav-link " href="<?php echo e(route('admin.report.item-wise-report')); ?>" title="<?php echo e(translate('messages.item_wise_report')); ?>">
                        <span class="tio-chart-bar-1 nav-icon"></span>
                        <span class="text-truncate"><?php echo e(translate('messages.item_wise_report')); ?></span>
                    </a>
                </li>

                <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/report/stock-report') ? 'active' : ''); ?>">
                    <a class="nav-link " href="<?php echo e(route('admin.report.stock-report')); ?>" title="<?php echo e(translate('messages.stock_report')); ?>">
                        <span class="tio-chart-bar-4 nav-icon"></span>
                        <span class="text-truncate text-capitalize"><?php echo e(translate('messages.stock_report')); ?></span>
                    </a>
                </li>
                <?php endif; ?>

                <!-- Employee-->

                <li class="nav-item">
                    <small class="nav-subtitle" title="<?php echo e(translate('messages.employee_handle')); ?>"><?php echo e(translate('messages.employee')); ?>

                        <?php echo e(translate('section')); ?></small>
                    <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                </li>

                <?php if(\App\CentralLogics\Helpers::module_permission_check('custom_role')): ?>
                <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/custom-role*') ? 'active' : ''); ?>">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="<?php echo e(route('admin.custom-role.create')); ?>" title="<?php echo e(translate('messages.employee')); ?> <?php echo e(translate('messages.Role')); ?>">
                        <i class="tio-incognito nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(translate('messages.employee')); ?>

                            <?php echo e(translate('messages.Role')); ?></span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if(\App\CentralLogics\Helpers::module_permission_check('employee')): ?>
                <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/employee*') ? 'active' : ''); ?>">
                    <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:" title="<?php echo e(translate('messages.Employee')); ?>">
                        <i class="tio-user nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(translate('messages.employees')); ?></span>
                    </a>
                    <ul class="js-navbar-vertical-aside-submenu nav nav-sub" style="display: <?php echo e(Request::is('admin/employee*') ? 'block' : 'none'); ?>">
                        <li class="nav-item <?php echo e(Request::is('admin/employee/add-new') ? 'active' : ''); ?>">
                            <a class="nav-link " href="<?php echo e(route('admin.employee.add-new')); ?>" title="<?php echo e(translate('messages.add')); ?> <?php echo e(translate('messages.new')); ?> <?php echo e(translate('messages.Employee')); ?>">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate"><?php echo e(translate('messages.add')); ?>

                                    <?php echo e(translate('messages.new')); ?></span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e(Request::is('admin/employee/list') ? 'active' : ''); ?>">
                            <a class="nav-link " href="<?php echo e(route('admin.employee.list')); ?>" title="<?php echo e(translate('messages.Employee')); ?> <?php echo e(translate('messages.list')); ?>">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate"><?php echo e(translate('messages.list')); ?></span>
                            </a>
                        </li>

                    </ul>
                </li>
                <?php endif; ?>
                <!-- End Employee -->


                <li class="nav-item" style="padding-top: 100px">

                </li>
                </ul>
            </div>
            <!-- End Content -->
        </div>
    </aside>
</div>

<div id="sidebarCompact" class="d-none">

</div><?php /**PATH /home/crelocok/public_html/resources/views/layouts/admin/partials/_sidebar.blade.php ENDPATH**/ ?>