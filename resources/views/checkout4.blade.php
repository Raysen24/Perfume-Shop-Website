<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout steps</title>
    <link rel="stylesheet" href="CSS/checkout.css">
</head>

<body>

@include('components.smallnav')
<a href="{{url('home')}}">
    <button class="bckhomebtn"><< back to Home</button>
</a>

    <div class="progress-bar">
        <div class="progress-step" id="identification-step">
            <div class="progress-circle" id="identification-bar" style="background-color: grey;"></div>
            <div class="step-text">Identification</div>
        </div>

        <div class="progress-step" id="delivery-step">
            <div class="progress-circle" id="delivery-bar" style="background-color: grey;"></div>
            <div class="step-text">Delivery</div>
        </div>
        <div class="progress-step" id="payment-step">
            <div class="progress-circle" id="payment-bar" style="background-color: grey;"></div>
            <div class="step-text">Payment</div>
        </div>
        <div class="progress-step" id="waitingforpayment-step">
            <div class="progress-circle" id="waitingforpayment-bar" style="background-color: grey;"></div>
            <div class="step-text">Payment</div>
        </div>
        <div class="progress-step" id="confirmation-step">
            <div class="progress-circle" id="confirmation-bar"></div>
            <div class="step-text">Confirmation</div>
        </div>
    </div>
    
    <div class="wrapper">

        <!-- all step 1-4 below -->


        <div id="waitingforpayment" class="step">
            <p><b>4. Payment(2)</b></p>
            <br><br>
            <div class="va-detail">
                <br><br><br><br>
                <p>Please make your payment within 5 min</p>
                <p id="virtualAccountNumber">Virtual Account Number: {{$virtualaccount->virtualAccount}}</p>
                <div class="short-line"></div>
                <p id="amountDue">Amount Due: <b>Rp {{$totalamount}}</b></p>

            </div>
                

            <a href="{{url('checkout5')}}">
                <button class="button">Waiting for Confirmation</button>
            </a>
            
        </div>



        <!-- ORDER SUMMARY (right side) -->
        <div class="rightside">

            <div class="ordersum">
                <h3><b>Order Summary</b></h3>
                <br>

                <!-- Product details -->
                @php
                $subtotal = 0;
                @endphp
                @foreach($cartproducts as $cartproduct)
                @php
                $cart = $carts->where('productID', $cartproduct->productID)->first();
                
                @endphp
                <div class="product-item">
                    <img src="data:image/jpeg;base64,{{ base64_encode($cartproduct->png) }}" alt="Roses N Honey">
                    <div class="product-info">
                        <p>{{$cartproduct->productName}}</p>
                        <p>Qty: {{ $cart ? $cart->qty : 0 }}</p>
                        @php
                        $a = $cart->qty;
                        $b = $cartproduct->productPrice;
                        $pricexqty = $a*$b;
                        $subtotal += $pricexqty;
                        @endphp
                        <h4 id="subtotal">Rp {{$pricexqty}}</h4>
                       
                    </div>
                </div>
                @endforeach


                <!-- Line dividing items -->
                <div class="divider"></div>

                <!-- Subtotal -->
                <div class="row">
                    <p>Subtotal</p>
                    <p class="amount"><strong>Rp {{$subtotal}}</strong></p>
                </div>

                <!-- Shipping cost -->
                <div class="row">
                    <p>Shipping Cost</p>
                    <p class="amount">Rp {{$orderdelivery->deliveryTotalPrice}}</p>
                </div>

                <div class="row">
                    <p>Additional Cost</p>
                    <p class="amount">-</p>
                </div>

                <br>
                <div class="row">
                    <p>Total</p>
                    <p class="amount">Rp {{$totalamount}}</p>
                </div>

            </div>
        </div>
    </div>

    <script src="JS/checkoutscript.js"></script>

</body>

</html>