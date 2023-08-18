<?php

namespace Modules\Hrm\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class LeaveEntitlement extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'user_id', 'leave_id', 'trn_id', 'trn_type', 'day_in', 'day_out', 'description', 'f_year',
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
    protected $table = "hrm_leave_entitlement";

    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);

        $trn_types = ['leave_policies' => 'Leave Policies', 'leave_approval_status' => 'Leave Approval Status', 'leave_encashment_requests' => 'Leave Encashment Requests', 'leave_entitlements' => 'Leave Entitlements', 'unpaid_leave' => 'Unpaid Leave', 'leave_encashment' => 'Leave Encashment', 'leave_carryforward' => 'Leave Carryforward', 'manual_leave_policies' => 'Manual Leave Policies', 'accounts' => 'Accounts', 'others' => 'Others', 'leave_accrual' => 'Leave Accrual', 'carry_forward_leave_expired' => 'Carry Forward Leave Expired'];

        $this->fields->bigIncrements('id');
        $this->fields->unsignedBigInteger('user_id')->html('recordpicker')->relation(['users']);
        $this->fields->unsignedSmallInteger('leave_id')->index('leave_id')->html('recordpicker')->relation(['hrm', 'leave']);
        $this->fields->unsignedBigInteger('trn_id')->index('trn_id')->html('number');
        $this->fields->enum('trn_type', array_keys($trn_types))->options($trn_types)->default('leave_policies')->html('switch');
        $this->fields->unsignedDecimal('day_in', 5, 1)->default(0.0)->html('number');
        $this->fields->unsignedDecimal('day_out', 5, 1)->default(0.0)->html('number');
        $this->fields->text('description')->nullable()->html('textarea');
        $this->fields->smallInteger('f_year')->html('number');

        $this->fields->index(['user_id', 'leave_id', 'f_year', 'trn_type'], 'comp_key_1');
    }

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {

        $structure['table'] = ['user_id', 'leave_id', 'trn_id', 'trn_type', 'day_in', 'day_out', 'f_year'];
        $structure['form'] = [
            ['label' => 'Leave', 'class' => 'col-span-full', 'fields' => ['leave_id']],
            ['label' => 'Description', 'class' => 'col-span-full', 'fields' => ['description']],
            ['label' => 'Leave Entitlement', 'class' => 'col-span-6', 'fields' => ['user_id', 'trn_id', 'trn_type', 'f_year']],
            ['label' => 'Day', 'class' => 'col-span-6', 'fields' => ['day_in', 'day_out']],
        ];
        $structure['filter'] = ['user_id', 'leave_id', 'trn_id', 'day_in', 'day_out', 'f_year'];

        return $structure;
    }

}
