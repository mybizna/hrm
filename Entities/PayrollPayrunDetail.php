<?php

namespace Modules\Hrm\Entities;

use Illuminate\Database\Schema\Blueprint;
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
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);

        $this->fields->increments('id')->html('number');
        $this->fields->unsignedInteger('payrun_id')->html('number');
        $this->fields->unsignedInteger('pay_cal_id')->html('number');
        $this->fields->date('payment_date')->nullable()->html('date');
        $this->fields->unsignedInteger('empid')->html('number');
        $this->fields->integer('pay_item_id')->html('number');
        $this->fields->decimal('pay_item_amount', 10, 2)->html('number');
        $this->fields->integer('pay_item_add_or_deduct')->html('number');
        $this->fields->string('note')->nullable()->html('text');
        $this->fields->unsignedInteger('approve_status')->default(0)->html('switch');
    }

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {

        $structure['table'] = ['payrun_id', 'pay_cal_id', 'payment_date', 'empid', 'pay_item_id', 'pay_item_amount', 'approve_status'];
        $structure['form'] = [
            ['label' => 'Payroll Payrun Payrun', 'class' => 'col-span-full', 'fields' => ['payrun_id']],
            ['label' => 'Payroll Payrun Detail', 'class' => 'col-span-full  md:col-span-6 md:pr-2', 'fields' => ['pay_cal_id', 'payment_date', 'empid', 'pay_item_id']],
            ['label' => 'Payroll Payrun Other', 'class' => 'col-span-full  md:col-span-6 md:pr-2', 'fields' => ['pay_item_amount', 'pay_item_add_or_deduct', 'note', 'approve_status']],
        ];
        $structure['filter'] = ['payrun_id', 'pay_cal_id', 'payment_date', 'empid', 'pay_item_id', 'pay_item_amount'];

        return $structure;
    }


    /**
     * Define rights for this model.
     *
     * @return array
     */
    public function rights(): array
    {
        $rights = parent::rights();

        $rights['staff'] = ['view' => true];
        $rights['registered'] = ['view' => true];
        $rights['guest'] = [];

        return $rights;
    }

}
