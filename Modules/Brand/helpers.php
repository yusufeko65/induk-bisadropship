<?php

use Illuminate\Support\HtmlString;

if (! function_exists('brand_name')) {
    function brand_name($option)
    {
        return new HtmlString($option->name . ($option->is_required ? '<span>*</span>' : ''));
    }
}

if (! function_exists('brand_value')) {
    function brand_value($value)
    {
        $price = is_null($value->price->amount())
            ? '' :
            "+ {$value->price->convertToCurrentCurrency()->format()}";

        return new HtmlString("{$value->label} <span class='value-price'>{$price}</span>");
    }
}
