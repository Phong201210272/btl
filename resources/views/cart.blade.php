@extends('layout/layout')
@section('content')
    <section class="cart_area section_padding">
        <div class="container">
            <div class="cart_inner">
                <form action="{{route('checkout')}}" method="post">
                    @csrf
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Color</th>
                                <th scope="col">Size</th>
                                <th scope="col">Price</th>
                                <th scope="col">Remaining</th>
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
                                        <h5 class="price">{{$item['gia']}}</h5>
                                    </td>
                                    <td>
                                        <h5 class="max-quantity" >{{$item['conlai']}}</h5>
                                    </td>
                                    <td>
                                        <div class="product_count cart-product-item">
                                        <span class="input-number-decrement btn-des"> <i
                                                class="fas fa-minus"></i></span>
                                            {{--                                        <span>max: {{$item['conlai']}}</span>--}}
                                            <input class="soluong" type="text" name="soluong" value="{{$item['quantity']}}"
                                                   min="0"
                                                   max="10">
                                            <span class="input-number-increment btn-cre"> <i class="fas fa-plus"></i></span>

                                        </div>

                                    </td>
                                    <td>
                                        <h5 class="total-price">{{$item['tongtien']}} VND</h5>
                                            <?php $sum += $item['tongtien']; ?>
                                    </td>
                                    <td><button class="delete"  data-index="{{ $loop->index }}">Delete</button></td>
                                </tr>
                            @endforeach

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <h5>Subtotal</h5>
                                </td>
                                <td colspan="3">
                                    <h5 id="subtotal" name="tongtien">{{$sum}} VND</h5>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                        <div class="checkout_btn_inner float-right">
                            <a class="btn_1" href="#">Continue Shopping</a>
                            <button class="btn_1 checkout_btn_1" type="submit" id="proceedToCheckout">Proceed to checkout</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const btnDesList = document.querySelectorAll('.btn-des');
            const btnCreList = document.querySelectorAll('.btn-cre');
            const maxQuantityList = document.querySelectorAll('.max-quantity');
            const soluongInputList = document.querySelectorAll('.soluong');
            const priceElementList = document.querySelectorAll('.price');
            let totalPriceElementList = document.querySelectorAll('.total-price');
            const deleteButtons = document.querySelectorAll('.delete');

            for (let i = 0; i < deleteButtons.length; i++) {
                const deleteButton = deleteButtons[i];
                deleteButton.addEventListener('click', function (event) {
                    event.preventDefault(); // Ngăn chặn hành vi mặc định của nút
                    const index = this.getAttribute('data-index');
                    deleteProduct(index);
                });
            }

            for (let i = 0; i < btnDesList.length; i++) {
                const btnDes = btnDesList[i];
                const btnCre = btnCreList[i];
                const maxQuantity = parseInt(maxQuantityList[i].textContent);
                const soluongInput = soluongInputList[i];
                const priceElement = priceElementList[i];
                const totalPriceElement = totalPriceElementList[i];
                const price = parseFloat(priceElement.textContent);

                btnDes.addEventListener('click', function () {
                    let value = parseInt(soluongInput.value);
                    if (value > 1) {
                        value -= 1;
                        soluongInput.value = value;
                    }
                    updateTotalPrice();
                    updateSubtotal();
                });

                btnCre.addEventListener('click', function () {
                    let value = parseInt(soluongInput.value);
                    if (value < maxQuantity) {
                        value += 1;
                        soluongInput.value = value;
                    }
                    updateTotalPrice();
                    updateSubtotal();
                });

                function updateTotalPrice() {
                    const quantity = parseInt(soluongInput.value);
                    const totalPrice = price * quantity;
                    totalPriceElement.textContent = Math.floor(totalPrice) + " VND";
                }
                updateSubtotal();
            }

            function deleteProduct(index) {
                fetch(`/cart/delete/${index}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json',
                    },
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const currentRow = deleteButtons[index].parentNode.parentNode;
                            currentRow.remove();
                            updateSubtotal();
                        } else {
                            alert('Xóa sản phẩm không thành công. Vui lòng thử lại.');
                        }
                    })
                    .catch(error => {
                        console.error('Lỗi:', error);
                    });
            }

            function updateSubtotal() {
                let subtotal = 0;
                totalPriceElementList = document.querySelectorAll('.total-price');

                totalPriceElementList.forEach(totalPriceElement => {
                    const totalPrice = parseFloat(totalPriceElement.textContent);
                    subtotal += totalPrice;
                });

                document.getElementById('subtotal').textContent = subtotal + " VND";
            }
            document.getElementById('proceedToCheckout').addEventListener('click', function () {
                window.location.href = "{{ route('checkout') }}";
            });
        });
    </script>
@endsection
