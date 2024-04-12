<?php

namespace Modules\Hrm\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class EmployeeRemoteWorkRequest extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['partner_id', 'reason', 'start_date', 'end_date', 'days', 'status'];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['partner_id', 'reason'];

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
    protected $table = "hrm_employee_remote_work_request";

    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);

        $statuses = ['pending' => 'Pending', 'approved' => 'Approved', 'rejected' => 'Rejected'];
        $statuses_color = ['pending' => 'gray', 'approved' => 'green', 'rejected' => 'red'];

        $this->fields->bigIncrements('id')->html('text');
        $this->fields->unsignedBigInteger('partner_id')->default(0)->index('partner_id')->html('recordpicker')->relation(['users']);
        $this->fields->string('reason')->nullable()->html('textarea');
        $this->fields->date('start_date')->html('date');
        $this->fields->date('end_date')->html('date');
        $this->fields->unsignedSmallInteger('days')->default(0)->html('text');
        $this->fields->enum('status', array_keys($statuses))->options($statuses)->color($statuses_color)->default('pending')->html('switch');
    }

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {
        $structure['table'] = ['partner_id', 'start_date', 'end_date', 'days', 'status'];
        $structure['filter'] = ['partner_id', 'start_date', 'end_date', 'status'];

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
