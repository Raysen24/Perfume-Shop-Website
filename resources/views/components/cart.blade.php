<!-- CART -->
<div class="cart">
    <div class="close">
        <!-- <i onclick=closeCart() class='bx bx-x'></i> -->
        <div onclick=closeCart() class="smallText">Close cart >></div>
    </div>


    <div class="cart-list">
        <div class="item-in-cart">
            @if($carts->count() > 0)
            <form action="{{ url('update/'.$customer->customerID)  }}" method='POST'>
                @foreach($cartproducts as $cartproduct)

                @csrf
                @php
                $cart = $carts->where('productID', $cartproduct->productID)->first();
                @endphp

                <div class="item" data-product-id="{{ $cartproduct->productID }}">
                    <div class="item-name-and-price flex">
                        <h4>{{ $cartproduct->productName }}</h4>
                        <h3>{{ $cartproduct->productPrice }}</h3>
                    </div>
                    <div class="item-thumbnail">
                        <!-- Use the product image if available, or a default image -->
                        <img src="data:image/jpeg;base64,{{ base64_encode($cartproduct->png) }}" alt="{{ $cartproduct->productName }}">
                    </div>
                    <div class="item-qty flex">
                        <i class='bx bx-minus update-qty' onclick="updateQuantity('{{ $cartproduct->productID }}', -1, this.closest('form'))"></i>

                        <div class="qty" id="qty-value">{{ $cart->qty }}</div>



                        <i class='bx bx-plus update-qty' onclick="updateQuantity('{{ $cartproduct->productID }}', +1, this.closest('form'))"></i>


                    </div>

                </div>

                @endforeach
                <input type="hidden" class="selectedProductID" name="selectedProductID" value="0">
                <input type="hidden" class="hiddenqty" name="productqty" value="0">
                <div class="submit-button"><input type="submit"></div>
            </form>
            @else
            <p id="no-in-cart"><i><b>There are no products in your Cart</b></i></p>
            @endif


        </div>

    </div>

    <div class="check-out">
        <a href="{{route('checkout1')}}">Check out</a>
    </div>

</div>