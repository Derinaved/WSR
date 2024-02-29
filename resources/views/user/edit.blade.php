@extends('layouts.main')
@section('content')
    <form action="{{route('user.update', $user->id)}}" method="post">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="exampleInputEmail1">ФИО</label>
            <input type="text" name='fio' class="form-control" placeholder="ФИО">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Номер жеребьевки</label>
            <input type="text" name='draw_number' class="form-control" placeholder="Номер жеребьевки">
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="type">Тип пользователя</label>
            <select class="form-select" id="type" name="type_id">
                @foreach($types as $type)
                    <option
                        {{$type->id === $user->type_id ? 'selected' : ''}}
                        value="{{$type->id}}">{{$type->title}}</option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
@endsection
