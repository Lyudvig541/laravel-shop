<div class="border border-gray-400 rounded shadow-sm mb-4">
    @forelse($this->products as $product)
        <div class="mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset($product->image) }}" width="100" height="100">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{$product->name}}</h5>
                        <p class="card-text">{{$product->description}}</p>
                        <p class="card-text">
                        <div class="input-group">
                            <span class="input-group-text" wire:click="decrease({{ $product->id }})">-</span>
                            <input type="number" class="form-control" value="{{$product->qty}}" wire:change="updateInput({{$product->id}}, $event.target.value)">
                            <span class="input-group-text" wire:click="increase({{ $product->id }})">+</span>
                        </div>
                        </p>
                        <p class="card-text">
                            <strong class="text-muted">{{$product->price}} $</strong>
                        </p>
                        <p class="card-text">
                        <div wire:click="remove({{ $product->id }})" class="flex-shrink cursor-pointer">
                            Delete
                        </div>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <h5 class="card-title">Your basket is empty.</h5>
    @endforelse
    <div class="p-4 flex items-center">
        <div class="flex-auto">
            <strong>Total:</strong> {{ $this->total }} $
        </div>
    </div>
</div>







