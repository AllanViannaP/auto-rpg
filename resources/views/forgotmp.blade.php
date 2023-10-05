@extends('template.master')

@section('title')
   <title>Reset Password</title>
@endsection

@section('content')
<section class="inner-page">
    <div class="main-container">
        

       
        <!-- Form do Reset Password -->
<br>
<br>
<br>

        <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="text-center">
                                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                                  <h2 class="text-center">Forgot Password?</h2>
                                  <p>You can reset your password here.</p>
                                    <div class="panel-body">
                                      
                                      <form class="form">
                                        <fieldset>
                                          <div class="form-group">
                                            <div class="input-group">
                                              <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                              
                                              <input id="emailInput" placeholder="email address" class="form-control" type="email" oninvalid="setCustomValidity('Please enter a valid email address!')" onchange="try{setCustomValidity('')}catch(e){}" required="">
                                            </div>
                                          </div>
                                          <br>
                                          <div class="form-group">
                                            <input class="btn btn-lg btn-primary btn-block" value="Send My Password" type="submit">
                                          </div>
                                        </fieldset>
                                      </form>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <!-- Fim do Form -->


    </div>
</section> 

@endsection

