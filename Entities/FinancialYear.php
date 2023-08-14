<?php

namespace Modules\Hrm\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class FinancialYear extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['fy_name', 'start_date', 'end_date', 'description'];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['fy_name'];

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
    protected $table = "hrm_financial_year";

    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table): void
    {
        $this->fields->increments('id')->html('text');
        $this->fields->string('fy_name')->nullable()->html('text');
        $this->fields->integer('start_date')->nullable()->index('start_date')->html('date');
        $this->fields->integer('end_date')->nullable()->index('end_date')->html('date');
        $this->fields->string('description')->nullable()->html('textarea');

        $this->fields->index(['start_date', 'end_date'], 'year_search');
    }
}
