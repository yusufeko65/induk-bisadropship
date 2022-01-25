@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('brand::options.options'))

    <li class="active">{{ trans('brand::options.options') }}</li>
@endcomponent

@component('admin::components.page.index_table')
    @slot('buttons', ['create'])
    @slot('resource', 'brands')
    @slot('name', trans('brand::options.option'))

    @slot('thead')
        <tr>
            @include('admin::partials.table.select_all')

            <th>{{ trans('brand::options.table.name') }}</th>
            <th>{{ trans('brand::options.table.type') }}</th>
            <th data-sort>{{ trans('admin::admin.table.created') }}</th>
        </tr>
    @endslot
@endcomponent

@push('scripts')
    <script>
        new DataTable('#options-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                { data: 'name', name: 'translations.name', orderable: false, defaultContent: '' },
                { data: 'type', name: 'type' },
                { data: 'created', name: 'created_at' },
            ],
        });
    </script>
@endpush
