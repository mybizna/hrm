<?php

namespace Modules\Hrm\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class LeaveEncashmentRequest extends BaseModel
{

    protected $fillable = [
        'user_id', 'leave_id', 'approved_by', 'approval_status_id', 'encash_days',
        'forward_days', 'amount', 'total', 'f_year'
    ];
    public $migrationDependancy = [];
    protected $table = "hrm_leave_encashment_request";

    /**
     * List of fields for managing postings.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
    {

        $table->bigIncrements('id');
        $table->unsignedBigInteger('user_id')->index('user_id');
        $table->unsignedSmallInteger('leave_id')->index('leave_id');
        $table->unsignedBigInteger('approved_by')->nullable();
        $table->unsignedTinyInteger('approval_status_id')->default(1);
        $table->unsignedDecimal('encash_days', 4, 1)->default(0.0);
        $table->unsignedDecimal('forward_days', 4, 1)->default(0.0);
        $table->decimal('amount', 20, 2)->default(0.00);
        $table->decimal('total', 20, 2)->default(0.00);
        $table->unsignedSmallInteger('f_year')->index('f_year');
    }
}
