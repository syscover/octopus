@extends('pulsar::layouts.index')

@section('head')
    @parent
    <!-- octopus::product.index -->
    <script>
        $(document).ready(function() {
            if ($.fn.dataTable)
            {
                $('.datatable-pulsar').dataTable({
                    "displayStart": {{ $offset }},
                    "columnDefs": [
                        { "sortable": false, "targets": [4,5]},
                        { "class": "checkbox-column", "targets": [4]},
                        { "class": "align-center", "targets": [3,5]}
                    ],
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        "url": "{{ route('jsonData' . ucfirst($routeSuffix)) }}",
                        "type": "POST",
                        "headers": {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        }
                    }
                }).fnSetFilteringDelay();
            }
        });
    </script>
    <!-- /.octopus::product.index -->
@stop

@section('tHead')
    <!-- octopus::product.index -->
    <tr>
        <th data-hide="phone,tablet">ID.</th>
        <th data-hide="phone">{{ trans_choice('octopus::pulsar.brand', 1) }}</th>
        <th data-class="expand">{{ trans('pulsar::pulsar.name') }}</th>
        <th>{{ trans('pulsar::pulsar.active') }}</th>
        <th class="checkbox-column"><input type="checkbox" class="uniform"></th>
        <th>{{ trans_choice('pulsar::pulsar.action', 2) }}</th>
    </tr>
    <!-- /.octopus::product.index -->
@stop