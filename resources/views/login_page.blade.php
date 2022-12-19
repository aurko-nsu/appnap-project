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
    <form action="{{route('login-user')}}" method="post">
        {{view('session_alert')}}
        @csrf
      <img class="mb-4" src="https://appnap.io/frontend/assets/images/common/logo-c.svg" alt="" width="172" height="57">
      <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
  
      <div class="form-floating">
        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="E.g. heroalam@gmail.com" value="{{old('email')}}">
        <label for="floatingInput">Email address</label>
        <span class="text-danger">@error('email'){{$message}}@enderror</span>
      </div>
      <div class="form-floating">
        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
        <span class="text-danger">@error('password'){{$message}}@enderror</span>
      </div>
      <br>
      <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    </form>
    <a href="{{url('/register')}}"><button class="w-100 btn btn-success" type="submit">New? Register First!</button></a>
</main>