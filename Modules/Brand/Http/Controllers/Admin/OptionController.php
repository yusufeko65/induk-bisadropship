<?php

namespace Modules\Brand\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Modules\Brand\Entities\Brand;
use Modules\Admin\Traits\HasCrudActions;
use Modules\Brand\Http\Requests\SaveOptionRequest;

class OptionController extends Controller
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = Brand::class;

    /**
     * Label of the resource.
     *
     * @var string
     */
    protected $label = 'brand::options.option';

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'brand::admin.options';

    /**
     * Form requests for the resource.
     *
     * @var array|string
     */
    protected $validation = SaveOptionRequest::class;
}
