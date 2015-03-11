@extends('pulsar::layouts.form', ['action' => 'update'])

@section('script')
    @parent
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/plugins/select2/css/select2.min.css') }}">
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/plugins/select2/js/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/plugins/select2/js/i18n/' . config('app.locale') . '.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/plugins/getaddress/js/jquery.getaddress.js') }}"></script>
    <!-- octopus::laboratories.create -->
    <script type="text/javascript">
        $(document).ready(function() {

            $('[name="country"]').data('language', '{{ config('app.locale') }}')

            $.getAddress({
                id:                         '01',
                type:                       'laravel',
                appName:                    'pulsar',
                token:                      '{{ csrf_token() }}',
                lang:                       '{{ config('app.locale') }}',
                highlightCountrys:          ['ES','US'],

                useSeparatorHighlight:      true,
                textSeparatorHighlight:     '------------------',

                countryValue:               '{{ $object->country_073 }}',
                territorialArea1Value:      '{{ $object->territorial_area_1_073 }}',
                territorialArea2Value:      '{{ $object->territorial_area_2_073 }}',
                territorialArea3Value:      '{{ $object->territorial_area_3_073 }}'
            });
        });
    </script>
    <!-- octopus::laboratories.create -->
@stop

@section('rows')
    <!-- octopus::laboratories.edit -->
    @include('pulsar::includes.html.form_text_group', ['label' => 'ID', 'name' => 'id', 'value' => $object->id_073, 'readOnly' => true, 'fieldSize' => 2])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.company_name'), 'name' => 'companyName', 'value' => $object->company_name_073, 'maxLength' => '100', 'rangeLength' => '2,100', 'required' => true])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.tin'), 'name' => 'tin', 'value' => $object->tin_073, 'maxLength' => '50', 'rangeLength' => '2,50', 'required' => false, 'fieldSize' => 4])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.web'), 'name' => 'web', 'value' => $object->web_073, 'maxLength' => '100', 'rangeLength' => '2,100', 'required' => false, 'fieldSize' => 5])
    @include('pulsar::includes.html.form_text_group', ['label' => trans_choice('pulsar::pulsar.contact', 1), 'name' => 'contact', 'value' => $object->contact_073, 'maxLength' => '100', 'rangeLength' => '2,100', 'required' => false, 'fieldSize' => 5])
    @include('pulsar::includes.html.form_select_group', ['label' => trans_choice('pulsar::pulsar.country', 1), 'name' => 'country', 'value' => Input::old('country'), 'required' => false, 'idSelect' => 'id_002', 'nameSelect' => 'name_002', 'class' => 'select2', 'fieldSize' => 4, 'data' => ['language' => config('app.locale')]])
    @include('pulsar::includes.html.form_select_group', ['wrapperId' => 'territorialArea1Wrapper', 'labelId' => 'territorialArea1Label', 'name' => 'territorialArea1', 'value' => Input::old('territorialArea1'), 'required' => false, 'idSelect' => 'id_003', 'nameSelect' => 'name_003', 'class' => 'select2', 'fieldSize' => 4, 'data' => ['language' => config('app.locale')]])
    @include('pulsar::includes.html.form_select_group', ['wrapperId' => 'territorialArea2Wrapper', 'labelId' => 'territorialArea2Label', 'name' => 'territorialArea2', 'value' => Input::old('territorialArea2'), 'required' => false, 'idSelect' => 'id_004', 'nameSelect' => 'name_004', 'class' => 'select2', 'fieldSize' => 4, 'data' => ['language' => config('app.locale')]])
    @include('pulsar::includes.html.form_select_group', ['wrapperId' => 'territorialArea3Wrapper', 'labelId' => 'territorialArea3Label', 'name' => 'territorialArea3', 'value' => Input::old('territorialArea3'), 'required' => false, 'idSelect' => 'id_005', 'nameSelect' => 'name_005', 'class' => 'select2', 'fieldSize' => 4, 'data' => ['language' => config('app.locale')]])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.cp'), 'name' => 'cp', 'value' => $object->cp_073, 'maxLength' => '10', 'rangeLength' => '2,10', 'required' => false, 'fieldSize' => 2])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.locality'), 'name' => 'locality', 'value' => $object->locality_073, 'maxLength' => '100', 'rangeLength' => '2,100', 'required' => false, 'fieldSize' => 4])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.address'), 'name' => 'address', 'value' => $object->address_073, 'maxLength' => '150', 'rangeLength' => '2,150', 'required' => true])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.phone'), 'name' => 'phone', 'value' => $object->phone_073, 'maxLength' => '50', 'rangeLength' => '2,50', 'required' => false, 'fieldSize' => 5])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.email'), 'name' => 'email', 'value' => $object->email_073, 'maxLength' => '100', 'rangeLength' => '2,100', 'required' => false, 'fieldSize' => 5])
    <!-- /octopus::laboratories.edit -->
@stop