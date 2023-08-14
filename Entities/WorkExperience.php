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
    public function fields(Blueprint $table): void
    {

        $this->fields->increments('id')->html('number');
        $this->fields->integer('employee_id')->nullable()->index('employee_id')->html('number');
        $this->fields->string('company_name', 100)->nullable()->html('text');
        $this->fields->string('job_title', 100)->nullable()->html('text');
        $this->fields->date('from')->nullable()->html('date');
        $this->fields->date('to')->nullable()->html('date');
        $this->fields->text('description')->nullable()->html('textarea');
    }

}
