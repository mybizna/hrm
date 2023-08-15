<?php

namespace Modules\Hrm\Entities;

use Illuminate\Database\Schema\Blueprint;
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
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table): void
    {
        $this->fields = $table ?? new Blueprint($this->table);
        
        $this->fields->increments('id')->html('number');
        $this->fields->unsignedInteger('pay_cal_id')->html('recordpicker')->table(['hrm', 'payroll_pay_calendar']);
        $this->fields->date('payment_date')->nullable()->html('date');
        $this->fields->date('from_date')->nullable()->html('date');
        $this->fields->date('to_date')->nullable()->html('date');
        $this->fields->unsignedInteger('approve_status')->default(0)->html('switch');
        $this->fields->unsignedInteger('jr_tran_id')->default(0)->html('number');
    }

}
