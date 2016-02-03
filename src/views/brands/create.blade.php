@extends('pulsar::layouts.form', ['action' => 'store'])

@section('rows')
    <!-- octopus::brands.create -->
    @include('pulsar::includes.html.form_text_group', ['label' => 'ID', 'name' => 'id', 'readOnly' => true, 'fieldSize' => 2])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.name'), 'name' => 'name', 'value' => old('name'), 'maxLength' => '50', 'rangeLength' => '2,50', 'required' => true])
    <!-- /octopus::brands.create -->
@stop