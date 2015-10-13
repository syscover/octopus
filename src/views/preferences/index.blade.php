@extends('pulsar::layouts.form', ['action' => 'update', 'cancelButton' => false])

@section('script')
    @parent
    <!-- octopus::preferences.index -->
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/plugins/pnotify/jquery.pnotify.default.css') }}">

    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/plugins/pnotify/jquery.pnotify.min.js') }}"></script>
    @include('pulsar::includes.js.success_message')

    <script type="text/javascript">
        $(document).ready(function() {
            $(".custom-select2").select2({
                templateResult: formatState,
                templateSelection: formatState,
                minimumResultsForSearch: -1
            });
        });

        function formatState(option)
        {
            if (!option.id) { return option.text; }
            var $option = $(
                    '<span><i class="color" style="background-color:' + $(option.element).data('color') + '"></i>' + ' ' + option.text + '</span>'
            );
            return $option;
        };
    </script>
    <!-- /octopus::preferences.index -->
@stop

@section('rows')
    <!-- octopus::preferences.index -->
    @include('pulsar::includes.html.form_select_group', ['label' => trans('forms::pulsar.notifications_account'), 'name' => 'notificationsAccount', 'value' => $notificationsAccount->value_018, 'objects' => $accounts, 'idSelect' => 'id_013', 'nameSelect' => 'name_013', 'class' => 'form-control', 'fieldSize' => 5, 'required' => true])
    <!-- /octopus::preferences.index -->
@stop