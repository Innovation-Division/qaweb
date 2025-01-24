


                    @foreach($bonds_financial_remarks as $remarks1)
                    <div >
                    <p> {{ $remarks1->remarks }}</p>
                    <p style="font-size:9px;">{{ $remarks1->username }} - {{ date('M d, Y h:i A', strtotime($remarks1->created_at)) }}</p>

                    @if (($remarks1->status == 'Save' || $remarks1->status == 'Submitted' || $remarks1->status == 'For Sales Review') &&  \Auth::user()->accountType == 'Sales')
                    <button type="button" name="edit" id="{{ $remarks1->id }}" class="delete_remarks btn btn-danger btn-sm"><span class="fa fa-trash-o" aria-hidden="true"></span></button>
                    @endif

                    <hr/>
                    </div>
                    @endforeach

