<?php

namespace Modules\Hrm\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class PayrollFixedPayment extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'pay_item_id', 'pay_item_amount', 'empid', 'pay_item_add_or_deduct', 'note',
    ];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['pay_item_id', 'pay_item_amount'];

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
    protected $table = "hrm_payroll_fixed_payment";

    /**
     * Function for defining list of fields in table view.
     *
     * @return ListTable
     */
    public function listTable(): ListTable
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('pay_item_id')->type('recordpicker')->table(['hrm', 'payroll_additional_allowance_deduction'])->ordering(true);
        $fields->name('pay_item_amount')->type('number')->ordering(true);
        $fields->name('empid')->type('number')->ordering(true);
        $fields->name('pay_item_add_or_deduct')->type('number')->ordering(true);
        $fields->name('note')->type('text')->ordering(true);

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

        $fields->name('pay_item_id')->type('recordpicker')->table(['hrm', 'payroll_additional_allowance_deduction'])->group('w-1/2');
        $fields->name('pay_item_amount')->type('number')->group('w-1/2');
        $fields->name('empid')->type('number')->group('w-1/2');
        $fields->name('pay_item_add_or_deduct')->type('number')->group('w-1/2');
        $fields->name('note')->type('text')->group('w-1/2');

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

        $fields->name('pay_item_id')->type('recordpicker')->table(['hrm', 'payroll_additional_allowance_deduction'])->group('w-1/6');
        $fields->name('pay_item_amount')->type('number')->group('w-1/6');
        $fields->name('empid')->type('number')->group('w-1/6');

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
        $table->integer('pay_item_id');
        $table->decimal('pay_item_amount', 10, 2);
        $table->integer('empid');
        $table->integer('pay_item_add_or_deduct');
        $table->string('note')->nullable();
    }
}
