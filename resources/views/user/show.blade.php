@extends('layouts.main')
@section('content')
        <div>
            <ul>
            <li>ID: {{$user->id}}</li>
            <li>Роль: {{$type->title}}</li>
            <li>ФИО: {{$user->fio}}</li>
            <li>Логин: {{$user->login}}</li>
            <li>Пароль: {{$user->password}}</li>
            <li>Номер жеребьевки: {{$user->draw_number}}</li>
            </ul>
        </div>
    <div>
        <a class="btn btn-primary" href="{{route('user.edit', $user->id)}}">Редактировать</a>
        <div>
        <form action="{{route('user.destroy', $user->id)}}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Удалить"  class="btn btn-danger">
        </form>
        </div>
        <a class="btn btn-primary" href="{{route('user.index')}}">Вернуться назад</a>
    </div>
@endsection
