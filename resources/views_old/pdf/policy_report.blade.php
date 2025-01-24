<!DOCTYPE html>
<html>

<head>
    <title>Policy Report</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            font-size: 7px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Policy Report</h1>
    <table>
        <thead>
            <tr>
                <th>Policy No</th>
                {{-- <th>Class</th>
                <th>Line CD</th>
                <th>Issue Date</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Assured ID</th> --}}
                <th>Assured Name</th>
                <th>Email Address</th>
                <th>Contact No</th>
                {{-- <th>Address 1</th>
                <th>Address 2</th>
                <th>Address 3</th>
                <th>Assured TIN</th>
                <th>Agent ID</th>
                <th>Agent Name</th>
                <th>Temp Policy No</th> --}}
                <th>Line Name</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Middle Initial</th>
                <th>Bill No</th>
                <th>Gross Premium</th>
                {{-- <th>Paid Amount</th>
                <th>Unpaid</th> --}}
                <th>Payment Status</th>
                <th>TSI Amount</th>
                <th>Premium Amount</th>
                <th>Currency Type</th>
                <th>DST</th>
                <th>LGT</th>
                <th>FST</th>
                <th>VAT</th>
                {{-- <th>Premium Tax</th>
                <th>Other Taxes</th> --}}
            </tr>
        </thead>
        <tbody>

            @foreach ($policies as $policy)
                <tr>
                    <td>{{ $policy['policy_no'] }}</td>
                    {{-- <td>{{ $policy['class'] }}</td>
                    <td>{{ $policy['line_cd'] }}</td>
                    <td>{{ $policy['issue_date'] }}</td>
                    <td>{{ $policy['start_date'] }}</td>
                    <td>{{ $policy['end_date'] }}</td>
                    <td>{{ $policy['assured_id'] }}</td> --}}
                    <td>{{ $policy['assured_name'] }}</td>
                    <td>{{ $policy['email_address'] }}</td>
                    <td>{{ $policy['contact_no'] }}</td>
                    {{-- <td>{{ $policy['address1'] }}</td> --}}
                    {{-- <td>{{ !empty($policy['address2']) ? $policy['address2'] : '' }}</td>
                    <td>{{ !empty($policy['address3']) ? $policy['address3'] : '' }}</td> --}}
                    {{-- <td>{{ $policy['assd_tin'] }}</td>
                    <td>{{ $policy['agent_id'] }}</td>
                    <td>{{ $policy['agent_name'] }}</td>
                    <td>{{ $policy['temp_pol_no'] }}</td> --}}
                    <td>{{ !empty($policy['line_name']) ? $policy['line_name'] : '' }}</td>
                    <td>{{ !empty($policy['last_name']) ? $policy['last_name'] : '' }}</td>
                    <td>{{ !empty($policy['first_name']) ? $policy['first_name'] : '' }}</td>
                    <td>{{ $policy['middle_initial'] }}</td>
                    <td>{{ $policy['bill_no'] }}</td>
                    <td>{{ $policy['gross_premium'] }}</td>
                    {{-- <td>{{ $policy['pd_amt'] }}</td>
                    <td>{{ $policy['unpaid'] }}</td> --}}
                    <td>{{ $policy['payment_status'] }}</td>
                    <td>{{ $policy['tsi_amt'] }}</td>
                    <td>{{ $policy['prem_amt'] }}</td>
                    <td>{{ $policy['currency_type'] }}</td>
                    <td>{{ $policy['dst'] }}</td>
                    <td>{{ $policy['lgt'] }}</td>
                    <td>{{ $policy['fst'] }}</td>
                    <td>{{ $policy['vat'] }}</td>
                    {{-- <td>{{ !empty($policy['prem_tax']) ? $policy['prem_tax'] : '' }}</td>
                    <td>{{ !empty($policy['other_taxes']) ? $policy['other_taxes'] : '' }}</td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
