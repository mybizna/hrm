<?php

namespace Modules\Hrm\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class LeavePolicySegregation extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'leave_policy_id', 'jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul',
        'aug', 'sep', 'oct', 'nov', 'dec',
    ];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['leave_policy_id'];

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
    protected $table = "hrm_leave_policy_segregation";

    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);

        $this->fields->bigIncrements('id');
        $this->fields->unsignedBigInteger('leave_policy_id')->index('leave_policy_id')->html('recordpicker')->relation(['hrm', 'leave_policy']);
        $this->fields->unsignedTinyInteger('jan')->default(0)->html('number');
        $this->fields->unsignedTinyInteger('feb')->default(0)->html('number');
        $this->fields->unsignedTinyInteger('mar')->default(0)->html('number');
        $this->fields->unsignedTinyInteger('apr')->default(0)->html('number');
        $this->fields->unsignedTinyInteger('may')->default(0)->html('number');
        $this->fields->unsignedTinyInteger('jun')->default(0)->html('number');
        $this->fields->unsignedTinyInteger('jul')->default(0)->html('number');
        $this->fields->unsignedTinyInteger('aug')->default(0)->html('number');
        $this->fields->unsignedTinyInteger('sep')->default(0)->html('number');
        $this->fields->unsignedTinyInteger('oct')->default(0)->html('number');
        $this->fields->unsignedTinyInteger('nov')->default(0)->html('number');
        $this->fields->unsignedTinyInteger('dec')->default(0)->html('number');
    }

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {

        $structure['table'] = ['leave_policy_id', 'jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec'];
        $structure['form'] = [
            ['label' => 'Leave Policy', 'class' => 'col-span-full', 'fields' => ['leave_policy_id']],
            ['label' => 'Jan-Jun', 'class' => 'col-span-full md:col-span-6', 'fields' => ['jan', 'feb', 'mar', 'apr', 'may', 'jun']],
            ['label' => 'Jul-Dec', 'class' => 'col-span-full md:col-span-6', 'fields' => ['jul', 'aug', 'sep', 'oct', 'nov', 'dec']],
        ];
        $structure['filter'] = ['leave_policy_id'];

        return $structure;
    }
}
