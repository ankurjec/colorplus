<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Settings | TailAdmin - Tailwind CSS Admin Dashboard Template</title>
	<link rel="stylesheet" href="{{asset('css/app2.css')}}">
	<link rel="stylesheet" href="{{asset('js/app.js')}}">

	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4"></script>
	<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
</head>

<body x-data="{ page: 'settings', 'loaded': true, 'darkMode': true, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }"
	x-init="
          darkMode = JSON.parse(localStorage.getItem('darkMode'));
          $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
	:class="{'dark text-bodydark bg-boxdark-2': darkMode === true}">
	<!-- ===== Preloader Start ===== -->
	<include src="./partials/preloader.html"></include>
	<!-- ===== Preloader End ===== -->

	<!-- ===== Page Wrapper Start ===== -->
	<div class="flex h-screen overflow-hidden">
		<!-- ===== Sidebar Start ===== -->
		@include('partials/sidebar')
		<!-- ===== Sidebar End ===== -->

		<!-- ===== Content Area Start ===== -->
		<div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
			<!-- ===== Header Start ===== -->
			@include('partials/header')
			<!-- ===== Header End ===== -->

			<!-- ===== Main Content Start ===== -->
			<main>
				<div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
					<div class="mx-auto max-w-270">
						<!-- Breadcrumb Start -->
						<div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
							{{-- <h2 class="text-title-md2 font-bold text-black dark:text-white">
								Settings Page
							</h2> --}}

							<nav>
								<ol class="flex items-center gap-2">
									<li><a class="font-medium" href="/admin/dashboard">Dashboard /</a></li>
									<li class="font-medium text-primary">Settings</li>
								</ol>
							</nav>
						</div>
						<!-- Breadcrumb End -->
						<div
							class="rounded-sm border border-stroke bg-white px-5 pt-6 pb-2.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
							<div class="ml-auto"><a href="<?php echo route('product.create'); ?>"
								class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded pull right">
								Add New Product
							</a></div>

						<br>
						<div class="max-w-full overflow-x-auto">

							<table class="w-full table-auto">
								<thead>

									<tr class="bg-gray-2 text-left dark:bg-meta-4">
										<th
											class="min-w-[220px] py-4 px-4 font-medium text-black dark:text-white xl:pl-11">
											Product Name
										</th>
										<th
											class="min-w-[150px] py-4 px-4 font-medium text-black dark:text-white">
											Product description
										</th>
										{{-- <th
											class="min-w-[150px] py-4 px-4 font-medium text-black dark:text-white">
											Category
										</th> --}}
										<th
											class="min-w-[120px] py-4 px-4 font-medium text-black dark:text-white">
											SKU
										</th>
										<th
											class="min-w-[120px] py-4 px-4 font-medium text-black dark:text-white">
											Price
										</th>
										<th
											class="min-w-[120px] py-4 px-4 font-medium text-black dark:text-white">
											Image
										</th>
										{{-- <th
											class="min-w-[120px] py-4 px-4 font-medium text-black dark:text-white">
											HPIS Code
										</th>

										<th
											class="min-w-[120px] py-4 px-4 font-medium text-black dark:text-white">
											MEDICATION ROUTE
										</th> --}}
										<th class="py-4 px-4 font-medium text-black dark:text-white">
											Actions
										</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($products as $product): ?>
									<tr>
										<td
											class="border-b border-[#eee] py-5 px-4 pl-9 dark:border-strokedark xl:pl-11">
											<?php echo $product['name']; ?>
										</td>
										<td
											class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
											<?php echo $product['description']; ?>
										</td>

										{{-- <td
											class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
											<?php echo $product['productCategory']['name']; ?>

										</td> --}}
										<td
											class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
											<?php echo $product['product_code']; ?>

										</td>
										<td
											class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
											Rs.
											<?php echo $product['price']; ?>

										</td>

										<td
											class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
											{{-- {{$firstItem->productImage->url}} --}}
											@foreach($product->images as $image)
											{{-- {{$image->url}} --}}
											@if ($image->url)

											<?php echo $product['image'] ; ?>
											<img src="{{ url($image->url) }}" alt="Product Image"
												style="height: 120px; width: 120px;">
											@endif
											@endforeach

										</td>

										<td
											class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
											<div class="flex items-center space-x-3.5">
												<a href="<?php echo route('product.edit', $product['id']); ?>"
													class="text-blue-500 hover:text-blue-700">Edit</a>

												<form action="<?php echo route('product.destroy', $product['id']); ?>"
													method="POST">
													<?php echo csrf_field(); ?>
													<?php echo method_field('DELETE'); ?>
													<button type="submit"
														class="text-red-500 hover:text-red-700"
														onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
												</form>

											</div>
										</td>
									</tr>



									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
			</main>
			<!-- ===== Main Content End ===== -->
		</div>
		<!-- ===== Content Area End ===== -->
	</div>
	<!-- ===== Page Wrapper End ===== -->
</body>

</html>