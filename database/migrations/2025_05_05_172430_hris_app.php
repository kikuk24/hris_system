<?php

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
        Schema::create("employees", function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("email")->unique();
            $table->string("phone_number");
            $table->string("address");
            $table->date("birth_date");
            $table->date("hire_date");
            $table->foreignKey("department_id")->constrained("departments");
            $table->foreignKey("role_id")->constrained("roles");
            $table->string("status");
            $table->decimal("salary", 10, 2)->default(0);

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create("departments", function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("description")->nullable();
            $table->strinh("status")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create("roles", function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("description")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create("tasks", function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("description")->nullable();
            $table->foreignKey("assigned_to")->constrained("employees");
            $table->date("due_date");
            $table->string("status");
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create("payroles", function (Blueprint $table) {
            $table->id();
            $table->foreignKey("employee_id")->constrained("employees")->onDelete();
            $table->decimal("salary", 10, 2);
            $table->decimal("bonuses", 10, 2)->nullable();
            $table->decimal("deductions", 10, 2)->nullable();
            $table->decimal("net_salary", 10, 2);
            $table->date("pay_date");
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create("presenses", function (Blueprint $table) {
            $table->id();
            $table->foreignKey("employee_id")->constrained("employees")->onDelete();
            $table->date("check_in");
            $table->date("check_out");
            $table->date("date");
            $table->string("status");
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create("leave_requests", function (Blueprint $table) {
            $table->id();
            $table->foreignKey("employee_id")->constrained("employees")->onDelete();
            $table->string("leave_type");
            $table->date("start_date");
            $table->date("end_date");
            $table->string("status");
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("employees");
        Schema::dropIfExists("departments");
        Schema::dropIfExists("roles");
        Schema::dropIfExists("tasks");
        Schema::dropIfExists("payroles");
        Schema::dropIfExists("presenses");
        Schema::dropIfExists("leave_requests");
    }
};
