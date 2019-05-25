@extends('layouts.shop')
@section('title', '1809 电商 ')
@section('content')

<!-- side nav right-->
<div class="side-nav-panel-right">
    <ul id="slide-out-right" class="side-nav side-nav-panel collapsible">

        @if($session_name==null)
            <li class="profil">
                <img src="img/profile.jpg" alt="">
                <h2>John Doe</h2>
            </li>
            <li><a href="/contact"><i class="fa fa-user"></i>About Us</a></li>
            <li><a href="/login"><i class="fa fa-sign-in"></i>Login</a></li>
            <li><a href="/register"><i class="fa fa-user-plus"></i>Register</a></li>
        @else
            <li class="profil">
                <img src="img/下载.jpg" alt="">
                <h2>欢迎<font color="red">{{$session_name}}</font>登录</h2>
            </li>
            <li><a href="/contact"><i class="fa fa-user"></i>About Us</a></li>
            <li><a href="/logout"><i class="fa fa-sign-out"></i>Logout</a></li>
        @endif
    </ul>
</div>

<!-- navbar bottom -->
<div class="navbar-bottom">
    <div class="row">
        <div class="col s2">
            <a href="/"><i class="fa fa-home"></i></a>
        </div>
        <div class="col s2">
            <a href="wishlist.html"><i class="fa fa-heart"></i></a>
        </div>
        <div class="col s4">
            <div class="bar-center">
                <a href="/cartdet" ><i class="fa fa-shopping-basket"></i></a>
                <span>{{$a}}</span>
            </div>
        </div>
        <div class="col s2">
            <a href="/contact"><i class="fa fa-envelope-o"></i></a>
        </div>
        <div class="col s2">
            <a href="#animatedModal2" id="nav-menu"><i class="fa fa-bars"></i></a>
        </div>
    </div>
</div>
<!-- end navbar bottom -->

<<<<<<< HEAD
<!-- menu -->
<div class="menus" id="animatedModal2">
    <div class="close-animatedModal2 close-icon">
        <i class="fa fa-close"></i>
    </div>
{{--<div class="menus" id="animatedModal2">--}}
    {{--<div class="close-animatedModal2 close-icon">--}}
        {{--<i class="fa fa-close"></i>--}}
    {{--</div>--}}
    {{--<div class="modal-content">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col s4">--}}
                    {{--<a href="index.html" class="button-link">--}}
                        {{--<div class="menu-link">--}}
                            {{--<div class="icon">--}}
                                {{--<i class="fa fa-home"></i>--}}
                            {{--</div>--}}
                            {{--Home--}}
                        {{--</div>--}}
                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="col s4">--}}
                    {{--<a href="product-list.html" class="button-link">--}}
                        {{--<div class="menu-link">--}}
                            {{--<div class="icon">--}}
                                {{--<i class="fa fa-bars"></i>--}}
                            {{--</div>--}}
                            {{--Product List--}}
                        {{--</div>--}}
                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="col s4">--}}
                    {{--<a href="shop-single.html" class="button-link">--}}
                        {{--<div class="menu-link">--}}
                            {{--<div class="icon">--}}
                                {{--<i class="fa fa-eye"></i>--}}
                            {{--</div>--}}
                            {{--Single Shop--}}
                        {{--</div>--}}
                    {{--</a>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="row">--}}
                {{--<div class="col s4">--}}
                    {{--<a href="wishlist.html" class="button-link">--}}
                        {{--<div class="menu-link">--}}
                            {{--<div class="icon">--}}
                                {{--<i class="fa fa-heart"></i>--}}
                            {{--</div>--}}
                            {{--Wishlist--}}
                        {{--</div>--}}
                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="col s4">--}}
                    {{--<a href="cartdet" class="button-link">--}}
                        {{--<div class="menu-link">--}}
                            {{--<div class="icon">--}}
                                {{--<i class="fa fa-shopping-cart"></i>--}}
                            {{--</div>--}}
                            {{--Cart--}}
                        {{--</div>--}}
                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="col s4">--}}
                    {{--<a href="checkout.html" class="button-link">--}}
                        {{--<div class="menu-link">--}}
                            {{--<div class="icon">--}}
                                {{--<i class="fa fa-credit-card"></i>--}}
                            {{--</div>--}}
                            {{--Checkout--}}
                        {{--</div>--}}
                    {{--</a>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="row">--}}
                {{--<div class="col s4">--}}
                    {{--<a href="blog.html" class="button-link">--}}
                        {{--<div class="menu-link">--}}
                            {{--<div class="icon">--}}
                                {{--<i class="fa fa-bold"></i>--}}
                            {{--</div>--}}
                            {{--Blog--}}
                        {{--</div>--}}
                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="col s4">--}}
                    {{--<a href="blog-single.html" class="button-link">--}}
                        {{--<div class="menu-link">--}}
                            {{--<div class="icon">--}}
                                {{--<i class="fa fa-file-text-o"></i>--}}
                            {{--</div>--}}
                            {{--Blog Single--}}
                        {{--</div>--}}
                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="col s4">--}}
                    {{--<a href="error404.html" class="button-link">--}}
                        {{--<div class="menu-link">--}}
                            {{--<div class="icon">--}}
                                {{--<i class="fa fa-hourglass-half"></i>--}}
                            {{--</div>--}}
                            {{--404--}}
                        {{--</div>--}}
                    {{--</a>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="row">--}}
                {{--<div class="col s4">--}}
                    {{--<a href="testimonial.html" class="button-link">--}}
                        {{--<div class="menu-link">--}}
                            {{--<div class="icon">--}}
                                {{--<i class="fa fa-support"></i>--}}
                            {{--</div>--}}
                            {{--Testimonial--}}
                        {{--</div>--}}
                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="col s4">--}}
                    {{--<a href="about-us.html" class="button-link">--}}
                        {{--<div class="menu-link">--}}
                            {{--<div class="icon">--}}
                                {{--<i class="fa fa-user"></i>--}}
                            {{--</div>--}}
                            {{--About Us--}}
                        {{--</div>--}}
                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="col s4">--}}
                    {{--<a href="contact.html" class="button-link">--}}
                        {{--<div class="menu-link">--}}
                            {{--<div class="icon">--}}
                                {{--<i class="fa fa-envelope-o"></i>--}}
                            {{--</div>--}}
                            {{--Contact--}}
                        {{--</div>--}}
                    {{--</a>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="row">--}}
                {{--<div class="col s4">--}}
                    {{--<a href="setting.html" class="button-link">--}}
                        {{--<div class="menu-link">--}}
                            {{--<div class="icon">--}}
                                {{--<i class="fa fa-cog"></i>--}}
                            {{--</div>--}}
                            {{--Settings--}}
                        {{--</div>--}}
                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="col s4">--}}
                    {{--<a href="login.html" class="button-link">--}}
                        {{--<div class="menu-link">--}}
                            {{--<div class="icon">--}}
                                {{--<i class="fa fa-sign-in"></i>--}}
                            {{--</div>--}}
                            {{--Login--}}
                        {{--</div>--}}
                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="col s4">--}}
                    {{--<a href="register.html" class="button-link">--}}
                        {{--<div class="menu-link">--}}
                            {{--<div class="icon">--}}
                                {{--<i class="fa fa-user-plus"></i>--}}
                            {{--</div>--}}
                            {{--Register--}}
                        {{--</div>--}}
                    {{--</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
</div>
{{--</div>--}}
<!-- end menu -->
=======
>>>>>>> b8424fc0ea9240100e8be9266f224115118d36dc


<!-- shop single -->
<div class="pages section">
    <div class="container">
        <div class="shop-single">
            <img src="{{'/uploads/goodsimg/'.$data['goods_img'] }}" alt="">
            <h5>{{$data['goods_name']}}</h5>
            <div class="price">${{$data['goods_price']}} <span>${{$data['goods_bzprice']}}</span></div>
            <p>{{$data['goods_desc']}}</p>
            <button type="button" class="btn button-default" id="btu" goods_id="{{$data->goods_id}}">加入购物车</button>
        </div>
    </div>

</div>
<!-- end shop single -->
@endsection

<!-- scripts -->
<script src="js/jquery.min.js"></script>
    <script>
        $(function(){
            $('#btu').click(function(){
                var data={};
                var id = $(this).attr('goods_id');
                data.id=id;
                var url = "cart";
                $.ajax({
                    type: "post",
                    data: data,
                    dataType: "json",
                    url: url,
                    success: function (data) {
                      alert(data.msg)
                    }
                })
            })

        })
            </script>
</body>
</html>