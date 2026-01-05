<!DOCTYPE html>
<html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" lang="en">

<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"><!--[if mso]>
<xml><w:WordDocument xmlns:w="urn:schemas-microsoft-com:office:word"><w:DontUseAdvancedTypographyReadingMail/></w:WordDocument>
<o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml>
<![endif]--><!--[if !mso]><!--><!--<![endif]-->
	<style>
		* {
			box-sizing: border-box;
		}

		body {
			margin: 0;
			padding: 0;
            width: 100%;
		}

         .page_break {
        page-break-after: always;
        }
		.alternate-rows tr:nth-child(odd) {
    background-color: #ffffff; 
  }

  .alternate-rows tr:nth-child(even) {
    background-color: #f9f9f9f9; /
  }

  .alternate-rows td {
    padding: 4px 10px;
    border: 1px solid #ffffff;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 12px;
  }
	</style>
</head>

<body class="body">

	<table class="nl-container" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style=" background-color: #FFFFFF;">

		<tbody>

			<tr>
				<td>
                        <header style="width: 100%; margin:0px; position: fixed; top: -45px; left: -50px; right: 0px; " id="header">
        <img src="./images/Fw _Renewal_Notice_Image/Letterhead Header.png" style="width: 115%;height: 100px;">
    </header>

					<table class="row row-1" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style=" margin-top: 70px;">

						<tbody>
							<tr>
								<td>
									<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style=" border-radius: 0; color: #000000; width: 650px; margin: 0 auto;" width="650">
										<tbody>
											<tr>
												<td class="column column-1" width="100%" style=" font-weight: 400; text-align: left; vertical-align: top;">
													<table class="paragraph_block block-1" width="100%" border="0" cellpadding="10" cellspacing="0" role="presentation" style=" word-break: break-word;">
														<tr>
															<td >
																<div style="color:#444a5b;direction:ltr;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;font-size:12px;font-weight:400;letter-spacing:0px;line-height:1.2;text-align:left;mso-line-height-alt:14px;">
																	<p style="margin: 0;">
																	{{ isset($formData['created_at']) 
																		? \Carbon\Carbon::parse($formData['created_at'])->format('F d, Y') 
																		: '' }}
																</p>

																</div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table class="row row-2" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="">
						<tbody>
							<tr>
								<td>
									<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style=" color: #000000; width: 650px; margin: 0 auto;" width="650">
										<tbody>
											<tr>
												<td class="column column-1" width="100%" style=" font-weight: 400; text-align: left; vertical-align: top;">
													<table class="paragraph_block block-1" width="100%" border="0" cellpadding="10" cellspacing="0" role="presentation" style=" word-break: break-word;">
														<tr>
															<td >
																<div style="color:#444a5b;direction:ltr;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;font-size:12px;font-weight:400;letter-spacing:0px;line-height:1.2;text-align:left;mso-line-height-alt:14px;">
																	<p style="margin:0;">{{ strtoupper($formData['first_name'] . ' ' . $formData['last_name'] . ' ' . $formData['suffix']) }}</p>
																</div>
															</td>
														</tr>
													</table>
													<table class="paragraph_block block-2" width="100%" border="0" cellpadding="10" cellspacing="0" role="presentation" style=" word-break: break-word;">
														<tr>
															<td >
																<div style="color:#444a5b;direction:ltr;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;font-size:12px;font-weight:400;letter-spacing:0px;line-height:1.2;text-align:left;mso-line-height-alt:14px;">
																	<p style="margin:0;">
																	{{ $formData['street'] }}, 
																	{{ $formData['barangay'] }}, 
																	{{ $formData['city'] }}, 
																	{{ $formData['province'] }}, 
																	{{ $formData['region'] }}
																</p>
																</div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table class="row row-3" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="">
						<tbody>
							<tr>
								<td>
									<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style=" border-radius: 0; color: #000000; width: 650px; margin: 0 auto;" width="650">
										<tbody>
											<tr>
												<td class="column column-1" width="100%" style=" font-weight: 400; text-align: left; vertical-align: top;">
													<table class="paragraph_block block-1" width="100%" border="0" cellpadding="10" cellspacing="0" role="presentation" style=" word-break: break-word;">
														<tr>
															<td >
																<div style="color:#444a5b;direction:ltr;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;font-size:12px;font-weight:400;letter-spacing:0px;line-height:1.2;text-align:left;mso-line-height-alt:14px;">
																	<p style="margin: 0;">Dear Mr./Ms. {{$formData['last_name']}}:</p>
																</div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table class="row row-4" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="">
						<tbody>
							<tr>
								<td>
									<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style=" border-radius: 0; color: #000000; width: 650px; margin: 0 auto;" width="650">
										<tbody>
											<tr>
												<td class="column column-1" width="100%" style=" font-weight: 400; text-align: left; vertical-align: top;">
													<table class="paragraph_block block-1" width="100%" border="0" cellpadding="10" cellspacing="0" role="presentation" style=" word-break: break-word;">
														<tr>
															<td >
																<div style="color:#444a5b;direction:ltr;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;font-size:12px;font-weight:400;letter-spacing:0px;line-height:1.2;text-align:left;mso-line-height-alt:14px;">
																	<p style="margin: 0;"> 

Thank you for the opportunity to quote on your Condominium Unit Insurance requirement. We are pleased to submit our Condo Excel Plus proposal with details as follows: </p>
																</div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
                    <table class="table_block block-2" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-radius: 0; color: #000000; width: 650px; margin: 0 auto;">
														<tr>
															<td >
																<table style=" border-collapse: collapse; width: 100%; table-layout: fixed; direction: ltr; background-color: #f2f2f2; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-weight: 400; color: #000000; text-align: left; letter-spacing: 0px;" width="100%">
																	<tbody style="vertical-align: top; font-size: 12px; line-height: 1.2; mso-line-height-alt: 14px;">
																		<tr style="background-color: #f2f2f2;">
																			<td width="25%" style="vertical-align: top; padding: 2px; padding-left: 10px; word-break: break-word; border-top: 1px solid #ffffff; border-right: 1px solid #ffffff; border-bottom: 1px solid #ffffff; border-left: 1px solid #ffffff;">Location of Risk</td>
																			<td width="75%" style="vertical-align: top; padding: 2px; padding-left: 10px; word-break: break-word; border-top: 1px solid #ffffff; border-right: 1px solid #ffffff; border-bottom: 1px solid #ffffff; border-left: 1px solid #ffffff;">{{ $formData['street'] }}, 
																			{{ $formData['barangay'] }}, 
																			{{ $formData['city'] }}, 
																			{{ $formData['province'] }}, 
																			{{ $formData['region'] }}</td>
																		</tr>
																	</tbody>
																</table>
															</td>
														</tr>
													</table>
                    <table class="table_block block-2" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-radius: 0; color: #000000; width: 650px; margin: 0 auto;">
														<tr>
															<td >
																<table style=" border-collapse: collapse; width: 100%; table-layout: fixed; direction: ltr; background-color: #ffffff; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-weight: 400; color: #000000; text-align: left; letter-spacing: 0px;" width="100%">
																	<tbody style="vertical-align: top; font-size: 12px; line-height: 1.2; mso-line-height-alt: 14px;">
																		<tr>
																			<td width="25%" style="vertical-align: top; padding: 2px; padding-left: 10px; word-break: break-word; border-top: 1px solid #ffffff; border-right: 1px solid #ffffff; border-bottom: 1px solid #ffffff; border-left: 1px solid #ffffff;">Sum Insured </td>
																			<td width="75%" style="vertical-align: top; padding: 2px; padding-left: 10px; word-break: break-word; border-top: 1px solid #ffffff; border-right: 1px solid #ffffff; border-bottom: 1px solid #ffffff; border-left: 1px solid #ffffff;">{{$formData['total_premium_amount']}}</td>

																		</tr>
																	</tbody>
																</table>
															</td>
														</tr>
													</table>
													<table class="table_block block-2" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-radius: 0; color: #000000; width: 650px; margin: 0 auto;">
														<tr style="background-color: #f2f2f2;">
															<td >
																<table style=" border-collapse: collapse; width: 100%; table-layout: fixed; direction: ltr; background-color: #ffffff; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-weight: 400; color: #000000; text-align: left; letter-spacing: 0px;" width="100%">
																	<tbody style="vertical-align: top; font-size: 12px; line-height: 1.2; mso-line-height-alt: 14px;">
																		<tr style="background-color: #f2f2f2;">
																			<td width="25%" style="vertical-align: top; padding: 2px; padding-left: 10px; word-break: break-word; border-top: 1px solid #ffffff; border-right: 1px solid #ffffff; border-bottom: 1px solid #ffffff; border-left: 1px solid #ffffff;">Term of Insurance</td>
																			<td width="75%" style="vertical-align: top; padding: 2px; padding-left: 10px; word-break: break-word; border-top: 1px solid #ffffff; border-right: 1px solid #ffffff; border-bottom: 1px solid #ffffff; border-left: 1px solid #ffffff;">One (1) year</td>

																		</tr>
																	</tbody>
																</table>
															</td>
														</tr>
													</table>
					<table class="row row-6" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="">
						<tbody>
							<tr>
								<td>
									<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style=" border-radius: 0; color: #000000; width: 650px; margin: 0 auto;" width="650">
										<tbody>
										<tr>
											<td class="column column-1" width="100%" style="font-weight: 400; text-align: left; padding: 5px; vertical-align: top;">
												@php
													$optionalBenefits = is_string($formData['optional_benefits'] ?? null)
														? json_decode($formData['optional_benefits'], true)
														: ($formData['optional_benefits'] ?? []);

													$extensionCovers = is_string($formData['extension_covers'] ?? null)
														? json_decode($formData['extension_covers'], true)
														: ($formData['extension_covers'] ?? []);

													$hasPerils = isset($formData['perils_amount']) && floatval($formData['perils_amount']) > 0;
													$condoUnit = floatval($formData['condo_unit'] ?? 0);
													$declaredValue = floatval($formData['declared_value'] ?? 0);
												@endphp

												<table style=" border-collapse: collapse; width: 100%; table-layout: fixed; direction: ltr; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-weight: 400; color: #000000; text-align: left; letter-spacing: 0px;" width="100%">
																	<tbody style="vertical-align: top; font-size: 12px; line-height: 1.2; mso-line-height-alt: 14px;">
													<thead style="background-color: #065493; color: #ffffff; font-size: 12px; font-weight: 400;">
														<tr>
															<th width="50%" style="padding: 10px; border: 1px solid #ffffff; text-align: center;">COVERAGE</th>
															<th width="25%" style="padding: 10px; border: 1px solid #ffffff; text-align: center;">STANDARD LIMIT</th>
															<th width="25%" style="padding: 10px; border: 1px solid #ffffff; text-align: center;">AMOUNT</th>
														</tr>
													</thead>


													<tbody style="font-size: 12px; line-height: 1.3; vertical-align: top;">

														{{--  BASIC COVERAGE --}}
														<tr style="background-color:#d9e2f3;">
															<td colspan="3" style="padding: 5px 10px; background-color:#d9e2f3; color:#000000;">
																Basic Coverage
															</td>
														</tr>

														@if($condoUnit == 0 && $declaredValue > 0)
															{{-- With declared value --}}
															<tr style="background-color:#F9F9F9;">
																<td style="padding: 5px 10px; border: 1px solid #ffffff;">Condominium Unit and Improvements</td>
																<td style="padding: 5px 10px; border: 1px solid #ffffff;"> </td>
																<td style="padding: 5px 10px; border: 1px solid #ffffff; text-align: right;"> {{ number_format($formData['covered_amount'] ?? 0, 2) }}</td>
															</tr>
														@elseif($declaredValue == 0)
															{{-- Without declared value --}}
															<tr style="background-color:#F9F9F9;">
																			<td style="padding: 5px 10px; border: 1px solid #ffffff;">Condominium Unit</td>
																<td style="padding: 5px 10px; border: 1px solid #ffffff; text-align: right;"> 2,000,000</td>
																<td style="padding: 5px 10px; border: 1px solid #ffffff; text-align: right; background-color:#F2F2F2;"> </td>
															 <tr style="background-color:#F2F2F2;">
																			<td style="padding: 5px 10px; border: 1px solid #ffffff;">Condominium Unit Improvements</td>
																<td style="padding: 5px 10px; border: 1px solid #ffffff; text-align: right;">500,000</td>
																<td style="padding: 5px 10px; border: 1px solid #ffffff; text-align: right; background-color:#F2F2F2;"> {{ number_format($formData['condo_unit'] ?? 0, 2) }}</td>
															</tr>
															<tr style="background-color:#F9F9F9;">
																			<td colspan="2" style="padding: 3px 8px; font-style: italic; border: 1px solid #ffffff;">
																	Standard Perils Covered: Fire and Lightning, Extended Coverage, Civil Commotion, Riot, Strike and
																	Malicious Damage, Broad Water Damage, Burglary and Robbery
																</td>
																<td style="padding: 5px 10px; border: 1px solid #ffffff; text-align: right; background-color:#F2F2F2;"> </td>
																
															</tr>
														@endif

														{{--  OPTIONAL ADDITIONAL PERILS --}}
														<tr style="background-color:#d9e2f3;">
															<td colspan="3" style="padding: 5px 10px; background-color:#d9e2f3; color:#000000;">Optional Additional Perils</td>
														</tr>
														<tr style="background-color:#F9F9F9;">
																<td style="padding: 5px 10px; border: 1px solid #ffffff;">
																Earthquake, Typhoon, Hurricane, Tornado, Cyclone, or Other Atmospheric Disturbance, Flood, Tsunami or Storm Surge, Volcanic Eruption
															</td>
															<td style="padding: 2px; border: 1px solid #ffffff; "> </td>
															<td style="padding: 2px; border: 1px solid #ffffff; text-align: right;"> {{ number_format($formData['perils_amount'] ?? 0, 2) }}</td>
														</tr>

														{{--  OPTIONAL BENEFITS --}}
														@if(!empty($optionalBenefits))
															<tr style="background-color:#d9e2f3;">
															<td colspan="3" style="padding: 2px; background-color:#d9e2f3; color:#000000;">
																	Optional Properties to be Covered (may be increased up to three times the Standard Limit)
																</td>
															</tr>
															@foreach ($optionalBenefits as $index => $item)
																@php $bg = $index % 2 == 0 ? '#F9F9F9' : '#F2F2F2'; @endphp
																<tr style="background-color: {{ $bg }};">
																	<td style="padding: 2px; border: 1px solid #ffffff;">{{ $item['name'] ?? '' }}</td>
																	<td style="padding: 2px; border: 1px solid #ffffff; text-align: right;">{{ $item['coverage'] ?? '' }}</td>
																	<td style="padding: 2px; border: 1px solid #ffffff; text-align: right;"> {{ number_format($item['value'] ?? 0, 2) }}</td>
																</tr>
															@endforeach
														@endif

														{{--  EXTENSION COVERS --}}
														@if(!empty($extensionCovers))
															<tr style="background-color:#d9e2f3;">
															<td colspan="3" style="padding: 2px; background-color:#d9e2f3; color:#000000;">
																	Optional Extensions of Cover (may be increased up to three times the Standard Limit)
																</td>
															</tr>
															@foreach ($extensionCovers as $index => $item)
																@php $bg = $index % 2 == 0 ? '#F9F9F9' : '#F2F2F2'; @endphp

																@if(isset($item['name']) && $item['name'] === 'Kasambahay Cover')
																<tr style="background-color: {{ $bg }};">
																	<td width="25%" style="padding: 2px; border: 1px solid #ffffff; font-weight: bold;">
																	{{ $item['name'] }}
																	</td>
																	<td width="25%" style="padding: 2px; border: 1px solid #ffffff;"></td>
																	<td width="25%" style="padding: 2px; border: 1px solid #ffffff;"></td>
																</tr>

																{{-- Property Damage --}}
																<tr style="background-color: {{ $bg }};">
																	<td width="25%" style="padding: 5px 20px; border: 1px solid #ffffff;">Property Damage</td>
																	<td width="25%" style="padding: 2px; border: 1px solid #ffffff; text-align: right;">
																	 {{ number_format(floatval(str_replace(',', '', $item['propertyCoverage'] ?? 0)), 2) }}
																	</td>
																	<td width="25%" style="padding: 2px; border: 1px solid #ffffff; text-align: right;">
																	 {{ number_format(floatval(str_replace(',', '', $item['propertyValue'] ?? 0)), 2) }}
																	</td>
																</tr>

																{{-- Personal Accident --}}
																<tr style="background-color: {{ $bg }};">
																	<td width="25%" style="padding: 5px 20px; border: 1px solid #ffffff;">Personal Accident</td>
																	<td width="25%" style="padding: 2px; border: 1px solid #ffffff; text-align: right;">
																	 {{ number_format(floatval(str_replace(',', '', $item['accidentCoverage'] ?? 0)), 2) }}
																	</td>
																	<td width="25%" style="padding: 2px; border: 1px solid #ffffff; text-align: right;">
																	 {{ number_format(floatval(str_replace(',', '', $item['accidentValue'] ?? 0)), 2) }}
																	</td>
																</tr>
															@else
																<tr style="background-color: {{ $bg }};">
																	<td style="padding: 2px; border: 1px solid #ffffff;">{{ $item['name'] ?? '' }}</td>
																	<td style="padding: 2px; border: 1px solid #ffffff; text-align: right;">{{ $item['coverage'] ?? '' }}</td>
																	<td style="padding: 2px; border: 1px solid #ffffff; text-align: right;"> {{ number_format($item['value'] ?? 0, 2) }}</td>
																</tr>
															@endif
														@endforeach
														@endif

													</tbody>
												</table>
											</td>
										</tr>
										</tbody>

									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table class="row row-7" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="">
						<tbody>
							<tr>
								<td>
									<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style=" border-radius: 0; color: #000000; width: 650px; margin: 0 auto;" width="650">
										<tbody>
											<tr>
												<td class="column column-1" width="100%" style=" font-weight: 400; text-align: left; padding-left: 5px; padding-right: 5px; padding-top: 5px; vertical-align: top;">
													<table class="table_block block-1" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="">
														<tr>
															<td >
																<table style=" border-collapse: collapse; width: 100%; table-layout: fixed; direction: ltr; background-color: #fff2cc; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-weight: 400; color: #000000; text-align: left; letter-spacing: 0px;" width="100%">
																	<tbody style="vertical-align: top; font-size: 12px; line-height: 1.2; mso-line-height-alt: 14px;">
																	<tr>
																		<td width="50%" style="padding: 5px 10px; border: 1px solid #ffffff;">Net Premium</td>
																		<td width="50%" style="padding: 5px 10px; border: 1px solid #ffffff; text-align: right;">PHP {{ number_format($formData['total_premium_amount'] ?? 0, 2) }}</td>
																	</tr>
																	<tr>
																		<td width="50%" style="padding: 5px 10px; border: 1px solid #ffffff;">Fire Service Tax</td>
																		<td width="50%" style="padding: 5px 10px; border: 1px solid #ffffff; text-align: right;">{{ number_format($formData['fire_tax'] ?? 0, 2) }}</td>
																	</tr>
																	<tr>
																		<td width="50%" style="padding: 5px 10px; border: 1px solid #ffffff;">Documentary Stamps Tax</td>
																		<td width="50%" style="padding: 5px 10px; border: 1px solid #ffffff; text-align: right;"> {{ number_format($formData['dst'] ?? 0, 2) }}</td>
																	</tr>
																	<tr>
																		<td width="50%" style="padding: 5px 10px; border: 1px solid #ffffff;">Local Government Tax</td>
																		<td width="50%" style="padding: 5px 10px; border: 1px solid #ffffff; text-align: right;"> {{ number_format($formData['lgt'] ?? 0, 2) }}</td>
																	</tr>
																	<tr>
																		<td width="50%" style="padding: 5px 10px; border: 1px solid #ffffff;">VAT</td>
																		<td width="50%" style="padding: 5px 10px; border: 1px solid #ffffff; text-align: right;">{{ number_format($formData['vat'] ?? 0, 2) }}</td>
																	</tr>
																	<tr style="background-color:#f2f2f2;">
																		<td width="50%" style="padding: 5px 10px; border: 1px solid #ffffff; font-weight: bold;">TOTAL PREMIUM</td>
																		<td width="50%" style="padding: 5px 10px; border: 1px solid #ffffff; font-weight: bold; text-align: right;">
																			PHP {{ number_format($formData['gross_premium'] ?? 0, 2) }}
																		</td>
																	</tr>
																</tbody>

																</table>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table class="row row-8" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="">
						<tbody>
							<tr>
								<td>
									<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style=" border-radius: 0; color: #000000; width: 650px; margin: 0 auto;" width="650">
										<tbody>
											<tr>
												<td class="column column-1" width="41.666666666666664%" style=" font-weight: 400; text-align: left; padding-bottom: 0px; padding-top: 0px; vertical-align: top;">
													<table class="paragraph_block block-1" width="100%" border="0" cellpadding="10" cellspacing="0" role="presentation" style=" word-break: break-word;">
														<tr>
															<td >
																<div style="color:#444a5b;direction:ltr;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;font-size:12px;font-weight:400;letter-spacing:0px;line-height:1.2;text-align:left;mso-line-height-alt:14px;">
																	<p style="margin: 0;"><strong>Deductible/ Participation Fee </strong></p>
																</div>
															</td>
														</tr>
													</table>
												</td>
												<td class="column column-2" width="58.333333333333336%" style=" font-weight: 400; text-align: left; padding-bottom: 0px; padding-top: 0px; vertical-align: top;">
													<table class="paragraph_block block-1" width="100%" border="0" cellpadding="10" cellspacing="0" role="presentation" style=" word-break: break-word;">
														<tr>
															<td >
																<div style="color:#444a5b;direction:ltr;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;font-size:12px;font-weight:400;letter-spacing:0px;line-height:1.2;text-align:left;mso-line-height-alt:14px;">
																	<p style="margin: 0;">{{ number_format($formData['perils_amount'], 2) }}</p>
																</div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table class="row row-10" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="">
						<tbody>
							<tr>
								<td>
									<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style=" border-radius: 0; color: #000000; width: 650px; margin: 0 auto;" width="650">
										<tbody>
											<tr>
												<td class="column column-1" width="41.666666666666664%" style=" font-weight: 400; text-align: left; padding-bottom: 5px; padding-top: 5px; vertical-align: top;">
													<table class="paragraph_block block-1" width="100%" border="0" cellpadding="10" cellspacing="0" role="presentation" style=" word-break: break-word;">
														<tr>
															<td >
																<div style="color:#444a5b;direction:ltr;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;font-size:12px;font-weight:400;letter-spacing:0px;line-height:1.2;text-align:left;mso-line-height-alt:14px;">
																	<p style="margin: 0;"><strong>Subjectivities</strong></p>
																</div>
															</td>
														</tr>
													</table>
												</td>
												<td class="column column-2" width="58.333333333333336%" style=" font-weight: 400; text-align: left; padding-bottom: 5px; padding-top: 5px; vertical-align: top;">
													<table class="paragraph_block block-1" width="100%" border="0" cellpadding="10" cellspacing="0" role="presentation" style=" word-break: break-word;">
														<tr>
															<td >
																<div style="color:#444a5b;direction:ltr;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;font-size:12px;font-weight:400;letter-spacing:0px;line-height:1.2;text-align:left;mso-line-height-alt:14px;">
																	<p style="margin: 0;"></p>
																	<p style="margin: 0;">Standard COCOGEN policy terms and conditions</p>
																</div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
										<table class="row row-8" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="">
						<tbody>
							<tr>
								<td>
									<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style=" border-radius: 0; color: #000000; width: 650px; margin: 0 auto;" width="650">
										<tbody>
											<tr>
												<td class="column column-1" width="41.666666666666664%" style=" font-weight: 400; text-align: left; padding-bottom: 0px; padding-top: 0px; vertical-align: top;">
													<table class="paragraph_block block-1" width="100%" border="0" cellpadding="10" cellspacing="0" role="presentation" style=" word-break: break-word;">
														<tr>
															<td >
																<div style="color:#444a5b;direction:ltr;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;font-size:12px;font-weight:400;letter-spacing:0px;line-height:1.2;text-align:left;mso-line-height-alt:14px;">
																	<p style="margin: 0;"><strong>CONTACT PERSON</strong></p>
																</div>
															</td>
														</tr>
													</table>
												</td>
												<td class="column column-2" width="58.333333333333336%" style=" font-weight: 400; text-align: left; padding-bottom: 0px; padding-top: 0px; vertical-align: top;">
													<table class="paragraph_block block-1" width="100%" border="0" cellpadding="10" cellspacing="0" role="presentation" style=" word-break: break-word;">
														<tr>
															<td >
																<div style="color:#444a5b;direction:ltr;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;font-size:12px;font-weight:400;letter-spacing:0px;line-height:1.2;text-align:left;mso-line-height-alt:14px;">
																	<p style="margin: 0;">C/O COSTUMER SERVICE</p>
																</div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
                    <footer style="width: 100%;  position: fixed; bottom: -45px; height: 50px; left: -50px; right: 0px;" id="footer">
         <img src="./images/Fw _Renewal_Notice_Image/Letterhead - Footer.png" style="width: 120%;height: 50px;">
    </footer>
                     <!-- <footer style="width: 100%;  position: fixed; bottom: -45px; height: 50px; left: -50px; right: 0px;" id="footer">
         <img src="./images/Fw _Renewal_Notice_Image/Letterhead - Footer.png" style="width: 120%;height: 50px;">
    </footer> -->
					<table class="row row-25" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="">
						<tbody>
							<tr>
								<td>
									<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style=" border-radius: 0; color: #000000; width: 650px; margin: 0 auto;" width="650">
										<tbody>
											<tr>
												<td class="column column-1" width="100%" style=" font-weight: 400; text-align: left; padding-bottom: 0px; padding-top: 0px; vertical-align: top;">
													<table class="paragraph_block block-1" width="100%" border="0" cellpadding="10" cellspacing="0" role="presentation" style=" word-break: break-word;">
														<tr>
															<td style="padding-bottom: 0px;">
																<div style="color:#000000;direction:ltr;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;font-size:12px;font-weight:400;letter-spacing:0px;line-height:1.2;text-align:left;mso-line-height-alt:14px;">
																	<p style="margin: 0;">COCOGEN Policyholders can easily access the electronic copy of the policy documents and update account information with us through the COCOGEN <a href="https://www.cocogen.com/epolicy/login" style="text-decoration: underline; color: #7747ff;"><strong>ePolicyhub</strong></a> platform.</p>
																</div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>


				</td>
			</tr>
		</tbody>
	</table><!-- End -->
</body>

</html>
