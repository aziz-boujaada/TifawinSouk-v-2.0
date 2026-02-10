<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>{{$order->status}}</h1>
    <div>
        <form action="{{route('update-order' , $order)}}" method="post">
            @csrf 
            @method('PUT')
            <h4>Upadate Order status </h4>
            <label for="status">Status</label>
            <select name="status" id="">
                <option value="delivered" @selected($order->status === 'delivered')>Delivered</option>
                <option value="canceled" @selected($order->status === 'canceled')>Canceled</option>
                <option value="pending"@selected($order->status === 'pending')>Pending</option> 
                <option value="processing"@selected($order->status === 'processing')>processing</option>                                            ')>Pending</option>
            </select>
            <button type="submit">update status</button>
        </form>
    </div>
</body>

</html>