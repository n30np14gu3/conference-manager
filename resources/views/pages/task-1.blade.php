@extends('index')

@section('page-title',  'Tasks # 1')

@section('task-1', 'active')


@section('main-content')
    <div class="ui info message">
        <p><b>Task 1</b> - для указанной даты 1-ой рассылки вывести список приглашенных и посчитать их количество</p>
    </div>
    <form class="ui small form" id="tak-1-form">
        <div class="field">
            <label>Выберите дату</label>
            <input name="date" type="date" required>
        </div>
        <div class="field">
            <button type="submit" class="ui fluid primary button">Вывести список приглашенных</button>
        </div>
    </form>
    <div class="ui divider"></div>
    <h3>Приглашенные (<span id="invited-count">0</span>)</h3>
    <table id="task-1-table" class="ui unstackable striped selectable table center aligned fluid">
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
