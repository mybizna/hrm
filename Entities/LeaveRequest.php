<?php

namespace Modules\Hrm\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class LeaveRequest extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'user_id', 'leave_id', 'leave_entitlement_id', 'day_status_id', 'days',
        'start_date', 'end_date', 'reason', 'last_status',
    ];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['user_id', 'leave_id'];

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
    protected $table = "leave_request";

    /**
     * Function for defining list of fields in table view.
     *
     * @return ListTable
     */
    public function listTable(): ListTable
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('user_id')->type('recordpicker')->table('user')->ordering(true);
        $fields->name('leave_id')->type('recordpicker')->table('hrm_leave')->ordering(true);
        $fields->name('leave_entitlement_id')->type('recordpicker')->table('hrm_leave_entitlement')->ordering(true);
        $fields->name('day_status_id')->type('recordpicker')->table('hrm_day_status')->ordering(true);
        $fields->name('days')->type('number')->ordering(true);
        $fields->name('start_date')->type('datetime')->ordering(true);
        $fields->name('end_date')->type('datetime')->ordering(true);
        $fields->name('reason')->type('textarea')->ordering(true);
        $fields->name('last_status')->type('number')->ordering(true);

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

        $fields->name('user_id')->type('recordpicker')->table('user')->group('w-1/2');
        $fields->name('leave_id')->type('recordpicker')->table('hrm_leave')->group('w-1/2');
        $fields->name('leave_entitlement_id')->type('recordpicker')->table('hrm_leave_entitlement')->group('w-1/2');
        $fields->name('day_status_id')->type('recordpicker')->table('hrm_day_status')->group('w-1/2');
        $fields->name('days')->type('number')->group('w-1/2');
        $fields->name('start_date')->type('datetime')->group('w-1/2');
        $fields->name('end_date')->type('datetime')->group('w-1/2');
        $fields->name('reason')->type('textarea')->group('w-full');
        $fields->name('last_status')->type('number')->group('w-1/2');

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

        $fields->name('user_id')->type('recordpicker')->table('user')->group('w-1/6');
        $fields->name('leave_id')->type('recordpicker')->table('hrm_leave')->group('w-1/6');
        $fields->name('leave_entitlement_id')->type('recordpicker')->table('hrm_leave_entitlement')->group('w-1/6');
        $fields->name('day_status_id')->type('recordpicker')->table('hrm_day_status')->group('w-1/6');
        $fields->name('days')->type('number')->group('w-1/6');

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
        $table->unsignedBigInteger('user_id')->index('user_id');
        $table->unsignedSmallInteger('leave_id');
        $table->unsignedBigInteger('leave_entitlement_id')->default(0)->index('leave_entitlement_id');
        $table->unsignedSmallInteger('day_status_id')->default(1);
        $table->unsignedDecimal('days', 5, 1)->default(0.0);
        $table->integer('start_date');
        $table->integer('end_date');
        $table->text('reason')->nullable();
        $table->unsignedSmallInteger('last_status')->default(2)->index('last_status');

        $table->index(['user_id', 'leave_id'], 'user_leave');
        $table->index(['user_id', 'leave_entitlement_id'], 'user_entitlement');
    }
}
