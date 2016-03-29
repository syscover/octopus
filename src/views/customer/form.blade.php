@extends('pulsar::layouts.form')

@section('head')
    @parent
    <!-- octopus::customer.create -->
    <script src="{{ asset('packages/syscover/pulsar/vendor/getaddress/js/jquery.getaddress.js') }}"></script>
    <script>
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

                countryValue:               '{{ old('country', isset($object->country_075)? $object->country_075 : null) }}',
                territorialArea1Value:      '{{ old('territorialArea1', isset($object->territorial_area_1_075)? $object->territorial_area_1_075 : null) }}',
                territorialArea2Value:      '{{ old('territorialArea2', isset($object->territorial_area_2_075)? $object->territorial_area_2_075 : null) }}',
                territorialArea3Value:      '{{ old('territorialArea3', isset($object->territorial_area_3_075)? $object->territorial_area_3_075 : null) }}'
            });
        });
    </script>
    <!-- ./octopus::customer.create -->
@stop

@section('rows')
    <!-- octopus::customer.create -->
    @include('pulsar::includes.html.form_text_group', [
        'fieldSize' => 2,
        'label' => 'ID',
        'name' => 'id',
        'value' => isset($object->id_075)? $object->id_075 : null,
        'readOnly' => true
    ])
    @include('pulsar::includes.html.form_text_group', [
        'fieldSize' => 4,
        'label' => trans('pulsar::pulsar.code'),
        'name' => 'code',
        'value' => old('code', isset($object->code_075)? $object->code_075 : null),
        'maxLength' => '50',
        'rangeLength' => '2,50'
    ])
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans('pulsar::pulsar.company_name'),
        'name' => 'companyName',
        'value' => old('companyName', isset($object->company_name_075)? $object->company_name_075 : null),
        'maxLength' => '100',
        'rangeLength' => '2,100',
        'required' => true
    ])
    @include('pulsar::includes.html.form_text_group', [
        'fieldSize' => 4,
        'label' => trans('pulsar::pulsar.tin'),
        'name' => 'tin',
        'value' => old('tin', isset($object->tin_075)? $object->tin_075 : null),
        'maxLength' => '50',
        'rangeLength' => '2,50'
    ])
    @include('pulsar::includes.html.form_text_group', [
        'fieldSize' => 5,
        'label' => trans('pulsar::pulsar.web'),
        'name' => 'web',
        'value' => old('web', isset($object->web_075)? $object->web_075 : null),
        'maxLength' => '100',
        'rangeLength' => '2,100'
    ])
    @include('pulsar::includes.html.form_text_group', [
        'fieldSize' => 5,
        'label' => trans_choice('pulsar::pulsar.contact', 1),
        'name' => 'contact',
        'value' => old('contact', isset($object->contact_075)? $object->contact_075 : null),
        'maxLength' => '100',
        'rangeLength' => '2,100'
    ])
    @include('pulsar::includes.html.form_select_group', [
        'fieldSize' => 4,
        'label' => trans_choice('pulsar::pulsar.country', 1),
        'name' => 'country',
        'required' => true,
        'idSelect' => 'id_002',
        'nameSelect' => 'name_002',
        'class' => 'select2',
        'data' => [
            'language' => config('app.locale')
        ]
    ])
    @include('pulsar::includes.html.form_select_group', [
        'fieldSize' => 4,
        'containerId' => 'territorialArea1Wrapper',
        'labelId' => 'territorialArea1Label',
        'name' => 'territorialArea1',
        'class' => 'select2',
        'data' => [
            'language' => config('app.locale')
        ]
    ])
    @include('pulsar::includes.html.form_select_group', [
        'fieldSize' => 4,
        'containerId' => 'territorialArea2Wrapper',
        'labelId' => 'territorialArea2Label',
        'name' => 'territorialArea2',
        'class' => 'select2',
        'data' => [
            'language' => config('app.locale')
        ]
    ])
    @include('pulsar::includes.html.form_select_group', [
        'fieldSize' => 4,
        'containerId' => 'territorialArea3Wrapper',
        'labelId' => 'territorialArea3Label',
        'name' => 'territorialArea3',
        'class' => 'select2',
        'data' => [
            'language' => config('app.locale')
        ]
    ])
    @include('pulsar::includes.html.form_text_group', [
        'fieldSize' => 2,
        'label' => trans('pulsar::pulsar.cp'),
        'name' => 'cp',
        'value' => old('cp', isset($object->cp_075)? $object->cp_075 : null),
        'maxLength' => '10',
        'rangeLength' => '2,10'
    ])
    @include('pulsar::includes.html.form_text_group', [
        'fieldSize' => 4,
        'label' => trans('pulsar::pulsar.locality'),
        'name' => 'locality',
        'value' => old('locality', isset($object->locality_075)? $object->locality_075 : null),
        'maxLength' => '100',
        'rangeLength' => '2,100'
    ])
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans_choice('pulsar::pulsar.address', 1),
        'name' => 'address',
        'value' => old('address', isset($object->address_075)? $object->address_075 : null),
        'maxLength' => '150',
        'rangeLength' => '2,150',
        'required' => true
    ])
    @include('pulsar::includes.html.form_text_group', [
        'fieldSize' => 5,
        'label' => trans('pulsar::pulsar.phone'),
        'name' => 'phone',
        'value' => old('phone', isset($object->phone_075)? $object->phone_075 : null),
        'maxLength' => '50',
        'rangeLength' => '2,50'
    ])
    @include('pulsar::includes.html.form_text_group', [
        'fieldSize' => 5,
        'label' => trans('pulsar::pulsar.email'),
        'name' => 'email',
        'value' => old('email', isset($object->email_075)? $object->email_075 : null),
        'maxLength' => '100',
        'rangeLength' => '2,100'
    ])
    <!-- ./octopus::customer.create -->
@stop