<?php

namespace Modules\Hrm\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class Designation extends BaseModel
{

    protected $fillable = ['title', 'slug', 'description', 'status'];
    public $migrationDependancy = [];
    protected $table = "hrm_designation";

    /**
     * List of fields for managing postings.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
    {
        $table->increments('id');
        $table->string('title', 200)->default('');
        $table->string('slug')->nullable();
        $table->text('description')->nullable();
        $table->boolean('status')->default(1);
    }
}
