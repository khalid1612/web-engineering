<?php require_once "php/checkLogin.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <title>Welcome to Diu Project Store</title>

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
                <input class="form-control js-user-search selectized" placeholder="Search here people or pages..." type="text" tabindex="-1" style="display: none;" value="">
                <div class="selectize-control form-control js-user-search multi">
                    <div class="selectize-input items not-full has-options"><input type="text" autocomplete="off" tabindex="" placeholder="Search here people or pages..." style="width: 229.854px;"></div>
                    <div class="selectize-dropdown multi form-control js-user-search" style="display: none; width: 0px; top: 70px; left: 0px;">
                        <div class="selectize-dropdown-content"></div>
                    </div>
                </div>
                <button>
                    <svg class="olymp-magnifying-glass-icon">
                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon"></use>
                    </svg>
                </button>
                <span class="material-input"></span>
            </div>
        </form>

        <a href="index.php" class="link-find-friend">Home</a>
        <a href="#" class="link-find-friend">Newsfeed</a>
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
                                    <a href="profile-timeline.html">

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
                                    <a href="#">
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
                                    <a href="29-YourAccount-AccountSettings.html">

                                        <svg class="olymp-menu-icon">
                                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-add-to-conversation-icon"></use>
                                        </svg>

                                        <span>Start a project</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="36-FavPage-SettingsAndCreatePopup.html">
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

</body>

</html>
