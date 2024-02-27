<h1>LISTAGEM DAS CATEGORIAS</h1>
<a href="{{ route('category.main') }}">VOLTAR AO INICIO</a>
<br> <br>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
            <tr>    
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <form action="{{ route('category.remove', $category->id ) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">REMOVER</button>
                    </form>
                </td>
            </tr>
        @endforeach
        
    </tbody>
</table>