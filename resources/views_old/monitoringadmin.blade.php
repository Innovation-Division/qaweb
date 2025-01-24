    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>

.fileUpload {
    position: relative;
    overflow: hidden;
    height: 46px;
    font-size: 20px;
}
.fileUpload input.uploadlogo {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
    width: 100%;
    height: 46px;
}
    </style>

      <div class="tab-pane" id="monitoring-v">

                <link href="{{ asset('datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
                <link href="{{ asset('datatable/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
                <script src="{{ asset('datatable/js/jquery.dataTables.min.js') }}"></script>
                <script src="{{ asset('datatable/js/dataTables.bootstrap.min.js') }}"></script>
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
                        var table = jQuery('#mypolicy2monitoring').DataTable( {
                            responsive: true,      
                            searching:false,
                             paging: false, 
                            dom: '<"pull-left col1"f><"pull-right col2"l>tip'
                                 
                        } );
                         jQuery(".dataTables_length select").addClass('selectb5').selectpicker({
                           'width': '93px',
                           'background-color' : 'white'
                         });

                        var table2 = jQuery('#mypolicyasagent2monitoring').DataTable( {
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
                    </style>
                @if(\Auth::user()->type != 'C')
                    <h2 style="text-align: left;">Manual Forms Issuance Uploading</h2> 
                    <br>    
                    <br>    
                    
            <!--            @if(session('message'))
                      <div class="col-md-12 col-md-offset-0" style="text-align: left;font-family: arial">
                          <div class="success-msg">
                            <i class="fa fa-check"></i>
                            {{session('message')}}
                          </div>
                      </div>
                @endif
        
            -->
                     <form id="upload-form2" method="post"  enctype="multipart/form-data">
   
                {{ csrf_field() }}
                  
                    <table style="width:100%" style="border:1px solid black;">
                      <tr>
                        <td style="width: 150px;"> <label for="Intermediary">Intermediary No</label></td>
                        <td style="width: 300px;">    
                           <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <select  id="intermediary" name="intermediary" class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg  btn-white-status_4thpage" data-size="10"  data-live-search="true" >
                                                <option value="">- Select -</option>
                                                @foreach($monitoring_agent as $intermediaryagent)
                                                <option value="{{ $intermediaryagent->id}}">{{ $intermediaryagent->code }} - {{ $intermediaryagent->email}}</option>

                                                @endforeach
                                        </select>

                                    </div>
                                </div>
                            </div>
                              <input type="hidden" name="intermediaryname" id='intermediaryname' class='intermediaryname' value="">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                            </div>
                        </div>
                    </td>
                        <td><input type="checkbox" id="vehicle3" name="addpads" value="true">
                    <label for="vehicle3">Request for Additional pads</label><br></td>
                      </tr>
                    </table>
                    <table style="width:100%">
                      <tr>
                        <td style="width: 150px;">Start Pad No.</td>
                                <td><div class="fileUpload btn btn-secondary-light">
                                    <span>Upload</span>
                                    <input id="file-upload" name='file' type="file" class="uploadlogo" accept=".csv" />
                            </div>
                            <span id="uploadimage" class="uploadimage"></span>
                              <input type="hidden" id='imgname' class='imgname' value='' name="imgname">
                        </td>
                       
                      </tr>
                    </table> <br>

                    <button class="btn btn-success" type="submit" id="uploadBtn">Submit </button>
                </form> 
                  
                        </select>
                            <div class="scroll">         
                                <table id="mypolicy2monitoring2" class="table table-striped table-bordered nowrap" style="width:100%;width: 80px !important;margin-top: 10px !important">
                                        <thead>
                                            <tr>
                                                <th>Intermediary</th>
                                                <th>Date Uploaded</th>
                                                <th>Record Count</th>
                                                <th>Uploaded by</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                          <td></td>
                                          <td></td>
                                        
                                        </tr>
                                        <!-- More rows here -->
                                      </tbody>
                                </table><br>
                            </div>
                        </span>
                    <br>
                    <hr>
                    <style type="text/css">
                       .pull-left{
                        float: left !important;
                        }
                    </style>
                @endif
                
            </div> 
