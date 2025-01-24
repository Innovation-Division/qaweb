
<div class="modal modal-blur fade" id="showTableDetails" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-full-width modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table id="showtable" class="table">
                    <thead>
                        <tr>
                            <th>Trans ID</th>
                            <th>Assured</th>
                            <th>Invoice Number</th>
                            <th>Policy Number</th>
                            <th>Policy Issue Date</th>
                            <th>Status</th>
                            <th>Date Uploaded</th>
                        </tr>
                    </thead>
                    <tbody id="details">
                    </tbody>
                </table>    
                <input type="hidden" name="ownerid" value='' id='ownerid' >
                <input type="hidden" name="intermediaryno" value='' id='intermediaryno' >
            </div>
            <div class="modal-footer">
                <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
  $(document).on('click', '.motorClaim', function() {


    
   var id = $(this).data('id');

   var id2 = $(this).data('id2');
   var intermediaryno=$('#intermediary_2').val();
   var ownerid =  $('#ownerid').val(id);
   var urlintermediary = '{{url('/')}}' + '/get-quote/manual-generate-list-table/'+id+'/intermediaryid/'+id2;
   $.ajax({

            type: 'GET',
            url:urlintermediary,
                error: function(data){
                                        var errors = data.responseJSON;
                                        jQuery.each(data, function(key, value){
                                          alert(value);
                                          });
                                      }, 

            success: function(data) {
                $("#showtable").dataTable().fnDestroy();
                var details = '';
                $.each(data, function(id, columns) {
                    var createddate = columns['created_at'] !== undefined ? columns['created_at'] : '';
                    var issuedate =columns['issuedate']=== '1970-01-01' ? '' : columns['issuedate'];
                    var invoice =  (columns['invoice_no'] !== undefined && columns['invoice_no'] !== null) ? columns['invoice_no'] : '';
                    var policynum = (columns['policy_id'] !== undefined && columns['policy_id'] !== null) ? columns['policy_id'] : '';
                    var status = (columns['status'] !== undefined && columns['status'] !== null) ? columns['status'] : '';
                    details += '<tr>\
                                    <td>' + 
                                        columns['adminpolicyno'] + '</td><td>' + 
                                        columns['assuredname'] + '</td><td>' + 
                                        invoice + '</td><td>' + 
                                        policynum + '</td><td>' + 
                                        issuedate + '</td><td>' + 
                                        status + '</td><td>' +  
                                        createddate + '</td>\
                                    </tr>';
                });
                $("#showTableDetails").modal('show');
                $('#details').html(details);

                    var table2 = jQuery('#showtable').DataTable({
                        responsive: true, 
                        dom: '<"pull-right col1"f><"pull-right col2"l>tip',
                        language: {
                        'paginate': {
                        'previous': '<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>',
                        'next': '<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-right"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>'
                        }
                    }
                    });
                    // jQuery(".dataTables_length select").addClass('selectb5').selectpicker({
                    //     'width': '93px',
                    //     'background-color': 'white'
                    // });
            }
        });
});
</script>
<script>
    $('#search-form').submit(function(event) {
    event.preventDefault();
    var searchstart = $('#start').val();
    var searchend = $('#end').val();
    var intermediaryNo = $('#intermediary').val();
    var status = $('#status').val();
     var _token = jQuery('input[name="_token"]').val(); //generated by csrf field

    $.ajax({
        url: "{{ route('generateFilter') }}",
        method: 'POST',
        data: { searchstart: searchstart,
                searchend: searchend,
                intermediaryNo: intermediaryNo,
                status:status,
                _token: _token },
        success: function(response) {
                $("#myTableMonitor").dataTable().fnDestroy();
                    $('#display_all_success tr:last').remove();
                    $('#myTableMonitor tbody').empty();
                    var rows = '';
                    $.each(response, function(index, data) {
                    
                        if( data.padtype =='PC'){
                            var pad_name_type = 'Private Car';
                        }else if(data.padtype =='CV'){
                            var pad_name_type = 'Commercial Vehicle';
                        }else if(data.padtype =='MCY'){
                            var pad_name_type = 'Motorcycle';
                        }else if(data.padtype =='ENDT'){
                            var pad_name_type = 'Endorsement';
                        }else{
                            var pad_name_type = 'CTPL';
                        }

                    rows += '<tr>';
                    rows += '<td>' + data.padrange + '</td>';
                    rows += '<td>' + pad_name_type + '</td>';
                    rows += '<td>' + data.intermediaryname + '</td>';
                    rows += '<td>' +  data.dateupload.split(' ')[0]  + '</td>';
                    rows += '<td>' +(data.used_doc !== null ? data.used_doc : '')+ '</td>';
                    rows += '<td><a href="#" data-toggle="modal" data-target="#showTableDetails" class="motorClaim" data-id='+data.intermediarycount+'  data-id2="' + data.intermediary + '" style="text-decoration: underline;color:#008080"> View</a></td>';

                    rows += '</tr>';


                    });
               
                    $('#myTableMonitor tbody').html(rows);
                    var table = jQuery('#myTableMonitor').DataTable({
            bFilter: false, bInfo: false,
            responsive: true,
            dom: '<"pull-left col1"f><"pull-right col2"l>tip',
            language: {
                
            'paginate': {
            'previous': '<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>',
            'next': '<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-right"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>'
            }
        }
        });
                // Clear existing rows in the table body


        }
    });
});
</script>
