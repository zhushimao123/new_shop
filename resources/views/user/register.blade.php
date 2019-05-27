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
            {{--<li><a href="/contact"><i class="fa fa-envelope-o"></i>Contact Us</a></li>--}}
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
<!-- end side nav right-->

<!-- navbar bottom -->
<div class="navbar-bottom">
    <div class="row">
        <div class="col s2">
            <a href="/"><i class="fa fa-home"></i></a>
        </div>
        <div class="col s2">
            <a href="/wish"><i class="fa fa-heart"></i></a>
        </div>
        <div class="col s4">
            <div class="bar-center">
                <a href="/cartdet"><i class="fa fa-shopping-basket"></i></a>
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




<!-- register -->
<div class="pages section">
    <div class="container">
        <div class="pages-head">
            <h3>REGISTER</h3>
        </div>
        <div class="register">
            <div class="row">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="col s12">
                    <div class="input-field">
                        <input type="text" class="validate" placeholder="NAME" name="user_name" id="user_name" required>
                    </div>
                    <div class="input-field">
                        <input type="email" placeholder="EMAIL" class="validate" name="user_email" id="user_email" required>
                    </div>
                    <div class="input-field">
                        <input type="password" placeholder="PASSWORD" class="validate" name="user_pwd" id="user_pwd" required>
                    </div>
                    <div class="btn button-default" id="butt">REGISTER</div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end register -->
@endsection



<!-- scripts -->
<script src="js/jquery.min.js"></script>


</body>
</html>
<script>
    $(function () {
        $('#butt').click(function () {
            var user_name=$('#user_name').val();
            var user_email=$('#user_email').val();
            var user_pwd=$('#user_pwd').val();
            if(user_name==''){
                alert('用户名不为空哦');
                return false;
            }
            if(user_email==''){
                alert('邮箱不为空哦');
                return false;
            }
            if(user_pwd==''){
                alert('密码不为空哦');
                return false;
            }
            $.ajax({
<<<<<<< HEAD
                url:"http://them.mneddx.com/regdo",
=======
                url:"/regdo",
>>>>>>> 3bd5b49886da64e9c4370b7dbc986090da28fb06
                data:{user_name:user_name,user_email:user_email,user_pwd:user_pwd},
                dataType:'json',
                type:'post',
                async:false,
                success:function (res) {
                    console.log(res);
                    if(res.code==2){
                        alert(res.msg);
                    }else{
                        alert('注册成功');
<<<<<<< HEAD
                        location.href="http://them.mneddx.com/login";
=======
                        location.href="/login";
>>>>>>> 3bd5b49886da64e9c4370b7dbc986090da28fb06
                    }
                }
            });
            return false;
        })
    })
</script>