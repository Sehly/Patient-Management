


    <h1>Add Payment for {{ $patient->name }}</h1>
    <form method="POST" action="{{ route('patients.payments.store', $patient->id) }}">
        @csrf
        <div>
            <label for="amount">Amount:</label>
            <input type="number" name="amount" id="amount" required>
        </div>

        <div>
            <label for="payment_method">Payment Method:</label>
            <select name="payment_method" id="payment_method">
                <option value="Cash">Cash</option>
                <option value="Insurance">Insurance</option>
            </select>
        </div>

        <div>
            <label for="discount">Discount:</label>
            <input type="number" name="discount" id="discount" min="0" max="100">
        </div>

        <div>
            <label for="payment_date">Payment Date:</label>
            <input type="date" name="payment_date" id="payment_date">
        </div>

        <button type="submit">Save</button>
    </form>

