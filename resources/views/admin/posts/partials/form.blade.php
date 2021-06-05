<div class="form-group">
    {!! Form::label('name', 'nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del Post']) !!}
@error('name')
    <small class="text-danger" >{{$message}}</small>
@enderror
</div>
<div class="form-group">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug del Post', 'readonly']) !!}
    
@error('slug')
    <small class="text-danger" >{{$message}}</small>
@enderror
</div>
<div class="form-group">
    {!! Form::label('category_id','Categoria') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
<hr>
@error('category_id')
    <small class="text-danger" >{{$message}}</small>
@enderror
</div>
<div class="form-group">
     
    <p class="font-weight-blod" >Tecnologias</p>

        @foreach ($techonologies as $technology)
            <label class="mr-2" >
            {!! Form::checkbox('technologies[]', $technology->id, null) !!}
            {{$technology->name}}
            </label>
        @endforeach    
    <hr>
@error('techonologies')
    <small class="text-danger" >{{$message}}</small>
@enderror
</div>
<div class="form-group">
    <p class="font-weight-blod" >Estado</p>
    <label for="">  
        {!! Form::radio('status', 1, true, ['class' => 'form-control']) !!}
        Borrador
    </label>
    <label class="ml-2" for="">  
        {!! Form::radio('status', 2, null,['class' => 'form-control']) !!}
        Publicado
    </label>
    <hr>
    @error('status')
    <small class="text-danger" >{{$message}}</small>
@enderror
</div>
<div class="row mb-3">
    <div class="col">
        <div class="image-wrapper">
               
                @isset($post->image)
                <img id="picture" src="{{Storage::url($post->image->url)}}" alt="">
                @else 
                <img id="picture" src="http://ProyectNext.test/storage/profile-photos/post-default.jpg" alt="">
                @endisset
           
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('file', 'Imagen que se asignara al Post') !!}
            {!! Form::file('file', ['class'=> 'form-control-file']) !!}
            <hr>
            @error('file')
                <small class="text-danger" >{{$message}}</small>
            @enderror
        </div>
        
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae rerum mollitia quia veritatis eveniet adipisci tempore sunt alias reiciendis, facere est cum vitae tempora deleniti autem nihil sit eum. Modi?
    </div>
    
</div>

<div class="form-group">
    {!! Form::label('extract', 'Extracto:') !!}
    {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}
    
@error('extract')
    <small class="text-danger" >{{$message}}</small>
@enderror
</div>

<div class="form-group">
    {!! Form::label('body', 'Cuerpo del Post:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}

@error('body')
    <small class="text-danger" >{{$message}}</small>
@enderror
</div>