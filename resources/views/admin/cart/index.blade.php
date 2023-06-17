@extends('admin.app')

@section('content' )


    


<main>


  <div class="">
    <div class=" row">
   <div class="col-md-12">
    
<section class="bg-success">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-2 py-3">
                <h5><a href="/" class="text-dark">Home</a> › Cart</h5>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="row">
        <div class="col-md-12">
             <span class="clearfix">
                        Cart
                        <span class="basket-item-count">
                            <span class="badge badge-pill red"> 0 </span>
                        </span>
                    </span>
          </div>
            <div class="col-md-12">
                @if(isset($cart_data))
                    @if(Cookie::get('shopping_cart'))
                        @php $total="0" @endphp
                        <div class="shopping-cart">
                            <div class="shopping-cart-table">
                                <div class="table-responsive">
                                    <div class="col-md-12 text-right mb-3">
                                        <a href="javascript:void(0)" class="clear_cart font-weight-bold">Clear Cart</a>
                                    </div>
                                    <table class="table table-bordered my-auto  text-center">
                                        <thead>
                                            <tr>
                                                <th class="cart-description">Image</th>
                                                <th class="cart-product-name">Product Name</th>
                                                <th class="cart-price">Price</th>
                                                <th class="cart-qty">Quantity</th>
                                                <th class="cart-total">Grandtotal</th>
                                                <th class="cart-romove">Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody class="my-auto">
                                            @foreach ($cart_data as $data)
                                            <tr class="cartpage">
                                                <td class="cart-image">
                                                    <a class="entry-thumbnail" href="javascript:void(0)">
                                                        <img src="{{ asset('admin/uploads/productcatelist/'.$data['item_image']) }}" width="70px" alt="">
                                                    </a>
                                                </td>
                                                <td class="cart-product-name-info">
                                                    <h4 class='cart-product-description'>
                                                        <a href="javascript:void(0)">{{ $data['item_name'] }}</a>
                                                    </h4>
                                                </td>
                                                <td class="cart-product-sub-total">
                                                    <span class="cart-sub-total-price">{{ number_format($data['item_price'], 2) }}</span>
                                                </td>
                                              
                                                <td class="cart-product-quantity " width="130px">
                                                      <div class="input-group quantity d-flex">
                                                          <div class="input-group-prepend decrement-btn changeQuantity" style="cursor: pointer">
                                                              <span class="input-group-text">-</span>
                                                          </div>
                                                          <input type="text" class="qty-input form-control" maxlength="2" max="10" value="{{ $data['item_quantity'] }}" style="width: 30px;">
                                                          <div class="input-group-append increment-btn changeQuantity" style="cursor: pointer">
                                                              <span class="input-group-text">+</span>
                                                          </div>
                                                      </div>
                                                  </td>
                                                <td class="cart-product-grand-total">
                                                    <span class="cart-grand-total-price">{{ number_format($data['item_quantity'] * $data['item_price'], 2) }}</span>
                                                </td>
                                                <td style="font-size: 20px;">
                                                    <button type="button" class="delete_cart_data"><li class="fa fa-trash-o"></li> Delete</button>
                                                </td>
                                                @php $total = $total + ($data["item_quantity"] * $data["item_price"]) @endphp
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table><!-- /table -->
                                </div>
                            </div><!-- /.shopping-cart-table -->
                            <div class="row">

                                <div class="col-md-8 col-sm-12 estimate-ship-tax">
                                    <div>
                                        <a href="{{ url('collections') }}" class="btn btn-upper btn-warning outer-left-xs">Continue Shopping</a>
                                    </div>
                                </div><!-- /.estimate-ship-tax -->

                                <div class="col-md-4 col-sm-12 ">
                                    <div class="cart-shopping-total">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6 class="cart-subtotal-name">Subtotal</h6>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="cart-subtotal-price">
                                                    Rs.
                                                    <span class="cart-grand-price-viewajax">{{ number_format($total, 2) }}</span>
                                                </h6>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6 class="cart-grand-name">Grand Total</h6>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="cart-grand-price">
                                                    Rs.
                                                    <span class="cart-grand-price-viewajax">{{ number_format($total, 2) }}</span>
                                                </h6>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="cart-checkout-btn text-center">
                                                    @if (Auth::user())
                                                        <a href="{{ url('checkout') }}" class="btn btn-success btn-block checkout-btn">PROCCED TO CHECKOUT</a>
                                                    @else
                                                        <a href="{{ url('login') }}" class="btn btn-success btn-block checkout-btn">PROCCED TO CHECKOUT</a>
                                                        {{-- you add a pop modal for making a login --}}
                                                    @endif
                                                    <h6 class="mt-3">Checkout with Fabcart</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div><!-- /.shopping-cart -->
                    @endif
                @else
                    <div class="row">
                        <div class="col-md-12 mycard py-5 text-center">
                            <div class="mycards">
                                <h4>Your cart is currently empty.</h4>
                                <a href="{{ url('collections') }}" class="btn btn-upper btn-primary outer-left-xs mt-5">Continue Shopping</a>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div> <!-- /.row -->
    </div><!-- /.container -->
</section>
   </div>
       @foreach($product as $product)
    <div class="col-md-6 mt-3">
    <div class="card shadow-sm">

          <img src= "{{asset('products/'.$product->image) }}"  class="img-fluid" width="100px">            <div class="card-body">
              <p class="card-text">{{$product->name}}</p>
              <input type="hidden" class="product_id" name="{{$product->name}}"  value="{{$product->id}}"> <!-- Your Product ID -->
              <input type="hidden" class="qty-input" value="1"> 
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn add-to-cart-btn btn-md btn-outline-secondary">Add to cart</button>
                  
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          
        
       
    </div>
        </div>
        @endforeach


      </div>
    </div>
  </div>
</section>
</main>

<script>
     $(document).ready(function () {
        $('.add-to-cart-btn').click(function (e) {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            //$('input[name = quantity]').val()
            var product_id = $('.product_id').val();
            var quantity = $('.qty-input').val();
            //alert(product_id);
            $.ajax({
              url: "/admin/add-to-cart",
                method: "POST",
                data: {
                    'quantity': quantity,
                    'product_id': product_id,
                },
                success: function (response) {
                    alertify.set('notifier','position','top-right');
                    alertify.success(response.status);
                },
            });
        });
    });

     $(document).ready(function () {
        cartload();
    });

    function cartload()
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/admin/load-cart-data',
            method: "GET",
            success: function (response) {
                $('.basket-item-count').html('');
                var parsed = jQuery.parseJSON(response)
                var value = parsed; //Single Data Viewing
                $('.basket-item-count').append($('<span class="badge badge-pill red">'+ value['totalcart'] +'</span>'));
            }
        });
    }

    $(document).ready(function () {

$('.increment-btn').click(function (e) {
    e.preventDefault();
    var incre_value = $(this).parents('.quantity').find('.qty-input').val();
    var value = parseInt(incre_value, 10);
    value = isNaN(value) ? 0 : value;
    if(value<10){
        value++;
        $(this).parents('.quantity').find('.qty-input').val(value);
    }
});

$('.decrement-btn').click(function (e) {
    e.preventDefault();
    var decre_value = $(this).parents('.quantity').find('.qty-input').val();
    var value = parseInt(decre_value, 10);
    value = isNaN(value) ? 0 : value;
    if(value>1){
        value--;
        $(this).parents('.quantity').find('.qty-input').val(value);
    }
});

});

$(document).ready(function () {

$('.changeQuantity').click(function (e) {
    e.preventDefault();

    var quantity = $('.qty-input').val();
    var product_id = $('.product_id').val();

    var data = {
        '_token': $('input[name=_token]').val(),
        'quantity':quantity,
        'product_id':product_id,
    };

    $.ajax({
        url: '/admin/update-to-cart',
        type: 'POST',
        data: data,
        success: function (response) {
            window.location.reload();
            //alertify.set('notifier','position','top-right');
            alertify.success(response.status);
        }
    });
});

});

   // Delete Cart Data
   $(document).ready(function () {

$('.delete_cart_data').click(function (e) {
    e.preventDefault();

    var product_id = $('.product_id').val();

    var data = {
        '_token': $('input[name=_token]').val(),
        "product_id": product_id,
    };

    // $(this).closest(".cartpage").remove();

    $.ajax({
        url: '/admin/delete-from-cart',
        type: 'DELETE',
        data: data,
        success: function (response) {
            window.location.reload();
        }
    });
});

});

$(document).ready(function () {

$('.clear_cart').click(function (e) {
    e.preventDefault();

    $.ajax({
        url: '/admin/clear-cart',
        type: 'GET',
        success: function (response) {
            window.location.reload();
            alertify.set('notifier','position','top-right');
            alertify.success(response.status);
        }
    });

});

});
</script>
  @endsection
