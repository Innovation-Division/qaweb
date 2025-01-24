<!DOCTYPE html>
<html>
  <head>
    <title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="build.css">
  </head>
  <body>

  	<p style="text-align: center;"><span style="width: 100%; font-size: 11pt"><strong>MARINE QUOTATION</strong></span></p>
  	<br/>
  	
	<p><span style="width: 100%; font-size: 9pt"><strong>GET QUOTE</strong></span></p>

	@foreach($cocogen_marine_quote as $cocogen_marine)
	<table class="table table-sm table-bordered table-condensed" style="width: 100%; font-size: 8pt">

	<tbody>

	<tr>
	<td colspan="2" valign="top" style="width: 20%; text-align: right;"><span ><b>Subline :</b></span></td>
	<td colspan="8" style="margin-left: 15px">{{ $cocogen_marine->subline }}</td>
	</tr>

	<tr>
	<td colspan="2" valign="top" style="width: 20%; text-align: right;"><span ><b>Inception :</b></span></td>
	<td colspan="3" style="margin-left: 15px">{{ $cocogen_marine->incept_date }}</td>
	<td colspan="2" valign="top" style="width: 20%; text-align: right;"><span ><b>Expiry :</b></span></td>
	<td colspan="3" style="margin-left: 15px">{{ $cocogen_marine->expiry_date }}</td>	
	</tr>

	<tr>
	<td colspan="2" valign="top" style="width: 20%; text-align: right;"><span ><b>No. of Days :</b></span></td>
	<td colspan="3" style="margin-left: 15px">{{ number_format($cocogen_marine->no_days,2) }}</td>
	<td colspan="2" valign="top" style="width: 20%; text-align: right;"><span ><b>Rate :</b></span></td>
	<td colspan="3" style="margin-left: 15px">{{ $cocogen_marine->rate }}</td>	
	</tr>

	<tr>
	<td colspan="2" valign="top" style="width: 20%; text-align: right;"><span ><b>Sum Insured :</b></span></td>
	<td colspan="3" style="margin-left: 15px">{{ number_format($cocogen_marine->sum_insured,2) }}</td>
	<td colspan="2" valign="top" style="width: 20%; text-align: right;"><span ><b>Basic Premium :</b></span></td>
	<td colspan="3" style="margin-left: 15px">{{ number_format($cocogen_marine->basic_premium,2) }}</td>	
	</tr>
	<tr>
	<td colspan="2" valign="top" style="width: 20%; text-align: right;"><span ><b>Doc. Stamps :</b></span></td>
	<td colspan="3" style="margin-left: 15px">{{ number_format($cocogen_marine->doc_stamps,2) }}</td>
	<td colspan="2" valign="top" style="width: 20%; text-align: right;"><span ><b>VAT :</b></span></td>
	<td colspan="3" style="margin-left: 15px">{{ number_format($cocogen_marine->vat,2) }}</td>	
	</tr>
	<tr>
	<td colspan="2" valign="top" style="width: 20%; text-align: right;"><span ><b>LGT :</b></span></td>
	<td colspan="3" style="margin-left: 15px">{{ number_format($cocogen_marine->lgt,2) }}</td>
	<td colspan="2" valign="top" style="width: 20%; text-align: right;"><span ><b>GROSS PREMIUM :</b></span></td>
	<td colspan="3" style="margin-left: 15px">{{ number_format($cocogen_marine->gross_premium,2) }}</td>	
	</tr>		


	</tbody>
	</table>
	<br/>

	<p><span style="width: 100%; font-size: 9pt"><strong>INFORMATION</strong></span></p>

	@if($cocogen_marine->template == 'MTR-C' || $cocogen_marine->template == 'MCI-C')
	<table class="table table-sm table-bordered table-condensed" style="width: 100%; font-size: 8pt">

	<tbody>

	<tr>
	<td colspan="2" valign="top" style="width: 20%; text-align: right;"><span ><b>Name of Agent :</b></span></td>
	<td colspan="8" style="margin-left: 15px">{{ $cocogen_marine->agent }}</td>
	</tr>

	<tr>
	<td colspan="2" valign="top" style="width: 20%; text-align: right;"><span ><b>Name of Company :</b></span></td>
	<td colspan="8" style="margin-left: 15px">{{ $cocogen_marine->assured }}</td>
	</tr>

	<tr>
	<td colspan="2" valign="top" style="width: 20%; text-align: right;"><span ><b>Date of Incorporation :</b></span></td>
	<td colspan="8" style="margin-left: 15px">{{ $cocogen_marine->assured }}</td>
	</tr>

	<tr>
	<td colspan="2" valign="top" style="width: 20%; text-align: right;"><span ><b>Address :</b></span></td>
	<td colspan="8" style="margin-left: 15px">{{ $cocogen_marine->address }}</td>
	</tr>

	<tr>
	<td colspan="2" valign="top" style="width: 20%; text-align: right;"><span ><b>Email Address :</b></span></td>
	<td colspan="8" style="margin-left: 15px">{{ $cocogen_marine->email }}</td>
	</tr>

	<tr>
	<td colspan="2" valign="top" style="width: 20%; text-align: right;"><span ><b>Contact Person :</b></span></td>
	<td colspan="8" style="margin-left: 15px">{{ $cocogen_marine->employer }}</td>
	</tr>

	<tr>
	<td colspan="2" valign="top" style="width: 20%; text-align: right;"><span ><b>Contact No. :</b></span></td>
	<td colspan="8" style="margin-left: 15px">{{ $cocogen_marine->contact_no }}</td>
	</tr>

	<tr>
	<td colspan="2" valign="top" style="width: 20%; text-align: right;"><span ><b>Office Address :</b></span></td>
	<td colspan="8" style="margin-left: 15px">{{ $cocogen_marine->office_address }}</td>
	</tr>

	<tr>
	<td colspan="2" valign="top" style="width: 20%; text-align: right;"><span ><b>TIN :</b></span></td>
	<td colspan="8" style="margin-left: 15px">{{ $cocogen_marine->tin }}</td>
	</tr>

	<tr>
	<td colspan="2" valign="top" style="width: 20%; text-align: right;"><span ><b>Main Product :</b></span></td>
	<td colspan="8" style="margin-left: 15px">{{ $cocogen_marine->occupation}}</td>
	</tr>

	<tr>
	<td colspan="2" valign="top" style="width: 20%; text-align: right;"><span ><b>Other ID NO. :</b></span></td>
	<td colspan="8" style="margin-left: 15px">{{ $cocogen_marine->assured }}</td>
	</tr>
									
	</tbody>
	</table>
	<br/>
	@endif

	@if($cocogen_marine->template == 'MTR-I' || $cocogen_marine->template == 'MCI-I')
	<table class="table table-sm table-bordered table-condensed" style="width: 100%; font-size: 8pt">

	<tbody>

	<tr>
	<td colspan="2" valign="top" style="width: 20%; text-align: right;"><span ><b>Name of Agent :</b></span></td>
	<td colspan="8" style="margin-left: 15px">{{ $cocogen_marine->agent }}</td>
	</tr>

	<tr>
	<td colspan="2" valign="top" style="width: 20%; text-align: right;"><span ><b>Name of Assured :</b></span></td>
	<td colspan="8" style="margin-left: 15px">{{ $cocogen_marine->assured }}</td>
	</tr>

	<tr>
	<td colspan="2" valign="top" style="width: 20%; text-align: right;"><span ><b>Date of Birth :</b></span></td>
	<td colspan="8" style="margin-left: 15px">{{ $cocogen_marine->assured }}</td>
	</tr>

	<tr>
	<td colspan="2" valign="top" style="width: 20%; text-align: right;"><span ><b>Address :</b></span></td>
	<td colspan="8" style="margin-left: 15px">{{ $cocogen_marine->address }}</td>
	</tr>

	<tr>
	<td colspan="2" valign="top" style="width: 20%; text-align: right;"><span ><b>Email Address :</b></span></td>
	<td colspan="8" style="margin-left: 15px">{{ $cocogen_marine->email }}</td>
	</tr>

	<tr>
	<td colspan="2" valign="top" style="width: 20%; text-align: right;"><span ><b>Employer :</b></span></td>
	<td colspan="8" style="margin-left: 15px">{{ $cocogen_marine->employer }}</td>
	</tr>

	<tr>
	<td colspan="2" valign="top" style="width: 20%; text-align: right;"><span ><b>Contact No. :</b></span></td>
	<td colspan="8" style="margin-left: 15px">{{ $cocogen_marine->contact_no }}</td>
	</tr>

	<tr>
	<td colspan="2" valign="top" style="width: 20%; text-align: right;"><span ><b>Office Address :</b></span></td>
	<td colspan="8" style="margin-left: 15px">{{ $cocogen_marine->office_address }}</td>
	</tr>

	<tr>
	<td colspan="2" valign="top" style="width: 20%; text-align: right;"><span ><b>TIN :</b></span></td>
	<td colspan="8" style="margin-left: 15px">{{ $cocogen_marine->tin }}</td>
	</tr>

	<tr>
	<td colspan="2" valign="top" style="width: 20%; text-align: right;"><span ><b>Occupation :</b></span></td>
	<td colspan="8" style="margin-left: 15px">{{ $cocogen_marine->occupation}}</td>
	</tr>

	<tr>
	<td colspan="2" valign="top" style="width: 20%; text-align: right;"><span ><b>Other ID NO. :</b></span></td>
	<td colspan="8" style="margin-left: 15px">{{ $cocogen_marine->assured }}</td>
	</tr>
									
	</tbody>
	</table>
	<br/>
	@endif

	<p><span style="width: 100%; font-size: 9pt"><strong>DETAILS</strong></span></p>

	<table class="table table-sm table-bordered table-condensed" style="width: 100%; font-size: 8pt">

	<tbody>

	<tr>
	<td colspan="2" valign="top" style="width: 20%; text-align: right;"><span ><b>Interested Insured :</b></span></td>
	<td colspan="8" style="margin-left: 15px">{{ $cocogen_marine->interested_insured }}</td>
	</tr>

	<tr>
	<td colspan="2" valign="top" style="width: 20%; text-align: right;"><span ><b>Sum Insured :</b></span></td>
	<td colspan="8" style="margin-left: 15px">{{ $cocogen_marine->aggregate_limit }}</td>
	</tr>

	<tr>
	<td colspan="2" valign="top" style="width: 20%; text-align: right;"><span ><b>Location of Warehouse :</b></span></td>
	<td colspan="8" style="margin-left: 15px">{{ $cocogen_marine->warehouse }}</td>
	</tr>

	<tr>
	<td colspan="2" valign="top" style="width: 20%; text-align: right;"><span ><b>No. of Days :</b></span></td>
	<td colspan="8" style="margin-left: 15px">{{ $cocogen_marine->frequency }}</td>
	</tr>

	<tr>
	<td colspan="2" valign="top" style="width: 20%; text-align: right;"><span ><b>Previous Insurer :</b></span></td>
	<td colspan="8" style="margin-left: 15px">{{ $cocogen_marine->prev_insurer }}</td>
	</tr>

	@if($cocogen_marine->template == 'MTR-C' || $cocogen_marine->template == 'MTR-I')
	<tr>
	<td colspan="2" valign="top" style="width: 20%; text-align: right;"><span ><b>Transit/Route :</b></span></td>
	<td colspan="8" style="margin-left: 15px">{{ $cocogen_marine->transit }}</td>
	</tr>
	@endif

	@if($cocogen_marine->template == 'MCI-C' || $cocogen_marine->template == 'MCI-I')
	<tr>
	<td colspan="2" valign="top" style="width: 20%; text-align: right;"><span ><b>Point of Origin :</b></span></td>
	<td colspan="8" style="margin-left: 15px">{{ $cocogen_marine->point_origin }}</td>
	</tr>
	<tr>
	<td colspan="2" valign="top" style="width: 20%; text-align: right;"><span ><b>Point of Destination :</b></span></td>
	<td colspan="8" style="margin-left: 15px">{{ $cocogen_marine->point_destination }}</td>
	</tr>
	<tr>
	<td colspan="2" valign="top" style="width: 20%; text-align: right;"><span ><b>Packaging :</b></span></td>
	<td colspan="8" style="margin-left: 15px">{{ $cocogen_marine->packaging }}</td>
	</tr>			
	@endif
	<tr>
	<td colspan="2" valign="top" style="width: 20%; text-align: right;"><span ><b>Loss Experience :</b></span></td>
	<td colspan="8" style="margin-left: 15px">{{ $cocogen_marine->loss_xp }}</td>
	</tr>

	</tbody>
	</table>
	<br/>


	<p><span style="width: 100%; font-size: 9pt"><strong>ATTACHMENT</strong></span></p>

	<table class="table table-sm table-bordered table-condensed" style="width: 100%; font-size: 8pt">
	<thead>
	<tr>
	<th>Filename</th>
	</tr>
	</thead>

	<tbody>
	@foreach($cocogen_marine_attachment as $marine_attachment)
	<tr>
	<td>{{ $marine_attachment->filename2 }}</td>
	</tr>
	@endforeach

	</tbody>
	</table>

	<p><span style="width: 100%; font-size: 9pt"><strong>CHANGE LOG/S</strong></span></p>

	<table class="table table-sm table-bordered table-condensed" style="width: 100%; font-size: 8pt">
	<thead>
	<tr>
	<th>Category</th>
	<th>Description</th>
	<th>Action</th>
	<th>User</th>
	<th>Date</th>
	</tr>
	</thead>

	<tbody>
	@foreach($cocogen_marine_historylogs as $marine_historylog)
	<tr>
	<td>{{ $marine_historylog->category }}</td>
	<td>{{ $marine_historylog->description }}</td>
	<td>{{ $marine_historylog->action }}</td>
	<td>{{ $marine_historylog->user }}</td>
	<td>{{ $marine_historylog->updated_at }}</td>
	</tr>
	@endforeach

	</tbody>
	</table>

  @endforeach		
  </body>
</html>

