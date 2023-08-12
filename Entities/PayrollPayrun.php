<?php

namespace Modules\Hrm\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class PayrollPayrun extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['pay_cal_id', 'payment_date', 'from_date', 'to_date', 'approve_status', 'jr_tran_id'];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['pay_cal_id', 'payment_date'];
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
    protected $table = "hrm_payroll_payrun";

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

        $fields->name('pay_cal_id')->type('recordpicker')->table(['hrm', 'payroll_pay_calenda'])->ordering(true);
        $fields->name('payment_date')->type('date')->ordering(true);
        $fields->name('from_date')->type('date')->ordering(true);
        $fields->name('to_date')->type('date')->ordering(true);
        $fields->name('approve_status')->type('number')->ordering(true);
        $fields->name('jr_tran_id')->type('number')->ordering(true);

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

        $fields->name('pay_cal_id')->type('recordpicker')->table(['hrm', 'payroll_pay_calenda'])->group('w-1/2');
        $fields->name('payment_date')->type('date')->group('w-1/2');
        $fields->name('from_date')->type('date')->group('w-1/2');
        $fields->name('to_date')->type('date')->group('w-1/2');
        $fields->name('approve_status')->type('number')->group('w-1/2');
        $fields->name('jr_tran_id')->type('number')->group('w-1/2');

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

        $fields->name('pay_cal_id')->type('recordpicker')->table(['hrm', 'payroll_pay_calenda'])->group('w-1/6');
        $fields->name('payment_date')->type('date')->group('w-1/6');
        $fields->name('from_date')->type('date')->group('w-1/6');
        $fields->name('to_date')->type('date')->group('w-1/6');

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
        $table->unsignedInteger('pay_cal_id');
        $table->date('payment_date')->nullable();
        $table->date('from_date')->nullable();
        $table->date('to_date')->nullable();
        $table->unsignedInteger('approve_status')->default(0);
        $table->unsignedInteger('jr_tran_id')->default(0);
    }
}
