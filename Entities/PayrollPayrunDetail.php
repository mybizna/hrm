<?php

namespace Modules\Hrm\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

use Modules\Core\Classes\Views\ListTable;
use Modules\Core\Classes\Views\FormBuilder;

class PayrollPayrunDetail extends BaseModel
{

    protected $fillable = [
        'payrun_id', 'pay_cal_id','payment_date','empid','pay_item_id','pay_item_amount',
        'pay_item_add_or_deduct','note','approve_status'
       ];
    public $migrationDependancy = [];
    protected $table = "hrm_payroll_payrun_detail";


    public function listTable(){
        // listing view fields
        $fields = new ListTable();

        $fields->name('payrun_id')->type('number')->ordering(true);
        $fields->name('pay_cal_id')->type('number')->ordering(true);
        $fields->name('payment_date')->type('date')->ordering(true);
        $fields->name('empid')->type('number')->ordering(true);
        $fields->name('pay_item_id')->type('number')->ordering(true);
        $fields->name('pay_item_amount')->type('number')->ordering(true);
        $fields->name('pay_item_add_or_deduct')->type('number')->ordering(true);

        return $fields;

    }
    
    public function formBuilder(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('payrun_id')->type('number')->group('w-1/2');
        $fields->name('pay_cal_id')->type('number')->group('w-1/2');
        $fields->name('payment_date')->type('date')->group('w-1/2');
        $fields->name('empid')->type('number')->group('w-1/2');
        $fields->name('pay_item_id')->type('number')->group('w-1/2');
        $fields->name('pay_item_amount')->type('number')->group('w-1/2');
        $fields->name('pay_item_add_or_deduct')->type('number')->group('w-1/2');
        $fields->name('note')->type('text')->group('w-1/2');
        $fields->name('approve_status')->type('number')->group('w-1/2');
        

        return $fields;

    }

    public function filter(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('payrun_id')->type('number')->group('w-1/6');
        $fields->name('pay_cal_id')->type('number')->group('w-1/6');
        $fields->name('payment_date')->type('date')->group('w-1/6');
        $fields->name('empid')->type('number')->group('w-1/6');
        

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
        $table->unsignedInteger('payrun_id');
        $table->unsignedInteger('pay_cal_id');
        $table->date('payment_date')->nullable();
        $table->unsignedInteger('empid');
        $table->integer('pay_item_id');
        $table->decimal('pay_item_amount', 10, 2);
        $table->integer('pay_item_add_or_deduct');
        $table->string('note')->nullable();
        $table->unsignedInteger('approve_status')->default(0);
    }
}
