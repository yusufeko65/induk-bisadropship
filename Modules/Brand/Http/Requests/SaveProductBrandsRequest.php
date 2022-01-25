<?php

namespace Modules\Brand\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\Brand\Entities\Brand;
use Modules\Core\Http\Requests\Request;

class SaveProductBrandsRequest extends Request
{
    /**
     * Available attributes.
     *
     * @var string
     */
    protected $availableAttributes = 'brand::attributes';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'options.*.name' => 'required_with:options.*.type',
            'options.*.status' => ['required_with:options.*.name', 'boolean'],
        ];
    }

    /**
     * Get filtered options.
     *
     * @return array
     */
    public function options()
    {
        return array_filter($this->options ?? [], function ($option) {
            return ! is_null($option['name']);
        });
    }
}
