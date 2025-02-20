<div>

  @foreach($orderDetails as $orderDetail)
  @php
  $firstItem = $orderDetail->orderDetailItems()->first();
  @endphp
  <a href="{{ route('orderbilling', ['orderDetailId' => $firstItem->orderdetail_id]) }}"
    class="list-group-item list-group-item-action">
    <div class="row">
      <div class="col-md-2">
        @if ($firstItem->productImage)
        <img src="{{ url($firstItem->productImage->url) }}" alt="Product Image" style="height: 120px; width: 120px;">
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
  </a>
  @endforeach

  {{-- {!! $orderDetails->links() !!} --}}
</div>








{{--
<div>
  <table class="table-auto" style="width: 100%;">
    <thead>
      <tr>
        <th class="px-4 py-2">Order Date:</th>
        <th class="px-4 py-2">Order Id:</th>
        <th class="px-4 py-2">Qty:</th>
        <th class="px-4 py-2">Price:</th>

      </tr>
    </thead>
    <tbody>
      @foreach ($orderDetails as $orderDetail)
      @php
      $firstItem = $orderDetail->orderDetailItems()->first();
      @endphp
      <tr>
        <td class="border px-4 py-2">{{ $firstItem->created_at->format('Y-m-d')
          }}</td>
        <td class="border px-4 py-2">{{ $firstItem->orderdetail_id }}</td>
        <td class="border px-4 py-2">{{ $orderDetail->orderDetailItems->sum('product_quantity') }}</td>
        <td class="border px-4 py-2"> {{
          $orderDetail->orderDetailItems->sum('product_quantity') * $firstItem->product_price
          }}</td>

      </tr>
      @endforeach
    </tbody>
  </table>

  {{ $orderDetails->links() }}
</div> --}}