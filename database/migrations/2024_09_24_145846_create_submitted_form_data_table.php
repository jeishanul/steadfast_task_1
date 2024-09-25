<?php

use App\Models\FormField;
use App\Models\SubmittedForm;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('submitted_form_data', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(SubmittedForm::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(FormField::class)->constrained()->cascadeOnDelete();
            $table->string('field_value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submitted_form_data');
    }
};
