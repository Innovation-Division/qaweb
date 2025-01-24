@extends('layouts.epartner')
@section('main-content')
    <style>
        #notification-area {
            position: fixed;
            top: 20px;
            /* Distance from the top */
            right: 20px;
            /* Distance from the right */
            z-index: 9999;
            /* Ensure it’s on top of other elements */
            max-width: 300px;
            /* Optional: limit the width */
        }
    </style>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Settings</h3>
        </div>
        <div id="notification-area"></div>
        <div class="card-body">
            <div class="row row-cards">
                <div class="col-md">
                    <div class="card">
                        <div class="card-status-top bg-teal"></div>
                        <div class="card-header">
                            <h3 class="card-title">Account Type</h3>
                        </div>
                        <div class="card-body p-0">

                            <div class="mb-3">
                                <label class="form-label"></label>
                                <div class="form-selectgroup">&nbsp;&nbsp;&nbsp;
                                    <label class="form-selectgroup-item">
                                        <input type="checkbox" id="accttype_ind" name="accttype" value="Individual"
                                            class="form-selectgroup-input"
                                            @if (\Auth::user()->accountType === 'Individual') echo checked="" @endif>
                                        <span class="form-selectgroup-label">Individual</span>
                                    </label>
                                    <label class="form-selectgroup-item">
                                        <input type="checkbox" id="accttype_grp" name="accttype" value="Group"
                                            class="form-selectgroup-input"
                                            @if (\Auth::user()->accountType === 'Group') echo checked="" @endif>
                                        <span class="form-selectgroup-label">Group</span>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <div class="card-status-top bg-teal"></div>
                        <div class="card-header">
                            <h3 class="card-title">Login Informartion</h3>
                        </div>
                        <form id="update-form" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <label class="col-4 col-form-label required">Email address</label>
                                    <div class="col">
                                        <input type="email" name="email" class="form-control"
                                            aria-describedby="emailHelp" placeholder="Enter email"
                                            value="{{ \Auth::user()->email }}" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-4 col-form-label required">Current Password</label>
                                    <div class="col">
                                        <input type="password" name="current_password" class="form-control"
                                            placeholder="Current Password" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-4 col-form-label required">New Password</label>
                                    <div class="col">
                                        <input type="password" name="new_password" class="form-control"
                                            placeholder="New Password" required>
                                        <small class="form-hint">
                                            Your password must be 8-20 characters long, contain letters and numbers, and
                                            must not contain spaces, special characters, or emoji.
                                        </small>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-4 col-form-label required">Confirm Password</label>
                                    <div class="col">
                                        <input type="password" name="new_password_confirmation" class="form-control"
                                            placeholder="Confirm New Password" required>
                                        <small class="form-hint">
                                            Your password must be 8-20 characters long, contain letters and numbers, and
                                            must not contain spaces, special characters, or emoji.
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-teal">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <div class="card-status-top bg-teal"></div>
                        <div class="card-header">
                            <h3 class="card-title">Agent Number</h3>
                        </div>
                        <div class="card-body">
                            <form id="agent-form" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="mb-3 row">
                                        <label class="col-3 col-form-label">Agent</label>
                                        <div class="col">
                                            <select id="agentCode" name="agentCode" value="" data-size="10"
                                                class="btn-group form-control agentCode dynamic2" data-live-search="true"
                                                style="font-family: muli" data-dependent="">
                                                @if (old('agentCode') == '' && $codeAgent == '')
                                                    <option value="" selected="selected" style="display:none;"
                                                        disabled="disabled" readonly>--Select Agent Number</option>
                                                @else
                                                    <option value="{{ !empty($codeAgent) ? $codeAgent : old('agentCode') }}"
                                                        selected hidden>
                                                        {{ !empty($codeAgent) ? $codeAgent : old('agentCode') }}
                                                    </option>
                                                @endif
                                                @foreach ($agentCode as $agentCodes)
                                                    <option value="{{ $agentCodes->code }}">{{ $agentCodes->code }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-footer text-end">
                                        <button type="button" id="submit-button" class="btn btn-teal">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .bg-teal {
            --tblr-bg-opacity: 1;
            background-color: #008080 !important;
        }

        .form-selectgroup-input:checked+.form-selectgroup-label {
            z-index: 1;
            color: #008080;
            background: rgba(var(--tblr-primary-rgb), .04);
            border-color: #008080;
        }

        .btn-teal {
            background-color: #008080;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('input[name="accttype"]').change(function() {
                var selectedValue = $(this).val();
                var _token = $('input[name="_token"]').val();
                if(selectedValue == "Individual"){
                    $('#accttype_ind').prop('checked', true);
                    $('#accttype_grp').prop('checked', false);
                }else{
                    $('#accttype_ind').prop('checked', false);
                    $('#accttype_grp').prop('checked', true);
                }
                $.ajax({
                    url: '{{ route('update.accountType') }}',
                    type: 'POST',
                    data: {
                        accountType: selectedValue,
                        _token: _token,
                    },
                    success: function(response) {
                        toastr.success(response.success , 'Success');
                    },

                    error: function(xhr) {
                        console.log('Error updating account type.');
                    }
                });
            });
        $('#update-form').on('submit', function(event) {
                event.preventDefault(); // Prevent default form submission

                $.ajax({
                    url: '{{ route('update.accountEmalPassword') }}', // Your route here
                    type: 'POST',
                    data: $(this).serialize(), // Serialize form data
                    success: function(response) {
                        toastr.success(response.message, 'Success');
                    },
                    error: function(xhr) {
                        console.log(xhr);
                        // Handle error response
                        let errors = xhr.responseJSON.errors;
                        let errorMessage = '';
                        if (errors) {
                            $.each(errors, function(key, value) {
                                toastr.error(value[0], 'Error');
                            });
                        } else {
                            var err = xhr.responseJSON.message;
                            toastr.error(err, 'Error');
                        }
                    }
                });
            });

            $('#submit-button').on('click', function(e) {
                e.preventDefault();
                $.ajax({
                    url: "{{ route('update.saveAgentCode') }}", // Ensure this route is correct
                    method: "POST",
                    data: $('#agent-form').serialize(),
                    success: function(response) {
                        toastr.success('Agent Code is updated!', 'Success');
                    },
                    error: function(xhr) {
                        var err = xhr.responseJSON.message;
                        toastr.error(err, 'Error');
                    }
                });
            });
        });
    </script>
@endsection
