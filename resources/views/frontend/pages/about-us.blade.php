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
@section('title','RCM || About Us')

@section('main-content')

	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="blog-single.html">About Us</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->

	<!-- About Us -->
	<section class="about-us section">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-12">
						<div class="about-content">
							@php
								$settings=DB::table('settings')->get(['description','photo']);
							@endphp
							<h3>Welcome To <span>Rcm Multimedia </span></h3>
							<p>{!! $settings[0]->description !!}</p>
							<div class="button">
								<a href="{{route('blog')}}" class="btn">Our Blog</a>
								<a href="{{route('contact')}}" class="btn primary">Contact Us</a>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-12">
						<div class="about-img overlay">
							{{-- <div class="button">
								<a href="https://www.youtube.com/watch?v=nh2aYrGMrIE" class="video video-popup mfp-iframe"><i class="fa fa-play"></i></a>
							</div> --}}
							<img src="{{$settings[0]->photo}}" alt="About-RCM">
						</div>
					</div>
				</div>
			</div>
	</section>
	<!-- End About Us -->


	<!-- Start Shop Services Area -->
	<section class="shop-services section">
		<div class="container">
			<div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-rocket"></i>
                        <h4>Best Prices</h4>
                        <p>We got best products in best price</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-reload"></i>
                        <h4>Fast Delivery</h4>
                        <p>Delivery all over Pakistan</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-lock"></i>
                        <h4>Great Deals</h4>
                        <p>Enjoy new deals time to time</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-tag"></i>
                        <h4>Original Product</h4>
                        <p>100% Original</p>
                    </div>
                    <!-- End Single Service -->
                </div>
            </div>
		</div>
	</section>
	<!-- End Shop Services Area -->

	<!--@include('frontend.layouts.newsletter')-->
@endsection
