<?php

namespace Modules\Hrm\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class PayrollCalendarTypeSetting extends BaseModel
{

    protected $fillable = [
        'pay_calendar_id', 'cal_type', 'pay_day', 'custom_month_day', 'pay_day_mode'
    ];
    public $migrationDependancy = [];
    protected $table = "hrm_payroll_calendar_type_setting";

    /**
     * List of fields for managing postings.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
    {
        $table->increments('id');
        $table->integer('pay_calendar_id');
        $table->integer('cal_type')->default(0);
        $table->integer('pay_day')->default(0);
        $table->integer('custom_month_day')->default(0);
        $table->integer('pay_day_mode')->default(0);
    }
}
