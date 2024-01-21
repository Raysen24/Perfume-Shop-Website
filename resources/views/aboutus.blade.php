<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dès Vu</title>
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="stylesheet" href="./CSS/aboutUs.css">
    <script src="./JS/script.js"></script>
    <!-- connect to get icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
    <div class="container">
    @include('components.navbar')
        <!-- OUR STORES -->
        <div class="ourstores">
            <!-- <h3>OUR STORES</h3> -->
            <div class="location">
                <div class="aboutUsSpace white x" style="background-image: url('{{ asset('IMG/store 1.jpg') }}');"></div>
                <div class="aboutUsSpace brown y" >
                    <div class="locations">
                        <h5>Des Vu</h5>
                        <h2>Store Place</h2>
                        <p>Address jl. blablabla</p>
                        <div class="hour">
                            <p>Open Everyday</p>
                            <p>12:00 - 21:00</p>
                        </div>
                        <button>View Map</button>
                    </div>
                </div>
            </div>
            <div class="location">
                <div class="aboutUsSpace brown x">
                    <div class="locations">
                        <h5>Des Vu</h5>
                        <h2>Store Place</h2>
                        <p>Address jl. blablabla</p>
                        <div class="hour">
                            <p>Open Everyday</p>
                            <p>12:00 - 21:00</p>
                        </div>
                        <button>View Map</button>
                    </div>
                </div>
                <div class="aboutUsSpace white y" style="background-image: url('{{ asset('IMG/store 2.jpg') }}');">
                </div>
            </div>
            <div class="location">
                <div class="aboutUsSpace white x" style="background-image: url('{{ asset('IMG/store 3.jpg') }}');"></div>
                <div class="aboutUsSpace brown yx">
                    <div class="locations">
                        <h5>Des Vu</h5>
                        <h2>Store Place</h2>
                        <p>Address jl. blablabla</p>
                        <div class="hour">
                            <p>Open Everyday</p>
                            <p>12:00 - 21:00</p>
                        </div>
                        <button>View Map</button>
                    </div>
                </div>
            </div>
        </div>

        

        @include('components.footer')
    </div>

    @include('components.cart')

    @include('components.profile')
</body>

</html>