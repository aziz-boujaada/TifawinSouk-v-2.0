<!DOCTYPE html>
<html>
@include('components.head')

<body>
    @include('components.header')

    <div class="cart-infos">
        <p class="cart-info">Total items ({{ $cart->totalQuantity() }})</p>
        <p class="cart-info">Price {{ $cart->totalPrice() }} MAD</p>
    </div>
    <section class="cart-section">
        
        <div class="product-container">
            @forelse($cart->products as $product)
            <div class="product-img">
                <img src="{{ $product->image }}" alt="{{ $product->reference }}">
            </div>
            <h2>{{ $product->name }}</h2>
            <p class="description">{{ $product->supplier->name }}</p>
            <p class="price">{{ $product->price }} MAD</p>
            <p class="quantity">{{ $product->pivot->quantity }}</p>
            <form action="{{ route('cart.remove', $product->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn delete-btn">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </form>
            @empty
              <p>No Products !</p>
            @endforelse
        </div>

        
        
        <form action="{{ route('save-order-items') }}" method="post">
            @csrf
            @foreach($cart->products as $product)
            <input type="hidden" name="products[{{ $loop->index }}][product_id]" value="{{ $product->id }}">
            <input type="hidden" name="products[{{ $loop->index }}][quantity]" value="{{ $product->pivot->quantity }}">
            <input type="hidden" name="products[{{ $loop->index }}][unit_price]" value="{{ $product->price }}">
            
            @endforeach
            
            @if($cart->products->count())
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Order
            </button>
            @endif
            
        </form>
       </section>

</body>

</html>