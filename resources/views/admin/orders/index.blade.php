<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Dashboard</title>
	<link rel="stylesheet" href="{{asset('css/app2.css')}}">
	<link rel="stylesheet" href="{{asset('js/app.js')}}">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4"></script>
	<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

	<style>
		.chart-container {
			width: 300px;
			/* Adjust the width as needed */
			margin-right: 10px;
			/* Add some spacing between the charts */
			background-color: #fff;
			border-radius: 0.5rem;
			box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
			padding: 1.5rem;
		}

		.dropdown:hover .dropdown-menu {
			display: block;
		}

		.dropdown-menu {
			/* Add the desired left offset */
			left: -60px;
		}
	</style>

</head>

<body class="bg-gray-100">
	<div class="flex h-screen">


		@include('partials/sidebar')


		<!-- Main Content -->
		<main class="flex-1">

			@include('partials/header')
			<div class="flex-1 p-8">
				<div>
					<div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
						{{-- <h2 class="text-title-md2 font-bold text-black dark:text-white">
							Users
						</h2> --}}

						<nav class="flex justify-end">
							<ol class="flex items-center gap-2">
								<li><a class="font-medium" href="/admin/dashboard">Dashboard /</a></li>
								<li class="font-medium text-primary">Orders</li>
							</ol>


						</nav>



					</div>
					@if (Session::has('success'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<button type="button" class="btn-close" data-bs-dismiss="alert"
							aria-label="Close"></button>
						<ul>
							<li>{{ Session::get('success') }}</li>
						</ul>
					</div>
					@endif

					{{-- <div class="mx-auto max-w-screen-6xl p-4 md:p-6 4xl:p-10"> --}}
						<div
							class="rounded-sm border border-stroke bg-white px-5 pt-6 pb-2.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
							{{-- <div class="ml-auto"><a href="<?php echo route('product_category.create'); ?>"
									class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded pull right">
									Add New Category
								</a></div> --}}
							<br>
							<div class="max-w-full overflow-x-auto">

								<table class="w-full table-auto">
									<thead>

										<tr class="bg-gray-2 text-left dark:bg-meta-4">
											<th
												class="min-w-[220px] py-4 px-4 font-medium text-black dark:text-white xl:pl-11">
												Customer Name
											</th>
											<th
												class="min-w-[150px] py-4 px-4 font-medium text-black dark:text-white">
												Customer Address
											</th>

											<th
												class="min-w-[150px] py-4 px-4 font-medium text-black dark:text-white">
												Order Date
											</th>

											<th
												class="min-w-[150px] py-4 px-4 font-medium text-black dark:text-white">
												Ordered Products
											</th>
											<th
												class="min-w-[120px] py-4 px-4 font-medium text-black dark:text-white">
												Status
											</th>
											<th class="py-4 px-4 font-medium text-black dark:text-white">
												Actions
											</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($orderDetails as $orderDetail): ?>
										<tr>
											<td
												class="border-b border-[#eee] py-5 px-4 pl-9 dark:border-strokedark xl:pl-11">
												<?php echo $orderDetail['name']; ?>
											</td>
											<td
												class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
												<?php echo $orderDetail['address']; ?>
											</td>

											<td
												class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
												<?php echo $orderDetail['created_at']->format('Y-m-d'); ?>
											</td>

											<td
												class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
												@foreach($orderDetail->orderDetailItems as $item)
												{{ $item->product_name }} <br>
												@endforeach
											</td>
											<td
												class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
												<p
													class="inline-flex rounded-full bg-success bg-opacity-10 py-1 px-3 text-sm font-medium text-success">
													@php
													$statusLabel = '';
													switch ($orderDetail->status) {
													case 1:
													$statusLabel = 'Processing';
													break;
													case 2:
													$statusLabel = 'Cancelled';
													break;
													case 3:
													$statusLabel = 'Shipped';
													break;
													case 4:
													$statusLabel = 'Delivered';
													break;
													default:
													$statusLabel = 'Order Received';
													break;
													}
													@endphp
													{{ $statusLabel }}
												</p>

											</td>
											<td
												class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
												<div class="flex items-center space-x-3.5">
													<a href="#"
														class="btn btn-sm btn-success text-blue-500 hover:text-blue-700 font-bold py-2 px-4 rounded-md shadow"
														data-bs-toggle="modal"
														data-bs-target="#orderStatusModal{{ $orderDetail['id'] }}">
														<i class="bi bi-pencil"></i>
													</a>


												</div>
											</td>
										</tr>

										<!-- Modal -->
										<div class="modal fade" id="orderStatusModal{{ $orderDetail['id'] }}"
											tabindex="-1" aria-labelledby="orderStatusModalLabel"
											aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title"
															id="orderStatusModalLabel">Change Order
															Status</h5>
														<button type="button" class="btn-close"
															data-bs-dismiss="modal"
															aria-label="Close"></button>
													</div>
													<div class="modal-body">
														<form method="POST"
															action="<?php echo route('orderedit', $orderDetail['id']); ?>"
															id="orderStatusForm{{ $orderDetail['id'] }}">
															@csrf
															<input type="hidden" name="order_id"
																value="{{ $orderDetail['id'] }}">


															<!-- Add more rows as needed -->
															<div class="mb-3">
																<label for="status"
																	class="form-label">New
																	Status</label>
																<select name="status"
																	class="form-control status-select"
																	onchange="handleStatusChange(this)">
																	<option value="1" @if
																		($orderDetail->status == 1)
																		selected @endif>Processing
																	</option>
																	<option value="2" @if
																		($orderDetail->status == 2)
																		selected @endif>Cancelled
																	</option>
																	<option value="3" @if
																		($orderDetail->status == 3)
																		selected @endif>Shipped
																	</option>
																	<option value="4" @if
																		($orderDetail->status == 4)
																		selected @endif>Delivered
																	</option>
																	<!-- Add more options as per your order status flow -->
																</select>

																<div class="shippingFields" @if
																	($orderDetail->status == 3)
																	style="display: block;" @else
																	style="display: none;" @endif>
																	<label for="courier_name">Courier
																		Name:</label>
																	<input type="text"
																		class="form-control"
																		name="courier_name"
																		value="{{ $orderDetail->courier_name ?? '' }}"><br>

																	<label for="tracking_id">Tracking
																		ID:</label>
																	<input type="text"
																		class="form-control"
																		name="tracking_id"
																		value="{{ $orderDetail->tracking_id ?? '' }}"><br>

																	<label for="tracking_url">Tracking
																		URL:</label>
																	<input type="text"
																		class="form-control"
																		name="tracking_url"
																		value="{{ $orderDetail->tracking_url ?? '' }}"><br>
																</div>
															</div>
															<button type="submit"
																class="btn btn-primary">Update
																Status</button>
														</form>
													</div>
												</div>
											</div>
										</div>
										<?php endforeach; ?>
									</tbody>

								</table>
							</div>
						</div>
					</div>



					<footer class="bg-gray-200 text-center py-4 mt-8">
						<p>&copy; 2023 Admin Dashboard. All rights reserved.</p>
					</footer>
		</main>
	</div>
	</div>



	<script>

	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	<script>
		function handleStatusChange(selectElement) {
		  var shippingFieldsDiv = selectElement.parentNode.querySelector('.shippingFields');
		
		  if (selectElement.value === "3") { // Check if "Shipped" option is selected (value 3)
		    shippingFieldsDiv.style.display = "block"; // Show the shipping fields
		  } else {
		    shippingFieldsDiv.style.display = "none"; // Hide the shipping fields for other options
		  }
		}
	</script>
</body>

</html>