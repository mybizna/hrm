<?php

namespace Modules\Hrm\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class Education extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'employee_id', 'school', 'degree', 'field', 'result', 'result_type',
        'finished', 'notes', 'interest',
    ];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['school', 'degree'];

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
    protected $table = "hrm_education";

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
        $fields->name('school')->type('text')->ordering(true);
        $fields->name('degree')->type('text')->ordering(true);
        $fields->name('field')->type('text')->ordering(true);
        $fields->name('result')->type('text')->ordering(true);
        $fields->name('result_type')->type('text')->ordering(true);

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
        $fields->name('school')->type('text')->group('w-1/2');
        $fields->name('degree')->type('text')->group('w-1/2');
        $fields->name('field')->type('text')->group('w-1/2');
        $fields->name('result')->type('text')->group('w-1/2');
        $fields->name('result_type')->type('text')->group('w-1/2');
        $fields->name('finished')->type('text')->group('w-1/2');

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
        $fields->name('school')->type('text')->group('w-1/6');
        $fields->name('degree')->type('text')->group('w-1/6');
        $fields->name('field')->type('text')->group('w-1/6');
        $fields->name('result')->type('text')->group('w-1/6');

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
        $table->string('school', 100)->nullable();
        $table->string('degree', 100)->nullable();
        $table->string('field', 100)->nullable();
        $table->string('result', 50)->nullable();
        $table->enum('result_type', ['grade', 'percentage'])->nullable();
        $table->unsignedInteger('finished')->nullable();
        $table->text('notes')->nullable();
        $table->text('interest')->nullable();
    }
}
