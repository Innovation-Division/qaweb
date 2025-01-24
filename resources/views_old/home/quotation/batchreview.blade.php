@extends('layouts.epartner')
@section('main-content')
@if(session('success'))
    <script>
         $(document).ready(function () {
                toastr.success('{{session("success")}}','Success');
            });
    </script>
@endif

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

    /* .dataTables_wrapper .dataTables_paginate .paginate_button:hover a,
                    .dataTables_wrapper .dataTables_paginate .paginate_button:focus a {
                        background-color: #008080 !important;
                        color: #ffffff !important;
                    }                         */
    .batch-container {
        padding: 100px;
        max-width: 1300px;
    }

    .batch-title {
        font-size: 25px;
        font-weight: 700;
    }

    .batch-button {
        border: none;
        padding: 10px 50px;
        border-radius: 5px;
        color: white;
    }

    .batch-success {
        background: #008080 !important;
        color: #ffffff;
    }

    .batch-button > svg {
        fill: #ffffff;
    }

    .batch-button>svg > path{
        stroke: #ffffff;
        stroke-width: 1px;
    }

    .batch-secondary {
        background: #60B3B3 !important;
        color: #ffffff;
    }

    .button-light {
        border: 1px solid black;
        padding: 5px 10px !important;
        font-size: 21px;
    }

    ul.timeline {
        list-style-type: none;
        position: relative;
    }

    ul.timeline:before {
        content: ' ';
        background: grey;
        display: inline-block;
        position: absolute;
        left: 29px;
        width: 2px;
        height: 100%;
        z-index: 400;
    }

    ul.timeline>li {
        margin: 20px 0;
        padding-left: 20px;
    }

    ul.timeline>li:before {
        content: ' ';
        background: #db3e8d;
        display: inline-block;
        position: absolute;
        border-radius: 50%;
        left: 20px;
        width: 20px;
        height: 20px;
        z-index: 400;
    }

    .upload_dropZone {
        color: #0f3c4b;
        background-color: var(--colorPrimaryPale, #ffffff);
        outline: 2px dashed var(--colorPrimaryHalf, #c1ddef);
        outline-offset: -12px;
        transition:
            outline-offset 0.2s ease-out,
            outline-color 0.3s ease-in-out,
            background-color 0.2s ease-out;
        border-radius: 10px;
        border: 3px dashed #f3f3f3;
    }

    .upload_dropZone.highlight {
        outline-offset: -4px;
        outline-color: var(--colorPrimaryNormal, #0576bd);
        background-color: var(--colorPrimaryEighth, #c8dadf);
    }

    .upload_svg {
        fill: var(--colorPrimaryNormal, #0576bd);
    }

    .btn-upload {
        background-color: var(--colorPrimaryNormal);
    }

    .btn-upload:hover,
    .btn-upload:focus {
        color: #fff;
        background-color: var(--colorPrimaryGlare);
    }

    .upload_img {
        width: calc(33.333% - (2rem / 3));
        object-fit: contain;
    }

    .edit-mode input {
        width: 100%;
        box-sizing: border-box;
    }
    table { 
            border-collapse: collapse; 
    } 
    tr { 
    } 
    td { 
        padding: 10px; 
    }  
    #policy_label{
        font-size: 14px;
    }
    .counter {
            position: absolute;
            right: 10px;
            bottom: 10px;
            font-size: 12px;
            color: #999;
        }
        .textarea-container {
            position: relative;
        }
        .delete-btn {
            background: none;
            border: none;
            color: #008080; /* Set the color to blue */
            cursor: pointer;
            padding: 0; /* Remove padding */
            margin: 0; /* Remove margin */
        }

        .delete-btn:hover {
            color: red; /* Change color to red on hover */
        }
        
        #updateAll, #editAll, #replaceALL {
            background: none;
            border: none;
            color: #008080; /* Set the color to blue */
            cursor: pointer;
            padding: 0; /* Remove padding */
            margin: 0; /* Remove margin */
        }

        
        .pagination-wrapper {
    margin-right: auto;
}

.pagination {
    margin: 0;
}

.policy-info {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 10px;
}

.policy-info > span {
    margin-right: 20px;
}

.action-button {
    margin-right: 10px;
    background: none;
    border: none;
    color: blue;
    cursor: pointer;
    padding: 0;
}

.action-button svg {
    vertical-align: middle;
    margin-right: 5px;
}

.action-button:hover {
    text-decoration: underline;
}

.table-responsive {
    margin-bottom: 20px;
}
.test {
    display: flex;
    flex-direction: column;
}
.edit-all-btn,
        .update-all-btn {
            margin-bottom: 10px;
            margin-right: 10px;
        }
        @media (max-width:800px) {
            .batch-button {
                width: 48%;
                padding: 10px 32px;

            }
        }
</style>
<link href="{{asset('dist/css/jquery.dataTables.min.css')}}" rel="stylesheet" />
<form  id='savebatchreview'   class='savebatchreview' method="POST" enctype="multipart/form-data">
@csrf
    <div class="container">
        <div class="row mb-4 mt-4">
            <div class="col-lg-12">
            <a href="{{ route('batchupload') }}"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                        class="bi bi-arrow-left-short" viewBox="0 0 18 18">
                        <path fill-rule="evenodd"
                            d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5" />
                    </svg> <strong style="color: #008080 !important;">Back to quotations</strong></a>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-9">
                        <p class="batch-title">Get a quote</p>
                    </div>
                    <!-- <div class="col-lg-3 flex">
                        <button class="batch-button batch-secondary">Save as draft</button>
                        <button class="batch-button btn-dark">Continue</button>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="mb-2">Batch no.</label>
                                        <input type="text" class="form-control"   value="{{ request()->query('batchId') }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                    <div class="">
                            <div class="policy-info">
                                <span>Policies ({{ $recordcount }})</span>
                                <span>
                                    <button id="replaceALL" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-reload">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M19.933 13.041a8 8 0 1 1 -9.925 -8.788c3.899 -1 7.935 1.007 9.425 4.747" />
                                            <path d="M20 4v5h-5" />
                                        </svg>
                                        Replace
                                    </button>
                                </span>
                                <span>
                                    <button id="editAll" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                            <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                            <path d="M16 5l3 3" />
                                        </svg>
                                        Edit
                                    </button>
                                    <button id="updateAll" style="display:none;" type="button">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-download"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><path d="M7 11l5 5l5 -5" /><path d="M12 4l0 12" /></svg>
                                        Save
                                    </button>
                                </span>
                                <div class="pagination-wrapper">
                                    <div class="pagination">
                                        {{ $motors->links() }} <!-- Use $motors for pagination links -->
                                    </div>
                                </div>
                            </div>
                        </div>
                     <form id="updateForm" method="POST" action="{{ route('BatchUploadingController.updateAll') }}">
                          @csrf
                          <div class='table-responsive'>
                           <table id="editableTable" border="1" class='table card-table table-vcenter text-nowrap datatable'>
                            <thead>
                                <tr>
                                    <th id='policy_label'>First Name</th>
                                    <th id='policy_label'>Middle Name</th>
                                    <th id='policy_label'>Last Name</th>
                                    <th id='policy_label'>Brand</th>
                                    <th id='policy_label'>MODEL NAME</th>
                                    <th id='policy_label'>CS/PLATE NO.</th>
                                    <th id='policy_label'>AOG</th>
                                    <th id='policy_label'>FMV</th>
                                    <th id='policy_label'>TOTAL AMT DUE</th>
                                    <th id='policy_label'>VTPL-BI</th>
                                    <th id='policy_label'>VTPL-PD</th>
                                    <th id='policy_label'>AUTO PA</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($motors as $motor)
                            <tr data-id="{{ $motor->id }}">
                                <td class="editmotor first_name">{{ $motor->first_name }}</td>
                                <td class="editmotor middle_name">{{ $motor->middle_name }}</td>
                                <td class="editmotor last_name">{{ $motor->last_name }}</td>
                                <td class="carCompany">{{ $motor->carCompany }}</td>
                                <td class="carVariant">{{ $motor->carVariant }}</td>
                                <td class="editmotor plateno">{{ $motor->plateNo }}</td>
                                <td class="aog">{{ $motor->aon }}</td>
                                <td class="fmv">{{ $motor->fmv }}       </td>
                                <td class="details">
                                    <span class="totalamtdue">{{ $motor->totalamount }}</span>
                                    <br>
                                    <span class="totalamtdue2">{{ $motor->totalamount }}</span>
                                </td>
                                <td class="vtplbi">{{ $motor->vtplbi }}</td>
                                <td class="vtplpd">{{ $motor->vtplpd }}</td>
                                <td class="autopa">{{ $motor->aupa }}</td>
                                <td class="delete">
                                <button type="button" class="delete-btn "> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M4 7l16 0" />
                                        <path d="M10 11l0 6" />
                                        <path d="M14 11l0 6" />
                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                        </svg></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    </form>
                </div>
                    </div>
                </div>
            </div>
        <div class="row mb-5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-lg-12 mb-3">
                            <strong style="font-size: 20px;">Add notes</strong>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group textarea-container">
                                    
                                    <input type="hidden" name="draft" id="draft"  value="0">
                                    <input type="hidden" class="form-control" name='batchId' value="{{ request()->query('batchId') }}" readonly>
                                        <label for="exampleInputEmail1" class="mb-2">Notes</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" name='notes' rows="5" cols="5" placeholder="Add an optional message"></textarea>
                                        <div class="counter">0 / 800</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <input type="hidden" name="hidURL" name="hidURL" value="{{url('/')}}">
        <div class="row">
            <div class="d-flex justify-content-between">
                <button class="batch-button batch-success" id="saveDraft" ><svg xmlns="http://www.w3.org/2000/svg" width="25" height="20" fill="currentColor" class="bi bi-floppy" viewBox="0 0 25 20">
                                <path d="M11 2H9v3h2z"></path>
                                <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z"></path>
                            </svg>Back to List</button>
                <button class="batch-button batch-success" id="continueBatch">Issue Batch<svg
                        xmlns="http://www.w3.org/2000/svg" width="30" height="16" fill="currentColor"
                        class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                    </svg> </button>
            </div>
        </div>
        </div>
    </div>
</form> 
<script>
$(document).ready(function() {
    // Edit all rows
    // $('#editAll').click(function() {
    //     $('#editableTable tbody tr').each(function() {
    //         $(this).find('.editmotor').each(function() {
    //             var text = $(this).text();
    //             $(this).html('<input type="text" class="form-control" name="example-text-input" placeholder="Input placeholder" value="' + text + '" />');
    //         });
    //     });
    // });

          // FOR NOTES COUNT 
          const maxLength = 800;
        $('#exampleFormControlTextarea1').on('input', function() {
            let currentLength = $(this).val().length;
            if (currentLength > maxLength) {
                $(this).val($(this).val().substring(0, maxLength));
                currentLength = maxLength;
            }
            $('.counter').text(`${currentLength} / ${maxLength}`);
        });
        

    $('#editAll').click(function() {
        $('#editableTable tbody tr').each(function() {
            var row = $(this);
            $('#updateAll').show();
            $('#editAll').hide();
            var totalamtdue = row.find('.totalamtdue').text();
            var totalamtdue2 = row.find('.totalamtdue2').text();
                row.find('.details').html(
                    '<input type="text" class="form-control totalamtdue"  name="totalamtdue" value="' + totalamtdue + '"><br>' +
                    '<input type="text" class="form-control totalamtdue2"  name="totalamtdue2" value="' + totalamtdue2 + '">'
                );
            $(this).find('.editmotor').each(function() {
            // Check if the cell is already in edit mode (has an input element)
            if (!$(this).find('input[type="text"]').length) {
                var text = $(this).text();
                $(this).html('<input type="text" class="form-control" name="example-text-input" placeholder="Input placeholder" value="' + text + '" />');
            }
            });
        });
        return;
    });


    // Update all rows
    $('#updateAll').click(function() {
        var updatedData = [];
        $('#editableTable tbody tr').each(function() {
            $('#updateAll').hide();
            $('#editAll').show();
            var row = $(this);
            var id = row.data('id');
            var rowData = {
                id: id,
                first_name: row.find('.first_name input').val(),
                middle_name: row.find('.middle_name input').val(),
                last_name: row.find('.last_name input').val(),
                plateno: row.find('.plateno input').val(),
                classification: row.find('.classification input').val()
            };
            updatedData.push(rowData);
        });
        $.ajax({
            url: "{{ route('BatchUploadingController.updateAll')}}",//$('#updateForm').attr('action'),
            type: 'POST',
            data: {
                "_token": $('input[name="_token"]').val(),
                "data": updatedData,
            },  
            success: function(response) {
            toastr.success('Data updated successfully','Success', {
                onHidden: function() {
                    location.reload();
                }
            });
                        
                //window.location.href = "{{ route('batchreview') }}?batchId=" + batchId;
            },
            // error: function(xhr) {
            //     alert('An error occurred while updating the data.');
            // }
        });
    });
    var $hidURL = "{{ url('/') }}"; // Set your base URL here
    $(document).on('click', '.delete-btn', function () {
        var row = $(this).closest('tr');
        var fileId = row.data('id');
        var confirmDelete = confirm('Are you sure you want to continue?');
        if (confirmDelete) {
        $.ajax({
            url: $hidURL + '/quotation/batch/delete/' + fileId, // Pass the file ID in the URL
            type: 'DELETE',
            data: {
                "_token": $('input[name="_token"]').val(),
            },
            success: function (response) {
                if (response.success) {
                    // Remove the row from the DOM
                    row.remove();
                } else {
                    alert('Failed to delete the file.');
                }
            },
            error: function () {
                alert('An error occurred while trying to delete the file.');
            }
        });
    } else {
        // If the user cancels, do nothing
        return;
    }
    });

    $('#continueBatch').click(function() {
    var updatedData = [];
    $('#editableTable tbody tr').each(function() {
        $('#updateAll').hide();
        $('#editAll').show();
        var row = $(this);
        var id = row.data('id');
        var rowData = {
            id: id,
            first_name: row.find('.first_name input').val(),
            middle_name: row.find('.middle_name input').val(),
            last_name: row.find('.last_name input').val(),
            plateno: row.find('.plateno input').val(),
            classification: row.find('.classification input').val()
        };
        updatedData.push(rowData);
    });
    $.ajax({
        url: $('#updateForm').attr('action'),
        type: 'GET',
        data: {
            "_token": $('input[name="_token"]').val(),
            "pushAction": "Y",
            "data": updatedData,
            "batchCode": "{{ request()->query('batchId')}}"
        },
        success: function(response) {
            $('.loading-spinner').hide();
            $('.outer-loading-page').hide();
            toastr.success('Data updated successfully','Success', {
                onHidden: function() {
                    window.location.href = "{{ route('quotationlist') }}";
                }
            });
        },
        error: function(xhr, status, error) {
           console.log(xhr);
            toastr.error('An error occurred while updating data.', 'Error');
        }
    });
});

});


</script>
<script>
    $(document).ready(function () {
        $('#saveDraft').click(function (e) {
            e.preventDefault();
            $('input[name=draft]').val(1);
            $('#savebatchreview').submit();
        });
        // to delete
        $('#continueBatch1').click(function (e) {
            // Prevent the default action of the button (e.g., form submission)
            e.preventDefault();
            // alert('continue batch end');
            // Trigger the form submission
            // $('#savebatchreview').submit();
            // var batchId = $('input[name="batchId"]').val();
            // Redirect to the batch review page with the batchId as a query parameter
            // window.location.href = "{{ route('batchreview') }}?batchId=" + batchId;

            var updatedData = [];
            $('#editableTable tbody tr').each(function() {
                $('#updateAll').hide();
                $('#editAll').show();
                var row = $(this);
                var id = row.data('id');
                var rowData = {
                    id: id,
                    carVariant: row.find('.carVariant input').val(),
                    plateno: row.find('.plateno input').val(),
                    classification: row.find('.classification input').val(),
                    aog: row.find('.aog input').val(),
                    fmv: row.find('.fmv input').val(),
                    sublineType: row.find('.details input.totalamtdue').val(),
                    sublineType2: row.find('.details input.totalamtdue2').val(),
                    vtplbi: row.find('.vtplbi input').val(),
                    vtplpd: row.find('.vtplpd input').val(),
                    autopa: row.find('.autopa input').val()
                };
                updatedData.push(rowData);
            });

        
            $('.loading-spinner').show();
            $('.outer-loading-page').show();
            $.ajax({
            url: $('#updateForm').attr('action'),
            type: 'POST',
            data: {
                "_token": $('input[name="_token"]').val(),
                "data": updatedData,
                "pushAction": "Y",
                "batchCode": "{{ request()->query('batchId')}}"
            },  error: function(data){
                                        var errors = data.responseJSON;
                                        jQuery.each(data, function(key, value){
                                          alert(value);
                                          });
                                      }, 

            success: function(response) {
                $('.loading-spinner').hide();
                $('.outer-loading-page').hide();
                window.location.href = "{{ url('/quotation') }}";
                toastr.success('Data updated successfully','Success');

            },
        });


        });

        $('#savebatchreview').submit(function (e) {
            e.preventDefault(); // Prevent form submission
            
            // Serialize form data
            var formData = new FormData($(this)[0]);
            var $hidURL = $('input[name=hidURL]').val();
            var _token = $('input[name="_token"]').val();

            // Append CSRF token to form data
            formData.append('_token', _token);

            $.ajax({
                url: $hidURL + '/quotation/save/notes',
                type: 'POST',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                    // Handle success response
                    console.log(response);
                    window.location.href = "{{ url('/quotation') }}";
                },
                error: function (xhr, textStatus, errorThrown) {
                    // Handle error
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>
<style>
    .icon {
  --tblr-icon-size: 1.25rem;
  font-size: var(--tblr-icon-size);
  stroke-width: 2;
  fill: #ffffff !important;
}

.table > thead {
  vertical-align: bottom;
  border-bottom: 1px solid;
}

.pagination-wrapper {
  margin-right: auto;
  text-align: right;
  left: 70%;
  position: relative;
}
</style>
@endsection