<style>
html,
body {
    height: 100%;
}

body {
    display: flex;
    align-items: center;
    padding-top: 40px;
    padding-bottom: 40px;
    background-color: #f5f5f5;
}

.form-signin {
    max-width: 330px;
    padding: 15px;
}

.form-signin .form-floating:focus-within {
    z-index: 2;
}

.form-signin input[type="email"] {
    margin-bottom: -1px;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}
</style>

<main class="form-signin w-100 m-auto text-center">
    <form action="{{route('register-user')}}" method="post">
        {{view('session_alert')}}
        @csrf
      <img class="mb-4" src="https://appnap.io/frontend/assets/images/common/logo-c.svg" alt="" width="172" height="57">
      <h1 class="h3 mb-3 fw-normal">Please Register</h1>
  
      <div class="form-floating">
        <input type="text" name="name" class="form-control" id="floatingInput" value="{{old('name')}}">
        <label for="floatingInput">Full Name</label>
        <span class="text-danger">@error('name'){{$message}}@enderror</span>
      </div>
      <div class="form-floating">
        <input type="email" name="email" class="form-control" id="floatingInput" value="{{old('email')}}">
        <label for="floatingInput">Email address</label>
        <span class="text-danger">@error('email'){{$message}}@enderror</span>
      </div>
      <div class="form-floating">
        <input type="password" name="password" class="form-control" id="floatingInput">
        <label for="floatingInput">Password</label>
        <span class="text-danger">@error('password'){{$message}}@enderror</span>
      </div>
      <br>
      <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
    </form>
    <a href="{{url('/login')}}"><button class="w-100 btn btn-success" type="submit">Already have an account? Login!</button></a>
</main>



<!-- <div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-8">
            <h3>Registration Form</h3>
            <form action="{{route('register-user')}}" method="post">
                {{view('session_alert')}}
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
</div> -->