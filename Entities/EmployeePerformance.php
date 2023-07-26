<?php

namespace Modules\Hrm\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

use Modules\Core\Classes\Views\ListTable;
use Modules\Core\Classes\Views\FormBuilder;

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


    public function listTable(){
        // listing view fields
        $fields = new ListTable();

        $fields->name('employee_id')->type('recordpicker')->table('hrm_employee')->ordering(true);
        $fields->name('reporting_to')->type('recordpicker')->table('hrm_employee')->ordering(true);
        $fields->name('job_knowledge')->type('text')->ordering(true);
        $fields->name('work_quality')->type('text')->ordering(true);
        $fields->name('attendance')->type('text')->ordering(true);
        $fields->name('communication')->type('text')->ordering(true);
        $fields->name('dependablity')->type('text')->ordering(true);
        $fields->name('reviewer')->type('recordpicker')->table('hrm_employee')->ordering(true);

        return $fields;

    }
    
    public function formBuilder(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('employee_id')->type('recordpicker')->table('hrm_employee')->group('w-1/2');
        $fields->name('reporting_to')->type('recordpicker')->table('hrm_employee')->group('w-1/2');
        $fields->name('job_knowledge')->type('text')->group('w-1/2');
        $fields->name('work_quality')->type('text')->group('w-1/2');
        $fields->name('attendance')->type('text')->group('w-1/2');
        $fields->name('communication')->type('text')->group('w-1/2');
        $fields->name('dependablity')->type('text')->group('w-1/2');
        $fields->name('reviewer')->type('recordpicker')->table('hrm_employee')->group('w-1/2');
        $fields->name('comments')->type('text')->group('w-1/2');
        $fields->name('completion_date')->type('date')->group('w-1/2');
        $fields->name('goal_description')->type('textarea')->group('w-full');
    



        return $fields;

    }

    public function filter(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('employee_id')->type('recordpicker')->table('hrm_employee')->group('w-1/6');
        $fields->name('reporting_to')->type('recordpicker')->table('hrm_employee')->group('w-1/6');
        $fields->name('job_knowledge')->type('text')->group('w-1/6');
        $fields->name('work_quality')->type('text')->group('w-1/6');
        
        return $fields;

    }
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
