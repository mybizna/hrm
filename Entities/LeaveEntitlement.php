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
    public function fields(Blueprint $table): void
    {

        $this->fields->bigIncrements('id');
        $this->fields->unsignedBigInteger('user_id')->html('recordpicker')->table(['users']);
        $this->fields->unsignedSmallInteger('leave_id')->index('leave_id')->html('recordpicker')->table(['hrm', 'leave']);
        $this->fields->unsignedBigInteger('trn_id')->index('trn_id')->html('number');
        $this->fields->enum('trn_type', ['leave_policies', 'leave_approval_status', 'leave_encashment_requests', 'leave_entitlements', 'unpaid_leave', 'leave_encashment', 'leave_carryforward', 'manual_leave_policies', 'accounts', 'others', 'leave_accrual', 'carry_forward_leave_expired'])->default('leave_policies')->html('switch');
        $this->fields->unsignedDecimal('day_in', 5, 1)->default(0.0)->html('number');
        $this->fields->unsignedDecimal('day_out', 5, 1)->default(0.0)->html('number');
        $this->fields->text('description')->nullable()->html('textarea');
        $this->fields->smallInteger('f_year')->html('number');

        $this->fields->index(['user_id', 'leave_id', 'f_year', 'trn_type'], 'comp_key_1');
    }

}
