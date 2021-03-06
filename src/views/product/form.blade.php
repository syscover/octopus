@extends('pulsar::layouts.form')

@section('rows')
    <!-- octopus::product.create -->
    @include('pulsar::includes.html.form_text_group', [
        'fieldSize' => 2,
        'label' => 'ID',
        'name' => 'id',
        'value' => old('id', isset($object)? $object->id_072 : null),
        'readOnly' => true
    ])
    @include('pulsar::includes.html.form_select_group', [
        'fieldSize' => 5,
        'label' => trans_choice('octopus::pulsar.brand', 1),
        'name' => 'brand',
        'value' => old('brand', isset($object)? $object->brand_id_072 : null),
        'required' => true,
        'objects' => $brands,
        'idSelect' => 'id_071',
        'nameSelect' => 'name_071'
    ])
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans('pulsar::pulsar.name'),
        'name' => 'name',
        'value' => old('name', isset($object)? $object->name_072 : null),
        'maxLength' => '50',
        'rangeLength' => '2,50',
        'required' => true
    ])
    @include('pulsar::includes.html.form_checkbox_group', [
        'label' => trans('pulsar::pulsar.active'),
        'name' => 'active',
        'value' => 1,
        'checked' => old('active', isset($object->active_072)? $object->active_072 : true)
    ])
    <!-- /octopus::product.create -->
@stop