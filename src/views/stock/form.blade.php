@extends('pulsar::layouts.form', ['enctype' => true])

@section('head')
    @parent
    <!-- octopus::stock.form -->
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
    
                countryValue:               '{{ old('country', isset($object->country_080)? $object->country_080 : null) }}',
                territorialArea1Value:      '{{ old('territorialArea1', isset($object->territorial_area_1_080)? $object->territorial_area_1_080 : null) }}',
                territorialArea2Value:      '{{ old('territorialArea2', isset($object->territorial_area_2_080)? $object->territorial_area_2_080 : null) }}',
                territorialArea3Value:      '{{ old('territorialArea3', isset($object->territorial_area_3_080)? $object->territorial_area_3_080 : null) }}'
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
    <!-- /.octopus::stock.form -->
@stop

@section('rows')
    <!-- octopus::stock.form -->
    @include('pulsar::includes.html.form_hidden', [
       'name' => 'request',
       'value' => $object->request_080
    ])
    @include('pulsar::includes.html.form_hidden', [
       'name' => 'order',
       'value' => $object->order_080
    ])
    @include('pulsar::includes.html.form_hidden', [
       'name' => 'laboratory',
       'value' => $object->laboratory_080
    ])
    @include('pulsar::includes.html.form_hidden', [
       'name' => 'supervisor',
       'value' => $object->supervisor_080
    ])
    @include('pulsar::includes.html.form_hidden', [
        'name' => 'customer',
        'value' => $object->customer_080
    ])
    @include('pulsar::includes.html.form_text_group', [
        'label' => 'ID',
        'name' => 'id',
        'value' => isset($object->id_080)? $object->id_080 : null,
        'readOnly' => true,
        'fieldSize' => 2
    ])
    @if($resource == 'octopus-stock')
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
        'value' => $object->name_076,
        'valueId' => $object->shop_080,
        'maxLength' => '255',
        'rangeLength' => '2,255',
        'modalUrl' => route('octopusShop', [
            'offset' => $offset,
            'modal' => 1
        ]),
        'required' => true,
        'disabled' => $action == 'show' || $resource == 'octopus-laboratory-stock'
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
            'valueId' => $object->id_address_080,
            'maxLength' => '255',
            'rangeLength' => '2,255',
            'modalUrl' => route('octopusAddress', [
                'ref' => $object->shop_080,
                'modal' => 1,
                'modalShopView' => '0',
                'redirectParentJs' => '0',
                'offset' => $offset,
            ]),
            'required' => true,
            'disabled' => $action == 'show' || $resource == 'octopus-laboratory-stock'
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
                'value' => isset($object->company_name_080)? $object->company_name_080 : null,
                'maxLength' => '255', '
                rangeLength' => '2,255',
                'readOnly' => $action == 'show'
            ])
            @include('pulsar::includes.html.form_text_group', [
                'labelSize' => 4,
                'fieldSize' => 8,
                'label' => trans('pulsar::pulsar.name'),
                'name' => 'name',
                'value' => isset($object->name_080)? $object->name_080 : null,
                'maxLength' => '255',
                'rangeLength' => '2,255',
                'readOnly' => $action == 'show'
            ])
            @include('pulsar::includes.html.form_text_group', [
                'labelSize' => 4,
                'fieldSize' => 8,
                'label' => trans('pulsar::pulsar.surname'),
                'name' => 'surname',
                'value' => isset($object->surname_080)? $object->surname_080 : null,
                'maxLength' => '255',
                'rangeLength' => '2,255',
                'readOnly' => $action == 'show'
            ])
            @include('pulsar::includes.html.form_text_group', [
                'labelSize' => 4,
                'fieldSize' => 8,
                'label' => trans('pulsar::pulsar.phone'),
                'name' => 'phone',
                'value' => isset($object->phone_080)? $object->phone_080 : null,
                'maxLength' => '255',
                'rangeLength' => '2,255',
                'readOnly' => $action == 'show'
            ])
            @include('pulsar::includes.html.form_text_group', [
                'labelSize' => 4,
                'fieldSize' => 8,
                'label' => trans('pulsar::pulsar.email'),
                'name' => 'email',
                'value' => isset($object->email_080)? $object->email_080 : null,
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
                'value' => isset($object->cp_080)? $object->cp_080 : null,
                'maxLength' => '255',
                'rangeLength' => '2,255',
                'readOnly' => $action == 'show'
            ])
            @include('pulsar::includes.html.form_text_group', [
                'labelSize' => 4,
                'fieldSize' => 8,
                'label' => trans('pulsar::pulsar.locality'),
                'name' => 'locality',
                'value' => isset($object->locality_080)? $object->locality_080 : null,
                'maxLength' => '255',
                'rangeLength' => '2,255',
                'readOnly' => $action == 'show'
            ])
        </div>
    </div>
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans_choice('pulsar::pulsar.address', 1),
        'name' => 'address',
        'value' => old('address', isset($object->address_080)? $object->address_080 : null),
        'maxLength' => '255',
        'rangeLength' => '2,255',
        'required' => true,
        'readOnly' => $action == 'show'
    ])
    @include('pulsar::includes.html.form_textarea_group', [
        'label' => trans('pulsar::pulsar.observations'),
        'name' => 'observations',
        'value' => old('observations', isset($object->observations_080)? $object->observations_080 : null),
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
                'value' => date(config('pulsar.datePattern')),
                'readOnly' => true,
            ])
            @include('pulsar::includes.html.form_select_group', [
                'labelSize' => 4,
                'fieldSize' => 8,
                'label' => trans_choice('pulsar::pulsar.company', 1),
                'id' => 'company',
                'name' => 'company',
                'value' => $object->company_080,
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
                'value' => $object->family_080,
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
                'value' => $object->brand_080,
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
                'value' => $object->product_080,
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
                    'default-date' => old('expiration', isset($object->expiration_080)? date('Y-m-d', $object->expiration_080) : null)
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
                'value' => $object->view_width_080,
                'required' => true,
                'readOnly' => $action == 'show'
            ])
            @include('pulsar::includes.html.form_text_group', [
                'labelSize' => 4,
                'fieldSize' => 6,
                'type' => 'number',
                'label' => trans('octopus::pulsar.view_height') . ' (cm)',
                'name' => 'viewHeight',
                'value' => $object->view_height_080,
                'required' => true,
                'readOnly' => $action == 'show'
            ])
            @include('pulsar::includes.html.form_text_group', [
                'labelSize' => 4,
                'fieldSize' => 6,
                'type' => 'number',
                'label' => trans('octopus::pulsar.total_width') . ' (cm)',
                'name' => 'totalWidth',
                'value' => isset($object->total_width_080)? $object->total_width_080 : null,
                'readOnly' => $action == 'show'
            ])
            @include('pulsar::includes.html.form_text_group', [
                'labelSize' => 4,
                'fieldSize' => 6,
                'type' => 'number',
                'label' => trans('octopus::pulsar.total_height') . ' (cm)',
                'name' => 'totalHeight',
                'value' => isset($object->total_height_080)? $object->total_height_080 : null,
                'readOnly' => $action == 'show'
            ])
            @include('pulsar::includes.html.form_text_group', [
                'labelSize' => 4,
                'fieldSize' => 5,
                'type' => 'number',
                'label' => trans('pulsar::pulsar.units'),
                'name' => 'units',
                'value' => $object->units_080,
                'required' => true,
                'readOnly' => $action == 'show'
            ])
            @if($action == 'store')
                @include('pulsar::includes.html.form_file_group', [
                    'labelSize' => 4,
                    'fieldSize' => 8,
                    'label' => trans_choice('pulsar::pulsar.attachment', 1),
                    'objectId' => isset($object->id_080)? $object->id_080 : null,
                    'dirName' => '/packages/syscover/octopus/storage/attachment/order',
                    'name' => 'attachment',
                    'value' => isset($object->attachment_080)? $object->attachment_080 : null
                ])
            @else
                @include('pulsar::includes.html.form_file_group', [
                    'labelSize' => 4,
                    'fieldSize' => 8,
                    'label' => trans_choice('pulsar::pulsar.attachment', 1),
                    'objectId' => isset($object->id_080)? $object->id_080 : null,
                    'dirName' => '/packages/syscover/octopus/storage/attachment/stock',
                    'urlDelete' => route('deleteAttachmentOctopusOrder'),
                    'name' => 'attachment',
                    'value' => isset($object->attachment_080)? $object->attachment_080 : null,
                    'disabled' => $action == 'show'
                ])
            @endif
        </div>
    </div>
    @include('pulsar::includes.html.form_textarea_group', [
        'label' => trans_choice('pulsar::pulsar.comment', 2),
        'name' => 'comments',
        'value' => old('comments', isset($object->comments_080)? $object->comments_080 : null),
        'readOnly' => $action == 'show'
    ])
    <!-- /.octopus::stock.create -->
@stop