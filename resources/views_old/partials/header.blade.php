<header class="d-flex flex-wrap align-items-center justify-content-center">
    <div class="container-fluid">
        <div class="navrow d-flex flex-wrap">
            <div class="bar d-flex w-lg-100">
                <a href="#" class="menu-burger align-items-center justify-content-center" data-dropdownref="nav-items-dropdown">
                    <img src="{{ asset('assets/img/bar.svg') }}" alt="menu" width="32" height="32" />
                    <svg xmlns="http://www.w3.org/2000/svg" class="menu-close" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </a>
                <div class="d-flex flex-grow-1 align-items-center justify-content-center justify-content-xl-start">
                    <a href="/" class="logo-container my-2 my-lg-0 text-decoration-none">
                        <img class="logo d-none d-sm-block" src="{{ asset('assets/img/logo.svg') }}" alt="cocogen logo" />
                        <img class="logo d-block d-sm-none" src="{{ asset('assets/img/logo498.png') }}" alt="cocogen logo" />
                    </a>
                </div>
                <ul class="nav-items mobile-nav-items m-0 ml-auto">
                    <li class="nav-item highlight highlight1">
                        <a id="claim" href="{{ url('/file-a-claim') }}" aria-expanded="false" class="label d-flex align-items-center justify-content-center">
                            <span>File a Claim</span>
                        </a>
                    </li>
                    <li class="nav-item highlight highlight2">
                        <a id="quote" href="{{ url('/get-quote') }}" aria-expanded="false" class="label d-flex align-items-center justify-content-center">
                            <span>Get a Quote</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="nav-items-dropdown-wrapper flex-grow-1">
                <div class="nav-item-back">
                    <a href="#" class="label">Back</a>
                </div>
                <ul id="nav-items-dropdown" class="nav nav-items nav-items-dropdown flex-wrap align-items-center justify-content-end my-md-0">

                    @foreach ($cocogen_admin_main as $cocogen_admin_mains)
                        @continue($cocogen_admin_mains->navLink == "get-quote")
                        @if ($cocogen_admin_mains->navLink)
                            <li class="nav-item">
                                <a href="{{ url($cocogen_admin_mains->navLink) }}">{{ $cocogen_admin_mains->navName }}</a>
                            </li>
                        @else

                            <li class="nav-item">
                                <div class="dropdown">
                                    <a id="{{ $cocogen_admin_mains->subLink }}" data-bs-toggle="dropdown" aria-expanded="false" class="label">{{ $cocogen_admin_mains->navName }}</a>
                                    <ul class="dropdown-menu subnav-items" aria-labelledby="{{ $cocogen_admin_mains->subLink }}">
                                        {{-- @if ($cocogen_admin_mains->subLink == 'products')
                                            @foreach ($cocogen_admin_productlink as $cocogen_admin_productlinks)
                                                <li class="subnav-item">
                                                    <a class="dropdown-item" href="{{ url($cocogen_admin_productlinks->link) }}">{{ $cocogen_admin_productlinks->product }}</a>
                                                </li>
                                            @endforeach
                                        @endif --}}
                                        @foreach ($cocogen_admin_submain as $cocogen_admin_submains)

                                            @if ($cocogen_admin_submains->navMainID == $cocogen_admin_mains->id)
                                                @continue($cocogen_admin_submains->navSubLink == "file-a-claim")
                                                <li class="subnav-item">
                                                    @if ($cocogen_admin_submains->navSubLink)
                                                        <a class="dropdown-item" href="{{ url($cocogen_admin_submains->navSubLink) }}">{{ $cocogen_admin_submains->navSubName }}</a>
                                                    @else
                                                        {{-- <span>{{ $cocogen_admin_submains->navSubName }}</span> --}}
                                                        <span class="dropdown-item">{{ $cocogen_admin_submains->navSubName }}</span>
                                                    @endif
                                                    <ul class="subnav-item-list">
                                                        @foreach ($cocogen_admin_subchild as $cocogen_admin_subchilds)
                                                            @if ($cocogen_admin_subchilds->navSubMainID == $cocogen_admin_submains->id)
                                                                <li><a data-id="{{ $cocogen_admin_subchilds->id }}" href="{{ url($cocogen_admin_subchilds->navChildLink) }}">{{ $cocogen_admin_subchilds->navChildName }}</a></li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                        @endif
                    @endforeach

                   <!--  <li class="nav-item">
                        <a id="contact" href="{{ url('/client-services') }}" class="label">Contact</a>
                    </li> -->

                    <li class="nav-item highlight highlight1 desktop-nav-item">
                        <a id="claim" href="{{ url('/file-a-claim') }}" class="label d-flex align-items-center justify-content-center">
                            <span>File a Claim</span>
                        </a>
                    </li>

                    <li class="nav-item highlight highlight2 desktop-nav-item">
                        <a id="quote" href="{{ url('/get-quote') }}" class="label d-flex align-items-center justify-content-center">
                            <span>Get a Quote</span>
                        </a>
                    </li>

                    <li class="nav-item search">
                        <div class="dropdown">
                            <a class="label">
                                <span class="d-xl-none d-lg-inline-block"> Search </span>
                                <svg id="search_icon" data-name="search icon" xmlns="http://www.w3.org/2000/svg" width="32.5" height="32.5" viewBox="0 0 32.5 32.5">
                                    <path id="Path_2" data-name="Path 2" d="M19.927,17.9h-1.07l-.379-.366a8.815,8.815,0,1,0-.948.948l.366.379v1.07l6.771,6.757,2.018-2.018Zm-8.125,0A6.094,6.094,0,1,1,17.9,11.8,6.086,6.086,0,0,1,11.8,17.9Z" transform="translate(1.063 1.063)" />
                                </svg>
                            </a>
                            <div class="dropdown-menu search-dropdown px-4 py-3" aria-labelledby="search">
                                <form class="d-flex align-items-center pb-2" action="{{ url('/customsearch') }}">
                                    <div class="flex-grow-1">
                                        <input type="search" name="srchterm" class="form-control" autocomplete="false" value="@isset($search){{ htmlentities($search) }}@endisset" placeholder="What are you looking for?" />
                                        </div>
                                        <button type="submit" class="btn btn-secondary buttonSearch">Go</button>
                                    </form>
                                </div>
                            </div>
                        </li>

                        @if (Auth::guest())
                            <li class="nav-item signin">
                                <a class="label" id="signIn" href="{{ url('/epolicy') }}">
                                    Sign In
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25.317" height="22.153" viewBox="0 0 25.317 22.153">
                                        <path id="Icon_open-account-login" data-name="Icon open-account-login" d="M9.494,0V3.165H22.153V18.988H9.494v3.165H25.317V0Zm3.165,6.329V9.494H0v3.165H12.659v3.165l6.329-4.747Z" />
                                    </svg>
                                </a>
                            </li>
                        @else
                            <li class="nav-item signin">
                                <div class="dropdown">
                                    <a href="#" id="signIn" data-bs-toggle="dropdown" aria-expanded="false" class="label">
                                        Sign Out
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25.317" height="22.153" viewBox="0 0 25.317 22.153">
                                            <path id="Icon_open-account-login" data-name="Icon open-account-login" d="M9.494,0V3.165H22.153V18.988H9.494v3.165H25.317V0Zm3.165,6.329V9.494H0v3.165H12.659v3.165l6.329-4.747Z" />
                                        </svg>
                                    </a>
                                    <ul class="dropdown-menu subnav-items" aria-labelledby="{{ $cocogen_admin_mains->subLink }}">
                                        <li class="subnav-item">
                                            <a class="dropdown-item" href="{{ url('/epolicy') }}">My Account</a>
                                        </li>
                                        <li class="subnav-item">
                                            <a class="dropdown-item" href="{{ url('/logout') }}">Sign Out</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @endif

                    </ul>
                    <ul class="list-inline list-links2 text-center mb-0 py-3">
                        <li class="list-inline-item"><a href="{{ url('/file-a-claim') }}" class="btn btn-primary">File a Claim</a></li>
                        <li class="list-inline-item"><a href="{{ url('/get-quote') }}" class="btn btn-secondary">Get a Quote</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
