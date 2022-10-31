@extends('layouts.app')

@section('title', 'Home')

@section('content')

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">

        @foreach ($sliders as $key => $sliderItem)

        <div class="carousel-item {{ $key == '0' ? 'active':'' }}">
            @if ($sliderItem->image)
            <img src="{{ asset("$sliderItem->image") }}" class="d-block w-100" height="500px"
                alt="Trithea Slider Image">
            @endif
            <div class="carousel-caption d-none d-md-block">
                <h5>{{$sliderItem->title}}</h5>
                <p>{{$sliderItem->description}}</p>
            </div>
        </div>
        @endforeach

    </div>


    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

    <header class="bg-dark py-5">
        <div class="container px-5">
            <div class="row gx-5 align-items-center justify-content-center">
                <div class="col-lg-8 col-xl-7 col-xxl-6">
                    <div class="my-5 text-center text-xl-start">
                        <h1 class="display-5 fw-bolder text-white mb-2">A Bootstrap 5 template for modern businesses
                        </h1>
                        <p class="lead fw-normal text-white-50 mb-4">Quickly design and customize responsive
                            mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit!
                        </p>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                            <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#features">Get Started</a>
                            <a class="btn btn-outline-light btn-lg px-4" href="#!">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5"
                        src="https://dummyimage.com/600x400/343a40/6c757d" alt="..." /></div>
            </div>
        </div>
    </header>

    <section id="about">
        <div class="container">
            <div class="row gx-5">
                <div class="col-md-6 col-sm-12">
                    <h2> About Double U Trading </h2>
                    <p>Double U trading is a dynamic, diversified business group of companies operating in the Middle East and North Africa. The company was founded in 2015, and since then it is committed towards the continuous development and search for innovation. By investing
                        in a wide range of industries, countries and asset classes the Group takes advantage of the varying economic conditions and gains the ability to capitalize on many emerging economies. </p>
                    <button class="btn"> Learn More </button>
                </div>
                <div class="col-md-6 col-sm-12">
                    <img src="{{ asset('assets/img/aboutus.jpeg') }}" class="float-r" alt="W trading">
                </div>
            </div>
        </div>
    </section>

    <section id="">
        {{-- @include('frontend.inc.cat') --}}
    </section>

    <section id="categories">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4">All Our Avaiolable Product Categories</h4>
                </div>
                @forelse ($categories as $categoryItem)
                <div class="col-6 col-md-3">
                    <div class="category-card">
                        <a href="{{ url('/categories/'.$categoryItem->slug) }}">
                            <div class="category-card-img">
                                <img src="{{ asset("$categoryItem->image") }}" class="w-100" alt="{{$categoryItem->name}}">
                            </div>
                            <div class="category-card-body">
                                <h5>{{$categoryItem->name}}</h5>
                            </div>
                        </a>
                    </div>
                </div>
                @empty
                    <div class="col-md-12">
                        <h5> No categories Available</h5>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    @endsection
