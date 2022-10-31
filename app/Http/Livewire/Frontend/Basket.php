<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;

class Basket extends Component
{
    /**
     * @var bool
     */
    public $visible = false;

    /**
     * @var array
     */
    public $basket = [];

    /**
     * @var array
     */
    public $products = [];

    /**
     * @var float
     */
    public $total = 0.00;

    /**
     * @var array
     */
    protected $listeners = [
        'basketUpdated' => 'hydrate',
        'toggleBasket' => 'toggle',
    ];

    /**
     * Hydrate component.
     *
     * @return void
     */
    public function hydrate(): void
    {
        $this->basket = basket()->all();

        $this->products = tap(
            $this->products(),
            fn(Collection $products) => $this->total = $products->sum('total')
        )->toArray();
    }

    /**
     * Get products.
     *
     * @return \Illuminate\Support\Collection
     */
    private function products(): Collection
    {
        if (empty($this->basket)) {
            return new Collection;
        }

        return Product::whereIn('id', array_keys($this->basket))
            ->get()
            ->map(function (Product $product) {
                return (object)[
                    'id' => $product->id,
                    'name' => $product->name,
                    'image' => $product->productImages[0]->image,
                    'description' => $product->description,
                    'price' => $product->price,
                    'qty' => $qty = $this->basket[$product->id],
                    'total' => $product->price * $qty,
                ];
            });
    }

    /**
     * Toggle visibility.
     *
     * @return void
     */
    public function toggle(): void
    {
        $this->visible = !$this->visible;
    }

    /**
     * Remove product.
     *
     * @param  int  $id
     */
    public function remove(int $id): void
    {
        basket()->remove($id);
        $this->update();
    }

    /**
     * Update basket.
     *
     * @return void
     */
    private function update(): void
    {
        $this->emit('basketUpdated');
    }

    /**
     * Increase product quantity.
     *
     * @param  int  $id
     * @return void
     */
    public function increase(int $id): void
    {
        basket()->add($id, $this->basket[$id] + 1);
        $this->update();
    }

    public function updateInput(int $id, $value = 0)
    {
        if ($value > 0){
            basket()->add($id, $value);
            $this->update();
        }else{
            $this->remove($id);
        }
    }

    /**
     * Decrease product quantity.
     *
     * @param  int  $id
     * @return void
     */
    public function decrease(int $id): void
    {
        if (($qty = $this->basket[$id] - 1) < 1) {
            $this->remove($id);
        } else {
            basket()->add($id, $qty);
            $this->update();
        }
    }

    /**
     * Render component.
     *
     * @return \Illuminate\View\View
     */
    public function render(): View
    {
        return view('livewire.frontend.basket');
    }
}
