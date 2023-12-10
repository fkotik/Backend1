@extends('layouts.app')

@section('content')
    <div class="container">
        @if($id=='create')
            <div class="col-6 offset-3">
                @if(isset($pred))
                    @if($pred)

                    @else
                        {{__('No albums found.')}}
                    @endif
                @endif
                <form action="{{route('create_album')}}" method="post">
                    @csrf
                    <h1>Добавление альбома</h1>
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">Введите название альбома</label>
                        <div class="col-md-6">
                            <input required id="name" name="name" class="form-control" type="text" value="@if(isset($pred))@if($pred){{$pred->name}}@endif @endif">
                            <button onclick="document.getElementById('name2').value=document.getElementById('name').value; document.getElementById('pred').submit()" type="button" class="btn btn-primary">Предзаполнить поля</button>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="author" class="col-md-4 col-form-label text-md-end">Введите исполнителя альбома</label>
                        <div class="col-md-6">
                            <input required id="author" name="author" class="form-control" type="text" value="@if(isset($pred))@if($pred){{$pred->artist}}@endif @endif">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="description" class="col-md-4 col-form-label text-md-end">Введите описание альбома</label>
                        <div class="col-md-6">
                            <textarea required id="description" name="description" class="form-control" type="text">@if(isset($pred))@if($pred){{$descr}}@endif @endif</textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="description" class="col-md-4 col-form-label text-md-end">Обложка альбома</label>
                        <div class="col-md-4">
                            <input hidden type="text" id="imgsrc" name="imgsrc">
                            <img id="img2" src="@if(isset($pred)) @if($pred){{$img}} @else {{__('/assets/img/default_album_cover.png')}} @endif @else {{__('/assets/img/default_album_cover.png')}} @endif" class="img-fluid">
                            <button onclick="document.getElementById('img2').src='/assets/img/default_album_cover.png'" type="button" class="btn btn-primary">Сбросить</button>
                        </div>
                    </div>

                    <button onclick="document.getElementById('imgsrc').value=document.getElementById('img2').src"  type="submit" class="btn-primary btn">Добавить</button>
                </form>
                <form id="pred" action="{{route('pred',['id'=>$id])}}" method="GET">
                    @csrf
                    <input hidden type="text" name="name" id="name2">
                </form>
            </div>
        @else
            <div class="col-6 offset-3">
                <form action="{{route('red_album',['id'=>$id])}}" method="post">
                    @csrf
                    <h1>Редактирование альбома</h1>
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">Введите новое название альбома</label>
                        <div class="col-md-6">
                            <input required id="name" name="name" class="form-control" type="text" value="{{$album->name}}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="author" class="col-md-4 col-form-label text-md-end">Введите нового исполнителя альбома</label>
                        <div class="col-md-6">
                            <input required id="author" name="author" class="form-control" type="text" value="{{$album->author}}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="description" class="col-md-4 col-form-label text-md-end">Введите новое описание альбома</label>
                        <div class="col-md-6">
                            <textarea required id="description" name="description" class="form-control" type="text">{{$album->description}}</textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="description" class="col-md-4 col-form-label text-md-end">Обложка альбома</label>
                        <div class="col-md-4">
                            <input hidden type="text" id="imgsrc" name="imgsrc">
                            <img id="img2" src="{{$album->cover}}" class="img-fluid">
                            <button onclick="document.getElementById('img2').src='/assets/img/default_album_cover.png'" type="button" class="btn btn-primary">Сбросить</button>
                        </div>
                    </div>

                    <button onclick="document.getElementById('imgsrc').value=document.getElementById('img2').src" type="submit" class="btn-primary btn">Подтвердить</button>
                </form>
            </div>
        @endif

    </div>
@endsection
