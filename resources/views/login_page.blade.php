<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-8">
            <h3>Login Form</h3>
            <form action="{{route('login-user')}}" method="post">
                {{view('session_alert')}}
                @csrf
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="E.g. heroalam@gmail.com" value="{{old('email')}}">
                    <span class="text-danger">@error('email'){{$message}}@enderror</span>
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter a strong password.">
                    <span class="text-danger">@error('password'){{$message}}@enderror</span>
                </div>
                <br>
                <div class="form-group">
                    <button class="btn btn-block btn-primary" type="submit">Login</button>
                </div>
            </form>
            <a href="{{url('/register')}}"><button class="btn btn-block btn-secondary">New? Register First!</button></a>
        </div>
    </div>
</div>