@extends('pulsar::layouts.index', ['newTrans' => 'new', 'newButton' => false])

@section('script')
    @parent
    <!-- octopus::orders.index -->
    <script type="text/javascript">
        $(document).ready(function() {
            if ($.fn.dataTable)
            {
                $('.datatable-pulsar').dataTable({
                    'iDisplayStart' : {{ $offset }},
                    'aaSorting': [[ 0, "desc" ]],
                    'aoColumnDefs': [
                        { 'bSortable': false, 'aTargets': [7,8]},
                        { 'sClass': 'checkbox-column', 'aTargets': [7]},
                        { 'sClass': 'align-center', 'aTargets': [8]}
                    ],
                    "bProcessing": true,
                    "bServerSide": true,
                    "sAjaxSource": "{{ route('jsonData' . ucfirst($routeSuffix)) }}"
                }).fnSetFilteringDelay();
            }
        });
    </script>
    <!-- octopus::orders.index -->
@stop

@section('tHead')
    <!-- octopus::orders.index -->
    <tr>
        <th data-hide="phone,tablet">ID.</th>
        <th>{{ trans('pulsar::pulsar.date') }}</th>
        <th data-hide="phone">{{ trans('pulsar::pulsar.code') }}</th>
        <th data-class="expand">{{ trans('pulsar::pulsar.name') }}</th>
        <th data-hide="phone">{{ trans_choice('octopus::pulsar.product', 1) }}</th>
        <th data-hide="phone">{{ trans('pulsar::pulsar.email') }}</th>
        <th data-hide="phone">{{ trans_choice('pulsar::pulsar.phone', 1) }}</th>
        <th class="checkbox-column"><input type="checkbox" class="uniform"></th>
        <th>{{ trans_choice('pulsar::pulsar.action', 2) }}</th>
    </tr>
    <!-- /octopus::orders.index -->
@stop