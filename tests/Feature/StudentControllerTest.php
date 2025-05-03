<?php

namespace Tests\Feature;

use Laravel\Pail\ValueObjects\Origin\Console;
use Tests\TestCase;
use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
class StudentControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_displays_students()
    {
        $students = Student::factory()->count(2)->create();

        $response = $this->get(route('students.index'));

        $response->assertStatus(200);
        foreach ($students as $student) {
            $response->assertSee($student->name);
            $response->assertSee($student->email);
        }
    }

    public function test_create_form_displays()
    {
        $response = $this->get(route('students.create'));

        $response->assertStatus(200);
        $response->assertSeeText('Create Student');
        $response->assertSee('name="name"', false);
        $response->assertSee('name="email"', false);
    }

    public function test_edit_form_displays()
    {
        $student = Student::factory()->create();

        $response = $this->get(route('students.edit', $student));

        $response->assertStatus(200);
        $response->assertSeeText('Edit Student');
        $response->assertSee($student->name);
        $response->assertSee($student->email);
    }

    public function test_show_displays_student()
    {
        $student = Student::factory()->create();
        $formattedBirthday = Carbon::parse($student->birthday)->format('F j, Y');

        $response = $this->get(route('students.show', $student));

        $response->assertStatus(200);
        $response->assertSeeText('Student Details');
        $response->assertSee($student->name);
        $response->assertSee($student->email);
        $response->assertSee($student->formattedBirthday);
        $response->assertSee($student->city);
    }

    public function test_store_creates_student()
    {
        $data = [
            'name'     => 'Test User',
            'email'    => 'test@example.com',
            'birthday' => '2000-01-01',
            'city'     => 'Testville',
        ];

        $response = $this->post(route('students.store'), $data);

        $response->assertRedirect(route('students.index'));
        $this->assertDatabaseHas('students', $data);
    }

    public function test_update_updates_student()
    {
        $student = Student::factory()->create();

        $updated = [
            'name'     => 'Updated Name',
            'email'    => 'updated@example.com',
            'birthday' => '1999-12-31',
            'city'     => 'Updated City',
        ];

        $response = $this->put(route('students.update', $student), $updated);

        $response->assertRedirect(route('students.index'));
        $this->assertDatabaseHas('students', array_merge(['id' => $student->id], $updated));
    }

    public function test_destroy_deletes_student()
    {
        $student = Student::factory()->create();

        $response = $this->delete(route('students.destroy', $student));

        $response->assertRedirect(route('students.index'));
        $this->assertDatabaseMissing('students', ['id' => $student->id]);
    }
}
