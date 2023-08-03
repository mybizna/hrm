<?php

namespace Modules\Hrm\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class LeaveApprovalStatus extends BaseModel
{

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'leave_request_id', 'approval_status_id', 'approved_by', 'message',
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
    protected $table = "hrm_leave_approval_status";

    /**
     * Function for defining list of fields in table view.
     *
     * @return ListTable
     */
    public function listTable(): ListTable
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('leave_request_id')->type('recordpicker')->table('hrm_leave_request')->ordering(true);
        $fields->name('approval_status_id')->type('recordpicker')->table('hrm_approval_status')->ordering(true);
        $fields->name('approved_by')->type('recordpicker')->table('users')->ordering(true);

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

        $fields->name('leave_request_id')->type('recordpicker')->table('hrm_leave_request')->group('w-1/2');
        $fields->name('approval_status_id')->type('recordpicker')->table('hrm_approval_status')->group('w-1/2');
        $fields->name('approved_by')->type('recordpicker')->table('users')->group('w-1/2');
        $fields->name('message')->type('text')->group('w-full');

        return $fields;

    }

    /**
     * Function for defining list of fields in form view.
     * 
     * @return FormBuilder
     */
    public function filter(): FormBuilder
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('leave_request_id')->type('recordpicker')->table('hrm_leave_request')->group('w-1/6');
        $fields->name('approval_status_id')->type('recordpicker')->table('hrm_approval_status')->group('w-1/6');
        $fields->name('approved_by')->type('recordpicker')->table('users')->group('w-1/6');

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
        $table->unsignedBigInteger('leave_request_id')->index('leave_request_id');
        $table->unsignedTinyInteger('approval_status_id')->default(0)->index('approval_status_id');
        $table->unsignedBigInteger('approved_by')->nullable();
        $table->text('message')->nullable();
    }
}
