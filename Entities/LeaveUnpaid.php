<?php

namespace Modules\Hrm\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;
use Modules\Core\Classes\Views\FormBuilder;
use Modules\Core\Classes\Views\ListTable;

class LeaveUnpaid extends BaseModel
{

    protected $fillable = [
        'leave_id', 'leave_request_id', 'leave_approval_status_id', 'user_id', 'days',
        'amount', 'total', 'f_year',
    ];
    public $migrationDependancy = [];
    protected $table = "hrm_leave_unpaid";

    public function listTable()
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('leave_id')->type('recordpicker')->table('hrm_leave')->ordering(true);
        $fields->name('leave_request_id')->type('recordpicker')->table('hrm_leave_request')->ordering(true);
        $fields->name('leave_approval_status_id')->type('recordpicker')->table('hrm_leave_approval_status')->ordering(true);
        $fields->name('user_id')->type('recordpicker')->table('user')->ordering(true);
        $fields->name('days')->type('number')->ordering(true);
        $fields->name('amount')->type('number')->ordering(true);
        $fields->name('total')->type('number')->ordering(true);
        $fields->name('f_year')->type('number')->ordering(true);

        return $fields;

    }

    public function formBuilder()
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('leave_id')->type('recordpicker')->table('hrm_leave')->group('w-1/2');
        $fields->name('leave_request_id')->type('recordpicker')->table('hrm_leave_request')->group('w-1/2');
        $fields->name('leave_approval_status_id')->type('recordpicker')->table('hrm_leave_approval_status')->group('w-1/2');
        $fields->name('user_id')->type('recordpicker')->table('user')->group('w-1/2');
        $fields->name('days')->type('number')->group('w-1/2');
        $fields->name('amount')->type('number')->group('w-1/2');
        $fields->name('total')->type('number')->group('w-1/2');
        $fields->name('f_year')->type('number')->group('w-1/2');

        return $fields;

    }

    public function filter()
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('leave_id')->type('recordpicker')->table('hrm_leave')->group('w-1/2');
        $fields->name('leave_request_id')->type('recordpicker')->table('hrm_leave_request')->group('w-1/2');
        $fields->name('leave_approval_status_id')->type('recordpicker')->table('hrm_leave_approval_status')->group('w-1/2');
        $fields->name('user_id')->type('recordpicker')->table('user')->group('w-1/2');
        $fields->name('days')->type('number')->group('w-1/2');

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
        $table->unsignedSmallInteger('leave_id')->index('leave_id');
        $table->unsignedBigInteger('leave_request_id')->index('leave_request_id');
        $table->unsignedBigInteger('leave_approval_status_id')->index('leave_approval_status_id');
        $table->unsignedBigInteger('user_id')->index('user_id');
        $table->unsignedDecimal('days', 4, 1)->default(0.0);
        $table->decimal('amount', 20, 2)->default(0.00);
        $table->decimal('total', 20, 2)->default(0.00);
        $table->unsignedSmallInteger('f_year')->index('f_year');
    }
}
