@extends('pulsar::layouts.form', ['action' => 'update', 'cancelButton' => false])

@section('head')
    @parent
    <!-- octopus::preference.index -->
    @include('pulsar::includes.js.messages')
    <!-- /.octopus::preference.index -->
@stop

@section('rows')
    <!-- octopus::preference.index -->
    @include('pulsar::includes.html.form_select_group', [
        'label' => trans('pulsar::pulsar.notifications_account'),
        'name' => 'notificationsAccount',
        'value' => (int)$notificationsAccount->value_018,
        'objects' => $accounts,
        'idSelect' => 'id_013',
        'nameSelect' => 'name_013',
        'fieldSize' => 5,
        'required' => true
    ])
    <!-- /.octopus::preference.index -->
@stop