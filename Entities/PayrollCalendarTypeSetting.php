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
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);

        $this->fields->increments('id')->html('number');
        $this->fields->integer('pay_calendar_id')->html('recordpicker')->relation(['hrm', 'payroll_calendar']);
        $this->fields->integer('cal_type')->default(0)->html('number');
        $this->fields->integer('pay_day')->default(0)->html('number');
        $this->fields->integer('custom_month_day')->default(0)->html('number');
        $this->fields->integer('pay_day_mode')->default(0)->html('number');
    }

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {

        $structure['table'] = ['pay_calendar_id', 'cal_type', 'pay_day', 'custom_month_day', 'pay_day_mode'];
        $structure['form'] = [
            ['label' => 'Pay Calendar', 'class' => 'col-span-full', 'fields' => ['pay_calendar_id']],
            ['label' => 'Payroll Calendar Type Setting', 'class' => 'col-span-full  md:col-span-6 md:pr-2', 'fields' => ['cal_type', 'pay_day']],
            ['label' => 'Payroll Calendar Type More Info', 'class' => 'col-span-full  md:col-span-6 md:pr-2', 'fields' => ['custom_month_day', 'pay_day_mode']],
        ];
        $structure['filter'] = ['pay_calendar_id', 'cal_type', 'pay_day'];

        return $structure;
    }


    /**
     * Define rights for this model.
     *
     * @return array
     */
    public function rights(): array
    {
        $rights = parent::rights();

        $rights['staff'] = ['view' => true];
        $rights['registered'] = ['view' => true];
        $rights['guest'] = [];

        return $rights;
    }
}
