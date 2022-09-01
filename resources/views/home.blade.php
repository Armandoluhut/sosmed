<x-layouts>
    
    <main id="home">
    <h1>Welcome {{ auth()->user()->name }}</h1>
    <a href="/logout">logout</a>

    <form class="form-post" action="/post" method="POST">
    @csrf
    <textarea name="post" id="post" cols="30" rows="10"></textarea><br>
    <button type="submit">Post</button>
    </form>

    @error('post')

    <p>{{ $message }}</p>
        
    @enderror

    <h2>Post</h2>
    @foreach ($posts as $post)
    <div class="container-post">
    <p>By: {{ $post->user->name }}</p>
    <p>Post: {{ $post->post }}</p>
    <a href="/post/edit/{{ $post->id }}">edit</a>
    <a href="/post/delete/{{ $post->id }}">delete</a>
    
    
   
    <form class="form-comment" action="/comment/{{ $post->id }}" method="POST">
    @csrf
    <textarea name="comment" id="comment" cols="30" rows="3"></textarea>
    <button type="submit">comen</button>
    </form>

    @error('comment')

    <p>{{ $message }}</p>
        
    @enderror

    <h3>Comen</h3>
    @foreach($comments->where('post_id', $post->id) as $comment)
    <div class="container-comment">
    <p>By: {{ $comment->user->name }}</p>
    <p>Comment: {{ $comment->comment }}</p>
    <a href="/comment/edit/{{ $comment->id }}">edit</a>
    <a href="/comment/delete/{{ $comment->id }}">delete</a>


    </div>

    @endforeach
    
    </div>

    @endforeach
</main>
</x-layouts>