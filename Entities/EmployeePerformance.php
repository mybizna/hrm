<?php

namespace Modules\Hrm\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class EmployeePerformance extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'employee_id', 'reporting_to', 'job_knowledge', 'work_quality', 'attendance',
        'communication', 'dependablity', 'reviewer', 'comments', 'completion_date',
        'goal_description', 'employee_assessment', 'supervisor', 'supervisor_assessment',
        'type', 'performance_date',
    ];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['employee_id', 'reporting_to'];

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
    protected $table = "hrm_employee_performance";

    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);

        $this->fields->increments('id')->html('text');
        $this->fields->unsignedInteger('employee_id')->nullable()->index('employee_id')->html('recordpicker')->relation(['hrm', 'employee']);
        $this->fields->unsignedInteger('reporting_to')->nullable()->html('recordpicker')->relation(['hrm', 'employee']);
        $this->fields->string('job_knowledge', 100)->nullable()->html('text');
        $this->fields->string('work_quality', 100)->nullable()->html('text');
        $this->fields->string('attendance', 100)->nullable()->html('text');
        $this->fields->string('communication', 100)->nullable()->html('text');
        $this->fields->string('dependablity', 100)->nullable()->html('text');
        $this->fields->unsignedInteger('reviewer')->nullable()->html('recordpicker')->relation(['hrm', 'employee']);
        $this->fields->text('comments')->nullable()->html('text');
        $this->fields->dateTime('completion_date')->nullable()->html('date');
        $this->fields->text('goal_description')->nullable()->html('textarea');
        $this->fields->text('employee_assessment')->nullable()->html('textarea');
        $this->fields->unsignedInteger('supervisor')->nullable()->html('recordpicker')->relation(['hrm', 'employee']);
        $this->fields->text('supervisor_assessment')->nullable()->html('textarea');
        $this->fields->text('type')->nullable()->html('text');
        $this->fields->dateTime('performance_date')->nullable()->html('date');
    }

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {

        $structure = [
            'table' => ['employee_id', 'reporting_to', 'completion_date', 'supervisor', 'type', 'performance_date'],
            'form' => [
                ['label' => 'Employee', 'class' => 'w-full', 'fields' => ['employee_id']],
                ['label' => 'Details', 'class' => 'w-1/6', 'fields' => ['reporting_to', 'job_knowledge', 'work_quality', 'attendance','communication', 'dependablity', 'reviewer', 'comments', 'completion_date']],
                ['label' => 'Others', 'class' => 'w-1/6', 'fields' => ['goal_description', 'employee_assessment', 'supervisor', 'supervisor_assessment','type', 'performance_date']],
            ],
            'filter' => ['employee_id', 'reporting_to', 'completion_date', 'supervisor', 'performance_date'],
        ];

        return $structure;
    }

}
