<div class="row">
    <div class="col-md-8">
        {{ Form::checkbox('raja_ongkir_enabled', trans('setting::attributes.raja_ongkir_enabled'), trans('setting::settings.form.enable_raja_ongkir'), $errors, $settings) }}
        {{ Form::text('translatable[raja_ongkir_label]', trans('setting::attributes.translatable.raja_ongkir_label'), $errors, $settings, ['required' => true]) }}
        {{ Form::number('raja_ongkir_min_amount', trans('setting::attributes.raja_ongkir_min_amount'), $errors, $settings) }}
    </div>
</div>
