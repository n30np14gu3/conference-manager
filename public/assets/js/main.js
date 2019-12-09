$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function showToast(text, type, duration) {
    $('body')
        .toast({
            class: type.toString(),
            displayTime: duration,
            closeIcon: true,
            message: text,
            showIcon: 'microchip'
        });
}

function getAccounts() {
    let count = Number(prompt('Введите кол-во тестовых аккаунтов (не больше 100)'));
    if(count <= 0)
        return;

    $.ajax({
        url: '/demo',
        method: 'POST',
        data: {'count': count},
        success: function (data) {
            data = JSON.parse(data);
            if(data.status === "OK"){
                showToast('Аккаунты успешно сгенерированы!', 'success', 3000);
            }
            else{
                showToast('Ошибка генерации!', 'error', 3000);
            }
        }
    });
}

function escapeHtml(text) {
    return text.toString()
        .replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;")
        .replace(/"/g, "&quot;")
        .replace(/'/g, "&#039;");
}

function task1add(first_name, last_name, email) {
    email = escapeHtml(email);
    last_name = escapeHtml(last_name);
    first_name = escapeHtml(first_name);
    $('#task-1-table tbody').append(`<tr><td>${first_name}</td><td>${last_name}</td><td>${email}</td></tr>`);
}

function task2add(first_name, last_name, email, fee_amount) {
    email = escapeHtml(email);
    last_name = escapeHtml(last_name);
    first_name = escapeHtml(first_name);
    fee_amount = escapeHtml(fee_amount);
    $('#task-3-table tbody').append(`<tr><td>${first_name}</td><td>${last_name}</td><td>${email}</td><td>${fee_amount}</td></tr>`);
}

function task4add(first_name, last_name, email) {
    email = escapeHtml(email);
    last_name = escapeHtml(last_name);
    first_name = escapeHtml(first_name);
    $('#task-4-table tbody').append(`<tr><td>${first_name}</td><td>${last_name}</td><td>${email}</td></tr>`);
}

function task5add(topic_report) {
    topic_report = escapeHtml(topic_report);
    $('#task-5-table tbody').append(`<tr><td>${topic_report}</td></tr>`);
}

function task6add(first_name, last_name, email) {
    email = escapeHtml(email);
    last_name = escapeHtml(last_name);
    first_name = escapeHtml(first_name);
    $('#task-6-table tbody').append(`<tr><td>${first_name}</td><td>${last_name}</td><td>${email}</td></tr>`);
}

function showInv() {
    $.ajax({
        method: 'GET',
        url: '/tasks/actions/3',
        success: function (data) {
            if(data.code === "OK"){
                data = data.data;
                $('#task-3-table tbody').empty();
                data.inv.forEach(function (item, i, array) {
                    task2add(item.first_name, item.last_name, item.email, item.fee_amount);
                });
            }
            else{
                showToast(data.message, 'error', 3000);
            }
        }
    });
}

$('#tak-1-form').submit(function (e) {
    e.preventDefault();
    $.ajax({
       method: 'GET',
       url: '/tasks/actions/1',
       data: $('#tak-1-form').serialize(),
       success: function (data) {
           if(data.code === "OK"){
               data = data.data;
               $('#invited-count').text(data.inv_count);
               $('#task-1-table tbody').empty();
               data.inv.forEach(function (item, i, array) {
                  task1add(item.first_name, item.last_name, item.email);
               });
           }
           else{
               showToast(data.message, 'error', 3000);
           }
       }
    });
});

$('#task-2-form').submit(function (e) {
    e.preventDefault();
    $.ajax({
        method: 'POST',
        url: '/tasks/actions/2',
        data: $('#task-2-form').serialize(),
        success: function (data) {
            if(data.code === 'OK'){
                showToast('Приглашение успешно отправлено!', 'success', 3000);
            }
            else{
                showToast(data.message, 'error', 3000);
            }
        }
    });
});

$('#task-4-form').submit(function (e) {
    e.preventDefault();
    $.ajax({
        method: 'GET',
        url: '/tasks/actions/4',
        data: $('#task-4-form').serialize(),
        success: function (data) {
            if(data.code === "OK"){
                data = data.data;
                $('#task-4-table tbody').empty();
                data.inv.forEach(function (item, i, array) {
                    task4add(item.first_name, item.last_name, item.email);
                });
            }
            else{
                showToast(data.message, 'error', 3000);
            }
        }
    });
});

$('#task-5-form').submit(function (e) {
    e.preventDefault();
    $.ajax({
        method: 'GET',
        url: '/tasks/actions/5',
        data: $('#task-5-form').serialize(),
        success: function (data) {
            if(data.code === "OK"){
                data = data.data;
                $('#task-5-table tbody').empty();
                data.reports.forEach(function (item, i, array) {
                    task5add(item.topic_report);
                });
            }
            else{
                showToast(data.message, 'error', 3000);
            }
        }
    });
});

$('#task-6-form').submit(function (e) {
    e.preventDefault();
    $.ajax({
        method: 'GET',
        url: '/tasks/actions/6',
        data: $('#task-6-form').serialize(),
        success: function (data) {
            if(data.code === "OK"){
                data = data.data;
                $('#task-5-table tbody').empty();
                data.inv.forEach(function (item, i, array) {
                    task6add(item.first_name, item.last_name, item.email);
                });
            }
            else{
                showToast(data.message, 'error', 3000);
            }
        }
    });
});

$('#task-all-form').submit(function (e) {
    e.preventDefault();
    $.ajax({
        method: 'POST',
        url: '/tasks/actions/all',
        data: $('#task-all-form').serialize(),
        success: function (data) {
            if(data.code === 'OK'){
                showToast('Приглашение успешно отправлено!', 'success', 3000);
            }
            else{
                showToast(data.message, 'error', 3000);
            }
        }
    });
});
