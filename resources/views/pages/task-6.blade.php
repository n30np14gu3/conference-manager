@extends('index')

@section('page-title', 'Task #6')
@section('task-6', 'active')

@section('main-content')
    <div class="ui info message">
        <p><b>Task 6</b> - для указанного города, вывести список нуждающихся в гостинице.</p>
    </div>
    <div class="ui divider"></div>
    <form class="ui form" id="task-6-form">
        <div class="field">
            <label>Город: </label>
            <input type="text" name="city" required>
        </div>
        <div class="field">
            <button type="submit" class="ui primary fluid button">Вывести список</button>
        </div>
    </form>
    <table id="task-6-table" class="ui unstackable striped selectable table center aligned fluid">
        <thead>
        <tr>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
@endsection
