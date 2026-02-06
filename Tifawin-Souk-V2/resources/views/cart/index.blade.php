<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>USER</th>

            

        </tr>
    </thead>
    <tbody>
        
            <td>{{ $cart->id }}</td>
            <td>{{ $cart->user->name }}</td>
        
         <tr>  

             
             
             </tr>   
             
            </tbody>
        </table>
        <table>
            <thead>

                <th>cart id</th>
                <th>poruct id</th>
                <th>quantity</th>
                <th>prod name</th>
            </thead>
            
                
                
                    @foreach($cart->items as $cartItem)
                    <tbody>
                    <td>{{ $cartItem->cart_id }}</td>
                    <td>{{ $cartItem->product_id }}</td>
                    <td>{{ $cartItem->quantity }}</td>
                    <td>{{ $cartItem->product->name }}</td>
                    </tbody>
                    @endforeach
                
            
        </table>

        <a>{{ $cart->totalPrice() }}</a>
        <a>{{ $cart->totalQuantity() }}</a>
        