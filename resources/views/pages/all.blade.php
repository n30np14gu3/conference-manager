@extends('index')

@section('page-title',  'Выдать приглашение всем')

@section('all', 'active')


@section('main-content')
    <div class="ui info message">
        <p><b>Дополнительно</b> - Необходимо предусмотреть возможность выдачи приглашения всем участникам с указанием в нем необходимой информации.</p>
    </div>
    <form class="ui small form" id="task-all-form">
        <div class="field">
            <label>Сумма оргвзноса</label>
            <input name="amount" type="number" required>
        </div>
        <div class="field">
            <button type="submit" class="ui fluid primary button">Выдать всем</button>
        </div>
    </form>
@endsection
