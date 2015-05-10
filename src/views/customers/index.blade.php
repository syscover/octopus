@extends('pulsar::layouts.index', ['newTrans' => 'new'])

@section('script')
    @parent
    <!-- octopus::customers.index -->
    <script type="text/javascript">
        $(document).ready(function() {
            if ($.fn.dataTable)
            {
                $('.datatable-pulsar').dataTable({
                    'iDisplayStart' : {{ $offset }},
                    'aoColumnDefs': [
                        { 'bSortable': false, 'aTargets': [5,6]},
                        { 'sClass': 'checkbox-column', 'aTargets': [5]},
                        { 'sClass': 'align-center', 'aTargets': [6]}
                    ],
                    "bProcessing": true,
                    "bServerSide": true,
                    "sAjaxSource": "{{ route('jsonData' . $routeSuffix) }}"
                }).fnSetFilteringDelay();
            }
        });
    </script>
    <!-- octopus::customers.index -->
@stop

@section('tHead')
    <!-- octopus::customers.index -->
    <tr>
        <th data-hide="phone,tablet">ID.</th>
        <th data-class="phone">{{ trans('pulsar::pulsar.code') }}</th>
        <th data-hide="expand">{{ trans('pulsar::pulsar.company_name') }}</th>
        <th data-class="phone">{{ trans('pulsar::pulsar.email') }}</th>
        <th data-hide="phone">{{ trans('pulsar::pulsar.phone') }}</th>
        <th data-hide="phone">{{ trans_choice('pulsar::pulsar.contact', 1) }}</th>
        <th class="checkbox-column"><input type="checkbox" class="uniform"></th>
        <th>{{ trans_choice('pulsar::pulsar.action', 2) }}</th>
    </tr>
    <!-- /octopus::customers.index -->
@stop