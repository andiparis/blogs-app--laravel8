<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
  public function index()
  {
    $title = '';

    if (request('category')) {
      $category = Category::firstWhere('slug', request('category'));
      $title = ' in ' . $category->name;
    }
    if (request('author')) {
      $author = User::firstWhere('username', request('author'));
      $title = ' in ' . $author->name;
    }

    return view('post.posts', [
      'title'     => 'All Posts' . $title,
      'posts'     => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString(),
    ]);
  }

  public function show(Post $post)
  {
    return view('post.post', [
      'title'     => 'Post',
      'post'      => $post,
    ]);
  }
}
