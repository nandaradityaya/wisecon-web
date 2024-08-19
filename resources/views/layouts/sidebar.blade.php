<!doctype html>
<html lang="en" class="color-sidebar sidebarcolor3">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{ asset('assets/admin/images/ico-wisesa.svg" type="image/png') }}">
	<!--plugins-->
	<link href="{{ asset('assets/admin/plugins/simplebar/css/simplebar.css" rel="stylesheet') }}">
	<link href="{{ asset('assets/admin/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet') }}">
	<link href="{{ asset('assets/admin/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet') }}">
	<link rel="stylesheet" href="{{ asset('assets/admin/libraries/gijgo/css/gijgo.min.css')}}">
	<link href="{{ asset('assets/admin/plugins/select2/css/select2.min.css')}}" rel="stylesheet') }}">
	<link href="{{ asset('assets/admin/plugins/select2/css/select2-bootstrap4.css')}}" rel="stylesheet') }}">
	<link href="{{ asset('assets/admin/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet') }}">
	<!-- loader-->
	<link href="{{ asset('assets/admin/css/pace.min.css')}}" rel="stylesheet') }}">
	<script src="{{ asset('assets/admin/js/pace.min.js')}}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('assets/admin/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{ asset('assets/admin/css/bootstrap-extended.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{ asset('assets/admin/css/app.css')}}" rel="stylesheet">
	<link href="{{ asset('assets/admin/css/icons.css')}}" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{ asset('assets/admin/css/header-colors.css') }}">
	<title>Wisesa Consulting</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div style="margin-left: 40px;">
					<img src="../assets/admin/images/logo-wisesa.svg" class="logo-icon" alt="logo icon">
				</div>
				<!-- <div style="margin-left: 40px;">
					<a href="dashboard.html" class="logo-text" style="font-family: 'Segoe UI Black';">
						<span style="font-size: larger; font-style: italic">DCT</span>
						<span style="font-size: 15px; text-decoration:overline ">WEB</span>
					</a>
				</div> -->
				<div class="toggle-icon ms-auto"><i class='bx bx-first-page'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li class="menu-label">Menu</li>
				@role('owner')
				<li class="{{ request()->routeIs('admin.homes.index') ? 'mm-active' : '' }}">
					<a href="{{ route('admin.homes.index') }}">
						<div class="parent-icon"><i class='lni lni-home'></i>
						</div>
						<div class="menu-title">{{ __('Home') }}</div>
					</a>
				</li>
				@endrole
                @role('owner')
                <li class="{{ request()->routeIs('admin.abouts.index') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.abouts.index') }}">
                        <div class="parent-icon"><i class='lni lni-world'></i></div>
                        <div class="menu-title">{{ __('About') }}</div>
                    </a>
                </li>
                @endrole
				@role('owner')
                <li class="{{ request()->routeIs('admin.services.index') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.services.index') }}">
                        <div class="parent-icon"><i class='lni lni-rss-feed'></i></div>
                        <div class="menu-title">{{ __('Service') }}</div>
                    </a>
                </li>
                @endrole
				@role('owner')
                <li class="{{ request()->routeIs('admin.products.index') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.products.index') }}">
                        <div class="parent-icon"><i class='lni lni-laptop-phone'></i></div>
                        <div class="menu-title">{{ __('Product') }}</div>
                    </a>
                </li>
                @endrole
				@role('owner')
                <li class="{{ request()->routeIs('admin.clients.index') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.clients.index') }}">
                        <div class="parent-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-smile"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line></svg></div>
                        <div class="menu-title">{{ __('Clients') }}</div>
                    </a>
                </li>
                @endrole
				@role('owner')
                <li class="{{ request()->routeIs('admin.careers.index') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.careers.index') }}">
                        <div class="parent-icon"><i class='lni lni-user'></i></div>
                        <div class="menu-title">{{ __('Career') }}</div>
                    </a>
                </li>
                @endrole
				@role('owner')
                <li class="{{ request()->routeIs('admin.contacts.index') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.contacts.index') }}">
                        <div class="parent-icon"><i class='lni lni-phone'></i></div>
                        <div class="menu-title">{{ __('Contacts') }}</div>
                    </a>
                </li>
                @endrole
				@role('owner')
                <li class="{{ request()->routeIs('admin.messages.index') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.messages.index') }}">
                        <div class="parent-icon"><i class='lni lni-envelope'></i></div>
                        <div class="menu-title">{{ __('Message') }}</div>
                    </a>
                </li>
                @endrole
				@role('owner')
                <li class="{{ request()->routeIs('admin.faqs.index') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.faqs.index') }}">
                        <div class="parent-icon"><i class='bx bx-help-circle'></i></div>
                        <div class="menu-title">{{ __("FAQ's") }}</div>
                    </a>
                </li>
                @endrole
				
				
				@role('owner')
                <li class="{{ request()->routeIs('admin.teams.index') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.teams.index') }}">
                        <div class="parent-icon"><i class='lni lni-users'></i></div>
                        <div class="menu-title">{{ __('Team') }}</div>
                    </a>
                </li>
                @endrole
				
				@role('owner')
                <li class="{{ request()->routeIs('admin.applications.index') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.applications.index') }}">
                        <div class="parent-icon"><i class='bx bx-user-plus'></i></div>
                        <div class="menu-title">{{ __('Application') }}</div>
                    </a>
                </li>
                @endrole
				
				@role('owner')
                <li class="{{ request()->routeIs('admin.companyProfiles.index') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.companyProfiles.index') }}">
                        <div class="parent-icon"><i class='lni lni-write'></i></div>
                        <div class="menu-title">{{ __('Company Profile') }}</div>
                    </a>
                </li>
                @endrole
				@role('owner')
                <li class="{{ request()->routeIs('admin.testimonials.index') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.testimonials.index') }}">
                        <div class="parent-icon"><i class='lni lni-emoji-happy'></i></div>
                        <div class="menu-title">{{ __('Testimonial') }}</div>
                    </a>
                </li>
                @endrole
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center" >
							
							<li class="nav-item dropdown dropdown-large" style="display: none;">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">8</span>
									<i class='lni lni-headphone'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">•</p>
											<p class="msg-header-clear ms-auto">•</p>
										</div>
									</a>
									<div class="header-message-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="../assets/admin/images/avatars/avatar-1.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">• <span class="msg-time float-end">•</span></h6>
													<p class="msg-info">•</p>
												</div>
											</div>
										</a>
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">•</div>
									</a>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large" style="display: none;">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">7</span>
									<i class='bx bx-bell'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">•</p>
											<p class="msg-header-clear ms-auto">•</p>
										</div>
									</a>
									<div class="header-notifications-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-primary text-primary"><i class="bx bx-group"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">•<span class="msg-time float-end">•</span></h6>
													<p class="msg-info">•</p>
												</div>
											</div>
										</a>
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">•</div>
									</a>
								</div>
							</li>
							
						</ul>
					</div>
					<div class="user-box dropdown">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="{{ Storage::url(Auth::user()->avatar) }}" class="user-img" alt="user avatar">
							<div class="user-info ps-3">
								<p class="user-name mb-0">{{ Auth::user()->name }}</p>
								<p class="designattion mb-0">Admin</p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item" href="javascript:;"><i class="bx bx-user"></i><span>Profile</span></a>
							</li>
							
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li>
                                <a class="dropdown-item" href="javascript:;"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class='bx bx-log-out-circle'></i><span>Logout</span>
                                </a>
                            
                                <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                            
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
                {{-- Content Here --}}
                @yield('admin')
            </div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © 2024. All right reserved.</p>
		</footer>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="{{ asset('assets/admin/js/bootstrap.bundle.min.js') }}"></script>
	<!--plugins-->
	<script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/admin/plugins/simplebar/js/simplebar.min.js') }}"></script>
	<script src="{{ asset('assets/admin/plugins/metismenu/js/metisMenu.min.js') }}"></script>
	<script src="{{ asset('assets/admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
	<script src="{{ asset('assets/admin/plugins/select2/js/select2.min.js') }}"></script>
	<script src="{{ asset('assets/admin/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('assets/admin/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
	
	<script>
		$(document).ready(function () {
			var table = $('#dataTable').DataTable({
			});
		});
		
		
	</script>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			setTimeout(function() {
				// Close the alert
				var successAlert = document.getElementById('success-alert');
				if (successAlert) {
					var bsAlert = new bootstrap.Alert(successAlert);
					bsAlert.close();
				}

				var errorAlert = document.getElementById('error-alert');
				if (errorAlert) {
					var bsAlert = new bootstrap.Alert(errorAlert);
					bsAlert.close();
				}
			}, 4000);
		});
	</script>
	<script>
		document.getElementById('add-key-feature').addEventListener('click', function() {
			var container = document.getElementById('key-features-container');
			var input = document.createElement('input');
			input.type = 'text';
			input.name = 'key_features[]';
			input.className = 'form-control mb-2';
			input.placeholder = 'Key Features...';
			container.appendChild(input);
		});
	</script>

	<script>
		document.getElementById('edit-key-feature').addEventListener('click', function() {
			var container = document.getElementById('edit-key-features-container');
			var input = document.createElement('input');
			input.type = 'text';
			input.name = 'key_features[]';
			input.className = 'form-control mb-2';
			input.placeholder = 'Key Features...';
			container.appendChild(input);
		});
	</script>

	<script>
		document.getElementById('add-our-approaches').addEventListener('click', function() {
			var container = document.getElementById('our-approaches-container');
			var input = document.createElement('input');
			input.type = 'text';
			input.name = 'our_approaches[]';
			input.className = 'form-control mb-2';
			input.placeholder = 'Our Approach...';
			container.appendChild(input);
		});
	</script>

	<script>
		document.getElementById('edit-our-approaches').addEventListener('click', function() {
			var container = document.getElementById('edit-our-approaches-container');
			var input = document.createElement('input');
			input.type = 'text';
			input.name = 'our_approaches[]';
			input.className = 'form-control mb-2';
			input.placeholder = 'Our Approach...';
			container.appendChild(input);
		});
	</script>

	<script>
		document.getElementById('add-job-descriptions').addEventListener('click', function() {
			var container = document.getElementById('job-descriptions-container');
			var input = document.createElement('input');
			input.type = 'text';
			input.name = 'job_descriptions[]';
			input.className = 'form-control mb-2';
			input.placeholder = 'Job Description...';
			container.appendChild(input);
		});
	</script>

	<script>
		document.getElementById('edit-job-descriptions').addEventListener('click', function() {
			var container = document.getElementById('edit-job-descriptions-container');
			var input = document.createElement('input');
			input.type = 'text';
			input.name = 'job_descriptions[]';
			input.className = 'form-control mb-2';
			input.placeholder = 'Job Description...';
			container.appendChild(input);
		});
	</script>

	<script>
		document.getElementById('add-requirements').addEventListener('click', function() {
			var container = document.getElementById('requirements-container');
			var input = document.createElement('input');
			input.type = 'text';
			input.name = 'requirements[]';
			input.className = 'form-control mb-2';
			input.placeholder = 'Job Description...';
			container.appendChild(input);
		});
	</script>

	<script>
		document.getElementById('edit-requirements').addEventListener('click', function() {
			var container = document.getElementById('edit-requirements-container');
			var input = document.createElement('input');
			input.type = 'text';
			input.name = 'requirements[]';
			input.className = 'form-control mb-2';
			input.placeholder = 'Requirement...';
			container.appendChild(input);
		});
	</script>
	<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
	<script>
        document.querySelectorAll('.rich-text').forEach((textarea) => {
            ClassicEditor
                .create(textarea)
                .catch(error => {
                    console.error(error);
                });
        });
    </script>


	<!--app JS-->
	<script src="../assets/admin/js/app.js"></script>
</body>

</html>