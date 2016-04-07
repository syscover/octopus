@extends('pulsar::layouts.form', [
    'newTrans' => 'new',
    'modal' => true
])

@section('head')
    @parent
    <!-- octopus::address.create -->
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/getaddress/js/jquery.getaddress.js') }}"></script>
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

                countryValue:               '{{ old('country', isset($object->country_077)? $object->country_077 : null) }}',
                territorialArea1Value:      '{{ old('territorialArea1', isset($object->territorial_area_1_077)? $object->territorial_area_1_077 : null) }}',
                territorialArea2Value:      '{{ old('territorialArea2', isset($object->territorial_area_2_077)? $object->territorial_area_2_077 : null) }}',
                territorialArea3Value:      '{{ old('territorialArea3', isset($object->territorial_area_3_077)? $object->territorial_area_3_077 : null) }}'
            });

            $('#cancel').bind('click', function(){
                parent.$.magnificPopup.close();
            });
        });
    </script>
    <!-- /.octopus::address.create -->
@stop

@section('rows')
    <!-- octopus::addresses.create -->
    @include('pulsar::includes.html.form_text_group', [
        'label' => 'ID',
        'name' => 'id',
        'value' => old('alias', isset($object->id_077)? $object->id_077 : null),
        'readOnly' => true,
        'fieldSize' => 2
    ])
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans('pulsar::pulsar.alias'),
        'name' => 'alias',
        'value' => old('alias', isset($object->alias_077)? $object->alias_077 : null),
        'maxLength' => '100',
        'rangeLength' => '2,100'
    ])
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans('pulsar::pulsar.company_name'),
        'name' => 'companyName',
        'value' => old('companyName', isset($object->company_name_077)? $object->company_name_077 : null),
        'maxLength' => '100',
        'rangeLength' => '2,100'
    ])
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans('pulsar::pulsar.name'),
        'name' => 'name',
        'value' => old('name', isset($object->name_077)? $object->name_077 : null),
        'maxLength' => '50',
        'rangeLength' => '2,50'
    ])
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans('pulsar::pulsar.surname'),
        'name' => 'surname',
        'value' => old('surname', isset($object->surname_077)? $object->surname_077 : null),
        'maxLength' => '50',
        'rangeLength' => '2,50'
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
        'value' => old('cp', isset($object->cp_077)? $object->cp_077 : null),
        'maxLength' => '10',
        'rangeLength' => '2,10',
        'fieldSize' => 2
    ])
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans('pulsar::pulsar.locality'),
        'name' => 'locality',
        'value' => old('locality', isset($object->locality_077)? $object->locality_077 : null),
        'maxLength' => '100',
        'rangeLength' => '2,100',
        'fieldSize' => 4
    ])
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans_choice('pulsar::pulsar.address', 1),
        'name' => 'address',
        'value' => old('address', isset($object->address_077)? $object->address_077 : null),
        'maxLength' => '150',
        'rangeLength' => '2,150',
        'required' => true
    ])
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans('pulsar::pulsar.phone'),
        'name' => 'phone',
        'value' => old('phone', isset($object->phone_077)? $object->phone_077 : null),
        'maxLength' => '50',
        'rangeLength' => '2,50',
        'fieldSize' => 5
    ])
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans('pulsar::pulsar.email'),
        'name' => 'email',
        'value' => old('email', isset($object->email_077)? $object->email_077 : null),
        'maxLength' => '100',
        'rangeLength' => '2,100',
        'fieldSize' => 5
    ])
    @include('pulsar::includes.html.form_checkbox_group', [
        'label' => trans('pulsar::pulsar.favorite'),
        'name' => 'favorite',
        'value' => 1,
        'checked' => old('favorite', isset($object->favorite_077)? $object->favorite_077 : null)
    ])
    @include('pulsar::includes.html.form_hidden', [
        'name' => 'ref',
        'value' => $ref
    ])
    <!-- /.octopus::addresses.create -->
@stop