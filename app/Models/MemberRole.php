<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MemberRole
 * @package App\Models
 *
 * @property int id
 *
 * @property string member_email
 *
 * @property boolean is_speaker
 *
 * @property string first_distribution_date
 * @property string second_distribution_date
 * @property string application_date
 *
 * @property string topic_report
 * @property string abstracts_received
 *
 * @property string fee_date
 * @property double fee_amount
 *
 * @property string arrival_date
 * @property string departure_date
 * @property boolean need_hotel
 *
 * @property Member member
 */
class MemberRole extends Model
{
    protected $table = 'members_roles';

    public function member(){
        return $this->belongsTo('App\Models\Member', 'member_email');
    }
}
