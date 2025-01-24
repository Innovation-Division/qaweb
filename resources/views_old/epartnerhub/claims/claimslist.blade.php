
<link href="{{ asset('datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
                <link href="{{ asset('datatable/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
                <script src="{{ asset('datatable/js/jquery.dataTables.min.js') }}"></script>
                <script src="{{ asset('datatable/js/dataTables.bootstrap.min.js') }}"></script>
                <script src="{{ asset('/js/bootstrap-select.min.js') }}"></script>
                <style type="text/css">
                    div.dataTables_wrapper div.dataTables_paginate ul.pagination {
                        padding-right: 0px !important;
                    }
                    .dataTables_wrapper .dataTables_paginate .paginate_button {
                        padding : 0px;
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
                    /* .dataTables_wrapper .dataTables_paginate .paginate_button:hover a,
                    .dataTables_wrapper .dataTables_paginate .paginate_button:focus a {
                        background-color: #008080 !important;
                        color: #ffffff !important;
                    }                         */
                </style>
                <script type="text/javascript">
                    jQuery(document).ready(function() {
                        var table = jQuery('#mypolicy2').DataTable( {
                            responsive: true,      
                            dom: '<"pull-left col1"f><"pull-right col2"l>tip',
                            "order": [[ 3, "desc" ]], //or asc 
                                 
                        } );
                         jQuery(".dataTables_length select").addClass('selectb5').selectpicker({
                           'width': '93px',
                           'background-color' : 'white'
                         });

                        var table2 = jQuery('#mypolicyasagent2').DataTable( {
                            responsive: true,          
                            dom: '<"pull-left col1"f><"pull-right col2"l><"pull-paget">tip'
                        } );
                         jQuery(".dataTables_length select").addClass('selectb5').selectpicker({
                           'width': '93px',
                           'background-color' : 'white'
                         });
                    } );
                </script>
                <style type="text/css">
                @media all and (min-width:0px) and (max-width: 800px) {
                    /* .pull-left{float:left!important;}
                    .pull-right{float:left!important;margin-top: 10px;margin-bottom: 10px;} */
                    /*.pull-paget{float:left!important;}*/
                    /*.pull-infot{float:left!important;}*/
                }
                </style>
                <style type="text/css">
                @media all and (min-width:0px) and (max-width: 800px) {
                    .pull-left{float:left!important;}
                    .pull-right{float:left!important;margin-top: 10px;margin-bottom: 10px;}
                    /*.pull-paget{float:left!important;}*/
                    /*.pull-infot{float:left!important;}*/
                }
                </style>
                <style>
                        div.scroll { 
                            width: 100%; 
                            overflow: auto; 
                            white-space: nowrap; 
                        } 

                        #mypolicyasagent2_filter, #mypolicy2_filter { 
                            margin-bottom: 20px !important;
                        }

                        #mypolicyasagent2_filter input[type=search], #mypolicy2_filter input[type=search] {
                            height: 42px !important;
                        }


                    </style>
                @if(\Auth::user()->type != 'C')
                    <h2 style="text-align: left;">Client’s claim status</h2> 
                    <br>
                    <br>    
                    <button id="FileaClaim" type="submit" class="btn btn-primary" style="float: left;">File a Claim</button> 
                    <br>    
                    <br>    
                    <br>    
                        <span style="font-family: muli;"> 
                        <form method="POST" >  
                        {{ csrf_field() }}  
                            <div class="scroll">         
                                <table id="mypolicy2" class="table table-striped table-bordered nowrap" style="width:100%;min-width: 100% !important;margin-top: 10px !important">
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
                                            @if($geniisysdata)
                                                @foreach($geniisysdata as $geniisysdatas)
                                                <tr>
                                                    <td>{{$geniisysdatas['policy_no']}}</td>
                                                    <td>{{$geniisysdatas['claim_no']}}</td>
                                                    <td>{{ substr($geniisysdatas['assured'],0,50) }}<?php if(strlen($geniisysdatas['assured']) > 49){ ?>... <?php } ?></td>
                                                    <td>{{date("Y/m/d", strtotime($geniisysdatas['claim_file_date']))}}</td>
                                                    <td>{{$geniisysdatas['mini_note']}}</td>
                                                </tr>
                                                @endforeach
                                            @endif
                                            @if($cocogen_epartnerhub_motor_claim_trans)
                                                @foreach($cocogen_epartnerhub_motor_claim_trans as $cocogen_epartnerhub_motor_claim_tran)
                                                <tr>
                                                    <?php $fullname =  $cocogen_epartnerhub_motor_claim_tran['first_name'] ." ". $cocogen_epartnerhub_motor_claim_tran['middle_name'] ." ". $cocogen_epartnerhub_motor_claim_tran['last_name'] ?>
                                                    <td><a href="#" data-toggle="modal" data-target="#claimsMotorModalView" class="motorClaim" data-id="{{$cocogen_epartnerhub_motor_claim_tran['id']}}" style="text-decoration: underline;color:#008080"> {{$cocogen_epartnerhub_motor_claim_tran['policy']}}</a></td>
                                                    <td>{{$cocogen_epartnerhub_motor_claim_tran['claim_no']}}</td>
                                                    <td>{{ substr($fullname,0,50) }}<?php if(strlen($fullname) > 49){ ?>... <?php } ?></td>
                                                    <td>{{date("Y/m/d", strtotime($cocogen_epartnerhub_motor_claim_tran['created_at']))}}</td>
                                                    <td>{{$cocogen_epartnerhub_motor_claim_tran['status']}}</td>
                                                </tr>
                                                @endforeach
                                            @endif
                                            @if($cocogen_epartnerhub_pa_claim_trans)
                                                @foreach($cocogen_epartnerhub_pa_claim_trans as $cocogen_epartnerhub_pa_claim_tran)
                                                <tr>
                                                    <?php $fullname =  $cocogen_epartnerhub_pa_claim_tran['fName'] ." ". $cocogen_epartnerhub_pa_claim_tran['mName'] ." ". $cocogen_epartnerhub_pa_claim_tran['lName'] ?>
                                                    <td><a href="#" data-toggle="modal" data-target="#claimsPAModalView" class="paClaim" data-id="{{$cocogen_epartnerhub_pa_claim_tran['id']}}" style="text-decoration: underline;color:#008080"> {{$cocogen_epartnerhub_pa_claim_tran['policy']}}</a></td>
                                                    <td>{{$cocogen_epartnerhub_pa_claim_tran['claim_no']}}</td>
                                                    <td>{{ substr($fullname,0,50) }}<?php if(strlen($fullname) > 49){ ?>... <?php } ?></td>
                                                    <td>{{date("Y/m/d", strtotime($cocogen_epartnerhub_pa_claim_tran['created_at']))}}</td>
                                                    <td>{{$cocogen_epartnerhub_pa_claim_tran['status']}}</td>
                                                </tr>
                                                @endforeach
                                            @endif
                                            @if($cocogen_epartnerhub_property_claim_trans)
                                                @foreach($cocogen_epartnerhub_property_claim_trans as $cocogen_epartnerhub_property_claim_tran)
                                                <tr>
                                                    <?php $fullname =  $cocogen_epartnerhub_property_claim_tran['first_name'] ." ". $cocogen_epartnerhub_property_claim_tran['middle_name'] ." ". $cocogen_epartnerhub_property_claim_tran['last_name'] ?>
                                                    <td><a href="#" data-toggle="modal" data-target="#claimsPropertyModalView" class="propertyClaim" data-id="{{$cocogen_epartnerhub_property_claim_tran['id']}}" style="text-decoration: underline;color:#008080"> {{$cocogen_epartnerhub_property_claim_tran['policy']}}</a></td>
                                                    <td>{{$cocogen_epartnerhub_property_claim_tran['claim_no']}}</td>
                                                    <td>{{ substr($fullname,0,50) }}<?php if(strlen($fullname) > 49){ ?>... <?php } ?></td>
                                                    <td>{{date("Y/m/d", strtotime($cocogen_epartnerhub_property_claim_tran['created_at']))}}</td>
                                                    <td>{{$cocogen_epartnerhub_property_claim_tran['status']}}</td>
                                                </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                </table><br>
                            </div>
                        </form>
                        </span>
                    <br>
                    <hr>
                    <style type="text/css">
                       .pull-left{
                        float: left !important;
                        }

                      
                    </style>
                @endif
                @if(\Auth::user()->type != 'A')
                 <h2 style="text-align: left;" class="mb-4">My Claim Status</h2>
                    <span style="font-family: muli;"> 
                    <form method="POST" action="{{ url('/sendForHardCopyClient') }}">  
                    {{ csrf_field() }}  

                     <div class="scroll">         
                        <table id="mypolicyasagent2" class="table table-striped table-bordered nowrap" style="width:100%;">
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
                                    @if($geniisysdataclient)
                                            @foreach($geniisysdataclient as $geniisysdataclientss)
                                            
                                            <tr>
                                                  <td>{{$geniisysdataclientss['policy_no']}}</td>
                                                    <td>{{$geniisysdataclientss['claim_no']}}</td>
                                                    <td>{{ substr($geniisysdataclientss['assured'],0,50) }}<?php if(strlen($geniisysdataclientss['assured']) > 49){ ?>... <?php } ?></td>
                                                    <td>{{date("Y/m/d", strtotime($geniisysdataclientss['claim_file_date']))}}</td>
                                                    <td>{{$geniisysdataclientss['mini_note']}}</td>
                                            </tr>
                                            @endforeach
                                    @endif
                                </tbody>
                               
                        </table>  
                       </div>
                    </form>
                    </span>
                @endif

                @include('epartnerhub.claims.motor.motor_modal')
                @include('epartnerhub.claims.pa.pa_modal')
                @include('epartnerhub.claims.property.property_model')



  
            