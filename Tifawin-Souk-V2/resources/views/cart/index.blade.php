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
        @forelse($cart->products as $product)

            <div class="product-container">
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
            </div>
            <!-- <td class="">{{ $product->name }}</td>
                                <td class="">{{ $product->price }}</td>
                          -->


            <input type="hidden" name="items[{{ $loop->index }}][product_id]" value="{{ $product->product_id }}">
            <input type="hidden" name="items[{{ $loop->index }}][quantity]" value="{{ $product->quantity }}">
            <input type="hidden" name="items[{{ $loop->index }}][unit_price]" value="{{ $product->price }}">
        @empty
            <tr>
                <td colspan="5" class="text-red-500 font-semibold py-2 px-4 text-center">
                    There is no product in the cart
                </td>
            </tr>
        @endforelse
    </section>
    <button class="checkout btn btn-primary">Checkout</button>
</body>

</html>