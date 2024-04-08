<?php

namespace Modules\Hrm\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class LeaveUnpaid extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'leave_id', 'leave_request_id', 'leave_approval_status_id', 'partner_id', 'days',
        'amount', 'total', 'f_year',
    ];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['leave_id', 'leave_request_id'];

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
    protected $table = "hrm_leave_unpaid";

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
        $this->fields->unsignedSmallInteger('leave_id')->index('leave_id')->html('recordpicker')->relation(['hrm', 'leave']);
        $this->fields->unsignedBigInteger('leave_request_id')->index('leave_request_id')->html('recordpicker')->relation(['hrm', 'leave_request']);
        $this->fields->unsignedBigInteger('leave_approval_status_id')->index('leave_approval_status_id')->html('recordpicker')->relation(['hrm', 'leave_approval_status']);
        $this->fields->unsignedBigInteger('partner_id')->index('partner_id')->html('recordpicker')->relation(['users']);
        $this->fields->unsignedDecimal('days', 4, 1)->default(0.0)->html('number');
        $this->fields->decimal('amount', 20, 2)->default(0.00)->html('number');
        $this->fields->decimal('total', 20, 2)->default(0.00)->html('number');
        $this->fields->unsignedSmallInteger('f_year')->index('f_year')->html('number');
    }

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {

        $structure['table'] = ['leave_id', 'leave_request_id', 'leave_approval_status_id', 'partner_id', 'days', 'amount', 'total', 'f_year'];
        $structure['form'] = [
            ['label' => 'Leave Unpaid', 'class' => 'col-span-full', 'fields' => ['leave_id']],
            ['label' => 'Leave Unpaid Detail', 'class' => 'col-span-full  md:col-span-6 md:pr-2', 'fields' => ['leave_request_id', 'leave_approval_status_id', 'partner_id', 'days']],
            ['label' => 'Leave Unpaid Setting', 'class' => 'col-span-full  md:col-span-6 md:pr-2', 'fields' => ['amount', 'total', 'f_year']],
        ];
        $structure['filter'] = ['leave_id', 'leave_request_id', 'leave_approval_status_id', 'partner_id'];

        return $structure;
    }

}
