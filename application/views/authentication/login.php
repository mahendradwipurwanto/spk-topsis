    <section>
    	<div class="page-header min-vh-100">
    		<div class="container">
    			<div class="row">
    				<div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
    					<div class="card card-plain">
    						<div class="card-header pb-0 text-start">
    							<h4 class="font-weight-bolder">Masuk ke akun anda</h4>
    							<p class="mb-0">Masukkan email dan password anda untuk melanjutkan</p>
    						</div>
    						<div class="card-body">
    							<form role="form" action="<?= site_url('authentication/proses_login');?>" method="POST">
    								<div class="mb-3">
    									<input type="email" class="form-control form-control-lg" placeholder="Email" name="email"
    										aria-label="Email" required>
    								</div>
    								<div class="mb-3">
    									<input type="password" class="form-control form-control-lg" placeholder="Password" name="password"
    										aria-label="Password" required>
    								</div>
    								<div class="text-center">
    									<button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Masuk</button>
    								</div>
    							</form>
    						</div>
    					</div>
    				</div>
    				<div
    					class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
    					<div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
    						style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg');
          background-size: cover;">
    						<span class="mask bg-gradient-primary opacity-6"></span>
    						<h4 class="mt-5 text-white font-weight-bolder position-relative"><?= $web_title;?> 2022</h4>
    						<p class="text-white position-relative">Ketika kau berbagi dengan orang lain sebagian dari apa yang kau miliki, apa yang tersisa akan berlipat ganda dan tumbuh.</p>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>
