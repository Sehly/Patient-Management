<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revenue Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Revenue Report</h1>


        <form method="GET" action="{{ route('revenue.index') }}" class="mb-4">
            <div class="d-flex justify-content-center">
                <input type="date" name="date" value="{{ request('date') }}" class="form-control w-50" required>
                <button type="submit" class="btn btn-primary ms-2">Filter by Date</button>

                <a href="{{ route('revenue.index') }}" class="btn btn-outline-secondary ms-2">Reset</a>
            </div>
        </form>


        @if(request('date') || request('search'))
            @if($patients->isEmpty() && $revenues->isEmpty())
                <div class="alert alert-info text-center">No records found for the selected date.</div>
            @else

                @if(!$patients->isEmpty())
                    <h3>Patient Records</h3>
                    <div class="table-responsive mb-4">
                        <table class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Phone</th>
                                    <th>Payment</th>
                                    <th>Recommended</th>
                                    <th>Total Session</th>
                                    <th>Session Number</th>
                                    <th>Total Amount</th>
                                    <th>Discount</th>
                                    <th>Total Payment</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($patients as $patient)
                                    <tr>
                                        <td>{{ $patient->id }}</td>
                                        <td>{{ $patient->Name }}</td>
                                        <td>{{ $patient->Date }}</td>
                                        <td>{{ $patient->Phone }}</td>
                                        <td>{{ $patient->Payment }}</td>
                                        <td>{{ $patient->Recommended }}</td>
                                        <td>{{ $patient->Total_Session }}</td>
                                        <td>{{ $patient->Session_Number }}</td>
                                        <td>${{ number_format($patient->Total_Amount, 2) }}</td>
                                        <td>${{ number_format($patient->Discount, 2) }}</td>
                                        <td>${{ number_format($patient->Total_Payment, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif


                @if(!$revenues->isEmpty())
                    <h3>Revenue Records</h3>
                    <div class="table-responsive mb-4">
                        <table class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Total Payment</th>
                                    <th>Total Discount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($revenues as $revenue)
                                    <tr>
                                        <td>{{ $revenue->id }}</td>
                                        <td>{{ $revenue->Date }}</td>
                                        <td>${{ $revenue->Total_Payment }}</td>
                                        <td>{{ $revenue->Total_Discount }}%</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif


                <div class="mt-4 text-center">
                    <h4 class="">Total Income for {{ $date }}: ${{ $totalRevenue }}</h4>
                </div>
            @endif
        @endif


        <div class="text-center mt-4">
            <a href="{{ route('Patient.index') }}" class="btn btn-outline-success px-5">Back to List</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
