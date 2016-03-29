@extends('pulsar::layouts.form')

@section('head')
    @parent
    <!-- octopus::shops.create -->
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/jquery.magnific-popup/magnific-popup.css') }}">

    <script src="{{ asset('packages/syscover/pulsar/vendor/jquery.magnific-popup/jquery.magnific-popup.min.js') }}"></script>
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

                countryValue:               '{{ old('country', isset($object->country_076)? $object->country_076 : null) }}',
                territorialArea1Value:      '{{ old('territorialArea1', isset($object->territorial_area_1_076)? $object->territorial_area_1_076 : null) }}',
                territorialArea2Value:      '{{ old('territorialArea2', isset($object->territorial_area_2_076)? $object->territorial_area_2_076 : null) }}',
                territorialArea3Value:      '{{ old('territorialArea3', isset($object->territorial_area_3_076)? $object->territorial_area_3_076 : null) }}'
            });

            $('.magnific-popup').magnificPopup({
                type: 'iframe',
                removalDelay: 300,
                mainClass: 'mfp-fade'
            });
        });

        function relatedRecord(data)
        {
            $('[name="customer"]').val(data.company_name_075);
            $('[name="customerid"]').val(data.id_075);
            $.magnificPopup.close();
        }
    </script>
    <!-- ./octopus::shops.create -->
@stop

@section('rows')
    <!-- octopus::shops.create -->
    @include('pulsar::includes.html.form_text_group', [
        'fieldSize' => 2,
        'label' => 'ID',
        'name' => 'id',
        'readOnly' => true
    ])
    @include('pulsar::includes.html.form_iframe_select_group', [
        'label' => trans_choice('pulsar::pulsar.customer', 1),
        'name' => 'customer',
        'value' => old('customer'),
        'valueId' => old('customerid'),
        'maxLength' => '50',
        'rangeLength' => '2,50',
        'modalUrl' => route('modalOctopusCustomer', [
            'offset' => $offset,
            'modal' => 1
        ]),
        'required' => true
    ])
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans('pulsar::pulsar.name'),
        'name' => 'name',
        'value' => old('name'),
        'maxLength' => '100',
        'rangeLength' => '2,100',
        'required' => true
    ])
    @include('pulsar::includes.html.form_text_group', [
        'fieldSize' => 4,
        'label' => trans('pulsar::pulsar.tin'),
        'name' => 'tin',
        'value' => old('tin'),
        'maxLength' => '50',
        'rangeLength' => '2,50'
    ])
    @include('pulsar::includes.html.form_text_group', [
        'fieldSize' => 5,
        'label' => trans('pulsar::pulsar.web'),
        'name' => 'web',
        'value' => old('web'),
        'maxLength' => '100',
        'rangeLength' => '2,100'
    ])
    @include('pulsar::includes.html.form_text_group', [
        'fieldSize' => 5,
        'label' => trans_choice('pulsar::pulsar.contact', 1),
        'name' => 'contact',
        'value' => old('contact'),
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
        'fieldSize' => 5,
        'containerId' => 'territorialArea1Wrapper',
        'labelId' => 'territorialArea1Label',
        'name' => 'territorialArea1',
        'class' => 'col-md-6 select2',
        'data' => [
            'language' => config('app.locale')
        ]
    ])
    @include('pulsar::includes.html.form_select_group', [
        'fieldSize' => 5,
        'containerId' => 'territorialArea2Wrapper',
        'labelId' => 'territorialArea2Label',
        'name' => 'territorialArea2',
        'class' => 'col-md-6 select2',
        'data' => [
            'language' => config('app.locale')
        ]
    ])
    @include('pulsar::includes.html.form_select_group', [
        'fieldSize' => 5,
        'containerId' => 'territorialArea3Wrapper',
        'labelId' => 'territorialArea3Label',
        'name' => 'territorialArea3',
        'class' => 'col-md-6 select2',
        'data' => [
            'language' => config('app.locale')
        ]
    ])
    @include('pulsar::includes.html.form_text_group', [
        'fieldSize' => 2,
        'label' => trans('pulsar::pulsar.cp'),
        'name' => 'cp',
        'value' => old('cp'),
        'maxLength' => '10',
        'rangeLength' => '2,10'
    ])
    @include('pulsar::includes.html.form_text_group', [
        'fieldSize' => 4,
        'label' => trans('pulsar::pulsar.locality'),
        'name' => 'locality',
        'value' => old('locality'),
        'maxLength' => '100',
        'rangeLength' => '2,100'
    ])
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans_choice('pulsar::pulsar.address', 1),
        'name' => 'address',
        'value' => old('address'),
        'maxLength' => '150',
        'rangeLength' => '2,150',
        'required' => true
    ])
    @include('pulsar::includes.html.form_text_group', [
        'fieldSize' => 5,
        'label' => trans('pulsar::pulsar.phone'),
        'name' => 'phone',
        'value' => old('phone'),
        'maxLength' => '50',
        'rangeLength' => '2,50'
    ])
    @include('pulsar::includes.html.form_text_group', [
        'fieldSize' => 5,
        'label' => trans('pulsar::pulsar.email'),
        'name' => 'email',
        'value' => old('email'),
        'maxLength' => '100',
        'rangeLength' => '2,100',
        'type' => 'email'
    ])
    <!-- ./octopus::shops.create -->
@stop