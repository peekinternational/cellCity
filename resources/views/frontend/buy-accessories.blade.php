@extends('frontend.layouts.master')
<link rel="stylesheet" type="text/css" href="{{asset('frontend-assets/css/custom.css')}}">
@section('content')
<!--Page Title-->
<!-- <section class="page-title" style="background-image: url(frontend-assets/images/background/3.jpg);">
	<div class="auto-container">
    	<ul class="bread-crumb">
            <li><a href="index-2.html">Home</a></li>
            <li class="active">Shop</li>
        </ul>
    	<h1>Shop</h1>
    </div>
</section> -->
<!--End Page Title-->

<!--Shop Section-->
<section class="shop-section shop-page">
	<div class="auto-container">
    	<!--Sort By-->
      <h3 class="_3n9_eRVa OCgW6kA95RgHDgyrkt-3F">Buy Accessories</h3>
      <div data-test="carrier-filters" class="_37xvF8QgM_NvGXx3HcYuJ2">
        <div class="a-cell row" data-v-2b8789a2="">
          {{-- <div class="a-cell xs-12 md-9 _114juaGTKcgQcFQKoPzirv" data-v-2b8789a2="">
            <label data-qa="0  AT&amp;T-checkbox-label" data-test="checkbox-AT&amp;T" class="_2dZyu6FGSL9sjsXTxboSwL _3FFHvPz39UA03ZA4Mv13pX" data-v-2b8789a2="">
              <input data-test="input" name="0  AT&amp;T" type="checkbox" class="_2X8Raljpwo5umcD_HYzefT">
              <span data-test="checkbox-span" class="_2Q2hhB3NvM2sAldZj6fGXU"></span>
              <span class="L5UAN0lD0YKf94yOvozYH">
                <div class="_2QOueHT- HWdZT4KgOk8JhBI9OzX9g"><!---->
                  <img src="https://d28i4xct2kl5lp.cloudfront.net/bo_merchant/img/carriers/att.svg" alt="AT&amp;T" loading="lazy" class="wrAXteFB">
                </div>
              </span>
            </label>
            <label data-qa="1  Sprint-checkbox-label" data-test="checkbox-Sprint" class="_2dZyu6FGSL9sjsXTxboSwL _3FFHvPz39UA03ZA4Mv13pX" data-v-2b8789a2="">
              <input data-test="input" name="1  Sprint" type="checkbox" class="_2X8Raljpwo5umcD_HYzefT">
              <span data-test="checkbox-span" class="_2Q2hhB3NvM2sAldZj6fGXU"></span>
              <span class="L5UAN0lD0YKf94yOvozYH">
                <div class="_2QOueHT- HWdZT4KgOk8JhBI9OzX9g"><!---->
                  <img src="https://d28i4xct2kl5lp.cloudfront.net/bo_merchant/img/carriers/sprint.svg" alt="Sprint" loading="lazy" class="wrAXteFB">
                </div>
              </span>
            </label>
            <label data-qa="2  T-Mobile-checkbox-label" data-test="checkbox-T-Mobile" class="_2dZyu6FGSL9sjsXTxboSwL _3FFHvPz39UA03ZA4Mv13pX" data-v-2b8789a2="">
              <input data-test="input" name="2  T-Mobile" type="checkbox" class="_2X8Raljpwo5umcD_HYzefT">
              <span data-test="checkbox-span" class="_2Q2hhB3NvM2sAldZj6fGXU"></span>
              <span class="L5UAN0lD0YKf94yOvozYH">
                <div class="_2QOueHT- HWdZT4KgOk8JhBI9OzX9g"><!---->
                  <img src="https://d28i4xct2kl5lp.cloudfront.net/bo_merchant/img/carriers/tmobile.svg" alt="T-Mobile" loading="lazy" class="wrAXteFB">
                </div>
              </span>
            </label>
            <label data-qa="3  Verizon-checkbox-label" data-test="checkbox-Verizon" class="_2dZyu6FGSL9sjsXTxboSwL _3FFHvPz39UA03ZA4Mv13pX" data-v-2b8789a2="">
              <input data-test="input" name="3  Verizon" type="checkbox" class="_2X8Raljpwo5umcD_HYzefT">
              <span data-test="checkbox-span" class="_2Q2hhB3NvM2sAldZj6fGXU"></span>
              <span class="L5UAN0lD0YKf94yOvozYH">
                <div class="_2QOueHT- HWdZT4KgOk8JhBI9OzX9g"><!---->
                  <img src="https://d28i4xct2kl5lp.cloudfront.net/bo_merchant/img/carriers/verizon.svg" alt="Verizon" loading="lazy" class="wrAXteFB">
                </div>
              </span>
            </label>
          </div> --}}
          <div class="a-cell xs-12 md-3" data-v-2b8789a2="">
            <div class="axop9d4ghf_ZiU7FQc-M8 baseselect-wrapper _2u25sfWmf6NUCbJ_StTs_r" data-v-2b8789a2=""><!---->
              <select id="simlock" onchange="sortList(this)" name="sort" class="_3Iq8JGYZpyTj97wvi5Wyu7 eUlOsp7XbB9G1L8SEMMpU baseselect-field">
                <option selected>Select Any Option....</option>
                <option value="az">Alphabetical,A-Z</option>
                <option value="za">Alphabetical,Z-A</option>
                <option value="hl">Price,high to low</option>
                <option value="lh">Price,low to high</option>
                <option value="no">Date,new to old</option>
                <option value="on">Date,old to new</option>

              </select>
              <label data-test="baseselect-label" class="PSXfa64BhcchUXTYm8jxr _2Y-fYnDKPqxkYV__KtgvWD baseselect-label">
                {{-- <span class="_1rmkAs0zRQWqTLR2midRVa baseselect-label-content">Best Selling</span> --}}
              </label>
              <div class="_3CTJYWu3hsWyWna_ZcsF5I">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 443.9 476.5" data-test="baseselect-icon" class="-S5BM_soVHE3yxeKelL2Q _1-GUUYIHoGjHHKudYw6-sr"><path d="M220.2 355.7c-3.1 0-6.1-1.2-8.5-3.5L9.1 149.6c-4.7-4.7-4.7-12.3 0-17 4.7-4.7 12.3-4.7 17 0l194.1 194.1 197-197c4.7-4.7 12.3-4.7 17 0 4.7 4.7 4.7 12.3 0 17L228.7 352.2c-2.4 2.3-5.4 3.5-8.5 3.5z"></path></svg>
              </div>
            </div>
          </div>
        </div>
      </div>

        <!-- <div class="items-sorting">
            <div class="row clearfix">
                <div class="results-column col-md-6 col-sm-6 col-xs-12">
                    <h4>Showing 1–8 of 23 results</h4>
                </div>
                <div class="select-column pull-right col-md-3 col-sm-4 col-xs-12">
                    <div class="form-group">
                        <select name="sort-by">
                            <option>Default Sorting</option>
                            <option>By Order</option>
                            <option>By Price</option>
                        </select>
                    </div>
                </div>
            </div>
        </div> -->

    	<div class="row clearfix">
        <div class="col-md-3 sidebar-filter">
          <ul class="_1PyjTAdMUxZV6zOWToeiGU">
            <li class="_2LiMhAnX4MDtEL5YEDIdLy">
                <span class="_2RGsPtNo">Price</span>
                  <div id="slider-container"></div>
                      <p>
                        <label for="amount">Price range:</label>
                        <br>
                        <input type="text" id="amount" style="border: 0; color: #00bfa5; font-weight: bold;" />
                      </p>

                      <div id="slider-range"></div>
                   </li>

            <li class="_2LiMhAnX4MDtEL5YEDIdLy">
              <h3 class="_2RGsPtNo">Brand</h3>
              <ul data-test="filters-facet" class="_26WV8o_nAH1VuLftdiS-6t">
                <li class="_33pDOgQ80LhcEmJTGXNM3U">
                  <div>
                    <input id="brand-reset" type="checkbox" name="brand_name" checked="checked" data-test="facet-reset" value="all_brand" class="_3wvnh-Qn getAll" onclick="getAll()">
                    <label for="brand-reset" class="_33K8eTZu">
                      <div class="_3S4CObWg">
                        <div class="_2OVE0h6V"></div>
                        <div class="_3xAYCg9N">
                          <svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg>
                        </div>
                      </div>
                      <div class="TRSMTVTh">
                        <span class="_28IelIKC">
                          <span class="_28IelIKC">All</span>
                        </span>
                      </div> <!----> <!---->
                    </label>
                  </div>
                </li>
                @foreach (CityClass::brands() as $brand)

                <li data-test="facet-item" class="_33pDOgQ80LhcEmJTGXNM3U">
                  <div>
                    <input id="brand-{{ $brand->id }}" type="checkbox" name="brand_name" data-test="facet- {{ucwords($brand->brand_name) }}" class="_3wvnh-Qn getBrandId" value="{{ $brand->id }}" onclick="getBrand({{ $brand->id }})">
                    <label for="brand-{{ $brand->id }}" class="_33K8eTZu">
                      <div class="_3S4CObWg">
                        <div class="_2OVE0h6V"></div>
                        <div class="_3xAYCg9N">
                          <svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg>
                        </div>
                      </div>
                      <div class="TRSMTVTh">
                        <span class="_28IelIKC">
                          <span class="_28IelIKC _1LYyf7lOuywpdBWUdNvl1k">{{ucwords($brand->brand_name) }}</span><span></span>
                        </span>
                      </div>
                    </label>
                  </div>
                </li>
                @endforeach

                <span class="_3JZtHpVH kdWBx8BsOXOeHlX8MCQf_">
                  <button data-test="facet-toggler" class="_3wCdvNLg s1Zi9DG5">See more</button>
                </span>
              </ul>
            </li>
              <li class="_2LiMhAnX4MDtEL5YEDIdLy"><h3 class="_2RGsPtNo">
                  Model
                </h3>
                 <ul data-test="filters-facet" class="_26WV8o_nAH1VuLftdiS-6t" id="modelsss">
                     <li class="_33pDOgQ80LhcEmJTGXNM3U"><div>
                         <input id="model-reset" type="checkbox" name="model_name" checked="checked" data-test="facet-reset" class="_3wvnh-Qn getAllModel" onclick="getAllModel()"> <label for="model-reset" class="_33K8eTZu"><div class="_3S4CObWg"><div class="_2OVE0h6V"></div> <div class="_3xAYCg9N"><svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg></div></div> <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC">
                    All
                  </span></span></div> <!----> <!----></label></div></li>

                  @foreach (CityClass::allModels() as $models)
                  <li data-test="facet-item" class="_33pDOgQ80LhcEmJTGXNM3U">

                          <input id="{{ $models->id }}" type="checkbox" name="models_name" data-test="facet-{{ $models->brand->brand_name ?? '' }}  {{ $models->model_name ?? ''}}" class="_3wvnh-Qn  getModelId"  value="{{ $models->id }}" onclick="getModels({{ $models->id }})">
                           <label for="{{{ $models->id }}}" class="_33K8eTZu">
                            <div class="_3S4CObWg">
                               <div class="_2OVE0h6V"></div>
                               <div class="_3xAYCg9N">
                                   <svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg>
                                    </div>
                                </div>
                                    <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC _1LYyf7lOuywpdBWUdNvl1k">
                                        {{ ucwords($models->brand->brand_name) ?? '' }}  {{ ucwords($models->model_name) ?? ''}}
                                    </span>
                                    </span>
                                </div> <!----> <!---->
                            </label>

                    </li>
                    @endforeach


                  <span class="_3JZtHpVH kdWBx8BsOXOeHlX8MCQf_"><button data-test="facet-toggler" class="_3wCdvNLg s1Zi9DG5">
                See more
              </button></span></ul></li>
              {{-- <li class="_2LiMhAnX4MDtEL5YEDIdLy"><h3 class="_2RGsPtNo">
                  Condition
                </h3> <ul data-test="filters-facet" class="_26WV8o_nAH1VuLftdiS-6t"><li class="_33pDOgQ80LhcEmJTGXNM3U"><div><input id="backbox_grades_list-reset" type="checkbox" checked="checked" data-test="facet-reset" class="_3wvnh-Qn"> <label for="backbox_grades_list-reset" class="_33K8eTZu"><div class="_3S4CObWg"><div class="_2OVE0h6V"></div> <div class="_3xAYCg9N"><svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg></div></div> <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC">
                    All
                  </span></span></div> <!----> <!----></label></div></li> <li data-test="facet-item" class="_33pDOgQ80LhcEmJTGXNM3U"><div><input id="backbox_grades_list-10 Excellent" type="checkbox" data-test="facet-Excellent" class="_3wvnh-Qn"> <label for="backbox_grades_list-10 Excellent" class="_33K8eTZu"><div class="_3S4CObWg"><div class="_2OVE0h6V"></div> <div class="_3xAYCg9N"><svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg></div></div> <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC _1LYyf7lOuywpdBWUdNvl1k">
                    Excellent
                  </span> <!----></span></div> <!----> <!----></label></div></li><li data-test="facet-item" class="_33pDOgQ80LhcEmJTGXNM3U"><div><input id="backbox_grades_list-11 Good" type="checkbox" data-test="facet-Good" class="_3wvnh-Qn"> <label for="backbox_grades_list-11 Good" class="_33K8eTZu"><div class="_3S4CObWg"><div class="_2OVE0h6V"></div> <div class="_3xAYCg9N"><svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg></div></div> <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC _1LYyf7lOuywpdBWUdNvl1k">
                    Good
                  </span> <!----></span></div> <!----> <!----></label></div></li><li data-test="facet-item" class="_33pDOgQ80LhcEmJTGXNM3U"><div><input id="backbox_grades_list-12 Fair" type="checkbox" data-test="facet-Fair" class="_3wvnh-Qn"> <label for="backbox_grades_list-12 Fair" class="_33K8eTZu"><div class="_3S4CObWg"><div class="_2OVE0h6V"></div> <div class="_3xAYCg9N"><svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg></div></div> <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC _1LYyf7lOuywpdBWUdNvl1k">
                    Fair
                  </span> <!----></span></div> <!----> <!----></label></div></li> <!----></ul></li>
                  <li class="_2LiMhAnX4MDtEL5YEDIdLy"><h3 class="_2RGsPtNo">
                  Phone Services Provider
                </h3> <ul data-test="filters-facet" class="_26WV8o_nAH1VuLftdiS-6t"><li class="_33pDOgQ80LhcEmJTGXNM3U"><div><input id="compatible_carriers_facet-reset" type="checkbox" checked="checked" data-test="facet-reset" class="_3wvnh-Qn"> <label for="compatible_carriers_facet-reset" class="_33K8eTZu"><div class="_3S4CObWg"><div class="_2OVE0h6V"></div> <div class="_3xAYCg9N"><svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg></div></div> <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC">
                    All
                  </span></span></div> <!----> <!----></label></div></li> <li data-test="facet-item" class="_33pDOgQ80LhcEmJTGXNM3U"><div><input id="compatible_carriers_facet-0  AT&amp;T" type="checkbox" data-test="facet- AT&amp;T" class="_3wvnh-Qn"> <label for="compatible_carriers_facet-0  AT&amp;T" class="_33K8eTZu"><div class="_3S4CObWg"><div class="_2OVE0h6V"></div> <div class="_3xAYCg9N"><svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg></div></div> <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC _1LYyf7lOuywpdBWUdNvl1k">
                     AT&amp;T
                  </span> </span></div> <!----> <!----></label></div></li><li data-test="facet-item" class="_33pDOgQ80LhcEmJTGXNM3U"><div><input id="compatible_carriers_facet-1  Sprint" type="checkbox" data-test="facet- Sprint" class="_3wvnh-Qn"> <label for="compatible_carriers_facet-1  Sprint" class="_33K8eTZu"><div class="_3S4CObWg"><div class="_2OVE0h6V"></div> <div class="_3xAYCg9N"><svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg></div></div> <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC _1LYyf7lOuywpdBWUdNvl1k">
                     Sprint
                  </span> </span></div> <!----> <!----></label></div></li><li data-test="facet-item" class="_33pDOgQ80LhcEmJTGXNM3U"><div><input id="compatible_carriers_facet-2  T-Mobile" type="checkbox" data-test="facet- T-Mobile" class="_3wvnh-Qn"> <label for="compatible_carriers_facet-2  T-Mobile" class="_33K8eTZu"><div class="_3S4CObWg"><div class="_2OVE0h6V"></div> <div class="_3xAYCg9N"><svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg></div></div> <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC _1LYyf7lOuywpdBWUdNvl1k">
                     T-Mobile
                  </span> </span></div> <!----> <!----></label></div></li><li data-test="facet-item" class="_33pDOgQ80LhcEmJTGXNM3U"><div><input id="compatible_carriers_facet-3  Verizon" type="checkbox" data-test="facet- Verizon" class="_3wvnh-Qn"> <label for="compatible_carriers_facet-3  Verizon" class="_33K8eTZu"><div class="_3S4CObWg"><div class="_2OVE0h6V"></div> <div class="_3xAYCg9N"><svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg></div></div> <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC _1LYyf7lOuywpdBWUdNvl1k">
                     Verizon
                  </span> </span></div> <!----> <!----></label></div></li><li data-test="facet-item" class="_33pDOgQ80LhcEmJTGXNM3U"><div><input id="compatible_carriers_facet-99 US Cellular" type="checkbox" data-test="facet-US Cellular" class="_3wvnh-Qn"> <label for="compatible_carriers_facet-99 US Cellular" class="_33K8eTZu"><div class="_3S4CObWg"><div class="_2OVE0h6V"></div> <div class="_3xAYCg9N"><svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg></div></div> <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC _1LYyf7lOuywpdBWUdNvl1k">
                    US Cellular
                  </span> </span></div> <!----> <!----></label></div></li><li data-test="facet-item" class="_33pDOgQ80LhcEmJTGXNM3U"><div><input id="compatible_carriers_facet-99 Cricket" type="checkbox" data-test="facet-Cricket" class="_3wvnh-Qn"> <label for="compatible_carriers_facet-99 Cricket" class="_33K8eTZu"><div class="_3S4CObWg"><div class="_2OVE0h6V"></div> <div class="_3xAYCg9N"><svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg></div></div> <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC _1LYyf7lOuywpdBWUdNvl1k">
                    Cricket
                  </span> </span></div> <!----> <!----></label></div></li> <span class="_3JZtHpVH kdWBx8BsOXOeHlX8MCQf_"><button data-test="facet-toggler" class="_3wCdvNLg s1Zi9DG5">
                See more
              </button></span></ul></li><li class="_2LiMhAnX4MDtEL5YEDIdLy"><h3 class="_2RGsPtNo">
                  Locked or Unlocked
                </h3> <ul data-test="filters-facet" class="_26WV8o_nAH1VuLftdiS-6t"><li class="_33pDOgQ80LhcEmJTGXNM3U"><div><input id="sim_lock_state-reset" type="checkbox" checked="checked" data-test="facet-reset" class="_3wvnh-Qn"> <label for="sim_lock_state-reset" class="_33K8eTZu"><div class="_3S4CObWg"><div class="_2OVE0h6V"></div> <div class="_3xAYCg9N"><svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg></div></div> <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC">
                    All
                  </span></span></div> <!----> <!----></label></div></li> <li data-test="facet-item" class="_33pDOgQ80LhcEmJTGXNM3U"><div><input id="sim_lock_state-Locked or Unlocked" type="checkbox" data-test="facet-Locked or Unlocked" class="_3wvnh-Qn"> <label for="sim_lock_state-Locked or Unlocked" class="_33K8eTZu"><div class="_3S4CObWg"><div class="_2OVE0h6V"></div> <div class="_3xAYCg9N"><svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg></div></div> <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC _1LYyf7lOuywpdBWUdNvl1k">
                    Locked or Unlocked
                  </span> </span></div> <!----> <!----></label></div></li><li data-test="facet-item" class="_33pDOgQ80LhcEmJTGXNM3U"><div><input id="sim_lock_state-Unlocked only" type="checkbox" data-test="facet-Unlocked only" class="_3wvnh-Qn"> <label for="sim_lock_state-Unlocked only" class="_33K8eTZu"><div class="_3S4CObWg"><div class="_2OVE0h6V"></div> <div class="_3xAYCg9N"><svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg></div></div> <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC _1LYyf7lOuywpdBWUdNvl1k">
                    Unlocked only
                  </span> </span></div> <!----> <!----></label></div></li> <!----></ul></li><li class="_2LiMhAnX4MDtEL5YEDIdLy"><h3 class="_2RGsPtNo">
                  Storage (GB)
                </h3> <ul data-test="filters-facet" class="_26WV8o_nAH1VuLftdiS-6t"><li class="_33pDOgQ80LhcEmJTGXNM3U"><div><input id="storage-reset" type="checkbox" checked="checked" data-test="facet-reset" class="_3wvnh-Qn"> <label for="storage-reset" class="_33K8eTZu"><div class="_3S4CObWg"><div class="_2OVE0h6V"></div> <div class="_3xAYCg9N"><svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg></div></div> <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC">
                    All
                  </span></span></div> <!----> <!----></label></div></li> <li data-test="facet-item" class="_33pDOgQ80LhcEmJTGXNM3U"><div><input id="storage-1000 1 GB" type="checkbox" data-test="facet-1 GB" class="_3wvnh-Qn"> <label for="storage-1000 1 GB" class="_33K8eTZu"><div class="_3S4CObWg"><div class="_2OVE0h6V"></div> <div class="_3xAYCg9N"><svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg></div></div> <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC _1LYyf7lOuywpdBWUdNvl1k">
                    1 GB
                  </span> </span></div> <!----> <!----></label></div></li><li data-test="facet-item" class="_33pDOgQ80LhcEmJTGXNM3U"><div><input id="storage-4000 4 GB" type="checkbox" data-test="facet-4 GB" class="_3wvnh-Qn"> <label for="storage-4000 4 GB" class="_33K8eTZu"><div class="_3S4CObWg"><div class="_2OVE0h6V"></div> <div class="_3xAYCg9N"><svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg></div></div> <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC _1LYyf7lOuywpdBWUdNvl1k">
                    4 GB
                  </span> </span></div> <!----> <!----></label></div></li><li data-test="facet-item" class="_33pDOgQ80LhcEmJTGXNM3U"><div><input id="storage-8000 8 GB" type="checkbox" data-test="facet-8 GB" class="_3wvnh-Qn"> <label for="storage-8000 8 GB" class="_33K8eTZu"><div class="_3S4CObWg"><div class="_2OVE0h6V"></div> <div class="_3xAYCg9N"><svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg></div></div> <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC _1LYyf7lOuywpdBWUdNvl1k">
                    8 GB
                  </span> </span></div> <!----> <!----></label></div></li><li data-test="facet-item" class="_33pDOgQ80LhcEmJTGXNM3U"><div><input id="storage-16000 16 GB" type="checkbox" data-test="facet-16 GB" class="_3wvnh-Qn"> <label for="storage-16000 16 GB" class="_33K8eTZu"><div class="_3S4CObWg"><div class="_2OVE0h6V"></div> <div class="_3xAYCg9N"><svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg></div></div> <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC _1LYyf7lOuywpdBWUdNvl1k">
                    16 GB
                  </span> </span></div> <!----> <!----></label></div></li><li data-test="facet-item" class="_33pDOgQ80LhcEmJTGXNM3U"><div><input id="storage-32000 32 GB" type="checkbox" data-test="facet-32 GB" class="_3wvnh-Qn"> <label for="storage-32000 32 GB" class="_33K8eTZu"><div class="_3S4CObWg"><div class="_2OVE0h6V"></div> <div class="_3xAYCg9N"><svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg></div></div> <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC _1LYyf7lOuywpdBWUdNvl1k">
                    32 GB
                  </span> </span></div> <!----> <!----></label></div></li><li data-test="facet-item" class="_33pDOgQ80LhcEmJTGXNM3U"><div><input id="storage-62000 62 GB" type="checkbox" data-test="facet-62 GB" class="_3wvnh-Qn"> <label for="storage-62000 62 GB" class="_33K8eTZu"><div class="_3S4CObWg"><div class="_2OVE0h6V"></div> <div class="_3xAYCg9N"><svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg></div></div> <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC _1LYyf7lOuywpdBWUdNvl1k">
                    62 GB
                  </span> </span></div> <!----> <!----></label></div></li> <span class="_3JZtHpVH kdWBx8BsOXOeHlX8MCQf_"><button data-test="facet-toggler" class="_3wCdvNLg s1Zi9DG5">
                See more
              </button></span></ul></li>
              </ul> --}}
        </div>
        <div class="col-md-9">
          <div class="row" id="filter">

            <!--Shop Item-->
            @foreach (CityClass::accessory() as $accessory)
             @php
                 $model = App\Models\Pmodel::where('id',$accessory->model_id)->first();
                 $imag = App\Models\AccessoryImage::where('accessory_id',$accessory->id)->first();
             @endphp
            <div class="shop-item col-md-4 col-sm-6 col-xs-12">
                <div class="inner-box">
                    @if (Auth::user())

                    @if (CityClass::accessWishlist($accessory->id) == "1")
                    <a href="#" onclick="undoWishlist({{$accessory->id}})"><i class="fa fa-heart" style="font-size: 30px;color:#ff0707"></i></a>
                    @else
                    <a href="#" onclick="wishlist({{$accessory->id}})"><i class="fa fa-heart" style="font-size: 30px;color:#adadad"></i></a>
                    @endif
                  @else
                  <a href="#" onclick="wishlist({{$accessory->id}})"><i class="fa fa-heart" style="font-size: 30px;color:#adadad"></i></a>
                 @endif
                    <figure class="image-box">
                        <a href="{{route('accessory.single',$accessory->id)}}"><img src="{{asset('/storage/accessories/images/'.$imag->images)}}" alt="" /></a>
                      </figure>
                      <!--Lower Content-->
                      <div class="lower-content">
                        <h3><a href="">{{ $model->brand->brand_name }} {{ $model->model_name }}</a></h3>
                        <div> <span>{{ $accessory->category }} - {{ $accessory->name }}</span> </div>
                          <span>
                          {{-- Warranty: 12 months --}}
                          </span>
                          <div>Starting from</div>
                          <div class="price">
                          <strong>${{ $accessory->sell_price }}.00</strong> <del>${{ $accessory->orig_price }}.00</del></div>
                          <!-- <a href="{{url('single')}}" class="cart-btn theme-btn btn-style-two">Add to cart</a> -->
                      </div>
                  </div>
              </div>
            @endforeach



          </div>
        </div>
      </div>

        <div class="text-center">
        	<!-- Styled Pagination -->
            <div class="styled-pagination">
                <ul>
                    <li>{{ CityClass::accessory()->links('vendor.pagination.custom') }}</li>

                </ul>
            </div>
        </div>

    </div>
</section>
@endsection
@section('script')

<script>
  function getAll()
  {
    var  brand = [];
    $(".getAll").each(function(){
        if($(this).is(":checked")){
            brand.push($(this).val());
        }
       });

       $(".getBrandId").each(function(){
                if($(this).is(":checked")){
                    $('.getBrandId').prop('checked', false);
                }
            });
            window.location.reload();
    // alert(brand);
    // $.ajax({
    //     url: "{{url('getAccessoryFilter')}}",
    //     type:"get",
    //     dataType: "json",
    //     data:"brand=" + brand,

    //     success:function(response){
    //       console.log(response);
    //         var mode= JSON.stringify(response)
    //         var brnd = JSON.parse(mode);
    //         console.log(brnd);
    //       $('#modelsss').html(response.models);
    //       $('#filter').html(response.brands);

    //     //   $('#exampleModal'+id).modal('show');
    //     },


    //    });
  }

    function getBrand(id){

        var id = id;

        var  brand = [];
       $(".getCondition").each(function(){
        if($(this).is(":checked")){
            $('.getCondition').prop('checked', false);
        }
       });

       $(".getAll").each(function(){
                if($(this).is(":checked")){
                    $('.getAll').prop('checked', false);
                }
            });

       $(".getStorage").each(function(){
                if($(this).is(":checked")){
                    $('.getStorage').prop('checked', false);
                }
            });

       $(".getBrandId").each(function(){
        if($(this).is(":checked")){
            brand.push($(this).val());
        }
       });

       $('input:checkbox[name=models_name]').each(function()
            {
                if($(this).is(':checked'))
                $('.getModelId').prop('checked', false);
            //    console.log(selectedBrand);
            });

       var getbrand = brand.toString();
            // console.log(getbrand);
       $.ajax({
        url: "{{url('getAccessoryFilter')}}",
        type:"get",
        dataType: "json",
        data:"brand=" + brand,

        success:function(response){
          console.log(response);
             var mode= JSON.stringify(response)
            var brnd = JSON.parse(mode);
            console.log(brnd);
          $('#modelsss').html(response.models);
          $('#filter').html(response.brands);

        //   $('#exampleModal'+id).modal('show');
        },


       });

      }

      function getModels(id){
        //   alert('asdasd');
        // var id = id;
        $(".getAllModel").each(function(){
                if($(this).is(":checked")){
                    $('.getAllModel').prop('checked', false);
                }
            });

        $(".getBrandId").each(function(){
        if($(this).is(":checked")){

              $('.getBrandId').prop('checked', false);
        }
       });

         var selectedModel =[];
        $('input:checkbox[name=models_name]').each(function()
            {
                if($(this).is(':checked'))
                selectedModel.push($(this).val());
            //    console.log(selectedBrand);
            });

            var selectedModel = selectedModel.toString();
        // console.log($('input[name="brand_name"]:checked').serialize());

        var  models = [];
       $(".getModelId").each(function(){
        if($(this).is(":checked")){
            models.push($(this).val());
        }
       });

       var getmodels = models.toString();
            // console.log(getmodels);
       $.ajax({
        url: "{{url('getAccessoryFilter')}}",
        type:"get",
        dataType:"html",
        data:{model:getmodels,selectedModel:selectedModel},

        success:function(response){
          console.log(response);
          $('#filter').html(response);
        //   $('#exampleModal'+id).modal('show');
        },
       });

      }

      function getCondition(){

        var selectedModel =[];
        $('input:checkbox[name=models_name]').each(function()
            {
                if($(this).is(':checked'))
                selectedModel.push($(this).val());
            //    console.log(selectedBrand);
            });

            var selectedModel = selectedModel.toString();
          console.log(selectedModel);


        var  getCondition = [];
       $(".getCondition").each(function(){
        if($(this).is(":checked")){
          getCondition.push($(this).val());
        }
       });

       var getCondition = getCondition.toString();
            console.log(getCondition);
       $.ajax({
        url: "{{url('getBrandFilter')}}",
        type:"get",
        dataType:"html",
        data:{getCondition:getCondition,selectedModel:selectedModel},

        success:function(response){
          console.log(response);
          $('#filter').html(response);
        //   $('#exampleModal'+id).modal('show');
        },

       });

      }
      function getStorage()
        {
            var selectedModel =[];
            $('input:checkbox[name=models_name]').each(function()
                {
                    if($(this).is(':checked'))
                    selectedModel.push($(this).val());
                //    console.log(selectedBrand);
                });

            var selectedModel = selectedModel.toString();

          console.log(selectedModel);
            var getStorage= [];
            $(".getStorage").each(function(){
                if($(this).is(":checked")){
                    getStorage.push($(this).val());
                }
            });

            var getStorage = getStorage.toString();
                    console.log(getStorage);
            $.ajax({
                url: "{{url('getBrandFilter')}}",
                type:"get",
                dataType:"html",
                data:{getStorage:getStorage,selectedModel:selectedModel},

                success:function(response){
                console.log(response);
                $('#filter').html(response);
                //   $('#exampleModal'+id).modal('show');
                },

            });
        }

        function getLocked()
        {

            var selectedModel =[];
            $('input:checkbox[name=models_name]').each(function()
                {
                    if($(this).is(':checked'))
                    selectedModel.push($(this).val());
                //    console.log(selectedBrand);
                });

            var selectedModel = selectedModel.toString();

          console.log(selectedModel);
            var getLocked= [];
            $(".getLocked").each(function(){
                if($(this).is(":checked")){
                    getLocked.push($(this).val());
                }
            });

            var getLocked = getLocked.toString();
                    console.log(getLocked);
            $.ajax({
                url: "{{url('getBrandFilter')}}",
                type:"get",
                dataType:"html",
                data:{getLocked:getLocked,selectedModel:selectedModel},
                success:function(response){
                console.log(response);
                $('#filter').html(response);
                //   $('#exampleModal'+id).modal('show');
                },

            });
        }

        function getUnlocked(event)
        {
               console.log($(event).val());
        }

      function wishlist(id)
      {
        //   alert(colorID);
        @if (!Auth::user())
          window.location.href = "../signin";
        @else
        $.ajax({
            type:"get",
            url: "{{ url('accessory-wishlist') }}/"+id,

            success:function(wishlist)
            {
               window.location.reload();
               alert('Successfully add into your wishlist !');

            },error:function(error){
               console.log(error);
            }

            });
        @endif

      }

    function undoWishlist(id)
    {
        @if (!Auth::user())
          window.location.href = "../signin";
        @else
        $.ajax({
            type:"get",
            url: "{{ url('undo-access-wishlist') }}/"+id,

            success:function(wishlist)
            {
               window.location.reload();
            //    alert('Successfully Re into your wishlist !');

            },error:function(error){
               console.log(error);
            }

            });
        @endif
    }


</script>

<script>
    $(function() {
        $('#slider-container').slider({
            range: true,
            min: 0,
            max: 1000,
            values: [0, 1000],
            slide: function(event, ui) {
                $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
                var mi = ui.values[ 0 ];
                var mx = ui.values[ 1 ];
                filterSystem(mi, mx);

            }
        });
      $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
      " - $" + $( "#slider-range" ).slider( "values", 1 ) );

  });

function filterSystem(minPrice, maxPrice) {
    console.log(minPrice, maxPrice);

            $.ajax({
                url: "{{url('getAccessoryFilter')}}",
                type:"get",
                dataType:"html",
                data:{minPrice:minPrice,maxPrice:maxPrice},
                success:function(response){
                console.log(response);
                $('#filter').html(response);
                //   $('#exampleModal'+id).modal('show');
                },

            });

	$("#computers div.system").hide().filter(function() {

		var price = parseInt($(this).data("price"), 10);

        return price >= minPrice && price <= maxPrice;

	}).show();
}


</script>

<script>

 function sortList(event)
 {
     var sort = $(event).val();
    //    alert(sort);
    //  if(sort == 'az')
    //  {
        $.ajax({
                url: "{{url('getSortList')}}",
                type:"get",
                dataType:"html",
                data:{sort:sort},
                success:function(response){
                console.log(response);
                $('#filter').html(response);
                //   $('#exampleModal'+id).modal('show');
                },

            });
    //  }
 }

    </script>
@endsection
