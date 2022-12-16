<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-8">
            <h3>Registration Form</h3>
            <form action="{{route('register-user')}}" method="post">
                @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('error'))
                <div class="alert alert-danger">{{Session::get('error')}}</div>
                @endif
                @csrf
                <div class="form-group">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Insert your full name" value="{{old('name')}}">
                    <span class="text-danger">@error('name'){{$message}}@enderror</span>
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="E.g. heroalam@gmail.com" value="{{old('email')}}">
                    <span class="text-danger">@error('email'){{$message}}@enderror</span>
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter a strong password." value="{{old('password')}}">
                    <span class="text-danger">@error('password'){{$message}}@enderror</span>
                </div>
                <br>
                <div class="form-group">
                    <button class="btn btn-block btn-primary" type="submit">Register</button>
                </div>
            </form>
            <a href="{{url('/login')}}"><button class="btn btn-block btn-secondary">Already Registered? Login!</button></a>
        </div>
    </div>
</div>