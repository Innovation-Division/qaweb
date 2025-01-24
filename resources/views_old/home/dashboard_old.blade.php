@extends('layouts.epartner')
@section('main-content')
<input type="hidden" id="hdn_title" name="hdn_title" value="{!! $premLabel !!}">
<input type="hidden" id="hdn_title6" name="hdn_title6" value="{!! $premLabel6 !!}">
<input type="hidden" id="hdn_title8" name="hdn_title8" value="{!! $premLabel8 !!}">
<input type="hidden" id="hdn_data" name="hdn_data" value="{{$premdata}}">
<input type="hidden" id="commLabel" name="commLabel" value="{{$commLabel}}">
<input type="hidden" id="linenamefinal" name="linenamefinal" value="{{$linenamefinal}}">
<style type="text/css">
  .title {
    font-size: 25px;
    font-weight: 700;
    margin: 0;
  }

  .epolicy-button {
    padding: 8px 15px;
    border-radius: 5px;
    border: none;
  }

  .epolicy-btn-secondary {
    background: grey;
    color: #ffffff;
  }

  #mypolicy_filter,
  #mypolicy_length {
    display: none;
  }

  .epolicy-search {
    padding: 10px 30px;
    border-radius: 10px;
    border: none;
    font-weight: 700;
    width: 100%;
  }

  .epolicy-search-input {
    width: 100%;
    box-sizing: border-box;
    border: 1px solid #EEEEEE;
    border-radius: 12px;
    font-size: 16px;
    background-color: white;
    background-position: 24px 11px;
    background-repeat: no-repeat;
    background-size: 18px;
    padding: 7px 20px 7px 55px;
    background-image: url(https://uxwing.com/wp-content/themes/uxwing/download/user-interface/search-icon.png);
  }

  .epolicy-nav {
    color: black !important;

  }

  .epolicy-nav li {
    margin: 10px 25px !important;
    font-weight: bold;
  }

  .epolicy-nav li a {
    color: grey !important;
  }

  .epolicy-nav li:first-child {
    color: black;
    margin: 10px 0px !important;
  }

  .epolicy-nav>li.active>a {
    font-weight: 700 !important;
    background: #E0F5F5 !important;
    color: black !important;
    border-radius: 18px;
    padding: 9px 55px;
  }

  .epolicy-col {
    border-top: 1px solid #d3d3d3;
  }

  .epolicy-nav>li a:hover {
    border-radius: 18px;
    color: black;
    background: none;
  }

  .epolicy-nav>li:current {
    color: black;
  }

  .epolicy-button-success {
    background: #008080 !important;
    color: white;
  }

  .epolicy-button-success:hover {
    background: #60B3B3 !important;
  }
</style>
<link href="{{ asset('datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('datatable/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<script src="{{ asset('datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('datatable/js/dataTables.bootstrap.min.js') }}"></script>
<style type="text/css">
  div.dataTables_wrapper div.dataTables_paginate ul.pagination {
    padding-right: 0px !important;
  }

  .dataTables_wrapper .dataTables_paginate .paginate_button {
    padding: 0px;
    margin-left: 0px;
    display: inline;
    border: none !important;
  }

  .dataTables_wrapper .dataTables_paginate .paginate_button a {
    color: #008080;
  }

  .dataTables_wrapper .dataTables_paginate .paginate_button.disabled a {
    color: #666;
  }

  .dataTables_wrapper .dataTables_paginate .paginate_button:hover,
  .dataTables_wrapper .dataTables_paginate .paginate_button:focus,
  .dataTables_wrapper .dataTables_paginate .paginate_button:active {
    border: none !important;
    background: none !important;
  }

  .adjustheight {
    height: 132px;
  }

  #SvgjsG1783 {
    fill: #ffffff !important;
    /* Change text color to white */
  }

  /* .dataTables_wrapper .dataTables_paginate .paginate_button:hover a,
                    .dataTables_wrapper .dataTables_paginate .paginate_button:focus a {
                        background-color: #008080 !important;
                        color: #ffffff !important;
                    }                         */
</style>
<script type="text/javascript">
  jQuery(document).ready(function () {
    var table = jQuery('#mypolicy').DataTable({
      responsive: true,
      dom: '<"pull-left col1"f><"pull-right col2"l>tip'

    });
    jQuery(".dataTables_length select").addClass('selectb5').selectpicker({
      'width': '93px',
      'background-color': 'white'
    });

    var table2 = jQuery('#mypolicyasagent').DataTable({
      responsive: true,
      dom: '<"pull-left col1"f><"pull-right col2"l><"pull-paget">tip'
    });
    jQuery(".dataTables_length select").addClass('selectb5').selectpicker({
      'width': '93px',
      'background-color': 'white'
    });

    jQuery("#requestHardcopy").click(function () {
      // jQuery('#myclient_form').submit();
    });
  });
</script>

<div class="container">
  <div class="row mb-4">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-9">
              <p class="title">Overview</p>
            </div>
            <div class="col-lg-3 text-end mt-2">
              Updated : {{date('h:i A, F j, Y',strtotime('+8 hours'))}}
              <!-- <button type="button" class="epolicy-button epolicy-button-success" data-toggle="modal" data-target="#exampleModal" >Generate</button> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="{{ asset('/asset/js/epartnerhub/dashboard.js') }}"></script>
  <div class="row row-deck row-cards">
    <div class="col-lg-4 col-lg-3">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="subheader">Policy count</div>
            <div class="ms-auto lh-1">
              <div class="dropdown">
                <a id="selectPol" class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">Last 1 Month</a>
                <div class="dropdown-menu dropdown-menu-end">
                  <a class="dropdown-item" href="#" onclick="showPol(this)">Last 1 Month</a>
                  <a class="dropdown-item" href="#" onclick="showPol(this)">Last 3 Months</a>
                  <a class="dropdown-item" href="#" onclick="showPol(this)">Last 1 Years</a>
                </div>
              </div>
            </div>
          </div>
          <div id="1monthPolCount" class="h1 mb-3">{{$policyCount7Days}}</div>
          <div id="3monthPolCount" class="h1 mb-3">{{$policyCount30Days}}</div>
          <div id="1yearPolCount" class="h1 mb-3">{{$policyCount3Months}}</div>
          <div class="d-flex mb-2">
            <div>{{$policyCount7DaysUnique}} People</div>
            <!-- <div class="ms-auto">
                        <span class="text-green d-inline-flex align-items-center lh-1">
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 17l6 -6l4 4l8 -8" /><path d="M14 7l7 0l0 7" /></svg>
                        </span>
                      </div> -->
          </div>
          <div class="progress progress-sm">
            <div class="progress-bar bg-primary" style="width: 100%" role="progressbar" aria-valuenow="100"
              aria-valuemin="0" aria-valuemax="100" aria-label="75% Complete">
              <span class="visually-hidden">75% Complete</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-lg-3">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="subheader">Premium amount</div>
            <div class="ms-auto lh-1">
              <div class="dropdown">
                <a id="selectPrem" class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">Last 1 Month</a>
                <div class="dropdown-menu dropdown-menu-end">
                  <a class="dropdown-item" href="#" onclick="showPremium(this)">Last 1 Month</a>
                  <a class="dropdown-item" href="#" onclick="showPremium(this)">Last 3 Months</a>
                  <a class="dropdown-item" href="#" onclick="showPremium(this)">Last 1 Years</a>
                </div>
              </div>
            </div>
          </div>
          <div class="d-flex align-items-baseline">
            <div id="1monthPremAmount" class="h1 mb-0 me-2">&#8369; {{$premium7Days}}</div>
            <div id="3monthPremAmount" class="h1 mb-0 me-2">&#8369; {{$premium30Days}}</div>
            <div id="1yrPremAmount" class="h1 mb-0 me-2">&#8369; {{$premium3Months}}</div>
          </div>
          <div id="1monthPremAmountAve" class="chart-xs" style="font-size:10px;margin-top:20px"> &#8369;
            {{$premium7DaysAve}} average amount per policy</div>
          <div id="3monthPremAmountAve" class="chart-xs" style="font-size:10px;margin-top:20px"> &#8369;
            {{$premium30DaysAve}}0 average amount per policy</div>
          <div id="1yrPremAmountAve" class="chart-xs" style="font-size:10px;margin-top:20px"> &#8369;
            {{$premium3MonthsAve}} average amount per policy</div>
        </div>

      </div>
    </div>
    <div class="col-lg-4 col-lg-3">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="subheader">Commission</div>
            <div class="ms-auto lh-1">
              <div class="dropdown">
                <a id="selectComm" class="dropdown-toggle " href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="false">Last 1 Month</a>
                <div class="dropdown-menu dropdown-menu-end">
                  <a class="dropdown-item" href="#" onclick="showComm(this)">Last 1 Month</a>
                  <a class="dropdown-item" href="#" onclick="showComm(this)">Last 3 Months</a>
                  <a class="dropdown-item" href="#" onclick="showComm(this)">Last 1 Years</a>
                </div>
              </div>
            </div>
          </div>

          <div class="d-flex align-items-baseline">
            <div id="1monthComm" class="h1 mb-0 me-2">&#8369; {{$comm7Days}}</div>
            <div id="3monthComm" class="h1 mb-0 me-2">&#8369; {{$comm30Days}}</div>
            <div id="1yrComm" class="h1 mb-0 me-2">&#8369; {{$comm3months}}</div>
            <!-- <div class="me-auto">
                        <span class="text-yellow d-inline-flex align-items-center lh-1">
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l14 0" /></svg>
                        </span>
                      </div> -->
          </div>
          <div id="chart-commission-bg" class="chart-sm"></div>
        </div>
      </div>
    </div>
    <!--chart-->
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <div class="subheader-donut">Monthly activity</div>
          <div id="chart-demo-pie"></div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Quick action</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6 mb-3">
              <a class="card card-link" href="{{url('/quotation/get-a-quote/first-page')}}">
                <div class="card-body d-flex flex-column justify-content-center align-items-center"
                  style="height: 132px;">
                  <div class="card-title mb-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="icon icon-tabler icons-tabler-outline icon-tabler-file-plus">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                      <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                      <path d="M12 11l0 6"></path>
                      <path d="M9 14l6 0"></path>
                    </svg>
                  </div>
                  <div class="text-muted">Get a quote</div>
                </div>
              </a>
            </div>

            <div class="col-md-6 mb-3">
              <a class="card card-link" href="{{url('/claims')}}">
                <div class="card-body d-flex flex-column justify-content-center align-items-center"
                  style="height: 132px;">
                  <div class="card-title mb-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="icon icon-tabler icons-tabler-outline icon-tabler-device-tablet-check">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M11.5 21h-5.5a1 1 0 0 1 -1 -1v-16a1 1 0 0 1 1 -1h12a1 1 0 0 1 1 1v9.5" />
                      <path d="M12.314 16.05a1 1 0 0 0 -1.042 1.635" />
                      <path d="M15 19l2 2l4 -4" /></svg>
                  </div>
                  <div class="text-muted">File a claim</div>
                </div>
              </a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <a class="card card-link" href="{{url('/quotation/batch/insert')}}">
                <div class="card-body d-flex flex-column justify-content-center align-items-center"
                  style="height: 132px;">
                  <div class="card-title mb-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-bar-up">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M12 4l0 10" />
                      <path d="M12 4l4 4" />
                      <path d="M12 4l-4 4" />
                      <path d="M4 20l16 0" /></svg>
                  </div>
                  <div class="text-muted">Batch Upload</div>
                </div>
              </a>
            </div>
            <div class="col-md-6 mb-3">
              <a class="card card-link" href="{{url('/report-page')}}">
                <div class="card-body d-flex flex-column justify-content-center align-items-center"
                  style="height: 132px;">
                  <div class="card-title mb-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="icon icon-tabler icons-tabler-outline icon-tabler-chart-bar">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M3 13a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                      <path d="M15 9a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v10a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                      <path d="M9 5a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                      <path d="M4 20h14" />
                    </svg>
                  </div>
                  <div class="text-muted">Generate report</div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs flex-row-reverse" data-bs-toggle="tabs">

            <li class="nav-item nav-option">
              <a href="#tabs-home-2" class="nav-link active" data-bs-toggle="tab">Annual</a>
            </li>
            <li class="nav-item nav-option">
              <a href="#tabs-profile-semester" class="nav-link" data-bs-toggle="tab">Semester</a>
            </li>
            <li class="nav-item nav-option">
              <a href="#tabs-profile-quarter" class="nav-link" data-bs-toggle="tab">Quarter</a>
            </li>


            <li class="nav-item">
              <a href="#" class="nav-link"><span class="badge bg-teal me-1"></span> Policy</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link"><span class="badge bg-pink me-1"></span>Quotation</a>
            </li>
            <li class="nav-item me-auto">
              <a href="#tabs-profile-2" class="nav-link">Lead Conversion rate</a>
            </li>




          </ul>

        </div>
        <div class="card-body ">
          <div class="tab-content">
            <div class="tab-pane active show" id="tabs-home-2">
              <h4>Annual</h4>
              <div>
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-body">
                      <div id="chart-combination"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="tabs-profile-semester">
              <h4>Semester</h4>
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <div id="chart-combination-semester"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="tabs-profile-quarter">
              <h4>Quarter</h4>
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <div id="chart-combination-quarter"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="tabs-settings-2">
              <h4>Settings tab</h4>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <script>
    var comms = '[' + '{{$commdata}}' + ']';
    comms = JSON.parse(comms);
    var commLabel = $('#commLabel').val();
    var commLabel = commLabel.replace("[", "").replace("]", "").split(',');
    document.addEventListener("DOMContentLoaded", function () {
      window.ApexCharts && (new ApexCharts(document.getElementById('chart-commission-bg'), {
        chart: {
          type: "area",
          fontFamily: 'inherit',
          height: 40.0,
          sparkline: {
            enabled: true
          },
          animations: {
            enabled: false
          },
        },
        dataLabels: {
          enabled: false,
        },
        fill: {
          opacity: .16,
          type: 'solid'
        },
        stroke: {
          width: 2,
          lineCap: "round",
          curve: "smooth",
        },
        series: [{
          name: "Commission",
          data: comms
        }],
        tooltip: {
          theme: 'dark'
        },
        grid: {
          strokeDashArray: 4,
        },
        xaxis: {
          labels: {
            padding: 0,
          },
          tooltip: {
            enabled: false
          },
          axisBorder: {
            show: false,
          },
          type: 'text',
        },
        yaxis: {
          labels: {
            padding: 4
          },
        },
        labels: commLabel,
        colors: [tabler.getColor("primary")],
        legend: {
          show: false,
        },
      })).render();
    });

    var premdata = '[' + '{{$premdata}}' + ']';
    var premdata6 = '[' + '{{$premdata6}}' + ']';
    var premdata8 = '[' + '{{$premdata8}}' + ']';
    var count3value = '[' + '{{$count3value}}' + ']';
    var count6value = '[' + '{{$count6value}}' + ']';
    var labelarraycount = '[' + '{{$labelarraycount}}' + ']';
    var premLabel = $('#hdn_title').val();
    var premLabel6 = $('#hdn_title6').val();
    var premLabel8 = $('#hdn_title8').val();
    var premLabel = premLabel.replace("[", "").replace("]", "").split(',');
    var premLabel6 = premLabel6.replace("[", "").replace("]", "").split(',');
    var premLabel8 = premLabel8.replace("[", "").replace("]", "").split(',');
    premdata = JSON.parse(premdata);
    premdata6 = JSON.parse(premdata6);
    premdata8 = JSON.parse(premdata8);
    labelarraycount = JSON.parse(labelarraycount);
    count3value = JSON.parse(count3value);
    count6value = JSON.parse(count6value);
    // premLabel = JSON.parse(remLabel);
    document.addEventListener("DOMContentLoaded", function () {
      window.ApexCharts && (new ApexCharts(document.getElementById('chart-combination'), {
        chart: {
          type: "bar",
          fontFamily: 'inherit',
          height: 497,
          parentHeightOffset: 0,
          toolbar: {
            show: false,
          },
          animations: {
            enabled: false
          },
        },
        plotOptions: {
          bar: {
            columnWidth: '50%',
          }
        },
        dataLabels: {
          enabled: false,
        },
        fill: {
          opacity: 1,
        },
        series: [{
          name: "Quotation",
          data: labelarraycount
        }, {
          name: "Policy",
          data: premdata
        }],
        tooltip: {
          theme: 'dark'
        },
        grid: {
          padding: {
            top: -20,
            right: 0,
            left: -4,
            bottom: -4
          },
          strokeDashArray: 4,
        },
        xaxis: {
          labels: {
            padding: 0,
          },
          tooltip: {
            enabled: false
          },
          axisBorder: {
            show: false,
          },
          categories: premLabel,
        },
        yaxis: {
          labels: {
            padding: 2
          },
        },
        colors: ['#E4509A', '#008080'],
        legend: {
          show: false,
        },
      })).render();
    });
    document.addEventListener("DOMContentLoaded", function () {
      window.ApexCharts && (new ApexCharts(document.getElementById('chart-combination-semester'), {
        chart: {
          type: "bar",
          fontFamily: 'inherit',
          height: 497,
          parentHeightOffset: 0,
          toolbar: {
            show: false,
          },
          animations: {
            enabled: false
          },
        },
        plotOptions: {
          bar: {
            columnWidth: '50%',
          }
        },
        dataLabels: {
          enabled: false,
        },
        fill: {
          opacity: 1,
        },
        series: [{
          name: "Quotation",
          data: count6value
        }, {
          name: "Policy",
          data: premdata6
        }],
        tooltip: {
          theme: 'dark'
        },
        grid: {
          padding: {
            top: -20,
            right: 0,
            left: -4,
            bottom: -4
          },
          strokeDashArray: 4,
        },
        xaxis: {
          labels: {
            padding: 0,
          },
          tooltip: {
            enabled: false
          },
          axisBorder: {
            show: false,
          },
          categories: premLabel6,
        },
        yaxis: {
          labels: {
            padding: 2
          },
        },
        colors: ['#E4509A', '#008080'],
        legend: {
          show: false,
        },
      })).render();
    });
    document.addEventListener("DOMContentLoaded", function () {
      window.ApexCharts && (new ApexCharts(document.getElementById('chart-combination-quarter'), {
        chart: {
          type: "bar",
          fontFamily: 'inherit',
          height: 497,
          parentHeightOffset: 0,
          toolbar: {
            show: false,
          },
          animations: {
            enabled: false
          },
        },
        plotOptions: {
          bar: {
            columnWidth: '50%',
          }
        },
        dataLabels: {
          enabled: false,
        },
        fill: {
          opacity: 1,
        },
        series: [{
          name: "Quotation",
          data: count3value
        }, {
          name: "Policy",
          data: premdata8
        }],
        tooltip: {
          theme: 'dark'
        },
        grid: {
          padding: {
            top: -20,
            right: 0,
            left: -4,
            bottom: -4
          },
          strokeDashArray: 4,
        },
        xaxis: {
          labels: {
            padding: 0,
          },
          tooltip: {
            enabled: false
          },
          axisBorder: {
            show: false,
          },
          categories: premLabel8,
        },
        yaxis: {
          labels: {
            padding: 2
          },
        },
        colors: ['#E4509A', '#008080'],
        legend: {
          show: false,
        },
      })).render();
    });

    // @formatter:on
  </script>
  <script>
    // @formatter:off


    var produclinepushcountfinal = '[' + '{{$produclinepushcountfinal}}' + ']';
    produclinepushcountfinal = JSON.parse(produclinepushcountfinal);
    var linenamefinal = $('#linenamefinal').val();
    var linenamefinal = linenamefinal.replace("[", "").replace("]", "").split(',');

    document.addEventListener("DOMContentLoaded", function () {
      window.ApexCharts && (new ApexCharts(document.getElementById('chart-demo-pie'), {
        chart: {
          type: "donut",
          fontFamily: 'inherit',
          height: 318,
          sparkline: {
            enabled: true
          },
          animations: {
            enabled: false
          },
        },
        fill: {
          opacity: 1,
        },
        series: produclinepushcountfinal,
        labels: linenamefinal,
        dataLabels: {
          enabled: true,
          formatter: function (val) {
            return val.toFixed(2) + "%";
          },
          dropShadow: {
            enabled: true,
            top: 1,
            left: 1,
            blur: 1,
            opacity: 0.45
          },
          style: {
            fontSize: '14px',
            colors: ["#ffffff"],
          },

          background: {
            enabled: false,
            foreColor: '#ffffff',
            colors: ["#ffffff !important"],
          },
        },
        tooltip: {
          theme: 'dark',
          palette: 'palette1',
        },
        grid: {
          strokeDashArray: 4,
        },
        colors: ['#008080', '#C74084', '#008080', '#309999', '#E4509A'],
        legend: {
          show: true,
          position: 'right',
          offsetY: 0,
          markers: {
            width: 10,
            height: 10,
            radius: 100,
          },
          itemMargin: {
            horizontal: 8,
            vertical: 8
          },
        },
        tooltip: {
          fillSeriesColor: false
        },
      })).render();
    });
    // @formatter:on
  </script>
  <script>
    $(document).ready(function () {
      $('.btnSelectPolicy').click(function (e) {

        $('#selectPolicy').val("");

        if ($(this).attr("data-value") !== 'all') {
          $('#selectPolicy').val($(this).attr("data-value"));
        }

        $("#filterPolicy").submit();
      });
      $('#drpdowndate').change(function () {
        if ($(this).val() === 'custom') {
          $('#custom-date-range').show();
        } else {
          $('#custom-date-range').hide();
        }
      });
    });
  </script>
  <style>
    .h1 {
      margin-top: 20px;
      font-size: 32px !important;
    }

    .apexcharts-text {
      fill: #000000 !important;
    }

    .apexcharts-pie-area:hover {
      transform: scale(1.009, 1.009);
      color: inherit;
    }

    apexcharts-pie-label {
      color: red;
    }

    .icon {
      --tblr-icon-size: 2rem;
      font-size: var(--tblr-icon-size);
      stroke-width: 1.5;
    }
  </style>

  <style>
    .nav-option {
      background: #F8F8F8;
    }

    .nav-option a.active {
      background: #E0F5F5;
    }

    .card-header-tabs .nav-link.active {
      background-color: #E0F5F5;
      border-bottom-color: #008080;
      color: #008080;
    }

    .bg-teal {
      background-color: #008080 !important;
    }

    .bg-pink {
      background-color: #e4509a !important;
    }

    .badge:empty {
      display: inline-block;
      width: 0.7rem;
      height: 0.7rem;
      min-width: 0;
      min-height: auto;
      padding: 0;
      border-radius: 100rem;
      vertical-align: baseline;
    }

    .subheader-donut {
      font-size: 1rem;
      font-weight: var(--tblr-font-weight-bold);
      text-transform: uppercase;
      letter-spacing: .04em;
      line-height: 1rem;
      color: #000000;
    }
  </style>
  @endsection