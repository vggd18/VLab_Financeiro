<h1>REMOVE TRANSACTION</h1>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>CATEGORIA</th>
            <th>TIPO</th>
            <th>VALOR</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transactions as $transaction)
            <tr>    
                <td>{{ $transaction->id }}</td>
                <td>{{ $transaction->category }}</td>
                <td>{{ $transaction->type }}</td>
                <td>{{ $transaction->value }}</td>
                <td>
                    <form action="{{ route('transaction.remove', $transaction->id ) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">REMOVER</button>
                    </form>
                </td>
            </tr>
        @endforeach
        
    </tbody>
</table>