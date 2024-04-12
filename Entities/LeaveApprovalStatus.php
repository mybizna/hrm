<?php

namespace Modules\Hrm\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class LeaveApprovalStatus extends BaseModel
{

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'leave_request_id', 'approval_status_id', 'approved_by', 'message',
    ];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['leave_request_id', 'approval_status_id', 'approved_by'];

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
    protected $table = "hrm_leave_approval_status";

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
        $this->fields->unsignedBigInteger('leave_request_id')->index('leave_request_id')->html('recordpicker')->relation(['hrm', 'leave_request']);
        $this->fields->unsignedTinyInteger('approval_status_id')->default(0)->index('approval_status_id')->html('recordpicker')->relation(['hrm', 'approval_status']);
        $this->fields->unsignedBigInteger('approved_by')->nullable()->html('recordpicker')->relation(['users']);
        $this->fields->text('message')->nullable()->html('text');
    }

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {
        $structure['table'] = ['leave_request_id', 'approval_status_id', 'approved_by', 'message'];
        $structure['filter'] = ['leave_request_id', 'approval_status_id', 'approved_by'];

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
