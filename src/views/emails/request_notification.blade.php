@extends('octopus::layouts.mail')

@section('mainContent')
<table cellspacing="0" cellpadding="0" width="100%" style="background:#ffffff;margin:0;padding:0;border:0;text-align:left;border-collapse:collapse;border-spacing:0">
    <tr>
        <td colspan="2" class="header_body brown" valign="middle" width="100%" style='background:#ffffff;text-align:left;font-size:15px;line-height:19px;font-family:"Helvetica Neue",helvetica,arial,sans-serif;border-collapse:collapse;padding:0;border-spacing:0;vertical-align:middle;padding-left:10px;width:auto !important;'>
            <strong>{{ trans('octopus::pulsar.message_create_request') }}</strong>
        </td>
    </tr>
    <tr>
        <td colspan="2" width="100%">&nbsp;</td>
    </tr>
    <!-- supervisor -->
    <tr>
        <td colspan="2" class="header_body brown" valign="middle" width="100%" style='background:#ffffff;text-align:left;font-size:15px;line-height:19px;font-family:"Helvetica Neue",helvetica,arial,sans-serif;border-collapse:collapse;padding:0;border-spacing:0;vertical-align:middle;padding-left:10px;width:auto !important'>
            <strong style="color:brown;">{{ trans_choice('octopus::pulsar.supervisor', 1) }}</strong>
        </td>
    </tr>
    <tr>
        <td colspan="2" class="content_body" style='background:#ffffff;text-align:left;vertical-align:top;font-size:15px;line-height:19px;border-collapse:collapse;color:#000000;border-spacing:0;font-family:"Helvetica Neue",helvetica,arial,sans-serif;padding:0 0 0 55px'>
            <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                <strong>{{ trans('pulsar::pulsar.name') }}:</strong> {{ $supervisor->name_010 . ' ' .  $supervisor->surname_010 }}
            </div>
            <br>
        </td>
    </tr>
    <!-- /supervisor -->
    <!-- shop -->
    <tr>
        <td colspan="2" class="header_body brown" valign="middle" width="100%" style='background:#ffffff;text-align:left;font-size:15px;line-height:19px;font-family:"Helvetica Neue",helvetica,arial,sans-serif;border-collapse:collapse;padding:0;border-spacing:0;vertical-align:middle;padding-left:10px;width:auto !important'>
            <strong style="color:brown;">{{ trans_choice('octopus::pulsar.shop', 1) }}</strong>
        </td>
    </tr>
    <tr>
        <td colspan="2" class="content_body" style='background:#ffffff;text-align:left;vertical-align:top;font-size:15px;line-height:19px;border-collapse:collapse;color:#000000;border-spacing:0;font-family:"Helvetica Neue",helvetica,arial,sans-serif;padding:0 0 0 55px'>
            <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                <strong>{{ trans_choice('pulsar::pulsar.customer', 1) }}:</strong> {{ $octopusRequest->company_name_075 }} <strong>({{ trans_choice('pulsar::pulsar.code', 1) . ' ' . $octopusRequest->code_075 }})</strong>
            </div>
            <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                <strong>{{ trans_choice('pulsar::pulsar.name', 1) }}:</strong> {{ $octopusRequest->name_076 }}
            </div>
        </td>
    </tr>
    <tr>
        <td class="content_body" style='background:#ffffff;text-align:left;vertical-align:top;font-size:15px;line-height:19px;border-collapse:collapse;color:#000000;border-spacing:0;font-family:"Helvetica Neue",helvetica,arial,sans-serif;padding:0 0 0 55px'>
            <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                <strong>{{ trans_choice('pulsar::pulsar.country', 1) }}:</strong> {{ $shop->name_002 }}
            </div>
            @if(! empty($shop->name_004))
                <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                    <strong>{{ $shop->territorial_area_2_002 }}:</strong> {{ $shop->name_004 }}
                </div>
            @endif
            <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                <strong>{{ trans('pulsar::pulsar.cp') }}:</strong> {{ $shop->cp_076 }}
            </div>
        </td>
        <td class="content_body" style='background:#ffffff;text-align:left;vertical-align:top;font-size:15px;line-height:19px;border-collapse:collapse;color:#000000;border-spacing:0;font-family:"Helvetica Neue",helvetica,arial,sans-serif;padding:0 0 0 55px'>
            @if(! empty($shop->name_003))
                <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                    <strong>{{ $shop->territorial_area_1_002 }}:</strong> {{ $shop->name_003 }}
                </div>
            @endif
            <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                <strong>{{ trans('pulsar::pulsar.locality') }}:</strong> {{ $shop->locality_076 }}
            </div>
            <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                <strong>&nbsp;</strong> &nbsp;
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="2" class="content_body" style='background:#ffffff;text-align:left;vertical-align:top;font-size:15px;line-height:19px;border-collapse:collapse;color:#000000;border-spacing:0;font-family:"Helvetica Neue",helvetica,arial,sans-serif;padding:0 0 0 55px'>
            <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                <strong>{{ trans_choice('pulsar::pulsar.address', 1) }}:</strong> {{ $shop->address_076 }}
            </div>
        </td>
    </tr>
    <tr>
        <td class="content_body" style='background:#ffffff;text-align:left;vertical-align:top;font-size:15px;line-height:19px;border-collapse:collapse;color:#000000;border-spacing:0;font-family:"Helvetica Neue",helvetica,arial,sans-serif;padding:0 0 0 55px'>
            <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                <strong>{{ trans_choice('pulsar::pulsar.phone', 1) }}:</strong> {{ $shop->phone_076 }}
            </div>
            <br>
        </td>
        <td class="content_body" style='background:#ffffff;text-align:left;vertical-align:top;font-size:15px;line-height:19px;border-collapse:collapse;color:#000000;border-spacing:0;font-family:"Helvetica Neue",helvetica,arial,sans-serif;padding:0 0 0 55px'>
            <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                <strong>{{ trans('pulsar::pulsar.email') }}:</strong> {{ $shop->email_076  }}
            </div>
            <br>
        </td>
    </tr>
    <!-- /shop -->
    <!-- address -->
    <tr>
        <td colspan="2" class="header_body brown" valign="middle" width="100%" style='background:#ffffff;text-align:left;font-size:15px;line-height:19px;font-family:"Helvetica Neue",helvetica,arial,sans-serif;border-collapse:collapse;padding:0;border-spacing:0;vertical-align:middle;padding-left:10px;width:auto !important'>
            <strong style="color:brown;">{{ trans_choice('octopus::pulsar.shipping_address', 1) }}</strong>
        </td>
    </tr>
    <tr>
        <td class="content_body" style='background:#ffffff;text-align:left;vertical-align:top;font-size:15px;line-height:19px;border-collapse:collapse;color:#000000;border-spacing:0;font-family:"Helvetica Neue",helvetica,arial,sans-serif;padding:0 0 0 55px'>
            <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                <strong>{{ trans_choice('pulsar::pulsar.company', 1) }}:</strong> {{ $octopusRequest->company_name_078 }}
            </div>
            <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                <strong>{{ trans_choice('pulsar::pulsar.country', 1) }}:</strong> {{ $octopusRequest->name_002 }}
            </div>
            @if(! empty($octopusRequest->name_004))
                <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                    <strong>{{ $octopusRequest->territorial_area_2_002 }}:</strong> {{ $octopusRequest->name_004 }}
                </div>
            @endif
            <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                <strong>{{ trans('pulsar::pulsar.cp') }}:</strong> {{ $octopusRequest->cp_078 }}
            </div>
        </td>

        <td class="content_body" style='background:#ffffff;text-align:left;vertical-align:top;font-size:15px;line-height:19px;border-collapse:collapse;color:#000000;border-spacing:0;font-family:"Helvetica Neue",helvetica,arial,sans-serif;padding:0 0 0 55px'>
            <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                <strong>{{ trans('pulsar::pulsar.name') }}:</strong> {{ $octopusRequest->name_078 . ' ' . $octopusRequest->surname_078  }}
            </div>
            @if(! empty($octopusRequest->name_003))
                <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                    <strong>{{ $octopusRequest->territorial_area_1_002 }}:</strong> {{ $octopusRequest->name_003 }}
                </div>
            @endif
            <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                <strong>{{ trans('pulsar::pulsar.locality') }}:</strong> {{ $octopusRequest->locality_078 }}
            </div>
            <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                <strong>&nbsp;</strong> &nbsp;
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="2" class="content_body" style='background:#ffffff;text-align:left;vertical-align:top;font-size:15px;line-height:19px;border-collapse:collapse;color:#000000;border-spacing:0;font-family:"Helvetica Neue",helvetica,arial,sans-serif;padding:0 0 0 55px'>
            <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                <strong>{{ trans_choice('pulsar::pulsar.address', 1) }}:</strong> {{ $octopusRequest->address_078 }}
            </div>
        </td>
    </tr>
    <tr>
        <td class="content_body" style='background:#ffffff;text-align:left;vertical-align:top;font-size:15px;line-height:19px;border-collapse:collapse;color:#000000;border-spacing:0;font-family:"Helvetica Neue",helvetica,arial,sans-serif;padding:0 0 0 55px'>
            <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                <strong>{{ trans_choice('pulsar::pulsar.phone', 1) }}:</strong> {{ $octopusRequest->phone_078 }}
            </div>
        </td>
        <td class="content_body" style='background:#ffffff;text-align:left;vertical-align:top;font-size:15px;line-height:19px;border-collapse:collapse;color:#000000;border-spacing:0;font-family:"Helvetica Neue",helvetica,arial,sans-serif;padding:0 0 0 55px'>
            <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                <strong>{{ trans('pulsar::pulsar.email') }}:</strong> {{ $octopusRequest->email_078  }}
            </div>
        </td>
    </tr>
    @if(! empty($octopusRequest->observations_078))
        <tr>
            <td colspan="2" class="content_body" style='background:#ffffff;text-align:left;vertical-align:top;font-size:15px;line-height:19px;border-collapse:collapse;color:#000000;border-spacing:0;font-family:"Helvetica Neue",helvetica,arial,sans-serif;padding:0 0 0 55px'>
                <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                    <strong>{{ trans('pulsar::pulsar.observations') }}:</strong> {!! $octopusRequest->observations_078 !!}
                </div>
                <br>
            </td>
        </tr>
    @endif
    <!-- /address -->
    <!-- request -->
    <tr>
        <td colspan="2" class="header_body brown" valign="middle" width="100%" style='background:#ffffff;text-align:left;font-size:15px;line-height:19px;font-family:"Helvetica Neue",helvetica,arial,sans-serif;border-collapse:collapse;padding:0;border-spacing:0;vertical-align:middle;padding-left:10px;width:auto !important'>
            <strong style="color:brown;">{{ trans_choice('octopus::pulsar.request', 1) }}</strong>
        </td>
    </tr>
    <tr>
        <td class="content_body" style='background:#ffffff;text-align:left;vertical-align:top;font-size:15px;line-height:19px;border-collapse:collapse;color:#000000;border-spacing:0;font-family:"Helvetica Neue",helvetica,arial,sans-serif;padding:0 0 0 55px'>
            <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                <strong>{{ trans_choice('pulsar::pulsar.code', 1) }}:</strong> {{ $octopusRequest->id_078 }}
            </div>
            <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                <strong>{{ trans_choice('pulsar::pulsar.date', 1) }}:</strong> {{ $octopusRequest->date_text_078 }}
            </div>
            <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                <strong>{{ trans_choice('octopus::pulsar.brand', 1) }}:</strong> {{ $octopusRequest->name_071 }}
            </div>
            <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                <strong>{{ trans_choice('pulsar::pulsar.family', 1) }}:</strong> {{ $octopusRequest->name_070 }}
            </div>
            <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                <strong>{{ trans('octopus::pulsar.view_width') . ' (cm)' }}:</strong> {{ number_format($octopusRequest->view_width_078, 2) }}
            </div>
            <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                <strong>{{ trans('octopus::pulsar.view_height') . ' (cm)' }}:</strong> {{ number_format($octopusRequest->view_height_078, 2) }}
            </div>
            <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                <strong>{{ trans('pulsar::pulsar.units') }}:</strong> {{ $octopusRequest->units_078 }}
            </div>
            <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                <strong>{{ trans_choice('pulsar::pulsar.comment', 2) }}:</strong> {!! $octopusRequest->comments_078 !!}
            </div>
        </td>

        <td class="content_body" style='background:#ffffff;text-align:left;vertical-align:top;font-size:15px;line-height:19px;border-collapse:collapse;color:#000000;border-spacing:0;font-family:"Helvetica Neue",helvetica,arial,sans-serif;padding:0 0 0 55px'>
            <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                <strong>{{ trans_choice('pulsar::pulsar.company', 1) }}:</strong> {{ $octopusRequest->company_name_074 }}
            </div>
            <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                <strong>{{ trans('octopus::pulsar.expiration') }}:</strong> {{ $octopusRequest->expiration_text_078 }}
            </div>
            <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                <strong>{{ trans_choice('octopus::pulsar.product', 1) }}:</strong> {{ $octopusRequest->name_072 }}
            </div>
            <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                <strong>&nbsp;</strong> &nbsp;
            </div>
            <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                <strong>{{ trans('octopus::pulsar.total_width') . ' (cm)' }}:</strong> {{ number_format($octopusRequest->total_width_078, 2) }}
            </div>
            <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                <strong>{{ trans('octopus::pulsar.total_height') . ' (cm)' }}:</strong> {{ number_format($octopusRequest->total_height_078, 2) }}
            </div>
            @if(! empty($octopusRequest->attachment_078))
                <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                    <strong>{{ trans_choice('pulsar::pulsar.attachment', 1) }}:</strong> <a href="{{ asset('packages/syscover/octopus/storage/attachment/request/' . $octopusRequest->attachment_078 ) }}">{{ $octopusRequest->attachment_078 }}</a>
                </div>
            @endif
        </td>
    </tr>
    <!-- /request -->
    <tr>
        <td colspan="2" width="100%">&nbsp;</td>
    </tr>
</table>
@stop
