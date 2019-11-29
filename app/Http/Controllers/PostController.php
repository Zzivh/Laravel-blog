<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // 列表
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->paginate(6);
        return view('post/index', compact('posts'));
    }
    // 详情
    public function show(Post $post)
    {
        return view('post/show', compact('post'));
    }
    // 创建页面
    public function create()
    {
        return view('post/create');
    }
    // 创建逻辑
    public function store()
    {
        // 验证操作
        $this->validate(\request(), [
            'title' => 'required|string|max:100|min:5',
            'content' => 'required|string|min:10',
        ]);
        // 逻辑
        $user_id = Auth::id();
        $params = array_merge(\request(['title', 'content']), compact('user_id'));
        $post = Post::create($params);

        // 跳转
        return redirect('/posts');
    }
    // 编辑页面
    public function edit(Post $post)
    {
        return view('post/edit', compact('post'));
    }
    // 编辑逻辑
    public function update(Post $post)
    {
        // 验证
        $this->validate(request(), array(
            'title' => 'required|string|max:100|min:5',
            'content' => 'required|string|min:10'
        ));
        $this->authorize('delete', $post);
        //逻辑
        $post->title = request('title');
        $post->content = request('content');
        $post->save();
        // 渲染
        return redirect("/posts/{$post->id}");
    }
    // 删除逻辑
    public function delete(Post $post)
    {
        // TODO:用户的权限验证
        $this->authorize('delete', $post);
        $post->delete();
        return redirect("/posts");
    }

    // 上传图片
    public function imageUpload(Request $request)
    {
        $path = $request->file('wangEditorH5File')->storePublicly(md5(time()));
        return asset('storage/'.$path);
    }
}
