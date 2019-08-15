<?php

namespace Tests\Unit;

use App\Project;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectsTest extends TestCase
{
    use RefreshDatabase;
    protected $project;

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->project = factory(Project::class)->create([
            'owner_id' => function() {
                return factory(User::class)->create()->id;
            }
        ]);
    }

    /** @test */
    public function it_has_a_path()
    {
        $this->assertEquals('/projects/' . $this->project->id, $this->project->path());
    }

    /** @test */
    public function it_belongs_to_an_owner()
    {
        $this->assertInstanceOf(User::class, $this->project->owner);
    }
}
