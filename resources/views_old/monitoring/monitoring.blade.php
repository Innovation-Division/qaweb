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

    div.scroll {
        width: 100%;
        overflow: auto;
        white-space: nowrap;
    }

    #loading-screen {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 9999;
    }

    #loading-screen img {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .hidden {
        display: none;
    }

    .table-border {
        border: none !important;
    }

    tr,
    td,
    table {
        border: none !important;
    }

    .v-error-msg {
        color: #CF3C4B;
        font-size: 15px;
    }
</style>



<div class="tab-pane" id="monitoring-v">
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

        /* .dataTables_wrapper .dataTables_paginate .paginate_button:hover a,
            .dataTables_wrapper .dataTables_paginate .paginate_button:focus a {
                background-color: #008080 !important;
                color: #ffffff !important;
            }                         */
    </style>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            var table = jQuery('#mypolicy2monitoring').DataTable({
                responsive: true,
                searching: false,
                paging: false,
                dom: '<"pull-left col1"f><"pull-right col2"l>tip'

            });
            jQuery(".dataTables_length select").addClass('selectb5').selectpicker({
                'width': '93px',
                'background-color': 'white'
            });

            var table2 = jQuery('#mypolicyasagent2monitoring').DataTable({
                responsive: true,
                dom: '<"pull-left col1"f><"pull-right col2"l><"pull-paget">tip'
            });
            jQuery(".dataTables_length select").addClass('selectb5').selectpicker({
                'width': '93px',
                'background-color': 'white'
            });
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
    <style type="text/css">
        @media all and (min-width:0px) and (max-width: 800px) {
            .pull-left {
                float: left !important;
            }

            .pull-right {
                float: left !important;
                margin-top: 10px;
                margin-bottom: 10px;
            }

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
    <link href="{{ asset('datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('datatable/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('datatable/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{ asset('datatable/js/jquery-3.6.0.min.js')"></script>
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

        /* .dataTables_wrapper .dataTables_paginate .paginate_button:hover a,
            .dataTables_wrapper .dataTables_paginate .paginate_button:focus a {
                background-color: #008080 !important;
                color: #ffffff !important;
            }                         */
    </style>

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
            .pull-left {
                float: left !important;
            }

            .pull-right {
                float: left !important;
                margin-top: 10px;
                margin-bottom: 10px;
            }

            /*.pull-paget{float:left!important;}*/
            /*.pull-infot{float:left!important;}*/
        }
    </style>

    @if (\Auth::user()->type != 'C')
        <h2 style="text-align: left;">Manual Forms Issuance Uploading</h2>
        <br>
        <br>
        <form id="upload-form2" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="table-responsive" style="height: 600px !important;">
                <table class="table table-bordered" style="width: 100%; height: 50%;">
                    <colgroup>
                        <col style="width: 15%;">
                        <col style="width: 15%;">
                        <col style="width: 10%;">
                    </colgroup>

                    <tbody>
                        <tr style="height: 0px !important;">
                            <td>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-4 col-form-label">Intermediary No</label>
                                    <div class="col-sm-7">
                                        <div class="form-group" style="width:300px !important">
                                            <select id="intermediary" name="intermediary"
                                                class="form-control selectpicker address_mobile input-lg selectb5"
                                                data-style="input-lg btn-white-status_4thpage" data-size="10"
                                                data-live-search="true" style="height: 200px; overflow-y: scroll;">
                                                <option value="">- Select -</option>
                                            </select>

                                        </div>
                                        <input type="hidden" name="intermediaryname" id='intermediaryname'
                                            class='intermediaryname' value="">
                                        <input type="hidden" name="intermediarynum" id='intermediarynum'
                                            class='intermediarynum' value="">
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Status</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="stat" name="stat"
                                            readonly>
                                    </div>
                                </div>
                            </td>

                        </tr>
                        <tr style="height: 0px !important;">
                            <td width="270px">
                                <input type="checkbox" id="vehicle3" name="addpads" value="true"
                                    data-target="#checkModal">
                                <label for="vehicle3">Request for Additional pads</label>
                            </td>
                            <td>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Pad Type</label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <select id="padtype" name="padtype"
                                                class="form-control selectpicker address_mobile input-lg selectb5"
                                                data-style="input-lg btn-white-status_4thpage" data-size="10"
                                                data-live-search="true">
                                                <option value="">- Select -</option>
                                                @foreach ($cocogen_monitoring_pad_type as $monitoring_type)
                                                    <option value="{{ $monitoring_type->padacronym }}">
                                                        {{ $monitoring_type->padname }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr style="height: 0px !important;">
                            <td style="text-align:center" id='checkValue'>
                                <div class="fileUpload btn btn-secondary-light" style='width:110px !important'>
                                    <span>Upload</span>
                                    <input id="file-upload" name='file' type="file" class="uploadlogo"
                                        accept=".csv" />

                                </div>
                                <span style="display: inline-block;" id="uploadimage" class="uploadimage"></span>
                            </td>

            </div>

            <input type="hidden" id='imgname' class='imgname' value='' name="imgname">
            <input type="hidden" id='padrequest' class='padrequest' value='' name="padrequest">
            </td>

            </tr>
            </tbody>
            </table>
            <button class="btn btn-success" type="submit" id="uploadBtn" style="margin-left: 10px;">Submit
            </button>
            <div class="scroll">
                <table id="mypolicy2monitoring2" class="table table-striped table-bordered nowrap"
                    style="width:100% !important;margin-top: 10px !important">

                    <thead>
                        <tr>
                            <th>Pad Type</th>
                            <th>Pad Range</th>
                            <th>Intermediary</th>
                            <th>Date Uploaded</th>
                            <th>Record Remaining</th>
                            <th>Uploaded by</th>
                        </tr>
                    </thead>
                    <tbody id="ajaxresponse">

                    </tbody>
                </table>
            </div>
</div>

</form>

</span>
<br>
<hr>

<button type="button" class="btn" id="modalhide" data-toggle="modal" data-target="#modal-exist"
    style='widht:1px !important background-color:white !important'>
</button>

<div class="modal fade modal-exist" id="modal-exist" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="color:black;background-color:white">
                <p class="modal-title" id="modalLabel">Error</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalBody" style="color:black;background-color:white">
            </div>
            <div class="modal-footer" style="background-color:white">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<button type="button" class="btn" id="modalhide2" data-toggle="modal" data-target="#modal-check"
    style='widht:1px !important background-color:white !important'>
</button>

<div class="modal fade modal-check" id="modal-check" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="color:black;background-color:white">
                <h1 class="modal-title" id="modalLabel">
                    Request&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" id="modalBody" style="color:black;background-color:white">
                <form id="comment-form">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Add pads</label>
                        <textarea class="form-control reqaddpads" id="reqaddpads" rows="3"></textarea>
                    </div>
            </div>
            <div class="modal-footer" style="background-color:white">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Ok</button>
            </div>
            </form>
        </div>
    </div>
</div>
<style type="text/css">
    .pull-left {
        float: left !important;
    }
</style>
@endif

</div>
<div id="loading-screen" class="hidden">
    <img src="{{ URL::to('/') }}/images/monitoring/preloader.gif" alt="Loading...">
</div>


@include('monitoring.monitoring_js')
