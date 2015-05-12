@extends('pulsar::layouts.form', ['action' => 'store'])

@section('script')
    @parent
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/plugins/jquery.magnific-popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/plugins/jquery.select2/css/select2.min.css') }}">
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/plugins/jquery.magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/plugins/jquery.select2/js/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/plugins/jquery.select2/js/i18n/' . config('app.locale') . '.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/plugins/getaddress/js/jquery.getaddress.js') }}"></script>
    <!-- octopus::shops.create -->
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
    <!-- octopus::shops.create -->
@stop

@section('rows')
    <!-- octopus::shops.create -->
    @include('pulsar::includes.html.form_text_group', ['label' => 'ID', 'name' => 'id', 'readOnly' => true, 'fieldSize' => 2])
    @include('pulsar::includes.html.form_iframe_select_group', ['label' => trans_choice('pulsar::pulsar.customer', 1), 'name' => 'customer', 'value' => Input::old('customer'), 'valueId' => Input::old('customerid'), 'maxLength' => '50', 'rangeLength' => '2,50', 'modalUrl' => route('modalOctopusCustomer', ['offset' => $offset, 'modal' => 1]), 'required' => true])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.name'), 'name' => 'name', 'value' => Input::old('name'), 'maxLength' => '100', 'rangeLength' => '2,100', 'required' => true])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.tin'), 'name' => 'tin', 'value' => Input::old('tin'), 'maxLength' => '50', 'rangeLength' => '2,50', 'fieldSize' => 4])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.web'), 'name' => 'web', 'value' => Input::old('web'), 'maxLength' => '100', 'rangeLength' => '2,100', 'required' => false, 'fieldSize' => 5])
    @include('pulsar::includes.html.form_text_group', ['label' => trans_choice('pulsar::pulsar.contact', 1), 'name' => 'contact', 'value' => Input::old('contact'), 'maxLength' => '100', 'rangeLength' => '2,100', 'required' => false, 'fieldSize' => 5])
    @include('pulsar::includes.html.form_select_group', ['label' => trans_choice('pulsar::pulsar.country', 1), 'name' => 'country', 'value' => Input::old('country'), 'required' => true, 'idSelect' => 'id_002', 'nameSelect' => 'name_002', 'class' => 'select2', 'fieldSize' => 4, 'data' => ['language' => config('app.locale')]])
    @include('pulsar::includes.html.form_select_group', ['wrapperId' => 'territorialArea1Wrapper', 'labelId' => 'territorialArea1Label', 'name' => 'territorialArea1', 'value' => Input::old('territorialArea1'), 'required' => false, 'idSelect' => 'id_003', 'nameSelect' => 'name_003', 'class' => 'select2', 'fieldSize' => 4, 'data' => ['language' => config('app.locale')]])
    @include('pulsar::includes.html.form_select_group', ['wrapperId' => 'territorialArea2Wrapper', 'labelId' => 'territorialArea2Label', 'name' => 'territorialArea2', 'value' => Input::old('territorialArea2'), 'required' => false, 'idSelect' => 'id_004', 'nameSelect' => 'name_004', 'class' => 'select2', 'fieldSize' => 4, 'data' => ['language' => config('app.locale')]])
    @include('pulsar::includes.html.form_select_group', ['wrapperId' => 'territorialArea3Wrapper', 'labelId' => 'territorialArea3Label', 'name' => 'territorialArea3', 'value' => Input::old('territorialArea3'), 'required' => false, 'idSelect' => 'id_005', 'nameSelect' => 'name_005', 'class' => 'select2', 'fieldSize' => 4, 'data' => ['language' => config('app.locale')]])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.cp'), 'name' => 'cp', 'value' => Input::old('cp'), 'maxLength' => '10', 'rangeLength' => '2,10', 'required' => false, 'fieldSize' => 2])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.locality'), 'name' => 'locality', 'value' => Input::old('locality'), 'maxLength' => '100', 'rangeLength' => '2,100', 'required' => false, 'fieldSize' => 4])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.address'), 'name' => 'address', 'value' => Input::old('address'), 'maxLength' => '150', 'rangeLength' => '2,150', 'required' => true])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.phone'), 'name' => 'phone', 'value' => Input::old('phone'), 'maxLength' => '50', 'rangeLength' => '2,50', 'required' => false, 'fieldSize' => 5])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.email'), 'name' => 'email', 'value' => Input::old('email'), 'maxLength' => '100', 'rangeLength' => '2,100', 'required' => false, 'fieldSize' => 5])
    <!-- /octopus::shops.create -->
@stop