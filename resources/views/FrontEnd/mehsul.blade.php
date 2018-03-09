@extends('FrontEnd.layout.master')
@section('title',$mehsul->mehsul_adi)
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="#"><span  aria-hidden="true"></span><i class="fas fa-home"></i>AnaSehife</a></li>
               @foreach($kateqoriler as $kateqori)

                   <li><a href="#">{{$kateqori->kateqori_adi}}</a></li>
                   @endforeach
                <li class="active">{{$mehsul->mehsul_adi}}</li>
            </ol>
        </div>
    </div>
    <section class="main-container col1-layout">
        <div class="main" id="wrapper">
            <div class="container">
                <div class="row">
                    <div class="codepen-container">
                        <div class="content-container">
                            <div class="row">
                                <form action="{{route('sebet.add')}}" method="post" id="product">
                                    {{csrf_field()}}

                                    <div class="left-container col-md-5 col-sm-5 col-md-offset-1 col-xs-12">

                                        <div class="triangle-topleft">
                                            <div class="back-arrow" id="buy-toaster"></div>
                                        </div>
                                        <div class="product-image--container">
                                            <div class="imgParent">
                                                <img class="img-responsive product-image--featured " id="featured" src="{{count($mehsul->photos) && $mehsul->photos[0]->img_name!=null ?
                                         asset('/uploads/mehsullar/'.$mehsul->photos[0]->img_name) :'http://via.placeholder.com/300x200?text=mehsulShekli'}}"
                                                     alt=""  >
                                            </div>

                                            <ul class="product-image--list">
                                                @foreach( $mehsul->photos as $image )
                                                    <li>
                                                        <img class="img-responsive item-selected product-image--item " src="{{$image->img_name!=null ?
                                 asset('/uploads/mehsullar/'.$image->img_name) :'http://via.placeholder.com/300x200?text=mehsulShekli'}}" alt="">
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>

                                    </div>

                                    <div class="right-container col-md-6 col-sm-6 col-xs-12">
                                        <div class="rightCon">
                                            <div>
                                                <h1 class="text-left">{{$mehsul->mehsul_adi}}</h1>
                                            </div>
                                            <div class="price-block">
                                                <div class="price-box text-left">
                                                    <h3 class="text-left">Qiymet</h3>
                                                    <p>{{$mehsul->qiymeti}}</p>
                                                </div>
                                            </div>

                                            <div class="info-orther text-left">
                                                <p>Mehsul: Yeni</p>
                                            </div>

                                            <div class="short-description">
                                                <h2 class="text-left">Qisa Melumat</h2>
                                                <p class="text-left">{{$mehsul->aciqlama}}</p>
                                            </div>
                                            <div>
                                                <div class="form-option">
                                                    <div class="add-to-box">
                                                        <form action="{{route('sebet.add')}}" method="post" id="product">
                                                            {{csrf_field()}}
                                                            <div class="add-to-cart">

                                                                <input type="hidden" name="id" value="{{$mehsul->id}}" >

                                                                <span class="sebetSpan">
                                                                <i class="fa fa-shopping-cart" ></i>
                                                                <button class="shopingCart hover">Sebete at</button>
                                                            </span>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>

                    <div class="product-collateral col-lg-12 col-sm-12 col-xs-12">
                        <div class="add_info">
                            <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                                <li class="active"> <a href="#product_tabs_description" data-toggle="tab"> Mehsul haqqinda melumat </a> </li>
                            </ul>
                            <div id="productTabContent" class="tab-content">
                                <div class="tab-pane fade in active" id="product_tabs_description">
                                    <div class="std">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus, consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in imperdiet ligula euismod eget. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam erat mi, rutrum at sollicitudin rhoncus, ultricies posuere erat. Duis convallis, arcu nec aliquam consequat, purus felis vehicula felis, a dapibus enim lorem nec augue.</p>
                                        <p> Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada tincidunt. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer enim purus, posuere at ultricies eu, placerat a felis. Suspendisse aliquet urna pretium eros convallis interdum. Quisque in arcu id dui vulputate mollis eget non arcu. Aenean et nulla purus. Mauris vel tellus non nunc mattis lobortis.</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="product_tabs_tags">
                                    <div class="box-collateral box-tags">
                                        <div class="tags">
                                            <form id="addTagForm" action="#" method="get">
                                                <div class="form-add-tags">
                                                    <label for="productTagName">Add Tags:</label>
                                                    <div class="input-box">
                                                        <input class="input-text" name="productTagName" id="productTagName" type="text">
                                                        <button type="button" title="Add Tags" class=" button btn-add" onClick="submitTagForm()"> <span>Add Tags</span> </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <p class="note">Use spaces to separate tags. Use single quotes (') for phrases.</p>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </section>
    @endsection