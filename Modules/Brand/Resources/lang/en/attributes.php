<?php

return [
    'name' => 'Name',
    'type' => 'Type',
    'is_required' => 'Required',
    'label' => 'Label',
    'price' => 'Price',
    'price_type' => 'Price Type',

    // Validations
    'values.*.label' => 'Label',
    'values.*.price' => 'Price',
    'values.*.price_type' => 'Price Type',

    'brands.*.name' => 'Name',
    'brands.*.type' => 'Type',
    'brands.*.values.*.label' => 'Label',
    'brands.*.values.*.price' => 'Price',
    'brands.*.values.*.price_type' => 'Price Type',
];
