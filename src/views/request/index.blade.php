@extends('pulsar::layouts.index', ['newTrans' => 'new2'])

@section('head')
    @parent
    <!-- octopus::requests.index -->
    <script>
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
                }).fnSetFilteringDelay()
            }
        })

        $.createOrder = function(that)
        {
            var message = '{{ trans('octopus::pulsar.message_create_order') }}'

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
    <!-- /.octopus::requests.index -->
@stop

@section('tHead')
    <!-- octopus::requests.index -->
    <tr>
        <th data-hide="phone,tablet">ID.</th>
        <th>{{ trans_choice('pulsar::pulsar.date', 1) }}</th>
        <th data-hide="phone">{{ trans('pulsar::pulsar.code') }}</th>
        <th data-class="expand">{{ trans_choice('octopus::pulsar.shop', 1) }}</th>
        <th data-hide="phone">{{ trans_choice('octopus::pulsar.product', 1) }}</th>
        <th data-hide="phone">{{ trans('pulsar::pulsar.email') }}</th>
        <th data-hide="phone">{{ trans_choice('pulsar::pulsar.phone', 1) }}</th>
        <th class="checkbox-column"><input type="checkbox" class="uniform"></th>
        <th>{{ trans_choice('pulsar::pulsar.action', 2) }}</th>
    </tr>
    <!-- /.octopus::requests.index -->
@stop