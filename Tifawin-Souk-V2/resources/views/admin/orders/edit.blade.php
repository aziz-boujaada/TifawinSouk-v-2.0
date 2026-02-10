<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>{{$order->id}}</h1>
    <div>
        <form action="{{route('update-order' , $order->id)}}" method="post">
            @csrf 
            @method('PUT')
            <h4>Upadate Order status </h4>
            <label for="sttaus">Status</label>
            <select name="status" id="">
                <option value="delivered">Delivered</option>
                <option value="canceled">Canceled</option>
                <option value="pending">Pending</option>
            </select>
            <button type="submit">update status</button>
        </form>
    </div>
</body>

</html>