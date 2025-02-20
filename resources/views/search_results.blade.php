@extends('layouts.site-header')

@section('css')
@parent
<style>
	.modal-dialog {

		width: 360px;

	}

	.modal-header {

		background-color: #FFF;

		padding: 1px 16px;

		color: #FFF;

		border-bottom: 1px;

	}

	/* Default styles for the site logo */
	.site-logo {
		display: flex;
		align-items: center;
	}

	.site-logo img {
		margin-right: 10px;
	}

	/* Media query for smaller screens */
	@media (max-width: 768px) {
		.site-logo {
			flex-wrap: nowrap;
			justify-content: center;
			text-align: center;
		}

		.site-logo img {
			margin-right: 2px;
			height: 50px;
			width: 50px;
		}

		#zenith_title {
			font-size: 15px !important;
			margin-left: 5px;
		}


		.site-title {
			font-size: 79px;
			margin-left: 25px;
		}
	}

	.pb-3,
	.py-3 {
		padding-bottom: 0rem !important;
	}
</style>
@endsection
@section('page-title', 'Search')

@section('content')


<div class="site-wrap">


	{{-- <div class="site-navbar py-2">

		<div class="search-wrap">
			<div class="container">
				<a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
				<form action="#" method="post">
					<input type="text" class="form-control" placeholder="Search keyword and hit enter...">
				</form>
			</div>
		</div>

		<div class="container">
			<div class="d-flex align-items-center justify-content-between">
				<a href="/">

					<div class="site-logo">
						<img src="images/z_logo.png" alt="Company Name Logo" href="/" height="75">
						<span id="zenith_title" style="color:rgb(79, 161, 110);font-size:22px;">Zenith Ago
							Services</span>
					</div>
				</a>
				<div class="main-nav d-none d-lg-block">
					<nav class="site-navigation text-right text-md-center" role="navigation">
						<ul class="site-menu js-clone-nav d-none d-lg-block">
							<li><a href="/">Home</a></li>
							<li class="active"><a href="shop">Store</a></li>
							<li class="has-children">
								<a href="#">Products</a>
								<ul class="dropdown">
									<li><a href="#">Fertilizers</a></li>
									<li><a href="#">Medicines</a></li>
									<li><a href="#">Tools</a></li>
									<li><a href="#">Seeds</a></li>
								</ul>
							</li>
							<li><a href="about">About</a></li>
							<li><a href="contact">Contact</a></li>
							<li><a href="review">Reviews</a></li>

						</ul>
					</nav>
				</div>
				<div class="icons">
					<a href="#" class="icons-btn d-inline-block" data-toggle="modal" data-target="#myModal"><span
							class="icon-user"></span></a>

					<a href="#" class="icons-btn d-inline-block js-search-open"><span
							class="icon-search"></span></a>
					<a href="cart" class="icons-btn d-inline-block bag">
						<span class="icon-shopping-bag"></span>
						<span class="number">2</span>
					</a>
					<a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span
							class="icon-menu"></span></a>
				</div>
			</div>
		</div>
	</div> --}}

	<!-- Login/Register Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<!-- <h5 class="modal-title" id="loginModalLabel">Login or Register</h5> -->
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<ul class="nav nav-tabs" id="loginTab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab"
								aria-controls="login" aria-selected="true">Login</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab"
								aria-controls="register" aria-selected="false">Register</a>
						</li>
					</ul>
					<div class="tab-content" id="loginTabContent">
						<div class="tab-pane fade show active" id="login" role="tabpanel"
							aria-labelledby="login-tab">
							<form>
								<br>
								<div class="form-group">
									<input type="email" class="form-control" id="loginEmail"
										aria-describedby="emailHelp" placeholder="Enter email">
								</div>
								<div class="form-group">
									<input type="password" class="form-control" id="loginPassword"
										placeholder="Password">
								</div>
								<button type="submit" class="btn btn-primary btn-block">Login</button>
							</form>
						</div>
						<div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
							<form>
								<br>
								<div class="form-group">
									<input type="email" class="form-control" id="registerEmail"
										aria-describedby="emailHelp" placeholder="Enter email">
								</div>
								<div class="form-group">
									<input type="password" class="form-control" id="registerPassword"
										placeholder="Password">
								</div>
								<div class="form-group">
									<input type="password" class="form-control" id="confirmPassword"
										placeholder="Confirm Password">
								</div>
								<button type="submit" class="btn btn-primary btn-block">Register</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="bg-light py-3">
		<div class="container">
			<div class="row">
				{{-- <div class="col-md-12 mb-0"><a href="/">Home</a> <span class="mx-2 mb-0">/</span> <strong
						class="text-black">Store</strong>
					<div class="input-group" style="width: 65%;float:right;">
						<input type="search" placeholder="Search for products or brands.."
							aria-describedby="button-addon5" class="form-control" style="width: 50%;">
						<div class="input-group-append">
							<button id="button-addon5" type="submit" class="btn btn-primary"> <span
									class="icon-search"> </span>
							</button>
						</div>
					</div>

				</div> --}}
			</div>
		</div>
	</div>

	<div class="site-section">
		<div class="container">




			<h2>Search Results</h2>
			@if ($products->count() > 0)

			<div class="row">
				<?php foreach ($products as $product): ?>

				<div class="col-sm-6 col-lg-4 text-center item mb-4">
					{{-- <span class="tag">Sale</span> --}}
					{{-- <a href="{{ route('orderbilling', ['orderDetailId' => $firstItem->orderdetail_id]) }}"
						class="list-group-item list-group-item-action"> --}}

						<a href="{{ route('shop-single', ['productID' => $product->id])}}">
							@foreach($product->images as $image)
							{{-- {{$image->url}} --}}
							@if ($image->url)

							<?php echo $product['image'] ; ?>
							<img src="{{ url($image->url) }}" alt="Product Image"
								style="height: 320px; width: 280px;">
							@endif
							@endforeach
						</a>

						{{-- <img src="images/nano-vigore (3).jpg" alt="Image"></a> --}}
					<h3 class="text-dark"><a href="shop-single">{{ $product->name}}</a></h3>
					<p class="price"><del>1299.00</del> &mdash; Rs.{{ $product->price}}</p>
				</div>


				<?php endforeach; ?>
			</div>
			@else
			<p>No products found.</p>
			@endif
			<div class="row mt-5">
				<div class="col-md-12 text-center">
					<div class="site-block-27">
						<ul>
							<li><a href="#">&lt;</a></li>
							<li class="active"><span>1</span></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li><a href="#">&gt;</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="site-section bg-secondary bg-image" style="background-image: url('images/wheat_2.jpg');">
		<div class="container">
			<div class="row align-items-stretch">
				<div class="col-lg-6 mb-5 mb-lg-0">
					<a href="#" class="banner-1 h-100 d-flex"
						style="background-image: url('images/agri-prod.jpg');">
						<div class="banner-1-inner align-self-center">
							<h2 style="color: #FFF;">Agro Products</h2>
							<p style="color: #FFF;">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
								Molestiae ex ad minus
								rem odio voluptatem.
							</p>
						</div>
					</a>
				</div>
				<div class="col-lg-6 mb-5 mb-lg-0">
					<a href="#" class="banner-1 h-100 d-flex"
						style="background-image: url('images/agronomist_1.jpg');">
						<div class="banner-1-inner ml-auto  align-self-center">
							<h2 style="color: #FFF;">Rated by Experts</h2>
							<p style="color: #FFF;">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
								Molestiae ex ad minus
								rem odio voluptatem.
							</p>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>


	<footer class="site-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-3 mb-4 mb-lg-0">

					<div class="block-7">
						<h3 class="footer-heading mb-4">About Us</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius quae reiciendis
							distinctio voluptates
							sed dolorum excepturi iure eaque, aut unde.</p>
					</div>

				</div>
				<div class="col-lg-3 mx-auto mb-5 mb-lg-0">
					<h3 class="footer-heading mb-4">Quick Links</h3>
					<ul class="list-unstyled">
						<li><a href="#">Supplements</a></li>
						<li><a href="#">Vitamins</a></li>
						<li><a href="#">Diet &amp; Nutrition</a></li>
						<li><a href="#">Tea &amp; Coffee</a></li>
					</ul>
				</div>

				<div class="col-md-6 col-lg-3">
					<div class="block-5 mb-5">
						<h3 class="footer-heading mb-4">Contact Info</h3>
						<ul class="list-unstyled">
							<li class="address">203 Fake St. Mountain View, San Francisco, California, USA</li>
							<li class="phone"><a href="tel://23923929210">+2 392 3929 210</a></li>
							<li class="email">emailaddress@domain.com</li>
						</ul>
					</div>


				</div>
			</div>
			<div class="row pt-5 mt-5 text-center">
				<div class="col-md-12">
					<p>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;
						<script>
							document.write(new Date().getFullYear());
						</script> All rights reserved | This template is made
						with <i class="icon-heart" aria-hidden="true"></i> by us
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</p>
				</div>

			</div>
		</div>
	</footer>
</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>

<script src="js/main.js"></script>

<script>
	$(document).ready(function(){
        function alignModal(){
            var modalDialog = $(this).find(".modal-dialog");
            
            // Applying the top margin on modal to align it vertically center
            modalDialog.css("margin-top", Math.max(0, ($(window).height() - modalDialog.height()) / 2));
        }
        // Align modal when it is displayed
        $(".modal").on("shown.bs.modal", alignModal);
        
        // Align modal when user resize the window
        $(window).on("resize", function(){
            $(".modal:visible").each(alignModal);
        });   
    });
</script>

@endsection