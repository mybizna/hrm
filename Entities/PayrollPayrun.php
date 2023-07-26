<?php

namespace Modules\Hrm\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

use Modules\Core\Classes\Views\ListTable;
use Modules\Core\Classes\Views\FormBuilder;

class PayrollPayrun extends BaseModel
{

    protected $fillable = ['pay_cal_id', 'payment_date', 'from_date', 'to_date', 'approve_status', 'jr_tran_id'];
    public $migrationDependancy = [];
    protected $table = "hrm_payroll_payrun";


    public function listTable(){
        // listing view fields
        $fields = new ListTable();

        $fields->name('pay_cal_id')->type('recordpicker')->table('hrm_payroll_pay_calendar')->ordering(true);
        $fields->name('payment_date')->type('date')->ordering(true);
        $fields->name('from_date')->type('date')->ordering(true);
        $fields->name('to_date')->type('date')->ordering(true);
        $fields->name('approve_status')->type('number')->ordering(true);
        $fields->name('jr_tran_id')->type('number')->ordering(true);


        return $fields;

    }
    
    public function formBuilder(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('pay_cal_id')->type('recordpicker')->table('hrm_payroll_pay_calendar')->group('w-1/2');
        $fields->name('payment_date')->type('date')->group('w-1/2');
        $fields->name('from_date')->type('date')->group('w-1/2');
        $fields->name('to_date')->type('date')->group('w-1/2');
        $fields->name('approve_status')->type('number')->group('w-1/2');
        $fields->name('jr_tran_id')->type('number')->group('w-1/2');

        return $fields;

    }

    public function filter(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('pay_cal_id')->type('recordpicker')->table('hrm_payroll_pay_calendar')->group('w-1/6');
        $fields->name('payment_date')->type('date')->group('w-1/6');
        $fields->name('from_date')->type('date')->group('w-1/6');
        $fields->name('to_date')->type('date')->group('w-1/6');

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
        $table->unsignedInteger('pay_cal_id');
        $table->date('payment_date')->nullable();
        $table->date('from_date')->nullable();
        $table->date('to_date')->nullable();
        $table->unsignedInteger('approve_status')->default(0);
        $table->unsignedInteger('jr_tran_id')->default(0);
    }
}
