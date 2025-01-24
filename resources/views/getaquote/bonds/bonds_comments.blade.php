
    @foreach($cocogen_bonds_remarks as $comments)
    <div >
    <p> {{ $comments->remarks }}</p>
    <br/>
    <p style="font-size:9px;"><b>{{ $comments->username }}</b></p>
    <p style="font-size:9px;">{{ date('M d, Y h:i A', strtotime($comments->created_at)) }}</p>
        @if (($comments->status == 'Save' || $comments->status == 'Submitted' || $comments->status == 'For Sales Review') && \Auth::user()->accountType == 'Sales')
        <button type="button" name="edit" id="{{ $comments->id }}" class="delete_comments btn btn-danger btn-sm"><span class="fa fa-trash-o" aria-hidden="true"></span></button>
    @endif
    <hr/>
    </div>
    @endforeach

