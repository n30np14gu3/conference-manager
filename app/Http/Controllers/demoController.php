<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\MemberRole;
use Illuminate\Http\Request;

class demoController extends Controller
{
    public function demo(Request $request){
        $count =  abs((int)@$request['count']) % 101;
        if($count == 0){
            return json_encode(['status' => 'ERROR']);
        }

        $degree = "dg_".hash("md5", openssl_random_pseudo_bytes(32));
        $work_place =  "wp_".hash("md5", openssl_random_pseudo_bytes(32));
        $department = "dp_".hash("md5", openssl_random_pseudo_bytes(32));
        $position = "ps_".hash("md5", openssl_random_pseudo_bytes(32));
        $country = "cn_".hash("md5", openssl_random_pseudo_bytes(32));
        $city = "ct_".hash("md5", openssl_random_pseudo_bytes(32));

        $application_date = date("Y-m-d",  rand(1262304000, 1574765654));
        $first_distribution_date = "";
        $second_distribution_date = "";

        if(rand(1, 100500) % 4 == 0){
            $first_distribution_date = date("Y-m-d", strtotime($application_date) + rand(3600, 604800));
            $second_distribution_date = date("Y-m-d", strtotime($first_distribution_date) + rand(3600, 604800));
        }

        for($i = 0; $i < $count; $i++){

            if(rand(1, 100500) % 7 == 0){
                $degree = "dg_".hash("md5", openssl_random_pseudo_bytes(32));
                $work_place =  "wp_".hash("md5", openssl_random_pseudo_bytes(32));
                $department = "dp_".hash("md5", openssl_random_pseudo_bytes(32));
                $position = "ps_".hash("md5", openssl_random_pseudo_bytes(32));
                $country = "cn_".hash("md5", openssl_random_pseudo_bytes(32));
                $city = "ct_".hash("md5", openssl_random_pseudo_bytes(32));

                $application_date = date("Y-m-d",  rand(1262304000, 1574765654));
                $first_distribution_date = "";
                $second_distribution_date = "";

                if(rand(1, 100500) % 4 == 0){
                    $first_distribution_date = date("Y-m-d", strtotime($application_date) + rand(3600, 604800));
                    $second_distribution_date = date("Y-m-d", strtotime($first_distribution_date) + rand(3600, 604800));
                }
            }

            $member = new Member();


            $member->first_name = "fn_".hash("md5", openssl_random_pseudo_bytes(32));
            $member->last_name = "mn_".hash("md5", openssl_random_pseudo_bytes(32));
            $member->middle_name = "mn_".hash("md5", openssl_random_pseudo_bytes(32));

            $member->degree = $degree;
            $member->work_place = $work_place;
            $member->department = $department;
            $member->position = $position;

            $member->country = $country;
            $member->city = $city;
            $member->address = "ad_".hash("md5", openssl_random_pseudo_bytes(32));
            $member->zip = rand(10000, 99999);

            $member->work_phone = "wph_".hash("md5", openssl_random_pseudo_bytes(32));
            $member->home_phone = "hph_".hash("md5", openssl_random_pseudo_bytes(32));
            $member->email = hash("md5", openssl_random_pseudo_bytes(32))."@yandex.ru";

            $member->save();

            $role = new MemberRole();

            $role->member_email = $member->email;

            $role->is_speaker = (rand(1, 1337) % 5  == 0) ? 1 : 0;

            $role->application_date = $application_date;

            if($role->is_speaker){
                $role->topic_report = "tr_".hash("md5", openssl_random_pseudo_bytes(32));
                $role->abstracts_received = (rand(1, 1337) % 3  == 0) ? 1 : 0;
            }

            if($first_distribution_date != ""){
                $role->first_distribution_date = $first_distribution_date;
                $role->second_distribution_date = $second_distribution_date;

                $role->fee_date = date("Y-m-d", strtotime($role->application_date) + rand(3600, 604800));
                $role->fee_amount = rand(1000, 30000);

                $role->arrival_date = date("Y-m-d", strtotime($role->fee_date) + rand(3600, 604800));
                $role->departure_date = date("Y-m-d", strtotime($role->arrival_date) + rand(3600, 1209600));
                $role->need_hotel = (rand(1, 1337) % 15  == 0) ? 1 : 0;
            }
            $role->save();
        }

        return json_encode(['status' => 'OK']);
    }

    public function test(Request  $request){
        dd($request->request);
    }
}
