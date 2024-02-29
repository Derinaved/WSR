@extends('layouts.main')
@section('content')
    <div>
        <a class="btn btn-primary" href="{{route('user.create')}}"> Создать </a>
    </div>
    @foreach($users as $user)
        <div>
            <a href="{{route('user.show', $user->id)}}">{{$user->id}}) {{$user->fio}}</a>
        </div>
    @endforeach
@endsection
