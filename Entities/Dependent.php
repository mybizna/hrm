<?php

namespace Modules\Hrm\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class Dependent extends BaseModel
{

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['employee_id', 'name', 'relation', 'dob'];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['name'];

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
    protected $table = "hrm_dependent";

    /**
     * Function for defining list of fields in table view.
     *
     * @return ListTable
     */
    public function listTable(): ListTable
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('employee_id')->type('recordpicker')->table('hrm_employee')->ordering(true);
        $fields->name('name')->type('text')->ordering(true);
        $fields->name('relation')->type('text')->ordering(true);
        $fields->name('dob')->type('text')->ordering(true);

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

        $fields->name('employee_id')->type('recordpicker')->table('hrm_employee')->group('w-1/2');
        $fields->name('name')->type('text')->group('w-1/2');
        $fields->name('relation')->type('text')->group('w-1/2');
        $fields->name('dob')->type('text')->group('w-1/2');

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

        $fields->name('employee_id')->type('recordpicker')->table('hrm_employee')->group('w-1/6');
        $fields->name('name')->type('text')->group('w-1/6');
        $fields->name('relation')->type('text')->group('w-1/6');
        $fields->name('dob')->type('text')->group('w-1/6');

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
        $table->integer('employee_id')->nullable()->index('employee_id');
        $table->string('name', 100)->nullable();
        $table->string('relation', 100)->nullable();
        $table->date('dob')->nullable();
    }
}
