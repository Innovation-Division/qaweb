@extends('layouts.epartner')
@section('main-content')
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
    table.dataTable thead .sorting::after {
        content: "";
    }
   
table.dataTable thead .sorting::after
{
  opacity: 0.2;
  content: "" !important;
  font-family: "fontAwesome";
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
    div.dataTables_wrapper div.dataTables_info {
        padding-top: 8px;
        white-space: nowrap;
        padding-left: 25px;
    }
    /* .dataTables_wrapper .dataTables_paginate .paginate_button:hover a,
                    .dataTables_wrapper .dataTables_paginate .paginate_button:focus a {
                        background-color: #008080 !important;
                        color: #ffffff !important;
                    }                         */
</style>
<script type="text/javascript">
    jQuery(document).ready(function () {

        
        $("#requestHardcopy").click(function(){
            alert('alert');
            jQuery('#myclient_form').submit();

        }); 


        var table = jQuery('#mypolicy').DataTable({
            responsive: true,
            dom: '<"pull-left col1"f><"pull-right col2"l>tip',
            language: {
            'paginate': {
            'previous': '<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>',
            'next': '<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-right"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>'
            }
        }
        });
        jQuery(".dataTables_length select").addClass('selectb5').selectpicker({
            'width': '93px',
            'background-color': 'white'
        });

        var table2 = jQuery('#mypolicyasagent').DataTable({
            responsive: true,
            dom: '<"pull-left col1"f><"pull-right col2"l>tip',
            language: {
            'paginate': {
            'previous': '<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>',
            'next': '<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-right"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>'
            }
        }
        });
        jQuery(".dataTables_length select").addClass('selectb5').selectpicker({
            'width': '93px',
            'background-color': 'white'
        });

        // $("#requestHardcopy").click(function () {
        //      alert('hey')
        // });

    });
</script>
<style type="text/css">
    @media all and (min-width:0px) and (max-width: 800px) {
        /* .pull-left{float:left!important;}
                    .pull-right{float:left!important;margin-top: 10px;margin-bottom: 10px;} */
        /*.pull-paget{float:left!important;}*/
        /*.pull-infot{float:left!important;}*/
    }
</style>
<div class="container">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-9">
                            <p class="title">Claims</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="padding-bottom: 0px !important;">
                    <div class="row">
                        <form method="POST" action="{{ url('/claims') }}" id="filterPolicy">
                            @csrf
                            {{method_field('GET')}}
                            <div class="row">
                                <div class="col-lg-12">
                                    <p style="font-size: 18px; font-weight: bold;">All claims</p>
                                </div>
                                <div class="col-lg-10">
                                    <input type="text" name="searchPolicy" placeholder="Search claim..."
                                        class="epolicy-search-input" value="{{$searchText}}">
                                </div>
                                <div class="col-lg-2 mb-3">
                                    <button class="epolicy-search" type="submit">Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <form method="POST" class="form-default" action="{{ url('/sendForHardCopyAgent') }}" id="myclient_form">
                        {{ csrf_field() }}
                        <table id= "mypolicy" class="table card-table table-vcenter text-nowrap ">
                                    <thead>
                                            <tr>
                                                <th>Policy Number</th>
                                                <th>Claim Number</th>
                                                <th>Assured </th>
                                                <th>Date Updated</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                            <tbody>
                                @if($datas)
                                    @if(empty($datas->TErrorMsg))
                                        @foreach($datas as $dataclaims)
                                                <tr>
                                                    <td>{{$dataclaims->policy_no}}</td>
                                                    <td>{{$dataclaims->claim_no}}</td>
                                                    <td>{{ substr($dataclaims->assured,0,50) }}<?php if(strlen($dataclaims->assured) > 49){ ?>... <?php } ?></td>
                                                    <td>{{date("Y/m/d", strtotime($dataclaims->claim_file_date))}}</td>
                                                    <td>{{$dataclaims->mini_note}}</td>
                                                </tr>
                                   
                                        @endforeach
                                 @endif
                                @endif
                            </tbody>
                        </table>
                    </form>

                    <br/>
                    <br/>
                </div>
            </div>
        </div>

    <br>
    <style type="text/css">
        .pull-left {
            float: left !important;
        }
        .page-item:last-child .page-link {
            border-top-right-radius: var(--tblr-pagination-border-radius);
            border-bottom-right-radius: var(--tblr-pagination-border-radius);
            color: #008080;
        }
        .active > .page-link, .page-link.active {
            z-index: 3;
            color: var(--tblr-pagination-active-color);
            background-color: #008080;
            color: #fff !important;
        }
        table.dataTable.no-footer {
  border-bottom: 0px solid rgba(0, 0, 0, 0.075);
}
.table {
  --tblr-table-color: inherit;
  --tblr-table-bg: transparent;
  --tblr-table-border-color: var(--tblr-border-color-translucent);
  --tblr-table-accent-bg: transparent;
  --tblr-table-striped-color: inherit;
  --tblr-table-striped-bg: var(--tblr-bg-surface-tertiary);
  --tblr-table-active-color: inherit;
  --tblr-table-active-bg: rgba(0, 0, 0, 0.1);
  --tblr-table-hover-color: inherit;
  --tblr-table-hover-bg: rgba(0, 0, 0, 0.075);
  color: var(--tblr-table-color);
}

.table thead th {
  color: var(--tblr-muted);
  background: var(--tblr-bg-surface-tertiary);
  font-size: .625rem;
  font-weight: var(--tblr-font-weight-bold);
  text-transform: uppercase;
  letter-spacing: .04em;
  line-height: 1rem;
  color: var(--tblr-muted);
  padding-top: .5rem;
  padding-bottom: .5rem;
  white-space: 
  nowrap;
}

table.dataTable thead th, table.dataTable thead td {
  padding: 10px 18px;
    padding-right: 18px;
  border-bottom: 1px solid rgba(0, 0, 0, 0.075);
}

.dataTables_wrapper .dataTables_paginate .paginate_button .active{
  padding: 0px;
  margin-left: 0px;
  display: inline;
  border: none !important;
  color:red;
}
a {
  color: #008080;
  text-decoration: none;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.disabled a {
  color: #008080;
}
table.dataTable thead .sorting_asc {
    background-image: url("https://localhost/cgen/cocogen2024/public/assets/img/epartner/chevron-down.svg");
    size:10px;
}
table.dataTable thead .sorting_desc {
    background-image: url("https://localhost/cgen/cocogen2024/public/assets/img/epartner/chevron-up.svg");

}
table.dataTable thead .sorting_asc::after,
table.dataTable thead .sorting_desc::after {
  content: "" !important;
  font-family: "";
}
.form-check-input:checked {
  background-color: #008080;
  border-color: var(--tblr-border-color-translucent);
}
    </style>

</div>  
<script>
    $(document).ready(function () {
        $('.btnSelectPolicy').click(function (e) {
            $('#selectPolicy').val("");
            if ($(this).attr("data-value") !== 'all') {
                $('#selectPolicy').val($(this).attr("data-value"));
            }
            $("#filterPolicy").submit();
        });
    });
</script>
@endsection