<?php

namespace Modules\Hrm\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

use Modules\Core\Classes\Views\ListTable;
use Modules\Core\Classes\Views\FormBuilder;

class LeaveApprovalStatus extends BaseModel
{

    protected $fillable = [
        'leave_request_id', 'approval_status_id', 'approved_by', 'message'
    ];
    public $migrationDependancy = [];
    protected $table = "hrm_leave_approval_status";


    public function listTable(){
        // listing view fields
        $fields = new ListTable();

        $fields->name('leave_request_id')->type('recordpicker')->table('hrm_leave_request')->ordering(true);
        $fields->name('approval_status_id')->type('recordpicker')->table('hrm_approval_status')->ordering(true);
        $fields->name('approved_by')->type('recordpicker')->table('users')->ordering(true);

        return $fields;

    }
    
    public function formBuilder(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('leave_request_id')->type('recordpicker')->table('hrm_leave_request')->group('w-1/2');
        $fields->name('approval_status_id')->type('recordpicker')->table('hrm_approval_status')->group('w-1/2');
        $fields->name('approved_by')->type('recordpicker')->table('users')->group('w-1/2');
        $fields->name('message')->type('text')->group('w-full');

        return $fields;

    }

    public function filter(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('leave_request_id')->type('recordpicker')->table('hrm_leave_request')->group('w-1/6');
        $fields->name('approval_status_id')->type('recordpicker')->table('hrm_approval_status')->group('w-1/6');
        $fields->name('approved_by')->type('recordpicker')->table('users')->group('w-1/6');
        

        return $fields;

    }
    /**
     * List of fields for managing postings.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
    {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('leave_request_id')->index('leave_request_id');
        $table->unsignedTinyInteger('approval_status_id')->default(0)->index('approval_status_id');
        $table->unsignedBigInteger('approved_by')->nullable();
        $table->text('message')->nullable();
    }
}
