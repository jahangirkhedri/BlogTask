<?php

namespace Module\blog\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Module\blog\Contracts\PostServiceInterface;
use Module\blog\Models\Post;
use Module\user\Models\User;

use Tests\TestCase;

class PostServiceTest extends TestCase
{
    use RefreshDatabase,WithFaker;

    protected $postService;

    public function setUp(): void
    {
        parent::setUp();
        $this->postService = resolve(PostServiceInterface::class);
    }

    public function test_create_post()
    {
        $user = User::factory()->create();

        $data = [
            'title' => $this->faker->title,
            'content' => $this->faker->realText,
            'user_id' => $user->id
        ];

        $post = $this->postService->create($data);

        $this->assertInstanceOf(Post::class, $post);
        $this->assertEquals($data['title'], $post->title);
        $this->assertEquals($data['content'], $post->content);
        $this->assertEquals($data['user_id'], $post->user_id);
    }

    public function test_update_post()
    {
        $user = User::factory()->create();

        $post = Post::factory()->user($user->id)->create();

        $data = [
            'title' => $this->faker->title,
            'content' => $this->faker->realText,
        ];

        $updatePost = $this->postService->update($post->id, $data);
        $updatedPost = $this->postService->getById($post->id);

        $this->assertTrue($updatePost);
        $this->assertEquals($data['title'], $updatedPost->title);
        $this->assertEquals($data['content'], $updatedPost->content);
    }

    public function test_delete_post()
    {
        $user = User::factory()->create();

        $post = Post::factory()->user($user->id)->create();

        $deletePost = $this->postService->delete($post->id);

        $this->assertTrue( $deletePost);
        $this->assertSoftDeleted('posts', ['id' => $post->id]);

    }

    public function test_get_post_by_id()
    {
        $user = User::factory()->create();

        $post = Post::factory()->user($user->id)->create();

        $retrievedPost = $this->postService->getById($post->id);

        $this->assertInstanceOf(Post::class, $retrievedPost);
        $this->assertEquals($post->id, $retrievedPost->id);
    }

    public function test_restore_post()
    {
        $user = User::factory()->create();

        $post = Post::factory()->user($user->id)->create();
        $postId = $post->id;
        $post->delete();
        $restorePost = $this->postService->restore($postId);
        $restoredPost = $this->postService->getById($postId);

        $this->assertTrue($restorePost);
        $this->assertInstanceOf(Post::class, $restoredPost);
        $this->assertEquals($post->id,$restoredPost->id);

    }

    public function test_change_status()
    {
        $user = User::factory()->create();
        $post = Post::factory()->user($user->id)->create();

        $updatePostStatus = $this->postService->changeStatus($post->id);
        $updatedPost = $this->postService->getById($post->id);

        $this->assertTrue($updatePostStatus);
        $this->assertEquals(1,$updatedPost->status);
    }
}
