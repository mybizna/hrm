<?php

namespace Modules\Hrm\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
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
     * Function for defining list of fields in table view.
     *
     * @return ListTable
     */
    public function listTable(): ListTable
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('employee_id')->type('recordpicker')->table([ 'hrm', 'employee'])->ordering(true);
        $fields->name('reporting_to')->type('recordpicker')->table([ 'hrm', 'employee'])->ordering(true);
        $fields->name('job_knowledge')->type('text')->ordering(true);
        $fields->name('work_quality')->type('text')->ordering(true);
        $fields->name('attendance')->type('text')->ordering(true);
        $fields->name('communication')->type('text')->ordering(true);
        $fields->name('dependablity')->type('text')->ordering(true);
        $fields->name('reviewer')->type('recordpicker')->table([ 'hrm', 'employee'])->ordering(true);

        return $fields;

    }

    /**
     * Function for defining list of fields in form view.
     *
     * @return FormBuilder
     */
    public function formBuilder(): FormBuilder
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('employee_id')->type('recordpicker')->table([ 'hrm', 'employee'])->group('w-1/2');
        $fields->name('reporting_to')->type('recordpicker')->table([ 'hrm', 'employee'])->group('w-1/2');
        $fields->name('job_knowledge')->type('text')->group('w-1/2');
        $fields->name('work_quality')->type('text')->group('w-1/2');
        $fields->name('attendance')->type('text')->group('w-1/2');
        $fields->name('communication')->type('text')->group('w-1/2');
        $fields->name('dependablity')->type('text')->group('w-1/2');
        $fields->name('reviewer')->type('recordpicker')->table([ 'hrm', 'employee'])->group('w-1/2');
        $fields->name('comments')->type('text')->group('w-1/2');
        $fields->name('completion_date')->type('date')->group('w-1/2');
        $fields->name('goal_description')->type('textarea')->group('w-full');

        return $fields;

    }

    /**
     * Function for defining list of fields in filter view.
     *
     * @return FormBuilder
     */
    public function filter(): FormBuilder
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('employee_id')->type('recordpicker')->table([ 'hrm', 'employee'])->group('w-1/6');
        $fields->name('reporting_to')->type('recordpicker')->table([ 'hrm', 'employee'])->group('w-1/6');
        $fields->name('job_knowledge')->type('text')->group('w-1/6');
        $fields->name('work_quality')->type('text')->group('w-1/6');

        return $fields;

    }
    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table): void
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
