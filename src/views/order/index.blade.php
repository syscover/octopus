@extends('pulsar::layouts.index', ['newTrans' => 'new'])

@section('head')
    @parent
    <!-- octopus::order.index -->
    <script>
        $(document).ready(function() {
            if ($.fn.dataTable)
            {
                $('.datatable-pulsar').dataTable({
                    "displayStart": {{ $offset }},
                    "sorting": [[0, "desc"]],
                    "columnDefs": [
                    @if($viewParameters['checkBoxColumn'])
                        { "sortable": false, "targets": [7,8]},
                        { "class": "checkbox-column", "targets": [7]},
                        { "class": "align-center", "targets": [8]}
                    @else
                        { "sortable": false, "targets": [7]},
                        { "class": "align-center", "targets": [7]}
                    @endif
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
        })

        $.createStock = function(that)
        {
            var message = '{{ trans('octopus::pulsar.message_create_stock') }}'

            $.msgbox(message.replace('%id%', $(that).data('id')), {
                    type:'confirm',
                    buttons: [
                        {type: 'submit', value: '{{ trans('pulsar::pulsar.accept') }}'},
                        {type: 'cancel', value: '{{ trans('pulsar::pulsar.cancel') }}'}
                    ]
                },
                function(buttonPressed) {
                    if(buttonPressed == '{{ trans('pulsar::pulsar.accept') }}')
                    {
                        $(location).attr('href', $(that).data('href'))
                    }
                }
            )
        }
    </script>
    <!-- /.octopus::order.index -->
@stop

@section('tHead')
    <!-- octopus::order.index -->
    <tr>
        <th data-hide="phone,tablet">ID.</th>
        <th>{{ trans_choice('pulsar::pulsar.date', 1) }}</th>
        <th data-hide="phone">{{ trans('pulsar::pulsar.code') }}</th>
        <th data-class="expand">{{ trans_choice('octopus::pulsar.shop', 1) }}</th>
        <th data-hide="phone">{{ trans_choice('pulsar::pulsar.address', 1) }}</th>
        <th data-hide="phone">{{ trans('pulsar::pulsar.locality') }}</th>
        <th data-hide="phone">{{ trans_choice('octopus::pulsar.product', 1) }}</th>
        @if($viewParameters['checkBoxColumn'])
            <th class="checkbox-column"><input type="checkbox" class="uniform"></th>
        @endif
        <th>{{ trans_choice('pulsar::pulsar.action', 2) }}</th>
    </tr>
    <!-- /.octopus::order.index -->
@stop