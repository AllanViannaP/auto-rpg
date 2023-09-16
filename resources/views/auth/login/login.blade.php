@extends('template.master')


@section('content')
<title>Log In</title>
<!-- Login -->
<section class="inner-page">
    <div class="container">
        <div class="container d-flex flex-column">
            <div class="row">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center mt-4">
                            <h1 class="h2 section-title" data-aos="fade-up">
                                Please <b>log in</b> to continue
                            </h1>
                            <?php
                            session_start();
                            if (isset($_SESSION['login_invalido'])) {
                                echo '<div class="alert alert-danger" style="margin-top : 20px;" role="alert">' . $_SESSION['login_invalido']['mensagem'] . '</div>';
                                unset($_SESSION['login_invalido']);
                            }
                            ?>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <div class="text-center">
                                    </div>
                                    <form class="sign-up-form form" action="{{ route('login.verify') }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input class="form-control form-control-lg" type="email" name="email" placeholder="example@email.com" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input class="form-control form-control-lg" type="password" name="password" />
                                            <small>
                                                <a >Forgot your password?</a>
                                            </small>
                                        </div>
                                        <div class="mt-3">
                                            <button type="submit" class="btn btn-lg btn-primary rounded-pill">Login</button>
                                        </div>
                                    </form>
                                    <br>
                                    <div class="mt-3">
                                        <span>Don't have an account?<a class="nav-link" href="{{route('register')}}" style="color:blue">Sign In</a> 
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
