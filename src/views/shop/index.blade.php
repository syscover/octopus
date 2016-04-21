@extends('pulsar::layouts.index', ['newTrans' => 'new', 'callback' => 'relatedShop'])

@section('head')
    @parent
    <!-- octopus::shops.index -->
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
    <!-- /.octopus::shops.index -->
@stop

@section('tHead')
    <!-- octopus::shops.index -->
    <tr>
        <th data-hide="phone,tablet">ID.</th>
        <th data-hide="phone">{{ trans_choice('pulsar::pulsar.customer', 1) }}</th>
        <th data-class="expand">{{ trans('pulsar::pulsar.name') }}</th>
        <th data-hide="phone">{{ trans_choice('pulsar::pulsar.territorial_area', 1) }} 2</th>
        <th data-hide="phone">{{ trans_choice('pulsar::pulsar.address', 1) }}</th>
        <th data-hide="phone">{{ trans('pulsar::pulsar.locality') }}</th>
        @if(! isset($modal) || isset($modal) && !$modal)
            <th class="checkbox-column"><input type="checkbox" class="uniform"></th>
        @endif
        <th>{{ trans_choice('pulsar::pulsar.action', 2) }}</th>
    </tr>
    <!-- /.octopus::shops.index -->
@stop