<?php

namespace Modules\Hrm\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class EmployeeRemoteWorkRequest extends BaseModel
{
    /**
     * The fields that can be filled
     * @var array<string>
     */
    protected $fillable = ['user_id', 'reason', 'start_date', 'end_date', 'days', 'status'];

    /**
     * List of tables names that are need in this model during migration.
     * @var array<string>
     */
    public array $migrationDependancy = [];

    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = "hrm_employee_remote_work_request";

    public function listTable(): ListTable
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('user_id')->type('recordpicker')->table('users')->ordering(true);
        $fields->name('reason')->type('text')->ordering(true);
        $fields->name('start_date')->type('date')->ordering(true);
        $fields->name('end_date')->type('date')->ordering(true);
        $fields->name('days')->type('text')->ordering(true);
        $fields->name('status')->type('switch')->ordering(true);

        return $fields;

    }

    public function formBuilder(): FormBuilder
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('user_id')->type('recordpicker')->table('users')->group('w-1/2');
        $fields->name('start_date')->type('date')->group('w-1/2');
        $fields->name('end_date')->type('date')->group('w-1/2');
        $fields->name('days')->type('text')->group('w-1/2');
        $fields->name('status')->type('switch')->group('w-1/2');

        return $fields;

    }

    public function filter(): FormBuilder
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('user_id')->type('recordpicker')->table('users')->group('w-1/6');
        $fields->name('start_date')->type('date')->group('w-1/6');
        $fields->name('end_date')->type('date')->group('w-1/6');
        $fields->name('days')->type('text')->group('w-1/6');
        $fields->name('status')->type('switch')->group('w-1/6');

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
        $table->bigIncrements('id');
        $table->unsignedBigInteger('user_id')->default(0)->index('user_id');
        $table->string('reason')->nullable();
        $table->date('start_date');
        $table->date('end_date');
        $table->unsignedSmallInteger('days')->default(0);
        $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
    }
}
