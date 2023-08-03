<?php

namespace Modules\Hrm\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class LeavePolicy extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'leave_id', 'description', 'days', 'color', 'apply_limit', 'employee_type', 'department_id',
        'location_id', 'designation_id', 'gender', 'marital', 'f_year', 'apply_for_new_users',
        'carryover_days', 'carryover_uses_limit', 'encashment_based_on', 'forward_default',
        'applicable_from_days', 'accrued_amount', 'accrued_max_days', 'halfday_enable',
    ];

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
    protected $table = "hrm_leave_policy";

    /**
     * Function for defining list of fields in table view.
     *
     * @return ListTable
     */
    public function listTable(): ListTable
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('leave_id')->type('recordpicker')->table('hrm_leave')->ordering(true);
        $fields->name('days')->type('number')->ordering(true);
        $fields->name('color')->type('text')->ordering(true);
        $fields->name('apply_limit')->type('number')->ordering(true);
        $fields->name('employee_type')->type('text')->ordering(true);
        $fields->name('department_id')->type('number')->ordering(true);
        $fields->name('location_id')->type('number')->ordering(true);
        $fields->name('designation_id')->type('number')->ordering(true);

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

        $fields->name('leave_id')->type('recordpicker')->table('hrm_leave')->group('w-1/2');
        $fields->name('days')->type('number')->group('w-1/2');
        $fields->name('color')->type('text')->group('w-1/2');
        $fields->name('apply_limit')->type('number')->group('w-1/2');
        $fields->name('employee_type')->type('text')->group('w-1/2');
        $fields->name('department_id')->type('number')->group('w-1/2');
        $fields->name('location_id')->type('number')->group('w-1/2');
        $fields->name('designation_id')->type('number')->group('w-1/2');
        $fields->name('type')->type('select')->options(['none' => 'None', 'male' => 'Male', 'female' => 'Female', 'other' => 'Other'])->group('w-1/2');
        $fields->name('marital')->type('select')->options(['none' => 'None', 'single' => 'Single', 'married' => 'Married', 'widowed' => 'Widowed'])->group('w-1/2');
        $fields->name('f_year')->type('number')->group('w-1/2');
        $fields->name('apply_for_new_users')->type('number')->group('w-1/2');
        $fields->name('carryover_days')->type('number')->group('w-1/2');
        $fields->name('carryover_uses_limit')->type('number')->group('w-1/2');
        $fields->name('encashment_days')->type('number')->group('w-1/2');
        $fields->name('encashment_based_on')->type('select')->options(['pay_rate' => 'Pay Rate', 'basic' => 'Basic', 'gross' => 'Gross'])->group('w-1/2');
        $fields->name('forward_default')->type('select')->options(['encashment' => 'Encashment', 'carryover' => 'Carryover'])->group('w-1/2');
        $fields->name('applicable_from_days')->type('number')->group('w-1/2');
        $fields->name('accrued_amount')->type('number')->group('w-1/2');
        $fields->name('accrued_max_days')->type('number')->group('w-1/2');
        $fields->name('halfday_enable')->type('number')->group('w-1/2');

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

        $fields->name('leave_id')->type('recordpicker')->table('hrm_leave')->group('w-1/6');
        $fields->name('days')->type('number')->group('w-1/6');
        $fields->name('color')->type('text')->group('w-1/6');
        $fields->name('apply_limit')->type('number')->group('w-1/6');
        $fields->name('employee_type')->type('text')->group('w-1/6');
        $fields->name('department_id')->type('number')->group('w-1/6');
        $fields->name('location_id')->type('number')->group('w-1/6');

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
        $table->unsignedSmallInteger('leave_id')->index('leave_id');
        $table->text('description')->nullable();
        $table->unsignedTinyInteger('days')->default(0);
        $table->string('color', 10)->nullable();
        $table->unsignedTinyInteger('apply_limit')->default(0);
        $table->enum('employee_type', ['none', 'permanent', 'parttime', 'contract', 'temporary', 'trainee'])->default('permanent');
        $table->integer('department_id')->default(-1);
        $table->integer('location_id')->default(-1);
        $table->integer('designation_id')->default(-1);
        $table->enum('gender', ['none', 'male', 'female', 'other'])->default('none');
        $table->enum('marital', ['none', 'single', 'married', 'widowed'])->default('none');
        $table->unsignedSmallInteger('f_year')->nullable()->index('f_year');
        $table->unsignedTinyInteger('apply_for_new_users')->default(0);
        $table->unsignedTinyInteger('carryover_days')->default(0);
        $table->unsignedTinyInteger('carryover_uses_limit')->default(0);
        $table->unsignedTinyInteger('encashment_days')->default(0);
        $table->enum('encashment_based_on', ['pay_rate', 'basic', 'gross'])->nullable();
        $table->enum('forward_default', ['encashment', 'carryover'])->default('encashment');
        $table->unsignedSmallInteger('applicable_from_days')->default(0);
        $table->decimal('accrued_amount', 10, 2)->default(0.00);
        $table->unsignedSmallInteger('accrued_max_days')->default(0);
        $table->unsignedTinyInteger('halfday_enable')->default(0);
    }
}
