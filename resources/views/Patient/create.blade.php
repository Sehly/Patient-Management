<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Patient Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <x-NAV>Patient</x-NAV>

    <h1 class="text-center text-bold m-5">Create New Patient</h1>
    
    <form class="border p-2 w-75 m-auto" method="post" action="{{route('Patient.store')}}" enctype="multipart/form-data">
        @csrf
        
        @error('Name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="exampleInputName1" class="form-label">Name</label>
            <input name="Name" type="text" class="form-control" id="exampleInputName1">
        </div>
        
        @error('Date')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="exampleInputDate1" class="form-label">Date</label>
            <input name="Date" type="date" class="form-control" id="exampleInputDate1">
        </div>
        
        @error('Phone')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="exampleInputPhone1" class="form-label">Phone</label>
            <input name="Phone" type="number" class="form-control" id="exampleInputPhone1">
        </div>
        
        <div class="mb-3">
    <label for="exampleInputPayment1" class="form-label">Payment</label>
    <select name="Payment" class="form-control" id="exampleInputPayment1">
        <option value="" disabled selected>Select Payment Method</option>
        <option value="cash">Cash</option>
        <option value="insurance">Insurance</option>
    </select>
</div>

        <div class="mb-3">
            <label for="exampleInputRecommended1" class="form-label">Recommended</label>
            <input name="Recommended" type="text" class="form-control" id="exampleInputRecommended1">
        </div>

        <div class="mb-3">
            <label for="exampleInputTotalSession1" class="form-label">Total Session</label>
            <input name="Total_Session" type="number" class="form-control" id="exampleInputTotalSession1">
        </div>

        <div class="mb-3">
            <label for="exampleInputSessionNumber1" class="form-label">Session Number</label>
            <input name="Session_Number" type="number" class="form-control" id="exampleInputSessionNumber1">
        </div>

        <div class="mb-3">
            <label for="exampleInputTotalAmount1" class="form-label">Last Session Price</label>
            <input name="Total_Amount" type="number" class="form-control" id="exampleInputTotalAmount1">
        </div>

        <div class="mb-3">
            <label for="exampleInputTotalAmount1" class="form-label">Discount</label>
            <input name="Discount" type="number" class="form-control" id="exampleInputTotalAmount1">
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
    <x-a-component type="success" locate="{{ route('Patient.index') }}">Back to List</x-a-component>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
