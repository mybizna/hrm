<?php

namespace Modules\Hrm\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class PayrollPayCalendar extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['pay_calendar_name', 'pay_calendar_type'];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['pay_calendar_name', 'pay_calendar_type'];

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
    protected $table = "hrm_payroll_pay_calendar";

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

        $fields->name('pay_calendar_name')->type('text')->ordering(true);
        $fields->name('pay_calendar_type')->type('text')->ordering(true);

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

        $fields->name('pay_calendar_name')->type('text')->group('w-1/2');
        $fields->name('pay_calendar_type')->type('text')->group('w-1/2');

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

        $fields->name('pay_calendar_name')->type('text')->group('w-1/6');
        $fields->name('pay_calendar_type')->type('text')->group('w-1/6');

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
        $table->string('pay_calendar_name', 64)->nullable();
        $table->string('pay_calendar_type', 16);
    }
}
