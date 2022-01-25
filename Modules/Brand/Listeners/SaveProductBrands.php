<?php

namespace Modules\Brand\Listeners;

use Modules\Product\Entities\Product;
use Modules\Brand\Http\Requests\SaveProductBrandsRequest;

class SaveProductOptions
{
    /**
     * The instance of the request.
     *
     * @var \Modules\Option\Http\Requests\SaveProductOptionsRequest
     */
    private $request;

    /**
     * Create a new instance.
     *
     * @param \Modules\Option\Http\Requests\SaveProductOptionsRequest $request
     */
    public function __construct(SaveProductBrandsRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     *
     * @param \Modules\Product\Entities\Product $product
     * @return void
     */
    public function handle($product)
    {
        $ids = $this->getDeleteCandidates($product);

        if ($ids->isNotEmpty()) {
            $product->options()->detach($ids);
        }

        $this->saveOptions($product);
    }

    private function getDeleteCandidates($product)
    {
        return $product->options()
            ->pluck('id')
            ->diff(array_pluck($this->request->options(), 'id'));
    }

    private function saveOptions($product)
    {
        foreach (array_reset_index($this->request->options()) as $index => $attributes) {

            $option = $product->options()->updateOrCreate(['id' => $attributes['id']], $attributes);

            $option->saveValues($attributes['values'] ?? []);
        }
    }
}
