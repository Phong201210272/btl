@extends('layout/layout')
@section('content')
    <section class="breadcrumb_part single_product_breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

    <!--================Single Product Area =================-->
    <div class="product_image_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="product_img_slide owl-carousel">
                        <div class="single_product_img">
                            <img src="{{asset('banchangagoidem/img/prodimg/'.$productFind[0]->anh)}}" alt="#"
                                 class="img-fluid">
                        </div>
                        <div class="single_product_img">
                            <img src="{{asset('banchangagoidem/img/prodimg/'.$productFind[1]->anh)}}" alt="#"
                                 class="img-fluid">
                        </div>
                    </div>
                </div>
                <form action="{{route('addcart')}}" method="post">
                    <div class="col-lg-8">
                        <div class="single_product_text text-center">

                            <h3 name="tensp">{{$productFind[0]->tensp}}</h3>
                            <p>
                                Seamlessly empower fully researched growth strategies and interoperable internal or
                                “organic” sources. Credibly innovate granular internal or “organic” sources whereas high
                                standards in web-readiness. Credibly innovate granular internal or organic sources
                                whereas
                                high standards in web-readiness. Energistically scale future-proof core competencies
                                vis-a-vis impactful experiences. Dramatically synthesize integrated schemas. with
                                optimal
                                networks.
                            </p>
                            <label>Size:</label>
                            <input type="radio" name="size" id="sizeOption1" value="{{$productFind[0]->kichco}}"
                                   checked>
                            <label for="sizeOption1">{{$productFind[0]->kichco}}</label>

                            <input type="radio" name="size" id="sizeOption2" value="{{$productFind[2]->kichco}}">
                            <label for="sizeOption2">{{$productFind[2]->kichco}}</label>


                            <label>Color:</label>
                            <input type="radio" name="mau" id="mauOption1" value="{{$productFind[0]->mau}}"
                                   checked>
                            <label for="colorOption1">{{$productFind[0]->mau}}</label>

                            <input type="radio" name="mau" id="mauOption2" value="{{$productFind[1]->mau}}">
                            <label for="colorOption2">{{$productFind[1]->mau}}</label>

                            <!-- Displayed Price -->
                            <h3 id="displayPrice"><b>Cost: {{$productFind[0]->gia}} VND</b></h3>

                            <!-- Include this script in your HTML -->
                            <script>
                                function updatePrice() {
                                    console.log('Radio clicked!'); // Check if the function is triggered

                                    var selectedSize = document.querySelector('input[name="size"]:checked').value;

                                    // Update the price based on the selected size
                                    var price = selectedSize === '{{$productFind[2]->kichco}}' ? {{$productFind[2]->gia}} : {{$productFind[0]->gia}};

                                    console.log('Selected Size:', selectedSize); // Check the selected size
                                    console.log('Updated Price:', price); // Check the updated price

                                    // Display the updated price on the page
                                    document.getElementById('displayPrice').innerHTML = `<b>Cost: ${price} VND</b>`;
                                }

                                // Attach the updatePrice function to the change event of the radio buttons
                                document.querySelectorAll('input[name="size"]').forEach(function (radio) {
                                    radio.addEventListener('change', updatePrice);
                                });
                            </script>

                            <div class="card_area">


                                @csrf
                                <div class="product_count_area">
                                    <p>Quantity</p>
                                    <div class="product_count d-inline-block">
                                    <span class="product_count_item inumber-decrement"> <i
                                            class="fas fa-minus"></i></span>
                                        <input class="product_count_item input-number" name="quantity" type="text"
                                               value="1" min="0"
                                               max="10">
                                        <span class="product_count_item number-increment"> <i
                                                class="fas fa-plus"></i></span>
                                    </div>
                                </div>
                                <div class="add_to_cart">
                                    <input type="hidden" value="{{$productFind[0]->masp}}" name="masp">
                                    <button class="btn_3">add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--================End Single Product Area =================-->
    <!-- subscribe part here -->
    <section class="subscribe_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="subscribe_part_content">
                        <h2>Get promotions & updates!</h2>
                        <p>Seamlessly empower fully researched growth strategies and interoperable internal or “organic”
                            sources credibly innovate granular internal .</p>
                        <div class="subscribe_form">
                            <input type="email" placeholder="Enter your mail">
                            <a href="" class="btn_1">Subscribe</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
