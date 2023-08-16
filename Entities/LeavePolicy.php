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
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);

        $employee_type = ['none' => 'None', 'permanent' => 'Permanent', 'parttime' => 'Parttime', 'contract' => 'Contract', 'temporary' => 'Temporary', 'trainee' => 'Trainee'];
        $gender = ['none' => 'None', 'male' => 'Male', 'female' => 'Female', 'other' => 'other'];
        $marital = ['none' => 'None', 'single' => 'Single', 'married' => 'Married', 'widowed' => 'Widowed'];
        $encashment_based_on = ['pay_rate' => 'Pay Rate', 'basic' => 'Basic', 'gross' => 'Gross'];
        $forward_default = ['encashment' => 'Encashment', 'carryover' => 'Carryover'];

        $this->fields->increments('id');
        $this->fields->unsignedSmallInteger('leave_id')->index('leave_id')->html('recordpicker')->relation(['hrm', 'leave']);
        $this->fields->text('description')->nullable()->html('text');
        $this->fields->unsignedTinyInteger('days')->default(0)->html('number');
        $this->fields->string('color', 10)->nullable()->html('text');
        $this->fields->unsignedTinyInteger('apply_limit')->default(0)->html('number');
        $this->fields->enum('employee_type', array_keys($employee_type))->options($employee_type)->default('permanent')->html('switch');
        $this->fields->integer('department_id')->default(-1)->html('text');
        $this->fields->integer('location_id')->default(-1)->html('text');
        $this->fields->integer('designation_id')->default(-1)->html('text');
        $this->fields->enum('gender', array_keys($gender))->options($gender)->default('none')->html('switch');
        $this->fields->enum('marital', array_keys($marital))->options($marital)->default('none')->html('switch');
        $this->fields->unsignedSmallInteger('f_year')->nullable()->index('f_year')->html('number');
        $this->fields->unsignedTinyInteger('apply_for_new_users')->default(0)->html('number');
        $this->fields->unsignedTinyInteger('carryover_days')->default(0)->html('number');
        $this->fields->unsignedTinyInteger('carryover_uses_limit')->default(0)->html('number');
        $this->fields->unsignedTinyInteger('encashment_days')->default(0)->html('number');
        $this->fields->enum('encashment_based_on', array_keys($encashment_based_on))->options($encashment_based_on)->nullable()->html('switch');
        $this->fields->enum('forward_default', array_keys($forward_default))->options($forward_default)->default('encashment')->html('switch');
        $this->fields->unsignedSmallInteger('applicable_from_days')->default(0)->html('number');
        $this->fields->decimal('accrued_amount', 10, 2)->default(0.00)->html('amount');
        $this->fields->unsignedSmallInteger('accrued_max_days')->default(0)->html('number');
        $this->fields->unsignedTinyInteger('halfday_enable')->default(0)->html('switch');
    }

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {

        $structure = [
            'table' => ['leave_id', 'days', 'apply_limit', 'employee_type', 'department_id', 'location_id', 'designation_id', 'halfday_enable'],
            'form' => [
                ['label' => 'Leave', 'class' => 'w-full', 'fields' => ['leave_id']],
                ['label' => 'Description', 'class' => 'w-full', 'fields' => ['description']],
                ['label' => 'Leave Policy', 'class' => 'w-1/2', 'fields' => ['days', 'color', 'apply_limit', 'employee_type', 'department_id', 'location_id']],
                ['label' => 'Leave Policy', 'class' => 'w-1/2', 'fields' => ['designation_id', 'gender', 'marital', 'f_year', 'apply_for_new_users']],
                ['label' => 'Leave Policy', 'class' => 'w-1/2', 'fields' => ['carryover_days', 'carryover_uses_limit', 'encashment_based_on', 'forward_default']],
                ['label' => 'Leave Policy', 'class' => 'w-1/2', 'fields' => ['applicable_from_days', 'accrued_amount', 'accrued_max_days', 'halfday_enable']],
            ],
            'filter' => ['department_id', 'location_id', 'designation_id'],
        ];

        return $structure;
    }

}
