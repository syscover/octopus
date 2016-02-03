@extends('pulsar::layouts.form', ['action' => 'update'])

@section('rows')
    <!-- octopus::brands.create -->
    @include('pulsar::includes.html.form_text_group', ['label' => 'ID', 'name' => 'id', 'value' => $object->id_071, 'readOnly' => true, 'fieldSize' => 2])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.name'), 'name' => 'name', 'value' => $object->name_071, 'maxLength' => '50', 'rangeLength' => '2,50', 'required' => true])
    <!-- /octopus::brands.create -->
@stop