@extends('pulsar::layouts.tab', [
    'tabs' => [
        ['id' => 'box_tab1', 'name' => trans_choice('octopus::pulsar.shop', 1)],
        ['id' => 'box_tab2', 'name' => trans_choice('pulsar::pulsar.address', 2)],
        ['id' => 'box_tab3', 'name' => trans_choice('pulsar::pulsar.photo', 2)]
    ]
])

@section('head')
    @parent
    <!-- octopus::shop.edit -->
    @include('pulsar::includes.js.datatable_config')
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

                countryValue:               '{{ $object->country_076 }}',
                territorialArea1Value:      '{{ $object->territorial_area_1_076 }}',
                territorialArea2Value:      '{{ $object->territorial_area_2_076 }}',
                territorialArea3Value:      '{{ $object->territorial_area_3_076 }}'
            })

            if ($.fn.dataTable)
            {
                $('.datatable-pulsar').dataTable({
                    'iDisplayStart' : 0,
                    'aoColumnDefs': [
                        { 'bSortable': false, 'aTargets': [7,8]},
                        { 'sClass': 'checkbox-column', 'aTargets': [7]},
                        { 'sClass': 'align-center', 'aTargets': [6,8]}
                    ],
                    "bProcessing": true,
                    "bServerSide": true,
                    "sAjaxSource": "{{ route('jsonDataOctopusAddress', ['ref' => $object->id_076, 'modal' => 0]) }}"
                }).fnSetFilteringDelay().on('xhr.dt', function (e, settings, json){

                    // URL to redirect after update address
                    var url = '{{ route('editOctopusShop', ['id' => $object->id_076, 'offset' => '%offset%', 'tab' => 1]) }}'
                    $('[name="urlTarget"]').val(url.replace('%offset%', settings._iDisplayStart))
                })
            }

            $('.magnific-popup').magnificPopup({
                type: 'iframe',
                removalDelay: 300,
                mainClass: 'mfp-fade'
            })

            // set tab active
            @if(isset($tab))
                $('.tabbable li:eq({{ $tab }}) a').tab('show')
            @endif
        });

        function relatedRecord(data)
        {
            $('[name="customer"]').val(data.company_name_075)
            $('[name="customerid"]').val(data.id_075)
            $.magnificPopup.close()
        }
    </script>
    <!-- ./octopus::shops.create -->
@stop

@section('box_tab1')
    <!-- octopus::shops.edit -->
    @include('pulsar::includes.html.form_record_header')
        @include('pulsar::includes.html.form_text_group', [
            'label' => 'ID',
            'name' => 'id',
            'value' => $object->id_076,
            'readOnly' => true,
            'fieldSize' => 2
        ])
        @include('pulsar::includes.html.form_iframe_select_group', [
            'label' => trans_choice('pulsar::pulsar.customer', 1),
            'name' => 'customer',
            'value' => $object->company_name_075,
            'valueId' => $object->customer_076,
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
            'value' => $object->name_076,
            'maxLength' => '100',
            'rangeLength' => '2,100',
            'required' => true
        ])
        @include('pulsar::includes.html.form_text_group', [
            'label' => trans('pulsar::pulsar.tin'),
            'name' => 'tin',
            'value' => $object->tin_076,
            'maxLength' => '50',
            'rangeLength' => '2,50',
            'fieldSize' => 4
        ])
        @include('pulsar::includes.html.form_text_group', [
            'label' => trans('pulsar::pulsar.web'),
            'name' => 'web',
            'value' => $object->web_076,
            'maxLength' => '100',
            'rangeLength' => '2,100',
            'fieldSize' => 5
        ])
        @include('pulsar::includes.html.form_text_group', [
            'label' => trans_choice('pulsar::pulsar.contact', 1),
            'name' => 'contact',
            'value' => $object->contact_076,
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
            'class' => 'col-md-6 select2',
            'data' => [
                'language' => config('app.locale'),
                'width' => '100%'
            ]
        ])
        @include('pulsar::includes.html.form_select_group', [
            'containerId' => 'territorialArea1Wrapper',
            'labelId' => 'territorialArea1Label',
            'name' => 'territorialArea1',
            'class' => 'col-md-6 select2',
            'data' => [
                'language' => config('app.locale'),
                'width' => '100%'
            ]
        ])
        @include('pulsar::includes.html.form_select_group', [
            'containerId' => 'territorialArea2Wrapper',
            'labelId' => 'territorialArea2Label',
            'name' => 'territorialArea2',
            'class' => 'col-md-6 select2',
            'data' => [
                'language' => config('app.locale'),
                'width' => '100%'
            ]
        ])
        @include('pulsar::includes.html.form_select_group', [
            'containerId' => 'territorialArea3Wrapper',
            'labelId' => 'territorialArea3Label',
            'name' => 'territorialArea3',
            'class' => 'col-md-6 select2',
            'data' => [
                'language' => config('app.locale'),
                'width' => '100%'
            ]
        ])
        @include('pulsar::includes.html.form_text_group', [
            'label' => trans('pulsar::pulsar.cp'),
            'name' => 'cp',
            'value' => $object->cp_076,
            'maxLength' => '10',
            'rangeLength' => '2,10',
            'fieldSize' => 2
        ])
        @include('pulsar::includes.html.form_text_group', [
            'label' => trans('pulsar::pulsar.locality'),
            'name' => 'locality',
            'value' => $object->locality_076,
            'maxLength' => '100',
            'rangeLength' => '2,100',
            'fieldSize' => 4
        ])
        @include('pulsar::includes.html.form_text_group', [
            'label' => trans_choice('pulsar::pulsar.address', 1),
            'name' => 'address',
            'value' => $object->address_076,
            'maxLength' => '150',
            'rangeLength' => '2,150',
            'required' => true
        ])
        @include('pulsar::includes.html.form_text_group', [
            'label' => trans('pulsar::pulsar.phone'),
            'name' => 'phone',
            'value' => $object->phone_076,
            'maxLength' => '50',
            'rangeLength' => '2,50',
            'fieldSize' => 5
        ])
        @include('pulsar::includes.html.form_text_group', [
            'label' => trans('pulsar::pulsar.email'),
            'name' => 'email',
            'value' => $object->email_076,
            'maxLength' => '100',
            'rangeLength' => '2,100',
            'fieldSize' => 5
        ])
    @include('pulsar::includes.html.form_record_footer')
    <!-- ./octopus::shops.edit -->
@stop

@section('box_tab2')
    <!-- octopus::shops.edit -->
    <a href="{{ route('createOctopusAddress', $urlParameters) }}" class="magnific-popup bs-tooltip btn marginB10"><i class="fa fa-road"></i> {{ trans('pulsar::pulsar.new') }} {{ trans_choice('pulsar::pulsar.address', 1) }}</a>
    <div class="widget box">
        <div class="widget-content no-padding">
            <form id="formView" method="post" action="{{ route('deleteSelectOctopusAddress', $urlParameters) }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="DELETE">
                <table class="table table-striped table-bordered table-hover table-checkable table-responsive datatable-pulsar">
                    <thead>
                        <tr>
                            <th data-hide="phone,tablet">ID.</th>
                            <th data-hide="expand">{{ trans('pulsar::pulsar.alias') }}</th>
                            <th data-hide="phone">{{ trans_choice('pulsar::pulsar.address', 1) }}</th>
                            <th data-hide="phone">{{ trans('pulsar::pulsar.locality') }}</th>
                            <th data-hide="phone">{{ trans('pulsar::pulsar.email') }}</th>
                            <th data-hide="phone">{{ trans('pulsar::pulsar.phone') }}</th>
                            <th data-hide="phone">{{ trans('pulsar::pulsar.favorite') }}</th>
                            <th class="checkbox-column"><input type="checkbox" class="uniform"></th>
                            <th>{{ trans_choice('pulsar::pulsar.action', 2) }}</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <input type="hidden" name="nElementsDataTable">
                <input type="hidden" name="urlTarget">
            </form>
        </div>
    </div>
    <!-- ./octopus::shops.edit -->
@stop

@section('box_tab3')
@stop