<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name',  100);//Имя
            $table->string('last_name', 100);//Фамилия
            $table->string('middle_name', 100);//Отчество
            $table->string('degree', 100);//Ученая степень
            $table->string('work_place', 100);//Место работы
            $table->string('department', 100);//Кафедра
            $table->string('position', 100);//Должность
            $table->string('country', 100);//Страна
            $table->string('city', 100);//Город
            $table->bigInteger('zip');//Индекс
            $table->text('address');//Адрес
            $table->string('work_phone', 100);//Рабочий телефон
            $table->string('home_phone', 100);//Домашний телефон
            $table->string('email', 64)->unique()->index('member_email_index');//Email
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
