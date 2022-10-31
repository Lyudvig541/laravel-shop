<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Illuminate\View\View;

class AddToBasketButton extends Component
{
    /**$productItem
     * @var int
     */
    public $qty = 1;

    /**
     * @var int|mixed
     */
    public $productId;

    /**
     * @var int
     */
    public $currentQty = 0;

    /**
     * Mount component.
     *
     * @param  int  $productId
     */
    public function mount(int $productId): void
    {
        $this->productId = $productId;
    }

    /**
     * Hydrate component.
     *
     * @return void
     */
    public function hydrate(): void
    {
        $this->currentQty = basket()->getCurrentQty($this->productId);
    }

    /**
     * Add product to the basket.
     *
     * @return void
     */
    public function add(): void
    {
        $qty = $this->currentQty + (int) $this->qty;

        if ($qty < 1) {
            return;
        }

        basket()->add($this->productId, $qty);
        $this->qty = 1;
        $this->emit('basketUpdated');
    }

    /**
     * Render component.
     *
     * @return \Illuminate\View\View
     */
    public function render(): View
    {
        return view('livewire.frontend.add-to-basket-button');
    }
}
