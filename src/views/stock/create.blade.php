@extends('pulsar::layouts.form', ['enctype' => true])

@section('head')
    @parent
    <!-- octopus::stock.create -->
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/jquery.magnific-popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/jasny-bootstrap/css/jasny-bootstrap.min.css') }}">

    <script src="{{ asset('packages/syscover/pulsar/vendor/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>
    <script src="{{ asset('packages/syscover/pulsar/vendor/datetimepicker/js/moment.min.js') }}"></script>
    <script src="{{ asset('packages/syscover/pulsar/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('packages/syscover/pulsar/vendor/jquery.magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('packages/syscover/pulsar/vendor/getaddress/js/jquery.getaddress.js') }}"></script>
    <script>
        $(document).ready(function() {

            // set language conutry data
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

                countryValue:               '{{ old('country', isset($object->country_079)? $object->country_079 : null) }}',
                territorialArea1Value:      '{{ old('territorialArea1', isset($object->territorial_area_1_079)? $object->territorial_area_1_079 : null) }}',
                territorialArea2Value:      '{{ old('territorialArea2', isset($object->territorial_area_2_079)? $object->territorial_area_2_079 : null) }}',
                territorialArea3Value:      '{{ old('territorialArea3', isset($object->territorial_area_3_079)? $object->territorial_area_3_079 : null) }}'
            })

            $('[name="brand"]').on('change', function() {

                $("[name='product']").val("")
                $("[name='product']").select2()

                if($('[name="brand"]').val() != "")
                {
                    $.ajax({
                        type: "POST",
                        url: '{{ route('jsonBrandProductsOctopusProduct') }}/' +  $('[name="brand"]').val(),
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        context: this,
                        success: function(response) {
                            $("[name='product'] option").remove()
                            $("[name='product']").append(new Option("Select a {{ trans_choice('octopus::pulsar.product', 1) }}", ""))
                            for(var i in response)
                            {
                                $("[name='product']").append(new Option(response[i].name_072, response[i].id_072))
                            }
                        }
                    })
                }
                else
                {
                    $("[name='product'] option").remove()
                    $("[name='product']").append(new Option("Select a {{ trans_choice('octopus::pulsar.product', 1) }}", ""))
                }
            })

            $('.magnific-popup').magnificPopup({
                type: 'iframe',
                removalDelay: 300,
                mainClass: 'mfp-fade'
            })
        })

        function relatedShop(data)
        {
            $('[name="shop"]').val(data.name_076)
            $('[name="shopid"]').val(data.id_076)
            $('[name="customer"]').val(data.customer_076)
            $.magnificPopup.close()

            // set url to add address
            $("#selectAddress a").attr('href', '{{ route("modalOctopusAddress") }}/' + data.id_076 + '/{{ $offset }}/1')

            $.ajax({
                type: "POST",
                url: '{{ route('jsonFavoriteAddressOctopusAddress') }}/' +  data.id_076,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(response) {
                    $('[name="idAddress"]').val(response.id_077)
                    $('[name="alias"]').val(response.alias_077)
                    $('[name="aliasid"]').val(response.id_077)
                    $('[name="companyName"]').val(response.company_name_077)
                    $('[name="name"]').val(response.name_077)
                    $('[name="surname"]').val(response.surname_077)

                    $.getAddress.setOptions({
                        id:                         '01',
                        countryValue:               response.country_077,
                        territorialArea1Value:      response.territorial_area_1_077,
                        territorialArea2Value:      response.territorial_area_2_077,
                        territorialArea3Value:      response.territorial_area_3_077
                    })

                    $('[name="cp"]').val(response.cp_077)
                    $('[name="locality"]').val(response.locality_077)
                    $('[name="phone"]').val(response.phone_077)
                    $('[name="email"]').val(response.email_077)
                    $('[name="address"]').val(response.address_077)
                }
            })

            $("#selectAddress").fadeIn()
        }

        function relatedAddress(data)
        {
            $('[name="idAddress"]').val(data.id_077)
            $('[name="alias"]').val(data.alias_077)
            $('[name="aliasid"]').val(data.id_077)
            $('[name="companyName"]').val(data.company_name_077)
            $('[name="name"]').val(data.name_077)
            $('[name="surname"]').val(data.surname_077)

            $.getAddress.setOptions({
                id:                         '01',
                countryValue:               data.country_077,
                territorialArea1Value:      data.territorial_area_1_077,
                territorialArea2Value:      data.territorial_area_2_077,
                territorialArea3Value:      data.territorial_area_3_077
            })

            $('[name="cp"]').val(data.cp_077)
            $('[name="locality"]').val(data.locality_077)
            $('[name="phone"]').val(data.phone_077)
            $('[name="email"]').val(data.email_077)
            $('[name="address"]').val(data.address_077)
            $.magnificPopup.close()
        }
    </script>

    @include('pulsar::includes.js.delete_file')
    <!-- ./octopus::stock.create -->
@stop

@section('rows')
    <!-- octopus::stock.create -->
    @include('pulsar::includes.html.form_hidden', [
       'name' => 'request',
       'value' => $object->request_079
    ])
    @include('pulsar::includes.html.form_hidden', [
       'name' => 'order',
       'value' => $object->id_079
    ])
    @include('pulsar::includes.html.form_hidden', [
       'name' => 'laboratory',
       'value' => $object->laboratory_079
    ])
    @include('pulsar::includes.html.form_hidden', [
       'name' => 'supervisor',
       'value' => $object->supervisor_079
    ])
    @include('pulsar::includes.html.form_hidden', [
        'name' => 'customer',
        'value' => $object->customer_079
    ])
    @include('pulsar::includes.html.form_text_group', [
        'label' => 'ID',
        'name' => 'id',
        'readOnly' => true,
        'fieldSize' => 2
    ])
    @include('pulsar::includes.html.form_iframe_select_group', [
        'label' => trans_choice('octopus::pulsar.shop', 1),
        'name' => 'shop',
        'value' => $object->name_076,
        'valueId' => $object->shop_079,
        'maxLength' => '255',
        'rangeLength' => '2,255',
        'modalUrl' => route('modalOctopusShop', [
            'offset' => $offset,
            'modal' => 1
        ]),
        'required' => true,
        'readOnly' => true
    ])
    @include('pulsar::includes.html.form_section_header', [
        'label' => trans_choice('pulsar::pulsar.address', 1),
        'icon' => 'icon-road'
    ])
    <div id="selectAddress">
        @include('pulsar::includes.html.form_iframe_select_group', [
            'label' => trans('pulsar::pulsar.alias'),
            'name' => 'alias',
            'value' => $object->alias_077,
            'valueId' => $object->id_address_079,
            'maxLength' => '255',
            'rangeLength' => '2,255',
            'modalUrl' => route('modalOctopusAddress', [
                'ref' => $object->shop_079,
                'offset' => $offset,
                'modal' => 1
            ]),
            'required' => true,
            'readOnly' => true
        ])
        <hr>
    </div>
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', [
                'labelSize' => 4,
                'fieldSize' => 8,
                'label' => trans('pulsar::pulsar.company_name'),
                'name' => 'companyName',
                'value' => isset($object->company_name_079)? $object->company_name_079 : null,
                'maxLength' => '255', '
                rangeLength' => '2,255'
            ])
            @include('pulsar::includes.html.form_text_group', [
                'labelSize' => 4,
                'fieldSize' => 8,
                'label' => trans('pulsar::pulsar.name'),
                'name' => 'name',
                'value' => isset($object->name_079)? $object->name_079 : null,
                'maxLength' => '255',
                'rangeLength' => '2,255'
            ])
            @include('pulsar::includes.html.form_text_group', [
                'labelSize' => 4,
                'fieldSize' => 8,
                'label' => trans('pulsar::pulsar.surname'),
                'name' => 'surname',
                'value' => isset($object->surname_079)? $object->surname_079 : null,
                'maxLength' => '255',
                'rangeLength' => '2,255'
            ])
            @include('pulsar::includes.html.form_text_group', [
                'labelSize' => 4,
                'fieldSize' => 8,
                'label' => trans('pulsar::pulsar.phone'),
                'name' => 'phone',
                'value' => isset($object->phone_079)? $object->phone_079 : null,
                'maxLength' => '255',
                'rangeLength' => '2,255',
                'fieldSize' => 6
            ])
            @include('pulsar::includes.html.form_text_group', [
                'labelSize' => 4,
                'fieldSize' => 8,
                'label' => trans('pulsar::pulsar.email'),
                'name' => 'email',
                'value' => isset($object->email_079)? $object->email_079 : null,
                'maxLength' => '255',
                'rangeLength' => '2,255',
                'fieldSize' => 6
            ])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_select_group', [
                 'labelSize' => 4,
                 'fieldSize' => 8,
                 'label' => trans_choice('pulsar::pulsar.country', 1),
                 'id' => 'country',
                 'name' => 'country',
                 'required' => true,
                 'idSelect' => 'id_002',
                 'nameSelect' => 'name_002',
                 'class' => 'col-md-12 select2',
                 'style' => 'width:100%',
                 'data' => [
                     'language' => config('app.locale'),
                     'error-placement' => 'select2-country-outer-container'
                 ]
             ])
            @include('pulsar::includes.html.form_select_group', [
                'labelSize' => 4,
                'fieldSize' => 8,
                'containerId' => 'territorialArea1Wrapper',
                'labelId' => 'territorialArea1Label',
                'name' => 'territorialArea1',
                'class' => 'col-md-12 select2',
                'style' => 'width:100%',
                'data' => [
                    'language' => config('app.locale')
                ]
            ])
            @include('pulsar::includes.html.form_select_group', [
                'labelSize' => 4,
                'fieldSize' => 8,
                'containerId' => 'territorialArea2Wrapper',
                'labelId' => 'territorialArea2Label',
                'name' => 'territorialArea2',
                'class' => 'col-md-12 select2',
                'style' => 'width:100%',
                'data' => [
                    'language' => config('app.locale')
                ]
            ])
            @include('pulsar::includes.html.form_select_group', [
                'labelSize' => 4,
                'fieldSize' => 8,
                'containerId' => 'territorialArea3Wrapper',
                'labelId' => 'territorialArea3Label',
                'name' => 'territorialArea3',
                'class' => 'col-md-12 select2',
                'style' => 'width:100%',
                'data' => [
                    'language' => config('app.locale')
                ]
            ])
            @include('pulsar::includes.html.form_text_group', [
                'labelSize' => 4,
                'fieldSize' => 7,
                'label' => trans('pulsar::pulsar.cp'),
                'name' => 'cp',
                'value' => isset($object->cp_079)? $object->cp_079 : null,
                'maxLength' => '255',
                'rangeLength' => '2,255',
                'fieldSize' => 4
            ])
            @include('pulsar::includes.html.form_text_group', [
                'labelSize' => 4,
                'fieldSize' => 8,
                'label' => trans('pulsar::pulsar.locality'),
                'name' => 'locality',
                'value' => isset($object->locality_079)? $object->locality_079 : null,
                'maxLength' => '255',
                'rangeLength' => '2,255'
            ])
        </div>
    </div>
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans_choice('pulsar::pulsar.address', 1),
        'name' => 'address',
        'value' => old('address', isset($object->address_079)? $object->address_079 : null),
        'maxLength' => '255',
        'rangeLength' => '2,255',
        'required' => true
    ])
    @include('pulsar::includes.html.form_textarea_group', [
        'label' => trans('pulsar::pulsar.observations'),
        'name' => 'observations',
        'value' => old('observations', isset($object->observations_079)? $object->observations_079 : null)
    ])

    @include('pulsar::includes.html.form_section_header', [
        'label' => trans_choice('octopus::pulsar.request', 1),
        'icon' => 'icon-inbox'
    ])
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', [
                'labelSize' => 4,
                'fieldSize' => 6,
                'label' => trans_choice('pulsar::pulsar.date', 1),
                'name' => 'date',
                'value' => date(config('pulsar.datePattern')),
                'readOnly' => true,
            ])
            @include('pulsar::includes.html.form_select_group', [
                'labelSize' => 4,
                'fieldSize' => 8,
                'label' => trans_choice('pulsar::pulsar.company', 1),
                'id' => 'company',
                'name' => 'company',
                'value' => $object->company_079,
                'objects' => $companies,
                'idSelect' => 'id_074',
                'nameSelect' => 'company_name_074',
                'required' => true,
                'class' => 'select2',
                'data' => [
                    'language' => config('app.locale'),
                    'width' => '100%',
                    'error-placement' => 'select2-company-outer-container'
                ]
            ])
            @include('pulsar::includes.html.form_select_group', [
                'labelSize' => 4,
                'fieldSize' => 8,
                'label' => trans_choice('pulsar::pulsar.family', 1),
                'id' => 'family',
                'name' => 'family',
                'value' => $object->family_079,
                'objects' => $families,
                'idSelect' => 'id_070',
                'nameSelect' => 'name_070',
                'required' => true,
                'class' => 'select2',
                'data' => [
                    'language' => config('app.locale'),
                    'width' => '100%',
                    'error-placement' => 'select2-family-outer-container'
                ]
            ])
            @include('pulsar::includes.html.form_select_group', [
                'labelSize' => 4,
                'fieldSize' => 8,
                'label' => trans_choice('octopus::pulsar.brand', 1),
                'id' => 'brand',
                'name' => 'brand',
                'value' => $object->brand_079,
                'objects' => $brands,
                'idSelect' => 'id_071',
                'nameSelect' => 'name_071',
                'required' => true,
                'class' => 'select2',
                'data' => [
                    'language' => config('app.locale'),
                    'width' => '100%',
                    'error-placement' => 'select2-brand-outer-container'
                ]
            ])
            @include('pulsar::includes.html.form_select_group', [
                'labelSize' => 4,
                'fieldSize' => 8,
                'label' => trans_choice('octopus::pulsar.product', 1),
                'id' => 'product',
                'name' => 'product',
                'value' => $object->product_079,
                'objects' => $products,
                'required' => true,
                'idSelect' => 'id_072',
                'nameSelect' => 'name_072',
                'class' => 'select2',
                'data' => [
                    'language' => config('app.locale'),
                    'width' => '100%',
                    'error-placement' => 'select2-product-outer-container'
                ]
            ])
            @include('pulsar::includes.html.form_datetimepicker_group', [
                'labelSize' => 4,
                'fieldSize' => 6,
                'label' => trans('octopus::pulsar.expiration'),
                'name' => 'expiration',
                'data' => [
                    'format' => Miscellaneous::convertFormatDate(config('pulsar.datePattern')),
                    'locale' => config('app.locale'),
                    'default-date' => date('Y-m-d', $object->expiration_079)
                ]
            ])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', [
                'labelSize' => 4,
                'fieldSize' => 6,
                'type' => 'number',
                'label' => trans('octopus::pulsar.view_width') . ' (cm)',
                'name' => 'viewWidth',
                'value' => $object->view_width_079,
                'required' => true
            ])
            @include('pulsar::includes.html.form_text_group', [
                'labelSize' => 4,
                'fieldSize' => 6,
                'type' => 'number',
                'label' => trans('octopus::pulsar.view_height') . ' (cm)',
                'name' => 'viewHeight',
                'value' => $object->view_height_079,
                'required' => true
            ])
            @include('pulsar::includes.html.form_text_group', [
                'labelSize' => 4,
                'fieldSize' => 6,
                'type' => 'number',
                'label' => trans('octopus::pulsar.total_width') . ' (cm)',
                'name' => 'totalWidth',
                'value' => isset($object->total_width_079)? $object->total_width_079 : null
            ])
            @include('pulsar::includes.html.form_text_group', [
                'labelSize' => 4,
                'fieldSize' => 6,
                'type' => 'number',
                'label' => trans('octopus::pulsar.total_height') . ' (cm)',
                'name' => 'totalHeight',
                'value' => isset($object->total_height_079)? $object->total_height_079 : null
            ])
            @include('pulsar::includes.html.form_text_group', [
                'labelSize' => 4,
                'fieldSize' => 5,
                'type' => 'number',
                'label' => trans('pulsar::pulsar.units'),
                'name' => 'units',
                'value' => $object->units_079,
                'required' => true
            ])
            @include('pulsar::includes.html.form_file_group', [
                'labelSize' => 4,
                'fieldSize' => 8,
                'label' => trans_choice('pulsar::pulsar.attachment', 1),
                'objectId' => isset($object->id_079)? $object->id_079 : null,
                'dirName' => '/packages/syscover/octopus/storage/attachment/order',
                'name' => 'attachment',
                'value' => isset($object->attachment_079)? $object->attachment_079 : null
            ])
        </div>
    </div>
    @include('pulsar::includes.html.form_textarea_group', [
        'label' => trans_choice('pulsar::pulsar.comment', 2),
        'name' => 'comments',
        'value' => old('comments', isset($object->comments_079)? $object->comments_079 : null)
    ])
    <!-- ./octopus::stock.create -->
@stop