<?php

namespace Modules\Hrm\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class Employee extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'user_id', 'employee_id', 'designation', 'department', 'location', 'hiring_source',
        'termination_date', 'date_of_birth', 'reporting_to', 'pay_rate', 'pay_type', 'type',
        'status',
    ];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['user_id', 'employee_id'];

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
    protected $table = "hrm_employee";

    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table): void
    {
        $this->fields->bigIncrements('id');
        $this->fields->unsignedBigInteger('user_id')->default(0)->index('user_id')->html('recordpicker')->table(['users']);
        $this->fields->string('employee_id', 20)->nullable()->index('employee_id')->html('recordpicker')->table(['hrm', 'employee']);
        $this->fields->unsignedInteger('designation')->default(0)->index('designation')->html('recordpicker')->table(['hrm', 'designation']);
        $this->fields->unsignedInteger('department')->default(0)->index('department')->html('recordpicker')->table(['hrm', 'department']);
        $this->fields->unsignedInteger('location')->default(0)->html('recordpicker')->table(['hrm', 'location']);
        $this->fields->string('hiring_source', 20)->html('text');
        $this->fields->date('hiring_date')->html('date');
        $this->fields->date('termination_date')->html('date');
        $this->fields->date('date_of_birth')->html('date');
        $this->fields->unsignedBigInteger('reporting_to')->default(0)->html('recordpicker')->table(['hrm', 'employee']);
        $this->fields->unsignedDecimal('pay_rate', 20, 2)->default(0.00)->html('amount');
        $this->fields->string('pay_type', 20)->default('')->html('text');
        $this->fields->string('type', 20)->html('text');
        $this->fields->string('status', 10)->default('')->index('status')->html('switch');
    }
}
