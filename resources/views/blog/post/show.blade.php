<x-app-layout>
    <div class="py-12  ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="mx-4 md:mx-0">
                <h1 class="text-4xl font-bold text-green-500">
                    {{$post->name}}
                </h1>
                <div class="text-lg text-gray-500 mb-4">
                    {!!$post->extract!!}
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    {{-- Content Principal --}}
                    <div class="lg:col-span-2">
                        <figure>
                            @if($post->image)
                            <img class="w-full h-80 object-cover object-center" src="{{Storage::url($post->image->url)}}" alt="">
                            @else
                            <img class="w-full h-80 object-cover object-center" src="http://ProyectNext.test/storage/profile-photos/post-default.jpg" alt="">
                            @endif
                        </figure>
                        <div class="text-base text-gray-500 mt-4">
                            {!!  $post->body !!}
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
                        <h1 class="text-2xl font-bold text-green-600 mb-4">Más en {{$post->category->name}}</h1>
                        <ul>
                            @foreach ($similares as $similar)
                                    <li class="mb-4">
                                        <a class="flex" href="{{route('blog.post.show', $similar)}}">
                                            @if($similar->image)
                                            <img class="w-32  object-cover object-center" src="{{Storage::url($similar->image->url)}}" alt="">
                                            @else
                                            <img class="w-32  object-cover object-center" src="http://ProyectNext.test/storage/profile-photos/post-default.jpg" alt="">
                                            @endif
                                            
                                            <span class="ml-2 text-gray-600" >  <b class="text-green-600"> {{$similar->name}} </b>
                                            <p >{{$similar->user->name}}</p>
                                            <p>{{$similar->created_at->diffForHumans()}}</p>
                                            </span>

                                           {{--  <p class="text-green-600"> <b>	{{$comment->user->name}} </b> {{$comment->created_at->diffForHumans()}}  </p>
                                            <span class="text-gray-600">{{$comment->message}}</span> --}}
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