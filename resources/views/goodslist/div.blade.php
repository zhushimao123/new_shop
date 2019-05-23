<div class="row">
    @foreach($goodsinfo as $k=> $v)
        <div class="col s6">
            <div class="content">
                <img src="{{'/uploads/goodsimg/'.$v->goods_img }}" alt="">
                <h6><a href="">{{$v -> goods_name}}</a></h6>
                <div class="price">
                    ${{$v-> goods_price}} <span>${{$v-> goods_bzprice}}</span>
                </div>
            </div>
        </div>
    @endforeach
</div>