<x-app-layout>
    <div class="py-12  ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="mx-4 md:mx-0">
                <h1 class="text-4xl font-bold text-green-500">
                    {{$video->tittle}}
                </h1>
                <div class="text-lg text-gray-500 mb-4">
                    {{$video->extract}}
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    {{-- Content Principal --}}
                    <div class="lg:col-span-2">

                        <figure>
                            <iframe class="w-full " height="360px" src="https://www.youtube.com/embed/{{$video->url }}" 
                            title="YouTube video player" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                            </iframe>
                        </figure>
                        <div class="text-base text-gray-500 mt-4">
                            {!! $video->description !!}
                        </div>
                        
                        {{-- Comments --}}
                        <h2 class="mt-4 text-green-600">Commentarios</h2>
                        <ul>
                            @auth
                            <li class="m-4 my-9">                               
                                <div class="flex ">
                                    <figure class="w-24" >                                        
                                        <img class="w-14 rounded-full object-cover object-center" src="{{auth()->user()->profile_photo_url }}" alt="">                                                                                
                                    </figure>
                                    <span class="w-full">                                        
                                        {!! Form::open(['route' => ['admin.comments.video.store', $video]]) !!}
                                        <p class="text-green-600">                                                
                                                <div class="md:w-full">                                                   
                                                    {{ Form::hidden('commentable_id', $video->id) }}
                                                    {{ Form::hidden('commentable_type',"App\Models\Video"  /* $video->comment->commentable_type */) }}
                                                    {!! Form::textarea('message', null, ['class' => 'bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-green-500 y-72', ' rows' => 1, 'placeholder' => "Ingresar Comentario"]) !!}
                                                  </div>   
                                                @error('message')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror                                                                                                                                      
                                        </p>                                        
                                        {!! Form::submit('Enviar', ['class' => 'float-right shadow bg-green-500 hover:bg-green-700 cursor-pointer	 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded']) !!}                                         
                                        {!! Form::close() !!}  
                                    </span>
                                </div>                               
                            </li>
                            @endauth
                            @foreach ($comments as $comment)
                                <li class="m-4 my-9">
                                    <div class="flex ">
                                        <figure class="w-24" >
                                            <img class="w-14 rounded-full object-cover object-center" src="{{$comment->user->profile_photo_url}}" alt="">
                                        </figure>
                                        <span class="w-full" x-data="{edit: false, text:true}" x-on:click.away="edit =false;text=true">
                                            <p class="text-green-600"> <b>	{{$comment->user->name}} </b> {{$comment->created_at->diffForHumans()}}  </p>
                                            
                                            @isset(auth()->user()->id)
                                                   @if ($comment->created_at->diffInMinutes() < 60 && $comment->user->id == auth()->user()->id)                                                  
                                                        <span  x-show ="text"  contenteditable="edit:" class="text-gray-600 ">
                                                            {{$comment->message}}
                                                        </span>                                                
                                                        <span x-show ="edit" class="w-full" >                                                
                                                            {!! Form::open(['route' => ['admin.comments.video.update', $video, $comment]]) !!}
                                                            <p class="text-green-600">                                                
                                                                    <div class="md:w-full">
                                                                        {{ Form::hidden('commentable_id', $video->id) }}
                                                                        {{ Form::hidden('commentable_type', $video->comment->commentable_type) }}
                                                                        {!! Form::textarea('message', $comment->message, ['class' => 'bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-green-500 y-72', ' rows' => 1, 'placeholder' => "Ingresar Comentario"]) !!}
                                                                    </div>       
                                                                    @error('message')
                                                                        <span class="text-danger">{{$message}}</span>
                                                                    @enderror                                                                                                                                    
                                                            </p>                                                            
                                                            {!! Form::submit('Actualizar', ['class' => 'float-right shadow bg-green-500 hover:bg-green-700 cursor-pointer	 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-2 rounded']) !!}                                         
                                                        
                                                            {!! Form::close() !!}  
                                                        </span>
                                                    <button  x-show ="text"  x-on:click="edit = true;text=false" class="float-right  bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded focus:outline-none">
                                                    Editar
                                                </button>
                                                    @else
                                                    <span contenteditable="false" class="text-gray-600">{{$comment->message}}</span>
                                                @endif
                                                @else
                                                   <span contenteditable="false" class="text-gray-600">{{$comment->message}}</span> 
                                                @endisset 
                                        </span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    {{-- Content relationship --}}
                    <aside>
                        <h1 class="text-2xl font-bold text-green-600 mb-4">M??s de {{$video->user->name}} {{-- {{$video->category->name}} --}}</h1>
                        <ul>
                            @foreach ($similares as $similar)
                                    <li class="mb-4">
                                        <a class="flex" href="{{route('blog.video.show', $similar)}}">
                                            <img class="w-32  object-content object-center" src="https://i.ytimg.com/vi/{{$similar->url}}/default.jpg" alt="">
                                            <span class="ml-2 text-gray-600" >  <b class="text-green-600"> {{$similar->name}} </b>
                                            <p >{{$similar->user->name}}</p>
                                            <p>{{$similar->created_at->diffForHumans()}}</p>
                                            </span>
                                      
                                        </a>
                                    </li>
                            @endforeach
                        </ul>
                    </aside>
                </div>
            </div> 
               
        </div>
    </div>
</x-app-layout>