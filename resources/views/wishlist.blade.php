@extends('layouts.site-header')
@section('page-title', 'My Wishlist')
@section('css')
@parent

<style>
	@media (max-width: 767px) {
		#content-container {
			padding: 10px;
			/* Adjust as needed */
		}
	}

	.modal-dialog {

		width: 360px;

	}

	.tab-content .tab-pane {
		border: 1px solid rgb(187, 183, 183);
		/* Adjust the border thickness and color as needed */
		border-radius: 10px;
		/* Adjust the border radius to create curved corners */
		padding: 1px;
		/* Add some padding to the content for better spacing */
		background-color: #f7f7f7;
		/* Optional: Add a background color for the tab content */
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
	.delete-modal {
        top: 60%; /* Adjust this value to set the desired distance from the top */
    }
</style>
@endsection



@section('content')
<br>

<div class="container" id="content-container">
	<!-- Tabs navs -->
	<ul class="nav nav-tabs" role="tablist">
		<li class="nav-item">
			<a class="nav-link" href="{{route('myorders')}}">Account</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="{{route('accountdata')}}">Orders</a>

		</li>
		<li class="nav-item">
			<a class="nav-link active" href="{{route('wishlist')}}">Wishlist</a>
		</li>
	</ul><!-- Tab panes -->
	<div class="tab-content">
		<div class="tab-pane active" id="tabs-1" role="tabpanel">
			<div class="list-group" id="user_table">
				<div id="table_data">

					@if(count($wishlistItems) > 0)
					@foreach($wishlistItems as $wishlistItem)

					<div class="row">
						<div class="col-md-5">
							<img src="{{ url($wishlistItem->productImage->url) }}" alt="Product Image"
								style="height: 120px; width: 120px;">
						</div>
						<div class="col-md-7 wishlist-item text-center">
							<div class="row">
								<div class="col-md-6 d-flex align-items-center">
									<div class="d-flex flex-column align-items-center">
										<h5 class="mb-0 product-name">{{ $wishlistItem->product->name }}</h5>
										<p class="mb-0 product-price">Rs. {{ $wishlistItem->product->price }}
										</p>
									</div>
								</div>
								<div class="col-md-6 d-flex align-items-center justify-content-center">
									<button class="btn btn-danger delete-btn" data-toggle="modal"
										data-target="#deleteModal">
										<i class="fa fa-trash" aria-hidden="true"
											style="font-size: 24px;"></i>
									</button>
								</div>
							</div>
						</div>




						@endforeach


						{{-- <ul>
							@foreach($wishlistItems as $wishlistItem)
							<li>
								{{ $wishlistItem->product_id }}
								<!-- Adjust this based on your actual structure -->
								{{ $wishlistItem->product->name }}
								<!-- Adjust this based on your actual structure -->
								<img src="{{ url($wishlistItem->productImage->url) }}" alt="Product Image"
									style="height: 120px; width: 120px;">

							</li>
							@endforeach
						</ul> --}}
						@else
						<p>Your wishlist is empty.</p>
						@endif
						{{-- {!! $orderDetails->links() !!} --}}
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
		   <div class="modal-header">
			  <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				 <span aria-hidden="true">&times;</span>
			  </button>
		   </div>
		   <div class="modal-body">
			  <p>Are you sure you want to remove this item from your wishlist?</p>
		   </div>
		   <div class="modal-footer">
			  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
			  <button type="button" class="btn btn-danger">Delete</button>
		   </div>
	    </div>
	</div>
 </div>
 
	@endsection
	@section('scripts')
	@livewireScripts
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/aos.js"></script>
	<script src="js/main.js"></script>
	<script>
		const accountDataRoute = '{{ route('accountdata') }}';
	</script>
	<script>
		// Function to handle the tab click event
    function handleAccountTabClick() {
        // Get the tab content element
        const accountTabContent = document.getElementById('tabs-2');
    
        // Check if the account data has already been loaded
        if (!accountTabContent.classList.contains('data-loaded')) {
            console.log('Fetching account data...');
            // Fetch the CSRF token
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            console.log('CSRF Token:', csrfToken);

            // Fetch the account data using Ajax
            fetch(accountDataRoute, {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                console.log('Account data fetched:', data);
                // Update the tab content with the fetched account data
                // document.getElementById('account-name').textContent = 'Name: ' + data.name;
                // document.getElementById('account-email').textContent = 'Email: ' + data.email;
                document.getElementById('account-name').value = data.name;
                    document.getElementById('account-email').value = data.email;
                // document.getElementById('account-address').textContent = 'Address: ' + data.address;
    
                // Add a class to mark the tab content as loaded
                accountTabContent.classList.add('data-loaded');
            })
            .catch(error => console.error('Error fetching account data:', error));
        }
    }
	</script>
	@endsection