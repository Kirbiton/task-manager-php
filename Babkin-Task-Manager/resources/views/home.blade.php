@extends('layouts.app')

@section('title','Home')

@section('content')
    <main class="homemain">
        <h2>Your tasks</h2>
        

        <div class="contreg">
            <form method="POST" class="contcontreg" action="{{ route('home') }}">
                @csrf
                <h2>Add task</h2>
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" required>

                <br>
                <button type="submit" class="regButt">Add</button>
            </form>
        </div>
        <ul>
            @foreach($tasks as $task)
                <li>
                    <form action="/tasks/{{ $task->id }}" method="POST" stile="display:inline;">
                        @csrf
                        @method('patch')
                        <button type="submit">{{ $task->is_complated ? 'Не выполнена' : 'Выполнена'}}</button>
                    </form>
                    {{ $task->title}}
                    <form action="/tasks/{{ $task->id }}" method="POST" stile="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Удалить</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </main>
@endsection