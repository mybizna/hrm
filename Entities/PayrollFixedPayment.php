<?php

namespace Modules\Hrm\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

use Modules\Core\Classes\Views\ListTable;
use Modules\Core\Classes\Views\FormBuilder;

class PayrollFixedPayment extends BaseModel
{

    protected $fillable = [
        'pay_item_id', 'pay_item_amount', 'empid', 'pay_item_add_or_deduct', 'note'
    ];
    public $migrationDependancy = [];
    protected $table = "hrm_payroll_fixed_payment";


    public function listTable(){
        // listing view fields
        $fields = new ListTable();

        $fields->name('pay_item_id')->type('recordpicker')->table('hrm_payroll_additional_allowance_deduction')->ordering(true);
        $fields->name('pay_item_amount')->type('number')->ordering(true);
        $fields->name('empid')->type('number')->ordering(true);
        $fields->name('pay_item_add_or_deduct')->type('number')->ordering(true);
        $fields->name('note')->type('text')->ordering(true);

        return $fields;

    }
    
    public function formBuilder(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('pay_item_id')->type('recordpicker')->table('hrm_payroll_additional_allowance_deduction')->group('w-1/2');
        $fields->name('pay_item_amount')->type('number')->group('w-1/2');
        $fields->name('empid')->type('number')->group('w-1/2');
        $fields->name('pay_item_add_or_deduct')->type('number')->group('w-1/2');
        $fields->name('note')->type('text')->group('w-1/2');


        return $fields;

    }

    public function filter(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('pay_item_id')->type('recordpicker')->table('hrm_payroll_additional_allowance_deduction')->group('w-1/6');
        $fields->name('pay_item_amount')->type('number')->group('w-1/6');
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
        $table->integer('pay_item_id');
        $table->decimal('pay_item_amount', 10, 2);
        $table->integer('empid');
        $table->integer('pay_item_add_or_deduct');
        $table->string('note')->nullable();
    }
}
