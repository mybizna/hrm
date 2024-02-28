<?php

namespace Modules\Hrm\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class LeaveRequestDetail extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'leave_request_id', 'leave_approval_status_id', 'workingday_status',
        'user_id', 'f_year', 'leave_date',
    ];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['leave_request_id', 'leave_approval_status_id', 'user_id'];

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
    protected $table = "hrm_leave_request_detail";

    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);

        $this->fields->bigIncrements('id')->html('number');
        $this->fields->unsignedBigInteger('leave_request_id')->index('leave_request_id')->html('recordpicker')->relation(['hrm', 'leave_request']);
        $this->fields->unsignedBigInteger('leave_approval_status_id')->html('recordpicker')->relation(['hrm', 'leave_approval_status']);
        $this->fields->unsignedTinyInteger('workingday_status')->default(1)->html('number');
        $this->fields->unsignedBigInteger('user_id')->index('user_id')->html('recordpicker')->relation(['users']);
        $this->fields->smallInteger('f_year')->html('number');
        $this->fields->integer('leave_date')->html('date');

        $this->fields->index(['user_id', 'f_year', 'leave_date'], 'user_fyear_leave');
    }

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {

        $structure['table'] = ['leave_request_id', 'leave_approval_status_id', 'workingday_status', 'user_id', 'f_year', 'leave_date'];
        $structure['form'] = [
            ['label' => 'Leave Request', 'class' => 'col-span-full', 'fields' => ['leave_request_id']],
            ['label' => 'Main', 'class' => 'col-span-full  md:col-span-6 md:pr-2', 'fields' => ['leave_approval_status_id', 'workingday_status', 'user_id']],
            ['label' => 'Main', 'class' => 'w-/12', 'fields' => ['f_year', 'leave_date']],
        ];
        $structure['filter'] = ['leave_request_id', 'leave_approval_status_id', 'workingday_status', 'user_id'];

        return $structure;
    }
}
