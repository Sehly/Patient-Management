<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table thead th {
            background-color: #343a40;
            color: white;
        }
        .table-hover tbody tr:hover {
            background-color: #f8f9fa;
        }
        .btn-outline-primary, .btn-outline-info, .btn-outline-success, .btn-outline-warning, .btn-outline-danger {
            border-width: 2px;
        }
    </style>
</head>
<body>

    <x-NAV>Patient</x-NAV>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Patients</h1>

        <div class="d-flex justify-content-center mb-3">
            <a href="{{ route('Patient.create') }}" class="btn btn-outline-primary px-5">Add New Patient</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Phone</th>
                        <th>Total Sessions</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($patients as $patient)
                    <tr>
                        <td>{{ $patient->id }}</td>
                        <td>{{ $patient->Name }}</td>
                        <td>{{ $patient->Date }}</td>
                        <td>{{ $patient->Phone }}</td>
                        <td>{{ $patient->Total_Session }}</td>
                        <td>
                            <a href="{{ route('Patient.show', $patient->id) }}" class="btn btn-outline-info btn-sm">View</a>
                            <a href="{{ route('Patient.payments.index', $patient->id) }}" class="btn btn-outline-success btn-sm">Details</a>
                            <a href="{{ route('Patient.edit', $patient->id) }}" class="btn btn-outline-warning btn-sm">Update</a>
                            <form action="{{ route('Patient.destroy', $patient->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
