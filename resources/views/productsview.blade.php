<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dès Vu</title>
    <link rel="stylesheet" href="./CSS/style.css">
    <script src="./JS/script.js"></script>
    <!-- connect to get icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>

    <div class="container">
        @include('components.navbar')

        <!-- BANNER -->

        <div class="image-slider-container">
            <input type="radio" id="slide1" name="slider" checked class="radio-input">
            <input type="radio" id="slide2" name="slider" class="radio-input">
            <input type="radio" id="slide3" name="slider" class="radio-input">

            <div class="slider-container">
                <div class="slide" style="background-image: url('IMG/bannerno1.png');"></div>
                <div class="slide" style="background-image: url('IMG/bnr2.jpg');"></div>
                <div class="slide" style="background-image: url('IMG/banner3.png');"></div>
            </div>

            <div class="radio-buttons">
                <label for="slide1" class="radio-label">
                    <div class="radio-button"></div>
                </label>
                <label for="slide2" class="radio-label">
                    <div class="radio-button"></div>
                </label>
                <label for="slide3" class="radio-label">
                    <div class="radio-button"></div>
                </label>
            </div>
        </div>

        <!-- products list -->
        <div class="wrapper">
            <div class="container">

                <div class="categorybutton">
                    <button type="button" class="btn" id="all"> all </button>
                    <button type="button" class="btn" id="best"> best seller </button>
                    <button type="button" class="btn" id="new"> new </button>
                </div>

                <div class="itemsfilter">

                    @foreach($products as $product)
                    <div class="item all best">
                        <div class="itemimg">
                            <a href="{{url('productdetail', $product->productID)}}" class="option1">
                                <img src="data:image/jpeg;base64,{{ base64_encode($product->png) }}" alt="Product Image">
                            </a>
                        </div>
                        <div class="itemdesc">
                            <h3>{{ $product->productName }}</h3>
                            <p>{{ $product->category }}</p>
                            <p>Rp. {{ $product->productPrice }}</p>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>

        @include('components.footer')

    </div>

    @include('components.cart')

    @include('components.profile')

</body>

</html>