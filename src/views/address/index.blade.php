@extends('pulsar::layouts.index', ['newTrans' => 'new', 'callback' => 'relatedAddress'])

@section('head')
    @parent
    <!-- octopus::address.index -->
    <script>
        $(document).ready(function() {
            if ($.fn.dataTable)
            {
                $('.datatable-pulsar').dataTable({
                    'iDisplayStart' : {{ $offset }},
                    'aoColumnDefs': [
                        { 'bSortable': false, 'aTargets': [7]},
                        { 'sClass': 'align-center', 'aTargets': [6,7]}
                    ],
                    "bProcessing": true,
                    "bServerSide": true,
                    "sAjaxSource": "{{ route('jsonData' . ucfirst($routeSuffix), ['ref' => $ref, 'modal' => 1]) }}"
                }).fnSetFilteringDelay();
            }
        });
    </script>
    <!-- octopus::address.index -->
@stop

@section('tHead')
    <!-- octopus::address.index -->
    <tr>
        <th data-hide="phone,tablet">ID.</th>
        <th data-hide="phone">{{ trans('pulsar::pulsar.alias') }}</th>
        <th data-class="expand">{{ trans_choice('pulsar::pulsar.address', 1) }}</th>
        <th data-hide="phone">{{ trans('pulsar::pulsar.locality') }}</th>
        <th data-hide="phone">{{ trans_choice('pulsar::pulsar.email', 1) }}</th>
        <th data-hide="phone">{{ trans('pulsar::pulsar.phone') }}</th>
        <th data-hide="phone">{{ trans('pulsar::pulsar.favorite') }}</th>
        <th>{{ trans_choice('pulsar::pulsar.action', 2) }}</th>
    </tr>
    <!-- /octopus::address.index -->
@stop