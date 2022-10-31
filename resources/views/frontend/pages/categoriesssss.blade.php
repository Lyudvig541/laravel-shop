@extends('layouts.app')

@section('title', 'All Categories')

@section('content')

<section id="categories">
    <div class="container-fluid px-4">
        <div class="row gx-5">
            @forelse ($categories as $categoryItem)
            <div class="col-md-3">
                <div class="category-row">
                    <h3>{{$categoryItem->name}}</h3>
                    <p>{{$categoryItem->description}}</p>
                </div>
            </div>
            <div class="col-md-2 card">
                <img src="#" width="300px" height="250px" alt="">
                <h4>Name of the product</h4>
            </div>
            {{-- <div class="col-md-2 card">
                <img src="{{ asset('assets/img/coffee.jpg') }}" width="300px" height="250px" alt="">
                <h4>Coffee</h4>
            </div>
            <div class="col-md-2 card">
                <img src="{{ asset('assets/img/coffee.jpg') }}" width="300px" height="250px" alt="">
                <h4>Coffee</h4>
            </div>
            <div class="col-md-2 card">
                <img src="{{ asset('assets/img/coffee.jpg') }}" width="300px" height="250px" alt="">
                <h4>Coffee</h4>
            </div> --}}
            @empty
            <div class="col-md-12">
                <h5> No categories Available</h5>
            </div>
            @endforelse
        </div>
    </div>
</section>

@endsection