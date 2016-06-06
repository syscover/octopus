@extends('pulsar::layouts.index', ['newTrans' => 'new'])

@section('head')
    @parent
    <!-- octopus::laboratory.index -->
    <script>
        $(document).ready(function() {
            if ($.fn.dataTable)
            {
                $('.datatable-pulsar').dataTable({
                    'displayStart' : {{ $offset }},
                    'columnDefs': [
                        { 'sortable': false, 'targets': [5,6]},
                        { 'class': 'checkbox-column', 'targets': [5]},
                        { 'class': 'align-center', 'targets': [6]}
                    ],
                    "processing": true,
                    "serverSide": true,
                    "ajax": "{{ route('jsonData' . ucfirst($routeSuffix)) }}"
                }).fnSetFilteringDelay();
            }
        });
    </script>
    <!-- /.octopus::laboratory.index -->
@stop

@section('tHead')
    <!-- octopus::laboratory.index -->
    <tr>
        <th data-hide="phone,tablet">ID.</th>
        <th data-hide="expand">{{ trans('pulsar::pulsar.company_name') }}</th>
        <th data-class="phone">{{ trans('pulsar::pulsar.email') }}</th>
        <th data-hide="phone">{{ trans('pulsar::pulsar.phone') }}</th>
        <th data-hide="phone">{{ trans_choice('pulsar::pulsar.contact', 1) }}</th>
        <th class="checkbox-column"><input type="checkbox" class="uniform"></th>
        <th>{{ trans_choice('pulsar::pulsar.action', 2) }}</th>
    </tr>
    <!-- /.octopus::laboratory.index -->
@stop