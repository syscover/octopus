        <li{!! Miscellaneous::setCurrentOpenPage(['octopus-family','octopus-brand','octopus-product','octopus-laboratory']) !!}>
            <a href="javascript:void(0);"><i class="icomoon-icon-images"></i>Octopus</a>
            <ul class="sub-menu">
                @if(Session::get('userAcl')->isAllowed(Auth::user()->profile_010, 'mifinan', 'access'))
                    <li{{ Miscellaneous::setCurrentPage('mifinan') }}><a href="{{ route('OctopusFamily') }}"><i class="icomoon-icon-truck"></i>Solicitudes</a></li>
                @endif
                <li{!! Miscellaneous::setCurrentOpenPage(['octopus-family','octopus-brand','octopus-product','octopus-laboratory']) !!}>
                    <a href="javascript:void(0);"><i class="icomoon-icon-grid"></i>Tablas maestras</a>
                    <ul class="sub-menu" >
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