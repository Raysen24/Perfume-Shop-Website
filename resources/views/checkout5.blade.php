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
            <div class="progress-circle" id="confirmation-bar" style="background-color: grey;"></div>
            <div class="step-text">Confirmation</div>
        </div>
    </div>
    
    <div class="wrapper">

        <div id="confirmation" class="step">
            <p><b>5. Confirmation</b></p>
            <br><br>
            <p> You have succesfully put in an order</p>
            <a href="{{url('home')}}">
                <button class="button">Continue Shopping</button>
            </a>
        </div>



        
    </div>

    <script src="JS/checkoutscript.js"></script>

</body>

</html>