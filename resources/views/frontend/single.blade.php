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
                <div class="content-side col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <!--Shop Single-->
                    <div class="shop-single shop-page">

                        <!--Product Details Section-->
                        <section class="product-details">
                            <!--Basic Details-->
                            <div class="basic-details">
                                <div class="row clearfix">
                                    <div class="image-column col-md-4 col-sm-4 col-xs-12">
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
                                    <div class="info-column col-md-5 col-sm-5 col-xs-12">
                                    
                                        <div class="details-header">
                                            <h2>{{ $model->brand->brand_name}}   {{ $model->model_name }}  {{$storage->storage}} - {{$color->color_name}} - {{$product->locked}} 
                                           
                                                @if($product->network == 4)
                                                   (GSM/CDMA + Lite)
                                                  @elseif($product->network == 3)
                                                  (GSM/CDMA)
                                                @elseif($product->network == 2)
                                                (GSM)
                                                @else

                                                @endif
                                           
                                            </h2>
                                            {{-- <div class="item-price">${{ $condition->price }}.00</div> --}}
                                        </div>
                                        <div class="product-brand">
                      <span>Works with:</span>
                      <div class="brand-images">
                        <div class="brand">
                          <img src="{{asset('frontend-assets/images/tmobile.svg')}}">
                        </div>
                        <div class="brand">
                          <img src="{{asset('frontend-assets/images/att.svg')}}">
                        </div>
                        <div class="brand">
                          <img src="{{asset('frontend-assets/images/verizon.svg')}}">
                        </div>
                      </div>
                    </div>

                    <ul class="features-list">
                      <li class="price">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 443.9 476.5" data-test="currency-icon" class="_2_hFKs4efXvyjTEZkKl7eo"><path d="M102.4 349.6c-9.7-10.3-25.3-10.9-36.3-2.6 34.6 48.9 91.5 81 155.9 81 74.3 0 138.6-42.7 170.2-104.8-12.3-7.7-28.6-4.6-37 7.5-30 43.5-80.2 69.5-134.1 69.5-44.9.1-88.2-18.3-118.7-50.6z" opacity=".3"></path><path d="M371.5 87.5c-4-4-10.4-4-14.4 0-1.4 1.4-1.6 3.2-2 5-.2 1-.7 1.9-.6 2.9.2 2.4.9 4.7 2.7 6.5 7.9 7.9 14.9 16.4 21.2 25.4C400.8 159.2 413 197.1 413 237c0 105.3-85.7 191-191 191S31 342.3 31 237 116.7 45.9 222 45.9c5.6 0 10.2-4.6 10.2-10.2s-4.6-10.2-10.2-10.2C105.4 25.6 10.6 120.4 10.6 237S105.4 448.4 222 448.4 433.4 353.6 433.4 237c0-56.5-22-109.6-61.9-149.5z"></path><path d="M237.5 220.2l-22.7-5.1c-15.3-3.6-24-13.4-24-26.8 0-12.2 11.2-25.1 32-25.1 13.3 0 23.5 3.9 34 13.2 2.4 1.9 5.2 2.9 7.9 2.9 6.3 0 11.5-5.3 11.5-11.5 0-3.3-1.3-6.3-3.9-8.9-11.1-10.2-22.8-16-36.9-18.2l-2.9-.4v-23.8c0-6-4.9-10.9-10.9-10.9s-10.9 4.9-10.9 10.9v24.7l-2.6.6c-25 5.6-41.1 24.6-41.1 48.3 0 24.8 15.5 42.2 43.6 48.9l21.8 5.1c20.8 4.7 25.2 16.8 25.2 26.1 0 17-14 27.1-37.3 27.1-12.3 0-25.5-5.7-37.4-16-2.6-3.1-5.8-4.7-9.2-4.7-6.5 0-11.8 5.2-11.8 11.6 0 3 1.3 6 3.6 8.6 11.5 12.1 26.2 20 42.4 22.8l2.8.5v24c0 6 4.9 10.9 10.9 10.9s10.9-4.9 10.9-10.9v-24.4l2.8-.5c32.1-5.6 46.5-28.8 46.5-49.4.1-25.5-15.6-43-44.3-49.6z"></path></svg>
                        <div class="item-price"><i class="fa fa-usd"></i> {{ $condition->price }}.00</div>
                      </li>
                    </ul>
                    <div class="features-list">
                      <!-- Color -->
                      <div class="form-group color-select">
                        <label>Color</label>
                        <div class="d-flex">
                          <div class="select-color">
                            <label class="color" for="color">
                              <span class="color-spe" style="background: #27282D;"></span>
                              <input type="radio" name="color" class="hidden" id="color"> Black
                            </label>
                          </div>
                          <div class="select-color">
                            <label class="color" for="color1">
                              <span class="color-spe" style="background: #FDDDC6;"></span>
                              <input type="radio" name="color" class="hidden" id="color1"> Gold
                            </label>
                          </div>
                        </div>
                      </div>
                      <!-- Storage -->
                      <div class="form-group color-select">
                        <label>Storage</label>
                        <div class="d-flex">
                          <div class="select-color">
                            <label class="color" for="storage">
                              <input type="radio" name="storage" class="hidden" id="storage"> 64 GB
                            </label>
                          </div>
                          <div class="select-color">
                            <label class="color" for="storage1">
                              <input type="radio" name="storage" class="hidden" id="storage1"> 256 GB
                            </label>
                          </div>
                          <div class="select-color">
                            <label class="color" for="storage2">
                              <input type="radio" name="storage" class="hidden" id="storage2"> 512 GB
                            </label>
                          </div>
                        </div>
                      </div>
                      <!-- Condition -->
                      <div class="form-group color-select">
                        <label>Condition</label>
                        <div class="d-flex">
                          <div class="select-color">
                            <label class="color" for="fair">
                              <input type="radio" name="condition" class="hidden" id="fair"> Fair <br>$510.00
                            </label>
                          </div>
                          <div class="select-color">
                            <label class="color" for="good">
                              <input type="radio" name="condition" class="hidden" id="good"> Good <br>$515.00
                            </label>
                          </div>
                          <div class="select-color">
                            <label class="color" for="excellent">
                              <input type="radio" name="condition" class="hidden" id="excellent"> Excellent <br>$525.00
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <ul class="features-list">
                      <li class="price">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 443.9 476.5" data-test="currency-icon" class="_2_hFKs4efXvyjTEZkKl7eo"><path d="M434.6 246.8l-7.9-11.4c-8.2-11.8-21.7-18.9-36.1-18.9-13.6 0-26.2 6.5-34.5 17.1-5.1-29.7-19-57-40.7-78.7-3.3-3.3-8.8-3.4-12.1 0-3.3 3.3-3.4 8.8 0 12.1 24.5 24.5 38 57.1 38 91.7 0 71.5-58.2 129.6-129.7 129.6-57 0-106.8-36.5-123.8-90.9-.9-2.8-3.2-5-6-5.7l-5.5-1.1H36.8c-6 0-12.6-8.5-12.6-16.3v-32.6c0-8.7 7-15.7 15.7-15.7h39.6c1.7 0 3.2-.6 4.5-1.5.2-.2.5-.3.7-.5 1.2-1 2.2-2.3 2.7-3.8 0-.1.1-.1.2-.2 8.7-27.9 27-52.3 51.3-68.8 2-1.3 3.3-3.5 3.7-5.9L153.4 94l30 29.1 5.2 4.7c3.5 3.2 8.9 3 12.1-.5 3.2-3.5 3-8.9-.5-12.1L154.3 71c-2.2-2.1-5.4-2.9-8.4-2.1-3 .9-5.2 3.3-5.9 6.4l-13.1 59.5-.6 4.3c-24.2 17.3-42.4 41.8-52.4 69.6h-34c-18.1 0-32.8 14.7-32.8 32.8v32.6c0 15.8 12.7 33.4 29.7 33.4l36.2-.3c7.6 21.7 19.9 40.6 35.5 56L82.7 389c-3.3 3.3-3.3 8.8 0 12.1 1.7 1.7 3.9 2.5 6.1 2.5 2.2 0 4.4-.8 6.1-2.5l26.8-26.8c25.1 19.4 56.2 30.9 89.8 30.9 32 0 61.6-10.4 85.7-27.9l23.8 23.8c1.7 1.7 3.9 2.5 6 2.5 2.2 0 4.4-.8 6.1-2.5 3.3-3.3 3.3-8.8 0-12.1l-22.5-22.5c29.3-26.8 47.7-65.2 47.8-107.9.8-.6 1.6-1.3 2.3-2.2l7.9-11.4c10.1-14.4 34.1-14.4 44.1 0l7.9 11.4c1.6 2.4 4.3 3.7 7 3.7 1.7 0 3.4-.5 4.9-1.5 3.8-2.6 4.8-7.9 2.1-11.8z"></path><path d="M211.5 388.3c52.5 0 97.7-31.4 118-76.3-10.4-5.9-23.6-3.2-30.4 6.8-19.7 29-52.4 46.3-87.5 46.3-29.3 0-57.5-12.3-77.4-33.8-8.3-8.9-21.8-9.6-31.2-2.1 23.5 36.3 63.6 59.1 108.5 59.1z" opacity=".3"></path><g><path d="M249.3 277c0-17.5-10.9-29.8-30.7-34.4l-15.2-3.4c-9.7-2.3-15.1-8.2-15.1-16.7 0-7.5 7.1-15.5 20.1-15.5 8.6 0 15.2 2.5 21.9 8.5 1.9 1.5 4.1 2.3 6.2 2.3 4.9 0 9-4.1 9-9 0-2.6-1-4.9-2.9-6.8-8-7.4-16.4-11.3-26.3-12.7v-14.8c0-4.7-3.8-8.6-8.6-8.6-4.7 0-8.6 3.8-8.6 8.6V190c-17.6 3.6-29.3 16.7-29.3 33.8 0 17.3 10.7 29.3 30.2 34l14.6 3.4c10.6 2.4 15.9 7.8 15.9 16.2 0 10.7-8.7 16.9-23.7 16.9-7.9 0-16.6-3.8-24.3-10.5a8.82 8.82 0 00-6.9-3.3c-5.1 0-9.2 4.1-9.2 9 0 2.3 1 4.6 2.7 6.6 8.3 8.7 18.6 14 30 15.8v15c0 4.7 3.8 8.6 8.6 8.6 4.7 0 8.6-3.8 8.6-8.6v-15.3c22.5-3.7 33-19.9 33-34.6z"></path></g></svg>
                        <div class="item-price"> <strong>48% discount</strong></div>
                      </li>
                      <li class="price">
                        <svg data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" width="463.04" height="535.78" viewBox="0 0 463.04 535.78" class="_2_hFKs4efXvyjTEZkKl7eo _1yWeSwv6BpCWk0OMzO3TPg"><g opacity=".26"><path d="M256.12 359.06a33.72 33.72 0 005.73-18.33l.5-34.61h-34.31l-1 28.91a17.28 17.28 0 01-2.75 8.63l-20.74 31.57h41.69zM195.34 271.51l-.07 5 .19-5.53c0 .18-.11.34-.12.53zM262.81 272.34a33.74 33.74 0 00-33.22-34.08h-.37a16.39 16.39 0 011 4.71l-1 29.37z"></path><path d="M429.29 481.46V96.6A20.64 20.64 0 00408.66 76h-.57c-7.92 6.17-13.34 15.37-13.34 26.2v366.31l-211.2-1.35 39-58.17h-39.1a16 16 0 01-1.83-.37l-57.17 87.05a38.68 38.68 0 01-5.45 6.36h289.66a20.63 20.63 0 0020.63-20.57z"></path></g><path d="M131.37 207.51h206.79a16.88 16.88 0 000-33.75H131.37a17.74 17.74 0 00-16.87 16.88 16.87 16.87 0 0016.87 16.87zM68.06 472.43a16.87 16.87 0 0016.88-16.87v-.26a16.75 16.75 0 00-16.87-16.74 16.94 16.94 0 000 33.88z"></path><path d="M408.66 42.25h-36.5A54.37 54.37 0 00319.29 0H184.63a54.4 54.4 0 00-54.34 54.31v9.59a54.44 54.44 0 0054.38 54.38h134.62a54.38 54.38 0 0052.89-42.29h36.5a20.64 20.64 0 0120.61 20.61v384.86a20.63 20.63 0 01-20.63 20.6H119a38.68 38.68 0 005.45-6.36l57.17-87.05a16 16 0 001.83.37h154.71a16.88 16.88 0 000-33.75H203.55l20.74-31.61a17.28 17.28 0 002.77-8.67l1-28.91h110.1a16.88 16.88 0 100-33.75h-109l1-29.37a16.39 16.39 0 00-1-4.71c-1-3.73-2.75-7.2-6-9.53a16.65 16.65 0 00-15.69-2.21l-87 31.57a16.83 16.83 0 00-8.18 6.38 40804.33 40804.33 0 00-37.71 55.58V119.7a16.88 16.88 0 10-33.75 0v246.9a16.06 16.06 0 00.56 2.79c-18 27.1-29 44.47-35 55.77a10.7 10.7 0 00-1.29 1.15l.43.46c-3 5.8-4.58 9.92-5.21 13.08h-.33l.13 1.45a9.41 9.41 0 00.33 4l.46 5.44a75.61 75.61 0 0041.13 60.64 71.78 71.78 0 0011.45 4.22c10.23 12.43 25.36 20.2 41.68 20.2h313.49a54.27 54.27 0 0053.63-46.52 53.49 53.49 0 00.79-7.82V96.6a54.43 54.43 0 00-54.42-54.35zm-68.79 21.66a20.64 20.64 0 01-20.58 20.63H184.63A20.66 20.66 0 01164 63.91v-9.6a20.63 20.63 0 0120.63-20.57h134.66a20.6 20.6 0 0120.6 20.57zm-305.33 384l-.49-5.93c12.29-19.64 66.81-100.46 103.13-154l58.44-21.19-.14 4.19-.19 5.53-1.82 52.55-66.46 101.24-30.72 46.81a16.62 16.62 0 01-1.72 1.55 17.75 17.75 0 01-2.2 1.61 34.49 34.49 0 01-24.46 4.38 16.29 16.29 0 00-2.46-.45 39.31 39.31 0 01-8.15-3 41.63 41.63 0 01-22.76-33.32z"></path></svg>
                        <div class="item-price"> Warranty: 12 months</div>
                      </li>
                    </ul>
                    <!--Text-->
                                        {{-- <div class="text">
                                            <p>God god will hatred sea good evil morality decieve virtues. Chris-tian endless society strong pinnacle. Oneself ascetic intentions holiest pious sea gains law justice disgust disgust dead love transvaluation. Intentions insofar merciful madness of eternal-return spirit against chaos. Victorious virtues god.</p>
                                            <div class="stock">In Stock</div>
                                        </div> --}}
                    <!--Item Quantity-->
                                        {{-- <div class="other-options clearfix">
                                            <div class="item-quantity"><input class="quantity-spinner" type="text" value="2" name="quantity"></div>
                                            <button type="button" class="theme-btn btn-style-one add-to-cart">Add To Cart </button>
                                        </div> --}}
                                        
                    <!--Item Meta-->
                                        <ul class="item-meta">
                                            <li>Categories: <a href="#">Headphone</a> , <a href="#">Mobile Accessories</a></li>
                                        </ul>
                                        
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <aside class="sidebar">

                                            <div class="product-stock bg-dark"><i class="fa fa-info-circle"></i> 1 Product in stock</div>
                                            <!-- Warenty Box -->
                                            <div class="warrenty-box">
                                            <ul>
                                                <li><i class="fa fa-check-circle text-success"></i> Warranty: 12 months</li>
                                                <li><i class="fa fa-check-circle text-success"></i> 30-day money back guarantee</li>
                                                <li><i class="fa fa-check-circle text-success"></i> Free standard shipping</li>
                                            </ul>
                                            </div>
                                            <div class="other-options clearfix">
                                            <button type="button" class="theme-btn btn-style-one add-to-cart btn-block">Buy </button>
                                            </div>

                                        </aside>
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