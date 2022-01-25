@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.edit', ['resource' => trans('brand::options.option')]))
    @slot('subtitle', $option->name)

    <li><a href="{{ route('admin.options.index') }}">{{ trans('brand::options.options') }}</a></li>
    <li class="active">{{ trans('admin::resource.edit', ['resource' => trans('brand::options.option')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.options.update', $option) }}" class="form-horizontal" id="option-edit-form" novalidate>
        {{ csrf_field() }}
        {{ method_field('put') }}

        {!! $tabs->render(compact('brand')) !!}
    </form>
@endsection

@include('brand::admin.options.partials.scripts')
