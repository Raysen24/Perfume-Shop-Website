<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>transaction history</title>
    <link rel="stylesheet" href="CSS/history.css">

</head>
<body>

@include('components.smallnav')
<a href="{{url('home')}}">
    <button class="bckhomebtn"><< back to Home</button>
</a>

    <div class="container">
        <div class="history">

            @foreach($transactionDetails as $transaction)
            
            <div class="transaction">
                <div id="date">
                    <p class="normalText">ORDER ID {{$transaction['orderID']}}</p>
                    <p>{{$transaction['orderTime']}}</p>
                </div>
                <div class="transaction-detail">

                    <div class="product">

                        @foreach($transaction['productDetails'] as $productDetail)
                            <!-- Display product details here -->
                            @php
                                $product = $products->where('productID', $productDetail['productID'])->first();
                            @endphp
                            <div class="per-item">
                                <div class="picture" style="background-image: url('data:image/jpeg;base64,{{ base64_encode($product->png) }}');"></div>
                                
                                <div class="details-trans">
                                    <div class="item-name">{{ $productDetail['productName'] }}</div>
                                    <div class="price">
                                        <div class="pricexqty">
                                            <div>Rp {{ $productDetail['pricePerItem'] }}</div>
                                            <div>x</div>
                                            <div>{{ $productDetail['quantity'] }}</div>
                                        </div>
                                        <div class="subtotal">Rp {{ $productDetail['subtotal'] }}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                        <div class="grey-line"></div>
                        <div class="total-price">
                            <p>Total</p>
                            <p><b>Rp {{$transaction['totalPrice']}}</b></p>
                        </div>
                    </div>

                    <div class="right-trans">
                        
                        <div class="small-title-trans">
                            <i><p><b>Delivery</b></p></i>
                            <br>
                            <div class="details-trans">
                                <div class="flex-trans">
                                    <p>Service</p>
                                    <p></p>
                                </div>
                                <br>
                                <div class="flex-trans">
                                    <p>Distance</p>
                                    <p>{{$transaction['distance']}}</p>
                                </div>
                                <br>
                                <div class="flex-trans">
                                    <p>Price/km</p>
                                    <p>Rp {{$transaction['pricePerKm']}}</p>
                                </div>
                                <br>
                                <div class="flex-trans">
                                    <p>Additional Fee</p>
                                    <p>-</p>
                                </div>
                                <br>
                                <div class="flex-trans">
                                    <p>Total</p>
                                    <p>Rp {{$transaction['deliveryTotalPrice']}}</p>
                                </div>
                                <br>
                                <div class="flex-trans">
                                    <p>Status</p>
                                    <p>{{$transaction['deliveryStatus']}}</p>
                                </div>
                            </div>
                        </div>

                        <br><br><br>

                        <div class="small-title-trans">
                            <i><p><b>Bill</b></p></i>
                            <br>
                            <div class="details-trans">
                                <div class="flex-trans">
                                    <p>Method</p>
                                    <p>{{$transaction['bankName']}}</p>
                                </div>
                                <br>
                                <div class="flex-trans">
                                    <p>Amount</p>
                                    <p>Rp {{$transaction['paymentAmount']}}</p>
                                </div>
                                <br>
                                <div class="flex-trans">
                                    <p>Status</p>
                                    <p>{{$transaction['paymentStatus']}}</p>
                                </div>
                            </div>
                        </div>


                    </div>
                    


                </div>
                
            </div>

            <div class="black-line"></div>

            @endforeach

            
                    

         
        </div>
    </div>
</body>
</html>