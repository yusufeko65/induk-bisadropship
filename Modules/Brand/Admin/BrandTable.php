<?php

namespace Modules\Brand\Admin;

use Modules\Admin\Ui\AdminTable;

class BrandTable extends AdminTable
{
    /**
     * Make table response for the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function make()
    {
        return $this->newTable()
            ->editColumn('type', function ($option) {
                return trans("brand::options.form.option_types.{$option->type}");
            })
            ->removeColumn('values');
    }
}
