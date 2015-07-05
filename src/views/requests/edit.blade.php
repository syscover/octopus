@extends('pulsar::layouts.form', ['action' => 'update', 'enctype' => true])

@section('script')
    @parent
    <!-- octopus::requests.edit -->
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/jquery.magnific-popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/jquery.select2/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/jquery.select2.custom/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/jasny-bootstrap/css/jasny-bootstrap.min.css') }}">

    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/jquery.magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/jquery.select2.custom/js/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/jquery.select2/js/i18n/' . config('app.locale') . '.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/getaddress/js/jquery.getaddress.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $('[name="country"]').data('language', '{{ config('app.locale') }}');

            $.getAddress({
                id:                         '01',
                type:                       'laravel',
                appName:                    'pulsar',
                token:                      '{{ csrf_token() }}',
                lang:                       '{{ config('app.locale') }}',
                highlightCountrys:          ['ES','US'],

                useSeparatorHighlight:      true,
                textSeparatorHighlight:     '------------------',

                countryValue:               '{{ $object->country_078 }}',
                territorialArea1Value:      '{{ $object->territorial_area_1_078 }}',
                territorialArea2Value:      '{{ $object->territorial_area_2_078 }}',
                territorialArea3Value:      '{{ $object->territorial_area_3_078 }}'
            });

            $('[name="brand"]').on('change', function() {

                $("[name='product']").val("");
                $("[name='product']").select2();

                if($('[name="brand"]').val() != "")
                {
                    $.ajax({
                        type: "POST",
                        url: '{{ route('jsonBrandProductsOctopusProduct') }}/' +  $('[name="brand"]').val(),
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                        dataType: 'json',
                        context: this,
                        success: function(response) {
                            $("[name='product'] option").remove();
                            $("[name='product']").append(new Option("Select a {{ trans_choice('octopus::pulsar.product', 1) }}", ""));
                            for(var i in response)
                            {
                                $("[name='product']").append(new Option(response[i].name_072, response[i].id_072));
                            }
                        }
                    });
                }
                else
                {
                    $("[name='product'] option").remove();
                    $("[name='product']").append(new Option("Select a {{ trans_choice('octopus::pulsar.product', 1) }}", ""));
                }
            });


            $('.magnific-popup').magnificPopup({
                type: 'iframe',
                removalDelay: 300,
                mainClass: 'mfp-fade'
            });
        });

        function relatedShop(data)
        {
            $('[name="shop"]').val(data.name_076);
            $('[name="shopid"]').val(data.id_076);
            $('[name="customer"]').val(data.customer_076);
            $.magnificPopup.close();

            // set url to add address
            $("#selectAddress a").attr('href', '{{ route("modalOctopusAddress") }}/' + data.id_076 + '/{{ $offset }}/1');

            $.ajax({
                type: "POST",
                url: '{{ route('jsonFavoriteAddressOctopusAddress') }}/' +  data.id_076,
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                dataType: 'json',
                success: function(response) {
                    $('[name="idAddress"]').val(response.id_077);
                    $('[name="alias"]').val(response.alias_077);
                    $('[name="aliasid"]').val(response.id_077);
                    $('[name="companyName"]').val(response.company_name_077);
                    $('[name="name"]').val(response.name_077);
                    $('[name="surname"]').val(response.surname_077);

                    $.getAddress.setOptions({
                        id:                         '01',
                        countryValue:               response.country_077,
                        territorialArea1Value:      response.territorial_area_1_077,
                        territorialArea2Value:      response.territorial_area_2_077,
                        territorialArea3Value:      response.territorial_area_3_077
                    });

                    $('[name="cp"]').val(response.cp_077);
                    $('[name="locality"]').val(response.locality_077);
                    $('[name="phone"]').val(response.phone_077);
                    $('[name="email"]').val(response.email_077);
                    $('[name="address"]').val(response.address_077);
                }
            });

            $("#selectAddress").fadeIn();
        }
        function relatedAddress(data)
        {
            $('[name="idAddress"]').val(data.id_077);
            $('[name="alias"]').val(data.alias_077);
            $('[name="aliasid"]').val(data.id_077);
            $('[name="companyName"]').val(data.company_name_077);
            $('[name="name"]').val(data.name_077);
            $('[name="surname"]').val(data.surname_077);

            $.getAddress.setOptions({
                id:                         '01',
                countryValue:               data.country_077,
                territorialArea1Value:      data.territorial_area_1_077,
                territorialArea2Value:      data.territorial_area_2_077,
                territorialArea3Value:      data.territorial_area_3_077
            });

            $('[name="cp"]').val(data.cp_077);
            $('[name="locality"]').val(data.locality_077);
            $('[name="phone"]').val(data.phone_077);
            $('[name="email"]').val(data.email_077);
            $('[name="address"]').val(data.address_077);
            $.magnificPopup.close();
        }
    </script>
    <!-- octopus::requests.edit -->
@stop

@section('rows')
    <!-- octopus::requests.edit -->
    @include('pulsar::includes.html.form_hidden', ['name' => 'supervisor', 'value' => $object->supervisor_078 ])
    @include('pulsar::includes.html.form_hidden', ['name' => 'customer', 'value' => $object->customer_078])
    @include('pulsar::includes.html.form_text_group', ['label' => 'ID', 'name' => 'id', 'readOnly' => true, 'fieldSize' => 2, 'value' => $object->id_078])
    @include('pulsar::includes.html.form_iframe_select_group', ['label' => trans_choice('octopus::pulsar.shop', 1), 'name' => 'shop', 'value' => $object->name_076, 'valueId' => $object->shop_078, 'maxLength' => '50', 'rangeLength' => '2,50', 'modalUrl' => route('modalOctopusShop', ['offset' => $offset, 'modal' => 1]), 'required' => true, 'readOnly' => true])
    @include('pulsar::includes.html.form_section_header', ['label' => trans_choice('pulsar::pulsar.address', 1), 'icon' => 'icon-road'])
    <div id="selectAddress" @if(!isset($object->id_address_078)) style="display: none"@endif>
        @include('pulsar::includes.html.form_iframe_select_group', ['label' => trans('pulsar::pulsar.alias'), 'name' => 'alias', 'value' => $object->alias_077, 'valueId' => $object->id_address_078, 'maxLength' => '100', 'rangeLength' => '2,100', 'modalUrl' => route('modalOctopusAddress', ['ref' => $object->shop_078, 'offset' => $offset, 'modal' => 1]), 'required' => true, 'labelSize' => 1, 'fieldSize' => 9, 'readOnly' => true])
        <hr>
    </div>
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.company_name'), 'name' => 'companyName', 'value' => $object->company_name_078, 'maxLength' => '100', 'rangeLength' => '2,100'])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.name'), 'name' => 'name', 'value' => $object->name_078, 'maxLength' => '50', 'rangeLength' => '2,50'])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.surname'), 'name' => 'surname', 'value' => $object->surname_078, 'maxLength' => '50', 'rangeLength' => '2,50'])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.phone'), 'name' => 'phone', 'value' => $object->phone_078, 'maxLength' => '50', 'rangeLength' => '2,50', 'fieldSize' => 6])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.email'), 'name' => 'email', 'value' => $object->email_078, 'maxLength' => '100', 'rangeLength' => '2,100', 'fieldSize' => 6])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_select_group', ['label' => trans_choice('pulsar::pulsar.country', 1), 'id' => 'country', 'name' => 'country', 'required' => true, 'idSelect' => 'id_002', 'nameSelect' => 'name_002', 'class' => 'select2', 'fieldSize' => 8, 'data' => ['language' => config('app.locale'), 'width' => '100%', 'error-placement' => 'select2-country-outer-container']])
            @include('pulsar::includes.html.form_select_group', ['containerId' => 'territorialArea1Wrapper', 'labelId' => 'territorialArea1Label', 'name' => 'territorialArea1', 'class' => 'select2', 'fieldSize' => 8, 'data' => ['language' => config('app.locale'), 'width' => '100%']])
            @include('pulsar::includes.html.form_select_group', ['containerId' => 'territorialArea2Wrapper', 'labelId' => 'territorialArea2Label', 'name' => 'territorialArea2', 'class' => 'select2', 'fieldSize' => 8, 'data' => ['language' => config('app.locale'), 'width' => '100%']])
            @include('pulsar::includes.html.form_select_group', ['containerId' => 'territorialArea3Wrapper', 'labelId' => 'territorialArea3Label', 'name' => 'territorialArea3', 'class' => 'select2', 'fieldSize' => 8, 'data' => ['language' => config('app.locale'), 'width' => '100%']])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.cp'), 'name' => 'cp', 'value' => $object->cp_078, 'maxLength' => '10', 'rangeLength' => '2,10', 'fieldSize' => 4])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.locality'), 'name' => 'locality', 'value' => $object->locality_078, 'maxLength' => '100', 'rangeLength' => '2,100', 'fieldSize' => 6])
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('pulsar::includes.html.form_text_group', ['label' => trans_choice('pulsar::pulsar.address', 1), 'name' => 'address', 'value' => $object->address_078, 'maxLength' => '150', 'rangeLength' => '2,150', 'required' => true, 'labelSize' => 1, 'fieldSize' => 11])
            @include('pulsar::includes.html.form_textarea_group', ['label' => trans('pulsar::pulsar.observations'), 'name' => 'observations', 'value' => $object->observations_078, 'labelSize' => 1, 'fieldSize' => 11])
        </div>
    </div>
    @include('pulsar::includes.html.form_section_header', ['label' => trans_choice('octopus::pulsar.request', 1), 'icon' => 'icon-inbox'])
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.date'), 'name' => 'date', 'readOnly' => true, 'value' => date('d-m-Y', $object->date_078), 'maxLength' => '100', 'rangeLength' => '2,100', 'fieldSize' => 4])
            @include('pulsar::includes.html.form_select_group', ['label' => trans_choice('pulsar::pulsar.company', 1), 'id' => 'company', 'name' => 'company', 'value' => $object->company_078, 'objects' => $companies, 'idSelect' => 'id_074', 'nameSelect' => 'company_name_074', 'required' => true, 'class' => 'select2', 'fieldSize' => 8, 'data' => ['language' => config('app.locale'), 'width' => '100%', 'error-placement' => 'select2-company-outer-container']])
            @include('pulsar::includes.html.form_select_group', ['label' => trans_choice('pulsar::pulsar.family', 1), 'id' => 'family', 'name' => 'family', 'value' => $object->family_078, 'objects' => $families, 'idSelect' => 'id_070', 'nameSelect' => 'name_070', 'required' => true, 'class' => 'select2', 'fieldSize' => 8, 'data' => ['language' => config('app.locale'), 'width' => '100%', 'error-placement' => 'select2-family-outer-container']])
            @include('pulsar::includes.html.form_select_group', ['label' => trans_choice('octopus::pulsar.brand', 1), 'id' => 'brand', 'name' => 'brand', 'value' => $object->brand_078, 'objects' => $brands, 'idSelect' => 'id_071', 'nameSelect' => 'name_071', 'required' => true, 'class' => 'select2', 'fieldSize' => 8, 'data' => ['language' => config('app.locale'), 'width' => '100%', 'error-placement' => 'select2-brand-outer-container']])
            @include('pulsar::includes.html.form_select_group', ['label' => trans_choice('octopus::pulsar.product', 1), 'id' => 'product', 'name' => 'product', 'value' => $object->product_078,  'objects' => $products, 'idSelect' => 'id_072', 'nameSelect' => 'name_072', 'required' => true, 'class' => 'select2', 'fieldSize' => 8, 'data' => ['language' => config('app.locale'), 'width' => '100%', 'error-placement' => 'select2-product-outer-container']])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('octopus::pulsar.expiration'), 'name' => 'expiration', 'value' => $object->expiration_078? date('d-m-Y', $object->expiration_078) : null, 'maxLength' => '100', 'rangeLength' => '2,100', 'fieldSize' => 4, 'data' => ['mask' => '99-99-9999']])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['label' => trans('octopus::pulsar.view_width'), 'name' => 'viewWidth', 'value' => $object->view_width_078, 'fieldSize' => 4, 'required' => true, 'data' => ['mask' => '999.99']])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('octopus::pulsar.view_height'), 'name' => 'viewHeight', 'value' => $object->view_height_078, 'fieldSize' => 4, 'required' => true, 'data' => ['mask' => '999.99']])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('octopus::pulsar.total_width'), 'name' => 'totalWidth', 'value' => $object->total_width_078, 'fieldSize' => 4, 'data' => ['mask' => '999.99']])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('octopus::pulsar.total_height'), 'name' => 'totalHeight', 'value' => $object->total_height_078, 'fieldSize' => 4, 'data' => ['mask' => '999.99']])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.units'), 'name' => 'units', 'value' => $object->units_078, 'fieldSize' => 4, 'required' => true, 'data' => ['mask' => '9?9']])
            @include('pulsar::includes.html.form_file_group', ['label' => trans('pulsar::pulsar.attached'), 'name' => 'attached', 'value' => Input::old('attached'), 'fieldSize' => 4])
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('pulsar::includes.html.form_textarea_group', ['label' => trans_choice('pulsar::pulsar.comment', 2), 'name' => 'comments', 'value' => $object->comments_078, 'labelSize' => 1, 'fieldSize' => 11])
        </div>
    </div>
    <!-- /octopus::requests.edit -->
@stop