<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Topic;
use App\Models\User;
use App\Models\Link;

class CategoriesController extends Controller
{
    function show(Category $category, Request $request, Topic $topic, User $user, Link $link){

        $topics = $topic->withOrder($request->order)
            ->where('category_id', $category->id)
            ->paginate(20);

        // 活跃用户列表
        $active_users = $user->getActiveUsers();

        // 资源链接
        $links = $link->getAllCached();

        return view('topics.index', compact('topics', 'category', 'active_users', 'links'));

    }
}
