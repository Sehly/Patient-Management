<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Patient Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body style="background-color: #f0f2f5;">
    <x-NAV>Patient</x-NAV>

    <div class="container mt-5">
        <h1 class="text-center fw-bold mb-5 text-secondary">Patient Details</h1>

        <div class="card shadow-lg border-0 mx-auto" style="max-width: 700px; background-color: #fff;">
            <div class="card-header text-center bg-dark text-white py-3">
                <h2 class="mb-0">{{ $patient->Name }}</h2>
            </div>
            <div class="card-body p-4">
                <div class="row mb-3">
                    <div class="col">
                        <p class="fw-bold text-muted">Date:</p>
                        <p>{{ $patient->Date }}</p>
                    </div>
                    <div class="col">
                        <p class="fw-bold text-muted">Phone:</p>
                        <p>{{ $patient->Phone }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <p class="fw-bold text-muted">Total Sessions:</p>
                        <p>{{ $patient->Total_Session }}</p>
                    </div>
                    <div class="col">
                        <p class="fw-bold text-muted">Payment:</p>
                        <p>{{ $patient->Payment }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <p class="fw-bold text-muted">Recommended:</p>
                        <p>{{ $patient->Recommended }}</p>
                    </div>
                    <div class="col">
                        <p class="fw-bold text-muted">Session Number:</p>
                        <p>{{ $patient->Session_Number }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <p class="fw-bold text-muted">Last Session Price:</p>
                        <p>{{ $patient->Total_Amount }} EGP</p>
                    </div>
                    <div class="col">
                        <p class="fw-bold text-muted">Discount:</p>
                        <p>{{ $patient->Discount }}%</p>
                    </div>
                </div>
                <div class="row mb-3">                    
                    <div class="col">
                        <p class="fw-bold text-muted">Total Payment :</p>
                        <p>{{ $patient->Total_Payment }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('Patient.index') }}" class="btn btn-outline-success px-5">Back to List</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
