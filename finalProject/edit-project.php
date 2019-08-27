<?php require_once "php/checkLogin.php" ?>
<?php require_once "php/userDetails.php" ?>
<?php require_once "php/editProject.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <title>Edit Project</title>

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

  <div class="header-spacer"></div>


  <!-- project -->
  <div class="container">
    <div class="row">
      <div class="col col-xl-12 order-xl-2 col-lg-6 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
        <div class="ui-block">
          <div class="ui-block-title">
            <h6 class="title">Update your project</h6>
          </div>
          <div class="ui-block-content">



            <!-- Music Playlist Form  -->

              <form method="post">

                  <div class="row">
                      <div class="col col-lg-4 col-md-4 col-sm-12 col-12">
                          <div class="form-group label-floating">
                              <div class="form-group label-floating">
                                  <label class="control-label">Project Name</label>
                                  <input name="name" class="form-control" type="text" value="<?php echo $project['name']; ?>">
                              </div>
                          </div>
                      </div>
                      <div class="col col-lg-4 col-md-4 col-sm-12 col-12">
                          <div class="form-group label-floating">
                              <div class="form-group label-floating">
                                  <label class="control-label">Project Type</label>
                                  <input name="type" class="form-control" type="text" value="<?php echo $project['type']; ?>">
                              </div>
                          </div>
                      </div>
                      <div class="col col-lg-4 col-md-4 col-sm-12 col-12">
                          <fieldset class="form-group label-floating is-select">
                              <label class="control-label">Project Duration</label>
                              <select name="duration" class="selectpicker form-control">
                                  <option value="0"<?php if ($project['duration'] == "0") echo "selected"; ?>>Select one</option>
                                  <option value="Semister" <?php if ($project['duration'] == "Semister") echo "selected"; ?>>Semister</option>
                                  <option value="Final" <?php if ($project['duration'] == "Final") echo "selected"; ?>>Final</option>
                                  <option value="Personal" <?php if ($project['duration'] == "Personal") echo "selected"; ?>>Personal</option>
                              </select>
                          </fieldset>
                      </div>

                      <div class="col col-lg-4 col-md-4 col-sm-12 col-12">
                          <fieldset class="form-group label-floating is-select">
                              <label class="control-label">Project member</label>
                              <select name="member" class="selectpicker form-control">
                                  <option value="0" <?php if ($project['member'] == "0") echo "selected"; ?>>Select one</option>
                                  <option value="Personal" <?php if ($project['member'] == "Personal") echo "selected"; ?>>Personal</option>
                                  <option value="Group" <?php if ($project['member'] == "Group") echo "selected"; ?>>Group</option>
                              </select>
                          </fieldset>
                      </div>


                      <div class="col col-lg-8 col-md-8 col-sm-12 col-12">
                          <fieldset class="form-group label-floating is-select">
                              <label class="control-label">Course Teacher/Supervisor</label>
                              <select name="teacher[]" class="selectpicker form-control show-tick" multiple data-max-options="5" data-live-search="true">

                                  <?php
                                  foreach ($userDetails as $user) {
                                      if ($user['id'] == $_SESSION['id']){
                                          continue;
                                      }
                                      else if ($user['occupation'] == "Teacher") {
                                          $isSelected = "";

                                          if (in_array($user->id(), $project['teacher'], TRUE)){
                                              $isSelected = "selected";
                                          }
                                          echo
                                              '
                                <option '.$isSelected.' title="' . $user['fullName'] . '"data-content=\'<div class="inline-items">
          											<div class="author-thumb">
          												<img src="img/avatar52-sm.jpg" alt="author">
          											</div>
          												<div class="h6 author-title">' . $user['fullName'] . '</div>

          											</div>\'>' . $user->id() . '</option>';
                                      }

                                  }

                                  ?>

                              </select>
                          </fieldset>
                      </div>

                      <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                          <fieldset class="form-group label-floating is-select">
                              <label class="control-label">Group members</label>
                              <select name="groupMember[]" class="selectpicker form-control show-tick" multiple data-max-options="10" data-live-search="true">
                                  <?php
                                  foreach ($userDetails as $user) {
                                      if ($user['id'] == $_SESSION['id']){
                                          continue;
                                      }
                                      else if ($user['occupation'] == "Student") {
                                          $isSelected = "";

                                          if (in_array($user->id(), $project['groupMember'])){
                                              $isSelected = "selected";
                                          }
                                          echo
                                              '
                                <option '.$isSelected.'  title="' . $user['fullName'] . '" data-content=\'<div class="inline-items">
          											<div class="author-thumb">
          												<img src="img/avatar52-sm.jpg" alt="author">
          											</div>
          												<div class="h6 author-title">' . $user['fullName'] . '</div>

          											</div>\'>' . $user->id() . '</option>';
                                      }

                                  }

                                  ?>

                              </select>
                          </fieldset>
                      </div>



                      <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                          <div class="form-group label-floating">
                              <label class="control-label">Write a little description about your project</label>
                              <textarea name="description" class="form-control"><?php  echo $project['description']; ?></textarea>
                          </div>
                      </div>
                  </div>

                  <div class="col col-lg-4 col-md-4 col-sm-12 col-12">
                      <div class="form-group label-floating">
                          <div class="form-group label-floating">
                              <label class="control-label">Progress</label>
                              <input name="progress" class="form-control" placeholder="" type="text" value="<?php echo $project['progress']; ?>">
                          </div>
                      </div>
                  </div>

                  <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                      <div class="form-group label-floating">
                          <label class="control-label">Links(download app, website..)</label>
                          <textarea name="links" class="form-control" placeholder=""><?php echo $project['links']; ?></textarea>
                      </div>
                  </div>


                  <!-- ... end Music Playlist Form  -->

                  <!-- <p class="mt50">You are logged in to Spotify as <a href="#" class="c-green"> James Spiegel Spotify</a></p> -->

                  <div class="row justify-content-center mt50">
                      <!-- <div class="col col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                                      <a href="#" class="btn btn-secondary btn-lg full-width" data-toggle="modal" data-target="#faqs-popup">Link your Playlist FAQs</a>
                                  </div> -->
                      <div class="col col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                          <input type="submit" name="startProject" class="btn btn-green btn-lg full-width btn-icon-left" value="Update Project"/>
                          <!--                    <i class="fab fa-spotify" aria-hidden="true"></i>-->
                          <!--                </input>-->
                      </div>

                  </div>

              </form>




            <!-- ... end Music Playlist Form  -->

            <!-- <p class="mt50">You are logged in to Spotify as <a href="#" class="c-green"> James Spiegel Spotify</a></p> -->

            <!--<div class="row justify-content-center mt50">
              <div class="col col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                <a href="#" class="btn btn-green btn-lg full-width btn-icon-left"><i class="fab fa-spotify" aria-hidden="true"></i>
                  update Project</a>
              </div>
            </div>-->
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
