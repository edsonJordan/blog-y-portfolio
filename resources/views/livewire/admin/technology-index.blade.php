<div>
    <div class="card">
        <div class="card-header">
            <input wire:model="search" type="text" class="form-control" placeholder="Ingrese el nombre de la tecnologia">
        </div>
       @if ($techonologies->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($techonologies as $technology)
                            <tr>
                                <td>{{$technology->id}}</td>
                                <td>{{$technology->name}}</td>
                                <td width="10px" >
                                    <a class="btn btn-warning btn-sm" href="{{route('admin.technologies.edit', $technology)}}">Editar</a>
                                </td>
                                <td width="10px" >
                                    <form action="{{route('admin.technologies.destroy', $technology)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{$techonologies->links()}}
            </div>
            @else
            <div class="card-body">
                <strong>No existe ningún registro</strong>
            </div>
       @endif
    </div>
</div>
