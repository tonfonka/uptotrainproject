@extends('layouts.headindex') @section('title', 'log in') @section('content')


<body>
  <div class="container">
    <!-- LOGIN FORM -->
    <div class="text-center" style="padding:100px 0">
      <div class="logo">Who are you?</div>
      <!-- Main Form -->
      <div class="login-form-1">
        <form id="login-form" class="text-left">
          <div class="login-form-main-message"></div>
          <div class="main-login-form">
            <div class="login-group">
              <div class="form-group">
                <div class="form-control">
                  <button class="btn btn-lg btn-primary btn-block" type="submit">
                    I am tourist
                  </button>
                </div>
              </div>
              <div class="form-group login-group-checkbox">
                <div class="form-control">
                  <button class="btn btn-lg btn-primary btn-block" type="submit">
                    I am travel agency
                  </button>
                </div>
              </div>
            </div>
            <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
          </div>
          <div class="etc-login-form">
            <p>new user? <a href="#">create new account</a></p>
            <p>new agency? <a href="#">create new account</a></p>
          </div>
      </div>
    </div>
    </form>
    <!-- end:Main Form -->
  </div>
  </div>
</body>