<x-layouts>
   
    <section id="auth">
    <div class="container">
    <form class="auth" action="/login" method="POST"> 
        @csrf
        <input type="text" placeholder="email" name="email"><br>
            @error('email')

                <p>{{ $message }}</p>
        
             @enderror
        <input type="password" placeholder="password" name="password"><br>
            @error('password')

                <p>{{ $message }}</p>
        
             @enderror
        <button type="submit">Login</button>
    </form>
    <a href="/register">register</a>
</div>
</section>
</x-layouts>