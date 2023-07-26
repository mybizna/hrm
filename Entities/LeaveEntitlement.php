<?php

namespace Modules\Hrm\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

use Modules\Core\Classes\Views\ListTable;
use Modules\Core\Classes\Views\FormBuilder;

class LeaveEntitlement extends BaseModel
{

    protected $fillable = [
        'user_id','leave_id','trn_id','trn_type','day_in','day_out','description', 'f_year'
    ];
    public $migrationDependancy = [];
    protected $table = "hrm_leave_entitlement";


    public function listTable(){
        // listing view fields
        $fields = new ListTable();

        $fields->name('user_id')->type('recordpicker')->table('users')->ordering(true);
        $fields->name('leave_id')->type('recordpicker')->table('hrm_leave')->ordering(true);
        $fields->name('trn_id')->type('number')->ordering(true);
        $fields->name('trn_type')->type('text')->ordering(true);
        $fields->name('day_in')->type('number')->ordering(true);
        $fields->name('day_out')->type('number')->ordering(true);
        $fields->name('f_year')->type('number')->ordering(true);


        return $fields;

    }
    
    public function formBuilder(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('user_id')->type('recordpicker')->table('users')->group('w-1/2');
        $fields->name('leave_id')->type('recordpicker')->table('hrm_leave')->group('w-1/2');
        $fields->name('trn_id')->type('number')->group('w-1/2');
        $fields->name('trn_type')->type('text')->group('w-1/2');
        $fields->name('day_in')->type('number')->group('w-1/2');
        $fields->name('day_out')->type('number')->group('w-1/2');
        $fields->name('f_year')->type('number')->group('w-1/2');
        $fields->name('description')->type('text')->group('w-full');

        return $fields;

    }

    public function filter(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('user_id')->type('recordpicker')->table('users')->group('w-1/6');
        $fields->name('leave_id')->type('recordpicker')->table('hrm_leave')->group('w-1/6');
        $fields->name('trn_id')->type('number')->group('w-1/6');

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
        $table->unsignedBigInteger('user_id');
        $table->unsignedSmallInteger('leave_id')->index('leave_id');
        $table->unsignedBigInteger('trn_id')->index('trn_id');
        $table->enum('trn_type', ['leave_policies', 'leave_approval_status', 'leave_encashment_requests', 'leave_entitlements', 'unpaid_leave', 'leave_encashment', 'leave_carryforward', 'manual_leave_policies', 'accounts', 'others', 'leave_accrual', 'carry_forward_leave_expired'])->default('leave_policies');
        $table->unsignedDecimal('day_in', 5, 1)->default(0.0);
        $table->unsignedDecimal('day_out', 5, 1)->default(0.0);
        $table->text('description')->nullable();
        $table->smallInteger('f_year');

        $table->index(['user_id', 'leave_id', 'f_year', 'trn_type'], 'comp_key_1');
    }
}
