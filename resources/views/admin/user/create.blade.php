<h1>CREATE TRANSACTION</h1>

<form action="{{ route('transaction.create') }}" method="POST">
    @csrf
    <input type="checkbox" name="category">
    <input type="text" placeholder="Tipo" name="type">
    <input type="text" placeholder="Valor" name="value">
    <input type="hidden" name="iser" value="">
    <br> <br>
    <button type="submit">Criar</button>
</form>