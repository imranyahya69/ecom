@extends('frontend.layouts.master')
@section('meta')
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content='RCM'>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="keywords" content="Online gadgets , Earbuds, Headphones, Earphones & Wireless Speakers, Chargers">
	<meta name="description" content="RCM got the best variety of electronic gadgets in Pakistan .We have collection of Earbuds, Headphones, Earphones & Wireless Speakers, Chargers and much more.Top online platform for gadgets in Pakistan.">
	<meta property="og:url" content="https://rcmmultimedia.com/">
	<meta property="og:type" content="website">
	<meta property="og:title" content="RCM , The online gadget's shop in Pakistan">
	<meta property="og:image" content="">
	<meta property="og:description" content="RCM got the best variety of electronic gadgets in Pakistan .We have collection of Earbuds, Headphones, Earphones & Wireless Speakers, Chargers and much more.Top online platform for gadgets in Pakistan.">
@endsection

@section('title','RCM || Order Track Page')

@section('main-content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{route('home')}}">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0);">Order Track</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
<section class="tracking_box_area section_gap py-5">
    <div class="container">
        <div class="tracking_box_inner">
            <p>To track your order please enter your Order ID in the box below and press the "Track" button. This was given
                to you on your receipt and in the confirmation email you should have received.</p>
            <form class="row tracking_form my-4" action="{{route('product.track.order')}}" method="post" novalidate="novalidate">
              @csrf
                <div class="col-md-8 form-group">
                    <input type="text" class="form-control p-2"  name="order_number" placeholder="Enter your order number">
                </div>
                <div class="col-md-8 form-group">
                    <button type="submit" value="submit" class="btn submit_btn">Track Order</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection