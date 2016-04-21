<li{!! is_current_resource(['octopus-family','octopus-brand','octopus-product','octopus-laboratory','octopus-company','octopus-customer','octopus-shop','octopus-request','octopus-supervisor-request','octopus-order','octopus-stock', 'octopus-supervisor-stock', 'octopus-preference']) !!}>
    <a href="javascript:void(0)"><i class="sys-icon-octopus"></i>Octopus</a>
    <ul class="sub-menu">
        @if(is_allowed('octopus-stock', 'access'))
            <li{!! is_current_resource('octopus-stock') !!}><a href="{{ route('octopusStock') }}"><i class="fa fa-th-large"></i>{{ trans_choice('octopus::pulsar.stock', 2) }}</a></li>
        @endif
        @if(is_allowed('octopus-supervisor-stock', 'access'))
            <li{!! is_current_resource('octopus-supervisor-stock') !!}><a href="{{ route('octopusSupervisorStock') }}"><i class="fa fa-th-large"></i>{{ trans_choice('octopus::pulsar.supervisor_stock', 2) }}</a></li>
        @endif
        @if(is_allowed('octopus-order', 'access'))
            <li{!! is_current_resource('octopus-order') !!}><a href="{{ route('octopusOrder') }}"><i class="fa fa-refresh"></i>{{ trans_choice('octopus::pulsar.order', 2) }}</a></li>
        @endif
        @if(is_allowed('octopus-request', 'access'))
            <li{!! is_current_resource('octopus-request') !!}><a href="{{ route('octopusRequest') }}"><i class="fa fa-inbox"></i>{{ trans_choice('octopus::pulsar.request', 2) }}</a></li>
        @endif
        @if(is_allowed('octopus-supervisor-request', 'access'))
            <li{!! is_current_resource('octopus-supervisor-request') !!}><a href="{{ route('octopusSupervisorRequest') }}"><i class="fa fa-inbox"></i>{{ trans_choice('octopus::pulsar.supervisor_request', 2) }}</a></li>
        @endif
        <li{!! is_current_resource(['octopus-family','octopus-brand','octopus-product','octopus-laboratory','octopus-company','octopus-customer','octopus-shop', 'octopus-preference'], true) !!}>
            <a href="javascript:void(0)"><i class="icomoon-icon-grid"></i>{{ trans('pulsar::pulsar.master_tables') }}</a>
            <ul class="sub-menu">
                @if(is_allowed('octopus-shop', 'access'))
                    <li{!! is_current_resource('octopus-shop') !!}><a href="{{ route('octopusShop', ['modal' => 0]) }}"><i class="icomoon-icon-office"></i>{{ trans_choice('octopus::pulsar.shop', 2) }}</a></li>
                @endif
                @if(is_allowed('octopus-customer', 'access'))
                    <li{!! is_current_resource('octopus-customer') !!}><a href="{{ route('octopusCustomer', ['modal' => 0]) }}"><i class="icomoon-icon-users"></i>{{ trans_choice('pulsar::pulsar.customer', 2) }}</a></li>
                @endif
                @if(is_allowed('octopus-company', 'access'))
                    <li{!! is_current_resource('octopus-company') !!}><a href="{{ route('octopusCompany') }}"><i class="fa fa-building"></i>{{ trans_choice('octopus::pulsar.company', 2) }}</a></li>
                @endif
                @if(is_allowed('octopus-laboratory', 'access'))
                    <li{!! is_current_resource('octopus-laboratory') !!}><a href="{{ route('octopusLaboratory') }}"><i class="icomoon-icon-lab"></i>{{ trans_choice('octopus::pulsar.laboratory', 2) }}</a></li>
                @endif
                @if(is_allowed('octopus-product', 'access'))
                    <li{!! is_current_resource('octopus-product') !!}><a href="{{ route('octopusProduct') }}"><i class="icomoon-icon-cube"></i>{{ trans_choice('octopus::pulsar.product', 2) }}</a></li>
                @endif
                @if(is_allowed('octopus-brand', 'access'))
                    <li{!! is_current_resource('octopus-brand') !!}><a href="{{ route('octopusBrand') }}"><i class="icomoon-icon-medal-2"></i>{{ trans_choice('octopus::pulsar.brand', 2) }}</a></li>
                @endif
                @if(is_allowed('octopus-family', 'access'))
                    <li{!! is_current_resource('octopus-family') !!}><a href="{{ route('octopusFamily') }}"><i class="fa fa-align-justify"></i>{{ trans_choice('pulsar::pulsar.family', 2) }}</a></li>
                @endif
                @if(is_allowed('octopus-preference', 'access'))
                    <li{!! is_current_resource('octopus-preference') !!}><a href="{{ route('octopusPreference') }}"><i class="fa fa-cog"></i>{{ trans_choice('pulsar::pulsar.preference', 2) }}</a></li>
                @endif
            </ul>
        </li>
    </ul>
</li>