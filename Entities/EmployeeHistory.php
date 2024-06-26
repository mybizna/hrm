<?php

namespace Modules\Hrm\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class EmployeeHistory extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['partner_id', 'module', 'category', 'type', 'comment', 'data', 'date'];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['partner_id', 'module'];

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
    protected $table = "hrm_employee_history";

    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);

        $this->fields->increments('id')->html('hidden');
        $this->fields->unsignedBigInteger('partner_id')->default(0)->index('partner_id')->html('recordpicker')->relation(['users']);
        $this->fields->string('module', 20)->nullable()->index('module')->html('text');
        $this->fields->string('category', 20)->nullable()->html('text');
        $this->fields->string('type', 20)->nullable()->html('text');
        $this->fields->text('comment')->nullable()->html('text');
        $this->fields->longText('data')->nullable()->html('text');
        $this->fields->dateTime('date')->html('date');
    }

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {
        $structure['table'] = ['partner_id', 'module', 'category', 'type', 'date'];
        $structure['filter'] = ['partner_id', 'module', 'category', 'type', 'date'];

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
