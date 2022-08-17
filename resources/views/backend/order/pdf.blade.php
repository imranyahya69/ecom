<!DOCTYPE html>
<html>
<head>
  <title>Order @if($order)- {{$order->order_number}} @endif</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

@if($order)
<style type="text/css">
  .invoice-header {
    background: #f7f7f7;
    padding: 10px 20px 10px 20px;
    border-bottom: 1px solid gray;
  }
  .site-logo {
    margin-top: 20px;
  }
  .invoice-right-top h3 {
    padding-right: 20px;
    margin-top: 20px;
    color: #424646;
    font-size: 30px!important;
    font-family: serif;
  }
  .invoice-left-top {
    border-left: 4px solid #424646;
    padding-left: 20px;
    padding-top: 20px;
  }
  .invoice-left-top p {
    margin: 0;
    line-height: 20px;
    font-size: 16px;
    margin-bottom: 3px;
  }
  thead {
    background: #424646;
    color: #FFF;
  }
  .authority h5 {
    margin-top: -10px;
    color: #424646;
  }
  .thanks h4 {
    color: #424646;
    font-size: 25px;
    font-weight: normal;
    font-family: serif;
    margin-top: 20px;
  }
  .site-address p {
    line-height: 6px;
    font-weight: 300;
  }
  .table tfoot .empty {
    border: none;
  }
  .table-bordered {
    border: none;
  }
  .table-header {
    padding: .75rem 1.25rem;
    margin-bottom: 0;
    background-color: rgba(0,0,0,.03);
    border-bottom: 1px solid rgba(0,0,0,.125);
  }
  .table td, .table th {
    padding: .30rem;
  }
</style>
  <div class="invoice-header">
    <div class="float-left site-logo">
      <img src="https://rcmmultimedia.com/storage/photos/1/Untitled-2.png" alt="">
    </div>
    <div class="float-left site-address" style="margin-left: 20px;">
      <h4>RCM Multimedia</h4>
      <p>Usama center, Shop.4, 2nd floor, Hall Rd, Lahore, 54000 , Pakistan</p>
      <p>Phone:+92321 3232000</p>
      <p>Email: contact@rcmmultimedia.com</p>
    </div>
    <div class="clearfix"></div>
  </div>
  <div class="invoice-description">
    <div class="invoice-left-top float-left">
      <h3>Invoice to</h3>
      <p>
        <strong>Name: </strong>
        {{$order->first_name}} {{$order->last_name}}
      </p>
       <div class="address">
        <p><strong>Email:</strong> {{ $order->email }}</p>
        <p><strong>Phone:</strong> {{ $order->phone }}</p>
        <p>
          <strong>Country: </strong>
          {{$order->country}}
        </p>
        <p>
          <strong>Address: </strong>
          {{ $order->address1 }} OR {{ $order->address2}}
        </p>
      
       </div>
    </div>
    <div class="invoice-right-top float-right" class="text-right">
      <h5>Order # {{$order->order_number}}</h5>
      <h5>Order Date: {{ $order->created_at->format('d-m-Y (D)') }}</h5>
      {{-- <img class="img-responsive" src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(150)->generate(route('admin.product.order.show', $order->id )))}}"> --}}
    </div>
    <div class="clearfix"></div>
  </div>
  <section class="order_details pt-3">
    <div class="table-header">
      <h5>Order Details</h5>
    </div>
    <table class="table table-bordered table-stripe">
      <thead>
        <tr>
          <th scope="col" class="col-6">Product</th>
          <th scope="col" class="col-3">Quantity</th>
          <th scope="col" class="col-3">Total</th>
        </tr>
      </thead>
      <tbody>
      @foreach($order->cart_info as $cart)
      @php 
        $product=DB::table('products')->select('title')->where('id',$cart->product_id)->get();
      @endphp
        <tr>
          <td><span>
              @foreach($product as $pro)
                {{$pro->title}}
              @endforeach
            </span></td>
          <td>{{$cart->quantity}} Pieces</td>
          <td><span>Rs {{number_format($cart->price,2)}}</span></td>
        </tr>
      @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th scope="col" class="empty"></th>
          <th scope="col" class="text-right">Subtotal:</th>
          <th scope="col"> <span>Rs {{number_format($order->sub_total,2)}}</span></th>
        </tr>
      {{-- @if(!empty($order->coupon))
        <tr>
          <th scope="col" class="empty"></th>
          <th scope="col" class="text-right">Discount:</th>
          <th scope="col"><span>-{{$order->coupon->discount(Helper::orderPrice($order->id, $order->user->id))}}{{Helper::base_currency()}}</span></th>
        </tr>
      @endif --}}
        <tr>
          <th scope="col" class="empty"></th>
          @php
            $shipping_charge=DB::table('shippings')->where('id',$order->shipping_id)->pluck('price');
          @endphp
          <th scope="col" class="text-right ">Shipping:</th>
          <th><span>Rs {{number_format($shipping_charge[0],2)}}</span></th>
        </tr>
        <tr>
          <th scope="col" class="empty"></th>
          <th scope="col" class="text-right">Service Charges:</th>
          <th>
            <span>
             Rs 10
            </span>
        </th>
        </tr>
        <tr>
          <th scope="col" class="empty"></th>
          <th scope="col" class="text-right">Discount:</th>
          <th>
            <span>
             Rs {{number_format($order->coupon,2)}}
            </span>
          </th>
        </tr>
        <tr>
          <th scope="col" class="empty"></th>
          <th scope="col" class="text-right">Grand Total:</th>
          <th>
            <span>
                Rs {{number_format($order->total_amount,2)}}
            </span>
          </th>
        </tr>
      </tfoot>
    </table>
  </section>
  <div class="thanks mt-3">
    <h4>Thank you for your business !!</h4>
  </div>
  <div class="authority float-right mt-5">
    <p>-----------------------------------</p>
    <h5>Authority Signature:</h5>
  </div>
  <div class="clearfix"></div>
@else
  <h5 class="text-danger">Invalid</h5>
@endif
</body>
</html>