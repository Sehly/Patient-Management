<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Payments</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table thead th {
            background-color: #343a40;
            color: white;
        }
        .table-hover tbody tr:hover {
            background-color: #f8f9fa;
        }
        .text-success {
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center mb-4">Patient Payments</h1>
    <div class="table-responsive">
        @if($payments->isEmpty())
            <table class="table table-bordered table-striped text-center">
                <thead class="table-dark">
                    <tr>
                        <th colspan="5">No payments found for this patient.</th>
                    </tr>
                </thead>
            </table>
        @else
            <table class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Session Price</th>
                        <th>Payment Method</th>
                        <th>Discount</th>
                        <th>Payment Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($payments as $payment)
                        <tr>
                            <td>{{ $patient->Name }}</td>
                            <td class="text-success">${{ number_format($payment->amount, 2) }}</td>
                            <td>{{ $payment->payment_method }}</td>
                            <td>{{ $payment->discount }}%</td>
                            <td>{{ $payment->payment_date}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    <div class="text-center mt-4">
            <a href="{{ route('Patient.index') }}" class="btn btn-outline-success px-5">Back to List</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
