@extends('pulsar::layouts.form', ['action' => 'store', 'enctype' => true])

@section('script')
    @parent
    <!-- octopus::requests.create -->
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/jquery.magnific-popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/jquery.select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/jasny-bootstrap/css/jasny-bootstrap.min.css') }}">
    <style>


    </style>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/jquery.magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/jquery.select2/js/select2.min.js') }}"></script>
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

                countryValue:               '{{ Input::old('country') }}',
                territorialArea1Value:      '{{ Input::old('territorialArea1') }}',
                territorialArea2Value:      '{{ Input::old('territorialArea2') }}',
                territorialArea3Value:      '{{ Input::old('territorialArea3') }}'
            });

            $('[name="brand"]').on('change', function(){
/*
                $.ajax({
                    type: "POST",
                    url: this.options.type == 'laravel'? '/' + this.options.appName + '/pulsar/territorialareas1/json/from/country/' + $("[name='" + this.options.countrySelect + "']").val() : this.options.urlPlugin + '/getaddress/php/Controllers/Server.php',
                    data: this.options.type == 'laravel'? {_token: this.options.token} : {country : $("[name='" + this.options.countrySelect + "']").val(), action: 'getTerritorialArea1'},
                    dataType: 'json',
                    context: this,
                    success: function(response) {
                        $("[name='" + this.options.tA1Select + "'] option").remove();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        if(this.callback != null)
                        {
                            var response = {
                                success: false,
                                message: textStatus
                            };

                            this.callback(response);
                        }
                    }
                });
                */
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
            $.magnificPopup.close();
            // set url to add address
            $("#selectAddress a").attr('href', '{{ route("modalOctopusAddress") }}/' + data.id_076 + '/{{ $offset }}/1');

            $("#selectAddress").fadeIn();
        }
        function relatedAddress(data)
        {
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
    <!-- octopus::requests.create -->
@stop

@section('rows')
    <!-- octopus::requests.create -->
    @include('pulsar::includes.html.form_text_group', ['label' => 'ID', 'name' => 'id', 'readOnly' => true, 'fieldSize' => 2])
    @include('pulsar::includes.html.form_iframe_select_group', ['label' => trans_choice('octopus::pulsar.shop', 1), 'name' => 'shop', 'value' => Input::old('shop'), 'valueId' => Input::old('shopid'), 'maxLength' => '50', 'rangeLength' => '2,50', 'modalUrl' => route('modalOctopusShop', ['offset' => $offset, 'modal' => 1]), 'required' => true, 'readOnly' => true])

    @include('pulsar::includes.html.form_section_header', ['label' => trans_choice('pulsar::pulsar.address', 1), 'icon' => 'icon-road'])
    <div id="selectAddress" style="display: none">
        @include('pulsar::includes.html.form_iframe_select_group', ['label' => trans('pulsar::pulsar.alias'), 'name' => 'alias', 'value' => Input::old('alias'), 'valueId' => Input::old('aliasid'), 'maxLength' => '100', 'rangeLength' => '2,100', 'modalUrl' => route('modalOctopusAddress', ['ref' => $offset,'offset' => $offset, 'modal' => 1]), 'required' => true, 'labelSize' => 1, 'fieldSize' => 9, 'readOnly' => true])
        <hr>
    </div>
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.company_name'), 'name' => 'companyName', 'value' => Input::old('companyName'), 'maxLength' => '100', 'rangeLength' => '2,100'])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.name'), 'name' => 'name', 'value' => Input::old('name'), 'maxLength' => '50', 'rangeLength' => '2,50'])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.surname'), 'name' => 'surname', 'value' => Input::old('surname'), 'maxLength' => '50', 'rangeLength' => '2,50'])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.phone'), 'name' => 'phone', 'value' => Input::old('phone'), 'maxLength' => '50', 'rangeLength' => '2,50', 'fieldSize' => 6])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.email'), 'name' => 'email', 'value' => Input::old('email'), 'maxLength' => '100', 'rangeLength' => '2,100', 'fieldSize' => 6])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_select_group', ['label' => trans_choice('pulsar::pulsar.country', 1), 'name' => 'country', 'required' => true, 'idSelect' => 'id_002', 'nameSelect' => 'name_002', 'fieldSize' => 8, 'data' => ['language' => config('app.locale'), 'width' => '100%']])
            @include('pulsar::includes.html.form_select_group', ['wrapperId' => 'territorialArea1Wrapper', 'labelId' => 'territorialArea1Label', 'id' => 'territorialArea1', 'name' => 'territorialArea1', 'fieldSize' => 8, 'data' => ['language' => config('app.locale'), 'width' => '100%']])
            @include('pulsar::includes.html.form_select_group', ['wrapperId' => 'territorialArea2Wrapper', 'labelId' => 'territorialArea2Label', 'name' => 'territorialArea2', 'fieldSize' => 8, 'data' => ['language' => config('app.locale'), 'width' => '100%']])
            @include('pulsar::includes.html.form_select_group', ['wrapperId' => 'territorialArea3Wrapper', 'labelId' => 'territorialArea3Label', 'name' => 'territorialArea3', 'fieldSize' => 8, 'data' => ['language' => config('app.locale'), 'width' => '100%']])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.cp'), 'name' => 'cp', 'value' => Input::old('cp'), 'maxLength' => '10', 'rangeLength' => '2,10', 'fieldSize' => 4])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.locality'), 'name' => 'locality', 'value' => Input::old('locality'), 'maxLength' => '100', 'rangeLength' => '2,100', 'fieldSize' => 6])
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('pulsar::includes.html.form_text_group', ['label' => trans_choice('pulsar::pulsar.address', 1), 'name' => 'address', 'value' => Input::old('address'), 'maxLength' => '150', 'rangeLength' => '2,150', 'required' => true, 'labelSize' => 1, 'fieldSize' => 11])
            @include('pulsar::includes.html.form_textarea_group', ['label' => trans('pulsar::pulsar.observations'), 'name' => 'observations', 'value' => Input::old('observations'), 'labelSize' => 1, 'fieldSize' => 11])
        </div>
    </div>

    @include('pulsar::includes.html.form_section_header', ['label' => trans_choice('octopus::pulsar.request', 1), 'icon' => 'icon-inbox'])
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.date'), 'name' => 'name', 'value' => Input::old('name'), 'maxLength' => '100', 'rangeLength' => '2,100', 'fieldSize' => 4])
            @include('pulsar::includes.html.form_select_group', ['label' => trans_choice('pulsar::pulsar.company', 1), 'name' => 'company', 'value' => Input::old('company'), 'objects' => $companies, 'idSelect' => 'id_074', 'nameSelect' => 'company_name_074', 'required' => true, 'class' => 'select2', 'fieldSize' => 8, 'data' => ['language' => config('app.locale'), 'width' => '100%']])
            @include('pulsar::includes.html.form_select_group', ['label' => trans_choice('pulsar::pulsar.family', 1), 'name' => 'family', 'value' => Input::old('family'), 'objects' => $families, 'idSelect' => 'id_070', 'nameSelect' => 'name_070', 'required' => true, 'class' => 'select2', 'fieldSize' => 8, 'data' => ['language' => config('app.locale'), 'width' => '100%']])
            @include('pulsar::includes.html.form_select_group', ['label' => trans_choice('octopus::pulsar.brand', 1), 'name' => 'brand', 'value' => Input::old('brand'), 'objects' => $brands, 'idSelect' => 'id_071', 'nameSelect' => 'name_071', 'required' => true, 'class' => 'select2', 'fieldSize' => 8, 'data' => ['language' => config('app.locale'), 'width' => '100%']])
            @include('pulsar::includes.html.form_select_group', ['label' => trans_choice('octopus::pulsar.product', 1), 'name' => 'product', 'required' => false, 'idSelect' => 'id_072', 'nameSelect' => 'name_072', 'class' => 'select2', 'fieldSize' => 8, 'data' => ['language' => config('app.locale'), 'width' => '100%']])

            @include('pulsar::includes.html.form_text_group', ['label' => trans('octopus::pulsar.expiration'), 'name' => 'expiration', 'value' => Input::old('expiration'), 'maxLength' => '100', 'rangeLength' => '2,100', 'fieldSize' => 4, 'data' => ['mask' => '99/99/9999']])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['label' => trans('octopus::pulsar.view_width'), 'name' => 'viewWidth', 'value' => Input::old('viewWidth'), 'maxLength' => '100', 'rangeLength' => '2,100', 'fieldSize' => 4, 'data' => ['mask' => '999.99']])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('octopus::pulsar.view_height'), 'name' => 'viewHeight', 'value' => Input::old('viewHeight'), 'maxLength' => '100', 'rangeLength' => '2,100', 'fieldSize' => 4, 'data' => ['mask' => '999.99']])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('octopus::pulsar.total_width'), 'name' => 'totalWidth', 'value' => Input::old('totalWidth'), 'maxLength' => '100', 'rangeLength' => '2,100', 'fieldSize' => 4, 'data' => ['mask' => '999.99']])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('octopus::pulsar.total_height'), 'name' => 'totalHeight', 'value' => Input::old('totalHeight'), 'maxLength' => '100', 'rangeLength' => '2,100', 'fieldSize' => 4, 'data' => ['mask' => '999.99']])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.units'), 'name' => 'units', 'value' => Input::old('units'), 'maxLength' => '100', 'rangeLength' => '2,100', 'fieldSize' => 4, 'data' => ['mask' => '9?9']])
            @include('pulsar::includes.html.form_file_group', ['label' => trans('pulsar::pulsar.attached'), 'name' => 'attached', 'value' => Input::old('attached'), 'fieldSize' => 4])
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('pulsar::includes.html.form_textarea_group', ['label' => trans('pulsar::pulsar.observations'), 'name' => 'observations', 'value' => Input::old('observations'), 'labelSize' => 1, 'fieldSize' => 11])
        </div>
    </div>
    <!-- /octopus::requests.create -->
@stop