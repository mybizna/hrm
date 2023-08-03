<?php

namespace Modules\Hrm\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class PayrollPayCalendarEmployee extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['pay_calendar_id', 'empid'];

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
    protected $table = "hrm_payroll_pay_calendar_employee";

    /**
     * Function for defining list of fields in table view.
     *
     * @param Blueprint $table
     *
     * @return void
     */
    public function listTable(): ListTable
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('pay_calendar_id')->type('recordpicker')->table('hrm_payroll_pay_calendar')->ordering(true);
        $fields->name('empid')->type('number')->ordering(true);

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

        $fields->name('pay_calendar_id')->type('recordpicker')->table('hrm_payroll_pay_calendar')->group('w-1/2');
        $fields->name('empid')->type('number')->group('w-1/2');

        return $fields;

    }

    /**
     * Function for defining filter fields in filter view.
     * 
     * @return FormBuilder
     */
    public function filter(): FormBuilder
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('pay_calendar_id')->type('recordpicker')->table('hrm_payroll_pay_calendar')->group('w-1/6');
        $fields->name('empid')->type('number')->group('w-1/6');

        return $fields;

    }
    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     *
     * @return void
     */
    public function migration(Blueprint $table): void
    {
        $table->increments('id');
        $table->integer('pay_calendar_id');
        $table->bigInteger('empid');
    }
}
