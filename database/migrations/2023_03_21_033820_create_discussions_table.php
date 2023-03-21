<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('discussions', function (Blueprint $table): void {
            $table->id();

            $table->text(column: 'discussion');
            $table->string(column: 'bgColor');

            $table->foreignId(column: 'unit_id')
                ->nullable()
                ->index()
                ->constrained()
                ->nullOnDelete();

            $table->foreignId(column: 'user_id')
                ->index()
                ->constrained()
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }
};
