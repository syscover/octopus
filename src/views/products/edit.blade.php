@extends('pulsar::layouts.form', ['action' => 'update'])

@section('rows')
    <!-- octopus::products.create -->
    @include('pulsar::includes.html.form_text_group', ['label' => 'ID', 'name' => 'id', 'value' => $object->id_072, 'readOnly' => true, 'fieldSize' => 2])
    @include('pulsar::includes.html.form_select_group', ['label' => trans_choice('octopus::pulsar.brand', 1), 'name' => 'brand', 'value' => $object->brand_072, 'required' => true, 'objects' => $brands, 'idSelect' => 'id_071', 'nameSelect' => 'name_071'])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.name'), 'name' => 'name', 'value' => $object->name_072, 'maxLength' => '50', 'rangeLength' => '2,50', 'required' => true])
    <!-- /octopus::products.create -->
@stop