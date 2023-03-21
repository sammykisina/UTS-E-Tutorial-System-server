<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('comments', function (Blueprint $table): void {
            $table->id();

            $table->text(column: 'comment');

            $table->foreignId(column: 'discussion_id')
                ->index()
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId(column: 'user_id')
                ->index()
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->timestamps();
        });
    }
};
