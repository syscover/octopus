@extends('pulsar::layouts.form', ['action' => 'store'])

@section('rows')
    <!-- octopus::products.create -->
    @include('pulsar::includes.html.form_text_group', ['label' => 'ID', 'name' => 'id', 'readOnly' => true, 'fieldSize' => 2])
    @include('pulsar::includes.html.form_select_group', ['label' => trans_choice('octopus::pulsar.brand', 1), 'name' => 'brand', 'value' => Input::old('brand'), 'required' => true, 'objects' => $brands, 'idSelect' => 'id_071', 'nameSelect' => 'name_071'])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.name'), 'name' => 'name', 'value' => Input::old('name'), 'maxLength' => '50', 'rangeLength' => '2,50', 'required' => true])
    <!-- /octopus::products.create -->
@stop