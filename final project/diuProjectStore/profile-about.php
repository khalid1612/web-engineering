<?php require_once "php/checkLogin.php" ?>
<?php require_once "php/userDetails.php" ?>
<?php require_once "php/profileAbout.php" ?>
<?php require_once "php/interest.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <title>Timeline</title>

  <!-- Required meta tags always come first -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <!-- Main Font -->
  <script src="js/webfontloader.min.js"></script>
  <script>
    WebFont.load({
      google: {
        families: ['Roboto:300,400,500,700:latin']
      }
    });
  </script>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap-reboot.css">
  <link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap-grid.css">

  <!-- Main Styles CSS -->
    <link rel="stylesheet" type="text/css" href="css/custom.css">
  <link rel="stylesheet" type="text/css" href="css/main.min.css">
  <link rel="stylesheet" type="text/css" href="css/fonts.min.css">


</head>

<body>

<!-- Header-BP -->
<header class="header fixed-top" id="site-header">

    <a href="index.php" class="page-title">
        <h6>Diu Project Store</h6>
    </a>



    <div class="header-content-wrapper">
        <form class="search-bar w-search notification-list friend-requests invisible">
            <div class="form-group with-button is-empty">
                <input class="form-control js-user-search selectized" placeholder="Search here people or pages..." type="text" tabindex="-1" style="display: none;" value=""><div class="selectize-control form-control js-user-search multi"><div class="selectize-input items not-full has-options"><input type="text" autocomplete="off" tabindex="" placeholder="Search here people or pages..." style="width: 229.854px;"></div><div class="selectize-dropdown multi form-control js-user-search" style="display: none; width: 0px; top: 70px; left: 0px;"><div class="selectize-dropdown-content"></div></div></div>
                <button>
                    <svg class="olymp-magnifying-glass-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon"></use></svg>
                </button>
                <span class="material-input"></span></div>
        </form>

        <a href="index.php" class="link-find-friend">Home</a>
        <a href="newsfeed.php" class="link-find-friend">Newsfeed</a>
        <a href="projects.php" class="link-find-friend">Projects</a>

        <div class="control-block">
            <div class="author-page author vcard inline-items more">
                <div class="author-thumb">
                    <img alt="author" src="<?php echo getUserImg(getCurrentUserId()); ?>" class="avatar"">
                    <div class="more-dropdown more-with-triangle">
                        <div class="mCustomScrollbar ps ps--theme_default ps--active-y" data-mcs-theme="dark" data-ps-id="73f8849c-78c0-eee7-ee7e-ba4432b2bbcc">
                            <div class="ui-block-title ui-block-title-small">
                                <h6 class="title">Your Account</h6>
                            </div>

                            <ul class="account-settings">
                                <li>
                                    <a href="profile-timeline.php">

                                        <svg class="olymp-menu-icon">
                                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-menu-icon"></use>
                                        </svg>

                                        <span>View Your Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="settings-personal-info.php">
                                        <svg class="olymp-star-icon left-menu-icon" data-toggle="tooltip" data-placement="right" data-original-title="FAV PAGE">
                                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-star-icon"></use>
                                        </svg>

                                        <span>Profile Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="php/logout.php">
                                        <svg class="olymp-logout-icon">
                                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-logout-icon"></use>
                                        </svg>

                                        <span>Log Out</span>
                                    </a>
                                </li>
                            </ul>

                            <div class="ui-block-title ui-block-title-small">
                                <h6 class="title">Projects</h6>
                            </div>

                            <ul class="account-settings">
                                <li>
                                    <a href="start-project.php">

                                        <svg class="olymp-menu-icon">
                                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-add-to-conversation-icon"></use>
                                        </svg>

                                        <span>Start a project</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="project-list.php">
                                        <svg class="olymp-star-icon left-menu-icon" data-toggle="tooltip" data-placement="right" data-original-title="FAV PAGE">
                                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-star-icon"></use>
                                        </svg>

                                        <span>Your projects</span>
                                    </a>
                                </li>
                            </ul>

                        </div>

                    </div>
                </div>
                <a href="javascript:void(0)" class="author-name fn">
                    <div class="author-title">
                        <?php echo getFullName(getCurrentUserId()); ?>
                        <svg class="olymp-dropdown-arrow-icon">
                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                        </svg>
                    </div>
                    <span class="author-subtitle text-uppercase"><?php echo getNickName(getCurrentUserId()); ?></span>
                </a>
            </div>
        </div>
    </div>
</header>
<!-- ... end Header-BP -->

<div class="header-spacer"></div>

<!-- Top Header-Profile -->
<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="ui-block">
				<div class="top-header">
					<div class="top-header-thumb">
						<img src="img/top-header1.jpg" alt="nature">
					</div>
					<div class="profile-section">
						<div class="row">
							<div class="col col-lg-5 col-md-5 col-sm-12 col-12">
								<ul class="profile-menu">
                                    <li class="invisible">
										<a href="06-ProfilePage.html" class="invisible">Friends</a>
									</li>
									<li>
										<a href="profile-about.php" class="invisible">About</a>
									</li>
                                    <li>
                                        <a href="profile-timeline.php" class="active">Timeline</a>
                                    </li>
								</ul>
							</div>
							<div class="col col-lg-5 ml-auto col-md-5 col-sm-12 col-12">
								<ul class="profile-menu">
                                    <li>
                                        <a href="profile-about.php" class="active">About</a>
                                    </li>
									<li>
										<a href="09-ProfilePage-Videos.html" class="invisible">Videos</a>
									</li>
									<li>
										<div class="more invisible">
											<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
											<ul class="more-dropdown more-with-triangle">
												<li>
													<a href="#">Report Profile</a>
												</li>
												<li>
													<a href="#">Block Profile</a>
												</li>
											</ul>
										</div>
									</li>
								</ul>
							</div>
						</div>

						<div class="control-block-button">
							<a href="35-YourAccount-FriendsRequests.html" class="btn btn-control bg-blue invisible">
								<svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
							</a>

							<a href="#" class="btn btn-control bg-purple">
								<svg class="olymp-chat---messages-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
							</a>

							<div class="btn btn-control bg-primary more">
								<svg class="olymp-settings-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-settings-icon"></use></svg>

								<ul class="more-dropdown more-with-triangle triangle-bottom-right">
									<li>
										<a href="#" data-toggle="modal" data-target="#update-header-photo">Update Profile Photo</a>
									</li>
									<li>
										<a href="#" data-toggle="modal" data-target="#update-header-photo">Update Header Photo</a>
									</li>
									<li>
										<a href="29-YourAccount-AccountSettings.html">Account Settings</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="top-header-author">
						<a href="02-ProfilePage.html" class="author-thumb">
							<img src="<?php echo $userDetails['profilePic']; ?>" alt="author">
						</a>
						<div class="author-content">
							<span class="h4 author-name"><?php echo $userDetails['fullName']; ?></span>
							<div class="country"><?php echo $userDetails['nickName']; ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- ... end Top Header-Profile -->


<div class="container">
	<div class="row">
		<div class="col col-xl-8 order-xl-2 col-lg-8 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Hobbies and Interests</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>
				<div class="ui-block-content">
					<div class="row">
						<div class="col col-lg-6 col-md-6 col-sm-12 col-12">


							<!-- W-Personal-Info -->

							<ul class="widget w-personal-info item-block">
								<li>
									<span class="title">Hobbies:</span>
									<span class="text"><?php echo $userInterest['hobbies']; ?></span>
								</li>
								<li>
									<span class="title">Favourite TV Shows:</span>
									<span class="text"><?php echo $userInterest['shows']; ?></span>
								</li>
								<li>
									<span class="title">Favourite Movies:</span>
									<span class="text"><?php echo $userInterest['movies']; ?></span>
								</li>
								<li>
									<span class="title">Favourite Games:</span>
									<span class="text"><?php echo $userInterest['games']; ?></span>
								</li>
							</ul>

							<!-- ... end W-Personal-Info -->
						</div>
						<div class="col col-lg-6 col-md-6 col-sm-12 col-12">


							<!-- W-Personal-Info -->

							<ul class="widget w-personal-info item-block">
								<li>
									<span class="title">Favourite Music Bands / Artists:</span>
									<span class="text"><?php echo $userInterest['music']; ?></span>
								</li>
								<li>
									<span class="title">Favourite Books:</span>
									<span class="text"><?php echo $userInterest['books']; ?></span>
								</li>
								<li>
									<span class="title">Favourite Writers:</span>
									<span class="text"><?php echo $userInterest['writers']; ?></span>
								</li>
								<li>
									<span class="title">Other Interests:</span>
									<span class="text"><?php echo $userInterest['other']; ?></span>
								</li>
							</ul>

							<!-- ... end W-Personal-Info -->
						</div>
					</div>
				</div>
			</div>
			
		</div>

		<div class="col col-xl-4 order-xl-1 col-lg-4 order-lg-1 col-md-12 order-md-2 col-sm-12 col-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Personal Info</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>
				<div class="ui-block-content">


					<!-- W-Personal-Info -->

					<ul class="widget w-personal-info">
						<li>
							<span class="title">About Me:</span>
							<span class="text"><?php echo $userDetails['des']; ?></span>
						</li>
						<li>
							<span class="title">Birthday:</span>
							<span class="text"><?php echo $userDetails['birthday']; ?></span>
						</li>
						<li>
							<span class="title">Occupation:</span>
							<span class="text"><?php echo $userDetails['linkLinkedin']; ?></span>
						</li>
						<li>
							<span class="title">Email:</span>
							<span class="text"><?php echo $userDetails['email']; ?></span>
						</li>
						<li>
							<span class="title">Website:</span>
                            <span class="text"><?php echo $userDetails['website']; ?></span>
						</li>
						<li>
							<span class="title">Phone:</span>
							<span class="text"><?php echo $userDetails['phone']; ?></span>
						</li>
					</ul>

					<!-- ... end W-Personal-Info -->
					<!-- W-Socials -->

					<div class="widget w-socials">
						<h6 class="title">Other Social Networks:</h6>
						<a href="<?php echo $userDetails['linkFb']; ?>" target="_blank" class="social-item bg-facebook">
							<i class="fab fa-facebook-f" aria-hidden="true"></i>
							Facebook
						</a>
						<a href="<?php echo $userDetails['linkTwitter']; ?>" target="_blank" class="social-item bg-twitter">
                            <i class="fab fa-facebook-f" aria-hidden="true"></i>
							Twitter
						</a>
						<a href="<?php echo $userDetails['linkGithub']; ?>" target="_blank" class="social-item bg-dribbble">
                            <i class="fab fa-facebook-f" aria-hidden="true"></i>
							Github
						</a>
                        <a href="<?php echo $userDetails['linkStack']; ?>" target="_blank" class="social-item bg-facebook">
                            <i class="fab fa-facebook-f" aria-hidden="true"></i>
                            Stack
                        </a>
                        <a href="<?php echo $userDetails['linkLinkedin']; ?>" target="_blank" class="social-item bg-twitter">
                            <i class="fab fa-facebook-f" aria-hidden="true"></i>
                            LinkedIN
                        </a>
                        <a href="<?php echo $userDetails['linkInstagram']; ?>" target="_blank" class="social-item bg-dribbble">
                            <i class="fab fa-facebook-f" aria-hidden="true"></i>
                            Instagram
                        </a>
					</div>


					<!-- ... end W-Socials -->
				</div>
			</div>
		</div>
	</div>
</div>




<!-- JS Scripts -->
<script src="js/jquery-3.2.1.js"></script>
<script src="js/jquery.appear.js"></script>
<script src="js/jquery.mousewheel.js"></script>
<script src="js/perfect-scrollbar.js"></script>
<script src="js/jquery.matchHeight.js"></script>
<script src="js/svgxuse.js"></script>
<script src="js/imagesloaded.pkgd.js"></script>
<script src="js/Headroom.js"></script>
<script src="js/velocity.js"></script>
<script src="js/ScrollMagic.js"></script>
<script src="js/jquery.waypoints.js"></script>
<script src="js/jquery.countTo.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/material.min.js"></script>
<script src="js/bootstrap-select.js"></script>
<script src="js/smooth-scroll.js"></script>
<script src="js/selectize.js"></script>
<script src="js/swiper.jquery.js"></script>
<script src="js/moment.js"></script>
<script src="js/daterangepicker.js"></script>
<script src="js/simplecalendar.js"></script>
<script src="js/fullcalendar.js"></script>
<script src="js/isotope.pkgd.js"></script>
<script src="js/ajax-pagination.js"></script>
<script src="js/Chart.js"></script>
<script src="js/chartjs-plugin-deferred.js"></script>
<script src="js/circle-progress.js"></script>
<script src="js/loader.js"></script>
<script src="js/run-chart.js"></script>
<script src="js/jquery.magnific-popup.js"></script>
<script src="js/jquery.gifplayer.js"></script>
<script src="js/mediaelement-and-player.js"></script>
<script src="js/mediaelement-playlist-plugin.min.js"></script>

<script src="js/base-init.js"></script>
<script defer src="fonts/fontawesome-all.js"></script>

<script src="Bootstrap/dist/js/bootstrap.bundle.js"></script>


</body>
</html>
