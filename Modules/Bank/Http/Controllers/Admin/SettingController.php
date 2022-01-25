<?php

namespace Modules\Bank\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Modules\Bank\Entities\Bank;
use Modules\Admin\Ui\Facades\TabManager;
use Modules\Bank\Http\Requests\UpdateSettingRequest;

class SettingController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $settings = setting()->all();
        $tabs = TabManager::get('settings');

        return view('setting::admin.banks.edit', compact('banks', 'tabs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSettingRequest $request)
    {
        setting($request->except('_token', '_method'));

        return redirect(non_localized_url())
            ->with('success', trans('admin::messages.resource_saved', ['resource' => trans('bank::banks.banks')]));
    }
}
