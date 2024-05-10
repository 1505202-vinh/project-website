<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Coron-shop</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets\img\favicon.png">

		<!-- all css here -->
       {{-- <link rel="stylesheet" href="{{asset('assets\css\bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets\css\plugin.css')}}">
        <link rel="stylesheet" href="{{asset('assets\css\bundle.css')}}">
        <link rel="stylesheet" href="{{asset('assets\css\style.css')}}">
        <link rel="stylesheet" href="{{asset('assets\css\responsive.css')}}">
        <script src="{{asset('assets\js\vendor\modernizr-2.8.3.min.js')}}"></script> --}}
        @include('home.layouts_home.css');
    </head>
    <body>
            <!-- Add your site or application content here -->

            <!--pos page start-->
            <div class="pos_page">
                <div class="container">
                   <!--pos page inner-->
                    <div class="pos_page_inner">
                       <!--header area -->
                        <div class="header_area">
                            <!--header top-->
                            <div class="header_top">
                               <div class="row align-items-center">
                                    <div class="col-lg-6 col-md-6">
                                       <div class="switcher">
                                            <ul>
                                                <li class="languages"><a href="#"><img src="assets\img\logo\fontlogo.jpg" alt=""> English <i class="fa fa-angle-down"></i></a>
                                                    <ul class="dropdown_languages">
                                                        <li><a href="#"><img src="assets\img\logo\fontlogo.jpg" alt=""> English</a></li>
                                                        <li><a href="#"><img src="assets\img\logo\fontlogo2.jpg" alt=""> French </a></li>
                                                    </ul>
                                                </li>

                                                <li class="currency"><a href="#"> Currency : $ <i class="fa fa-angle-down"></i></a>
                                                    <ul class="dropdown_currency">
                                                        <li><a href="#"> Dollar (USD)</a></li>
                                                        <li><a href="#"> Euro (EUR)  </a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="header_links">
                                            <ul>
                                                @if(Auth::check())
                                                <li style="color:red;margin:auto; margin-right:210;"><b>Hello {{Auth::user()->name}}</b> </li>
                                                @endif
                                                <li><a href="{{route('cart')}}" title="My cart">My cart</a></li>

                                                @if(! Auth::check())

                                                <li><a href="{{ route('login') }}"title="Login">Login</a></li>
                                                <li><a href="{{ route('register') }}"title="Register">Register</a></li>
                                                @else
                                                <li><a href="my-account.html" title="My account">My account</a></li>
                                                <li><a href="{{ route('userlogout') }}"title="Logout">Logout</a></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                               </div>
                            </div>
                            <!--header top end-->

                            <!--header middel-->
                            <div class="header_middel">
                                <div class="row align-items-center">
                                    <div class="col-lg-3 col-md-3">
                                        <div class="logo">
                                            <a href="index.html"><img src="assets\img\logo\logo.jpg.png" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-9">
                                        <div class="header_right_info">
                                            <div class="search_bar">
                                                <form action="">
                                                    <input name="keySearch" placeholder="Search..." type="text" required>
                                                    <button type="submit"><i class="fa fa-search"></i></button>
                                                </form>
                                            </div>
                                            <div class="shopping_cart">
                                                <a href="#"><i class="fa fa-shopping-cart"></i> {{($cart == null)?'0 Items':count($cart).' Items'}} <i class="fa fa-angle-down"></i></a>

                                                <!--mini cart-->
                                                <div class="mini_cart">

                                                    @if($cart == null)
                                                        <p style="text-align:center;color:red;">Giỏ hàng trống</p>
                                                    @else
                                                    @foreach($cart as $row)

                                                    <div class="cart_item">
                                                       <div class="cart_img">
                                                           <a href="#"><img src="storage/{{$row['image']}}" alt=""></a>
                                                       </div>
                                                        <div class="cart_info">
                                                            <a href="#">{{$row['name']}}</a>
                                                            <span class="cart_price">{{number_format($row['price']).' VNĐ'}}</span>
                                                            <span class="quantity">Qty: {{$row['quantity']}}</span>
                                                        </div>
                                                        <div class="cart_remove">
                                                            <a title="Remove this item" href="{{route('cartDestroyHome',$row['id'])}}"><i class="fa fa-times-circle"></i></a>
                                                        </div>
                                                    </div>

                                                    @endforeach
                                                    {{-- <div class="shipping_price">
                                                        <span> Shipping </span>
                                                        <span>  $7.00  </span>
                                                    </div> --}}
                                                    <div class="total_price">
                                                        <span> Total </span>
                                                        <span class="prices">  {{number_format($total).' VNĐ'}}  </span>
                                                    </div>
                                                    <div class="cart_button">
                                                        <a href="{{route('cart')}}"> Check out</a>
                                                    </div>
                                                    @endif
                                                </div>
                                                <!--mini cart end-->
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!--header middel end-->
                            <div class="header_bottom">
                                <div class="row">
                                        <div class="col-12">
                                            <div class="main_menu_inner">
                                                <div class="main_menu d-none d-lg-block">
                                                    <nav>
                                                        <ul>
                                                            <li class="active"><a href="{{route('home')}}">Home</a>
                                                            </li>
                                                             <li><a href="blog.html">blog</a>
                                                                <div class="mega_menu jewelry">
                                                                    <div class="mega_items jewelry">
                                                                        <ul>
                                                                            <li><a href="blog-details.html">blog details</a></li>
                                                                            <li><a href="blog-fullwidth.html">blog fullwidth</a></li>
                                                                            <li><a href="blog-sidebar.html">blog sidebar</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li><a href="contact.html">contact us</a></li>

                                                        </ul>
                                                    </nav>
                                                </div>
                                                <div class="mobile-menu d-lg-none">
                                                    <nav>
                                                        <ul>
                                                            <li class="active"><a href="{{route('home')}}">Home</a>
                                                            </li>
                                                            <li><a href="blog.html">blog</a>
                                                                <div class="mega_menu jewelry">
                                                                    <div class="mega_items jewelry">
                                                                        <ul>
                                                                            <li><a href="blog-details.html">blog details</a></li>
                                                                            <li><a href="blog-fullwidth.html">blog fullwidth</a></li>
                                                                            <li><a href="blog-sidebar.html">blog sidebar</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li><a href="contact.html">contact us</a></li>

                                                        </ul>
                                                    </nav>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <!--header end -->
                        <!--breadcrumbs area start-->
                        <div class="breadcrumbs_area">
                            <div class="row">
                                    <div class="col-12">
                                        <div class="breadcrumb_content">
                                            <ul>
                                                <li><a href="index.html">home</a></li>
                                                <li><i class="fa fa-angle-right"></i></li>
                                                <li>Shop</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <!--breadcrumbs area end-->

                        <!--pos home section-->
                        <div class=" pos_home_section">
                            <div class="row pos_home">
                                    <div class="col-lg-3 col-md-12">
                                       <!--layere categorie"-->
                                          <div class="sidebar_widget shop_c">
                                                <div class="categorie__titile">
                                                    <h4>Categories</h4>
                                                </div>
                                                <div class="layere_categorie">
                                                    <ul>
                                                        <form action="">
                                                            @foreach($category as $row)
                                                            <li>
                                                                <input id="{{$row->id}}" type="checkbox" name="search" value={{$row->id}}>
                                                                <label for="{{$row->id}}">{{$row->name}}</label>
                                                            </li>
                                                            @endforeach
                                                        </form>
                                                        {{-- <li>
                                                            <input id="acces" type="checkbox">
                                                            <label for="acces">Accessories<span>(1)</span></label>
                                                        </li>
                                                        <li>
                                                            <input id="dress" type="checkbox">
                                                            <label for="dress">Dresses <span>(2)</span></label>
                                                        </li>
                                                        <li>
                                                            <input id="tops" type="checkbox">
                                                            <label for="tops">Tops<span>(3)</span></label>
                                                        </li>
                                                        <li>
                                                            <input id="bag" type="checkbox">
                                                            <label for="bag">HandBags<span>(4)</span></label>
                                                        </li> --}}
                                                    </ul>
                                                </div>
                                            </div>
                                        <!--layere categorie end-->

                                        <!--color area start-->
                                        <div class="sidebar_widget color">
                                            <h2>Color</h2>
                                             <div class="widget_color">
                                                <ul>

                                                    <li><a href="#">Black <span>(10)</span></a></li>

                                                    <li><a href="#">Orange <span>(12)</span></a></li>

                                                    <li> <a href="#">Blue <span>(14)</span></a></li>

                                                    <li><a href="#">Yellow <span>(15)</span></a></li>

                                                    <li><a href="#">pink <span>(16)</span></a></li>

                                                    <li><a href="#">green <span>(11)</span></a></li>

                                                </ul>
                                            </div>
                                        </div>
                                        <!--color area end-->

                                        <!--price slider start-->
                                        <div class="sidebar_widget price">
                                            <h2>Price</h2>
                                            <div class="ca_search_filters">

                                                <input type="text" name="text" id="amount">
                                                <div id="slider-range"></div>
                                            </div>
                                        </div>
                                        <!--price slider end-->

                                        <!--wishlist block start-->
                                        <div class="sidebar_widget wishlist mb-30">
                                            <div class="block_title">
                                                <h3><a href="#">Wishlist</a></h3>
                                            </div>
                                            <div class="cart_item">
                                               <div class="cart_img">
                                                   <a href="#"><img src="assets\img\cart\cart.jpg" alt=""></a>
                                               </div>
                                                <div class="cart_info">
                                                    <a href="#">lorem ipsum dolor</a>
                                                    <span class="cart_price">$115.00</span>
                                                    <span class="quantity">Qty: 1</span>
                                                </div>
                                                <div class="cart_remove">
                                                    <a title="Remove this item" href="#"><i class="fa fa-times-circle"></i></a>
                                                </div>
                                            </div>
                                            <div class="cart_item">
                                               <div class="cart_img">
                                                   <a href="#"><img src="assets\img\cart\cart2.jpg" alt=""></a>
                                               </div>
                                                <div class="cart_info">
                                                    <a href="#">Quisque ornare dui</a>
                                                    <span class="cart_price">$105.00</span>
                                                    <span class="quantity">Qty: 1</span>
                                                </div>
                                                <div class="cart_remove">
                                                    <a title="Remove this item" href="#"><i class="fa fa-times-circle"></i></a>
                                                </div>
                                            </div>
                                            <div class="block_content">
                                                <p>2  products</p>
                                                <a href="#">» My wishlists</a>
                                            </div>
                                        </div>
                                        <!--wishlist block end-->

                                        <!--popular tags area-->
                                        <div class="sidebar_widget tags  mb-30">
                                            <div class="block_title">
                                                <h3>popular tags</h3>
                                            </div>
                                            <div class="block_tags">
                                                <a href="#">ipod</a>
                                                <a href="#">sam sung</a>
                                                <a href="#">apple</a>
                                                <a href="#">iphone 5s</a>
                                                <a href="#">superdrive</a>
                                                <a href="#">shuffle</a>
                                                <a href="#">nano</a>
                                                <a href="#">iphone 4s</a>
                                                <a href="#">canon</a>
                                            </div>
                                        </div>
                                        <!--popular tags end-->

                                        <!--newsletter block start-->
                                        <div class="sidebar_widget newsletter mb-30">
                                            <div class="block_title">
                                                <h3>newsletter</h3>
                                            </div>
                                            <form action="#">
                                                <p>Sign up for your newsletter</p>
                                                <input placeholder="Your email address" type="text">
                                                <button type="submit">Subscribe</button>
                                            </form>
                                        </div>
                                        <!--newsletter block end-->

                                        <!--special product start-->
                                        <div class="sidebar_widget special">
                                            <div class="block_title">
                                                <h3>Special Products</h3>
                                            </div>
                                            <div class="special_product_inner mb-20">
                                                <div class="special_p_thumb">
                                                    <a href="single-product.html"><img src="assets\img\cart\cart3.jpg" alt=""></a>
                                                </div>
                                                <div class="small_p_desc">
                                                    <div class="product_ratting">
                                                       <ul>
                                                           <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                           <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                           <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                           <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                           <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                       </ul>
                                                   </div>
                                                    <h3><a href="single-product.html">Lorem ipsum dolor</a></h3>
                                                    <div class="special_product_proce">
                                                        <span class="old_price">$124.58</span>
                                                        <span class="new_price">$118.35</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="special_product_inner">
                                                <div class="special_p_thumb">
                                                    <a href="single-product.html"><img src="assets\img\cart\cart18.jpg" alt=""></a>
                                                </div>
                                                <div class="small_p_desc">
                                                    <div class="product_ratting">
                                                       <ul>
                                                           <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                           <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                           <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                           <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                           <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                       </ul>
                                                   </div>
                                                    <h3><a href="single-product.html">Printed Summer</a></h3>
                                                    <div class="special_product_proce">
                                                        <span class="old_price">$124.58</span>
                                                        <span class="new_price">$118.35</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--special product end-->


                                    </div>
                                    <div class="col-lg-9 col-md-12">
                                        <!--banner slider start-->
                                        <div class="banner_slider mb-35">
                                            <img src="{{asset('assets/img/banner/LAPGAMING.png')}}" alt="">
                                        </div>
                                        <!--banner slider start-->

                                        <!--shop toolbar start-->
                                        <div class="shop_toolbar mb-35">

                                            <div class="list_button">
                                                <ul class="nav" role="tablist">
                                                    <li>
                                                        <a class="active" data-toggle="tab" href="#large" role="tab" aria-controls="large" aria-selected="true"><i class="fa fa-th-large"></i></a>
                                                    </li>
                                                    <li>
                                                        <a data-toggle="tab" href="#list" role="tab" aria-controls="list" aria-selected="false"><i class="fa fa-th-list"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            {{-- <div class="page_amount">
                                                <p>Showing 1–9 of 21 results</p>
                                            </div> --}}

                                            <div class="select_option">
                                                <form action="">
                                                    <label>Sort By</label>
                                                    <select name="orderbys" id="short">
                                                        <option selected="" value="0">Position</option>
                                                        <option value="1">Price: Lowest</option>
                                                        <option value="2">Price: Highest</option>
                                                        <option value="4">Sort by price:low</option>
                                                        <option value="5">Product Name: A</option>
                                                        <option value="7">Product Name: Z</option>

                                                    </select>
                                                    <button type="submit" style="border:none;height:20px;background:none;color:red;" >OK</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!--shop toolbar end-->

                                        <!--shop tab product-->
                                        <div class="shop_tab_product">
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="large" role="tabpanel">
                                                    <div class="row">
                                                        @foreach($dataProduct as $row)
                                                        <div class="col-lg-4 col-md-6">
                                                            <div class="single_product">
                                                                <div class="product_thumb">
                                                                   <a href="{{route('infoProduct',$row->id)}}"><img width="227px" height="227px" src="{{asset('storage/'.$row->image)}}" alt=""></a>
                                                                   <div class="img_icone">
                                                                       <img src="assets\img\cart\span-new.png" alt="">
                                                                   </div>
                                                                   <div class="product_action">
                                                                       <a href="{{route('cartCreate',$row->id)}}"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                                   </div>
                                                                </div>
                                                                <div class="product_content">
                                                                    <span class="product_price">{{number_format($row->price).' VNĐ'}}</span>
                                                                    <h3 class="product_title"><a href="{{route('infoProduct',$row->id)}}">{{$row->name}}</a></h3>
                                                                </div>
                                                                <div class="product_info">
                                                                    <ul>
                                                                        <li><a href="#" title=" Add to Wishlist ">Add to Wishlist</a></li>
                                                                        <li><a href="" data-id="{{$row->id}}" class="viewProduct" data-toggle="modal" data-target="#modal_box" title="Quick view">View Detail</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="list" role="tabpanel">
                                                    @foreach($dataProduct as $row)
                                                        <div class="product_list_item mb-35">
                                                            <div class="row align-items-center">
                                                                <div class="col-lg-4 col-md-6 col-sm-6">
                                                                    <div class="product_thumb">
                                                                       <a href="{{route('infoProduct',$row->id)}}"><img src="{{asset('storage/'.$row->image)}}" alt=""></a>
                                                                       <div class="img_icone">
                                                                           <img src="assets\img\cart\span-new.png" alt="">
                                                                       </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-8 col-md-6 col-sm-6">
                                                                    <div class="list_product_content">
                                                                       <div class="product_ratting">
                                                                           <ul>
                                                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                                           </ul>
                                                                       </div>
                                                                        <div class="list_title">
                                                                            <h3><a href="#">{{$row->name}}</a></h3>
                                                                        </div>
                                                                        <p class="design">{{$row->info}}</p>

                                                                        <p class="compare">
                                                                            <input id="select2" type="checkbox">
                                                                            <label for="select2">Select to compare</label>
                                                                        </p>
                                                                        <div class="content_price">
                                                                            <span>{{number_format($row->price).' VNĐ'}}</span>
                                                                            <span class="old-price">{{number_format($row->price-500000).' VNĐ'}}</span>
                                                                        </div>
                                                                        <div class="add_links">
                                                                            <ul>
                                                                                <li><a href="{{route('cartCreate',$row->id)}}" title="add to cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                                                                                <li><a href="#" title="add to wishlist"><i class="fa fa-heart" aria-hidden="true"></i></a></li>

                                                                                <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach


                                                </div>

                                            </div>
                                        </div>
                                        <!--shop tab product end-->

                                        <!--pagination style start-->
                                        <div class="pagination_style">
                                            <div class="item_page">
                                                <form action="" method="get">

                                                    <label for="page_select">show</label>

                                                        <select id="page_select" name="pagi">

                                                            <option value="6"{{$dataProduct->perPage()==6?'selected':''}}><button type="submit">6</button></option>
                                                            <option value="9" {{$dataProduct->perPage()==9?'selected':''}}>9</option>
                                                            <option value="12"{{$dataProduct->perPage()==12?'selected':''}}>12</option>
                                                        </select>
                                                        <span>Products by page</span>


                                                    <button type="submit" style="border:none;height:48px;background:none;color:red;" >OK</button>
                                                </form>
                                            </div>
                                            <div class="page_number">
                                                {{-- <span>Pages: </span>
                                                <ul>
                                                    <li>«</li>
                                                    <li class="current_number">1</li>
                                                    <li><a href="#">2</a></li>
                                                    <li>»</li>
                                                </ul> --}}
                                                {{$dataProduct->links()}}
                                            </div>
                                        </div>
                                        <!--pagination style end-->
                                    </div>
                                </div>
                        </div>
                        <!--pos home section end-->
                    </div>
                    <!--pos page inner end-->
                </div>
            </div>
            <!--pos page end-->

            <!--footer area start-->
            <div class="footer_area">
                <div class="footer_top">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="footer_widget">
                                    <h3>About us</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <div class="footer_widget_contect">
                                        <p><i class="fa fa-map-marker" aria-hidden="true"></i>  19 Interpro Road Madison, AL 35758, USA</p>

                                        <p><i class="fa fa-mobile" aria-hidden="true"></i> (012) 234 432 3568</p>
                                        <a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i> Contact@plazathemes.com </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="footer_widget">
                                    <h3>My Account</h3>
                                    <ul>
                                        <li><a href="#">Your Account</a></li>
                                        <li><a href="#">My orders</a></li>
                                        <li><a href="#">My credit slips</a></li>
                                        <li><a href="#">My addresses</a></li>
                                        <li><a href="#">Login</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="footer_widget">
                                    <h3>Informations</h3>
                                    <ul>
                                        <li><a href="#">Specials</a></li>
                                        <li><a href="#">Our store(s)!</a></li>
                                        <li><a href="#">My credit slips</a></li>
                                        <li><a href="#">Terms and conditions</a></li>
                                        <li><a href="#">About us</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="footer_widget">
                                    <h3>extras</h3>
                                    <ul>
                                        <li><a href="#"> Brands</a></li>
                                        <li><a href="#"> Gift Vouchers </a></li>
                                        <li><a href="#"> Affiliates </a></li>
                                        <li><a href="#"> Specials </a></li>
                                        <li><a href="#"> Privacy policy </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer_bottom">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6">
                                <div class="copyright_area">
                                    <ul>
                                        <li><a href="#"> about us </a></li>
                                        <li><a href="#">  Customer Service  </a></li>
                                        <li><a href="#">  Privacy Policy  </a></li>
                                    </ul>
                                    <p>Copyright &copy; 2018 <a href="#">Pos Coron</a>. All rights reserved. </p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="footer_social text-right">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                        <li><a class="pinterest" href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>

                                        <li><a href="#"><i class="fa fa-wifi" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--footer area end-->


             <!-- modal area start -->
           <div class="modal fade" id="modal_box" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal_body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 col-sm-12">
                                        <div class="modal_tab">
                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                                    <div class="modal_tab_img">
                                                        <a href="#" class="imgone"></a>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="tab2" role="tabpanel">
                                                    <div class="modal_tab_img">
                                                        <a href="#" class="imgone"></a>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="tab3" role="tabpanel">
                                                    <div class="modal_tab_img">
                                                        <a href="#" class="imgone"></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal_tab_button">
                                                <ul class="nav product_navactive" role="tablist">
                                                    <li>
                                                        <a class="nav-link active imgone" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false"><img src="assets\img\cart\cart17.jpg" alt=""></a>
                                                    </li>
                                                    <li>
                                                         <a class="nav-link imgone" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false"><img src="assets\img\cart\cart18.jpg" alt=""></a>
                                                    </li>
                                                    <li>
                                                       <a class="nav-link button_three imgone" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false"><img src="assets\img\cart\cart19.jpg" alt=""></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-12">
                                        <div class="modal_right">
                                            <div class="modal_title mb-10">
                                                <h2 id="demo">Tên </h2>
                                            </div>
                                            <div class="modal_price mb-10">
                                                <span class="new_price">$64.99</span>
                                                <span class="old_price">$78.99</span>
                                            </div>
                                            {{-- <div class="modal_content mb-10">
                                                <p>Short-sleeved blouse with feminine draped sleeve detail.</p>
                                            </div> --}}
                                            <div class="modal_size mb-15">
                                               <h2>Color</h2>
                                                <ul>
                                                    <li><a href="#"></a></li>
                                                    <li><a href="#"></a></li>
                                                    <li><a href="#"></a></li>
                                                    <li><a href="#"></a></li>
                                                    <li><a href="#"></a></li>
                                                </ul>
                                            </div>
                                            <div class="modal_add_to_cart mb-15">
                                                <form action="{{route('cartCreate',$row->id)}}">
                                                    <input min="0" max="100"  value="1" type="number">
                                                    <button type="submit">add to cart</button>
                                                </form>
                                            </div>
                                            <div class="modal_description mb-15">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
                                            </div>
                                            <div class="modal_social">
                                                <h2>Share this product</h2>
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

          <!-- modal area end -->



		<!-- all js here -->
        {{-- <script src="{{asset('assets\js\vendor\jquery-1.12.0.min.js')}}"></script>
        <script src="{{asset('assets\js\popper.js')}}"></script>
        <script src="{{asset('assets\js\bootstrap.min.js')}}"></script>
        <script src="{{asset('assets\js\ajax-mail.js')}}"></script>
        <script src="{{asset('assets\js\plugins.js')}}"></script>
        <script src="{{asset('assets\js\main.js')}}"></script> --}}
        @include('home.layouts_home.js');
        {{-- jss --}}
          @include('admin.layouts.js')
          <script>
            $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
            $('.viewProduct').click(function(){
                let id = $(this).data('id');
                $.ajax({
                url: "{{route('viewDetail')}}",
                type: 'GET',
                data: {id},
                // contentType: 'application/json',

                success: function(response){
                // console.log(response);
                $('#demo').html(`<h1>${response.name}</h1>`);
                $('.imgone').html(`<img  src="storage/${response.image}">`);
                $('.new_price').html(`${response.price.toLocaleString('en-US')}`+" VNĐ");
                $('.old_price').html(`${(response.price-500000).toLocaleString('en-US')}`+" VNĐ");
                $('.modal_description').html(`<p>${response.info}</p>`);

             }
            });
            })
          </script>
          {{-- <script>
            $(document).ready(function(){
                $.ajax({
                url: "{{ route('viewDetail',12) }}",
                type: 'GET',
                data: {data: {"id":$("#id").find(':selected').data('id')},},
                // contentType: 'application/json',

                success: function(response){
                // console.log(response);
                $('#demo').html(`<h1>${response.name}</h1>`);
             }
            });
            })

        </script> --}}

    </body>
</html>
