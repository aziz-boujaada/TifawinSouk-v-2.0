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
        
            

           <td>
            @foreach($cart->items as $cartItem)
        <td>
            <td>{{ $cartItem->cart_id }}</td>
            <td>{{ $cartItem->product_id }}</td>
            <td>{{ $cartItem->quantity }}</td>
            

           
        </td>
        @endforeach
           </td>
       
    
    </tbody>
</table>

