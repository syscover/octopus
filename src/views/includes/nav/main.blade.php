        <li{!! Miscellaneous::setCurrentOpenPage(['octopus-family','octopus-brand','octopus-product','octopus-laboratory','octopus-company','octopus-customer','octopus-shop','octopus-request']) !!}>
            <a href="javascript:void(0);"><i class="sys-icon-octopus"></i>Octopus</a>
            <ul class="sub-menu">
                @if(Session::get('userAcl')->isAllowed(Auth::user()->profile_010, 'mifinan', 'access'))
                    <li{!! Miscellaneous::setCurrentPage('mifinan') !!}><a href="{{ route('OctopusFamily') }}"><i class="icon-th-large"></i>{{ trans_choice('octopus::pulsar.committed', 2) }}</a></li>
                @endif
                @if(Session::get('userAcl')->isAllowed(Auth::user()->profile_010, 'mifinan', 'access'))
                    <li{!! Miscellaneous::setCurrentPage('mifinan') !!}><a href="{{ route('OctopusFamily') }}"><i class="icon-refresh"></i>{{ trans_choice('octopus::pulsar.order', 2) }}</a></li>
                @endif
                @if(Session::get('userAcl')->isAllowed(Auth::user()->profile_010, 'octopus-request', 'access'))
                    <li{!! Miscellaneous::setCurrentPage('octopus-request') !!}><a href="{{ route('OctopusRequest') }}"><i class="icon-inbox"></i>{{ trans_choice('octopus::pulsar.request', 2) }}</a></li>
                @endif
                <li{!! Miscellaneous::setCurrentOpenPage(['octopus-family','octopus-brand','octopus-product','octopus-laboratory','octopus-company','octopus-customer','octopus-shop']) !!}>
                    <a href="javascript:void(0);"><i class="icomoon-icon-grid"></i>Tablas maestras</a>
                    <ul class="sub-menu">
                        @if(Session::get('userAcl')->isAllowed(Auth::user()->profile_010, 'octopus-shop', 'access'))
                            <li{!! Miscellaneous::setCurrentPage('octopus-shop') !!}><a href="{{ route('OctopusShop') }}"><i class="icomoon-icon-office"></i>{{ trans_choice('octopus::pulsar.shop', 2) }}</a></li>
                        @endif
                        @if(Session::get('userAcl')->isAllowed(Auth::user()->profile_010, 'octopus-customer', 'access'))
                            <li{!! Miscellaneous::setCurrentPage('octopus-customer') !!}><a href="{{ route('OctopusCustomer') }}"><i class="icomoon-icon-users"></i>{{ trans_choice('pulsar::pulsar.customer', 2) }}</a></li>
                        @endif
                        @if(Session::get('userAcl')->isAllowed(Auth::user()->profile_010, 'octopus-company', 'access'))
                            <li{!! Miscellaneous::setCurrentPage('octopus-company') !!}><a href="{{ route('OctopusCompany') }}"><i class="icon-building"></i>{{ trans_choice('octopus::pulsar.company', 2) }}</a></li>
                        @endif
                        @if(Session::get('userAcl')->isAllowed(Auth::user()->profile_010, 'octopus-laboratory', 'access'))
                            <li{!! Miscellaneous::setCurrentPage('octopus-laboratory') !!}><a href="{{ route('OctopusLaboratory') }}"><i class="icomoon-icon-lab"></i>{{ trans_choice('octopus::pulsar.laboratory', 2) }}</a></li>
                        @endif
                        @if(Session::get('userAcl')->isAllowed(Auth::user()->profile_010, 'octopus-product', 'access'))
                            <li{!! Miscellaneous::setCurrentPage('octopus-product') !!}><a href="{{ route('OctopusProduct') }}"><i class="icomoon-icon-cube"></i>{{ trans_choice('octopus::pulsar.product', 2) }}</a></li>
                        @endif
                        @if(Session::get('userAcl')->isAllowed(Auth::user()->profile_010, 'octopus-brand', 'access'))
                            <li{!! Miscellaneous::setCurrentPage('octopus-brand') !!}><a href="{{ route('OctopusBrand') }}"><i class="icomoon-icon-medal-2"></i>{{ trans_choice('octopus::pulsar.brand', 2) }}</a></li>
                        @endif
                        @if(Session::get('userAcl')->isAllowed(Auth::user()->profile_010, 'octopus-family', 'access'))
                            <li{!! Miscellaneous::setCurrentPage('octopus-family') !!}><a href="{{ route('OctopusFamily') }}"><i class="icon-align-justify"></i>{{ trans_choice('pulsar::pulsar.family', 2) }}</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
        </li>