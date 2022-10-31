@extends('layouts.app')
@section('content')

<section id="products">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <div class="row">
                    <livewire:frontend.products :categories="$categories" :products="$products" />
                </div>
            </div>

            <div class="col-md-2">
                <div class="row">
                    <label for=""> Product Name </label>
                    <livewire:frontend.basket />
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
