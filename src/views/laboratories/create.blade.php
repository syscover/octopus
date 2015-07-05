@extends('pulsar::layouts.form', ['action' => 'store'])

@section('script')
    @parent
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/jquery.select2/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/jquery.select2.custom/css/select2.css') }}">

    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/jquery.select2.custom/js/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/jquery.select2/js/i18n/' . config('app.locale') . '.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/getaddress/js/jquery.getaddress.js') }}"></script>
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

                countryValue:               '{{ Input::old('country') }}',
                territorialArea1Value:      '{{ Input::old('territorialArea1') }}',
                territorialArea2Value:      '{{ Input::old('territorialArea2') }}',
                territorialArea3Value:      '{{ Input::old('territorialArea3') }}'
            });
        });
    </script>
    <!-- octopus::laboratories.create -->
@stop

@section('rows')
    <!-- octopus::laboratories.create -->
    @include('pulsar::includes.html.form_text_group', ['label' => 'ID', 'name' => 'id', 'readOnly' => true, 'fieldSize' => 2])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.company_name'), 'name' => 'companyName', 'value' => Input::old('companyName'), 'maxLength' => '100', 'rangeLength' => '2,100', 'required' => true])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.tin'), 'name' => 'tin', 'value' => Input::old('tin'), 'maxLength' => '50', 'rangeLength' => '2,50', 'fieldSize' => 4])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.web'), 'name' => 'web', 'value' => Input::old('web'), 'maxLength' => '100', 'rangeLength' => '2,100', 'fieldSize' => 5])
    @include('pulsar::includes.html.form_text_group', ['label' => trans_choice('pulsar::pulsar.contact', 1), 'name' => 'contact', 'value' => Input::old('contact'), 'maxLength' => '100', 'rangeLength' => '2,100', 'fieldSize' => 5])
    @include('pulsar::includes.html.form_select_group', ['label' => trans_choice('pulsar::pulsar.country', 1), 'name' => 'country', 'required' => true, 'idSelect' => 'id_002', 'nameSelect' => 'name_002', 'class' => 'select2', 'fieldSize' => 4, 'data' => ['language' => config('app.locale')]])
    @include('pulsar::includes.html.form_select_group', ['conteinerId' => 'territorialArea1Wrapper', 'labelId' => 'territorialArea1Label', 'name' => 'territorialArea1', 'class' => 'select2', 'fieldSize' => 4, 'data' => ['language' => config('app.locale')]])
    @include('pulsar::includes.html.form_select_group', ['conteinerId' => 'territorialArea2Wrapper', 'labelId' => 'territorialArea2Label', 'name' => 'territorialArea2', 'class' => 'select2', 'fieldSize' => 4, 'data' => ['language' => config('app.locale')]])
    @include('pulsar::includes.html.form_select_group', ['conteinerId' => 'territorialArea3Wrapper', 'labelId' => 'territorialArea3Label', 'name' => 'territorialArea3', 'class' => 'select2', 'fieldSize' => 4, 'data' => ['language' => config('app.locale')]])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.cp'), 'name' => 'cp', 'value' => Input::old('cp'), 'maxLength' => '10', 'rangeLength' => '2,10', 'fieldSize' => 2])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.locality'), 'name' => 'locality', 'value' => Input::old('locality'), 'maxLength' => '100', 'rangeLength' => '2,100', 'fieldSize' => 4])
    @include('pulsar::includes.html.form_text_group', ['label' => trans_choice('pulsar::pulsar.address', 1), 'name' => 'address', 'value' => Input::old('address'), 'maxLength' => '150', 'rangeLength' => '2,150', 'required' => true])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.phone'), 'name' => 'phone', 'value' => Input::old('phone'), 'maxLength' => '50', 'rangeLength' => '2,50', 'fieldSize' => 5])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.email'), 'name' => 'email', 'value' => Input::old('email'), 'maxLength' => '100', 'rangeLength' => '2,100', 'fieldSize' => 5])
    <!-- /octopus::laboratories.create -->
@stop