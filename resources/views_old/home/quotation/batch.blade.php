@extends('layouts.epartner')
@section('main-content')
    <!-- @if (session('error'))
    <script>
        $(document).ready(function() {
            toastr.error('{{ session('error') }}', 'Success');
        });
    </script>
    @endif -->
    <style>
        body {
            font-family: 'Inter' !important;
        }

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

        .batch-button>svg {
            fill: #ffffff;
        }

        .batch-button>svg>path {
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

        .card {
            border-radius: 10px !important;
        }

        body {
            background-color: #f3f3f3;
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

        .upload_dropZone {
            border: 2px dashed #ccc;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            margin-top: 20px;
        }

        .btn-upload {
            cursor: pointer;
        }

        #loadingBarContainer {
            display: none;
            width: 100%;
            margin-top: 10px;
            text-align: left;
            position: relative;
        }

        #loadingBar {
            height: 15px;
            background-color: #db3e8d;
            width: 0%;
            position: relative;
        }

        #loadingBarPercent {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: white;
        }

        #uploadedFileInfo {
            display: none;
            margin-top: 10px;
            text-align: left;
            position: relative;
            padding: 50px !important;
        }

        .file-info {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .file-name {
            font-weight: bold;
        }

        .file-details {
            display: flex;
            /* justify-content: space-between; */
            width: 100%;
            margin-top: 5px;
        }

        #fileList {
            position: relative;
        }

        #closeFileInfoButton {
            position: absolute;
            top: 0;
            right: 0;
        }

        @media (max-width:800px) {
            .batch-icon-close
            {
                left: 5px;
                color: red;
                position: absolute;
            }
        }

        #closeFileInfoButton {
            margin-right: 10px;
        }

        #replaceFileButton,
        #closeFileInfoButton,
        #removeFileButton {
            cursor: pointer;
            /* color: red; */
        }

        .replace-button {
            background: none;
            border: none;
            color: #008080;
            cursor: pointer;
            padding: 0;
            margin: 0;
        }

        .replace-button:hover {
            text-decoration: none;
        }

        .icon {
            /* --tblr-icon-size: 2rem; */
            font-size: var(--tblr-icon-size);
            stroke-width: 1.5;
            fill: #ffffff !important;
        }
        @media (max-width:800px) {
            .batch-button {
                width: 48%;
                padding: 10px 32px;

            }
        }
    </style>

    <div class="container">
        <div class="row mb-3 mt-1s">
            <div class="col-lg-12">
                <a href="/quotation"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
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
                        <p class="batch-title">Batch upload</p>
                    </div>
                </div>
            </div>
        </div>
        <form id='savebatch' class='savebatch' method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="mb-2">Batch no.</label>
                                            <input type="text" class="form-control" name='batchId'
                                                value='{{ $number }}' readonly>
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
                            <div class="col-lg-12 mb-3">
                                <strong style="font-size: 20px;">Upload Excel file</strong>
                            </div>
                            <div class="col-lg-12">
                                <ul class="timeline">
                                    <li>
                                        <p>Download the excel template
                                            <strong>
                                                <a href="{{ url('/') }}/docs/Batch%20Upload%20Template.xlsx"> <strong
                                                        style="color: #008080 !important;">here.</strong></a>
                                            </strong>
                                        </p>
                                        <p style="font-size: 13px; color: grey; padding-left: 10px;">Note: Max number of
                                            policy is 500.</p>
                                    </li>
                                    <li>
                                        <p>Fill the details of the form field in the respective columns.</p>
                                    </li>
                                    <li>
                                        <p>Upload the edited excel.</p>
                                    </li>
                                </ul>
                                <div id="uploadSection">
                                    <fieldset class="upload_dropZone">
                                        <legend class="visually-hidden">Excel uploader</legend>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                            fill="currentColor" class="bi bi-file-earmark" viewBox="0 0 16 16">
                                            <path
                                                d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z" />
                                        </svg>
                                        <p class="small my-2">
                                            <label>Drag &amp; drop excel file, or </label>
                                            <label class="btn-button-upload" for="upload_image_background">browse</label>
                                            <label for="">files </label>
                                        </p>
                                        <input id="upload_image_background" class="position-absolute invisible"
                                            name="file" type="file" accept=".xls,.xlsx" />
                                        <label style='font-size:10px'>Max file size 250MB. Only Excel files are
                                            allowed.</label>
                                        <div class="upload_gallery d-flex flex-wrap justify-content-center gap-3 mb-0">
                                        </div>
                                    </fieldset>
                                </div>
                                <div id="uploadedFileInfo"
                                    style="display:none; margin-top:10px; text-align:left; position:relative; padding:50px !important;">
                                    <div id="fileList"></div>
                                    <div id="loadingBarContainer">
                                        <div id="loadingBar">
                                            <span id="loadingBarPercent"></span>
                                        </div>
                                    </div>
                                </div>
                                <svg style="display:none">
                                    <defs>
                                        <symbol id="icon-imageUpload" clip-rule="evenodd" viewBox="0 0 96 96">
                                            <path
                                                d="M47 6a21 21 0 0 0-12.3 3.8c-2.7 2.1-4.4 5-4.7 7.1-5.8 1.2-10.3 5.6-10.3 10.6 0 6 5.8 11 13 11h12.6V22.7l-7.1 6.8c-.4.3-.9.5-1.4.5-1 0-2-.8-2-1.7 0-.4.3-.9.6-1.2l10.3-8.8c.3-.4.8-.6 1.3-.6.6 0 1 .2 1.4.6l10.2 8.8c.4.3.6.8.6 1.2 0 1-.9 1.7-2 1.7-.5 0-1-.2-1.3-.5l-7.2-6.8v15.6h14.4c6.1 0 11.2-4.1 11.2-9.4 0-5-4-8.8-9.5-9.4C63.8 11.8 56 5.8 47 6Zm-1.7 42.7V38.4h3.4v10.3c0 .8-.7 1.5-1.7 1.5s-1.7-.7-1.7-1.5Z M27 49c-4 0-7 2-7 6v29c0 3 3 6 6 6h42c3 0 6-3 6-6V55c0-4-3-6-7-6H28Zm41 3c1 0 3 1 3 3v19l-13-6a2 2 0 0 0-2 0L44 79l-10-5a2 2 0 0 0-2 0l-9 7V55c0-2 2-3 4-3h41Z M40 62c0 2-2 4-5 4s-5-2-5-4 2-4 5-4 5 2 5 4Z" />
                                        </symbol>
                                    </defs>
                                </svg>
                            </div>
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
                                            <label for="exampleInputEmail1" class="mb-2">Notes</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" name='notes' rows="5" cols="5"
                                                placeholder="Add an optional message"></textarea>
                                            <div class="counter">0 / 800</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <input type="hidden" name="hidURL" name="hidURL" value="{{ url('/') }}">
            <div class="row">
                <input type="hidden" name="draft" id='draft' value="0">
                <div class="d-flex justify-content-between">
                    <button class="batch-button batch-success" id="saveDraft"><svg xmlns="http://www.w3.org/2000/svg"
                            width="25" height="20" fill="currentColor" class="bi bi-floppy" viewBox="0 0 25 20">
                            <path d="M11 2H9v3h2z"></path>
                            <path
                                d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z">
                            </path>
                        </svg>Save as draft</button>
                    <button class="batch-button batch-success" id="continueBatch"><svg xmlns="http://www.w3.org/2000/svg"
                            width="30" height="16" fill="currentColor" class="bi bi-arrow-right"
                            viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                        </svg>Continue</button>
                </div>
            </div>
    </div>
    </form>
    <script>
        $(document).ready(function() {
            const maxLength = 800;
            $('#exampleFormControlTextarea1').on('input', function() {
                let currentLength = $(this).val().length;
                if (currentLength > maxLength) {
                    $(this).val($(this).val().substring(0, maxLength));
                    currentLength = maxLength;
                }
                $('.counter').text(`${currentLength} / ${maxLength}`);
            });

            $('#saveDraft').click(function(e) {
                e.preventDefault();
                $('#draft').val("1");
                $('#savebatch').submit();
            });

            $('#continueBatch').click(function(e) {
                e.preventDefault();
                $('#savebatch').submit();
            });

            $('#savebatch').submit(function(e) {
                e.preventDefault();

                var formData = new FormData($(this)[0]);
                var $hidURL = $('input[name=hidURL]').val();
                var _token = $('input[name="_token"]').val();
                formData.append('_token', _token);
                var baseUrl = "{{ route('batchreview') }}";
                var batchId = $('input[name="batchId"]').val();
                $.ajax({
                    url: $hidURL + '/quotation/batch/insert/save',
                    type: 'POST',
                    data: formData,
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.error) {
                            toastr.error('Invalid format or file error');
                        } else {
                            toastr.success('Successfully Save', 'Success');
                        }
                        if (response) {
                            toastr.success('Successfully saved ', 'Success');
                            window.location.href = baseUrl + "?batchId=" + batchId;
                        }
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        var response = JSON.parse(xhr.responseText);
                        var mainMessage = response.message;
                        var errors = response.errors;
                        var errorMessage = '';
                        for (var key in errors) {
                            if (errors.hasOwnProperty(key)) {
                                errorMessage += errors[key][0] + '\n';
                            }
                        }
                        toastr.error(errorMessage, 'Error');
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var maxFileSize = 250 * 1024 * 1024; // 250MB in bytes

            $('#upload_image_background').on('change', function(event) {
                handleFileUpload(event.target.files);
            });

            function handleFileUpload(files) {
                if (files.length > 0) {
                    var file = files[0];
                    if (!validateFile(file)) {
                        resetLoadingBar();
                        $('#uploadSection').show();
                        return;
                    }

                    $('#uploadSection').hide();
                    $('#uploadedFileInfo').show();
                    $('#loadingBarContainer').show();
                    $('#loadingBar').css('width', '0%');
                    $('#loadingBarPercent').text('0%');

                    simulateLoading(file);
                }
            }

            function validateFile(file) {
                var validTypes = ['application/vnd.ms-excel',
                    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                ];
                var validExtensions = ['.xls', '.xlsx'];

                var isValidType = validTypes.includes(file.type);
                var isValidExtension = validExtensions.some(ext => file.name.endsWith(ext));

                if (!isValidType && !isValidExtension) {
                    toastr.error('Excel files are allowed.', 'Error');
                    return false;
                }

                if (file.size > maxFileSize) {
                    toastr.error('File size exceeds 250MB.', 'Error');
                    return false;
                }

                return true;
            }

            function simulateLoading(file) {
                var progress = 0;
                var interval = setInterval(function() {
                    progress += 10;
                    $('#fileList').html(`
                    <div class="file-info">
                        <div class="file-name">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="currentColor" class="bi bi-file-earmark" viewBox="0 0 16 16">
                                            <path
                                                d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z" />
                                        </svg>
                            ${file.name}  
                            <button id="removeFileButton" class="replace-button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-reload">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M19.933 13.041a8 8 0 1 1 -9.925 -8.788c3.899 -1 7.935 1.007 9.425 4.747" />
                                    <path d="M20 4v5h-5" />
                                </svg>
                                Replace
                            </button>
                        </div>
                        <div class="file-details">
                            <div class="file-size">${(file.size / 1024 / 1024).toFixed(2)} MB</div>
                            <div id="closeFileInfoButton">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-x batch-icon-close">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M18 6l-12 12"/>
                                    <path d="M6 6l12 12"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                `);

                    if (progress >= 100) {
                        progress = 100;
                        clearInterval(interval);
                        resetLoadingBar(true);
                        toastr.success('File is valid.', 'Success');
                    }

                    $('#loadingBar').css('width', progress + '%');
                    $('#loadingBarPercent').text(progress + '%');
                }, 200);

                var reader = new FileReader();
                reader.readAsText(file);
            }

            function resetLoadingBar(success) {
                if (!success) {
                    $('#loadingBarContainer').hide();
                }
                $('#loadingBar').css('width', '0%');
                $('#loadingBarPercent').text('');
            }

            function resetUpload() {
                $('#upload_image_background').val('');
                $('#uploadedFileInfo').hide();
                $('#uploadSection').show();
                $('#fileList').html('');
                resetLoadingBar(false);
            }

            $(document).on('click', '#removeFileButton', function() {
                resetUpload();
            });

            $(document).on('click', '#closeFileInfoButton', function() {
                resetUpload();
            });

            // Drag and drop functionality
            var dropZone = $('.upload_dropZone');

            dropZone.on('dragover', function(event) {
                event.preventDefault();
                event.stopPropagation();
                dropZone.addClass('dragging');
            });

            dropZone.on('dragleave', function(event) {
                event.preventDefault();
                event.stopPropagation();
                dropZone.removeClass('dragging');
            });

            dropZone.on('drop', function(event) {
                event.preventDefault();
                event.stopPropagation();
                dropZone.removeClass('dragging');

                var files = event.originalEvent.dataTransfer.files;
                handleFileUpload(files);
            });
        });
    </script>




    <style>
        ul.timeline>li::before {
            content: ' ';
            background: #db3e8d;
            display: inline-block;
            position: absolute;
            border-radius: 50%;
            left: 20px;
            width: 15px;
            height: 15px;
            z-index: 400;
            margin-top: 4px;
        }

        ul.timeline>li>p {
            margin-left: 30px;
        }


        ul.timeline::before {
            content: ' ';
            background: grey;
            display: inline-block;
            position: absolute;
            left: 27px;
            width: 2px;
            height: 90%;
            z-index: 400;
            margin-top: 5px;
        }

        .upload_dropZone {
            color: #0f3c4b;
            background-color: var(--colorPrimaryPale, #ffffff);
            outline: 0px dashed var(--colorPrimaryHalf, #c1ddef);
            outline-offset: -12px;
            transition: outline-offset 0.2s ease-out, outline-color 0.3s ease-in-out, background-color 0.2s ease-out;
            border-radius: 10px;
            /* border: 3px dashed #f3f3f3; */
        }

        .btn-button-upload {
            font-size: 15px;
            color: #008080;
            font-weight: bold;
            margin-top: -5px;
            border-width: 0;
            cursor: pointer;
        }

        #loadingBar {
            height: 15px;
            background-color: #db3e8d;
            position: relative;
            border-radius: 20px;
        }
    </style>
 
@endsection
