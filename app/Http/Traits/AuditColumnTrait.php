<?php

namespace App\Http\Traits;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Schema\Blueprint;

trait AuditColumnTrait
{
    public function addAdminAudidColumns(Blueprint $table):void
    {
        $table->unsignedbigInteger("created_by")->nullable();
        $table->unsignedbigInteger("updated_by")->nullable();
        $table->unsignedbigInteger("deleted_by")->nullable();

        $table->foreign("created_by")->references("id")->on("users")->onDelete("cascade");
        $table->foreign("updated_by")->references("id")->on("users")->onDelete("cascade");
        $table->foreign("deleted_by")->references("id")->on("users")->onDelete("cascade");
    }

    public function dropAdminAudColumns(Blueprint $table):void
    {
        $table->dropForeign(["created_by"]);
        $table->dropForeign(["updated_by"]);
        $table->dropForeign(["deleted_by"]);
        $table->dropColumn(["created_by","updated_by","deleted_by"]);
    }
}
