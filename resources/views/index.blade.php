@extends('layouts.master')
@section('slider')
    <div id="home" class="slider-area">
        <div class="bend niceties preview-2">
        <div id="ensign-nivoslider" class="slides">
            @foreach($slides as $slide)
                <img src="{{asset($slide->photo)}}" alt="" title="#slider-direction-{{$slide->id}}" />
            @endforeach
        </div>
        @foreach($slides as $slide)
            <!-- direction 1 -->
            <div id="slider-direction-{{$slide->id}}" class="slider-direction slider-one">
                <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="slider-content">
                        <!-- layer 1 -->
                        <div class="layer-1-1 hidden-xs wow slideInDown" data-wow-duration="2s" data-wow-delay=".2s">
                        <h2 class="title1">{{$slide->title}}</h2>
                        </div>
                        <!-- layer 2 -->
                        <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                        <h1 class="title2">{{$slide->short_description}}</h1>
                        </div>
                        <!-- layer 3 -->
                        <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                        <a class="ready-btn right-btn page-scroll" href="#services">See Services</a>
                        <a class="ready-btn page-scroll" href="#about">Learn More</a>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>

        @endforeach
        </div>
    </div>
@endsection

@section('about')
  <!-- Start About area -->
  <div id="about" class="about-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>About Us</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- single-well start-->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-left">
            <div class="single-well">
              <a href="#">
                    <img src="{{asset($about->featured_photo)}}" alt="">
                </a>
            </div>
          </div>
        </div>
        <!-- single-well end-->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-middle">
            <div class="single-well">
              <a href="#">
                <h4 class="sec-head">{{$about->title}}</h4>
              </a>
             {!! $about->description !!}
             
            </div>
          </div>
        </div>
        <!-- End col-->
      </div>
    </div>
  </div>
  <!-- End About area -->
@endsection

@section('service')
    <!-- Start Service area -->
    <div id="services" class="services-area area-padding">
        <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline services-head text-center">
                <h2>Our Services</h2>
            </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="services-contents">
            <!-- Start Left services -->
                @foreach($services as $s)
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="about-move">
                        <div class="services-details">
                            <div class="single-services">
                            <a class="services-icon" href="#">
                                <i class="{{$s->icon}}"></i>
                            </a>
                            <h4>{{$s->title}}</h4>
                            <p>
                                {{$s->description}}
                            </p>
                            </div>
                        </div>
                        <!-- end about-details -->
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        </div>
    </div>
    <!-- End Service area -->

@endsection




@section('team')
<div id="team" class="our-team-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>Our special Team</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="team-top">
        @foreach($teams as $team)
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="single-team-member">
              <div class="team-img">
                <a href="#">
										<img src="{{asset($team->photo)}}" alt="">
									</a>
                <div class="team-social-icon text-center">
                  <ul>
                    <li>
                      <a href="#">
													<i class="fa fa-facebook"></i>
												</a>
                    </li>
                    <li>
                      <a href="#">
													<i class="fa fa-twitter"></i>
												</a>
                    </li>
                    <li>
                      <a href="#">
													<i class="fa fa-instagram"></i>
												</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="team-content text-center">
                <h4>{{$team->profile}}</h4>
                <p>{{$team->position}}</p>
              </div>
            </div>
          </div>
        @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection

@section('news')
<div id="blog" class="blog-area">
    <div class="blog-inner area-padding">
      <div class="blog-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Latest News</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- Start Left Blog -->
          @foreach($news as $n)
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="single-blog">
              <div class="single-blog-img">
                <a href="blog.html">
										<img src="{{asset($n->photo)}}" alt="">
									</a>
              </div>
              <div class="blog-meta">
                <span class="comments-type">
										<i class="fa fa-comment-o"></i>
										<a href="#">13 comments</a>
									</span>
                <span class="date-type">
										<i class="fa fa-calendar"></i>2{{$n->created_at}}
									</span>
              </div>
              <div class="blog-text">
                <h4>
                                        <a href="blog.html">{{$n->title}}</a>
									</h4>
                <p>
                  {{$n->description}}
                </p>
              </div>
              <span>
									<a href="blog.html" class="ready-btn">Read more</a>
								</span>
            </div>
            <!-- Start single blog -->
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection