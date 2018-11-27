@extends('pulsar::layouts.form', ['enctype' => true])

@section('head')
    @parent
    <!-- octopus::requests.form -->
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

            // set language country data
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

                countryValue:               '{{ old('country', isset($object->country_id_078)? $object->country_id_078 : null) }}',
                territorialArea1Value:      '{{ old('territorialArea1', isset($object->territorial_area_1_id_078)? $object->territorial_area_1_id_078 : null) }}',
                territorialArea2Value:      '{{ old('territorialArea2', isset($object->territorial_area_2_id_078)? $object->territorial_area_2_id_078 : null) }}',
                territorialArea3Value:      '{{ old('territorialArea3', isset($object->territorial_area_3_id_078)? $object->territorial_area_3_id_078 : null) }}'
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

            @if(! isset($object->address_id_078))
                $('#selectAddress').hide();
            @endif
        })

        function relatedShop(data)
        {
            $('[name="shop"]').val(data.name_076)
            $('[name="shopId"]').val(data.id_076)
            $('[name="shopAddress"]').val(data.address_076)
            $('[name="shopCp"]').val(data.cp_076)
            $('[name="shopLocality"]').val(data.locality_076)
            $('[name="customer"]').val(data.customer_id_076)
            $.magnificPopup.close()

            // set url to add address
            var url = '{{ route('octopusAddress', ['ref' => '%ref%', 'modal' => 1, 'modalShopView' => '0', 'redirectParentJs' => '0', 'offset' => $offset]) }}';
            $("#selectAddress a").attr('href', url.replace('%ref%', data.id_076))

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
                    $('[name="aliasId"]').val(response.id_077)
                    $('[name="companyName"]').val(response.company_name_077)
                    $('[name="name"]').val(response.name_077)
                    $('[name="surname"]').val(response.surname_077)

                    $.getAddress.setOptions({
                        id:                         '01',
                        countryValue:               response.country_id_077,
                        territorialArea1Value:      response.territorial_area_1_id_077,
                        territorialArea2Value:      response.territorial_area_2_id_077,
                        territorialArea3Value:      response.territorial_area_3_id_077
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
            $('[name="aliasId"]').val(data.id_077)
            $('[name="companyName"]').val(data.company_name_077)
            $('[name="name"]').val(data.name_077)
            $('[name="surname"]').val(data.surname_077)

            $.getAddress.setOptions({
                id:                         '01',
                countryValue:               data.country_id_077,
                territorialArea1Value:      data.territorial_area_1_id_077,
                territorialArea2Value:      data.territorial_area_2_id_077,
                territorialArea3Value:      data.territorial_area_3_id_077
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
    <!-- /octopus::requests.form -->
@stop

@section('rows')
    <!-- octopus::requests.form -->
    @include('pulsar::includes.html.form_hidden', [
       'name' => 'stock',
       'value' => isset($stock)? $stock : null
    ])
    @include('pulsar::includes.html.form_hidden', [
        'name' => 'supervisor',
        'value' => isset($object->supervisor_id_078)? $object->supervisor_id_078 : auth()->guard('pulsar')->user()->id_010
    ])
    @include('pulsar::includes.html.form_hidden', [
        'name' => 'customer',
        'value' => isset($object->customer_id_078)? $object->customer_id_078 : null
    ])
    @include('pulsar::includes.html.form_text_group', [
        'fieldSize' => 2,
        'label' => 'ID',
        'name' => 'id',
        'value' => isset($object->id_078)? $object->id_078 : null,
        'readOnly' => true
    ])
    @if($resource == 'octopus-request')
        @include('pulsar::includes.html.form_text_group', [
            'label' => trans_choice('octopus::pulsar.supervisor', 1),
            'name' => 'supervisorName',
            'value' => isset($object->name_010)? $object->name_010 . ' ' . $object->surname_010 : null,
            'readOnly' => true,
        ])
    @endif
    @include('pulsar::includes.html.form_iframe_select_group', [
        'label' => trans_choice('octopus::pulsar.shop', 1),
        'name' => 'shop',
        'value' => old('shop', isset($object->name_076)? $object->name_076 : null),
        'valueId' => old('shopId', isset($object->shop_id_078)? $object->shop_id_078 : null),
        'maxLength' => '255',
        'rangeLength' => '2,255',
        'modalUrl' => route('octopusShop', [
            'offset' => $offset,
            'modal' => 1
        ]),
        'required' => true,
        'disabled' => $action == 'show'
    ])
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans_choice('pulsar::pulsar.address', 1),
        'name' => 'shopAddress',
        'value' => old('shopAddress', isset($object->address_076)? $object->address_076 : null),
        'maxLength' => '255',
        'rangeLength' => '2,255',
        'readOnly' => true
    ])
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', [
                'labelSize' => 4,
                'fieldSize' => 7,
                'label' => trans('pulsar::pulsar.cp'),
                'name' => 'shopCp',
                'value' => isset($object->cp_076)? $object->cp_076 : null,
                'maxLength' => '255',
                'rangeLength' => '2,255',
                'readOnly' => true
            ])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', [
                'labelSize' => 4,
                'fieldSize' => 8,
                'label' => trans('pulsar::pulsar.locality'),
                'name' => 'shopLocality',
                'value' => isset($object->locality_076)? $object->locality_076 : null,
                'maxLength' => '255',
                'rangeLength' => '2,255',
                'readOnly' => true
            ])
        </div>
    </div>

    @include('pulsar::includes.html.form_section_header', [
        'label' => trans_choice('octopus::pulsar.shipping_address', 1),
        'icon' => 'fa fa-road'
    ])
    <div id="selectAddress">
        @include('pulsar::includes.html.form_iframe_select_group', [
            'label' => trans('pulsar::pulsar.alias'),
            'name' => 'alias',
            'value' => old('alias', isset($object->alias_077)? $object->alias_077 : null),
            'valueId' => old('aliasId', isset($object->address_id_078)? $object->address_id_078 : null),
            'maxLength' => '255',
            'rangeLength' => '2,255',
            'modalUrl' => route('octopusAddress', [
                'ref' => isset($object->shop_id_078)? $object->shop_id_078 : null,
                'modal' => 1,
                'modalShopView' => '0',
                'redirectParentJs' => '0',
                'offset' => $offset,
            ]),
            'required' => true,
            'disabled' => $action == 'show'
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
                'value' => old('companyName', isset($object->company_name_078)? $object->company_name_078 : null),
                'maxLength' => '255',
                'rangeLength' => '2,255',
                'readOnly' => $action == 'show'
            ])
            @include('pulsar::includes.html.form_text_group', [
                'labelSize' => 4,
                'fieldSize' => 8,
                'label' => trans('pulsar::pulsar.name'),
                'name' => 'name',
                'value' => old('name', isset($object->name_078)? $object->name_078 : null),
                'maxLength' => '255',
                'rangeLength' => '2,255',
                'readOnly' => $action == 'show'
            ])
            @include('pulsar::includes.html.form_text_group', [
                'labelSize' => 4,
                'fieldSize' => 8,
                'label' => trans('pulsar::pulsar.surname'),
                'name' => 'surname',
                'value' => old('surname', isset($object->surname_078)? $object->surname_078 : null),
                'maxLength' => '255',
                'rangeLength' => '2,255',
                'readOnly' => $action == 'show'
            ])
            @include('pulsar::includes.html.form_text_group', [
                'labelSize' => 4,
                'fieldSize' => 8,
                'label' => trans('pulsar::pulsar.phone'),
                'name' => 'phone',
                'value' => old('phone', isset($object->phone_078)? $object->phone_078 : null),
                'maxLength' => '255',
                'rangeLength' => '2,255',
                'readOnly' => $action == 'show'
            ])
            @include('pulsar::includes.html.form_text_group', [
                'labelSize' => 4,
                'fieldSize' => 8,
                'label' => trans('pulsar::pulsar.email'),
                'name' => 'email',
                'value' => old('email', isset($object->email_078)? $object->email_078 : null),
                'maxLength' => '255',
                'rangeLength' => '2,255',
                'readOnly' => $action == 'show'
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
                ],
                'disabled' => $action == 'show'
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
                ],
                'disabled' => $action == 'show'
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
                ],
                'disabled' => $action == 'show'
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
                ],
                'disabled' => $action == 'show'
            ])
            @include('pulsar::includes.html.form_text_group', [
                'labelSize' => 4,
                'fieldSize' => 7,
                'label' => trans('pulsar::pulsar.cp'),
                'name' => 'cp',
                'value' => old('cp', isset($object->cp_078)? $object->cp_078 : null),
                'maxLength' => '10',
                'rangeLength' => '2,10',
                'readOnly' => $action == 'show'
            ])
            @include('pulsar::includes.html.form_text_group', [
                'labelSize' => 4,
                'fieldSize' => 8,
                'label' => trans('pulsar::pulsar.locality'),
                'name' => 'locality',
                'value' => old('locality', isset($object->locality_078)? $object->locality_078 : null),
                'maxLength' => '255',
                'rangeLength' => '2,255',
                'readOnly' => $action == 'show'
            ])
        </div>
    </div>
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans_choice('pulsar::pulsar.address', 1),
        'name' => 'address',
        'value' => old('address', isset($object->address_078)? $object->address_078 : null),
        'maxLength' => '255',
        'rangeLength' => '2,255',
        'required' => true,
        'readOnly' => $action == 'show'
    ])
    @include('pulsar::includes.html.form_textarea_group', [
        'label' => trans('pulsar::pulsar.observations'),
        'name' => 'observations',
        'value' => old('observations', isset($object->observations_078)? $object->observations_078 : null),
        'readOnly' => $action == 'show'
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
                'value' => isset($object->date_text_078)? $object->date_text_078 : date(config('pulsar.datePattern')),
                'readOnly' => true,
            ])
            @include('pulsar::includes.html.form_select_group', [
                'labelSize' => 4,
                'fieldSize' => 8,
                'label' => trans_choice('pulsar::pulsar.company', 1),
                'id' => 'company',
                'name' => 'company',
                'value' => (int)old('company', isset($object->company_id_078)? $object->company_id_078 : null),
                'objects' => $companies,
                'idSelect' => 'id_074',
                'nameSelect' => 'company_name_074',
                'required' => true,
                'class' => 'select2',
                'data' => [
                    'language' => config('app.locale'),
                    'width' => '100%',
                    'error-placement' => 'select2-company-outer-container'
                ],
                'disabled' => $action == 'show'
            ])
            @include('pulsar::includes.html.form_select_group', [
                'labelSize' => 4,
                'fieldSize' => 8,
                'label' => trans_choice('pulsar::pulsar.family', 1),
                'id' => 'family',
                'name' => 'family',
                'value' => (int)old('family', isset($object->family_id_078)? $object->family_id_078 : null),
                'objects' => $families,
                'idSelect' => 'id_070',
                'nameSelect' => 'name_070',
                'required' => true,
                'class' => 'select2',
                'data' => [
                    'language' => config('app.locale'),
                    'width' => '100%',
                    'error-placement' => 'select2-family-outer-container'
                ],
                'disabled' => $action == 'show'
            ])
            @include('pulsar::includes.html.form_select_group', [
                'labelSize' => 4,
                'fieldSize' => 8,
                'label' => trans_choice('octopus::pulsar.brand', 1),
                'id' => 'brand',
                'name' => 'brand',
                'value' => (int)old('brand', isset($object->brand_id_078)? $object->brand_id_078 : null),
                'objects' => $brands,
                'idSelect' => 'id_071',
                'nameSelect' => 'name_071',
                'required' => true,
                'class' => 'select2',
                'data' => [
                    'language' => config('app.locale'),
                    'width' => '100%',
                    'error-placement' => 'select2-brand-outer-container'
                ],
                'disabled' => $action == 'show'
            ])
            @include('pulsar::includes.html.form_select_group', [
                'labelSize' => 4,
                'fieldSize' => 8,
                'label' => trans_choice('octopus::pulsar.product', 1),
                'id' => 'product',
                'name' => 'product',
                'value' => (int)old('product', isset($object->product_id_078)? $object->product_id_078 : null),
                'objects' => $products,
                'required' => true,
                'idSelect' => 'id_072',
                'nameSelect' => 'name_072',
                'class' => 'select2',
                'data' => [
                    'language' => config('app.locale'),
                    'width' => '100%',
                    'error-placement' => 'select2-product-outer-container'
                ],
                'disabled' => $action == 'show'
            ])
            @include('pulsar::includes.html.form_datetimepicker_group', [
                'labelSize' => 4,
                'fieldSize' => 6,
                'label' => trans('octopus::pulsar.expiration'),
                'name' => 'expiration',
                'data' => [
                    'format' => Miscellaneous::convertFormatDate(config('pulsar.datePattern')),
                    'locale' => config('app.locale'),
                    'default-date' => old('expiration', isset($object->expiration_078)? date('Y-m-d', $object->expiration_078) : null)
                ],
                'readOnly' => $action == 'show'
            ])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', [
                'labelSize' => 4,
                'fieldSize' => 6,
                'type' => 'number',
                'label' => trans('octopus::pulsar.view_width') . ' (cm)',
                'name' => 'viewWidth',
                'value' => old('viewWidth', isset($object->view_width_078)? number_format($object->view_width_078, 2) : null),
                'required' => true,
                'readOnly' => $action == 'show'
            ])
            @include('pulsar::includes.html.form_text_group', [
                'labelSize' => 4,
                'fieldSize' => 6,
                'type' => 'number',
                'label' => trans('octopus::pulsar.view_height') . ' (cm)',
                'name' => 'viewHeight',
                'value' => old('viewHeight', isset($object->view_height_078)? number_format($object->view_height_078, 2) : null),
                'required' => true,
                'readOnly' => $action == 'show'
            ])
            @include('pulsar::includes.html.form_text_group', [
                'labelSize' => 4,
                'fieldSize' => 6,
                'type' => 'number',
                'label' => trans('octopus::pulsar.total_width') . ' (cm)',
                'name' => 'totalWidth',
                'value' => old('totalWidth', isset($object->total_width_078)? number_format($object->total_width_078, 2) : null),
                'readOnly' => $action == 'show'
            ])
            @include('pulsar::includes.html.form_text_group', [
                'labelSize' => 4,
                'fieldSize' => 6,
                'type' => 'number',
                'label' => trans('octopus::pulsar.total_height') . ' (cm)',
                'name' => 'totalHeight',
                'value' => old('totalHeight', isset($object->total_height_078)? number_format($object->total_height_078, 2) : null),
                'readOnly' => $action == 'show'
            ])
            @include('pulsar::includes.html.form_text_group', [
                'labelSize' => 4,
                'fieldSize' => 5,
                'type' => 'number',
                'label' => trans('pulsar::pulsar.units'),
                'name' => 'units',
                'value' => old('units', isset($object->units_078)? $object->units_078 : null),
                'required' => true,
                'readOnly' => $action == 'show'
            ])
            @if(isset($stock))
                <!-- create form stock -->
                @include('pulsar::includes.html.form_file_group', [
                    'labelSize' => 4,
                    'fieldSize' => 8,
                    'label' => trans_choice('pulsar::pulsar.attachment', 1),
                    'objectId' => isset($object->id_078)? $object->id_078 : null,
                    'dirName' => '/packages/syscover/octopus/storage/attachment/stock',
                    'name' => 'attachment',
                    'value' => old('attachment', isset($object->attachment_078)? $object->attachment_078 : null),
                    'readOnly' => $action == 'show'
                ])
            @else
                @include('pulsar::includes.html.form_file_group', [
                    'labelSize' => 4,
                    'fieldSize' => 8,
                    'label' => trans_choice('pulsar::pulsar.attachment', 1),
                    'objectId' => isset($object->id_078)? $object->id_078 : null,
                    'dirName' => '/packages/syscover/octopus/storage/attachment/request',
                    'urlDelete' => route('deleteAttachmentOctopusRequest'),
                    'name' => 'attachment',
                    'value' => old('attachment', isset($object->attachment_078)? $object->attachment_078 : null),
                    'disabled' => $action == 'show'
                ])
            @endif
        </div>
    </div>
    @include('pulsar::includes.html.form_textarea_group', [
        'label' => trans_choice('pulsar::pulsar.comment', 2),
        'name' => 'comments',
        'value' => old('comments', isset($object->comments_078)? $object->comments_078 : null),
        'readOnly' => $action == 'show'
    ])
    <!-- /octopus::requests.form -->
@stop