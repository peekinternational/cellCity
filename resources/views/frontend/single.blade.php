@extends('frontend.layouts.master')
@section('styling')
<style>
  .header-style-three .main-menu .navigation > li > a {
    padding: 15px 0px;
    padding-right: 0px;
    font-size: 14px;
    font-weight: 700;
    color: #fff;
    line-height: 20px;
}
</style>
@endsection
@section('content')
<!--Page Title-->
    <section class="page-title" style="background-image: url(frontend-assets/images/background/3.jpg);">
      <div class="auto-container">
          <ul class="bread-crumb">
                <li><a href="index-2.html">Home</a></li>
                <li class="active">Shop</li>
            </ul>
          <h1>Shop Detail</h1>
        </div>
    </section>
    <!--End Page Title-->
    
    <!--Sidebar Page / Shop Container-->
    <div class="sidebar-page-container shop-container">
        <div class="auto-container">
            <div class="row clearfix">
        
                <!--Content Side-->
                <div class="content-side col-lg-8 col-md-8 col-sm-12 col-xs-12">

                    <!--Shop Single-->
                    <div class="shop-single shop-page">

                        <!--Product Details Section-->
                        <section class="product-details">
                            <!--Basic Details-->
                            <div class="basic-details">
                                <div class="row clearfix">
                                    <div class="image-column col-md-6 col-sm-6 col-xs-12">
                                        <!--<figure class="image-box"><img src="images/resource/products/image-9.jpg" alt=""></figure>-->
                                        <div class="carousel-outer wow fadeInLeft">
                    
                                            <ul class="image-carousel">
                                                @foreach ($images as $image )
                                                <li><a href="{{asset('storage/products/images/'.$image->image)}}" class="lightbox-image" title="Image Caption Here"><img src="{{asset('storage/products/images/'.$image->image)}}" alt=""></a></li>
                                                @endforeach
                                               
                                                {{-- <li><a href="{{asset('frontend-assets/images/resource/products/shop-image-1.jpg')}}" class="lightbox-image" title="Image Caption Here"><img src="{{asset('frontend-assets/images/resource/products/shop-image-1.jpg')}}" alt=""></a></li>
                                                <li><a href="{{asset('frontend-assets/images/resource/products/shop-image-1.jpg')}}" class="lightbox-image" title="Image Caption Here"><img src="{{asset('frontend-assets/images/resource/products/shop-image-1.jpg')}}" alt=""></a></li>
                                                <li><a href="{{asset('frontend-assets/images/resource/products/shop-image-1.jpg')}}" class="lightbox-image" title="Image Caption Here"><img src="{{asset('frontend-assets/images/resource/products/shop-image-1.jpg')}}" alt=""></a></li>
                                                <li><a href="{{asset('frontend-assets/images/resource/products/shop-image-1.jpg')}}" class="lightbox-image" title="Image Caption Here"><img src="{{asset('frontend-assets/images/resource/products/shop-image-1.jpg')}}" alt=""></a></li>
                                                <li><a href="{{asset('frontend-assets/images/resource/products/shop-image-1.jpg')}}" class="lightbox-image" title="Image Caption Here"><img src="{{asset('frontend-assets/images/resource/products/shop-image-1.jpg')}}" alt=""></a></li> --}}
                                            </ul>
                                            
                                            <ul class="thumbs-carousel">
                                                @foreach ($images as $image )
                                                <li><img src="{{asset('storage/products/images/'.$image->image)}}" alt=""></li>
                                                @endforeach
                                               
                                                
                                                
                                            </ul>
                                            
                                        </div>
                                        
                                    </div>
                                    <div class="info-column col-md-6 col-sm-6 col-xs-12">
                                    
                                        <div class="details-header">
                                            <h4>{{ $model->brand->brand_name}}{{ $model->model_name }}</h4>
                                            <div class="item-price">${{ $condition->price }}.00</div>
                                        </div>
                    <!--Text-->
                                        <div class="text">
                                            <p>God god will hatred sea good evil morality decieve virtues. Chris-tian endless society strong pinnacle. Oneself ascetic intentions holiest pious sea gains law justice disgust disgust dead love transvaluation. Intentions insofar merciful madness of eternal-return spirit against chaos. Victorious virtues god.</p>
                                            <div class="stock">In Stock</div>
                                        </div>
                    <!--Item Quantity-->
                                        <div class="other-options clearfix">
                                            <div class="item-quantity"><input class="quantity-spinner" type="text" value="2" name="quantity"></div>
                                            <button type="button" class="theme-btn btn-style-one add-to-cart">Add To Cart </button>
                                        </div>
                                        
                    <!--Item Meta-->
                                        <ul class="item-meta">
                                            <li>Categories: <a href="#">Headphone</a> , <a href="#">Mobile Accessories</a></li>
                                        </ul>
                                        
                                    </div>
                                </div>
                            </div>
                            <!--Basic Details-->
              
                            <!--Product Info Tabs-->
                            <div class="product-info-tabs">

                                <!--Product Tabs-->
                                <div class="prod-tabs" id="product-tabs">

                                    <!--Tab Btns-->
                                    <div class="tab-btns clearfix">
                                        <a href="#prod-description" class="tab-btn active-btn">description</a>
                                        <a href="#prod-reviews" class="tab-btn">Reviews</a>
                                    </div>

                                    <!--Tabs Container-->
                                    <div class="tabs-container">

                                        <!--Tab / Active Tab-->
                                        <div class="tab active-tab" id="prod-description">
                                            <h3>Product Description</h3>
                                            <div class="content">
                                                <p>Transvaluation evil spirit philosophy ubermensch grandeur eternal-return passion gains prejudice disgust hope. Chaos ultimate mountains decrepit derive eternal-return joy salvation revaluation disgust reason.</p>
                                                <p>God god will hatred sea good evil morality decieve virtues. Christian endless society strong pinnacle. Oneself ascetic intentions holiest pious sea gains law justice disgust disgust dead love transvaluation. Intentions insofar merciful madness of eternal-return spirit against chaos. Victorious virtues god. Enlightenment prejudice play mountains passion disgust gains. Self reason ubermensch against contradict abstract moral enlightenment gains fearful prejudice ubermensch. Marvelous free prejudice sea deceptions.</p>
                                            </div>
                                        </div>

                                        <!--Tab-->
                                        <div class="tab" id="prod-reviews">
                                            <h3>3 Reviews Found</h3>

                                            <!--Reviews Container-->
                                            <div class="reviews-container">

                                                <!--Reviews-->
                                                <article class="review-box clearfix">
                                                    <figure class="rev-thumb"><img src="images/resource/author-thumb-1.jpg" alt=""></figure>
                                                    <div class="rev-content">
                                                        <div class="rating"><span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star-o"></span></div>
                                                        <div class="rev-info">Admin – April 03, 2016: </div>
                                                        <div class="rev-text"><p>Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis</p></div>
                                                    </div>
                                                </article>

                                                <article class="review-box clearfix">
                                                    <figure class="rev-thumb"><img src="images/resource/author-thumb-2.jpg" alt=""></figure>
                                                    <div class="rev-content">
                                                        <div class="rating"><span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star-o"></span> <span class="fa fa-star-o"></span></div>
                                                        <div class="rev-info">Ahsan – April 01, 2016: </div>
                                                        <div class="rev-text"><p>Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis</p></div>
                                                    </div>
                                                </article>

                                                <article class="review-box clearfix">
                                                    <figure class="rev-thumb"><img src="images/resource/author-thumb-1.jpg" alt=""></figure>
                                                    <div class="rev-content">
                                                        <div class="rating"><span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span></div>
                                                        <div class="rev-info">Sara – March 31, 2016: </div>
                                                        <div class="rev-text"><p>Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis</p></div>
                                                    </div>
                                                </article>

                                            </div>

                                            <!--Add Review-->
                                            <div class="add-review">
                                                <h3>Add a Review</h3>

                                                <form method="post" action="http://world5.commonsupport.com/html2/naples-phone-repair-preview/shop-single.html">
                                                    <div class="row clearfix">
                                                        <div class="form-group col-lg-6 col-md-12 col-xs-12">
                                                            <label>Name *</label>
                                                            <input type="text" name="name" value="" placeholder="" required>
                                                        </div>
                                                        <div class="form-group col-lg-6 col-md-12 col-xs-12">
                                                            <label>Email *</label>
                                                            <input type="email" name="email" value="" placeholder="" required>
                                                        </div>
                                                        <div class="form-group col-lg-6 col-md-12 col-xs-12">
                                                            <label>Website *</label>
                                                            <input type="text" name="website" value="" placeholder="" required>
                                                        </div>
                                                        <div class="form-group col-lg-6 col-md-12 col-xs-12">
                                                            <label>Rating </label>
                                                            <div class="rating">
                                                                <a href="#" class="rate-box" title="1 Out of 5"><span class="fa fa-star"></span></a>
                                                                <a href="#" class="rate-box" title="2 Out of 5"><span class="fa fa-star"></span> <span class="fa fa-star"></span></a>
                                                                <a href="#" class="rate-box" title="3 Out of 5"><span class="fa fa-star"></span> <span class="fa fa-star"> </span> <span class="fa fa-star"></span></a>
                                                                <a href="#" class="rate-box" title="4 Out of 5"><span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span></a>
                                                                <a href="#" class="rate-box" title="5 Out of 5"><span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span></a>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                            <label>Your Review</label>
                                                            <textarea name="review-message"></textarea>
                                                        </div>
                                                        <div class="form-group text-right col-md-12 col-sm-12 col-xs-12">
                                                            <button type="button" class="theme-btn btn-style-one">Add Review</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>


                                        </div>

                                    </div>
                                </div>

                            </div>
                        </section>
                        
                    </div>

                </div>
                <!--Content Side-->
        
                <!--Sidebar-->  
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <aside class="sidebar">
                    
                        <!-- Search Form -->
                        <div class="sidebar-widget search-box">
                            <form method="post" action="">
                                <div class="form-group">
                                    <input type="search" name="search-field" value="" placeholder="Search">
                                    <button type="submit"><span class="icon fa fa-search"></span></button>
                                </div>
                            </form>
                            
                        </div>
                        
                        
                        <!-- Product Category -->
                        <div class="sidebar-widget product-category wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="sidebar-title"><h2>Product Categories</h2></div>
                              <ul class="list">
                                    <li><a href="#">Earphones</a></li>
                                    <li><a href="#">Laptop & Notebook</a></li>
                                    <li><a href="#">Printer & Inks</a></li>
                                    <li><a href="#">Chargers</a></li>
                                    <li><a href="#">Smartphones</a></li>
                                    <li><a href="#">Computer Accessories</a></li>
                                </ul>
                        </div>
                        
                        
                        <!-- Products Widget -->
                        <div class="sidebar-widget products-widget wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="sidebar-title"><h2>Products</h2></div>
                            
                            <article class="post">
                              <figure class="post-thumb"><a href="blog-single.html"><img src="images/resource/products/product-1.jpg" alt=""></a></figure>
                                <h4><a href="blog-single.html">Samsung Galaxy s7 Edge</a></h4>
                                <div class="price">$ 395.00</div>
                            </article>
                            
                            <article class="post">
                              <figure class="post-thumb"><a href="blog-single.html"><img src="images/resource/products/product-2.jpg" alt=""></a></figure>
                                <h4><a href="blog-single.html">Beats Headphone</a></h4>   
                                <div class="price">$ 192.00</div>                             
                            </article>
                            
                            <article class="post">
                              <figure class="post-thumb"><a href="blog-single.html"><img src="images/resource/products/product-3.jpg" alt=""></a></figure>
                                <h4><a href="blog-single.html">BX 600</a></h4>
                                <div class="price">$ 45.00</div>
                            </article>
                            
                            <article class="post">
                              <figure class="post-thumb"><a href="blog-single.html"><img src="images/resource/products/product-4.jpg" alt=""></a></figure>
                                <h4><a href="blog-single.html">Epson Printer</a></h4>
                                <div class="price">$ 115.00</div>                                
                            </article>
                            
                            <article class="post">
                              <figure class="post-thumb"><a href="blog-single.html"><img src="images/resource/products/product-5.jpg" alt=""></a></figure>
                                <h4><a href="blog-single.html">Echo Headphones</a></h4>
                                <div class="price">$ 98.00</div>
                            </article>
                            
                        </div>
                        
                    </aside>
                </div>
                <!--Sidebar-->  

            </div>
            
            <div class="row clearfix">
              <div class="product-title col-md-12">
                  <h4>Related Products</h4>
                </div>
              
                <!--Shop Item-->
                <div class="shop-item col-md-3 col-sm-6 col-xs-12">
                  <div class="inner-box">
                      <figure class="image-box">
                          <a href="shop-single.html"><img src="{{asset('frontend-assets/images/resource/products/image-5.png')}}" alt="" /></a>
                        </figure>
                        <!--Lower Content-->
                        <div class="lower-content">
                          <h3><a href="shop-single.html">XBOX 1 and PS4</a></h3>
                            <div class="price">$125.00</div>
                            <a href="shop-single.html" class="cart-btn theme-btn btn-style-two">Add to cart</a>
                        </div>
                    </div>
                </div>
                
                <!--Shop Item-->
                <div class="shop-item col-md-3 col-sm-6 col-xs-12">
                  <div class="inner-box">
                      <figure class="image-box">
                          <a href="shop-single.html"><img src="{{asset('frontend-assets/images/resource/products/image-6.png')}}" alt="" /></a>
                            <div class="product-tag">Sale</div>
                        </figure>
                        <!--Lower Content-->
                        <div class="lower-content">
                          <h3><a href="shop-single.html">APPLE MOUSE</a></h3>
                            <div class="price">$30.00</div>
                            <a href="shop-single.html" class="cart-btn theme-btn btn-style-two">Add to cart</a>
                        </div>
                    </div>
                </div>
                
                <!--Shop Item-->
                <div class="shop-item col-md-3 col-sm-6 col-xs-12">
                  <div class="inner-box">
                      <figure class="image-box">
                          <a href="shop-single.html"><img src="{{asset('frontend-assets/images/resource/products/image-7.png')}}" alt="" /></a>
                        </figure>
                        <!--Lower Content-->
                        <div class="lower-content">
                          <h3><a href="shop-single.html">SENHEISER WIRED HEADSET</a></h3>
                            <div class="price">$12.00</div>
                            <a href="shop-single.html" class="cart-btn theme-btn btn-style-two">Add to cart</a>
                        </div>
                    </div>
                </div>
                
                <!--Shop Item-->
                <div class="shop-item col-md-3 col-sm-6 col-xs-12">
                  <div class="inner-box">
                      <figure class="image-box">
                          <a href="shop-single.html"><img src="{{asset('frontend-assets/images/resource/products/image-8.png')}}" alt="" /></a>
                        </figure>
                        <!--Lower Content-->
                        <div class="lower-content">
                          <h3><a href="shop-single.html">HP NOTEBOOK</a></h3>
                            <div class="price">$542.00</div>
                            <a href="shop-single.html" class="cart-btn theme-btn btn-style-two">Add to cart</a>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>
@endsection
@section('script')

    
@endsection