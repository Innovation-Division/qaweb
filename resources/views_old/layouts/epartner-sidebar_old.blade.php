<div class="collapse navbar-collapse" id="sidebar-menu">
    <ul class="navbar-nav pt-lg-3">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/epolicy') }}">
                <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z"></path>
                        <path stroke="{{ (request()->is('epolicy')) ? '#E4509A' : '' }}" d="M5 12l-2 0l9 -9l9 9l-2 0">
                        </path>
                        <path stroke="{{ (request()->is('epolicy')) ? '#E4509A' : '' }}"
                            d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                        <path stroke="{{ (request()->is('epolicy')) ? '#E4509A' : '' }}"
                            d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                    </svg>
                </span>
                <span class="nav-link-title {{ (request()->is('epolicy')) ? 'nav-link-title-active' : '' }} ">
                    Home
                </span>
            </a>
        </li>
        @if(\Auth::user()->type === 'C' || \Auth::user()->type === 'A' || \Auth::user()->type === 'B')
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/policies') }}">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-notes">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path stroke="{{ (request()->is('policies')) ? '#E4509A' : '' }}"
                                d="M5 3m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z" />
                            <path stroke="{{ (request()->is('policies')) ? '#E4509A' : '' }}" d="M9 7l6 0" />
                            <path stroke="{{ (request()->is('policies')) ? '#E4509A' : '' }}" d="M9 11l6 0" />
                            <path stroke="{{ (request()->is('policies')) ? '#E4509A' : '' }}" d="M9 15l4 0" />
                        </svg>
                    </span>
                    <span class="nav-link-title {{ (request()->is('policies')) ? 'nav-link-title-active' : '' }}">
                        Policies
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/quotation') }}">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-file-plus">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path stroke="{{ (request()->is('quotation')) ? '#E4509A' : '' }}"
                                d="M14 3v4a1 1 0 0 0 1 1h4" />
                            <path stroke="{{ (request()->is('quotation')) ? '#E4509A' : '' }}"
                                d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                            <path stroke="{{ (request()->is('quotation')) ? '#E4509A' : '' }}" d="M12 11l0 6" />
                            <path stroke="{{ (request()->is('quotation')) ? '#E4509A' : '' }}" d="M9 14l6 0" />
                        </svg>
                    </span>
                    <span class="nav-link-title {{ (request()->is('quotation')) ? 'nav-link-title-active' : '' }}">
                        Quotations
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/claims') }}">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-checklist">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path stroke="{{ (request()->is('claims')) ? '#E4509A' : '' }}"
                                d="M9.615 20h-2.615a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8" />
                            <path stroke="{{ (request()->is('claims')) ? '#E4509A' : '' }}" d="M14 19l2 2l4 -4" />
                            <path stroke="{{ (request()->is('claims')) ? '#E4509A' : '' }}" d="M9 8h4" />
                            <path stroke="{{ (request()->is('claims')) ? '#E4509A' : '' }}" d="M9 12h2" />
                        </svg>
                    </span>
                    <span class="nav-link-title {{ (request()->is('claims')) ? 'nav-link-title-active' : '' }}">
                        My Claims
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/report-page') }}">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-report-analytics">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path stroke="{{ (request()->is('report-page')) ? '#E4509A' : '' }}"
                                d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                            <path stroke="{{ (request()->is('report-page')) ? '#E4509A' : '' }}"
                                d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                            <path stroke="{{ (request()->is('report-page')) ? '#E4509A' : '' }}" d="M9 17v-5" />
                            <path stroke="{{ (request()->is('report-page')) ? '#E4509A' : '' }}" d="M12 17v-1" />
                            <path stroke="{{ (request()->is('report-page')) ? '#E4509A' : '' }}" d="M15 17v-3" />
                        </svg>
                    </span>
                    <span class="nav-link-title {{ (request()->is('report-page')) ? 'nav-link-title-active' : '' }}">
                        Reports
                    </span>
                </a>
            </li>
            <li class="nav-item mb-4">
                <a class="nav-link" href="{{ url('/partner-training') }}">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-book-2">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path stroke="{{ (request()->is('partner-training')) ? '#E4509A' : '' }}"
                                d="M19 4v16h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12z" />
                            <path stroke="{{ (request()->is('partner-training')) ? '#E4509A' : '' }}"
                                d="M19 16h-12a2 2 0 0 0 -2 2" />
                            <path stroke="{{ (request()->is('partner-training')) ? '#E4509A' : '' }}" d="M9 8h6" />
                        </svg>
                    </span>
                    <span class="nav-link-title {{ (request()->is('partner-training')) ? 'nav-link-title-active' : '' }}">
                        Training
                    </span>
                </a>
            </li>
        @endif
        @if(\Auth::user()->type === 'S')
        <li class="nav-item">
                <a class="nav-link" href="{{ url('/manual-form-monitoring') }}">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-notes">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path stroke="{{ (request()->is('manual-form-monitoring')) ? '#E4509A' : '' }}"
                                d="M5 3m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z" />
                            <path stroke="{{ (request()->is('manual-form-monitoring')) ? '#E4509A' : '' }}" d="M9 7l6 0" />
                            <path stroke="{{ (request()->is('manual-form-monitoring')) ? '#E4509A' : '' }}" d="M9 11l6 0" />
                            <path stroke="{{ (request()->is('manual-form-monitoring')) ? '#E4509A' : '' }}" d="M9 15l4 0" />
                        </svg>
                    </span>
                    <span class="nav-link-title {{ (request()->is('manual-form-monitoring')) ? 'nav-link-title-active' : '' }}">
                        Manual Forms Monitoring
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/manual-forms-sales') }}">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-notes">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path stroke="{{ (request()->is('manul-forms-sales')) ? '#E4509A' : '' }}"
                                d="M5 3m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z" />
                            <path stroke="{{ (request()->is('manul-forms-sales')) ? '#E4509A' : '' }}" d="M9 7l6 0" />
                            <path stroke="{{ (request()->is('manul-forms-sales')) ? '#E4509A' : '' }}" d="M9 11l6 0" />
                            <path stroke="{{ (request()->is('manul-forms-sales')) ? '#E4509A' : '' }}" d="M9 15l4 0" />
                        </svg>
                    </span>
                    <span class="nav-link-title {{ (request()->is('manual-forms-sales')) ? 'nav-link-title-active' : '' }}">
                        Manual Forms Sales
                    </span>
                </a>
            </li>
        @endif
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/settings') }}">
                <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-settings-2">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path stroke="{{ (request()->is('settings')) ? '#E4509A' : '' }}"
                            d="M19.875 6.27a2.225 2.225 0 0 1 1.125 1.948v7.284c0 .809 -.443 1.555 -1.158 1.948l-6.75 4.27a2.269 2.269 0 0 1 -2.184 0l-6.75 -4.27a2.225 2.225 0 0 1 -1.158 -1.948v-7.285c0 -.809 .443 -1.554 1.158 -1.947l6.75 -3.98a2.33 2.33 0 0 1 2.25 0l6.75 3.98h-.033z" />
                        <path stroke="{{ (request()->is('settings')) ? '#E4509A' : '' }}"
                            d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                    </svg>
                </span>
                <span class="nav-link-title {{ (request()->is('settings')) ? 'nav-link-title-active' : '' }}">
                    Settings
                </span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/help') }}">
                <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-help">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path stroke="{{ (request()->is('help')) ? '#E4509A' : '' }}"
                            d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                        <path stroke="{{ (request()->is('help')) ? '#E4509A' : '' }}" d="M12 17l0 .01" />
                        <path stroke="{{ (request()->is('help')) ? '#E4509A' : '' }}"
                            d="M12 13.5a1.5 1.5 0 0 1 1 -1.5a2.6 2.6 0 1 0 -3 -4" />
                    </svg>
                </span>
                <span class="nav-link-title {{ (request()->is('help')) ? 'nav-link-title-active' : '' }}">
                    Help
                </span>
            </a>
        </li>
    </ul>
</div>