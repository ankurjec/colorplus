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
            Add User
          </h2> --}}

          <nav>
            <ol class="flex items-center gap-2">
              <li><a class="font-medium" href="/admin/dashboard">Dashboard /</a></li>
              <li class="font-medium text-primary">Edit Category</li>
            </ol>
          </nav>
        </div>
        {{-- <div class="mx-auto max-w-screen-6xl p-4 md:p-6 4xl:p-10"> --}}
          <div class="rounded-sm border border-stroke bg-white px-5 pt-6 pb-2.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
			<form action="{{ route('product_category.update', $category->id) }}" method="POST">
				@csrf
				@method('PUT')
			    <div class="max-w-full overflow-x-auto">
				   <div class="mb-6">
					  <label class="mb-2.5 block font-medium text-black dark:text-white">Update Category Name</label>
					  <div class="relative">
						 <input type="text" name="name" placeholder="Enter Category name"
							class="w-full rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" value="{{ $category->name }}" />
		 
						 <span class="absolute right-4 top-4">
							{{-- <svg class="fill-current" width="22" height="22" viewBox="0 0 22 22" fill="none"
							    xmlns="http://www.w3.org/2000/svg">
							    <g opacity="0.5">
								   <path
									  d="M16.1547 6.80626V5.91251C16.1547 3.16251 14.0922 0.825009 11.4797 0.618759C10.0359 0.481259 8.59219 0.996884 7.52656 1.95938C6.46094 2.92188 5.84219 4.29688 5.84219 5.70626V6.80626C3.84844 7.18438 2.33594 8.93751 2.33594 11.0688V17.2906C2.33594 19.5594 4.19219 21.3813 6.42656 21.3813H15.5016C17.7703 21.3813 19.6266 19.525 19.6266 17.2563V11C19.6609 8.93751 18.1484 7.21876 16.1547 6.80626ZM8.55781 3.09376C9.31406 2.40626 10.3109 2.06251 11.3422 2.16563C13.1641 2.33751 14.6078 3.98751 14.6078 5.91251V6.70313H7.38906V5.67188C7.38906 4.70938 7.80156 3.78126 8.55781 3.09376ZM18.1141 17.2906C18.1141 18.7 16.9453 19.8688 15.5359 19.8688H6.46094C5.05156 19.8688 3.91719 18.7344 3.91719 17.325V11.0688C3.91719 9.52189 5.15469 8.28438 6.70156 8.28438H15.2953C16.8422 8.28438 18.1141 9.52188 18.1141 11V17.2906Z"
									  fill="" />
								   <path
									  d="M10.9977 11.8594C10.5852 11.8594 10.207 12.2031 10.207 12.65V16.2594C10.207 16.6719 10.5508 17.05 10.9977 17.05C11.4102 17.05 11.7883 16.7063 11.7883 16.2594V12.6156C11.7883 12.2031 11.4102 11.8594 10.9977 11.8594Z"
									  fill="" />
							    </g>
							</svg> --}}
						 </span>
					  </div>
				   </div>
		 
				   <div class="mb-6">
					  <label class="mb-2.5 block font-medium text-black dark:text-white">Update Description</label>
					  <div class="relative">
						 <input type="text" name="description" placeholder="Enter Description"
							class="w-full rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" value="{{$category->description}}" />
		 
						 <span class="absolute right-4 top-4">
							{{-- <svg class="fill-current" width="22" height="22" viewBox="0 0 22 22" fill="none"
							    xmlns="http://www.w3.org/2000/svg">
							    <g opacity="0.5">
								   <path
									  d="M19.2516 3.30005H2.75156C1.58281 3.30005 0.585938 4.26255 0.585938 5.46567V16.6032C0.585938 17.7719 1.54844 18.7688 2.75156 18.7688H19.2516C20.4203 18.7688 21.4172 17.8063 21.4172 16.6032V5.4313C21.4172 4.26255 20.4203 3.30005 19.2516 3.30005ZM19.2516 4.84692C19.2859 4.84692 19.3203 4.84692 19.3547 4.84692L11.0016 10.2094L2.64844 4.84692C2.68281 4.84692 2.71719 4.84692 2.75156 4.84692H19.2516ZM19.2516 17.1532H2.75156C2.40781 17.1532 2.13281 16.8782 2.13281 16.5344V6.35942L10.1766 11.5157C10.4172 11.6875 10.6922 11.7563 10.9672 11.7563C11.2422 11.7563 11.5172 11.6875 11.7578 11.5157L19.8016 6.35942V16.5688C19.8703 16.9125 19.5953 17.1532 19.2516 17.1532Z"
									  fill="" />
							    </g>
							</svg> --}}
						 </span>
					  </div>
				   </div>
		 
				   <div class="mb-5">
					  <button type="submit"
						 class="w-full cursor-pointer rounded-lg border border-blue-500 bg-blue-500 p-4 font-medium text-white transition hover:bg-blue-600">
						 Update
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


  <script>
  </script>
</body>

</html>