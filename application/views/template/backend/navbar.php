  <main class="main-content position-relative border-radius-lg ">
  	<!-- Navbar -->
  	<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
  		data-scroll="false">
  		<div class="container-fluid py-1 px-3">
  			<nav aria-label="breadcrumb">
  				<ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
  					<li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a>
  					</li>
  					<li class="breadcrumb-item text-sm text-white active" aria-current="page"><?= ucwords($this->uri->segment(1) == 'admin' ? 'Dashboard' : $this->uri->segment(1));?> <?= ucwords($this->uri->segment(2));?></li>
  				</ol>
  				<h6 class="font-weight-bolder text-white mb-0"><?= ucwords($this->uri->segment(1) == 'admin' ? 'Dashboard' : $this->uri->segment(1));?> <?= ucwords($this->uri->segment(2));?></h6>
  			</nav>
  			<div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
  				<ul class="navbar-nav ms-md-auto  justify-content-end">
  					<li class="nav-item dropdown pe-2 d-flex align-items-center" id="navbar-profil">
  						<a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton"
  							data-bs-toggle="dropdown" aria-expanded="false">
  							<i class="fa fa-user cursor-pointer"></i>
  						</a>
  						<ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4"
  							aria-labelledby="dropdownMenuButton" style="top: 0px !important; right: 3px !important;">
  							<li class="mb-2">
  								<a class="dropdown-item border-radius-md" href="<?= site_url('pengaturan');?>">
  									<div class="d-flex py-1">
  										<div class="d-flex flex-column justify-content-center">
  											<h6 class="text-sm font-weight-normal mb-1">
  												<i class="fas fa-tools"></i> Pengaturan
  											</h6>
  										</div>
  									</div>
  								</a>
  							</li>
  							<li>
  								<a class="dropdown-item border-radius-md" href="<?= site_url('logout');?>">
  									<div class="d-flex py-1">
  										<div class="d-flex flex-column justify-content-center">
  											<h6 class="text-sm font-weight-normal mb-1">
  												<i class="fas fa-sign-out-alt"></i> Keluar
  											</h6>
  										</div>
  									</div>
  								</a>
  							</li>
  						</ul>
  					</li>
  				</ul>
  			</div>
  		</div>
  	</nav>
  	<!-- End Navbar -->
  	<div class="container-fluid py-4">
