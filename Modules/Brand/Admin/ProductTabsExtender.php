<?php

namespace Modules\Brand\Admin;

use Modules\Admin\Ui\Tab;
use Modules\Admin\Ui\Tabs;
use Modules\Brand\Entities\Brand;

class ProductTabsExtender
{
    public function extend(Tabs $tabs)
    {
        $tabs->group('advanced_information')
            ->add($this->options());
    }

    private function options()
    {
        if (! auth()->user()->hasAccess(['admin.options.create', 'admin.options.edit'])) {
            return;
        }

        return tap(new Tab('options', trans('brand::options.tabs.product.options')), function (Tab $tab) {
            $tab->weight(35);

            $tab->fields([
                'options.*.name',
                'options.*.status',
            ]);

            $tab->view('brand::admin.products.tabs.options', [
                'globalOptions' => Option::globals()->get(),
            ]);
        });
    }
}
