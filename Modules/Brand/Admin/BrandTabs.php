<?php

namespace Modules\Brand\Admin;

use Modules\Admin\Ui\Tab;
use Modules\Admin\Ui\Tabs;

class BrandTabs extends Tabs
{
    public function make()
    {
        $this->group('option_information', trans('brand::options.tabs.group.option_information'))
            ->active()
            ->add($this->general())
            ->add($this->values());
    }

    private function general()
    {
        return tap(new Tab('general', trans('brand::options.tabs.general')), function (Tab $tab) {
            $tab->active();
            $tab->weight(10);
            $tab->fields(['name', 'type', 'is_required']);
            $tab->view('brand::admin.options.tabs.general');
        });
    }

    private function values()
    {
        return tap(new Tab('values', trans('brand::options.tabs.values')), function (Tab $tab) {
            $tab->weight(20);
            $tab->fields(['values.*.label', 'values.*.price', 'values.*.price_type']);
            $tab->view('brand::admin.options.tabs.values');
        });
    }
}
