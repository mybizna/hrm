<?php

namespace Modules\Hrm\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class PayrollAdditionalAllowanceDeduction extends BaseModel
{

    protected $fillable = [
        'pay_item_id', 'pay_item_amount', 'empid', 'pay_item_add_or_deduct', 'payrun_id', 'note'
    ];
    public $migrationDependancy = [];
    protected $table = "hrm_payroll_additional_allowance_deduction";

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
        $table->integer('payrun_id');
        $table->string('note')->nullable();
    }
}
