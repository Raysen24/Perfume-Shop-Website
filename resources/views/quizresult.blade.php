<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/quizresult.css">
</head>
<body>

@include('components.smallnav')
<div class="top-buttons">
    <a href="{{url('home')}}">
        <button class="bckhomebtn"><< back to Home</button>
    </a>
    <a href="{{url('productsview')}}">
        <button class="cntushop">Shop Now >></button>
    </a>
</div>

    <div class="container">
        <h2 class="congrats">Congratulations!</h2>
        <p>You score is</p>
        <h3 class="score">{{ $scorepercentage }}%</h3>
        <br><br>
        <div class="product">
            <p>You got</p>
            <h2 class="productname-qr">{{ $product->productName }}</h2>
            <img src="data:image/jpeg;base64,{{ base64_encode($product->png) }}" alt="scent picture">
            <h4>{{ $product->description }}</h4>
        </div>
        
    </div>
</body>
</html>