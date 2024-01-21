<!-- RIBBON -->
<nav class="top-ribbon">
    <div>Haven't discovered your personal scent yet? <a href="{{route('quiz')}}"><b>Take quiz here!</b></a></i></div>
</nav>

<!-- MAIN NAVBAR -->
<nav class="navbar">
    <div class="nav flex">

        <!-- NAVBAR -->
        <ul class="left-menu flex">
            <li onclick=handleMouseOver()> <a href="#" class="threeline"><i class='bx bx-menu'></i></a> </li>
        </ul>

        <div class="logo">
            <img src="{{ asset('IMG/smallLogo.png') }}">
        </div>

        <ul class="right-menu flex">
            <li onclick=showProfile()> <a href="#"><i class='bx bx-user'></i></a> </li>
            <li onclick=showCart()>
                <a href="#" class="cart-logo">
                    <i class='bx bx-cart'></i>
                    <span class="cart-count">{{ $carts->count() }}</span>
                </a>
            </li>
        </ul>


    </div>
    <!-- MENU TAB -->
    <div class="menu-tab">
        <ul>
            <li> <a href="{{route('home')}}" class="">HOME</a></li>
            <li> <a href="{{route('productsview')}}" class="">SHOP</a></li>
            <li> <a href="{{route('aboutus')}}" class="">OUR STORES</a></li>
            <li> <a href="{{route('quiz')}}" class="">TAKE QUIZ</a></li>
        </ul>
    </div>

</nav>