<?php

namespace Modules\Hrm\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class PayrollPayrunDetail extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'payrun_id', 'pay_cal_id', 'payment_date', 'empid', 'pay_item_id', 'pay_item_amount',
        'pay_item_add_or_deduct', 'note', 'approve_status',
    ];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['payrun_id', 'payment_date'];

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
    protected $table = "hrm_payroll_payrun_detail";

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

        $fields->name('payrun_id')->type('number')->ordering(true);
        $fields->name('pay_cal_id')->type('number')->ordering(true);
        $fields->name('payment_date')->type('date')->ordering(true);
        $fields->name('empid')->type('number')->ordering(true);
        $fields->name('pay_item_id')->type('number')->ordering(true);
        $fields->name('pay_item_amount')->type('number')->ordering(true);
        $fields->name('pay_item_add_or_deduct')->type('number')->ordering(true);

        return $fields;

    }

    /**
     * Function for defining form fields in form view.
     *
     * @var string
     *
     * @return void
     */
    public function formBuilder(): FormBuilder
    {
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

    /**
     * Function for defining filter fields in filter view.
     *
     * @var string
     *
     * @return void
     */
    public function filter(): FormBuilder
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('payrun_id')->type('number')->group('w-1/6');
        $fields->name('pay_cal_id')->type('number')->group('w-1/6');
        $fields->name('payment_date')->type('date')->group('w-1/6');
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
