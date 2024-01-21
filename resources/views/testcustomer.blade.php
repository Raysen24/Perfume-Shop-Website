<!DOCTYPE html>
<html>
<head>
    <title>Product Image</title>
</head>
<body>

    <!-- Step 3: Display the Image in Laravel -->

    @foreach($product as $product)

                    <tr>
                        <td>{{$product->title}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->category}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->discount_price}}</td>
                        <td>

                            <img class="img_size" src="data:image/jpeg;base64,{{ $image }}">

                        </td>

                        <td>
                            <a class="btn btn-danger" onclick="return confirm('Are You Sure to Delete this?')" href="{{url('delete_product', $product->id)}}">Delete</a>
                        </td>

                        <td>
                            <a class="btn btn-success" href="{{url('update_product', $product->id)}}">Edit</a>
                        </td>
                    </tr>

                    @endforeach

</body>
</html>
