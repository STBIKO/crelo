<?php $__env->startSection('title','Add new zone'); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title"><i
                            class="tio-add-circle-outlined"></i> <?php echo e(translate('messages.add')); ?> <?php echo e(translate('messages.new')); ?> <?php echo e(translate('messages.zone')); ?>

                    </h1>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="row gx-2 gx-lg-3">
            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                <form action="<?php echo e(route('admin.zone.store')); ?>" method="post" id="zone_form">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="input-label"
                                       for="exampleFormControlInput1"><?php echo e(translate('messages.name')); ?></label>
                                <input type="text" name="name" class="form-control" placeholder="<?php echo e(translate('messages.new_zone')); ?>" value="<?php echo e(old('name')); ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="input-label"
                                       for="exampleFormControlInput1">Coordinates<span class="input-label-secondary" title="<?php echo e(translate('messages.draw_your_zone_on_the_map')); ?>"><?php echo e(translate('messages.draw_your_zone_on_the_map')); ?></span></label>
                                       <textarea type="text" rows="8" name="coordinates"  id="coordinates" class="form-control" readonly></textarea>
                            </div>
                        </div>
                        <div class="col-md-6 map-warper" style="height: 300px;">
                            <input id="pac-input" class="controls rounded" style="height: 3em;width:fit-content;" title="<?php echo e(translate('messages.search_your_location_here')); ?>" type="text" placeholder="<?php echo e(translate('messages.search_here')); ?>"/>
                            <div id="map-canvas" style="height: 100%; margin:0px; padding: 0px;"></div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary"><?php echo e(translate('messages.add')); ?></button>
                </form>
            </div>

            <div class="col-sm-12 col-lg-12 mb-3 my-lg-2">
                <div class="card">
                    <div class="card-header">
                        <h5><?php echo e(translate('messages.zone')); ?> <?php echo e(translate('messages.list')); ?><span class="badge badge-soft-dark ml-2" id="itemCount"><?php echo e($zones->total()); ?></span></h5>
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
                                        placeholder="<?php echo e(translate('messages.search')); ?>" aria-label="<?php echo e(translate('messages.search')); ?>" required>
                                <button type="submit" class="btn btn-light"><?php echo e(translate('messages.search')); ?></button>

                            </div>
                            <!-- End Search -->
                        </form>
                    </div>
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
                                <th><?php echo e(translate('messages.#')); ?></th>
                                <th><?php echo e(translate('messages.id')); ?></th>
                                <th ><?php echo e(translate('messages.name')); ?></th>
                                <th ><?php echo e(translate('messages.stores')); ?></th>
                                <th ><?php echo e(translate('messages.deliverymen')); ?></th>
                                <th ><?php echo e(translate('messages.status')); ?></th>
                                <th ><?php echo e(translate('messages.action')); ?></th>
                            </tr>
                            </thead>

                            <tbody id="set-rows">
                            <?php $__currentLoopData = $zones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$zone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($key+$zones->firstItem()); ?></td>
                                    <td><?php echo e($zone->id); ?></td>
                                    <td>
                                    <span class="d-block font-size-sm text-body">
                                        <?php echo e($zone['name']); ?>

                                    </span>
                                    </td>
                                    <td><?php echo e($zone->stores_count); ?></td>
                                    <td><?php echo e($zone->deliverymen_count); ?></td>
                                    <td>
                                        <label class="toggle-switch toggle-switch-sm" for="stocksCheckbox<?php echo e($zone->id); ?>">
                                            <input type="checkbox" onclick="status_form_alert('status-<?php echo e($zone['id']); ?>','Want to change status for this zone ?', event)" class="toggle-switch-input" id="stocksCheckbox<?php echo e($zone->id); ?>" <?php echo e($zone->status?'checked':''); ?>>
                                            <span class="toggle-switch-label">
                                                <span class="toggle-switch-indicator"></span>
                                            </span>
                                        </label>
                                        <form action="<?php echo e(route('admin.zone.status',[$zone['id'],$zone->status?0:1])); ?>" method="get" id="status-<?php echo e($zone['id']); ?>">
                                        </form>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-white"
                                            href="<?php echo e(route('admin.zone.edit',[$zone['id']])); ?>" title="<?php echo e(translate('messages.edit')); ?> <?php echo e(translate('messages.zone')); ?>"><i class="tio-edit"></i>
                                        </a>
                                        
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <hr>
                        <div class="page-area">
                            <table>
                                <tfoot>
                                <?php echo $zones->withQueryString()->links(); ?>

                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Table -->
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>
    <script>
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
    auto_grow();
    function auto_grow() {
        let element = document.getElementById("coordinates");
        element.style.height = "5px";
        element.style.height = (element.scrollHeight)+"px";
    }

    </script>
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


            $('#column3_search').on('change', function () {
                datatable
                    .columns(2)
                    .search(this.value)
                    .draw();
            });


            // INITIALIZATION OF SELECT2
            // =======================================================
            $('.js-select2-custom').each(function () {
                var select2 = $.HSCore.components.HSSelect2.init($(this));
            });

            $("#zone_form").on('keydown', function(e){
                if (e.keyCode === 13) {
                    e.preventDefault();
                }
            })
        });
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(\App\Models\BusinessSetting::where('key', 'map_api_key')->first()->value); ?>&callback=initialize&libraries=drawing,places&v=3.49"></script>

    <script>
        var map; // Global declaration of the map
        var drawingManager;
        var lastpolygon = null;
        var polygons = [];

        function resetMap(controlDiv) {
            // Set CSS for the control border.
            const controlUI = document.createElement("div");
            controlUI.style.backgroundColor = "#fff";
            controlUI.style.border = "2px solid #fff";
            controlUI.style.borderRadius = "3px";
            controlUI.style.boxShadow = "0 2px 6px rgba(0,0,0,.3)";
            controlUI.style.cursor = "pointer";
            controlUI.style.marginTop = "8px";
            controlUI.style.marginBottom = "22px";
            controlUI.style.textAlign = "center";
            controlUI.title = "Reset map";
            controlDiv.appendChild(controlUI);
            // Set CSS for the control interior.
            const controlText = document.createElement("div");
            controlText.style.color = "rgb(25,25,25)";
            controlText.style.fontFamily = "Roboto,Arial,sans-serif";
            controlText.style.fontSize = "10px";
            controlText.style.lineHeight = "16px";
            controlText.style.paddingLeft = "2px";
            controlText.style.paddingRight = "2px";
            controlText.innerHTML = "X";
            controlUI.appendChild(controlText);
            // Setup the click event listeners: simply set the map to Chicago.
            controlUI.addEventListener("click", () => {
                lastpolygon.setMap(null);
                $('#coordinates').val('');
                
            });
        }

        function initialize() {
            <?php ($default_location=\App\Models\BusinessSetting::where('key','default_location')->first()); ?>
            <?php ($default_location=$default_location->value?json_decode($default_location->value, true):0); ?>
            var myLatlng = { lat: <?php echo e($default_location?$default_location['lat']:'23.757989'); ?>, lng: <?php echo e($default_location?$default_location['lng']:'90.360587'); ?> };


            var myOptions = {
                zoom: 13,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);
            drawingManager = new google.maps.drawing.DrawingManager({
                drawingMode: google.maps.drawing.OverlayType.POLYGON,
                drawingControl: true,
                drawingControlOptions: {
                position: google.maps.ControlPosition.TOP_CENTER,
                drawingModes: [google.maps.drawing.OverlayType.POLYGON]
                },
                polygonOptions: {
                editable: true
                }
            });
            drawingManager.setMap(map);


            //get current location block
            // infoWindow = new google.maps.InfoWindow();
            // Try HTML5 geolocation.
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                    const pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                    };
                    map.setCenter(pos);
                });
            }

            drawingManager.addListener("overlaycomplete", function(event) {
                if(lastpolygon)
                {
                    lastpolygon.setMap(null);
                }
                $('#coordinates').val(event.overlay.getPath().getArray());
                lastpolygon = event.overlay;
                auto_grow();
            });

            const resetDiv = document.createElement("div");
            resetMap(resetDiv, lastpolygon);
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(resetDiv);

            // Create the search box and link it to the UI element.
            const input = document.getElementById("pac-input");
            const searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);
            // Bias the SearchBox results towards current map's viewport.
            map.addListener("bounds_changed", () => {
                searchBox.setBounds(map.getBounds());
            });
            let markers = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener("places_changed", () => {
                const places = searchBox.getPlaces();

                if (places.length == 0) {
                return;
                }
                // Clear out the old markers.
                markers.forEach((marker) => {
                marker.setMap(null);
                });
                markers = [];
                // For each place, get the icon, name and location.
                const bounds = new google.maps.LatLngBounds();
                places.forEach((place) => {
                if (!place.geometry || !place.geometry.location) {
                    console.log("Returned place contains no geometry");
                    return;
                }
                const icon = {
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25),
                };
                // Create a marker for each place.
                markers.push(
                    new google.maps.Marker({
                    map,
                    icon,
                    title: place.name,
                    position: place.geometry.location,
                    })
                );

                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
                });
                map.fitBounds(bounds);
            });
        }

        // initialize();


        function set_all_zones()
        {
            $.get({
                url: '<?php echo e(route('admin.zone.zoneCoordinates')); ?>',
                dataType: 'json',
                success: function (data) {
                    for(var i=0; i<data.length;i++)
                    {
                        polygons.push(new google.maps.Polygon({
                            paths: data[i],
                            strokeColor: "#FF0000",
                            strokeOpacity: 0.8,
                            strokeWeight: 2,
                            fillColor: "#FF0000",
                            fillOpacity: 0.1,
                        }));
                        polygons[i].setMap(map);
                    }
  
                },
            });
        }
        $(document).on('ready', function(){
            set_all_zones();
        });
        
    </script>
    <script>
        $('#search-form').on('submit', function () {
            var formData = new FormData(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post({
                url: '<?php echo e(route('admin.zone.search')); ?>',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('#loading').show();
                },
                success: function (data) {
                    $('#set-rows').html(data.view);
                    $('#itemCount').html(data.total);
                    $('.page-area').hide();
                },
                complete: function () {
                    $('#loading').hide();
                },
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crelocok/public_html/resources/views/admin-views/zone/index.blade.php ENDPATH**/ ?>