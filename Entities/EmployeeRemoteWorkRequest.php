<?php

namespace Modules\Hrm\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class EmployeeRemoteWorkRequest extends BaseModel
{

    protected $fillable = ['user_id', 'reason', 'start_date', 'end_date', 'days', 'status'];
    public $migrationDependancy = [];
    protected $table = "hrm_employee_remote_work_request";

    /**
     * List of fields for managing postings.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
    {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('user_id')->default(0)->index('user_id');
        $table->string('reason')->nullable();
        $table->date('start_date');
        $table->date('end_date');
        $table->unsignedSmallInteger('days')->default(0);
        $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
    }
}
