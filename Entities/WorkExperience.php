<?php

namespace Modules\Hrm\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class WorkExperience extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['employee_id', 'company_name', 'job_title', 'from', 'to', 'description'];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['employee_id', 'company_name'];
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
    protected $table = "hrm_work_experience";

    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);

        $this->fields->increments('id')->html('number');
        $this->fields->integer('employee_id')->nullable()->index('employee_id')->html('number');
        $this->fields->string('company_name', 100)->nullable()->html('text');
        $this->fields->string('job_title', 100)->nullable()->html('text');
        $this->fields->date('from')->nullable()->html('date');
        $this->fields->date('to')->nullable()->html('date');
        $this->fields->text('description')->nullable()->html('textarea');
    }

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {

        $structure['table'] = ['employee_id', 'company_name', 'job_title', 'from', 'to'];
        $structure['form'] = [
            ['label' => 'Job Title', 'class' => 'col-span-full', 'fields' => ['job_title']],
            ['label' => 'Main', 'class' => 'col-span-full md:col-span-6', 'fields' => ['employee_id', 'company_name']],
            ['label' => 'From - To', 'class' => 'col-span-full md:col-span-6', 'fields' => ['from', 'to']],
            ['label' => 'Description', 'class' => 'col-span-full', 'fields' => ['description']],
        ];
        $structure['filter'] = ['employee_id', 'company_name', 'job_title'];

        return $structure;
    }

}
