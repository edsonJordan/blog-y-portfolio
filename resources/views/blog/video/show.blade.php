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
                            {{$video->body}}
                        </div>
                        {{-- Comments --}}
                        <h2 class="mt-4 text-green-600">Commentarios</h2>
                        <ul>
                            @foreach ($comments as $comment)
                                <li class="m-4 my-9">
                                    <div class="flex ">
                                        <figure class="w-24" >
                                            <img class="w-14 rounded-full object-cover object-center" src="{{$comment->user->profile_photo_url}}" alt="">
                                        </figure>
                                        <span class="w-full">
                                            <p class="text-green-600"> <b>	{{$comment->user->name}} </b> {{$comment->created_at->diffForHumans()}}  </p>
                                            <span class="text-gray-600">{{$comment->message}}</span>
                                        </span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    {{-- Content relationship --}}
                    <aside>
                        <h1 class="text-2xl font-bold text-green-600 mb-4">Más de {{$video->user->name}} {{-- {{$video->category->name}} --}}</h1>
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