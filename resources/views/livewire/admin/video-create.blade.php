    <div class="card">
        <div class="card-header">
            <input wire:model="search" type="text" class="form-control" placeholder="Ingrese el nombre del post">
        </div>
        
        @dump($datos)
        <div class="card-body">
            @if ($datos['pageInfo']['totalResults'] > 0)
            <div class="container">
                    <div class="row">
                        <div class="col-sm">
                            <figure>
                                <iframe class="w-full " height="360px" src="https://www.youtube.com/embed/{{$datos['items'][0]['id']}}" title="YouTube video player" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                                </iframe>                                            
                            </figure>   
                        </div>
                           
                        <div class="col-md">
                            <section>
                                <h1 class="h1 text-success" >{{$datos['items'][0]['snippet']['title']}}</h1>
                                <label for="" class="label">    
                                    {{$datos['items'][0]['snippet']['channelTitle']}}
                                </label>
                                <span class="span">
                                    {{$datos['items'][0]['snippet']['description']}}
                                </span>
                            </section>
                            <button class="btn btn-success btn-sm" wire:click='addData("{{$datos['items'][0]['id']}}")'>Agregar datos</button> 

                         </div>              
                    </div>
            </div>
            
            @endif
            
           
            
            
        </div>
        
            
    </div>