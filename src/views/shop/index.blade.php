@extends('pulsar::layouts.index', ['newTrans' => 'new', 'callback' => 'relatedShop'])

@section('head')
    @parent
    <!-- octopus::shops.index -->
    <script>
        $(document).ready(function() {
            if ($.fn.dataTable)
            {
                $('.datatable-pulsar').dataTable({
                    "displayStart": {{ $offset }},
                    "columnDefs": [

                        @if(isset($modal) && $modal)
                        { "sortable": false, "targets": [6]},
                        { "class": "align-center", "targets": [6]}
                        @else
                        { "sortable": false, "targets": [6,7]},
                        { "class": "checkbox-column", "targets": [6]},
                        { "class": "align-center", "targets": [7]}
                        @endif

                    ],
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        "url": "{{ route('jsonData' . ucfirst($routeSuffix), ['modal' => $modal? 1 : 0]) }}",
                        "type": "POST",
                        "headers": {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        }
                    }
                }).fnSetFilteringDelay();
            }
        });
    </script>
    <!-- /octopus::shops.index -->
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
    <!-- /octopus::shops.index -->
@stop