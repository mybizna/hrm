<?php

namespace Modules\Hrm\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class EmployeeHistory extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['user_id', 'module', 'category', 'type', 'comment', 'data', 'date'];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['user_id', 'module'];

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
    protected $table = "hrm_employee_history";

    /**
     * Function for defining list of fields in table view.
     *
     * @return ListTable
     */
    public function listTable(): ListTable
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('user_id')->type('recordpicker')->table([ 'users'])->ordering(true);
        $fields->name('module')->type('text')->ordering(true);
        $fields->name('category')->type('text')->ordering(true);
        $fields->name('type')->type('text')->ordering(true);
        $fields->name('comment')->type('text')->ordering(true);
        $fields->name('data')->type('text')->ordering(true);
        $fields->name('date')->type('date')->ordering(true);

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

        $fields->name('user_id')->type('recordpicker')->table([ 'users'])->group('w-1/2');
        $fields->name('module')->type('text')->group('w-1/2');
        $fields->name('category')->type('text')->group('w-1/2');
        $fields->name('type')->type('text')->group('w-1/2');
        $fields->name('comment')->type('text')->group('w-1/2');
        $fields->name('data')->type('text')->group('w-1/2');
        $fields->name('date')->type('date')->group('w-1/2');

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

        $fields->name('user_id')->type('recordpicker')->table([ 'users'])->group('w-1/6');
        $fields->name('module')->type('text')->group('w-1/6');
        $fields->name('category')->type('text')->group('w-1/6');
        $fields->name('type')->type('text')->group('w-1/6');
        $fields->name('date')->type('date')->group('w-1/6');

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
        $table->unsignedBigInteger('user_id')->default(0)->index('user_id');
        $table->string('module', 20)->nullable()->index('module');
        $table->string('category', 20)->nullable();
        $table->string('type', 20)->nullable();
        $table->text('comment')->nullable();
        $table->longText('data')->nullable();
        $table->dateTime('date');
    }
}
