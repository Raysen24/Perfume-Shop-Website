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
            <div class="progress-circle" id="payment-bar"></div>
            <div class="step-text">Payment</div>
        </div>
        <div class="progress-step" id="waitingforpayment-step">
            <div class="progress-circle" id="waitingforpayment-bar"></div>
            <div class="step-text">Payment</div>
        </div>
        <div class="progress-step" id="confirmation-step">
            <div class="progress-circle" id="confirmation-bar"></div>
            <div class="step-text">Confirmation</div>
        </div>
    </div>
    
    <div class="wrapper">

        <!-- all step 1-4 below -->
        

    
        <div id="delivery" class="step">
            <p><b>2. Delivery</b></p>
            <br><br>
            <p class="instruction">Pick your delivery option*</p>
            <br>
            <div class="delivery-options">



                <form method="POST" action="{{route('checkout3')}}"> 
                @csrf    

                @foreach($deliveryservices as $deliveryservice)

                    <label class="radiobutton-box" onclick="updateChosen('{{$deliveryservice->deliveryServiceID}}')">
                        
                            <input type="radio" name="chosenServ" value="">
                            <img src="data:image/jpeg;base64,{{ base64_encode($deliveryservice->logo) }}" alt="{{$deliveryservice->deliveryName}}">
                            <span>{{$deliveryservice->deliveryName}}      @ {{$deliveryservice->pricePerKm}}/km</span>
                        
                    </label>
    
                @endforeach
                <input type="hidden" class="actualchosenone" name="chosen" value="">
                <button class="button">Proceed to Payment</button>
                
            
            </div>

            
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
                    <input type="hidden" name="total" value="{{$subtotal}}">
                </div>

                <!-- Shipping cost -->
                <div class="row">
                    <p>Shipping Cost</p>
                    <p class="amount">-</p>
                </div>

                <div class="row">
                    <p>Additional Cost</p>
                    <p class="amount">-</p>
                </div>

                <br>
                <div class="row">
                    <p>Total</p>
                    <p class="amount">-</p>
                </div>

            </div>
        </div>
        </form>
    </div>

    <script src="JS/checkoutscript.js"></script>

</body>

</html>