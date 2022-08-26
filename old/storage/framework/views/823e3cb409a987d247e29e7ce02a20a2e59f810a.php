<div class="d-flex flex-row" style="max-height: 300px; overflow-y: scroll;">
        <table class="table table-bordered">
            <thead class="text-muted">
                <tr>
                    <th scope="col"><?php echo e(translate('messages.item')); ?></th>
                    <th scope="col" class="text-center"><?php echo e(translate('messages.qty')); ?></th>
                    <th scope="col"><?php echo e(translate('messages.price')); ?></th>
                    <th scope="col"><?php echo e(translate('messages.delete')); ?></th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $subtotal = 0;
                $addon_price = 0;
                $tax = $store? $store->tax: 0;
                $discount = 0;
                $discount_type = 'amount';
                $discount_on_product = 0;
            ?>    
            <?php if(session()->has('cart') && count( session()->get('cart')) > 0): ?>
                <?php
                    $cart = session()->get('cart');
                    if(isset($cart['tax']))
                    {
                        $tax = $cart['tax'];
                    }
                    if(isset($cart['discount']))
                    {
                        $discount = $cart['discount'];
                        $discount_type = $cart['discount_type'];
                    }
                ?>
                <?php $__currentLoopData = session()->get('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(is_array($cartItem)): ?>
                    <?php
                    $product_subtotal = ($cartItem['price'])*$cartItem['quantity'];
                    $discount_on_product += ($cartItem['discount']*$cartItem['quantity']);
                    $subtotal += $product_subtotal;
                    $addon_price += $cartItem['addon_price'];
                    ?>
                <tr>
                    <td class="media align-items-center cursor-pointer" onclick="quickViewCartItem(<?php echo e($cartItem['id']); ?>, <?php echo e($key); ?>)">          
                        <img class="avatar avatar-sm mr-1" src="<?php echo e(asset('storage/app/public/product')); ?>/<?php echo e($cartItem['image']); ?>" 
                                onerror="this.src='<?php echo e(asset('public/assets/admin/img/160x160/img2.jpg')); ?>'" alt="<?php echo e($cartItem['name']); ?> image">
                        <div class="media-body">
                            <h5 class="text-hover-primary mb-0"><?php echo e(Str::limit($cartItem['name'], 10)); ?></h5>
                            <small><?php echo e(Str::limit($cartItem['variant'], 20)); ?></small>
                        </div>
                    </td>
                    <td class="align-items-center text-center">
                        <input type="number"  data-key="<?php echo e($key); ?>" style="width:50px;text-align: center;" value="<?php echo e($cartItem['quantity']); ?>" min="1" onkeyup="updateQuantity(event)">
                    </td>
                    <td class="text-center px-0 py-1">
                        <div class="btn">
                            <?php echo e(\App\CentralLogics\Helpers::format_currency($product_subtotal)); ?>

                        </div> <!-- price-wrap .// -->
                    </td>
                    <td class="align-items-center text-center">
                        <a href="javascript:removeFromCart(<?php echo e($key); ?>)" class="btn btn-sm btn-outline-danger"> <i class="tio-delete-outlined"></i></a>
                    </td>
                </tr>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>

    <?php
        $total = $subtotal+$addon_price;
        $discount_amount = ($discount_type=='percent' && $discount>0)?((($total-$discount_on_product) * $discount)/100):$discount;
        $total -= ($discount_amount + $discount_on_product);
        $total_tax_amount= ($tax > 0)?(($total * $tax)/100):0;
    ?>
    <div class="box p-3">
        <dl class="row text-sm-right">

            <dt  class="col-sm-6"><?php echo e(translate('messages.addon')); ?>:</dt>
            <dd class="col-sm-6 text-right"><?php echo e(\App\CentralLogics\Helpers::format_currency($addon_price)); ?></dd>

            <dt  class="col-sm-6"><?php echo e(translate('messages.subtotal')); ?>:</dt>
            <dd class="col-sm-6 text-right"><?php echo e(\App\CentralLogics\Helpers::format_currency($subtotal+$addon_price)); ?></dd>


            <dt  class="col-sm-6"><?php echo e(translate('messages.discount')); ?> :</dt>
            <dd class="col-sm-6 text-right">- <?php echo e(\App\CentralLogics\Helpers::format_currency(round($discount_on_product,2))); ?></dd>

            <dt  class="col-sm-6"><?php echo e(translate('messages.extra_discount')); ?> :</dt>
            <dd class="col-sm-6 text-right"><button class="btn btn-sm" type="button" data-toggle="modal" data-target="#add-discount"><i class="tio-edit"></i></button>- <?php echo e(\App\CentralLogics\Helpers::format_currency(round($discount_amount,2))); ?></dd>

            <dt  class="col-sm-6">Tax  : </dt>
            <dd class="col-sm-6 text-right"><button class="btn btn-sm" type="button" data-toggle="modal" data-target="#add-tax"><i class="tio-edit"></i></button><?php echo e(\App\CentralLogics\Helpers::format_currency(round($total_tax_amount,2))); ?></dd>
            
            <dt  class="col-sm-6">Total: </dt>
            <dd class="col-sm-6 text-right h4 b"> <?php echo e(\App\CentralLogics\Helpers::format_currency(round($total+$total_tax_amount, 2))); ?> </dd>
        </dl>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-danger btn-sm btn-block" onclick="emptyCart()"><i
                        class="fa fa-times-circle "></i> <?php echo e(translate('messages.cancel')); ?> </a>
            </div>
            <div class="col-md-6">
                <button type="button" class="btn  btn-primary btn-sm btn-block" data-toggle="modal" data-target="#paymentModal"><i class="fa fa-shopping-bag"></i>
                    <?php echo e(translate('messages.order')); ?> </button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add-discount" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(translate('messages.update_discount')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route('admin.pos.discount')); ?>" method="post" class="row">
                        <?php echo csrf_field(); ?>
                        <div class="form-group col-sm-6">
                            <label for=""><?php echo e(translate('messages.discount')); ?></label>
                            <input type="number" class="form-control" name="discount" min="0" id="discount_input" value="<?php echo e($discount); ?>" max="<?php echo e($discount_type=='percent'?100:1000000000); ?>">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for=""><?php echo e(translate('messages.type')); ?></label>
                            <select name="type" class="form-control" id="discount_input_type" onchange="document.getElementById('discount_input').max=(this.value=='percent'?100:1000000000);">
                                <option value="amount" <?php echo e($discount_type=='amount'?'selected':''); ?>><?php echo e(translate('messages.amount')); ?>(<?php echo e(\App\CentralLogics\Helpers::currency_symbol()); ?>)</option>
                                <option value="percent" <?php echo e($discount_type=='percent'?'selected':''); ?>><?php echo e(translate('messages.percent')); ?>(%)</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-12">
                            <button class="btn btn-sm btn-primary" type="submit"><?php echo e(translate('messages.submit')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add-tax" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(translate('messages.update_tax')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route('admin.pos.tax')); ?>" method="POST" class="row" id="order_submit_form">
                        <?php echo csrf_field(); ?>
                        <div class="form-group col-12">
                            <label for=""><?php echo e(translate('messages.tax')); ?>(%)</label>
                            <input type="number" class="form-control" name="tax" min="0">
                        </div>

                        <div class="form-group col-sm-12">
                            <button class="btn btn-sm btn-primary" type="submit"><?php echo e(translate('messages.submit')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="paymentModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(translate('messages.payment')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route('admin.pos.order')); ?>?store_id=<?php echo e(request('store_id')); ?>" id='order_place' method="post" onkeydown="return event.key != 'Enter';">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="user_id" id="customer_id">
                        <div class="row w-100">
                            <div class="form-group col-12">
                                <label class="input-label" for=""><?php echo e(translate('messages.amount')); ?>(<?php echo e(\App\CentralLogics\Helpers::currency_symbol()); ?>)</label>
                                <input type="number" class="form-control" name="amount" min="0" step="0.01" value="<?php echo e(round($total+$total_tax_amount, 2)); ?>">
                            </div>
                            <div class="form-group col-12">
                                <label class="input-label" for=""><?php echo e(translate('messages.type')); ?></label>
                                <select name="type" class="form-control">
                                    <option value="cash"><?php echo e(translate('messages.cash')); ?></option>
                                    <option value="card"><?php echo e(translate('messages.card')); ?></option>
                                </select>
                            </div>                            
                        </div>

                        <div class="row collapse" id="delivery_address">
                            <div class="form-group col-12">
                                <label class="input-label" for=""><?php echo e(translate('messages.contact_person_name')); ?></label>
                                <input type="text" class="form-control" name="contact_person_name" value="<?php echo e(old('contact_person_name')); ?>">
                            </div>
                            <div class="form-group col-12">
                                <label class="input-label" for=""><?php echo e(translate('messages.contact_person_number')); ?></label>
                                <input type="text" class="form-control" name="contact_person_number" value="<?php echo e(old('contact_person_number')); ?>">
                            </div>
                            <div class="form-group col-12">
                                <label class="input-label" for=""><?php echo e(translate('messages.address')); ?></label>
                                <textarea name="address" class="form-control" cols="30" rows="2"></textarea>
                            </div>
                            <div class="form-group col-12">
                                <label class="input-label" for=""><?php echo e(translate('messages.Floor')); ?></label>
                                <input type="text" class="form-control" name="floor" value="<?php echo e(old('floor')); ?>">
                            </div>
                            <div class="form-group col-12">
                                <label class="input-label" for=""><?php echo e(translate('messages.Road')); ?></label>
                                <input type="text" class="form-control" name="road" value="<?php echo e(old('road')); ?>">
                            </div>
                            <div class="form-group col-12">
                                <label class="input-label" for=""><?php echo e(translate('messages.House')); ?></label>
                                <input type="text" class="form-control" name="house" value="<?php echo e(old('house')); ?>">
                            </div>
                            <div class="form-group col-12">
                                <label class="input-label" for=""><?php echo e(translate('messages.longitude')); ?></label>
                                <input type="text" class="form-control" id="longitude" name="longitude" value="<?php echo e(old('longitude')); ?>" readonly>
                            </div>
                            <div class="form-group col-12">
                                <label class="input-label" for=""><?php echo e(translate('messages.latitude')); ?></label>
                                <input type="text" class="form-control" id="latitude" name="latitude" value="<?php echo e(old('latitude')); ?>" readonly>
                            </div>
                            <div class="col-12">
                                <input id="pac-input" class="controls rounded" style="height: 3em;width:fit-content;"
                                    title="<?php echo e(translate('messages.search_your_location_here')); ?>" type="text"
                                    placeholder="<?php echo e(translate('messages.search_here')); ?>" />
                                <div class="mb-2" id="map" style="height: 200px;"></div>
                            </div>
                        </div>
                        <div class="form-group col-12 d-flex justify-content-between">
                            <button class="btn btn-sm btn-primary" type="submit"><?php echo e(translate('messages.submit')); ?></button>
                            <button class="btn btn-sm btn-secondary" type="button" data-toggle="collapse" data-target="#delivery_address"><?php echo e(translate('messages.Delivery address')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
    $('#delivery_address').on('shown.bs.collapse', function() {
        console.log('delivery_address clicked');
        initMap();
    });
    </script>

    <?php /**PATH /home/crelocok/public_html/resources/views/admin-views/pos/_cart.blade.php ENDPATH**/ ?>