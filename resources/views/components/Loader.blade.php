<div class="fixed top-0 left-0 w-screen h-screen flex items-center justify-center bg-white z-50">
	<div class="loader"></div>
   </div>
   
   @push('styles')
   <style>
	.loader {
	  border: 4px solid #f3f3f3; /* Light gray border */
	  border-top: 4px solid #3498db; /* Blue border */
	  border-radius: 50%;
	  width: 40px;
	  height: 40px;
	  animation: spin 2s linear infinite;
	}
   
	@keyframes spin {
	  0% {
	    transform: rotate(0deg);
	  }
	  100% {
	    transform: rotate(360deg);
	  }
	}
   </style>
   @endpush
   