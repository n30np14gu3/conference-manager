<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Member
 * @package App\Models
 *
 * @property int id
 *
 * @property string first_name
 * @property string last_name
 * @property string middle_name
 *
 * @property string degree
 * @property string work_place
 * @property string department
 * @property string position
 *
 * @property string country
 * @property string city
 * @property int zip
 * @property string address
 *
 * @property string work_phone
 * @property string home_phone
 * @property string email
 *
 * @property MemberRole role
 */
class Member extends Model
{
    protected $table = 'members';

    public function role(){
        return $this->hasOne('App\Models\MemberRole', 'member_email');
    }
}
