<x-layouts>

    <section id="edit">
        <div class="container-edit">
    <form action="/comment/edit/{{ $comment->id }}" method="POST">
        @csrf
        <textarea name="comment" id="comment" cols="30" rows="10">{{ $comment->comment }}</textarea><br>
        <button type="submit">Edit comment</button>
        </form>
    </div>
    </section>
</x-layouts>