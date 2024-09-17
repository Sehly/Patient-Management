


    <h1>Payment Details</h1>
    <p><strong>Amount:</strong> {{ $payment->amount }}</p>
    <p><strong>Payment Method:</strong> {{ $payment->payment_method }}</p>
    <p><strong>Discount:</strong> {{ $payment->discount }}</p>
    <p><strong>Date:</strong> {{ $payment->payment_date }}</p>
    <a href="{{ route('payments.edit', [$patient->id, $payment->id]) }}">Edit</a>

