<x-layouts>

    <form action="/post/edit/{{ $post->id }}" method="POST">
        @csrf
        <textarea name="post" id="post" cols="30" rows="10">{{ $post->post }}</textarea><br>
        <button type="submit">edit</button>
        </form>
    
</x-layouts>