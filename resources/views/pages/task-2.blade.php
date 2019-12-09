@extends('index')

@section('page-title', 'Task #2')

@section('task-2', 'active')


@section('main-content')
    <div class="ui info message">
        <p><b>Task 2</b> - предоставить возможность добавления приглашенных на конференцию с указанием оргвзноса и даты его уплаты</p>
    </div>
    <div class="ui divider"></div>
    <form class="ui form" id="task-2-form">
        <div class="field">
            <label>Введите Email пользователя</label>
            <input type="email" name="email" required>
        </div>
        <div class="field">
            <label>Введите оргвзнос: </label>
            <input type="number" name="amount" min="1" max="999999999" value="1" required>
        </div>
        <div class="field">
            <label>Введите дату уплаты взноса</label>
            <input type="date" name="date" required>
        </div>
        <div class="field">
            <button type="submit" class="ui primary fluid button">Выдать приглашение</button>
        </div>
    </form>
@endsection
