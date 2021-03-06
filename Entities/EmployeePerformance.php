<?php

namespace Modules\Hrm\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class EmployeePerformance extends BaseModel
{

    protected $fillable = [
        'employee_id', 'reporting_to', 'job_knowledge', 'work_quality', 'attendance',
        'communication', 'dependablity', 'reviewer', 'comments', 'completion_date',
        'goal_description', 'employee_assessment', 'supervisor', 'supervisor_assessment',
        'type', 'performance_date'
    ];
    public $migrationDependancy = [];
    protected $table = "hrm_employee_performance";

    /**
     * List of fields for managing postings.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
    {
        $table->increments('id');
        $table->unsignedInteger('employee_id')->nullable()->index('employee_id');
        $table->unsignedInteger('reporting_to')->nullable();
        $table->string('job_knowledge', 100)->nullable();
        $table->string('work_quality', 100)->nullable();
        $table->string('attendance', 100)->nullable();
        $table->string('communication', 100)->nullable();
        $table->string('dependablity', 100)->nullable();
        $table->unsignedInteger('reviewer')->nullable();
        $table->text('comments')->nullable();
        $table->dateTime('completion_date')->nullable();
        $table->text('goal_description')->nullable();
        $table->text('employee_assessment')->nullable();
        $table->unsignedInteger('supervisor')->nullable();
        $table->text('supervisor_assessment')->nullable();
        $table->text('type')->nullable();
        $table->dateTime('performance_date')->nullable();
    }
}
