@extends('layout/layout')
@section('content')
    {{--    <section class="breadcrumb_part">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-lg-12">--}}
    {{--                    <div class="breadcrumb_iner">--}}
    {{--                        <h2>checkout</h2>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    <div class="billing_details">
        <div class="row">
            <div class="col-lg-8">
                <h3>Billing Details</h3>
                <form class="row contact_form" action="#" method="post" novalidate="novalidate">
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
                        <li>
                            <a href="#">Fresh Blackberry
                                <span class="middle">x 02</span>
                                <span class="last">$720.00</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">Fresh Tomatoes
                                <span class="middle">x 02</span>
                                <span class="last">$720.00</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">Fresh Brocoli
                                <span class="middle">x 02</span>
                                <span class="last">$720.00</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="list list_2">
                        <li>
                            <a href="#">Total
                                <span>$2210.00</span>
                            </a>
                        </li>
                    </ul>
                    <a class="btn_3" href="#">Proceed</a>
                </div>
            </div>
        </div>
    </div>
    </div>
