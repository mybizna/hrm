<?php

namespace Modules\Hrm\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
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
     * Function for defining list of fields in table view.
     *
     * @return ListTable
     */
    public function listTable(): ListTable
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('pay_calendar_id')->type('recordpicker')->table('hrm_payroll_calendar')->ordering(true);
        $fields->name('cal_type')->type('number')->ordering(true);
        $fields->name('pay_day')->type('number')->ordering(true);
        $fields->name('custom_month_day')->type('number')->ordering(true);
        $fields->name('pay_day_mode')->type('number')->ordering(true);

        return $fields;

    }

    /**
     * Function for defining form fields in form view.
     * 
     * @return FormBuilder
     */
    public function formBuilder(): FormBuilder
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('pay_calendar_id')->type('recordpicker')->table('hrm_payroll_calendar')->group('w-1/2');
        $fields->name('cal_type')->type('number')->group('w-1/2');
        $fields->name('pay_day')->type('number')->group('w-1/2');
        $fields->name('custom_month_day')->type('number')->group('w-1/2');
        $fields->name('pay_day_mode')->type('number')->group('w-1/2');

        return $fields;

    }

    /**
     * Function for defining list of fields in filter view.
     * 
     * @return FormBuilder
     */
    public function filter(): FormBuilder
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('pay_calendar_id')->type('recordpicker')->table('hrm_payroll_calendar')->group('w-1/6');
        $fields->name('cal_type')->type('number')->group('w-1/6');
        $fields->name('pay_day')->type('number')->group('w-1/6');
        $fields->name('custom_month_day')->type('number')->group('w-1/6');

        return $fields;

    }
    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table): void
    {
        $table->increments('id');
        $table->integer('pay_calendar_id');
        $table->integer('cal_type')->default(0);
        $table->integer('pay_day')->default(0);
        $table->integer('custom_month_day')->default(0);
        $table->integer('pay_day_mode')->default(0);
    }
}
