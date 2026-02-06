<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>USER</th>
            <th>TOTAL PRICE</th>
            <th>STATUS</th>
            <th>ITEMS</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->user->name }}</td>
            <td>{{ $order->total_price }}</td>
            <td>{{ $order->status }}</td>
            

           <td>
            <a href="{{route('orders.show' , $order)}}">details</a>
           </td>
        </tr>
        @endforeach
    </tbody>
</table>

