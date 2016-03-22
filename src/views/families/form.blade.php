@extends('pulsar::layouts.form')

@section('rows')
    <!-- octopus::families.create -->
    @include('pulsar::includes.html.form_text_group', [
        'label' => 'ID',
        'name' => 'id',
        'value' => old('id', isset($object)? $object->id_070 : null),
        'readOnly' => true,
        'fieldSize' => 2
    ])
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans('pulsar::pulsar.name'),
        'name' => 'name',
        'value' => old('name', isset($object)? $object->name_070 : null),
        'maxLength' => '50',
        'rangeLength' => '2,50',
        'required' => true
    ])
    <!-- ./octopus::families.create -->
@stop