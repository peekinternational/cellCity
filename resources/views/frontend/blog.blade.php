@extends('frontend.layouts.master')

@section('content')
<!--Page Title-->
<section class="page-title" style="background-image: url({{asset('frontend-assets/images/background/3.jpg')}});">
	<div class="auto-container">
		<ul class="bread-crumb">
			<li><a href="index-2.html">Home</a></li>
			<li class="active">Blog</li>
		</ul>
		<h1>blog</h1>
	</div>
</section>
<!--End Page Title-->

<!--Blog-->
<div class="sidebar-page-container">
    <div class="auto-container">
        <div class="row clearfix">
            <!--Content Side-->
            <div class="content-side col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!--Blog Section / Classic View-->
                <section class="blog-news-section classic-view blog-detail">

                    <!--BLog News Column-->
                    <div class="news-block style-two">
                        <div class="inner-box">
                            <!--Image Box-->
                            <div class="image-box">
                                <img src="{{asset($blog->image)}}" alt="">
                            </div>
                            <!--Lower Content-->
                            <div class="lower-content">
                                <h3><a href="blog-single.html">{{ $blog->title }} </a></h3>
                                <ul class="list">
                                    <li><span class="icon flaticon-avatar"></span> Posted by <span class="posted">Andriana</span></li>
                                    <li><span class="icon flaticon-business"></span> {{$blog->created_at->format('d F Y')}} </li>
                                </ul>
                                <div class="text">
                                    <p>Grandeur truth transvaluation grandeur endless gains holiest strong. Love noble god abstract of inexpedient endless snare decieve will holiest snare derive hatred. Hope eternal-return love moral faithful christianity abstract evil derive ocean convictions law.</p>
                                    <p>Gains snare of decrepit of superiority reason abstract philosophy. Chaos decrepit hope snare snare. Ubermensch enlightenment faith marvelous merciful hatred reason self war society. Ascetic ideal convictions ascetic holiest ubermensch grandeur. Ocean gains battle inexpedient chaos against passion mountains virtues disgust. Eternal-return play noble salvation contradict self enlightenment. Ultimate oneself contradict moral selfish intentions truth passion self inexpedient evil free free.</p>
                                    <blockquote>Noble strong strong ocean noble depths chaos burying overcome god strong. Strong over come mountains madness mountains decieve.
                                        <h3>- Andrew Simon</h3>
                                    </blockquote>
                                    <p>Selfish derive transvaluation ocean enlightenment society. Noble enlightenment noble self noble morality virtues christian will ultimate spirit hatred mountains. Of right convictions society passion intentions merciful inexpedient transvaluation faith. Revaluation snare abstract hope deceptions transvaluation.</p>
                                </div>
                                <!--List style One-->
                                <ul class="list-style-one">
                                    <li>Insofar depths strong snare inexpedient oneself snare truth.</li>
                                    <li>Suicide morality merciful truth derive inexpedient play.</li>
                                    <li>Selfish derive transvaluation ocean enlightenment society. </li>
                                    <li>Revaluation snare abstract hope deceptions transvaluation.</li>
                                </ul>
                                <!--Post Option-->


                            </div>

                        </div>
                    </div>

                </section>




            </div>
            <!--Content Side-->

        </div>
    </div>
</div>



@endsection
@section('script')


@endsection
