@extends('index')

@section('page-title', 'Task #3')
@section('task-3', 'active')

@section('main-content')
    <div class="ui info message">
        <p><b>Task 3</b> - вывести список приглашенных, с указанием даты об уплате оргвзноса</p>
    </div>
    <button class="ui fluid button primary" onclick="showInv()">Вывести</button>
    <table id="task-3-table" class="ui unstackable striped selectable table center aligned fluid">
        <thead>
        <tr>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Email</th>
            <th>Дата оплаты оргвзноса</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
@endsection
