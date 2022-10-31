<div>
    <div class="row">
        Search by Product Type &nbsp; => &nbsp;

        <select wire:model="category_id" name="category_id">
            <option value="">All</option>
            @forelse($categories as $cat)
                <option value="{{$cat->id}}">{{$cat->name}}</option>
            @empty
                <option>No categories Available</option>
            @endforelse
        </select>

    </div>
    <div class="row">
        @forelse ($products as $productItem)
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card">
                    <img src="{{ asset($productItem->productImages[0]->image) }}"  alt="">
                    <div class="brand">
                        <p>{{$productItem->description}}</p>
                    </div>

                    <div class="inline">
                        <h5>{{$productItem->name}}</h5>
                        <h4 class="pricing"> {{$productItem->price}}$</h4>
                    </div>
                    <div class="details">
                        <p>Weight: <span>{{$productItem->small_description}}</span></p>
                    </div>
                    @livewire('frontend.add-to-basket-button', ['productId' => $productItem->id], key($productItem->id))
                </div>
            </div>
            @empty
            <div class="col-md-12">
                <h5> No Products Available</h5>
            </div>
        @endforelse
    </div>
</div>

