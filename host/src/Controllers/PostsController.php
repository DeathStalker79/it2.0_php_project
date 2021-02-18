<?php

namespace It20Academy\App\Controllers;

use It20Academy\App\Core\View;
use It20Academy\App\Models\Authors;
use It20Academy\App\Models\Category;
use It20Academy\App\Models\Post;
use It20Academy\App\Models\Statuses;

class PostsController
{
    public function index()
    {
        $posts = Post::filteredPost();
        $categories = Category::allCategories();
        $authors = Authors::allAuthors();
        $statuses = Statuses::allStatuses();

        echo View::render('posts-index',compact('posts', 'authors', 'statuses', 'categories'));
    }
}