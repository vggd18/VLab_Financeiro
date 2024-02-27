<h1>CRIAÇÃO DE CATEGORIAS</h1>

<form action="{{ route('user.store') }}" method="POST">
    @csrf
    <input type="text" placeholder="category name" name="name">
    <br> <br>
    <button type="submit">Criar</button>
</form>