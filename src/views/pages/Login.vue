<template>
  <div class="app flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-group mb-0">
            <div class="card p-3">
              <div class="card-block">
                <h3>Login to IATI Hub</h3>
                <p class="text-muted">Sign In to your account</p>
                <div class="input-group mb-3">
                  <span class="input-group-addon"><i class="icon-user"></i></span>
                  <input type="text" class="form-control" placeholder="Username">
                </div>
                <div class="input-group mb-4">
                  <span class="input-group-addon"><i class="icon-lock"></i></span>
                  <input type="password" class="form-control" placeholder="Password">
                </div>
                <div class="row">
                  <div class="col-6">
                    <button type="button" class="btn btn-primary px-4">Login </button>
                  </div>
                  <div class="col-6 text-right">
                    <button type="button" class="btn btn-link px-0">Forgot password?</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="card card-inverse card-success py-3 d-md-down-none" style="width:44%">
              <div class="card-block text-center">
                <div class="text-center">
                  <h3>Sign up</h3>
                  <p>If you dont have an account, please sign up</p>
                  <!--- <button type="button" @click="" class="btn btn-primary active mt-3">Register Now!</button> -->
				  <router-link :to="'/auth/register'" class="btn btn-primary active mt-1" exact> Register Now! </router-link> 
                </div> 
				<div class="mt-4 text-center">
				    <p class="text-center mb-2 ">Or sign up with...</p> 
					<div class="row">
						<div class="col-6 mt-3">
						  <button class="btn btn-block btn-facebook" type="button"><span>facebook</span></button>
						</div>
						<div class="col-6 mt-3">
						  <button class="btn btn-block btn-google-plus" type="button"><span>google plus</span></button>
						</div>
						<div class="col-6 mt-3">
						  <button class="btn btn-block btn-twitter" type="button"><span>twitter</span></button>
						</div>
						<div class="col-6 mt-3">
						  <button class="btn btn-block btn-openid" type="button"><span>openID</span></button>
						</div>
					</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Login'
}
</script>
