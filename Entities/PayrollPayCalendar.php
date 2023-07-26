<?php

namespace Modules\Hrm\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;
use Modules\Core\Classes\Views\FormBuilder;
use Modules\Core\Classes\Views\ListTable;

class PayrollPayCalendar extends BaseModel
{

    protected $fillable = ['pay_calendar_name', 'pay_calendar_type'];
    public $migrationDependancy = [];
    protected $table = "hrm_payroll_pay_calendar";

    public function listTable()
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('pay_calendar_name')->type('text')->ordering(true);
        $fields->name('pay_calendar_type')->type('text')->ordering(true);

        return $fields;

    }

    public function formBuilder()
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('pay_calendar_name')->type('text')->group('w-1/2');
        $fields->name('pay_calendar_type')->type('text')->group('w-1/2');

        return $fields;

    }

    public function filter()
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('pay_calendar_name')->type('text')->group('w-1/6');
        $fields->name('pay_calendar_type')->type('text')->group('w-1/6');

        return $fields;

    }
    /**
     * List of fields for managing postings.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
    {
        $table->increments('id');
        $table->string('pay_calendar_name', 64)->nullable();
        $table->string('pay_calendar_type', 16);
    }
}
