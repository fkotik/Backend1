@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Список альбомов</h1>
        @if($albums->count())
            @guest()

            @else
                <form action="{{route('album',['id'=>'create'])}}" method="POST">
                    @csrf
                    <button id="btn" class="btn btn-primary" type="submit">Добавить альбом</button>
                </form>
            @endguest

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Обложка</th>
                        <th scope="col">Название</th>
                        <th scope="col">Исполнитель</th>
                        <th scope="col">Описание</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach($albums as $album)
                        <tr>
                            <th scope="row">{{$album->id_album}}</th>
                            <td style="width: 100px"><img class="img-fluid" src="{{$album->cover}}" alt=""></td>
                            <td>{{$album->name}}</td>
                            <td>{{$album->author}}</td>
                            <td>{{$album->description}}</td>
                            <td>
                                @guest()

                                @else
                                    <form action="{{route('album',['id'=>$album->id_album])}}" method="POST">
                                        @csrf
                                        <button class="btn btn-primary btn-sm" type="submit">Ред.</button>
                                    </form>
                                    <form action="{{route('del_album',['id'=>$album->id_album])}}" method="POST" class="mt-3">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">X</button>
                                    </form>
                                @endguest
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
        @else
            @guest()
                <label>Пока тут пусто, что бы добавить альбом авторизуйтесь</label>
            @else
                <form action="{{route('album',['id'=>'create'])}}" method="POST">
                    @csrf
                    <label for="btn">Пока тут пусто</label>
                    <br>
                    <button id="btn" class="btn btn-primary" type="submit">Добавить альбом</button>
                </form>
            @endguest
        @endif
    </div>
@endsection
