<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dès Vu</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/3dstyle.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="JS/script.js"></script>
    <!-- connect to get icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- 3d model -->
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
</head>

<body>

    <div class="container">

        @include('components.navbar')

        <!-- SECTION 1 -->
        <div class="one">
            <div id="perfume">
                <model-viewer camera-orbit="calc(-1.5rad + env(window-scroll-y) * 20rad) 
                    85deg 
                    calc(10m - env(window-scroll-y) * 10m)" orientation="0deg 0deg 50deg" alt="3d perfume" src="3dmodel/scene.glb"></model-viewer>
            </div>
            <div class="frontBanner"></div>
        </div>

        <!-- SECTION 2 -->
        <div class="two">
            <p class="paragraph"><i>Dès Vu: The Awareness That This Will Become A Memory.</i> <br><br>Dès Vu captivates journey into the opulence of the Victorian era, resurrecting the allure of luxurious vintage perfumes.</p>
        </div>

        <!-- SECTION 3 -->
        <div class="three">
            <div class="products flex">
                <div class="product1"></div>
                <div class="product2"></div>
            </div>
            <div class="productCaption">
                <p class="smallText">Products</p>
                <br>
                <p class="normalText">OUR PERFUMES</p>
                <br>
                <a href="{{route('productsview')}}" class="button-like">
                    <button class="buttons">Discover</button>
                </a>

            </div>
        </div>

        <!-- SECTION 4 -->
        <div class="four">
            <div class="flex">
                <div>
                    <div class="normalText">ABOUT US</div>
                    <div class="aboutParagraph">Explore our exclusive pop-up stores now. <br>Immerse yourself in a curated retail experience unlike any other, and discover our limited-time offerings and unique finds.</div>
                    <a href="{{route('aboutus')}}" class="button-like">
                        <button class="buttons">Discover</button>
                    </a>
                </div>

                <div class="aboutPic"></div>
            </div>
        </div>

        <!-- SECTION 5 -->
        <div class="five">
            <div class="collage">
                <img class="collage-row-2" src="IMG/left-collage.jpg">
                <img src="IMG/demarly2.jpg">
                <img class="collage-row-2" src="IMG/demarly4.jpg">
                <img src="IMG/demarly3.jpg">
                <!-- can modify -->
            </div>
        </div>

        <!-- SECTION 6 -->
        <div class="six">
            <p class="smallText">Categories</p>
            <br>
            <p class="normalText">FRAGRANCE FAMILIES</p>
            <div class="scents flex ">
                @foreach($scentcategory as $scentcategory)
                <div class="scentCat">
                    <img src="data:image/jpeg;base64,{{ base64_encode($scentcategory->picture) }}">
                    <p class="normalText scentName">{{ $scentcategory->scentName }}</p>
                </div>
                @endforeach
            </div>


            <p class="paragraph">Unveil the allure of scent lineages, encapsulated in each bottle, and immerse yourself in a journey of sensory sophistication.</p>
            <a href="{{route('productsview')}}">
                <button class="buttons">Discover</button>
            </a>
            

            <div class="above">
                <p class="normalText">FIND YOUR PERSONAL SCENT</p>
                <br>
                <a href="{{route('quiz')}}">
                    <button class="buttons">Take quiz</button>
                </a>
            </div>
            <div class="takequiz">
                <video autoplay muted loop id="video">
                    <source src="IMG/valaya.mp4" type="video/mp4">
                </video>
            </div>
        </div>

        @include('components.footer')

    </div>

    @include('components.cart')

    @include('components.profile')




</body>

</html>