<?php

namespace Modules\Brand\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\Brand\Entities\Brand;
use Modules\Core\Http\Requests\Request;

class SaveBrandRequest extends Request
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
            'name' => 'required',
            'status' => 'required|boolean',
        ];
    }
}
