@extends('index')

@section('page-title', 'Task #4')
@section('task-4', 'active')

@section('main-content')
    <div class="ui info message">
        <p><b>Task 4</b> - для указанной интервала дат, вывести список участников, уплативших оргвзнос в этом диапазоне</p>
    </div>
    <div class="ui divider"></div>
    <form class="ui form" id="task-4-form">
        <div class="two fields">
            <div class="field">
                <label>Дата с: </label>
                <input type="date" name="date-from" required>
            </div>
            <div class="field">
                <label>Дата по: </label>
                <input type="date" name="date-to" required>
            </div>
        </div>
        <div class="field">
            <button type="submit" class="ui primary fluid button">Вывести список</button>
        </div>
    </form>
    <table id="task-4-table" class="ui unstackable striped selectable table center aligned fluid">
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
