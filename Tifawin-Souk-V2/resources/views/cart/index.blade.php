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
        @forelse($cart->items as $cartItem)
                       
                <div class="product-container">
                <div class="product-img">
                    <img src="{{ $cartItem->product->image }}" alt="{{ $cartItem->product->reference }}">
                </div>
                <h2>{{ $cartItem->product->name }}</h2>
                <p class="description">{{ $cartItem->product->description }}</p>
                <p class="price">{{ $cartItem->product->price }} MAD</p>
                <p class="quantity">{{ $cartItem->quantity }}</p>
                <form action="{{ route('cartItem.destroy', $cartItem) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn delete-btn">
                        
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
                </div>
                            <!-- <td class="">{{ $cartItem->product->name }}</td>
                            <td class="">{{ $cartItem->product->price }}</td>
                      -->
    
                   
                        <input type="hidden" name="items[{{ $loop->index }}][product_id]" value="{{ $cartItem->product_id }}">
                        <input type="hidden" name="items[{{ $loop->index }}][quantity]" value="{{ $cartItem->quantity }}">
                        <input type="hidden" name="items[{{ $loop->index }}][unit_price]" value="{{ $cartItem->product->price }}">
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