<?php

namespace Modules\Hrm\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
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
     * Function for defining list of fields in table view.
     *
     * @return ListTable
     */
    public function listTable(): ListTable
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('user_id')->type('recordpicker')->table('users')->ordering(true);
        $fields->name('employee_id')->type('text')->ordering(true);
        $fields->name('designation')->type('recordpicker')->table('hrm_designation')->ordering(true);
        $fields->name('department')->type('recordpicker')->table('hrm_department')->ordering(true);
        $fields->name('location')->type('recordpicker')->table('hrm_location')->ordering(true);
        $fields->name('hiring_source')->type('text')->ordering(true);
        $fields->name('hiring_date')->type('date')->ordering(true);
        $fields->name('termination_date')->type('date')->ordering(true);
        $fields->name('date_of_birth')->type('date')->ordering(true);
        $fields->name('reporting_to')->type('recordpicker')->table('hrm_employee')->ordering(true);
        $fields->name('pay_rate')->type('text')->ordering(true);
        $fields->name('pay_type')->type('text')->ordering(true);
        $fields->name('type')->type('text')->ordering(true);
        $fields->name('status')->type('switch')->ordering(true);

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

        $fields->name('user_id')->type('recordpicker')->table('users')->group('w-1/2');
        $fields->name('employee_id')->type('text')->group('w-1/2');
        $fields->name('designation')->type('recordpicker')->table('hrm_designation')->group('w-1/2');
        $fields->name('department')->type('recordpicker')->table('hrm_department')->group('w-1/2');
        $fields->name('location')->type('recordpicker')->table('hrm_location')->group('w-1/2');
        $fields->name('hiring_source')->type('text')->group('w-1/2');
        $fields->name('hiring_date')->type('date')->group('w-1/2');
        $fields->name('termination_date')->type('date')->group('w-1/2');
        $fields->name('date_of_birth')->type('date')->group('w-1/2');
        $fields->name('reporting_to')->type('recordpicker')->table('hrm_employee')->group('w-1/2');
        $fields->name('pay_rate')->type('text')->group('w-1/2');
        $fields->name('pay_type')->type('text')->group('w-1/2');
        $fields->name('type')->type('text')->group('w-1/2');
        $fields->name('status')->type('switch')->group('w-1/2');

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

        $fields->name('user_id')->type('recordpicker')->table('users')->group('w-1/6');
        $fields->name('employee_id')->type('text')->group('w-1/6');
        $fields->name('designation')->type('recordpicker')->table('hrm_designation')->group('w-1/6');
        $fields->name('department')->type('recordpicker')->table('hrm_department')->group('w-1/6');
        $fields->name('location')->type('recordpicker')->table('hrm_location')->group('w-1/6');

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
        $table->bigIncrements('id');
        $table->unsignedBigInteger('user_id')->default(0)->index('user_id');
        $table->string('employee_id', 20)->nullable()->index('employee_id');
        $table->unsignedInteger('designation')->default(0)->index('designation');
        $table->unsignedInteger('department')->default(0)->index('department');
        $table->unsignedInteger('location')->default(0);
        $table->string('hiring_source', 20);
        $table->date('hiring_date');
        $table->date('termination_date');
        $table->date('date_of_birth');
        $table->unsignedBigInteger('reporting_to')->default(0);
        $table->unsignedDecimal('pay_rate', 20, 2)->default(0.00);
        $table->string('pay_type', 20)->default('');
        $table->string('type', 20);
        $table->string('status', 10)->default('')->index('status');
    }
}
