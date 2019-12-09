@extends('index')

@section('page-title', 'Task #5')
@section('task-5', 'active')

@section('main-content')
    <div class="ui info message">
        <p><b>Task 5</b> - для указанного города вывести название тезисов докладов, поступивших из этого города</p>
    </div>
    <div class="ui divider"></div>
    <form class="ui form" id="task-5-form">
        <div class="field">
            <label>Город: </label>
            <input type="text" name="city" required>
        </div>
        <div class="field">
            <button type="submit" class="ui primary fluid button">Вывести список</button>
        </div>
    </form>
    <table id="task-5-table" class="ui unstackable striped selectable table center aligned fluid">
        <thead>
        <tr>
            <th>Тема доклада</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
@endsection
