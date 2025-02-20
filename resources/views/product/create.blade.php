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

	<style>
		.chart-container {
			width: 300px;
			margin-right: 10px;
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
						<nav>
							<ol class="flex items-center gap-2">
								<li><a class="font-medium" href="/admin/dashboard">Dashboard /</a></li>
								<li class="font-medium text-primary">Add Product</li>
							</ol>
						</nav>
					</div>
					<div
						class="rounded-sm border border-stroke bg-white px-5 pt-6 pb-2.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
						<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="max-w-full overflow-x-auto">
								<div class="mb-6">
									<label class="mb-2.5 block font-medium text-black dark:text-white">Product
										Name</label>
									<div class="relative">
										<input type="text" name="name" placeholder="Enter Product name"
											class="w-full rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />

										<span class="absolute right-4 top-4">

										</span>
									</div>
								</div>
								<div class="mb-6">
									<label
										class="mb-2.5 block font-medium text-black dark:text-white">Details</label>
									<div class="relative">

										<textarea name="details" rowspan="3" id="editor2"></textarea>

										<span class="absolute right-4 top-4">

										</span>
									</div>
								</div>
								<div class="mb-6">
									<label
										class="mb-2.5 block font-medium text-black dark:text-white">Description</label>
									<div class="relative">

										<textarea name="description" rowspan="3" id="editor"></textarea>

										<span class="absolute right-4 top-4">

										</span>
									</div>
								</div>
								<div class="mb-6">
									<label
										class="mb-2.5 block font-medium text-black dark:text-white">Category</label>
									<div class="relative">
										<select name="category_id"
											class="w-full rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
											<option value="">Select Category</option>

											@foreach ($categories as $category)

											<option value="{{ $category->id }}">{{ $category->name }}
											</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="mb-6">
									<label
										class="mb-2.5 block font-medium text-black dark:text-white">SKU</label>
									<div class="relative">
										<input type="text" name="product_code" placeholder="Enter SKU"
											class="w-full rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />

										<span class="absolute right-4 top-4">

										</span>
									</div>
								</div>
								<div class="mb-6">
									<label
										class="mb-2.5 block font-medium text-black dark:text-white">Price</label>
									<div class="relative flex">
										<span
											class="absolute left-4 top-4 text-black dark:text-white">Rs.</span>
										<input type="number" id="price" name="price" placeholder="Enter Price"
											class="w-full rounded-lg border border-stroke bg-transparent py-4 pl-14 pr-10 outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
									</div>
								</div>
								<div class="mb-6">
									<label class="mb-2.5 block font-medium text-black dark:text-white">Price
										after Discount</label>
									<div class="relative flex">
										<span
											class="absolute left-4 top-4 text-black dark:text-white">Rs.</span>
										<input type="number" name="discount_amount" id="discount_amount"
											placeholder="Enter Discounted Price"
											class="w-full rounded-lg border border-stroke bg-transparent py-4 pl-14 pr-10 outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
									</div>
								</div>

								<div class="mb-6">
									<label class="mb-2.5 block font-medium text-black dark:text-white">Discount
										Percentage</label>
									<div class="relative flex">
										<input type="number" name="discount_percentage"
											id="discount_percentage" placeholder="Discount Percentage"
											class="w-full rounded-lg border border-stroke bg-transparent py-4 pl-14 pr-10 outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
											readonly />
										<span
											class="absolute left-4 top-4 text-black dark:text-white">%</span>
									</div>
								</div>
								<div class="mb-6">
									<label class="mb-2.5 block font-medium text-black dark:text-white">Product
										Type</label>
									<div class="flex">
										<div class="relative flex mr-4">
											<input type="checkbox" name="isPopularProduct"
												class="form-checkbox h-4 w-4 text-primary border-primary rounded focus:ring-primary"
												value="1">
											<span class="ml-2">Popular Product</span>
										</div>
										<div class="relative flex">
											<input type="checkbox" name="isNewProduct"
												class="form-checkbox h-4 w-4 text-primary border-primary rounded focus:ring-primary"
												value="1">
											<span class="ml-2">New Product</span>
										</div>
									</div>
								</div>

								<div class="mb-6">
									<label class="mb-2.5 block font-medium text-black dark:text-white">Product
										Image</label>
									<div class="relative flex">
										<input type="file" name="images[]"
											class="w-full rounded-lg border border-stroke bg-transparent py-4 pl-14 pr-10 outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
											multiple />
									</div>
								</div>
								<div class="mb-5">
									<button type="submit"
										class="w-full cursor-pointer rounded-lg border border-blue-500 bg-blue-500 p-4 font-medium text-white transition hover:bg-blue-600">
										Add
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<footer class="bg-gray-200 text-center py-4 mt-8">
					<p>&copy; 2023 Admin Dashboard. All rights reserved.</p>
				</footer>
		</main>
	</div>
	</div>
	<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
	<script>
		ClassicEditor
	    .create(document.querySelector('#editor'))
	    .catch(error => {
		   console.error(error);
	    });
	</script>
	<script>
		ClassicEditor
    .create(document.querySelector('#editor2'))
    .catch(error => {
	   console.error(error);
    });
	</script>

	<script>
		document.addEventListener('DOMContentLoaded', function () {
	    const priceInput = document.getElementById('price');
	    const discountAmountInput = document.getElementById('discount_amount');
	    const discountPercentageInput = document.getElementById('discount_percentage');
 
	    function calculateDiscountPercentage() {
		   const price = parseFloat(priceInput.value);
		   const discountAmount = parseFloat(discountAmountInput.value);
 
		   if (price > 0 && discountAmount > 0 && price > discountAmount) {
			  const discountPercentage = ((price - discountAmount) / price) * 100;
			  discountPercentageInput.value = discountPercentage.toFixed(2);
		   } else {
			  discountPercentageInput.value = '';
		   }
	    }
 
	    priceInput.addEventListener('input', calculateDiscountPercentage);
	    discountAmountInput.addEventListener('input', calculateDiscountPercentage);
	});
	</script>
</body>

</html>