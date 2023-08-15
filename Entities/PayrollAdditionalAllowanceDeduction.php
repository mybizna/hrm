<?php

namespace Modules\Hrm\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class PayrollAdditionalAllowanceDeduction extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'pay_item_id', 'pay_item_amount', 'empid', 'pay_item_add_or_deduct', 'payrun_id', 'note',
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
    protected $table = "hrm_payroll_additional_allowance_deduction";

    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);

        $this->fields->increments('id')->html('number');
        $this->fields->integer('pay_item_id')->html('recordpicker')->relation(['hrm', 'payroll_additional_allowance_deduction']);
        $this->fields->decimal('pay_item_amount', 10, 2)->html('number');
        $this->fields->integer('empid')->html('number');
        $this->fields->integer('pay_item_add_or_deduct')->html('number');
        $this->fields->integer('payrun_id')->html('number');
        $this->fields->string('note')->nullable()->html('text');
    }

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {
        $structure = [
            'table' => ['pay_item_id', 'pay_item_amount', 'empid', 'pay_item_add_or_deduct', 'payrun_id', 'note'],
            'filter' => ['pay_item_id', 'pay_item_amount', 'empid', 'pay_item_add_or_deduct', 'payrun_id'],
        ];

        return $structure;
    }
}
