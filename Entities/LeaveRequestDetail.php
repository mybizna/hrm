<?php

namespace Modules\Hrm\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class LeaveRequestDetail extends BaseModel
{

    protected $fillable = [
        'leave_request_id', 'leave_approval_status_id', 'workingday_status',
        'user_id', 'f_year', 'leave_date'
    ];
    public $migrationDependancy = [];
    protected $table = "hrm_leave_request_detail";

    /**
     * List of fields for managing postings.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
    {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('leave_request_id')->index('leave_request_id');
        $table->unsignedBigInteger('leave_approval_status_id');
        $table->unsignedTinyInteger('workingday_status')->default(1);
        $table->unsignedBigInteger('user_id')->index('user_id');
        $table->smallInteger('f_year');
        $table->integer('leave_date');

        $table->index(['user_id', 'f_year', 'leave_date'], 'user_fyear_leave');
    }
}
