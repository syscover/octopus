<tr>
    <td style='background:#ffffff;text-align:left;vertical-align:top;font-size:15px;line-height:19px;font-family:"Helvetica Neue",helvetica,arial,sans-serif;color:#000000;padding:0;border-spacing:0;border-collapse:collapse'>
        <p class="small grey" style='font-family:"Helvetica Neue",helvetica,arial,sans-serif;color:grey;font-size:12px;line-height:15px;margin:0 0 15px'>
            {{ trans('pulsar::pulsar.actions_email') }},
            <a href="{{ route('editOctopusLaboratoryOrder', ['id' => $order->id_079, 'offset' => 0]) }}">{{ trans('octopus::pulsar.view_request') }}</a>
            |
            <a href="{{ route('createOctopusLaboratoryStock', ['id' => $key, 'offset' => 0]) }}">{{ trans('octopus::pulsar.create_order') }}</a>
        </p>
    </td>
</tr>