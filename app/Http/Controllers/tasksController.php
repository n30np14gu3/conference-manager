<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\MemberRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class tasksController extends Controller
{
    public function task1(Request $request){
        $response = [
            'code' => 'ERROR',
            'message' => '',
            'data' => null,
        ];

        $date = @$request['date'];
        if(!$date){
            $response['message'] = 'Не указана дата';
            return response()->json($response);
        }

        $members =
            MemberRole::query()->where('first_distribution_date', $date)->
            join('members', 'members.email', '=', 'members_roles.member_email')->
            select('members.first_name', 'members.last_name', 'members.email')->get();
        $response['code'] = 'OK';
        $response['data'] = [
            'inv_count' => $members->count(),
            'inv' => $members
        ];

        return response()->json($response);
    }

    public function task2(Request $request){
        $response = [
            'code' => 'ERROR',
            'message' => '',
        ];

        $messages = [
            'required' => 'Не все поля заполнены',
            'exists' => 'Пользователь с таким email не найден',
            'email' => 'Неверный формат почтового ящика',
            'date' => 'Неверный формат даты',
            'numeric' => 'Неверный формат взноса'
        ];

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:members,email',
            'amount' => 'required|numeric',
            'date' => 'required|date'
        ], $messages);

        if($validator->fails()){
            $response['message'] = $validator->errors()->first();
            return response()->json($response);
        }

        $memberRole = MemberRole::query()->where('member_email', $request['email'])->get()->first();
        if($memberRole->first_distribution_date != null){
            $response['message'] = 'Приглашение данному пользователю уже отправлено';
            return response()->json($response);
        }

        if(strtotime($request['date']) == 0){
            $response['message'] = 'Неверный формат даты!';
            return response()->json($response);
        }

        if(strtotime($request['date']) < strtotime($memberRole->application_date)){
            $response['message'] = 'Дата оплаты оргвзноса должна быть больше чем дата подачи заявления!';
             return response()->json($response);
        }
        $memberRole->first_distribution_date = date("Y-m-d");
        $memberRole->second_distribution_date = date("Y-m-d") + 60 * 60 * 24;
        $memberRole->fee_date = $request['date'];
        $memberRole->fee_amount = $request['amount'];
        $memberRole->save();


        $response['code'] = 'OK';
        return response()->json($response);
    }

    public function task3(Request $request){
        $response = [
            'code' => 'ERROR',
            'message' => '',
            'data' => null,
        ];

        $members =
            MemberRole::query()->whereNotNull('first_distribution_date')->
            join('members', 'members.email', '=', 'members_roles.member_email')->
            select('members.first_name', 'members.last_name', 'members.email', 'fee_amount')->get();
        $response['code'] = 'OK';
        $response['data'] = [
            'inv_count' => $members->count(),
            'inv' => $members
        ];

        return response()->json($response);
    }

    public function task4(Request $request){
        $response = [
            'code' => 'ERROR',
            'message' => '',
            'data' => null,
        ];

        $messages = [
            'required' => 'Не все поля заполнены',
            'date' => 'Неверный формат даты',
        ];

        $validator = Validator::make($request->all(), [
            'date-to' => 'required|date',
            'date-from' => 'required|date'
        ], $messages);

        if($validator->fails()){
            $response['message'] = $validator->errors()->first();
            return response()->json($response);
        }

        $members =
            MemberRole::query()->whereBetween('fee_date',[$request['date-from'], $request['date-to']])->
            join('members', 'members.email', '=', 'members_roles.member_email')->
            select('members.first_name', 'members.last_name', 'members.email')->get();
        $response['code'] = 'OK';
        $response['data'] = [
            'inv_count' => $members->count(),
            'inv' => $members
        ];

        return response()->json($response);
    }

    public function task5(Request $request){
        $response = [
            'code' => 'ERROR',
            'message' => '',
            'data' => null,
        ];

        $messages = [
            'required' => 'Не все поля заполнены',
        ];

        $validator = Validator::make($request->all(), [
            'city' => 'required',
        ], $messages);

        if($validator->fails()){
            $response['message'] = $validator->errors()->first();
            return response()->json($response);
        }

        $members = Member::query()->
        where('city', $request['city'])->
        join('members_roles', 'members_roles.member_email', '=', 'members.email')->
        whereNotNull('topic_report')->
        select('topic_report')->get();

        $response['code'] = 'OK';
        $response['data'] = [
            'reports_count' => $members->count(),
            'reports' => $members
        ];

        return response()->json($response);
    }

    public function task6(Request $request){
        $response = [
            'code' => 'ERROR',
            'message' => '',
            'data' => null,
        ];

        $messages = [
            'required' => 'Не все поля заполнены',
        ];

        $validator = Validator::make($request->all(), [
            'city' => 'required',
        ], $messages);

        if($validator->fails()){
            $response['message'] = $validator->errors()->first();
            return response()->json($response);
        }

        $members = Member::query()->
        where('city', $request['city'])->
        join('members_roles', 'members_roles.member_email', '=', 'members.email')->where('need_hotel', '=', '1')->
        select('first_name', 'last_name', 'email')->get();

        $response['code'] = 'OK';
        $response['data'] = [
            'inv_count' => $members->count(),
            'inv' => $members
        ];

        return response()->json($response);
    }

    public function all(Request $request){
        $response = [
            'code' => 'ERROR',
            'message' => '',
        ];

        $messages = [
            'required' => 'Не все поля заполнены',
            'numeric' => 'Неверный формат взноса'
        ];

        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric',
        ], $messages);

        if($validator->fails()){
            $response['message'] = $validator->errors()->first();
            return response()->json($response);
        }

        MemberRole::query()->whereNull('fee_date')->update([
            'fee_date' => date("Y-m-d"),
            'fee_amount' => $request['amount'],
            'first_distribution_date' => date("Y-m-d"),
            'second_distribution_date' => date("Y-m-d", time() + 60 * 60 * 24)
        ]);

        $response['code'] = 'OK';
        return response()->json($response);
    }
}
