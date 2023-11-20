@extends('layout/layout')
@section('content')
    <section class="cart_area section_padding">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Color</th>
                            <th scope="col">Size</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $sum = 0; ?>
                        @foreach($chitiet as $item)
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="media-body">
                                            <p>{{$item['tensp']}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>{{$item['mau']}}</h5>
                                </td>
                                <td>
                                    <h5>{{$item['kichco']}}</h5>
                                </td>
                                <td>
                                    <h5>{{$item['gia']}}</h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <span class="input-number-decrement"> <i class="fas fa-minus"></i></span>
                                        <input class="soluong" type="text" name="soluong" value="{{$item['quantity']}}" min="0"
                                               max="10">
                                        <span class="input-number-increment"> <i class="fas fa-plus"></i></span>
                                    </div>
                                </td>
                                <td>
                                    <h5 class="total-price">{{$item['tongtien']}} VND</h5>
                                        <?php $sum += $item['tongtien']; ?>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <h5>Subtotal</h5>
                            </td>
                            <td colspan="3">
                                <h5 id="subtotal">{{$sum}} VND</h5>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="checkout_btn_inner float-right">
                        <a class="btn_1" href="#">Continue Shopping</a>
                        <a class="btn_1 checkout_btn_1" href="#">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </script>
@endsection
