    <div class="card">
        <div class="card-header">
            <input wire:model="search" type="text" class="form-control" placeholder="Ingrese el link de compartir de tu video en youtube">
        </div>
     
        <div class="card-body">
            @if ($datos['pageInfo']['totalResults'] > 0)
            <div class="container">
                    <div class="row">
                        <div class="col-sm">
                            <figure>
                                <iframe class="w-full " height="360px" src="https://www.youtube.com/embed/{{$url}}" title="YouTube video player" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                                </iframe>                                            
                            </figure>   
                        </div>
                           
                        <div class="col-md-7">
                            <section>
                                
                               
                                <span class="span">
                                   
                                </span>
                            </section>
                            <form wire:submit.prevent="submit" wire:ignore.self>
                                <div class="form-group">
                                <input  class="form-control" type="text"  wire:model.debounce.20000ms="tittle" 	 value="{{$tittle}}">
                                @error('tittle') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                <textarea class="form-control" wire:model.debounce.50000ms="description" >
                                    {{$description}}
                                </textarea>
                                @error('description') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                <input type="text" class="form-control" readonly  wire:model="slug" value="{{$slug}}" >
                                @error('slug') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                <input type="text" class="form-control" readonly  wire:model="url" value="{{$url}}" >
                                @error('url') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                                        
                                <button class="btn btn-success btn-sm" type="submit">Agregar Video</button>
                            </form>
                            {{-- <button class="btn btn-success btn-sm" wire:click='addData("{{$datos['items'][0]['id']}}")'></button>--}}
                         </div>              
                    </div>
            </div>            
            @endif            
        </div>            
    </div>