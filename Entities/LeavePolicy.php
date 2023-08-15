<?php

namespace Modules\Hrm\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class LeavePolicy extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'leave_id', 'description', 'days', 'color', 'apply_limit', 'employee_type', 'department_id',
        'location_id', 'designation_id', 'gender', 'marital', 'f_year', 'apply_for_new_users',
        'carryover_days', 'carryover_uses_limit', 'encashment_based_on', 'forward_default',
        'applicable_from_days', 'accrued_amount', 'accrued_max_days', 'halfday_enable',
    ];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['leave_id'];

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
    protected $table = "hrm_leave_policy";

    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table): void
    {
        $this->fields = $table ?? new Blueprint($this->table);

        $this->fields->increments('id');
        $this->fields->unsignedSmallInteger('leave_id')->index('leave_id')->html('recordpicker')->table(['hrm', 'leave']);
        $this->fields->text('description')->nullable()->html('text');
        $this->fields->unsignedTinyInteger('days')->default(0)->html('number');
        $this->fields->string('color', 10)->nullable()->html('text');
        $this->fields->unsignedTinyInteger('apply_limit')->default(0)->html('number');
        $this->fields->enum('employee_type', ['none', 'permanent', 'parttime', 'contract', 'temporary', 'trainee'])->default('permanent')->html('switch');
        $this->fields->integer('department_id')->default(-1)->html('text');
        $this->fields->integer('location_id')->default(-1)->html('text');
        $this->fields->integer('designation_id')->default(-1)->html('text');
        $this->fields->enum('gender', ['none', 'male', 'female', 'other'])->default('none')->html('switch');
        $this->fields->enum('marital', ['none', 'single', 'married', 'widowed'])->default('none')->html('switch');
        $this->fields->unsignedSmallInteger('f_year')->nullable()->index('f_year')->html('number');
        $this->fields->unsignedTinyInteger('apply_for_new_users')->default(0)->html('number');
        $this->fields->unsignedTinyInteger('carryover_days')->default(0)->html('number');
        $this->fields->unsignedTinyInteger('carryover_uses_limit')->default(0)->html('number');
        $this->fields->unsignedTinyInteger('encashment_days')->default(0)->html('number');
        $this->fields->enum('encashment_based_on', ['pay_rate', 'basic', 'gross'])->nullable()->html('switch');
        $this->fields->enum('forward_default', ['encashment', 'carryover'])->default('encashment')->html('switch');
        $this->fields->unsignedSmallInteger('applicable_from_days')->default(0)->html('number');
        $this->fields->decimal('accrued_amount', 10, 2)->default(0.00)->html('amount');
        $this->fields->unsignedSmallInteger('accrued_max_days')->default(0)->html('number');
        $this->fields->unsignedTinyInteger('halfday_enable')->default(0)->html('switch');
    }

}
