@extends('pulsar::layouts.index', ['newTrans' => 'new'])

@section('head')
    @parent
    <!-- octopus::customers.index -->
    <script>
        $(document).ready(function() {
            if ($.fn.dataTable)
            {
                $('.datatable-pulsar').dataTable({
                    'iDisplayStart' : {{ $offset }},
                    'aoColumnDefs': [
                        @if(isset($modal) && $modal)
                        { 'bSortable': false, 'aTargets': [6]},
                        { 'sClass': 'align-center', 'aTargets': [6]}
                        @else
                        { 'bSortable': false, 'aTargets': [6,7]},
                        { 'sClass': 'checkbox-column', 'aTargets': [6]},
                        { 'sClass': 'align-center', 'aTargets': [7]}
                        @endif
                    ],
                    "bProcessing": true,
                    "bServerSide": true,
                    "sAjaxSource": "{{ route('jsonData' . ucfirst($routeSuffix), ['modal' => $modal? 1 : 0]) }}"
                }).fnSetFilteringDelay();
            }
        });
    </script>
    <!-- /.octopus::customers.index -->
@stop

@section('tHead')
    <!-- octopus::customers.index -->
    <tr>
        <th data-hide="phone,tablet">ID.</th>
        <th data-class="expand">{{ trans('pulsar::pulsar.code') }}</th>
        <th data-hide="phone">{{ trans('pulsar::pulsar.company_name') }}</th>
        <th data-hide="phone">{{ trans('pulsar::pulsar.email') }}</th>
        <th data-hide="phone">{{ trans('pulsar::pulsar.phone') }}</th>
        <th data-hide="phone">{{ trans_choice('pulsar::pulsar.contact', 1) }}</th>
        @if(!isset($modal) || isset($modal) && !$modal)
        <th class="checkbox-column"><input type="checkbox" class="uniform"></th>
        @endif
        <th>{{ trans_choice('pulsar::pulsar.action', 2) }}</th>
    </tr>
    <!-- /.octopus::customers.index -->
@stop