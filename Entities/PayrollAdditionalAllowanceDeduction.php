<?php

namespace Modules\Hrm\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Classes\Views\FormBuilder;

class PayrollAdditionalAllowanceDeduction extends BaseModel
{
    /**
     * The fields that can be filled
     * @var array<string>
     */
    protected $fillable = [
        'pay_item_id', 'pay_item_amount', 'empid', 'pay_item_add_or_deduct', 'payrun_id', 'note'
    ];

    /**
     * List of tables names that are need in this model during migration.
     * @var array<string>
     */
    public array $migrationDependancy = [];

    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = "hrm_payroll_additional_allowance_deduction";


    public function  listTable(): ListTable
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('pay_item_id')->type('recordpicker')->table('hrm_payroll_additional_allowance_deduction')->ordering(true);
        $fields->name('pay_item_amount')->type('number')->ordering(true);
        $fields->name('empid')->type('number')->ordering(true);
        $fields->name('pay_item_add_or_deduct')->type('number')->ordering(true);
        $fields->name('payrun_id')->type('number')->ordering(true);
        $fields->name('note')->type('text')->ordering(true);


        return $fields;

    }
    
    public function formBuilder(): FormBuilder
{
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('pay_item_id')->type('recordpicker')->table('hrm_payroll_additional_allowance_deduction')->group('w-1/2');
        $fields->name('pay_item_amount')->type('number')->group('w-1/2');
        $fields->name('empid')->type('number')->group('w-1/2');
        $fields->name('pay_item_add_or_deduct')->type('number')->group('w-1/2');
        $fields->name('payrun_id')->type('number')->group('w-1/2');
        $fields->name('note')->type('text')->group('w-1/2');


        return $fields;

    }

    public function filter(): FormBuilder
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('pay_item_id')->type('recordpicker')->table('hrm_payroll_additional_allowance_deduction')->group('w-1/2');
        $fields->name('pay_item_amount')->type('number')->group('w-1/2');
        $fields->name('empid')->type('number')->group('w-1/2');
        $fields->name('pay_item_add_or_deduct')->type('number')->group('w-1/2');
        

        return $fields;

    }
    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
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
        $table->integer('payrun_id');
        $table->string('note')->nullable();
    }
}
