<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="{{ asset('CSS/prodDetail.css') }}" rel="stylesheet">
    <link href="{{ asset('CSS/style.css') }}" rel="stylesheet">
    <script src="{{ asset('JS/script.js') }}"></script>
</head>

<body>



    <div class="container">

        @include('components.navbar')
       

        <div class="product-detail-container">

            <div class="left-pd">
                <div class="pic-container">
                    <div id="slide-pd">
                        <div class="product-slide-picture" style="background-image: url('{{ asset('IMG/productdetail3.jpg') }}');"></div>
                        <div class="product-slide-picture" style="background-image: url('data:image/jpeg;base64,{{ base64_encode($product->picture) }}');">
                            <div class="content">
                                <div class="des">This is</div>
                                <div class="product-name">{{$product->productName}}</div>
                            </div>
                        </div>
                        <div class="product-slide-picture" style="background-image: url('data:image/jpeg;base64,{{ base64_encode($product->png) }}');">
                            <div class="content">
                            </div>
                        </div>
                        <div class="product-slide-picture" style="background-image: url('{{ asset('IMG/productdetail1.jpg') }}');">
                            <div class="content">
                                <div class="product-name">Elegant</div>
                                <div class="des">Embrace luxurious perfumes anywhere, anytime.</div>
                            </div>
                        </div>
                        <div class="product-slide-picture" style="background-image: url('{{ asset('IMG/productdetail2.jpg') }}');">
                            <div class="content">
                                <div class="product-name">Save and Tested</div>
                                <div class="des">Our products are save from harsh chemicals, can be used by everyone, even on your hair.</div>
                            </div>
                        </div>

                    </div>
                    <div class="product-buttons">
                        <button id="prev"><i class='bx bx-chevron-left'></i></button>
                        <button id="next"><i class='bx bx-chevron-right'></i></button>
                    </div>
                </div>


            </div>


            <div class="right-pd">

                <div class="product-name">The {{$product->productName}}</div>
                <br>
                <div class="collection-name">The <i><b>{{$product->launchDate->format('Y')}}</b></i> Collection</div>
                <br>
                <div class="price">Rp <div class="num">{{$product->productPrice}}</div>
                </div>
                <br>
                <div class="product-line"></div>
                <br>
                <div class="desc">{{$product->description}}</div>
                <br>
                <div class="details">
                    <ul>
                        <li><i class='bx bxs-package'></i>{{$product->weight}} grams</li>
                        <li><i class='bx bx-water'></i>{{$product->ml}} ml/bottle</li>
                        <li><i class='bx bx-time-five'></i>Exp 12 mo</li>
                        <li><i class='bx bx-fridge'></i>Store in cool area</li>
                        <li><i class='bx bxs-vial'></i>Safe ingredients</li>
                    </ul>
                </div>
                <br>
                <div class="qty">
                    <p>QUANTITY</p>
                    <div class="item-qty-pd">
                        <i class='bx bx-minus' id="decrementQty"></i>
                        <div class="qty" id="productQty">1</div>
                        <i class='bx bx-plus' id="incrementQty"></i>
                    </div>
                </div>
                <input type="hidden" class="productID" value="{{$product->productID}}">
                <button class="add-cart-btn" id="addToCartBtn" onclick="showCart()">ADD TO CART</button>
            </div>



        </div>
        @include('components.footer')

    </div>

    @include('components.cart')

    @include('components.profile')


</body>


<script>

document.getElementById('next').onclick = function(){
        let lists = document.querySelectorAll('.product-slide-picture');
        document.getElementById('slide-pd').appendChild(lists[0]);

    }
    document.getElementById('prev').onclick = function(){
        let lists = document.querySelectorAll('.product-slide-picture');
        document.getElementById('slide-pd').prepend(lists[lists.length - 1]);
        
    }

    // JavaScript to handle quantity increment and decrement
    document.getElementById('incrementQty').onclick = function() {
        updateProductQuantity(1);
    };

    document.getElementById('decrementQty').onclick = function() {
        updateProductQuantity(-1);
    };

    function updateProductQuantity(change) {
        let productQtyElement = document.getElementById('productQty');
        let newQty = parseInt(productQtyElement.innerText) + change;
        if (newQty >= 1) {
            productQtyElement.innerText = newQty;
        }
    }

    // JavaScript to handle adding to cart
    document.getElementById('addToCartBtn').onclick = function() {
        let productID = document.querySelector('.productID').value;
        let quantity = parseInt(document.getElementById('productQty').innerText);

        // Use AJAX to send asynchronous request to add product to cart
        fetch("{{ url('add-to-cart') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    productID,
                    quantity
                })
            })
            .then(response => response.json())
            .then(data => {
                // Handle response, if needed
                console.log(data);

                // Update the cart count in the UI (if you have a cart count element)
                // You can also update the UI to reflect the added product
                updateCartUI(data.cartData);
            })
            .catch(error => {
                console.error('Error:', error);
            });
    };

    function updateCartUI(cartData) {
        // Assuming you have a container element for displaying the cart
        let cartContainer = document.querySelector('.cart-list');

        // Clear the existing cart items in the UI
        cartContainer.innerHTML = '';

        // Iterate through the updated cart data and append new cart items to the UI
        cartData.forEach(cartItem => {
            let newItem = document.createElement('div');
            newItem.classList.add('item');
            newItem.dataset.productId = cartItem.productID;
            newItem.innerHTML = `
            <div class="item-name-and-price flex">
                <h4>${cartItem.productName}</h4>
                <h3>${cartItem.productPrice}</h3>
            </div>
            <div class="item-thumbnail">
                <img src="data:image/jpeg;base64,${cartItem.png}" alt="${cartItem.productName}">
            </div>
            <div class="item-qty flex">
                <i class='bx bx-minus update-qty' onclick="updateQuantity('${cartItem.productID}', -1, this.closest('form'))"></i>
                <div class="qty" id="qty-value">${cartItem.qty}</div>
                <i class='bx bx-plus update-qty' onclick="updateQuantity('${cartItem.productID}', +1, this.closest('form'))"></i>
            </div>
        `;

            // Append the new cart item to the container
            cartContainer.appendChild(newItem);
        });
    }
</script>



</html>