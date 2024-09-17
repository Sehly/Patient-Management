


    <h1>Edit Payment</h1>
    <form method="POST" action="{{ route('payments.update', [$patient->id, $payment->id]) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="amount">Amount:</label>
            <input type="number" name="amount" id="amount" value="{{ $payment->amount }}" required>
        </div>

        <div>
            <label for="payment_method">Payment Method:</label>
            <select name="payment_method" id="payment_method">
                <option value="Cash" {{ $payment->payment_method == 'Cash' ? 'selected' : '' }}>Cash</option>
                <option value="Insurance" {{ $payment->payment_method == 'Insurance' ? 'selected' : '' }}>Insurance</option>
            </select>
        </div>

        <div>
            <label for="discount">Discount:</label>
            <input type="number" name="discount" id="discount" value="{{ $payment->discount }}" min="0" max="100">
        </div>

        <div>
            <label for="payment_date">Payment Date:</label>
            <input type="date" name="payment_date" id="payment_date" value="{{ $payment->payment_date->format('Y-m-d') }}">
        </div>

        <button type="submit">Update</button>
    </form>

