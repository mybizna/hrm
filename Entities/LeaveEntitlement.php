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
        'partner_id', 'leave_id', 'trn_id', 'trn_type', 'day_in', 'day_out', 'description', 'f_year',
    ];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['partner_id', 'leave_id'];

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
        $this->fields->unsignedBigInteger('partner_id')->html('recordpicker')->relation(['users']);
        $this->fields->unsignedSmallInteger('leave_id')->index('leave_id')->html('recordpicker')->relation(['hrm', 'leave']);
        $this->fields->unsignedBigInteger('trn_id')->index('trn_id')->html('number');
        $this->fields->enum('trn_type', array_keys($trn_types))->options($trn_types)->default('leave_policies')->html('switch');
        $this->fields->unsignedDecimal('day_in', 5, 1)->default(0.0)->html('number');
        $this->fields->unsignedDecimal('day_out', 5, 1)->default(0.0)->html('number');
        $this->fields->text('description')->nullable()->html('textarea');
        $this->fields->smallInteger('f_year')->html('number');

        $this->fields->index(['partner_id', 'leave_id', 'f_year', 'trn_type'], 'comp_key_1');
    }

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {

        $structure['table'] = ['partner_id', 'leave_id', 'trn_id', 'trn_type', 'day_in', 'day_out', 'f_year'];
        $structure['form'] = [
            ['label' => 'Leave Entitlement', 'class' => 'col-span-full', 'fields' => ['leave_id']],
            ['label' => 'Leave Entitlement Description', 'class' => 'col-span-full', 'fields' => ['description']],
            ['label' => 'Leave Entitlement Detail', 'class' => 'col-span-full  md:col-span-6 md:pr-2', 'fields' => ['partner_id', 'trn_id', 'trn_type', 'f_year']],
            ['label' => 'Leave Entitlement Day', 'class' => 'col-span-full  md:col-span-6 md:pr-2', 'fields' => ['day_in', 'day_out']],
        ];
        $structure['filter'] = ['partner_id', 'leave_id', 'trn_id', 'day_in', 'day_out', 'f_year'];

        return $structure;
    }


    /**
     * Define rights for this model.
     *
     * @return array
     */
    public function rights(): array
    {
        $rights = parent::rights();

        $rights['staff'] = ['view' => true];
        $rights['registered'] = ['view' => true];
        $rights['guest'] = [];

        return $rights;
    }

}
