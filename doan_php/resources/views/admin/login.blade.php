@section('page-js')
    @if(session('thong_bao'))
         <script>
            Swal.fire("{{session('thong_bao')}}");
        </script>
    @endif

@endsection

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../tung.css">
    <script src="https://kit.fontawesome.com/c9f5871d83.js" crossorigin="anonymous"></script>
    <title>Login</title>
</head>
<body>
        <header class="header">

            <div class="search">

                <i class="fa-solid fa-user"></i>
            </div>
        </header>
        <form class="row g-3" method="POST" action="{{ route('xl-login') }}">
            @csrf
        <div class="background"><img src="background.jpg" alt=""></div>
        <section class="home">
            <div class="content">
                <a href="#" class="logo"> <i class="fa-solid fa-paper-plane"></i>Admin</a>
                <h2> Welcome!</h2>
                <h3> Bạn mãi yêu </h3>
            </div>
            <div class="login">
                <h2> Login </h2>
                <div class="input">
                    <input type="text" name="ten_dn" class="input1" id="ten_dn" placeholder="User Name" required>
                   <i class="fa-solid fa-envelope"></i>
                </div>
                <div class="input">
                    <input type="password"  name="mat_khau" class="input1" id="mat_khau" placeholder="Password" required>
                    <i class="fa-solid fa-lock"></i>
                </div>
                <div class="check">
                    <label> <input type="checkbox">Remember me </label>
                    <a href="#"> Forgot Password?</a>
                </div>
                <div class="button">
                  <button class="btn" type="submit"> Login </button>
                </div>
                <div class="sign-up">
                    <p> Don't have an account? </p>
                    <a href="register.html"> Sign up</a>
                </div>
            </div>
        </section>
    </form>

</body>
</html>
