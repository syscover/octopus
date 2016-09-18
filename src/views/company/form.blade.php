@extends('pulsar::layouts.form')

@section('head')
    @parent
    <!-- octopus::company.create -->
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

                countryValue:               '{{ old('country', isset($object->country_id_074)? $object->country_id_074 : null) }}',
                territorialArea1Value:      '{{ old('territorialArea1', isset($object->territorial_area_1_id_074)? $object->territorial_area_1_id_074 : null) }}',
                territorialArea2Value:      '{{ old('territorialArea2', isset($object->territorial_area_2_id_074)? $object->territorial_area_2_id_074 : null) }}',
                territorialArea3Value:      '{{ old('territorialArea3', isset($object->territorial_area_3_id_074)? $object->territorial_area_3_id_074 : null) }}'
            });
        });
    </script>
    <!-- /octopus::company.create -->
@stop

@section('rows')
    <!-- octopus::company.create -->
    @include('pulsar::includes.html.form_text_group', [
        'label' => 'ID',
        'name' => 'id',
        'value' => isset($object->id_074)? $object->id_074 : null,
        'readOnly' => true,
        'fieldSize' => 2
    ])
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans('pulsar::pulsar.company_name'),
        'name' => 'companyName',
        'value' => old('companyName', isset($object->company_name_074)? $object->company_name_074 : null),
        'maxLength' => '100',
        'rangeLength' => '2,100',
        'required' => true
    ])
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans('pulsar::pulsar.tin'),
        'name' => 'tin',
        'value' => old('tin', isset($object->tin_074)? $object->tin_074 : null),
        'maxLength' => '50',
        'rangeLength' => '2,50',
        'fieldSize' => 4
    ])
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans('pulsar::pulsar.web'),
        'name' => 'web',
        'value' => old('web', isset($object->web_074)? $object->web_074 : null),
        'maxLength' => '100',
        'rangeLength' => '2,100',
        'fieldSize' => 5
    ])
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans_choice('pulsar::pulsar.contact', 1),
        'name' => 'contact',
        'value' => old('contact', isset($object->contact_074)? $object->contact_074 : null),
        'maxLength' => '100',
        'rangeLength' => '2,100',
        'fieldSize' => 5
    ])
    @include('pulsar::includes.html.form_select_group', [
        'label' => trans_choice('pulsar::pulsar.country', 1),
        'name' => 'country',
        'required' => true,
        'idSelect' => 'id_002',
        'nameSelect' => 'name_002',
        'class' => 'select2',
        'fieldSize' => 4,
        'data' => [
            'language' => config('app.locale')
        ]
    ])
    @include('pulsar::includes.html.form_select_group', [
        'containerId' => 'territorialArea1Wrapper',
        'labelId' => 'territorialArea1Label',
        'name' => 'territorialArea1',
        'class' => 'select2',
        'fieldSize' => 4,
        'data' => [
            'language' => config('app.locale')
        ]
    ])
    @include('pulsar::includes.html.form_select_group', [
        'containerId' => 'territorialArea2Wrapper',
        'labelId' => 'territorialArea2Label',
        'name' => 'territorialArea2',
        'class' => 'select2',
        'fieldSize' => 4,
        'data' => [
            'language' => config('app.locale')
        ]
    ])
    @include('pulsar::includes.html.form_select_group', [
        'containerId' => 'territorialArea3Wrapper',
        'labelId' => 'territorialArea3Label',
        'name' => 'territorialArea3',
        'class' => 'select2',
        'fieldSize' => 4,
        'data' => [
            'language' => config('app.locale')
        ]
    ])
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans('pulsar::pulsar.cp'),
        'name' => 'cp',
        'value' => old('cp', isset($object->cp_074)? $object->cp_074 : null),
        'maxLength' => '10',
        'rangeLength' => '2,10',
        'fieldSize' => 2
    ])
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans('pulsar::pulsar.locality'),
        'name' => 'locality',
        'value' => old('locality', isset($object->locality_074)? $object->locality_074 : null),
        'maxLength' => '100',
        'rangeLength' => '2,100',
        'fieldSize' => 4
    ])
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans_choice('pulsar::pulsar.address', 1),
        'name' => 'address',
        'value' => old('address', isset($object->address_074)? $object->address_074 : null),
        'maxLength' => '150',
        'rangeLength' => '2,150',
        'required' => true
    ])
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans('pulsar::pulsar.phone'),
        'name' => 'phone',
        'value' => old('phone', isset($object->phone_074)? $object->phone_074 : null),
        'maxLength' => '50',
        'rangeLength' => '2,50',
        'fieldSize' => 5
    ])
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans('pulsar::pulsar.email'),
        'name' => 'email',
        'value' => old('email', isset($object->email_074)? $object->email_074 : null),
        'maxLength' => '100',
        'rangeLength' => '2,100',
        'fieldSize' => 5
    ])
    <!-- /octopus::company.create -->
@stop