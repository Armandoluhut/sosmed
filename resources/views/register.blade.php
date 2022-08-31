<x-layouts>
    
    <form class="auth" action="/register" method="POST">
        @csrf
        <input type="text" placeholder="name" name="name"><br>
             @error('name')

                <p>{{ $message }}</p>
        
             @enderror
        <input type="text" placeholder="email" name="email"><br>
            @error('email')

                <p>{{ $message }}</p>
        
             @enderror
        <input type="text" placeholder="password" name="password"><br>
            @error('password')

                <p>{{ $message }}</p>
        
             @enderror
        <button type="submit">Register</button>
    </form>
    <a href="/login">login</a>

</x-layouts>