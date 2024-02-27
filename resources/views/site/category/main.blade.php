<h1>Category MAIN</h1>
<a href="{{ route('category.make') }}">Cadastro de Categoria</a>
<a href="{{ route('category.list') }}">Listar Categorias</a>

<table>
    <thead>
        <th>ID</th>
        <th>Name</th>
    </thead>
    <tbody>
        @foreach($categories as $category)
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>
                <form action="{{ route('category.remove', $category->id ) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">REMOVER</button>
                </form>
            </td>
        @endforeach
    </tbody>
</table>
