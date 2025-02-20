{{-- <a href="{{ route('cart') }}" class="icons-btn d-inline-block bag" title="Cart">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="10" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
    </svg><br> --}}
{{-- <span class="badge badge-primary" style="font-size: 0.8rem;">{{ $cartCount }}</span> --}}

{{-- </a> --}}
{{-- <a href="{{ route('cart') }}" class="fa" style="font-size:24px;padding-bottom: -3px;">&#xf07a;</a>
    <span class='badge badge-warning' id='lblCartCount'>{{ $cartCount }} </span> --}}
{{-- <a href="{{ route('cart') }}" class="fa" style="font-size:24px;padding-bottom: -3px;">&#xf07a;</a>
<span class='badge badge-warning' id='lblCartCount'>{{ $cartCount }} </span> --}}

{{-- New Card Added --}}



<div class="cart">
    <a href="{{ route('cart') }}">
        <i class="las la-shopping-cart"></i>
    </a>
    <span id='lblCartCount'>{{ $cartCount }}</span>
    <a href="{{ route('cart') }}"><div style="color: black">Cart</div></a>
</div>

{{-- <a href="{{ route('cart') }}" class="icons-btn d-inline-block bag" title="Cart">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
      </svg><br>
    
</a>
<span class="badge badge-primary">{{ $cartCount }}</span> --}}
