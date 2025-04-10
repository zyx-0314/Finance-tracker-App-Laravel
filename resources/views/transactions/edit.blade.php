<!DOCTYPE html>
<html>
<head>
    <title>Edit Transaction</title>
</head>
<body>
    <h1>Edit Transaction</h1>

    {{-- Form for editing an existing transaction. The $transaction object is passed from the controller. --}}
    <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="type">Type:</label>
        <select name="type" id="type">
            <option value="income" @if($transaction->type == 'income') selected @endif>Income</option>
            <option value="expense" @if($transaction->type == 'expense') selected @endif>Expense</option>
        </select>
        <br><br>
        
        <label for="amount">Amount:</label>
        <input type="number" step="0.01" name="amount" id="amount" value="{{ $transaction->amount }}" required>
        <br><br>
        
        <label for="description">Description:</label>
        <textarea name="description" id="description">{{ $transaction->description }}</textarea>
        <br><br>
        
        <button type="submit">Update Transaction</button>
    </form>
</body>
</html>
