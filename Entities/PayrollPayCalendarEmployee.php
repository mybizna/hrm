<?php

namespace Modules\Hrm\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

use Modules\Core\Classes\Views\ListTable;
use Modules\Core\Classes\Views\FormBuilder;

class PayrollPayCalendarEmployee extends BaseModel
{

    protected $fillable = ['pay_calendar_id', 'empid'];
    public $migrationDependancy = [];
    protected $table = "hrm_payroll_pay_calendar_employee";


    public function listTable(){
        // listing view fields
        $fields = new ListTable();

        $fields->name('pay_calendar_id')->type('recordpicker')->table('hrm_payroll_pay_calendar')->ordering(true);
        $fields->name('empid')->type('number')->ordering(true);

        return $fields;

    }
    
    public function formBuilder(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('pay_calendar_id')->type('recordpicker')->table('hrm_payroll_pay_calendar')->group('w-1/2');
        $fields->name('empid')->type('number')->group('w-1/2');

        return $fields;

    }

    public function filter(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('pay_calendar_id')->type('recordpicker')->table('hrm_payroll_pay_calendar')->group('w-1/6');
        $fields->name('empid')->type('number')->group('w-1/6');






        return $fields;

    }
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
