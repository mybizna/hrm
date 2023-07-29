<?php

namespace Modules\Hrm\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Classes\Views\FormBuilder;

class LeaveRequestDetail extends BaseModel
{
    /**
     * The fields that can be filled
     * @var array<string>
     */
    protected $fillable = [
        'leave_request_id', 'leave_approval_status_id', 'workingday_status',
        'user_id', 'f_year', 'leave_date'
    ];

    /**
     * List of tables names that are need in this model during migration.
     * @var array<string>
     */
    public array $migrationDependancy = [];

    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = "hrm_leave_request_detail";


    public function  listTable(): ListTable
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('leave_request_id')->type('recordpicker')->table('hrm_leave_request')->ordering(true);
        $fields->name('leave_approval_status_id')->type('recordpicker')->table('hrm_leave_approval_status')->ordering(true);
        $fields->name('workingday_status')->type('number')->ordering(true);
        $fields->name('user_id')->type('recordpicker')->table('user')->ordering(true);
        $fields->name('f_year')->type('number')->ordering(true);
        $fields->name('leave_date')->type('date')->ordering(true);

        return $fields;

    }
    
    public function formBuilder(): FormBuilder
{
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('leave_request_id')->type('recordpicker')->table('hrm_leave_request')->group('w-1/2');
        $fields->name('leave_approval_status_id')->type('recordpicker')->table('hrm_leave_approval_status')->group('w-1/2');
        $fields->name('workingday_status')->type('number')->group('w-1/2');
        $fields->name('user_id')->type('recordpicker')->table('user')->group('w-1/2');
        $fields->name('f_year')->type('number')->group('w-1/2');
        $fields->name('leave_date')->type('date')->group('w-1/2');


        return $fields;

    }

    public function filter(): FormBuilder
    {
        // listing view fields
        $fields = new FormBuilder();


        $fields->name('leave_request_id')->type('recordpicker')->table('hrm_leave_request')->group('w-1/6');
        $fields->name('leave_approval_status_id')->type('recordpicker')->table('hrm_leave_approval_status')->group('w-1/6');
        $fields->name('workingday_status')->type('number')->group('w-1/6');
        $fields->name('user_id')->type('recordpicker')->table('user')->group('w-1/6');
        $fields->name('f_year')->type('number')->group('w-1/6');
        


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
        $table->unsignedBigInteger('leave_request_id')->index('leave_request_id');
        $table->unsignedBigInteger('leave_approval_status_id');
        $table->unsignedTinyInteger('workingday_status')->default(1);
        $table->unsignedBigInteger('user_id')->index('user_id');
        $table->smallInteger('f_year');
        $table->integer('leave_date');

        $table->index(['user_id', 'f_year', 'leave_date'], 'user_fyear_leave');
    }
}
