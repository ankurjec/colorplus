{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Product Category name
                </th>
                <th scope="col" class="px-6 py-3">
                    Product Description
                </th>
                <th scope="col" class="px-4 py-4">
                   Actions
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category): ?>
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <td class="px-6 py-4">
                    <?php echo $category['name']; ?>
                </td>             
                <td class="px-6 py-4">
                    <?php echo $category['description']; ?>
                </td>
                <td class="px-6 py-4 no-wrap">
                    <a href="<?php echo route('product_category.edit', $category['id']); ?>" class="text-blue-500 hover:text-blue-700">Edit</a>
                
                    <form action="<?php echo route('product_category.destroy', $category['id']); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
            <tr class="bg-white dark:bg-gray-900">
                <td colspan="2" class="px-6 py-4">
                    <a href="<?php echo route('product_category.create'); ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Add New Category
                    </a>
                </td>
            </tr>
        </tbody>
    </table>

   
    
</div>

                </div>
            </div>

           
        </div>
    </div>
</x-app-layout> --}}
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
            Users
          </h2> --}}

          <nav class="flex justify-end">
            <ol class="flex items-center gap-2">
                <li><a class="font-medium" href="/admin/dashboard">Dashboard /</a></li>
                <li class="font-medium text-primary">Categories</li>
            </ol>
        
            
        </nav>
        
        
        
        </div>
      {{-- <div class="mx-auto max-w-screen-6xl p-4 md:p-6 4xl:p-10"> --}}
		<div
		class="rounded-sm border border-stroke bg-white px-5 pt-6 pb-2.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
		<div class="ml-auto"><a href="<?php echo route('product_category.create'); ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded pull right">
            Add New Category
        </a></div>
        <br>
        <div class="max-w-full overflow-x-auto">
            
		  <table class="w-full table-auto">
		    <thead>
               
			 <tr class="bg-gray-2 text-left dark:bg-meta-4">
			   <th class="min-w-[220px] py-4 px-4 font-medium text-black dark:text-white xl:pl-11">
				Category Name
			   </th>
			   <th class="min-w-[150px] py-4 px-4 font-medium text-black dark:text-white">
				Category description
			   </th>
			   <th class="min-w-[120px] py-4 px-4 font-medium text-black dark:text-white">
				Status
			   </th>
			   <th class="py-4 px-4 font-medium text-black dark:text-white">
				Actions
			   </th>
			 </tr>
		    </thead>
		    <tbody>
                <?php foreach ($categories as $category): ?>
			 <tr>
			   <td class="border-b border-[#eee] py-5 px-4 pl-9 dark:border-strokedark xl:pl-11">
                <?php echo $category['name']; ?>
			   </td>
			   <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                <?php echo $category['description']; ?>
			   </td>
			   <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
				<p class="inline-flex rounded-full bg-success bg-opacity-10 py-1 px-3 text-sm font-medium text-success">
				  Active
				</p>
			   </td>
			   <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
				<div class="flex items-center space-x-3.5">
                    <a href="<?php echo route('product_category.edit', $category['id']); ?>" class="text-blue-500 hover:text-blue-700">Edit</a>

				  <form action="<?php echo route('product_category.destroy', $category['id']); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                </form>
				  {{-- <button class="hover:text-primary">
				    <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18" fill="none"
					 xmlns="http://www.w3.org/2000/svg">
					 <path
					   d="M16.8754 11.6719C16.5379 11.6719 16.2285 11.9531 16.2285 12.3187V14.8219C16.2285 15.075 16.0316 15.2719 15.7785 15.2719H2.22227C1.96914 15.2719 1.77227 15.075 1.77227 14.8219V12.3187C1.77227 11.9812 1.49102 11.6719 1.12539 11.6719C0.759766 11.6719 0.478516 11.9531 0.478516 12.3187V14.8219C0.478516 15.7781 1.23789 16.5375 2.19414 16.5375H15.7785C16.7348 16.5375 17.4941 15.7781 17.4941 14.8219V12.3187C17.5223 11.9531 17.2129 11.6719 16.8754 11.6719Z"
					   fill="" />
					 <path
					   d="M8.55074 12.3469C8.66324 12.4594 8.83199 12.5156 9.00074 12.5156C9.16949 12.5156 9.31012 12.4594 9.45074 12.3469L13.4726 8.43752C13.7257 8.1844 13.7257 7.79065 13.5007 7.53752C13.2476 7.2844 12.8539 7.2844 12.6007 7.5094L9.64762 10.4063V2.1094C9.64762 1.7719 9.36637 1.46252 9.00074 1.46252C8.66324 1.46252 8.35387 1.74377 8.35387 2.1094V10.4063L5.40074 7.53752C5.14762 7.2844 4.75387 7.31252 4.50074 7.53752C4.24762 7.79065 4.27574 8.1844 4.50074 8.43752L8.55074 12.3469Z"
					   fill="" />
				    </svg>
				  </button> --}}
				</div>
			   </td>
			 </tr>
			 
				
			 
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
</body>

</html>