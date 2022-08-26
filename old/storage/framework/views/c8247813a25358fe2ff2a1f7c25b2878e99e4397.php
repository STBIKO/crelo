<?php $__env->startSection('title',translate('messages.add_new_store')); ?>

<?php $__env->startPush('css_or_js'); ?>
<style>
    #map{
        height: 100%;
    }
    @media  only screen and (max-width: 768px) {
        /* For mobile phones: */
        #map{
            height: 200px;
        }
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header" style="border-bottom:0;padding-bottom:0;">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title"><i class="tio-add-circle-outlined"></i> <?php echo e(translate('messages.add')); ?> <?php echo e(translate('messages.new')); ?> <?php echo e(translate('messages.store')); ?></h1>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="row gx-2 gx-lg-3">
            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                <form action="<?php echo e(route('admin.vendor.store')); ?>" method="post" enctype="multipart/form-data" class="js-validate" id="vendor_form">
                    <?php echo csrf_field(); ?>

                    <small class="nav-subtitle text-secondary border-bottom"><?php echo e(translate('messages.store')); ?> <?php echo e(translate('messages.info')); ?></small>
                    <br>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="input-label" for="name"><?php echo e(translate('messages.store')); ?> <?php echo e(translate('messages.name')); ?></label>
                                <input type="text" name="name" class="form-control" placeholder="<?php echo e(translate('messages.store')); ?> <?php echo e(translate('messages.name')); ?>" value="<?php echo e(old('name')); ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="input-label" for="address"><?php echo e(translate('messages.store')); ?> <?php echo e(translate('messages.address')); ?></label>
                                <textarea type="text" name="address" class="form-control" placeholder="<?php echo e(translate('messages.store')); ?> <?php echo e(translate('messages.address')); ?>" required ><?php echo e(old('address')); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label class="input-label" for="tax"><?php echo e(translate('messages.vat/tax')); ?> (%)</label>
                                <input type="number" name="tax" class="form-control" placeholder="<?php echo e(translate('messages.vat/tax')); ?>" min="0" step=".01" required value="<?php echo e(old('tax')); ?>">
                            </div>
                            <div class="form-group">
                                <label class="input-label" for="maximum_delivery_time"><?php echo e(translate('messages.approx_delivery_time')); ?></label>
                                <div class="input-group">
                                    <input type="number" name="minimum_delivery_time" class="form-control" placeholder="Min: 10" value="<?php echo e(old('minimum_delivery_time')); ?>">
                                    <input type="number" name="maximum_delivery_time" class="form-control" placeholder="Max: 20" value="<?php echo e(old('maximum_delivery_time')); ?>">
                                    <select name="delivery_time_type" class="form-control text-capitalize" id="" required>
                                        <option value="min"><?php echo e(translate('messages.minutes')); ?></option>
                                        <option value="hours"><?php echo e(translate('messages.hours')); ?></option>
                                        <option value="days"><?php echo e(translate('messages.days')); ?></option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="input-label"><?php echo e(translate('messages.store')); ?> <?php echo e(translate('messages.logo')); ?><small style="color: red"> ( <?php echo e(translate('messages.ratio')); ?> 1:1 )</small></label>
                                <div class="custom-file">
                                    <input type="file" name="logo" id="customFileEg1" class="custom-file-input"
                                        accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" required>
                                    <label class="custom-file-label" for="logo"><?php echo e(translate('messages.choose')); ?> <?php echo e(translate('messages.file')); ?></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12" style="margin-top: auto;margin-bottom: auto;">
                            <div class="form-group" style="margin-bottom:0%;">                       
                                <center>
                                    <img style="height: 200px;border: 1px solid; border-radius: 10px;" id="viewer"
                                        src="<?php echo e(asset('public/assets/admin/img/400x400/img2.jpg')); ?>" alt="<?php echo e(translate('store_logo')); ?>"/>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(translate('messages.module')); ?></label>
                                <select name="module_id" required
                                        class="form-control js-select2-custom"  data-placeholder="<?php echo e(translate('messages.select')); ?> <?php echo e(translate('messages.module')); ?>">
                                        <option value="" selected disabled><?php echo e(translate('messages.select')); ?> <?php echo e(translate('messages.module')); ?></option>
                                    <?php $__currentLoopData = \App\Models\Module::notParcel()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($module->id); ?>"><?php echo e($module->module_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <small class="text-danger"><?php echo e(translate('messages.module_change_warning')); ?></small>
                            </div>
                            <div class="form-group">
                                <label class="input-label" for="choice_zones"><?php echo e(translate('messages.zone')); ?><span
                                        class="input-label-secondary" title="<?php echo e(translate('messages.select_zone_for_map')); ?>"><img src="<?php echo e(asset('/public/assets/admin/img/info-circle.svg')); ?>" alt="<?php echo e(translate('messages.select_zone_for_map')); ?>"></span></label>
                                <select name="zone_id" id="choice_zones" required
                                        class="form-control js-select2-custom"  data-placeholder="<?php echo e(translate('messages.select')); ?> <?php echo e(translate('messages.zone')); ?>">
                                        <option value="" selected disabled><?php echo e(translate('messages.select')); ?> <?php echo e(translate('messages.zone')); ?></option>
                                    <?php $__currentLoopData = \App\Models\Zone::active()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(isset(auth('admin')->user()->zone_id)): ?>
                                            <?php if(auth('admin')->user()->zone_id == $zone->id): ?>
                                                <option value="<?php echo e($zone->id); ?>"><?php echo e($zone->name); ?></option>
                                            <?php endif; ?>
                                        <?php else: ?>
                                        <option value="<?php echo e($zone->id); ?>"><?php echo e($zone->name); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="input-label" for="latitude"><?php echo e(translate('messages.latitude')); ?><span
                                        class="input-label-secondary" title="<?php echo e(translate('messages.store_lat_lng_warning')); ?>"><img src="<?php echo e(asset('/public/assets/admin/img/info-circle.svg')); ?>" alt="<?php echo e(translate('messages.store_lat_lng_warning')); ?>"></span></label>
                                <input type="text" id="latitude"
                                       name="latitude" class="form-control"
                                       placeholder="Ex : -94.22213" value="<?php echo e(old('latitude')); ?>" required readonly>
                            </div>
                            <div class="form-group">
                                <label class="input-label" for="longitude"><?php echo e(translate('messages.longitude')); ?><span
                                        class="input-label-secondary" title="<?php echo e(translate('messages.store_lat_lng_warning')); ?>"><img src="<?php echo e(asset('/public/assets/admin/img/info-circle.svg')); ?>" alt="<?php echo e(translate('messages.store_lat_lng_warning')); ?>"></span></label>
                                <input type="text" 
                                       name="longitude" class="form-control"
                                       placeholder="Ex : 103.344322" id="longitude" value="<?php echo e(old('longitude')); ?>" required readonly>
                            </div>
                        </div>

                        <div class="col-md-8 col-12">
                            <input id="pac-input" class="controls rounded" style="height: 3em;width:fit-content;"
                                title="<?php echo e(translate('messages.search_your_location_here')); ?>" type="text"
                                placeholder="<?php echo e(translate('messages.search_here')); ?>" />
                            <div id="map"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name"><?php echo e(translate('messages.upload')); ?> <?php echo e(translate('messages.cover')); ?> <?php echo e(translate('messages.photo')); ?> <span class="text-danger">(<?php echo e(translate('messages.ratio')); ?> 2:1)</span></label>
                        <div class="custom-file">
                            <input type="file" name="cover_photo" id="coverImageUpload" class="custom-file-input"
                                accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                            <label class="custom-file-label" for="customFileUpload"><?php echo e(translate('messages.choose')); ?> <?php echo e(translate('messages.file')); ?></label>
                        </div>
                    </div> 
                    <center>
                        <img style="max-width: 100%;border: 1px solid; border-radius: 10px; max-height:200px;" id="coverImageViewer"
                        src="<?php echo e(asset('public/assets/admin/img/900x400/img1.jpg')); ?>" alt="Product thumbnail"/>
                    </center>  
                    <br>
                    <small class="nav-subtitle text-secondary border-bottom"><?php echo e(translate('messages.owner')); ?> <?php echo e(translate('messages.info')); ?></small>
                    <br>
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label class="input-label" for="f_name"><?php echo e(translate('messages.first')); ?> <?php echo e(translate('messages.name')); ?></label>
                                <input type="text" name="f_name" class="form-control" placeholder="<?php echo e(translate('messages.first')); ?> <?php echo e(translate('messages.name')); ?>"
                                     value="<?php echo e(old('f_name')); ?>"  required>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label class="input-label" for="l_name"><?php echo e(translate('messages.last')); ?> <?php echo e(translate('messages.name')); ?></label>
                                <input type="text" name="l_name" class="form-control" placeholder="<?php echo e(translate('messages.last')); ?> <?php echo e(translate('messages.name')); ?>"
                                value="<?php echo e(old('l_name')); ?>"  required>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label class="input-label" for="phone"><?php echo e(translate('messages.phone')); ?></label>
                                <input type="text" name="phone" class="form-control" placeholder="Ex : 017********"
                                value="<?php echo e(old('phone')); ?>" required>
                            </div>
                        </div>
                    </div>
                    <br>
                    
                    <small class="nav-subtitle text-secondary border-bottom"><?php echo e(translate('messages.login')); ?> <?php echo e(translate('messages.info')); ?></small>
                    <br>
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label class="input-label" for="email"><?php echo e(translate('messages.email')); ?></label>
                                <input type="email" name="email" class="form-control" placeholder="Ex : ex@example.com"
                                value="<?php echo e(old('email')); ?>"  required>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="js-form-message form-group">
                                <label class="input-label" for="signupSrPassword"><?php echo e(translate('messages.password')); ?></label>

                                <div class="input-group input-group-merge">
                                    <input type="password" class="js-toggle-password form-control" name="password" id="signupSrPassword" placeholder="<?php echo e(translate('messages.password_length_placeholder',['length'=>'5+'])); ?>" aria-label="<?php echo e(translate('messages.password_length_placeholder',['length'=>'5+'])); ?>" required
                                    data-msg="Your password is invalid. Please try again."
                                    data-hs-toggle-password-options='{
                                    "target": [".js-toggle-password-target-1", ".js-toggle-password-target-2"],
                                    "defaultClass": "tio-hidden-outlined",
                                    "showClass": "tio-visible-outlined",
                                    "classChangeTarget": ".js-toggle-passowrd-show-icon-1"
                                    }'>
                                    <div class="js-toggle-password-target-1 input-group-append">
                                        <a class="input-group-text" href="javascript:;">
                                            <i class="js-toggle-passowrd-show-icon-1 tio-visible-outlined"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="js-form-message form-group">
                                <label class="input-label" for="signupSrConfirmPassword"><?php echo e(translate('messages.confirm_password')); ?></label>

                                <div class="input-group input-group-merge">
                                <input type="password" class="js-toggle-password form-control" name="confirmPassword" id="signupSrConfirmPassword" placeholder="<?php echo e(translate('messages.password_length_placeholder',['length'=>'5+'])); ?>" aria-label="<?php echo e(translate('messages.password_length_placeholder',['length'=>'5+'])); ?>" required
                                        data-msg="Password does not match the confirm password."
                                        data-hs-toggle-password-options='{
                                        "target": [".js-toggle-password-target-1", ".js-toggle-password-target-2"],
                                        "defaultClass": "tio-hidden-outlined",
                                        "showClass": "tio-visible-outlined",
                                        "classChangeTarget": ".js-toggle-passowrd-show-icon-2"
                                        }'>
                                <div class="js-toggle-password-target-2 input-group-append">
                                    <a class="input-group-text" href="javascript:;">
                                    <i class="js-toggle-passowrd-show-icon-2 tio-visible-outlined"></i>
                                    </a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary"><?php echo e(translate('messages.submit')); ?></button>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>
    <script>
      $(document).on('ready', function () {
        <?php if(isset(auth('admin')->user()->zone_id)): ?>
            $('#choice_zones').trigger('change');
        <?php endif; ?>
        // INITIALIZATION OF SHOW PASSWORD
        // =======================================================
        $('.js-toggle-password').each(function () {
          new HSTogglePassword(this).init()
        });


        // INITIALIZATION OF FORM VALIDATION
        // =======================================================
        $('.js-validate').each(function() {
          $.HSCore.components.HSValidation.init($(this), {
            rules: {
              confirmPassword: {
                equalTo: '#signupSrPassword'
              }
            }
          });
        });
      });
    </script>
    <script>
        function readURL(input, viewer) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#'+viewer).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#customFileEg1").change(function () {
            readURL(this, 'viewer');
        });

        $("#coverImageUpload").change(function () {
            readURL(this, 'coverImageViewer');
        });
    </script>

    <script src="<?php echo e(asset('public/assets/admin/js/spartan-multi-image-picker.js')); ?>"></script>
    <script type="text/javascript">
        $(function () {
            $("#coba").spartanMultiImagePicker({
                fieldName: 'identity_image[]',
                maxCount: 5,
                rowHeight: '120px',
                groupClassName: 'col-lg-2 col-md-4 col-sm-4 col-6',
                maxFileSize: '',
                placeholderImage: {
                    image: '<?php echo e(asset('public/assets/admin/img/400x400/img2.jpg')); ?>',
                    width: '100%'
                },
                dropFileLabel: "Drop Here",
                onAddRow: function (index, file) {

                },
                onRenderedPreview: function (index) {

                },
                onRemoveRow: function (index) {

                },
                onExtensionErr: function (index, file) {
                    toastr.error('<?php echo e(translate('messages.please_only_input_png_or_jpg_type_file')); ?>', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                },
                onSizeErr: function (index, file) {
                    toastr.error('<?php echo e(translate('messages.file_size_too_big')); ?>', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            });
        });
    </script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(\App\Models\BusinessSetting::where('key', 'map_api_key')->first()->value); ?>&libraries=places&callback=initMap&v=3.45.8"></script>
    <script> 
        <?php ($default_location=\App\Models\BusinessSetting::where('key','default_location')->first()); ?>
        <?php ($default_location=$default_location->value?json_decode($default_location->value, true):0); ?>
        let myLatlng = { lat: <?php echo e($default_location?$default_location['lat']:'23.757989'); ?>, lng: <?php echo e($default_location?$default_location['lng']:'90.360587'); ?> };
        let map = new google.maps.Map(document.getElementById("map"), {
                zoom: 13,
                center: myLatlng,
            });
        var zonePolygon = null;
        let infoWindow = new google.maps.InfoWindow({
                content: "Click the map to get Lat/Lng!",
                position: myLatlng,
            });
        var bounds = new google.maps.LatLngBounds();
        function initMap() {           
            // Create the initial InfoWindow.
            infoWindow.open(map);
             //get current location block
             infoWindow = new google.maps.InfoWindow();
            // Try HTML5 geolocation.
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                    myLatlng = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                    };
                    infoWindow.setPosition(myLatlng);
                    infoWindow.setContent("Location found.");
                    infoWindow.open(map);
                    map.setCenter(myLatlng);
                },
                () => {
                    handleLocationError(true, infoWindow, map.getCenter());
                    }
                );
            } else {
            // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }
            //-----end block------
            const input = document.getElementById("pac-input");
            const searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);
            let markers = [];
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
                    document.getElementById('latitude').value = place.geometry.location.lat();
                    document.getElementById('longitude').value = place.geometry.location.lng();
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
        initMap();
        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(
                browserHasGeolocation
                ? "Error: The Geolocation service failed."
                : "Error: Your browser doesn't support geolocation."
            );
            infoWindow.open(map);
        }
        $('#choice_zones').on('change', function(){
            var id = $(this).val();
            $.get({
                url: '<?php echo e(url('/')); ?>/admin/zone/get-coordinates/'+id,
                dataType: 'json',
                success: function (data) {
                    if(zonePolygon)
                    {
                        zonePolygon.setMap(null);
                    }
                    zonePolygon = new google.maps.Polygon({
                        paths: data.coordinates,
                        strokeColor: "#FF0000",
                        strokeOpacity: 0.8,
                        strokeWeight: 2,
                        fillColor: 'white',
                        fillOpacity: 0,
                    });
                    zonePolygon.setMap(map);
                    zonePolygon.getPaths().forEach(function(path) {
                        path.forEach(function(latlng) {
                            bounds.extend(latlng);
                            map.fitBounds(bounds);
                        });
                    });
                    map.setCenter(data.center);
                    google.maps.event.addListener(zonePolygon, 'click', function (mapsMouseEvent) {
                        infoWindow.close();
                        // Create a new InfoWindow.
                        infoWindow = new google.maps.InfoWindow({
                        position: mapsMouseEvent.latLng,
                        content: JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2),
                        });
                        var coordinates = JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2);
                        var coordinates = JSON.parse(coordinates);

                        document.getElementById('latitude').value = coordinates['lat'];
                        document.getElementById('longitude').value = coordinates['lng'];
                        infoWindow.open(map);
                    });    
                },
            });
        });
        $("#vendor_form").on('keydown', function(e){
            if (e.keyCode === 13) {
                e.preventDefault();
            }
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crelocok/public_html/resources/views/admin-views/vendor/index.blade.php ENDPATH**/ ?>