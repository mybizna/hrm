<?php

namespace Modules\Hrm\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Classes\Views\FormBuilder;

class WorkExperience extends BaseModel
{
    /**
     * The fields that can be filled
     * @var array<string>
     */
    protected $fillable = ['employee_id', 'company_name', 'job_title', 'from', 'to', 'description'];

    /**
     * List of tables names that are need in this model during migration.
     * @var array<string>
     */
    public array $migrationDependancy = [];

    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = "hrm_work_experience";


    public function  listTable(): ListTable
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('employee_id')->type('number')->ordering(true);
        $fields->name('company_name')->type('text')->ordering(true);
        $fields->name('job_title')->type('text')->ordering(true);
        $fields->name('from')->type('date')->ordering(true);
        $fields->name('to')->type('date')->ordering(true);
            

        return $fields;

    }
    
    public function formBuilder(): FormBuilder
{
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('employee_id')->type('number')->group('w-1/2');
        $fields->name('company_name')->type('text')->group('w-1/2');
        $fields->name('job_title')->type('text')->group('w-1/2');
        $fields->name('from')->type('date')->group('w-1/2');
        $fields->name('to')->type('date')->group('w-1/2');
        $fields->name('description')->type('text')->group('w-full');

        return $fields;

    }

    public function filter(): FormBuilder
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('employee_id')->type('number')->group('w-1/6');
        $fields->name('company_name')->type('text')->group('w-1/6');
        $fields->name('job_title')->type('text')->group('w-1/6');   
        $fields->name('from')->type('date')->group('w-1/6');
        $fields->name('to')->type('date')->group('w-1/6');

        return $fields;

    }
    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
    {

        $table->increments('id');
        $table->integer('employee_id')->nullable()->index('employee_id');
        $table->string('company_name', 100)->nullable();
        $table->string('job_title', 100)->nullable();
        $table->date('from')->nullable();
        $table->date('to')->nullable();
        $table->text('description')->nullable();
    }
}
