@extends('pulsar::layouts.index', [
    'newTrans' => 'new2',
    'callback' => 'relatedAddress'
])

@section('head')
    @parent
    <!-- octopus::address.index -->
    <script>
        $(document).ready(function() {
            if ($.fn.dataTable)
            {
                $('.datatable-pulsar').dataTable({
                    'displayStart' : {{ $offset }},
                    'columnDefs': [
                        { 'sortable': false, 'targets': [7]},
                        { 'class': 'align-center', 'targets': [6,7]}
                    ],
                    "processing": true,
                    "serverSide": true,
                    "ajax": "{{ route('jsonData' . ucfirst($routeSuffix), ['ref' => $ref, 'modal' => 1, 'modalShopView' => '0', 'redirectParentJs' => 0]) }}"
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