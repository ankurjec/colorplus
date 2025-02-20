@foreach($orderDetails as $orderDetail)
@php
$firstItem = $orderDetail->orderDetailItems()->first();
@endphp
<a href="{{ route('orderbilling', ['orderDetailId' => $firstItem->orderdetail_id]) }}"
    class="list-group-item list-group-item-action">
    <div class="row">
	   <div class="col-md-2">
		  @if ($firstItem->productImage)
		  {{-- {{$firstItem->productImage->url}} --}}
		  <img src="{{ url($firstItem->productImage->url) }}" alt="Product Image"
			 style="height: 120px; width: 120px;">
		  @endif
	   </div>
	   <div class="col-md-7">
		  <div class="d-flex w-100 justify-content-between">
			 <h5 class="mb-1">{{ $firstItem->product_name }}</h5>
			 <small class="text-muted">Order Date: {{ $firstItem->created_at->format('Y-m-d')
				}}</small>
			 <small class="text-muted">Order Id: {{ $firstItem->orderdetail_id }}</small>
		  </div>
		  <p class="mb-1">Qty: {{ $orderDetail->orderDetailItems->sum('product_quantity') }}</p>
		  <small class="text-muted">Price: {{ $firstItem->product_price }} Total: {{
			 $orderDetail->orderDetailItems->sum('product_quantity') * $firstItem->product_price
			 }}</small>
	   </div>

	   <div class="col-md-3">
	   </div>
    </div>
    {!! $orderDetails->links() !!}
</a>
@endforeach
