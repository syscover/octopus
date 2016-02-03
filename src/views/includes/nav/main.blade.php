        <li{!! Miscellaneous::setCurrentOpenPage(['octopus-family','octopus-brand','octopus-product','octopus-laboratory','octopus-company','octopus-customer','octopus-shop','octopus-request','octopus-order', 'octopus-preference']) !!}>
            <a href="javascript:void(0)"><i class="sys-icon-octopus"></i>Octopus</a>
            <ul class="sub-menu">
                @if(session('userAcl')->allows('mifinan', 'access'))
                    <li{!! Miscellaneous::setCurrentPage('mifinan') !!}><a href="{{ route('OctopusFamily') }}"><i class="fa fa-th-large"></i>{{ trans_choice('octopus::pulsar.committed', 2) }}</a></li>
                @endif
                @if(session('userAcl')->allows('mifinan', 'access'))
                    <li{!! Miscellaneous::setCurrentPage('octopus-order') !!}><a href="{{ route('OctopusOrder') }}"><i class="fa fa-refresh"></i>{{ trans_choice('octopus::pulsar.order', 2) }}</a></li>
                @endif
                @if(session('userAcl')->allows('octopus-request', 'access'))
                    <li{!! Miscellaneous::setCurrentPage('octopus-request') !!}><a href="{{ route('OctopusRequest') }}"><i class="fa fa-inbox"></i>{{ trans_choice('octopus::pulsar.request', 2) }}</a></li>
                @endif
                <li{!! Miscellaneous::setCurrentOpenPage(['octopus-family','octopus-brand','octopus-product','octopus-laboratory','octopus-company','octopus-customer','octopus-shop', 'octopus-preference']) !!}>
                    <a href="javascript:void(0)"><i class="icomoon-icon-grid"></i>{{ trans('pulsar::pulsar.master_tables') }}</a>
                    <ul class="sub-menu">
                        @if(session('userAcl')->allows('octopus-shop', 'access'))
                            <li{!! Miscellaneous::setCurrentPage('octopus-shop') !!}><a href="{{ route('OctopusShop') }}"><i class="icomoon-icon-office"></i>{{ trans_choice('octopus::pulsar.shop', 2) }}</a></li>
                        @endif
                        @if(session('userAcl')->allows('octopus-customer', 'access'))
                            <li{!! Miscellaneous::setCurrentPage('octopus-customer') !!}><a href="{{ route('OctopusCustomer') }}"><i class="icomoon-icon-users"></i>{{ trans_choice('pulsar::pulsar.customer', 2) }}</a></li>
                        @endif
                        @if(session('userAcl')->allows('octopus-company', 'access'))
                            <li{!! Miscellaneous::setCurrentPage('octopus-company') !!}><a href="{{ route('OctopusCompany') }}"><i class="fa fa-building"></i>{{ trans_choice('octopus::pulsar.company', 2) }}</a></li>
                        @endif
                        @if(session('userAcl')->allows('octopus-laboratory', 'access'))
                            <li{!! Miscellaneous::setCurrentPage('octopus-laboratory') !!}><a href="{{ route('OctopusLaboratory') }}"><i class="icomoon-icon-lab"></i>{{ trans_choice('octopus::pulsar.laboratory', 2) }}</a></li>
                        @endif
                        @if(session('userAcl')->allows('octopus-product', 'access'))
                            <li{!! Miscellaneous::setCurrentPage('octopus-product') !!}><a href="{{ route('OctopusProduct') }}"><i class="icomoon-icon-cube"></i>{{ trans_choice('octopus::pulsar.product', 2) }}</a></li>
                        @endif
                        @if(session('userAcl')->allows('octopus-brand', 'access'))
                            <li{!! Miscellaneous::setCurrentPage('octopus-brand') !!}><a href="{{ route('OctopusBrand') }}"><i class="icomoon-icon-medal-2"></i>{{ trans_choice('octopus::pulsar.brand', 2) }}</a></li>
                        @endif
                        @if(session('userAcl')->allows('octopus-family', 'access'))
                            <li{!! Miscellaneous::setCurrentPage('octopus-family') !!}><a href="{{ route('OctopusFamily') }}"><i class="fa fa-align-justify"></i>{{ trans_choice('pulsar::pulsar.family', 2) }}</a></li>
                        @endif
                        @if(session('userAcl')->allows('forms-preference', 'access'))
                            <li{!! Miscellaneous::setCurrentPage('octopus-preference') !!}><a href="{{ route('OctopusPreference') }}"><i class="fa fa-cog"></i>{{ trans_choice('pulsar::pulsar.preference', 2) }}</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
        </li>