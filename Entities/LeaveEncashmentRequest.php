<?php

namespace Modules\Hrm\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class LeaveEncashmentRequest extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'partner_id', 'leave_id', 'approved_by', 'approval_status_id', 'encash_days',
        'forward_days', 'amount', 'total', 'f_year',
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
    protected $table = "hrm_leave_encashment_request";

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
        $this->fields->unsignedBigInteger('partner_id')->index('partner_id')->html('recordpicker')->relation(['users']);
        $this->fields->unsignedSmallInteger('leave_id')->index('leave_id')->html('recordpicker')->relation(['hrm', 'leave']);
        $this->fields->unsignedBigInteger('approved_by')->nullable()->html('recordpicker')->relation(['users']);
        $this->fields->unsignedTinyInteger('approval_status_id')->default(1)->html('recordpicker')->relation(['hrm', 'approval_status']);
        $this->fields->unsignedDecimal('encash_days', 4, 1)->default(0.0)->html('number');
        $this->fields->unsignedDecimal('forward_days', 4, 1)->default(0.0)->html('number');
        $this->fields->decimal('amount', 20, 2)->default(0.00)->html('number');
        $this->fields->decimal('total', 20, 2)->default(0.00)->html('number');
        $this->fields->unsignedSmallInteger('f_year')->index('f_year')->html('number');
    }

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {

        $structure['table'] = ['partner_id', 'leave_id', 'approved_by', 'approval_status_id', 'encash_days', 'forward_days', 'amount', 'total', 'f_year'];
        $structure['form'] = [
            ['label' => 'Leave Encashment Request', 'class' => 'col-span-full', 'fields' => ['leave_id']],
            ['label' => 'Leave Encashment Request Detail', 'class' => 'col-span-full', 'fields' => ['partner_id', 'approved_by', 'approval_status_id', 'encash_days']],
            ['label' => 'Leave Encashment Request Setting', 'class' => 'col-span-full', 'fields' => ['forward_days', 'amount', 'total', 'f_year']],
        ];
        $structure['filter'] = ['partner_id', 'leave_id', 'approved_by', 'approval_status_id'];

        return $structure;
    }

}
