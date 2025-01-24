@extends('layouts.app')

@section('content')
    <div class="top-container">
    <!-- config enabled always -->
    <div class="custom-banner custom-page-banner" data-uri-path="/services/claims-services/file-a-claim">
        <div class="page-banner-wrapper">
            <div class="image-banner-wrapper" style="background-image: url('{{ url('/images/ucpb-general-insurance-file-a-claim-innerpage3.jpg') }}');"> 
            </div>
            <div class="text-banner-wrapper">
                <h3 class="short-description" style="font-family: arial;">
                    Claims Processing Made Easy
                </h3>
            </div>
        </div>
    </div>
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 a-left">
                    <ul>
                        <li class="home"><a href="{{ url('/') }}" title="Go to Home Page" >Home</a> <span class="breadcrumbs-split"><i class="fa fa-angle-right">
                            </i></span></li>
                        <li class="category16"><span >Services</span><span class="breadcrumbs-split">
                            <i class="fa fa-angle-right"></i></span></li>    
                        <li class="category17" ><strong>File a Claim</strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
   
</div>
 <div class="category-name container">
        <h1 style="margin-bottom: 15px">
            File a Claim
        </h1>
    </div>
    <div class="category-banner container">
        <p>
           When you're dealing with a loss, getting your insurance claim going can be overwhelming. Don't worry, we are here to help you through the process. Be one step ahead and come prepared with the different claims requirements and documents needed to get started.</p>
    </div>
<div class="main-container col1-layout">
    <div class="main container">
        <div class="col-main">
               <div class="modal fade bs-example-modal-lg" id="claim_motor" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog file-a-claim">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="file-a-claim-modalclose">
                        <span aria-hidden="true">×</span>
                    </button>
                    <div class="modal-content">
                        <div class="modal-body">
                            <style type="text/css">
                                <!
                                -- .file-a-claim .fa
                                {
                                    color: #53b947;
                                }
                                .file-a-claim .btn-green
                                {
                                    background: #53b947;
                                    border-radius: 40px;
                                    color: #fff;
                                    font-size: 15px;
                                    font-weight: 400;
                                    padding: 12px 32px;
                                    text-decoration: none;
                                    text-transform: uppercase;
                                    transition: all 0.3s ease-in-out;
                                    font-family: muli;                                }
                                .file-a-claim .text-center
                                {
                                    text-align: center;
                                }
                                .file-a-claim ul, ol
                                {
                                    margin: 0 0 0 10px;
                                    padding: 10px 0 0 10px;
                                }
                                .file-a-claim .tbl
                                {
                                    background-color: white;
                                    padding: 30px;
                                }
                                .file-a-claim .table-wrapper
                                {
                                    overflow-x: auto;
                                    overflow-y: auto;
                                }
                                .file-a-claim table
                                {
                                    color: #333;
                                    table-layout: fixed;
                                    word-break: break-word;
                                    width: 100%;
                                }
                                .file-a-claim table thead
                                {
                                    background-color: #00539f;
                                    color: white;
                                }
                                .file-a-claim li
                                {
                                    line-height: 1.7em;
                                }
                                .category-name h1
                                {
                                    color: #00539e;
                                    font: 900 23px 'Muli';
                                    margin-bottom: 0px;
                                    text-transform: uppercase;
                                    word-break: break-word;
                                    word-wrap: break-word;
                                }
                                @media (max-width:768px)
                                {
                                    .modal-dialog.file-a-claim
                                    {
                                        width: 100%;
                                    }
                                    .file-a-claim table
                                    {
                                        width: 850px;
                                    }
                                }
                                -- ></style>
                            <div class="row file-a-claim">
                                <center>
                                    <div class="category-name" style="background-color: #FFFFFF !important">
                                        <h1 style="margin-bottom: 8px;"> 
                                            CLAIMS CHECKLIST FOR MOTOR INSURANCE</h1>
                                    </div>
                                </center>

                                <div class="category-banner"  style="background-color: #FFFFFF !important">
                               
                                        COCOGEN policyholders have exclusive access to Gawa Agad, an innovative claims program designed to improve claims processing time by allowing our clients to go directly to our accredited repair shops and coordinate requirements needed.
                                </div>
                                <br>
                                <div class="col-xs-12 text-center">
                                    <a class="btn-green" href="{{ url('/pdfdocuments/ucpbpdf/fileaclaim/Claims Document Checklist (Motor Car).pdf') }}"
                                        target="_blank">download now</a></div>
                                <br>
                                <br>
                                <br>
                                <div class="col-xs-12 col-md-10 col-md-offset-1 tbl">
                                    <div class="table-wrapper">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" width="33%">
                                                        <strong>INSURED</strong>
                                                    </th>
                                                    <th class="text-center" width="34%">
                                                        <strong>THIRD PARTY (TP)</strong>
                                                    </th>
                                                    <th class="text-center" width="33%">
                                                        <strong>RECOVERY</strong>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <strong>A. PARTIAL LOSS/TOTAL LOSS</strong>
                                                        <ul>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green" >
                                                            </em> Claimant’s Incident Report (COCOGEN form to be accomplished by the Insured)</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Pictures of Damage</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Police Report and/or
                                                                Driver’s</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Affidavit</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Registration Certificate
                                                                and OR</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Driver’s License
                                                                and OR</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Stencils of Motor
                                                                and Serial No.</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Copy of Insurance
                                                                Policy</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Copy of OR or Proof
                                                                of Premium Payment</li>
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        <strong>A. VEHICLE</strong><br>
                                                        <span style="text-decoration: underline;">TP Claimant</span>
                                                        <ul>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Repair Estimate</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Pictures of Damage</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Certificate of
                                                                No Claim or CTPL Policy</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Registration Certificate
                                                                and OR</li>
                                                        </ul>
                                                        <span style="text-decoration: underline;">Insured</span>
                                                        <ul>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Registration Certificate
                                                                and OR</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Driver’s License
                                                                and OR</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Driver’s Affidavit</li>
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        <strong>A. FOR RECOVERY PURPOSES</strong><br>
                                                        <small><em>NOTE: If Insured was reportedly bumped by a third party, Insured has to provide
                                                            the following documents of party at fault:</em> </small>
                                                        <ul>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Driver’s License
                                                                and OR</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Registration Certificate
                                                                and OR</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Copy of Insurance
                                                                Policy</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Copy of TIN and
                                                                SSS ID</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Contact Number</li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <strong>B. CARNAP</strong>
                                                        <ul>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Certificate of
                                                                Non-Recovery</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Alarm Sheet</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Complaint Sheet</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Police Report</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Registration Certificate
                                                                and OR</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Driver’s License
                                                                and OR</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Copy of Policy</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Copy of OR of Premium
                                                                Payment</li>
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        <strong>B. PROPERTY DAMAGE</strong><br>
                                                        <span style="text-decoration: underline;">TP Claimant</span>
                                                        <ul>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Quotation of Repair
                                                                Estimate</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Pictures of Damage</li>
                                                        </ul>
                                                        <span style="text-decoration: underline;">Insured</span>
                                                        <ul>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Registration Certificate
                                                                and OR</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Driver’s License
                                                                and OR</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Driver’s Affidavit</li>
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        <strong>B. RECOVERY OF OTHER INSURANCE COMPANY</strong><br>
                                                        <small><em>NOTE: Insurance company has to submit their claim documents:</em> </small>
                                                        <ul>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Release of Claim</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Payment Voucher</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Policy of Adverse
                                                                Party</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Registration Certificate
                                                                and OR</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Driver’s License
                                                                and OR</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Pictures of Damage</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Repair Estimate
                                                                / Computation of Liability</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Letter of Authority</li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <strong>C. BODILY INJURY</strong><br>
                                                        <small><em>Note: In addition to item A above</em> </small>
                                                        <ul>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Original Medical
                                                                Receipts /OR</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Medical Certificate</li>
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        <strong>C. BODILY INJURY</strong><br>
                                                        <span style="text-decoration: underline;">TP Claimant</span>
                                                        <ul>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Original Medical
                                                                Receipts /OR</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Medical Certificate</li>
                                                        </ul>
                                                        <span style="text-decoration: underline;">Insured</span>
                                                        <ul>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Registration Certificate
                                                                and OR</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Driver’s License
                                                                and OR</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Driver’s Affidavit</li>
                                                        </ul>
                                                    </td>
                                                    <td>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade bs-example-modal-lg" id="claim_fire" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog file-a-claim">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="file-a-claim-modalclose">
                        <span aria-hidden="true">×</span>
                    </button>
                    <div class="modal-content">
                        <div class="modal-body">
                            <style type="text/css">
                                <!
                                -- .file-a-claim .fa
                                {
                                    color: #53b947;
                                }
                                .file-a-claim .btn-green
                                {
                                    background: #53b947;
                                    border-radius: 40px;
                                    color: #fff;
                                    font-size: 15px;
                                    font-weight: 400;
                                    padding: 12px 32px;
                                    text-decoration: none;
                                    text-transform: uppercase;
                                    transition: all 0.3s ease-in-out;
                                    font-family: muli;
                                }
                                .file-a-claim .text-center
                                {
                                    text-align: center;
                                }
                                .file-a-claim ul, ol
                                {
                                    margin: 0 0 0 10px;
                                    padding: 10px 0 0 10px;
                                }
                                .file-a-claim .tbl
                                {
                                    background-color: white;
                                    padding: 30px;
                                }
                                /**/.file-a-claim .table-wrapper
                                {
                                    overflow-x: auto;
                                    overflow-y: auto;
                                }
                                .file-a-claim table
                                {
                                    color: #333;
                                    table-layout: fixed;
                                    word-break: break-word;
                                    width: 100%;
                                }
                                /**/.file-a-claim table thead
                                {
                                    background-color: #00539f;
                                    color: white;
                                }
                                .file-a-claim li
                                {
                                    line-height: 1.7em;
                                }
                                .category-name h1
                                {
                                    color: #00539e;
                                    font: 900 23px 'Muli';
                                    margin-bottom: 0px;
                                    text-transform: uppercase;
                                    word-break: break-word;
                                    word-wrap: break-word;
                                }
                                /**/@media (max-width:768px)
                                {
                                    .modal-dialog.file-a-claim
                                    {
                                        width: 100%;
                                    }
                                    .file-a-claim table
                                    {
                                        width: 850px;
                                    }
                                }
                                /**/-- ></style>
                            <div class="row file-a-claim" >
                                <center>
                                    <div class="category-name" style="background-color: #FFFFFF !important">
                                        <h1 style="margin-bottom: 8px;">
                                            CLAIMS CHECKLIST FOR FIRE INSURANCE</h1>
                                    </div>

                                </center>

                                <div class="category-banner" style="background-color: #FFFFFF !important">
                                    
                                       Use this checklist to file a claim against any of the following COCOGEN Insurance policies: Fire, Home Excel Plus, Condo Excel Plus and ProBiz Excel Plus.
                                </div>

                                <br>
                                <div class="col-xs-12 text-center">
                                    <a class="btn-green" href="{{ url('/pdfdocuments/ucpbpdf/fileaclaim/Claims Checklist - Fire.pdf') }}"
                                        target="_blank">download now</a></div>
                                <br>
                                <br>
                                <br>
                                <div class="col-xs-12 col-md-10 col-md-offset-1 tbl">
                                    <div class="table-wrapper">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" width="33%">
                                                        <strong>Documentary Requirements in case of  Fire and Allied Perils</strong>
                                                    </th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td rowspan="3" style="vertical-align: middle;">
                                                        <strong>Basic Documents:</strong>
                                                        <ul>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Formal Claim against COCOGEN</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Fire Department Report / Affidavit of Loss (for fire loss)</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Photographs</li>                                                       
                                                        </ul>
                                                    </td>
                                                </tr>

                                            <thead>
                                                <tr>
                                                    <!-- <th class="text-center" width="33%">
                                                        <strong>Documentary Requirements in case of  Fire and Allied Perils</strong>
                                                    </th> -->
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td rowspan="3" style="vertical-align: middle;">
                                                        <strong>Additional Documents for Building:</strong>
                                                        <ul>

                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Detailed repair estimate</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Declaration of Real Property</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> DFloor Plan / Construction Plan</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Building Permit</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Lease Contract (if lot belongs to  other than insured)</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Transfer Certificate of Title Appraisal Report (if any</li>
                                                        </ul>
                                                    </td>
                                                </tr>   
                                              
                                            <thead>
                                                <tr>
                                                   <!--  <th class="text-center" width="33%">
                                                        <strong>Documentary Requirements in case of  Fire and Allied Perils</strong>
                                                    </th> -->
                                                    
                                                </tr>
                                            </thead>
                                            <tbody >
                                                <tr >
                                                    <td rowspan="3" style="vertical-align: middle;">
                                                        <strong>Additional Documents for Stocks, Household Furniture, Fixture, Fittings and Personal Effects, Machinery, Equipment and Accessories</strong>
                                                        <ul>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Detailed inventory of all stocks and property risk whether damaged or undamaged</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Purchase / Sales Invoice</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Income Tax Return / Financial Statements</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Business License</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Registration of Business</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Appraisal Report</li>
                                                        </ul>
                                                    </td>
                                                </tr>    
                                                
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade bs-example-modal-lg" id="claim_marine" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog file-a-claim">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="file-a-claim-modalclose">
                        <span aria-hidden="true">×</span>
                    </button>
                    <div class="modal-content">
                        <div class="modal-body">
                            <style type="text/css">
                                <!
                                -- .file-a-claim .fa
                                {
                                    color: #53b947;
                                }
                                .file-a-claim .btn-green
                                {
                                    background: #53b947;
                                    border-radius: 40px;
                                    color: #fff;
                                    font-size: 15px;
                                    font-weight: 400;
                                    padding: 12px 32px;
                                    text-decoration: none;
                                    text-transform: uppercase;
                                    transition: all 0.3s ease-in-out;
                                    font-family: muli;
                                }
                                .file-a-claim .text-center
                                {
                                    text-align: center;
                                }
                                .file-a-claim ul, ol
                                {
                                    margin: 0 0 0 10px;
                                    padding: 10px 0 0 10px;
                                }
                                .file-a-claim .tbl
                                {
                                    background-color: white;
                                    padding: 30px;
                                }
                                /**/.file-a-claim .table-wrapper
                                {
                                    overflow-x: auto;
                                    overflow-y: auto;
                                }
                                .file-a-claim table
                                {
                                    color: #333;
                                    table-layout: fixed;
                                    word-break: break-word;
                                    width: 100%;
                                }
                                /**/.file-a-claim table thead
                                {
                                    background-color: #00539f;
                                    color: white;
                                }
                                .file-a-claim li
                                {
                                    line-height: 1.7em;
                                }
                                .category-name h1
                                {
                                    color: #00539e;
                                    font: 900 23px 'Muli';
                                    margin-bottom: 0px;
                                    text-transform: uppercase;
                                    word-break: break-word;
                                    word-wrap: break-word;
                                }
                                /**/@media (max-width:768px)
                                {
                                    .modal-dialog.file-a-claim
                                    {
                                        width: 100%;
                                    }
                                    .file-a-claim table
                                    {
                                        width: 850px;
                                    }
                                }
                                /**/-- ></style>
                            <div class="row file-a-claim" >
                                <center>
                                    <div class="category-name" style="background-color: #FFFFFF !important">
                                        <h1 style="font-family: arial;margin-bottom: 8px;">
                                            CLAIMS CHECKLIST FOR MARINE INSURANCE</h1>
                                    </div>
                                </center>
                                <div class="category-banner" style="font-family: arial; font-weight: normal;background-color: #FFFFFF !important">
                                    Speed up your marine and engineering insurance claims processing by having the following documents
                                    ready.</div>
                                <br>
                                <div class="col-xs-12 text-center">
                                    <a class="btn-green" href="{{ url('/pdfdocuments/ucpbpdf/fileaclaim/Claims Checklist - Marine and Engineering.pdf') }}"
                                        target="_blank">download now</a></div>
                                <br>
                                <br>
                                <br>
                                <div class="col-xs-12 col-md-10 col-md-offset-1 tbl">
                                    <div class="table-wrapper">
                                        <table class="table table-bordered">
                                              <thead>
                                                <tr>
                                                     <th class="text-center" width="33%">
                                                        <strong style="font-family: muli;">Documentary Requirements in case of Marine Cargo Claim  </strong>
                                                    </th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody >
                                                <tr >
                                                    <td rowspan="3" style="vertical-align: middle;">
                                                        <strong>Basic Documents: </strong>
                                                        <ul>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Formal Claim against COCOGEN  </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Original copy of the Policy / Risk Note  </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Original and /or duplicate copy of Bill of Lading (via Vessel)   </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Original and /or duplicate copy of Airway Bill (via Aircraft)  </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Original and/or duplicate copy of Commercial Invoice   </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Original copy of Delivery Receipt    </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Packing List    </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Photographs     </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Duly receipted formal claim against Vessel, Arrastre, Broker and Forwarder     </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            </tbody>  
                                            <thead>
                                                <tr>
                                                     <th class="text-center" width="33%">
                                                        <strong style="font-family: muli;">Documentary Requirements in case of Marine In Land / Truck Risk Claim  </strong>
                                                    </th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody >
                                                <tr >
                                                    <td rowspan="3" style="vertical-align: middle;">
                                                        <strong>Basic Documents: </strong>
                                                        <ul>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Police Report / Incident Report   </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Invoices  </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Registration Certificate and Official Receipt  </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Driver’s License and Official Receipt   </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Photographs    </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Original copy of Delivery Receipt    </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Original copy of  Waybill, Delivery Receipt     </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            </tbody> 
                                            <tbody >
                                                <tr >
                                                    <td rowspan="3" style="vertical-align: middle;">
                                                        <strong>Optional Document:  </strong>
                                                        <ul>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Maintenance Record of the Vehicle (atleast six (6) months prior to loss)   </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            </tbody>     
                                             <thead>
                                                <tr>
                                                     <th class="text-center" width="33%">
                                                        <strong style="font-family: muli;">Documentary Requirements in case of Marine Hull Claim  </strong>
                                                    </th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody >
                                                <tr >
                                                    <td rowspan="3" style="vertical-align: middle;">
                                                        <strong>Basic Documents: </strong>
                                                        <ul>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Police Report / Incident Report   </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Marine Note of Protest   </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Coastwise License  </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Repair estimate   </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Photographs    </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Survey Report   </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Certificate of Ownership     </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Certificate of Philippine Registry      </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Minimum Safe Manning Certificate     </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Crew List      </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Cargo Ship Safety Certificate      </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Original copy of Policy        </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            </tbody> 
                                            <tbody >
                                                <tr >
                                                    <td rowspan="3" style="vertical-align: middle;">
                                                        <strong>Optional Document:  </strong>
                                                        <ul>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Master Oath of Safe Departure  </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            </tbody>   
                                                                                     
                                        </table>


                                        <br>
                                        <br>
                                        

                                        
                                    </div>
                                </div>

                               

                            </div>
                            <div class="row file-a-claim" style="margin-top:  -90px !important;">
                                

                                <center>
                                    <div class="category-name" style="background-color: #FFFFFF !important;">
                                        <h1 style="font-family: arial;margin-bottom: 8px;margin-bottom: -35px !important"><br> 
                                            <br>    &nbsp;&nbsp;&nbsp;CLAIMS CHECKLIST FOR ENGINEERING INSURANCE</h1>
                                    </div>
                                </center>
                                <div class="category-banner" style="font-family: arial; font-weight: normal;background-color: #FFFFFF !important">
                                   </div>
                                <br>
                                <div class="col-xs-12 col-md-10 col-md-offset-1 tbl">
                                    <div class="table-wrapper">
                                       <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" width="33%" style="font-family: muli;">
                                                        <strong>Documentary Requirements in case of Contractors/ Erection All Risk Claim </strong>
                                                    </th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td rowspan="3" style="vertical-align: middle;">
                                                        <strong>Basic Documents:</strong>
                                                        <ul>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Formal Claim against COCOGEN </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Police Report / Incident Report    </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Photographs </li>    
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Estimate &/or Actual Repair Cost    </li>      
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Technical Report/Assesment as to the cause of loss </li>                                                             
                                                        </ul>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <thead>
                                                <tr>
                                                    <!-- <th class="text-center" width="33%">
                                                        <strong>Documentary Requirements in case of  Fire and Allied Perils</strong>
                                                    </th> -->
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td rowspan="3" style="vertical-align: middle;">
                                                        <strong>Optional Documents:</strong>
                                                        <ul>

                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Duly Accomplished  and Signed Non-Waiver Agreement   </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Invoices and/or Receipts   </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Copy of Lease  </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Copy of Contract    </li>
                                                        </ul>
                                                    </td>
                                                </tr>   
                                            </tbody>
                                            <thead>
                                                <tr>
                                                    <th class="text-center" width="33%" style="font-family: muli;">
                                                        <strong>Documentary Requirements in case of Electronic Equipment Claim  </strong>
                                                    </th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td rowspan="3" style="vertical-align: middle;">
                                                        <strong>Basic Documents:</strong>
                                                        <ul>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Formal Claim against COCOGEN  </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Police Report / Incident Report     </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Photographs </li>    
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Estimate and/or Actual Repair Cost / Invoices / Receipts     </li>      
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Technical Report/Assesment as to the cause of loss  </li>                                                             
                                                        </ul>
                                                    </td>
                                                </tr>
                                            </tbody>
                                              <tbody>
                                                <tr>
                                                    <td rowspan="3" style="vertical-align: middle;">
                                                        <strong>Optional Documents:</strong>
                                                        <ul>

                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Proof of Purchase (Equipment)    </li>
                                                        </ul>
                                                    </td>
                                                </tr>   
                                            </tbody>
                                            <thead>
                                                <tr>
                                                    <th class="text-center" width="33%" style="font-family: muli;">
                                                        <strong>Documentary Requirements in case of Third Party Property Damage Claim  </strong>
                                                    </th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td rowspan="3" style="vertical-align: middle;">
                                                        <strong>Basic Documents:</strong>
                                                        <ul>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Formal Claim against COCOGE </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Photographs of  Damaged Units     </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Detailed Estimate  </li>    
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Police Report / Affidavit of Loss    </li>      
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Accomplished Sworn Statement of claim  </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Accomplished Non Waiver Agreement   </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Demand Letter of the Third party claimant  </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Real Property Tax Declaration  </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Supporting documents of the unit cost/ price per invoice   </li>                                                             
                                                        </ul>
                                                    </td>
                                                </tr>
                                            </tbody> 
                                            <tbody>
                                                <tr>
                                                    <td rowspan="3" style="vertical-align: middle;">
                                                        <strong>Optional Documents:</strong>
                                                        <ul>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Repair Invoice (if damage is already repaired)     </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Floor Lay-out    </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Copy of Lease     </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Copy of Lease Contract    </li>
                                                        </ul>
                                                    </td>
                                                </tr>   
                                            </tbody>
                                            <tbody>
                                                <tr>
                                                    <td rowspan="3" style="vertical-align: middle;">
                                                        <strong>Additional Documents for Motor:  </strong>
                                                        <ul>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em>  Ceritificate of No Claim (for damaged vehicle    </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Formal Claim of Third Party against Insured    </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Driver's License of the owner of the vehicle for identity purposes     </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Original Copy of  Certificate of No Claim from their insurer    </li>
                                                        </ul>
                                                    </td>
                                                </tr>   
                                            </tbody>    
                                            <thead>
                                                <tr>
                                                    <th class="text-center" width="33%" style="font-family: muli;">
                                                        <strong>Documentary Requirements in case of Third Party Bodily Injury / Illness or Health/Death Claim   </strong>
                                                    </th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td rowspan="3" style="vertical-align: middle;">
                                                        <strong>Basic Documents:</strong>
                                                        <ul>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Formal Claim against COCOGE </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Original Copy of Official Receipt of medical expenses      </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Death certificate (for Death Claim)   </li>    
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Police Report / Affidavit of Loss    </li>      
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Birth Certificate (for Death Claim)   </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Hospital Bill/Statement of Account (if hospitalized)  
                                                        </ul>
                                                    </td>
                                                </tr>
                                            </tbody> 
                                            <tbody>
                                                <tr>
                                                    <td rowspan="3" style="vertical-align: middle;">
                                                        <strong>Optional Documents:</strong>
                                                        <ul>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Statement of Account (if hospitalized)     </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Copy of driver’s license (if due to vehicular accident) </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Doctor’s prescription      </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Admitting history & Physical Examination     </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Vital signs chart      </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Nurse’s daily progress notes     </li>
                                                        </ul>
                                                    </td>
                                                </tr>   
                                            </tbody>
                                            <tbody>
                                                <tr>
                                                    <td rowspan="3" style="vertical-align: middle;">
                                                        <strong>Additional Documents for Motor:  </strong>
                                                        <ul>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em>  Medical Certificate     </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Post Mortem Certificate    </li>
                                                        </ul>
                                                    </td>
                                                </tr>   
                                            </tbody>                                               
                                        </table>

                                        <br>
                                        <br>
                                        

                                        
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade bs-example-modal-lg" id="claim_fidelity" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog file-a-claim">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="file-a-claim-modalclose">
                        <span aria-hidden="true">×</span>
                    </button>
                    <div class="modal-content">
                        <div class="modal-body">
                            <style type="text/css">
                                <!
                                -- .file-a-claim .fa
                                {
                                    color: #53b947;
                                }
                                .file-a-claim .btn-green
                                {
                                    background: #53b947;
                                    border-radius: 40px;
                                    color: #fff;
                                    font-size: 15px;
                                    font-weight: 400;
                                    padding: 12px 32px;
                                    text-decoration: none;
                                    text-transform: uppercase;
                                    transition: all 0.3s ease-in-out;
                                    font-family: muli;
                                }
                                .file-a-claim .text-center
                                {
                                    text-align: center;
                                }
                                .file-a-claim ul, ol
                                {
                                    margin: 0 0 0 10px;
                                    padding: 10px 0 0 10px;
                                }
                                .file-a-claim .tbl
                                {
                                    background-color: white;
                                    padding: 30px;
                                }
                                /**/.file-a-claim .table-wrapper
                                {
                                    overflow-x: auto;
                                    overflow-y: auto;
                                }
                                .file-a-claim table
                                {
                                    color: #333;
                                    table-layout: fixed;
                                    word-break: break-word;
                                    width: 100%;
                                }
                                /**/.file-a-claim table
                                {
                                    color: #333;
                                    table-layout: fixed;
                                    word-break: break-word;
                                }
                                .file-a-claim table thead
                                {
                                    background-color: #00539f;
                                    color: white;
                                }
                                .file-a-claim li
                                {
                                    line-height: 1.7em;
                                }
                                .category-name h1
                                {
                                    color: #00539e;
                                    font: 900 23px 'Muli';
                                    margin-bottom: 0px;
                                    text-transform: uppercase;
                                    word-break: break-word;
                                    word-wrap: break-word;
                                }
                                /**/@media (max-width:768px)
                                {
                                    .modal-dialog.file-a-claim
                                    {
                                        width: 100%;
                                    }
                                    .file-a-claim table
                                    {
                                        width: 850px;
                                    }
                                }
                                /**/-- ></style>
                            <div class="row file-a-claim">
                                <center>
                                    <div class="category-name" style="background-color: #FFFFFF !important">
                                        <h1 style="font-family: arial;margin-bottom: 8px;">
                                            CLAIMS CHECKLIST FOR BONDS INSURANCE</h1>
                                    </div>
                                </center>
                                <div class="category-banner" style="font-family: arial; font-weight: normal;background-color: #FFFFFF !important">
                                    About to make a fidelity claim? We've listed all the documents you have to prepare
                                    for a faster, easier process.</div>
                                <div class="col-xs-12 text-center">
                                    <br>
                                    <a class="btn-green" href="{{ url('/pdfdocuments/ucpbpdf/fileaclaim/Claims Checklist - Bond.pdf') }}"
                                        target="_blank">download now</a>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="col-xs-12 col-md-10 col-md-offset-1 tbl">
                                        <div class="table-wrapper">
                                           

                                              <table class="table table-bordered" style="font-family: muli;text-align: left;">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" colspan="3" style="font-size: 14px;">
                                                        <strong>Documentary Requirements in case of Performance Bond Claims  </strong>
                                                    </th>
                                                </tr>
                                              
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="3">
                                                         <strong>Basic Documents for Obligee: </strong>
                                                        <ul>
                                                        <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Formal Statement of Claim to Surety with details and breakdown of claim </li>
                                                        <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> The name(s) of individuals and entities involved in the notification.</li>
                                                        <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Job titles of all individuals involved. </li>
                                                        <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> The date of first awareness by the insured of the circumstance or claim being notified </li>
                                                        <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Overview of the claim against the individual(s) and/or entity(ies) including – </li>
                                                            <ul>
                                                                 <li type="square">The factual background;</li>
                                                                 <li type="square">The allegations being made against the individual(s) and/or entity(ies);</li>
                                                                 <li type="square">The nature of action; </li>
                                                                 <li type="square">The nature and amount of redress sought by the claimant, including the amount of damages (if any) </li>
                                                            </ul>
                                                        <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> The names, addresses and contact details of any external law firm(s) engaged by individuals or the entity in relation to the Circumstances notified and who they will be representing. </li>  
                                                        <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> The names of the individual lawyers who will be invloved in the defense, and their proposed hourly rate.  </li> 
                                                        <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> A copy of the engagement letter once a law firm is engaged.   </li>  
                                                        </ul>
                                                    </td>
                                                   
                                                </tr>

                                                <tr>
                                                    <td colspan="3">
                                                        <strong>Additional Document/Information to be provided: </strong>
                                                        <ul>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Once expenses have been incurred, a breakdown should be provided to show that such expenses were part of the costs to defend  the Insured (e.g. Time charges should be broken down into the no. of hours a particular Lawyer has worked and the particulars of the case worked on).  Also, any expenses should be substantiated with an Official Receipt and any pertinent documents that directly relate such expenses to the case</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Merits of the case and litigation budget. </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Updates/developments on the case if any </li>
                                                        </ul>
                                                    </td>
                                                   
                                                </tr>
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade bs-example-modal-lg" id="claim_engineering" tabindex="-1"
                role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog file-a-claim">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="file-a-claim-modalclose">
                        <span aria-hidden="true">×</span>
                    </button>
                    <div class="modal-content">
                        <div class="modal-body">
                            <style type="text/css">
                                <!
                                -- .file-a-claim .fa
                                {
                                    color: #53b947;
                                }
                                .file-a-claim .btn-green
                                {
                                    background: #53b947;
                                    border-radius: 40px;
                                    color: #fff;
                                    font-size: 15px;
                                    font-weight: 400;
                                    padding: 12px 32px;
                                    text-decoration: none;
                                    text-transform: uppercase;
                                    transition: all 0.3s ease-in-out;
                                    font-family: muli;
                                }
                                .file-a-claim .text-center
                                {
                                    text-align: center;
                                }
                                .file-a-claim ul, ol
                                {
                                    margin: 0 0 0 10px;
                                    padding: 10px 0 0 10px;
                                }
                                .file-a-claim .tbl
                                {
                                    background-color: white;
                                    padding: 30px;
                                }
                                /**/.file-a-claim .table-wrapper
                                {
                                    overflow-x: auto;
                                    overflow-y: auto;
                                }
                                .file-a-claim table
                                {
                                    color: #333;
                                    table-layout: fixed;
                                    word-break: break-word;
                                    width: 100%;
                                }
                                /**/.file-a-claim table thead
                                {
                                    background-color: #00539f;
                                    color: white;
                                }
                                .file-a-claim li
                                {
                                    line-height: 1.7em;
                                }
                                .category-name h1
                                {
                                    color: #00539e;
                                    font: 900 23px 'Muli';
                                    margin-bottom: 0px;
                                    text-transform: uppercase;
                                    word-break: break-word;
                                    word-wrap: break-word;
                                }
                                /**/@media (max-width:768px)
                                {
                                    .modal-dialog.file-a-claim
                                    {
                                        width: 100%;
                                    }
                                    .file-a-claim table
                                    {
                                        width: 850px;
                                    }
                                }
                                /**/-- ></style>
                            <div class="row file-a-claim">
                                <center>
                                    <div class="category-name" style="background-color: #FFFFFF !important">
                                        <h1 style="font-family: arial;margin-bottom: 8px;">
                                            CLAIMS CHECKLIST FOR LIABILITY INSURANCE</h1>
                                    </div>
                                </center>
                                <div class="category-banner" style="font-family: arial; font-weight: normal;background-color: #FFFFFF !important">
                                    Process your engineering claim with ease by making sure you have the following documents
                                    ready.</div>
                                <div class="col-xs-12 text-center">
                                    <br>
                                    <a class="btn-green" href="{{ url('/pdfdocuments/ucpbpdf/fileaclaim/Claims Checklist - Liability.pdf') }}"
                                        target="_blank">download now</a>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="col-xs-12 col-md-10 col-md-offset-1 tbl">
                                        <div class="table-wrapper">
                                            
                                        <table class="table table-bordered" style="font-family: muli;text-align: left;">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" colspan="3" style="font-size: 14px;">
                                                        <strong>Documentary Requirements in case of Directors and Officers Liability / Errors and Omission </strong>
                                                    </th>
                                                </tr>
                                              
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="3">
                                                         <strong>Documentation/Information to be provided upon Notification:</strong><br>
                                                        <strong>Basic Documents:</strong>
                                                        <ul>
                                                        <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Copies of any relevant correspondence, pleading or other court documents.</li>
                                                        <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> The name(s) of individuals and entities involved in the notification.</li>
                                                        <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Job titles of all individuals involved. </li>
                                                        <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> The date of first awareness by the insured of the circumstance or claim being notified </li>
                                                        <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Overview of the claim against the individual(s) and/or entity(ies) including – </li>
                                                            <ul>
                                                                 <li type="square">The factual background;</li>
                                                                 <li type="square">The allegations being made against the individual(s) and/or entity(ies);</li>
                                                                 <li type="square">The nature of action; </li>
                                                                 <li type="square">The nature and amount of redress sought by the claimant, including the amount of damages (if any) </li>
                                                            </ul>
                                                        <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> The names, addresses and contact details of any external law firm(s) engaged by individuals or the entity in relation to the Circumstances notified and who they will be representing. </li>  
                                                        <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> The names of the individual lawyers who will be invloved in the defense, and their proposed hourly rate.  </li> 
                                                        <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> A copy of the engagement letter once a law firm is engaged.   </li>  
                                                        </ul>
                                                    </td>
                                                   
                                                </tr>

                                                <tr>
                                                    <td colspan="3">
                                                        <strong>Additional Document/Information to be provided: </strong>
                                                        <ul>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Once expenses have been incurred, a breakdown should be provided to show that such expenses were part of the costs to defend  the Insured (e.g. Time charges should be broken down into the no. of hours a particular Lawyer has worked and the particulars of the case worked on).  Also, any expenses should be substantiated with an Official Receipt and any pertinent documents that directly relate such expenses to the case</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Merits of the case and litigation budget. </li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Updates/developments on the case if any </li>
                                                        </ul>
                                                    </td>
                                                   
                                                </tr>
                                            </tbody>
                                        </table>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade bs-example-modal-lg" id="claim_casualty" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog file-a-claim">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="file-a-claim-modalclose">
                        <span aria-hidden="true">×</span>
                    </button>
                    <div class="modal-content">
                        <div class="modal-body">
                            <style type="text/css">
                                <!
                                -- .file-a-claim .fa
                                {
                                    color: #53b947;
                                }
                                .file-a-claim .btn-green
                                {
                                    background: #53b947;
                                    border-radius: 40px;
                                    color: #fff;
                                    font-size: 15px;
                                    font-weight: 400;
                                    padding: 12px 32px;
                                    text-decoration: none;
                                    text-transform: uppercase;
                                    transition: all 0.3s ease-in-out;
                                    font-family: muli;
                                }
                                .file-a-claim .text-center
                                {
                                    text-align: center;
                                }
                                .file-a-claim ul, ol
                                {
                                    margin: 0 0 0 10px;
                                    padding: 10px 0 0 10px;
                                }
                                .file-a-claim .tbl
                                {
                                    background-color: white;
                                    padding: 30px;
                                }
                                /**/.file-a-claim .table-wrapper
                                {
                                    overflow-x: auto;
                                    overflow-y: auto;
                                }
                                .file-a-claim table
                                {
                                    color: #333;
                                    table-layout: fixed;
                                    word-break: break-word;
                                    width: 100%;
                                }
                                /**/.file-a-claim table thead
                                {
                                    background-color: #00539f;
                                    color: white;
                                }
                                .file-a-claim li
                                {
                                    line-height: 1.7em;
                                }
                                .category-name h1
                                {
                                    color: #00539e;
                                    font: 900 23px 'Muli';
                                    margin-bottom: 0px;
                                    text-transform: uppercase;
                                    word-break: break-word;
                                    word-wrap: break-word;
                                }
                                /**/@media (max-width:768px)
                                {
                                    .modal-dialog.file-a-claim
                                    {
                                        width: 100%;
                                    }
                                    .file-a-claim table
                                    {
                                        width: 850px;
                                    }
                                }
                                /**/-- ></style>
                            <div class="row file-a-claim">
                                <center>
                                    <div class="category-name" style="background-color: #FFFFFF !important">
                                        <h1 style="font-family: arial;margin-bottom: 8px;">
                                           CLAIMS CHECKLIST FOR MISCELLANEOUS INSURANCE</h1>
                                    </div>
                                </center>
                                <div class="category-banner" style="font-family: arial; font-weight: normal;background-color: #FFFFFF !important">
                                    For other miscellaneous casualty claims processing, you can find all the required
                                    documents here.</div>
                                <div class="col-xs-12 text-center">
                                    <br>
                                    <a class="btn-green" href="{{ url('/pdfdocuments/ucpbpdf/Claims-Checklist_Miscellaneous-Casualty.pdf') }}"
                                        target="_blank" style="font-family: muli;">download now</a></div>
                                <br>
                                <br>
                                <br>
                                <br>
                                <div class="col-xs-12 col-md-10 col-md-offset-1 tbl">
                                    <div class="table-wrapper">
                                        <table class="table table-bordered" style="font-family: muli;">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" colspan="3" style="font-size: 14px;">
                                                        <strong>Documentary Requirements in case of Third Party Property Damage Claim</strong>
                                                    </th>
                                                </tr>
                                               
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="3">
                                                        <strong>Basic Documents:</strong>
                                                        <ul>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Formal Claim against COCOGEN</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Photographs of Damaged Units</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> DetailedEstimate</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Police Report / Affidavit of Loss</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Accomplished Sworn Statement of claim</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Accomplished Non Waiver Agreement</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Demand Letter of the Third party claimant</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Real Property Tax Declaration</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Supporting documents of the unit cost/ price per invoice</li>
                                                        </ul>
                                                    </td>
                                                   
                                                </tr>

                                                <tr>
                                                    <td colspan="3">
                                                        <strong>Additional Documents for Motor:</strong>
                                                        <ul>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Ceritificate of No Claim (for damaged vehicle)</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Formal Claim of Third Party against Insured</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> OR / CR of Motor Vehicles</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Driver's license of the owner of the vehicle for identity purposes</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Original copy of  Certificate of No Claim from their insurer</li>
                                                        </ul>
                                                    </td>
                                                   
                                                </tr>

                                                <tr>
                                                    <td colspan="3">
                                                        <strong>Optional Documents:</strong>
                                                        <ul>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Repair Invoice (if damage was alreadyrepaired)</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Floor Lay-out</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Copy of Lease</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Copy of Lease Contract</li>
                                                        </ul>
                                                    </td>
                                                   
                                                </tr>

                                               
                                            </tbody>
                                        </table>
                                        <table class="table table-bordered" style="font-family: muli;">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" colspan="3" style="font-size: 14px;">
                                                        <strong>Documentary Requirements in case of Bodily Injury / Illness or Health/Death Claim</strong>
                                                    </th>
                                                </tr>
                                               
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="3">
                                                        <strong>Basic Documents:</strong>
                                                        <ul>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Formal Claim against COCOGEN</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Original Copy of Official Receipt of medical expenses</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Original/ Certified True Copy of Death Certificate (for Death Claim)</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Police Report / Affidavit of Loss</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Birth Certificate (for Death Claim)</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Hospital Bill/Statement of Account(if hospitalized)</li>
                                                      
                                                        </ul>
                                                    </td>
                                                   
                                                </tr>

                                                <tr>
                                                    <td colspan="3">
                                                        <strong>Additional Documents:</strong>
                                                        <ul>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Medical Certificate</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Post Mortem Certificate</li>
                                                           
                                                        </ul>
                                                    </td>
                                                   
                                                </tr>

                                                <tr>
                                                    <td colspan="3">
                                                        <strong>Optional Documents:</strong>
                                                        <ul>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Statement of Account (if hospitalized)</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Copy of driver’s license (if due to vehicular accident)</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Doctor’s prescription</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Admitting history & Physical Examination</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Vital signs chart</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Nurse’s daily progress notes</li>
                                                        </ul>
                                                    </td>
                                                   
                                                </tr>

                                               
                                            </tbody>
                                        </table>
                                        <table class="table table-bordered" style="font-family: muli;">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" colspan="3" style="font-size: 14px;">
                                                        <strong>Documentary Requirements in case of Equipment Floater Claim / All Risks</strong>
                                                    </th>
                                                </tr>
                                               
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="3">
                                                        <strong>Basic Documents:</strong>
                                                        <ul>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Formal Claim against COCOGEN</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Police Report / Affidavit of Loss/ Incident Report</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Quotation / Repair Estimates</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Duly Signed Notarized Claim forms</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Forklift Operation and Safety Certification</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Technical Report</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> List of Damaged stocks</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Delivery Receipts</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Sales Invoice</li>
                                                      
                                                        </ul>
                                                    </td>
                                                   
                                                </tr>

                                                <tr>
                                                    <td colspan="3">
                                                        <strong>Additional Documents:</strong>
                                                        <ul>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Photographs</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Disconnection Notice</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Memorandum of Agreement</li>
                                                        </ul>
                                                    </td>
                                                   
                                                </tr>

                                             
                                            </tbody>
                                        </table>
                                        <table class="table table-bordered" style="font-family: muli;">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" colspan="3" style="font-size: 14px;">
                                                        <strong>Documentary Requirements in case of Burglary/ Robbery/ Hold-Up Claim</strong>
                                                    </th>
                                                </tr>
                                               
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="3">
                                                        <strong>Basic Documents:</strong>
                                                        <ul>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Formal Claim against COCOGEN</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Police Report / Affidavit of Loss</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Audit Report & Breakdown of Loss</li>
                                                        </ul>
                                                    </td>
                                                   
                                                </tr>

                                                <tr>
                                                    <td colspan="3">
                                                        <strong>Additional Documents:</strong>
                                                        <ul>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Repair Estimates /Repair invoice (if damage is alreadyrepaired)</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Photos of forcible entry</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Sales & Collection Repor</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Inventory Report / Book of Accounts</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Business Permits</li>
                                                           
                                                        </ul>
                                                    </td>
                                                   
                                                </tr>


                                               
                                            </tbody>
                                        </table>
                                        <table class="table table-bordered" style="font-family: muli;">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" colspan="3" style="font-size: 14px;">
                                                        <strong>Documentary Requirements in case of Misloading</strong>
                                                    </th>
                                                </tr>
                                               
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="3">
                                                        <strong>Basic Documents:</strong>
                                                        <ul>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Formal Claim against COCOGEN</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Police Report / Affidavit of Loss/Preliminary Loss Advise</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> OR/CR of Motor Vehicles</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Driver’s License</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Original copy of Misloading Receipt</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Original copy of Towing Receip</li>
                                                        </ul>
                                                    </td>
                                                   
                                                </tr>

                                            


                                               
                                            </tbody>
                                        </table>
                                        <table class="table table-bordered" style="font-family: muli;">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" colspan="3" style="font-size: 14px;">
                                                        <strong>Documentary Requirements in case of Fidelity Claim</strong>
                                                    </th>
                                                </tr>
                                               
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="3">
                                                        <strong>Basic Documents:</strong>
                                                        <ul>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Audit Report showing discovery date & breakdown of loss</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Documents in support of Audit Report such as official receipts, invoices, sales & collection reports</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> SSS / BIR / NBI / Personal Data Sheet (201 File) / Driver’s License No. of the Employee</li>
                                                        </ul>
                                                    </td>
                                                   
                                                </tr>

                                                <tr>
                                                    <td colspan="3">
                                                        <strong>Optional Documents:</strong>
                                                        <ul>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Company procedures as to duties of employees</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Action taken to recover loss such as filing of criminal case</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Duties and responsibilities of the involved employee</li>
                                                           
                                                        </ul>
                                                    </td>
                                                   
                                                </tr>


                                               
                                            </tbody>
                                        </table>
                                        <table class="table table-bordered" style="font-family: muli;">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" colspan="3" style="font-size: 14px;">
                                                        <strong>PERSONAL ACCIDENT CLAIM</strong>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th class="text-center" colspan="3" style="font-size: 14px;">
                                                        <strong>Documentary Requirements in case of Medical Expenses Reimbursement  </strong>
                                                    </th>
                                                </tr>
                                               
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="3">
                                                        <strong>Basic Documents:</strong>
                                                        <ul>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Formal Claim against COCOGEN</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Affidavit or incident report</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Medical Certificate</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Doctor’s Prescription of Medicines</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Original copy of official receipts of medicine purchase</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Statement of Accounts (if hospitalized)</li>
                                                        </ul>
                                                    </td>
                                                   
                                                </tr>

                                                <tr>
                                                    <td colspan="3">
                                                        <strong>Optional Documents:</strong>
                                                        <ul>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Copy of driver’s license (if due to vehicular accident)</li>
                                                            
                                                        </ul>
                                                    </td>
                                                   
                                                </tr>


                                               
                                            </tbody>
                                        </table>
                                        <table class="table table-bordered" style="font-family: muli;">
                                            <thead>
                                                
                                                <tr>
                                                    <th class="text-center" colspan="3" style="font-size: 14px;">
                                                        <strong>Documentary Requirements in case of Disability/ Death Claim</strong>
                                                    </th>
                                                </tr>
                                               
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="3">
                                                        <strong>Basic Documents:</strong>
                                                        <ul>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Formal Claim against COCOGEN</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Affidavit or incident report</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Original/CertifiedTrue Copy of Death Certificate</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Original/Certified True Copy of Birth Certificate</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Marriage Contract (if married)</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Post-Mortem Certificate (if necessary)</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Clinical Records (if necessary)</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Vital signs chart (if necessary)</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Medical Certificate (if applicable)</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Admitting history (if available)</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Photos of affected body part/s</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Copy of driver’s license(if due to MCY accident)</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Proof/police certification that the Insured was wearing helmet at the time of loss(loss due  to MCY)</li>
                                                        </ul>
                                                    </td>
                                                   
                                                </tr>

                                            </tbody>
                                        </table>
                                        <table class="table table-bordered" style="font-family: muli;">
                                            <thead>
                                                
                                                <tr>
                                                    <th class="text-center" colspan="3" style="font-size: 14px;">
                                                        <strong>Documentary Requirements in case of Educational Assistance Claim</strong>
                                                    </th>
                                                </tr>
                                               
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="3">
                                                        <strong>Basic Documents:</strong>
                                                        <ul>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Certificate of enrollment from the school attended</li>
                                                           
                                                        </ul>
                                                    </td>
                                                   
                                                </tr>

                                            </tbody>
                                        </table>
                                        <table class="table table-bordered" style="font-family: muli;">
                                            <thead>
                                                
                                                <tr>
                                                    <th class="text-center" colspan="3" style="font-size: 14px;">
                                                        <strong>Documentary Requirements in case of Fire Assistance Benefit Claim</strong>
                                                    </th>
                                                </tr>
                                               
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="3">
                                                        <strong>Basic Documents:</strong>
                                                        <ul>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Formal Claim against COCOGEN</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Bureau of Fire Protection Certification</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Barangay Certificate that insured is a fire victim</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Photos of the Fire Incident</li>
                                                            <li><em class="fa fa-check-square-o fa-lg" style="color: green"></em> Valid ID’s with signature</li>
                                                           
                                                        </ul>
                                                    </td>
                                                   
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>

                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
               <div class="page-title category-title">
                <h1>
                    File a Claim</h1>
            </div>
            <script type="text/javascript">
                jQuery(document).ready(function() {
                    //set href for 6 file claims
                    var voidurl = "javascript:void(0)";
                    jQuery('.row > .col-md-4.col-sm-6.col-xs-12:nth-child(1) > .effect-ruby > .widget-static-block > .effect-ruby-caption > a').prop("href", voidurl);
                    jQuery('.row > .col-md-4.col-sm-6.col-xs-12:nth-child(1) > .effect-ruby > .widget-static-block > .effect-ruby-caption > a').attr("modal-name", "claim_motor");

                    jQuery('.row > .col-md-4.col-sm-6.col-xs-12:nth-child(2) > .effect-ruby > .widget-static-block > .effect-ruby-caption > a').prop("href", voidurl);
                    jQuery('.row > .col-md-4.col-sm-6.col-xs-12:nth-child(2) > .effect-ruby > .widget-static-block > .effect-ruby-caption > a').attr("modal-name", "claim_fire");

                    jQuery('.row > .col-md-4.col-sm-6.col-xs-12:nth-child(3) > .effect-ruby > .widget-static-block > .effect-ruby-caption > a').prop("href", voidurl);
                    jQuery('.row > .col-md-4.col-sm-6.col-xs-12:nth-child(3) > .effect-ruby > .widget-static-block > .effect-ruby-caption > a').attr("modal-name", "claim_marine");

                    jQuery('.row > .col-md-4.col-sm-6.col-xs-12:nth-child(4) > .effect-ruby > .widget-static-block > .effect-ruby-caption > a').prop("href", voidurl);
                    jQuery('.row > .col-md-4.col-sm-6.col-xs-12:nth-child(4) > .effect-ruby > .widget-static-block > .effect-ruby-caption > a').attr("modal-name", "claim_fidelity");

                    jQuery('.row > .col-md-4.col-sm-6.col-xs-12:nth-child(5) > .effect-ruby > .widget-static-block > .effect-ruby-caption > a').prop("href", voidurl);
                    jQuery('.row > .col-md-4.col-sm-6.col-xs-12:nth-child(5) > .effect-ruby > .widget-static-block > .effect-ruby-caption > a').attr("modal-name", "claim_engineering");

                    jQuery('.row > .col-md-4.col-sm-6.col-xs-12:nth-child(6) > .effect-ruby > .widget-static-block > .effect-ruby-caption > a').prop("href", voidurl);
                    jQuery('.row > .col-md-4.col-sm-6.col-xs-12:nth-child(6) > .effect-ruby > .widget-static-block > .effect-ruby-caption > a').attr("modal-name", "claim_casualty");

                    jQuery('.col-md-4.col-sm-6.col-xs-12 > .effect-ruby > .widget-static-block > .effect-ruby-caption > a').click(function() {
                        var modalid = jQuery(this).attr("modal-name");
                        jQuery("#" + modalid).modal({ show: true });
                    });


                });

            </script>
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="effect-ruby">
                        <div class="widget widget-static-block">
                            <p>
                                <img alt="Gawa Agad Motor Car Claims" src="{{ URL::to('/') }}/images/fileclaim/1.jpg"></p>
                            <div class="effect-ruby-caption">
                                <h2>
                                    Motor</h2>
                               <!--  <p>
                                    COCOGEN policyholders have exclusive access to Gawa Agad, an innovative claims program designed to improve claims processing time by allowing our clients to go directly to our accredited repair shops and coordinate requirements needed.</p> -->
                                <a href="javascript:void(0)" modal-name="claim_motor">Learn more</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="effect-ruby">
                        <div class="widget widget-static-block">
                            <p>
                                <img alt="Fire and Allied Perils" src="{{ URL::to('/') }}/images/fileclaim/2.jpg" ></p>
                            <div class="effect-ruby-caption">
                                <h2>
                                    Fire</h2>
                               <!--  <p>
                                    Use this checklist to file a claim against any of the following COCOGEN Insurance policies: Fire, Home Excel Plus, Condo Excel Plus and ProBiz Excel Plus.</p> -->
                                <a href="javascript:void(0)" modal-name="claim_fire">Learn more</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="effect-ruby">
                        <div class="widget widget-static-block">
                            <p>
                                <img alt="Marine" src="{{ URL::to('/') }}/images/fileclaim/3.jpg" ></p>
                            <div class="effect-ruby-caption">
                                <h2>
                                    Marine and Engineering</h2>
                             <!--    <p>
                                    Speed up your marine insurance claims processing by having the following documents
                                    ready.</p> -->
                                <a href="javascript:void(0)" modal-name="claim_marine">Learn more</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="effect-ruby">
                        <div class="widget widget-static-block">
                            <p>
                                <img alt="Fidelity" src="{{ URL::to('/') }}/images/fileclaim/4.jpg" ></p>
                            <div class="effect-ruby-caption">
                                <h2>
                                    Bonds</h2>
                                <!-- <p>
                                    About to make a bonds claim? We've listed all the documents you have to prepare
                                    for a faster, easier process.</p> -->
                                <a href="javascript:void(0)" modal-name="claim_fidelity">Learn more</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="effect-ruby">
                        <div class="widget widget-static-block">
                            <p>
                                <img alt="engineering" src="{{ URL::to('/') }}/images/fileclaim/5.jpg"></p>
                            <div class="effect-ruby-caption">
                                <h2>
                                    Liability</h2>
                                <!-- <p>
                                     About to make a liability claim? We've listed all the documents you have to prepare for a faster, easier process.</p> -->
                                <a href="javascript:void(0)" modal-name="claim_engineering">Learn more</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="effect-ruby">
                        <div class="widget widget-static-block">
                            <p>
                                <img alt="Miscellaneous Casualty" src="{{ URL::to('/') }}/images/fileclaim/6.jpg"></p>
                            <div class="effect-ruby-caption">
                                <h2>
                                    Miscellaneous Casualty</h2>
                               <!--  <p>
                                    For other miscellaneous casualty claims processing, you can find all the required
                                    documents here.</p> -->
                                <a href="javascript:void(0)" modal-name="claim_casualty">Learn more</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
