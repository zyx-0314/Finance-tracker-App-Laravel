<!DOCTYPE html>
<html>
<head>
    <title>Add New Transaction</title>
</head>
<body>
    <h1>Add Transaction</h1>

    {{-- Form to create a new transaction --}}
    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf
        <label for="type">Type:</label>
        <select name="type" id="type">
            <option value="income">Income</option>
            <option value="expense">Expense</option>
        </select>
        <br><br>
        
        <label for="amount">Amount:</label>
        <input type="number" step="0.01" name="amount" id="amount" required>
        <br><br>
        
        <label for="description">Description:</label>
        <textarea name="description" id="description"></textarea>
        <br><br>
        
        <button type="submit">Save Transaction</button>
    </form>
</body>
</html>
