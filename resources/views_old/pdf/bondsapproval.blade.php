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

@foreach($cocogen_bonds_quote as $cocogen_bonds)
<div align="center"><p><span style="width: 100%; font-size: 11pt"><strong>BONDS APPROVAL NO. {{ $cocogen_bonds->id }} </strong></span></p></div>
<br>

<table style="width: 100%; font-size: 8pt">

<tbody>

<tr>
<td colspan="2"><p><span ><b>Date :</b> {{ $cocogen_bonds->quote_date }} </span></p></td>
<td colspan="2" style="text-align: center;"><p><span ><b>Client Type :</b> {{ $cocogen_bonds->client_type }} </span></p> </td>
<td colspan="2" style="text-align: right;"> <p><span ><b>Update KYC :</b> {{ $cocogen_bonds->update_kyc }} </span></p></td>

</tr>


</tbody>
</table>
<br/>

<p><span style="width: 100%; font-size: 9pt"><strong>NATURE OF REQUEST</strong></span></p>

<table style="width: 100%; font-size: 8pt">

<tbody>

<tr>
<td style="width: 30%"><p>
@if($cocogen_bonds->request_type=="Quotation")

<p><span ><b>Quotation :</b> Yes </span></p>

 @else
 
<p><span ><b>Quotation :</b> No</span></p>

@endif

</td>
<td style="width: 40%; "><p><span ><b>Endorse Policy No. :</b> {{ $cocogen_bonds->endorese_no }} </span></p> </td>
<td rowspan="2" valign="top" style="width: 10%"><b>Others :</b></td>
<td rowspan="2" valign="top"></td>
</tr>
<tr>
<td style="width: 30%; "> 
@if($cocogen_bonds->request_type=="Issue Policy")

<p><span ><b>Issue New Policy :</b> Yes </span></p>

 @else
 
<p><span ><b>Issue New Policy :</b> No</span></p>

@endif
</td>
<td style="width: 40%; "> <p><span ><b>Quotation No. :</b> </span></p></td>

</tr>


</tbody>
</table>
<br/>

<table class="table table-sm table-bordered table-condensed" style="width: 100%; font-size: 8pt">

<tbody>

<tr>
<td valign="top" style="width: 20%"><span ><b>Agent/Broker</b></span></td>
<td colspan="3">{{ $cocogen_bonds->agent }}</td>
</tr>

<tr>
<td colspan="4"></td>
</tr>

<tr>
<td valign="top" style="width: 20%"><span ><b>Principal</b></span></td>
<td colspan="3">{{ $cocogen_bonds->principal }}</td>
</tr>

</tr>

<tr>
<td valign="top" style="width: 20%"><span ><b>Address</b></span></td>
<td colspan="3">{{ $cocogen_bonds->address }}</td>

</tr>

</tr>

<tr>
<td valign="top" style="width: 20%"><span ><b>Date of Incorporation</b></span></td>
<td style="width: 38%">{{ $cocogen_bonds->date_incorp}}</td>
<td valign="top" style="width: 15%"><span ><b>Company TIN</b></span></td>
<td>{{ $cocogen_bonds->company_tin }}</td>
</tr>

<tr>
<td valign="top" style="width: 20%"><span ><b>Contact Person</b></span></td>
<td style="width: 38%">{{ $cocogen_bonds->contact_person }}</td>
<td valign="top" style="width: 15%"><span ><b>Contact No.</b></span></td>
<td>{{ $cocogen_bonds->contact_no }}</td>
</tr>
<tr>
<td valign="top" style="width: 20%"><span><b>Email Address</b></span></td>
<td colspan="3">{{ $cocogen_bonds->email }}</td>
</tr>

<tr>
<td colspan="4"></td>
</tr>

<tr>
<td valign="top" style="width: 20%"><span ><b>Obligee</b></span></td>
<td colspan="3">{{ $cocogen_bonds->obligee }}</td>
</tr>
<tr>
<td valign="top" style="width: 20%"><span ><b>Project</b></span></td>
<td style="width: 38%">{{ $cocogen_bonds->project }}</td>
<td valign="top" style="width: 15%"><span ><b>Contract Price</b></span></td>
<td>{{ number_format($cocogen_bonds->contract_price, 2) }}</td>
</tr>
<tr>
<td valign="top" style="width: 20%"><span><b>Undertaking</b></span></td>
<td colspan="3">{{ $cocogen_bonds->undertaking }}</td>
</tr>
<tr>

</tbody>
</table>

@endforeach


<p><span style="width: 100%; font-size: 9pt"><strong>BOND REQUIREMENT</strong></span></p>

<table class="table table-sm table-bordered table-condensed" style="width: 100%; font-size: 8pt">
<thead>
<tr>
<th>Bond Type</th>
<th>Bond Amount</th>
<th>Annual Rate (%)</th>
<th>Annual Premium</th>
<th>Bond Term</th>
<th>Term Premium</th>
</tr>
</thead>

<tbody>
@foreach($cocogen_bonds_quote_requirement as $cocogen_requirement)
<tr>
<td>{{ $cocogen_requirement->bond_type }}</td>
<td>{{ number_format($cocogen_requirement->bond_amt,2) }}</td>
<td>{{ $cocogen_requirement->annual_rate }}</td>
<td>{{ number_format($cocogen_requirement->annual_premium,2) }}</td>
<td>{{ $cocogen_requirement->bond_term }}</td>
<td>{{ number_format($cocogen_requirement->term_premium,2) }}</td>
</tr>
@endforeach

</tbody>
</table>

<p><span style="width: 100%; font-size: 9pt"><strong>FINANCIAL HIGHLIGHTS</strong></span></p>

<table class="table table-sm table-bordered table-condensed" style="width: 100%; font-size: 8pt">
<thead>
<tr>
<th>Type</th>
<th>Year</th>
<th>Amount</th>
</tr>
</thead>

<tbody>
@foreach($cocogen_bonds_financial as $cocogen_financial)
<tr>
<td>{{ $cocogen_financial->fin_type }}</td>
<td>{{ $cocogen_financial->fin_year }}</td>
<td>{{ number_format($cocogen_financial->fin_amt,2) }}</td>
</tr>
@endforeach

</tbody>
</table>

<table class="table table-sm table-bordered table-condensed" style="width: 100%; font-size: 8pt">

<tbody>

<tr>
<td style="width: 35%; text-align: center;"><span ><b>Prepared By</b></span></td>
<td style="width: 15%; text-align: center;"><span ><b>Date</b></span></td>
<td style="width: 35%; text-align: center;"><span ><b>Approved By</b></span></td>
<td style="width: 15%; text-align: center;"><span ><b>Date</b></span></td>
</tr>

<tr>
<td style="width: 35%; text-align: center; height: 10pt"></td>
<td style="width: 15%; text-align: center; height: 10pt"></td>
<td style="width: 35%; text-align: center; height: 10pt"></td>
<td style="width: 15%; text-align: center; height: 10pt"></td>
</tr>

<tr>
<td colspan="4"></td>
</tr>

<tr>
<td style="width: 35%; text-align: center;"><span ><b>Encoded By</b></span></td>
<td style="width: 15%; text-align: center;"><span ><b>Date</b></span></td>
<td style="width: 35%; text-align: center;"><span ><b>Received By</b></span></td>
<td style="width: 15%; text-align: center;"><span ><b>Date</b></span></td>
</tr>

<tr>
<td style="width: 35%; text-align: center; height: 10pt"></td>
<td style="width: 15%; text-align: center; height: 10pt"></td>
<td style="width: 35%; text-align: center; height: 10pt"></td>
<td style="width: 15%; text-align: center; height: 10pt"></td>
</tr>

</tbody>
</table>

<p><span style="width: 100%; font-size: 9pt"><strong>COMPANY BACKGROUND</strong> Brief description about the company (e.g. business address, nature of business)                            
</span></p>
<p><span >{{ $cocogen_bonds->company_bgd }}</span></p>
<br/>

<table class="table table-sm table-bordered table-condensed" style="width: 100%; font-size: 8pt">
<thead>
<tr>
<th>Financial Remarks</th>
</tr>
</thead>

<tbody>
@foreach($cocogen_bonds_financial_remarks as $financial_remarks)
<tr>
<td>{{ $financial_remarks->remarks }}</td>
</tr>
@endforeach

</tbody>
</table>

<p><span style="width: 100%; font-size: 9pt"><strong>LOSS EXPERIENCE</strong></span></p>

<table class="table table-sm table-bordered table-condensed" style="width: 100%; font-size: 8pt">
<thead>
<tr>
<th>Loss Experience</th>
</tr>
</thead>

<tbody>
@foreach($cocogen_bonds_lossxp as $cocogen_lossxp)
<tr>
<td>{{ $cocogen_lossxp->loss_xp}}</td>
</tr>
@endforeach

</tbody>
</table>

<p><span style="width: 100%; font-size: 9pt"><strong>LIST OF OWNER(S)</strong></span></p>

<table class="table table-sm table-bordered table-condensed" style="width: 100%; font-size: 8pt">
<thead>
<tr>
<th>Name</th>
<th>Position</th>
</tr>
</thead>

<tbody>
@foreach($cocogen_bonds_owner as $cocogen_owner)
<tr>
<td>{{ $cocogen_owner->owner_name }}</td>
<td>{{ $cocogen_owner->owner_post }}</td>

</tr>
@endforeach

</tbody>
</table>

<p><span style="width: 100%; font-size: 9pt"><strong>LIST OF OFFICERS</strong></span></p>

<table class="table table-sm table-bordered table-condensed" style="width: 100%; font-size: 8pt">
<thead>
<tr>
<th>Name</th>
<th>Position</th>
</tr>
</thead>

<tbody>
@foreach($cocogen_bonds_officer as $cocogen_officer)
<tr>
<td>{{ $cocogen_officer->officer_name }}</td>
<td>{{ $cocogen_officer->officer_post }}</td>
</tr>
@endforeach

</tbody>
</table>

<p><span style="width: 100%; font-size: 9pt"><strong>COLLATERAL(S)</strong></span></p>

<table class="table table-sm table-bordered table-condensed" style="width: 100%; font-size: 8pt">
<thead>
<tr>
<th>Type</th>
<th>Item</th>
<th>Value</th>
</tr>
</thead>

<tbody>
@foreach($cocogen_bonds_collateral as $cocogen_collateral)
<tr>
<td>{{ $cocogen_collateral->collateral_type }}</td>
<td>{{ $cocogen_collateral->collateral_item }}</td>
<td>{{ number_format($cocogen_collateral->collateral_value,2) }}</td>
</tr>
@endforeach

</tbody>
</table>

<p><span style="width: 100%; font-size: 9pt"><strong>CO-SIGNER(S)</strong></span></p>


<table class="table table-sm table-bordered table-condensed" style="width: 100%; font-size: 8pt">
<thead>
<tr>
<th>Name</th>
<th>Property</th>
<th>Amount</th>
</tr>
</thead>

<tbody>
@foreach($cocogen_bonds_cosigner as $cocogen_cosigner)
<tr>
<td>{{ $cocogen_cosigner->cosigner_name }}</td>
<td>{{ $cocogen_cosigner->cosigner_property }}</td>
<td>{{ number_format($cocogen_cosigner->cosigner_amt,2) }}</td>
</tr>
@endforeach

</tbody>
</table>

<p><span style="width: 100%; font-size: 9pt"><strong> LIST OF COMPLETED PROJECT(S)</strong></span></p>



<table class="table table-sm table-bordered table-condensed" style="width: 100%; font-size: 8pt">
<thead>
<tr>
<th>Name</th>
</tr>
</thead>

<tbody>
@foreach($cocogen_bonds_projects as $cocogen_projects)
<tr>
<td>{{ $cocogen_projects->project_name }}</td>
</tr>
@endforeach

</tbody>
</table>

<p><span style="width: 100%; font-size: 9pt"><strong> LIST OF ON-GOING PROJECT(S)</strong></span></p>

<table class="table table-sm table-bordered table-condensed" style="width: 100%; font-size: 8pt">
<thead>
<tr>
<th>Name</th>
</tr>
</thead>

<tbody>
@foreach($cocogen_bonds_projects2 as $cocogen_projects2)
<tr>
<td>{{ $cocogen_projects2->project_name2 }}</td>
</tr>
@endforeach

</tbody>
</table>

<table class="table table-sm table-bordered table-condensed" style="width: 100%; font-size: 8pt">

<tbody>

<tr>

<td style="width: 35%; text-align: center;"><span ><b>Underwritten By</b></span></td>
<td style="text-align: center;"><span><b>Remarks</b></span></td>

</tr>


<tr>

<td style="width: 35%; text-align: center; height: 50pt;"><span  style="margin-left: 27%; margin-top: 20pt; display: inline-block; padding: .5em; border-top: 1px solid;"><b>Bond Underwriter</b></span></td>
<td style="height: 50pt"></td> 
</tr>


</tbody>
</table>

<p><span style="width: 100%; font-size: 9pt"><strong>UNDERWRITING COMMITTEE</strong></span></p>

<table class="table table-sm table-bordered table-condensed" style="width: 100%; font-size: 8pt">

<tbody>

<tr>

<td style="width: 35%; text-align: center;"><span ><b>Approved By</b></span></td>
<td style="text-align: center;"><span><b>Remarks</b></span></td>
<td style="width: 15%; text-align: center;"><span><b>Date</b></span></td>
</tr>


<tr>

<td style="width: 35%; text-align: center; height: 50pt;"><span  style="margin-left: 22%; margin-top: 20pt; display: inline-block; padding: .5em; border-top: 1px solid;"><b>Bond Department Head</b></span></td>
<td style="height: 50pt"></td> 
<td style="width: 15%; height: 50pt"></td>
</tr>

<tr>

<td style="width: 35%; text-align: center; height: 50pt;"><span  style="margin-left: 27%; margin-top: 20pt; display: inline-block; padding: .5em; border-top: 1px solid;"><b>Bond Group Head</b></span></td>
<td style="height: 50pt"></td> 
<td style="width: 15%; height: 50pt"></td>
</tr>

<tr>

<td style="width: 35%; text-align: center; height: 50pt;"><span  style="margin-left: 25%; margin-top: 20pt; display: inline-block; padding: .5em; border-top: 1px solid;"><b>Bond Division Head</b></span></td>
<td style="height: 50pt"></td> 
<td style="width: 15%; height: 50pt"></td>
</tr>

</tbody>
</table>

</body>
</html>