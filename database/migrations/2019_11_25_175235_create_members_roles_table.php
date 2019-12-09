<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members_roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('member_email', 100);//Внешний ключ для связи с таблицей участников

            $table->boolean('is_speaker');//Роль участника (участник / спикер)

            $table->date('application_date');//Дата подачи заявки
            $table->date('first_distribution_date')->nullable();//Дата первой рассылки
            $table->date('second_distribution_date')->nullable();//Дата второй рассылки

            $table->string('topic_report', 100)->nullable();//Тема доклада
            $table->boolean('abstracts_received')->default(0)->nullable();//Были ли доставлены тезисы доклада

            $table->date('fee_date')->nullable();//Дата организационного взноса
            $table->integer('fee_amount')->nullable();//Сумма организационного взноса

            $table->date('arrival_date')->nullable();//Дата прибывтия
            $table->date('departure_date')->nullable();//Дата отбытия
            $table->boolean('need_hotel')->nullable();//Нужен ли отель

            $table->timestamps();
        });

        Schema::table('members_roles', function (Blueprint $table){
            $table->foreign('member_email')->references('email')->on('members');//Создание внешнего ключа
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members_roles');
    }
}
