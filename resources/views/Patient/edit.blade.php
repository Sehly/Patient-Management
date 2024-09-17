<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Patient Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <x-NAV>Patient</x-NAV>

    <h1 class="text-center text-bold m-5">Edit Patient Data</h1>

    <form class="border p-2 bordered w-75 m-auto" method="POST" action="{{ route('Patient.update', $patient->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="exampleInputName1" class="form-label">Name</label>
            <input name="Name" type="text" class="form-control" value="{{ old('Name', $patient->Name) }}" required>
        </div>

        <div class="mb-3">
            <label for="exampleInputDate1" class="form-label">Date</label>
            <input name="Date" type="text" class="form-control" value="{{ old('Date', $patient->Date) }}" required>
        </div>

        <div class="mb-3">
            <label for="exampleInputPhone1" class="form-label">Phone</label>
            <input name="Phone" type="number" class="form-control" value="{{ old('Phone', $patient->Phone) }}"  required>
        </div>

        <div class="mb-3">
            <label for="exampleInputPayment1" class="form-label">Payment</label>
            <select name="Payment" class="form-control" id="exampleInputPayment1">
                <option value="" disabled>Select Payment Method</option>
                <option value="cash" {{ old('Payment', $patient->Payment) == 'cash' ? 'selected' : '' }}>Cash</option>
                <option value="insurance" {{ old('Payment', $patient->Payment) == 'insurance' ? 'selected' : '' }}>Insurance</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="exampleInputRecommended1" class="form-label">Recommended</label>
            <input name="Recommended" type="text" class="form-control" value="{{ old('Recommended', $patient->Recommended) }}" >
        </div>

        <div class="mb-3">
            <label for="exampleInputTotalSession1" class="form-label">Total Session</label>
            <input name="Total_Session" type="number" class="form-control" value="{{ old('Total_Session', $patient->Total_Session) }}" >
        </div>

        <div class="mb-3">
            <label for="exampleInputSessionNumber1" class="form-label">Session Number</label>
            <input name="Session_Number" type="number" class="form-control" value="{{ old('Session_Number', $patient->Session_Number) }}" >
        </div>

        <div class="mb-3">
            <label for="exampleInputTotalAmount1" class="form-label">Last Session Price</label>
            <input name="Total_Amount" type="number" class="form-control" value="{{ old('Total_Amount', $patient->Total_Amount) }}" >
        </div>

        <div class="mb-3">
            <label for="exampleInputTotalAmount1" class="form-label">Discount</label>
            <input name="Discount" type="number" class="form-control" value="{{ old('Discount', $patient->Discount) }}">
        </div>

        <button type="submit" class="btn btn-outline-primary ">Update</button>

        <x-a-component type="outline-success" locate="{{ route('Patient.index') }}">Back to List</x-a-component>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
