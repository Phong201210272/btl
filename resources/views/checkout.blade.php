@extends('layout/layout')
@section('content')
    <div class="billing_details">
        <div class="row">
            <div class="col-lg-8">
                <h3>Billing Details</h3>
                <form class="row contact_form" action="{{ route('checkout') }}" method="post" novalidate="novalidate">
                    @csrf
                    <!-- Thêm các trường thông tin người dùng -->
                    <div class="col-md-6 form-group p_star">
                        <label>Full Name</label>
                        <input type="text" value="{{$nguoidung->tennd}}" class="form-control" id="last" name="name" />
                        <span class="placeholder" ></span>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" id="company" name="company" placeholder="Adress" />
                    </div>
                    <div class="col-md-6 form-group p_star">
                        <label>Phone Number</label>
                        <input type="text" value="{{$nguoidung->sdt}}" class="form-control" id="number" name="number" />
                        <span class="placeholder"></span>
                    </div>
                    <div class="col-md-6 form-group p_star">
                        <label>Email</label>
                        <input type="text" value="{{$nguoidung->email}}" class="form-control" id="email" name="compemailany" />
                        <span class="placeholder" ></span>
                    </div>
                </form>
            </div>
            <div class="col-lg-4">
                <div class="order_box">
                    <h2>Your Order</h2>
                    <ul class="list">
                        <li>
                            <a href="#">Product
                                <span>Total</span>
                            </a>
                        </li>
                        @foreach($chitiet as $item)
                            <li>
                                <a href="#">{{ $item['tensp'] }}
                                    <span class="middle">{{ $item['soluong'] }}</span>
                                    <span class="last">{{ $item['tongtien'] }} VND</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <ul class="list list_2">
                        <li>
                            <a href="#">Total
                                <span>{{ $sum }} VND</span>
                            </a>
                        </li>
                    </ul>
                    <a class="btn_3" href="{{ route('checkout') }}">Proceed</a>
                    @if(session('success'))
                        <script>
                            alert("{{ session('success') }}");
                        </script>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
