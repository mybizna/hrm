<?php

namespace Modules\Hrm\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class PayrollCalendarTypeSetting extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'pay_calendar_id', 'cal_type', 'pay_day', 'custom_month_day', 'pay_day_mode',
    ];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['pay_calendar_id', 'cal_type'];

    /**
     * List of tables names that are need in this model during migration.
     *
     * @var array<string>
     */
    public array $migrationDependancy = [];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "hrm_payroll_calendar_type_setting";

    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table): void
    {
        $this->fields = $table ?? new Blueprint($this->table);
        
        $this->fields->increments('id')->html('number');
        $this->fields->integer('pay_calendar_id')->html('recordpicker')->table(['hrm', 'payroll_calendar']);
        $this->fields->integer('cal_type')->default(0)->html('number');
        $this->fields->integer('pay_day')->default(0)->html('number');
        $this->fields->integer('custom_month_day')->default(0)->html('number');
        $this->fields->integer('pay_day_mode')->default(0)->html('number');
    }
}
