@extends('index')

@section('page-title', 'Conference manger')

@section('main-content')
    <div class="ui text container">
        <div style="align-items: center; text-align: center">
            <h1 class="ui header">
                Управление конференциями
            </h1>
            <h2>Пояснения ниже.</h2>
        </div>
        <div class="ui info message">
            <ul style="text-align: justify">
                <li><b>Task 1</b> - для указанной даты 1-ой рассылки вывести список приглашенных и посчитать их количество</li>
                <li><b>Task 2</b> - предоставить возможность добавления приглашенных на конференцию с указанием оргвзноса и даты его уплаты</li>
                <li><b>Task 3</b> - вывести список приглашенных, с указанием даты об уплате оргвзноса</li>
                <li><b>Task 4</b> - для указанной интервала дат, вывести список участников, уплативших оргвзнос в этом диапазоне</li>
                <li><b>Task 5</b> - для указанного города вывести название тезисов докладов, поступивших из этого города</li>
                <li><b>Task 6</b> - для указанного города, вывести список нуждающихся в гостинице</li>
            </ul>
        </div>
    </div>
@endsection
