<?php require_once "php/checkLogin.php" ?>
<?php require_once "php/userDetails.php" ?>
<?php require_once "php/index.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <title>Project List</title>

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
  <link rel="stylesheet" type="text/css" href="css/main.min.css">
  <link rel="stylesheet" type="text/css" href="css/custom.css">
  <link rel="stylesheet" type="text/css" href="css/fonts.min.css">


</head>

<body>


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

    <a href="index.php" class="text-success text-uppercase link-find-friend">Home</a>
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


  <div style="margin-top: 4.3rem"></div>

  <!-- Stunning header -->

  <div class="stunning-header ">

          <div class="content-bg-wrap bg-birthday"></div>
          <div class="container">
              <div class="row">
                  <div class="col col-lg-12 m-auto col-md-12 col-sm-12 col-12">
                      <div class="main-header-content mt-5">
                          <h1 class="display-1 mt-5">DIU Project Store</h1>
                          <p>A platform for share project</p>
                      </div>
                  </div>
              </div>
          </div>
  </div>

  <section class="pt120">
      <div class="container">
          <div class="row mb30">
              <div class="col col-xl-5 col-lg-5 m-auto col-md-12 col-sm-12 col-12">
                  <div class="crumina-module crumina-heading align-center">
                      <div class="heading-sup-title">SOCIAL NETWORK</div>
                      <h2 class="heading-title">Why Choose DIU Project Store?</h2>
                      <p class="heading-text"></p>
                  </div>
              </div>
          </div>

          <div class="info-box-wrap">
              <div class="row">
                  <div class="col col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">


                      <!-- Info Box  -->

                      <div class="crumina-module crumina-info-box" data-mh="box--classic">
                          <div class="info-box-image">
                              <img src="img/info2.png" alt="icon">
                          </div>
                          <div class="info-box-content">
                              <h3 class="info-box-title">Beautifully Coded</h3>
                              <p class="info-box-text"></p>
                          </div>
                      </div>

                      <!-- ... end Info Box  -->

                  </div>
                  <div class="col col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">


                      <!-- Info Box  -->

                      <div class="crumina-module crumina-info-box" data-mh="box--classic">
                          <div class="info-box-image">
                              <img src="img/info3.png" alt="icon">
                          </div>
                          <div class="info-box-content">
                              <h3 class="info-box-title">Friendly Support</h3>
                              <p class="info-box-text"></p>
                          </div>
                      </div>

                      <!-- ... end Info Box  -->

                  </div>
                  <div class="col col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">


                      <!-- Info Box  -->

                      <div class="crumina-module crumina-info-box" data-mh="box--classic">
                          <div class="info-box-image">
                              <img src="img/info4.png" alt="icon">
                          </div>
                          <div class="info-box-content">
                              <h3 class="info-box-title">The Best Interface</h3>
                              <p class="info-box-text"></p>
                          </div>
                      </div>

                      <!-- ... end Info Box  -->

                  </div>
              </div>
          </div>

      </div>
  </section>

  <section class="medium-padding180 counters body-bg-white">
      <div class="container">
          <div class="row">


              <!-- Counter Item -->

              <div class="crumina-module crumina-counter-item col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                  <div class="counter-numbers counter h2">
                      <span data-speed="2000" data-refresh-interval="3" data-to="1500" data-from="2">3</span>
                      <div class="units"><div>+</div></div>
                  </div>
                  <div class="counter-title">Members</div>
              </div>

              <!-- ... end Counter Item -->


              <!-- Counter Item -->

              <div class="crumina-module crumina-counter-item col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                  <div class="counter-numbers counter h2">
                      <span data-speed="2000" data-refresh-interval="3" data-to="860" data-from="2">5</span>
                      <div class="units"><div></div></div>
                  </div>
                  <div class="counter-title">Projects</div>
              </div>

              <!-- ... end Counter Item -->


              <!-- Counter Item -->

              <div class="crumina-module crumina-counter-item col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                  <div class="counter-numbers counter h2">
                      <span data-speed="2000" data-refresh-interval="3" data-to="7401" data-from="2">10</span>
                      <div class="units"><div>+</div></div>
                  </div>
                  <div class="counter-title">Post</div>
              </div>

              <!-- ... end Counter Item -->


              <!-- Counter Item -->

              <div class="crumina-module crumina-counter-item col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                  <div class="counter-numbers counter h2">
                      <span data-speed="2000" data-refresh-interval="3" data-to="294" data-from="2">20</span>
                      <div class="units"><div>+</div></div>
                  </div>
                  <div class="counter-title">Comments</div>
              </div>

              <!-- ... end Counter Item -->

          </div>
      </div>
  </section>

  <div class="header-spacer"></div>

  <div class="container">
      <div class="row">
          <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

              <div class="ui-block responsive-flex">
                  <div class="ui-block-title">
                      <div class="h6 title">Summer 2019 Top Favorite Project</div>
                  </div>
              </div>


              <!-- Tab panes -->
              <div class="tab-content">

                  <div class="tab-pane active" id="album-page" role="tabpanel">

                      <div class="photo-album-wrapper">

                          <div class="photo-album-item-wrap col-4-width">


                              <div class="photo-album-item" data-mh="album-item">
                                  <div class="photo-item">
                                      <img src="img/photo-album4.jpg" alt="photo">
                                      <div class="overlay overlay-dark"></div>
                                      <!--<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
                                      <a href="#" class="post-add-icon">
                                          <svg class="olymp-heart-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
                                          <span>324</span>
                                      </a>

                                      <a href="#" data-toggle="modal" data-target="#open-photo-popup-v1" class="  full-block"></a>-->
                                  </div>

                                  <div class="content">
                                      <a href="#" class="title h5">Diu Project store</a>
                                      <span class="sub-title"></span>

                                      <div class="swiper-container" data-slide="fade">
                                          <div class="swiper-wrapper">
                                              <div class="swiper-slide">

                                              </div>

                                              <div class="swiper-slide">
                                                  <div class="friend-count" data-swiper-parallax="-500">
                                                      <a href="#" class="friend-count-item">
                                                          <div class="h6">24</div>
                                                          <div class="title">Photos</div>
                                                      </a>
                                                      <a href="#" class="friend-count-item">
                                                          <div class="h6">86</div>
                                                          <div class="title">Comments</div>
                                                      </a>
                                                      <a href="#" class="friend-count-item">
                                                          <div class="h6">16</div>
                                                          <div class="title">Share</div>
                                                      </a>
                                                  </div>
                                              </div>
                                          </div>

                                          <!-- If we need pagination -->
                                          <div class="swiper-pagination"></div>
                                      </div>
                                  </div>

                              </div>
                          </div>

                          <div class="photo-album-item-wrap col-4-width">


                              <div class="photo-album-item" data-mh="album-item">
                                  <div class="photo-item">
                                      <img src="img/photo-item6.jpg" alt="photo">
                                      <div class="overlay overlay-dark"></div>
                                      <!--<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
                                      <a href="#" class="post-add-icon">
                                          <svg class="olymp-heart-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
                                          <span>324</span>
                                      </a>

                                      <a href="#" data-toggle="modal" data-target="#open-photo-popup-v1" class="  full-block"></a>-->
                                  </div>

                                  <div class="content">
                                      <a href="#" class="title h5">Multiplayer Quiz</a>
                                      <span class="sub-title"></span>

                                      <div class="swiper-container" data-slide="fade">
                                          <div class="swiper-wrapper">
                                              <div class="swiper-slide">
                                                  <!--<ul class="friends-harmonic">
                                                      <li>
                                                          <a href="#">
                                                              <img src="img/friend-harmonic10.jpg" alt="friend">
                                                          </a>
                                                      </li>
                                                  </ul>-->
                                              </div>

                                              <div class="swiper-slide">
                                                  <div class="friend-count" data-swiper-parallax="-500">
                                                      <a href="#" class="friend-count-item">
                                                          <div class="h6">24</div>
                                                          <div class="title">Photos</div>
                                                      </a>
                                                      <a href="#" class="friend-count-item">
                                                          <div class="h6">86</div>
                                                          <div class="title">Comments</div>
                                                      </a>
                                                      <a href="#" class="friend-count-item">
                                                          <div class="h6">16</div>
                                                          <div class="title">Share</div>
                                                      </a>
                                                  </div>
                                              </div>
                                          </div>

                                          <!-- If we need pagination -->
                                          <div class="swiper-pagination"></div>
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
</body>

</html>
