<?php

namespace Modules\Hrm\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class PayrollPayCalendarEmployee extends BaseModel
{

    protected $fillable = ['pay_calendar_id', 'empid'];
    public $migrationDependancy = [];
    protected $table = "hrm_payroll_pay_calendar_employee";

    /**
     * List of fields for managing postings.
     *
     * @param Blueprint $table
     *
     * @return void
     */
    public function migration(Blueprint $table)
    {
        $table->increments('id');
        $table->integer('pay_calendar_id');
        $table->bigInteger('empid');
    }
}
