<!DOCTYPE html>
<html>
<head>
    <title>Transactions</title>
</head>
<body>
    <h1>Transaction List</h1>
    {{-- Loop through the transactions passed from the controller --}}
    @foreach($transactions as $transaction)
        <div>
            <strong>{{ ucfirst($transaction->type) }}</strong> - 
            ${{ number_format($transaction->amount, 2) }} <br>
            <small>{{ $transaction->description }}</small>
        </div>
        <hr>
    @endforeach
    {{-- Link to create new transaction (route will be added later) --}}
    <a href="{{ route('transactions.create') }}">Add New Transaction</a>

    {{-- Inside the foreach loop in resources/views/transactions/index.blade.php --}}
    <a href="{{ route('transactions.edit', $transaction->id) }}">Edit</a>

    {{-- Delete form --}}
    <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
    </form>

</body>
</html>
