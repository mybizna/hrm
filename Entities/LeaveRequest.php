<?php

namespace Modules\Hrm\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class LeaveRequest extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'user_id', 'leave_id', 'leave_entitlement_id', 'day_status_id', 'days',
        'start_date', 'end_date', 'reason', 'last_status',
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
    protected $table = "leave_request";

    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);

        $this->fields->bigIncrements('id')->html('text');
        $this->fields->unsignedBigInteger('user_id')->index('user_id')->html('recordpicker')->relation(['users']);
        $this->fields->unsignedSmallInteger('leave_id')->html('recordpicker')->relation(['hrm', 'leave']);
        $this->fields->unsignedBigInteger('leave_entitlement_id')->default(0)->index('leave_entitlement_id')->html('recordpicker')->relation(['hrm', 'leave_entitlement']);
        $this->fields->unsignedSmallInteger('day_status_id')->default(1)->html('recordpicker')->relation(['hrm', 'day_status']);
        $this->fields->unsignedDecimal('days', 5, 1)->default(0.0)->html('number');
        $this->fields->integer('start_date')->html('datetime');
        $this->fields->integer('end_date')->html('datetime');
        $this->fields->text('reason')->nullable()->html('textarea');
        $this->fields->unsignedSmallInteger('last_status')->default(2)->index('last_status')->html('number');

        $this->fields->index(['user_id', 'leave_id'], 'user_leave');
        $this->fields->index(['user_id', 'leave_entitlement_id'], 'user_entitlement');
    }

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {
        $structure = [
            'table' => ['user_id', 'leave_id', 'leave_entitlement_id', 'day_status_id', 'days', 'start_date', 'end_date', 'last_status'],
            'filter' => ['user_id', 'leave_id', 'leave_entitlement_id', 'day_status_id'],
        ];

        return $structure;
    }
}
