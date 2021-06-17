<div class="card">
    <div class="card-header">
        <input wire:model="search" type="text" class="form-control" placeholder="Ingrese el nombre del post">
    </div>
   @if ($videos->count())
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
                    @foreach ($videos as $video)
                        <tr>
                            <td>{{$video->id}}</td>
                            <td>{{$video->tittle}}</td>
                            <td width="10px" >
                                <a class="btn btn-warning btn-sm" href="{{route('admin.videos.edit', $video)}}">Editar</a>
                            </td>
                            <td width="10px" >
                                <form action="{{route('admin.videos.destroy', $video)}}" method="POST">
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
            {{$videos->links()}}
        </div>
        @else
        <div class="card-body">
            <strong>No existe ningún registro</strong>
        </div>
   @endif
</div>
