@extends('pulsar::layouts.index')

@section('head')
    @parent
    <!-- octopus::customers.index -->
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