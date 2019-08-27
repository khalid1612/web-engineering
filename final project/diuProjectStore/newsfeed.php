<?php require_once "php/checkLogin.php" ?>
<?php require_once "php/userDetails.php" ?>
<?php require_once "php/newsfeed.php" ?>
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
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
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
        <a href="newsfeed.php" class="text-success text-uppercase link-find-friend">Newsfeed</a>
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


<div class="container">
    <div class="row">

        <!-- Main Content -->

        <div class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">

            <div class="ui-block">

                <!-- News Feed Form  -->

                <div class="news-feed-form">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active inline-items" data-toggle="tab" href="#home-1" role="tab" aria-expanded="true">

                                <svg class="olymp-status-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-status-icon"></use></svg>

                                <span>Status</span>
                            </a>
                        </li>
                        <!--<li class="nav-item">
                            <a class="nav-link inline-items" data-toggle="tab" href="#profile-1" role="tab" aria-expanded="false">

                                <svg class="olymp-multimedia-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-multimedia-icon"></use></svg>

                                <span>Multimedia</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link inline-items" data-toggle="tab" href="#blog" role="tab" aria-expanded="false">
                                <svg class="olymp-blog-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-blog-icon"></use></svg>

                                <span>Blog Post</span>
                            </a>
                        </li>-->
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="home-1" role="tabpanel" aria-expanded="true">
                            <!--<form>
                            <div class="author-thumb">
                                <img alt="author" src="<?php /*echo getUserImg(getCurrentUserId()); */?>" class="avatar"">
                            </div>-->
                            <div class="form-group with-icon label-floating is-empty">
                                <label class="control-label">Share what you are thinking here...</label>
                                <textarea class="form-control" placeholder="" id="post_field"></textarea>
                            </div>
                            <div class="add-options-message">
                                <!--<a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD PHOTOS">
                                    <svg class="olymp-camera-icon" data-toggle="modal" data-target="#update-header-photo"><use xlink:href="svg-icons/sprites/icons.svg#olymp-camera-icon"></use></svg>
                                </a>
                                <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="TAG YOUR FRIENDS">
                                    <svg class="olymp-computer-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-computer-icon"></use></svg>
                                </a>

                                <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD LOCATION">
                                    <svg class="olymp-small-pin-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-small-pin-icon"></use></svg>
                                </a>


                                <button   class="btn btn-md-2 btn-border-think btn-transparent c-grey">Preview</button>-->
                                <button onclick="insertPost()"  class="btn btn-primary btn-md-2">Post Status</button>

                            </div>

                            <!--</form>-->
                        </div>

                        <!--<div class="tab-pane" id="profile-1" role="tabpanel" aria-expanded="true">
                            <form>
                                <div class="author-thumb">
                                    <img src="img/author-page.jpg" alt="author">
                                </div>
                                <div class="form-group with-icon label-floating is-empty">
                                    <label class="control-label">Share what you are thinking here...</label>
                                    <textarea class="form-control" placeholder=""  ></textarea>
                                </div>
                                <div class="add-options-message">
                                    <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD PHOTOS">
                                        <svg class="olymp-camera-icon" data-toggle="modal" data-target="#update-header-photo"><use xlink:href="svg-icons/sprites/icons.svg#olymp-camera-icon"></use></svg>
                                    </a>
                                    <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="TAG YOUR FRIENDS">
                                        <svg class="olymp-computer-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-computer-icon"></use></svg>
                                    </a>

                                    <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD LOCATION">
                                        <svg class="olymp-small-pin-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-small-pin-icon"></use></svg>
                                    </a>

                                    <button class="btn btn-primary btn-md-2">Post Status</button>
                                    <button   class="btn btn-md-2 btn-border-think btn-transparent c-grey">Preview</button>

                                </div>

                            </form>
                        </div>

                        <div class="tab-pane" id="blog" role="tabpanel" aria-expanded="true">
                            <form>
                                <div class="author-thumb">
                                    <img src="img/author-page.jpg" alt="author">
                                </div>
                                <div class="form-group with-icon label-floating is-empty">
                                    <label class="control-label">Share what you are thinking here...</label>
                                    <textarea class="form-control" placeholder=""  ></textarea>
                                </div>
                                <div class="add-options-message">
                                    <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD PHOTOS">
                                        <svg class="olymp-camera-icon" data-toggle="modal" data-target="#update-header-photo"><use xlink:href="svg-icons/sprites/icons.svg#olymp-camera-icon"></use></svg>
                                    </a>
                                    <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="TAG YOUR FRIENDS">
                                        <svg class="olymp-computer-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-computer-icon"></use></svg>
                                    </a>

                                    <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD LOCATION">
                                        <svg class="olymp-small-pin-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-small-pin-icon"></use></svg>
                                    </a>

                                    <button class="btn btn-primary btn-md-2">Post Status</button>
                                    <button   class="btn btn-md-2 btn-border-think btn-transparent c-grey">Preview</button>

                                </div>

                            </form>
                        </div>-->
                    </div>
                </div>

                <!-- ... end News Feed Form  -->
            </div>

            <div id="newsfeed-items-grid">

                <!--<div class="ui-block">
                    <!-- Post -->

                <!--<article class="hentry post">

                        <div class="post__author author vcard inline-items">
                            <img src="img/author-page.jpg" alt="author">

                            <div class="author-date">
                                <a class="h6 post__author-name fn" href="02-ProfilePage.html">James Spiegel</a>
                                <div class="post__date">
                                    <time class="published" datetime="2017-03-24T18:18">
                                        19 hours ago
                                    </time>
                                </div>
                            </div>

                            <div class="more">
                                <svg class="olymp-three-dots-icon">
                                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                                </svg>
                                <ul class="more-dropdown">
                                    <li>
                                        <a href="#">Edit Post</a>
                                    </li>
                                    <li>
                                        <a href="#">Delete Post</a>
                                    </li>
                                    <li>
                                        <a href="#">Turn Off Notifications</a>
                                    </li>
                                    <li>
                                        <a href="#">Select as Featured</a>
                                    </li>
                                </ul>
                            </div>

                        </div>

                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                            pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                            mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                            accusantium doloremque.
                        </p>

                        <div class="post-additional-info inline-items">

                            <a href="#" class="post-add-icon inline-items">
                                <svg class="olymp-heart-icon">
                                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
                                </svg>
                                <span>8</span>
                            </a>

                            <ul class="friends-harmonic">
                                <li>
                                    <a href="#">
                                        <img src="img/friend-harmonic7.jpg" alt="friend">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="img/friend-harmonic8.jpg" alt="friend">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="img/friend-harmonic9.jpg" alt="friend">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="img/friend-harmonic10.jpg" alt="friend">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="img/friend-harmonic11.jpg" alt="friend">
                                    </a>
                                </li>
                            </ul>

                            <div class="names-people-likes">
                                <a href="#">Jenny</a>, <a href="#">Robert</a> and
                                <br>6 more liked this
                            </div>


                            <div class="comments-shared">
                                <a href="#" class="post-add-icon inline-items">
                                    <svg class="olymp-speech-balloon-icon">
                                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use>
                                    </svg>
                                    <span>17</span>
                                </a>

                                <a href="#" class="post-add-icon inline-items">
                                    <svg class="olymp-share-icon">
                                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-share-icon"></use>
                                    </svg>
                                    <span>24</span>
                                </a>
                            </div>


                        </div>

                        <div class="control-block-button post-control-button">

                            <a href="#" class="btn btn-control featured-post">
                                <svg class="olymp-trophy-icon">
                                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-trophy-icon"></use>
                                </svg>
                            </a>

                            <a href="#" class="btn btn-control">
                                <svg class="olymp-like-post-icon">
                                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-like-post-icon"></use>
                                </svg>
                            </a>

                            <a href="#" class="btn btn-control">
                                <svg class="olymp-comments-post-icon">
                                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>
                                </svg>
                            </a>

                            <a href="#" class="btn btn-control">
                                <svg class="olymp-share-icon">
                                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-share-icon"></use>
                                </svg>
                            </a>

                        </div>

                    </article>-->

                <!-- .. end Post -->
                <!-- </div>-->

                <?php

                foreach ($allPosts as $key => $post){
                    echo'
                        <div class="ui-block">
  					<!-- Post -->

  					<article class="hentry post">

  						<div class="post__author author vcard inline-items">
  							<img src="'.getUserImg($post['userid']).'" alt="author">

  							<div class="author-date">
  								<a class="h6 post__author-name fn" href="profile-timeline.php?pId='.$post['userid'].'">'.getFullName($post['userid']).'</a>
  								<div class="post__date">
  									<time class="published" datetime="2017-03-24T18:18">
                                        '.$post['time'].'
                                    </time>
  								</div>
  							</div>

  						</div>

  						<p>'.$post['post'].'</p>

  						<div class="post-additional-info inline-items">

  							<!--<a href="javascript:void(0)" class="post-add-icon inline-items">
  								<svg class="olymp-heart-icon">
  									<use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
  								</svg>
  								<span>36</span>
  							</a>-->

  							<!--<ul class="friends-harmonic">
  								<li>
  									<a href="#">
  										<img src="img/friend-harmonic7.jpg" alt="friend">
  									</a>
  								</li>
  								<li>
  									<a href="#">
  										<img src="img/friend-harmonic8.jpg" alt="friend">
  									</a>
  								</li>
  								<li>
  									<a href="#">
  										<img src="img/friend-harmonic9.jpg" alt="friend">
  									</a>
  								</li>
  								<li>
  									<a href="#">
  										<img src="img/friend-harmonic10.jpg" alt="friend">
  									</a>
  								</li>
  								<li>
  									<a href="#">
  										<img src="img/friend-harmonic11.jpg" alt="friend">
  									</a>
  								</li>
  							</ul>

  							<div class="names-people-likes">
  								<a href="#">You</a>, <a href="#">Elaine</a> and
  								<br>34 more liked this
                        </div>-->


  							<div class="comments-shared">
  								<a href="javascript:void(0)" class="post-add-icon inline-items" onclick="showComments(post_comment'.$post->id().')">
  									<svg class="olymp-speech-balloon-icon">
  										<use xlink:href="svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use>
  									</svg>
  									<span id="count_post_comment'.$post->id().'"></span>
  								</a>
  							</div>


  						</div>

  						<div class="control-block-button post-control-button">

  							<!--<a href="javascript:void(0)" class="btn btn-control">
  								<svg class="olymp-like-post-icon">
  									<use xlink:href="svg-icons/sprites/icons.svg#olymp-like-post-icon"></use>
  								</svg>
  							</a>-->

  							<a href="javascript:void(0)" class="btn btn-control" onclick="showCommentBox(post_comment_div'.$post->id().')">
  								<svg class="olymp-comments-post-icon">
  									<use xlink:href="svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>
  								</svg>
  							</a>

  						</div>

  					</article>

  					<!-- .. end Post -->
  					<!-- Comments -->

  					<ul class="comments-list" id="post_comment'.$post->id().'" style="display: none">
  						<!--<li class="comment-item">
  							<div class="post__author author vcard inline-items">
  								<img src="img/avatar10-sm.jpg" alt="author">

  								<div class="author-date">
  									<a class="h6 post__author-name fn" href="#">Elaine Dreyfuss</a>
  									<div class="post__date">
  										<time class="published" datetime="2017-03-24T18:18">
                            5 mins ago
                        </time>
  									</div>
  								</div>

  								<a href="#" class="more">
  									<svg class="olymp-three-dots-icon">
  										<use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
  									</svg>
  								</a>

  							</div>

  							<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium der doloremque laudantium.</p>

  							<a href="#" class="post-add-icon inline-items">
  								<svg class="olymp-heart-icon">
  									<use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
  								</svg>
  								<span>8</span>
  							</a>
  							<a href="#" class="reply">Reply</a>
  						</li>-->';


                    //echo "<b>post details:</b> ".$post->id()." => ".$post['post']."</br>";

                    if ($allCommentReply[$key] != false) {
                        $comments = array();
                        $replies = array();


                        foreach ($allCommentReply[$key] as $item) {
                            if ($item['commentOrReply'] == 'comment'){
                                array_push($comments,$item);
                            }else{
                                array_push($replies,$item);
                            }
                        }

                        usort($comments, function ($item1, $item2) {
                            return $item1['time'] <=> $item2['time'];
                        });

                        foreach ($comments as $comment){
                            echo '
                                        <li class="comment-item has-children" id="'.$comment->id().'">
                                            <div class="post__author author vcard inline-items">
                                                <img src="img/avatar5-sm.jpg" alt="author">
                
                                                <div class="author-date">
                                                    <a class="h6 post__author-name fn" href="#">Green Goo Rock</a>
                                                    <div class="post__date">
                                                        <time class="published" datetime="2017-03-24T18:18">
                                                            '.$comment['time'].'
                                                        </time>
                                                    </div>
                                                </div>
                
                                                <div class="more">
                                                    <svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                    
                                                    <ul class="more-dropdown more-with-triangle">
                                                        <li>
                                                            <a href="javascript:void(0)" onclick="setupEditComment(\''.$post->id().'\',\''.$comment->id().'\',\''.$post['userid'].'\')" data-toggle="modal" data-target="#update-comment" >Edit</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0)" onclick="deleteCommentOrReply(\''.$post->id().'\',\''.$comment->id().'\',\''.$post['userid'].'\')">Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                
                                            </div>
                
                                            <p id="c'.$comment->id().'">'.$comment['msg'].'</p>
                
                                            <!--<a href="#" class="post-add-icon inline-items">
                                                <svg class="olymp-heart-icon">
                                                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
                                                </svg>
                                                <span>5</span>
                                            </a>-->
                                            <a href="javascript:void(0)" onclick="showReplyBox(cId'.$comment->id().')" class="reply">Reply</a>
                                                <div class="comment-form inline-items" id="cId'.$comment->id().'" style="display: none">
                    
                                                    <div class="post__author author vcard inline-items">
                                                        <img src="img/author-page.jpg" alt="author">
                                
                                                        <div class="form-group ">
                                                            <textarea id="reply_field'.$comment->id().'" onfocus="setFocusId(\''.$post->id().'\',\''.$post['userid'].'\',\''.$comment->id().'\')" class="form-control" placeholder="Reply Here"></textarea>
                                                        </div>
                                                    </div>
                                
                                                    <button id="reply_button"  class="btn btn-md-2 btn-primary" onclick="insertReply(\''.$post->id().'\',\''.$post['userid'].'\',\''.$comment->id().'\')">Reply</button>
                                
                                                </div>
                                            <ul class="children" id="comment_reply'.$comment->id().'">
                                    ';

                            foreach ($replies as $reply){
                                if ($reply['commentId'] == $comment->id()){
                                    echo '
                                        <li class="comment-item" id="'.$reply->id().'">
                                            <div class="post__author author vcard inline-items">
                                                <img src="img/avatar5-sm.jpg" alt="author">
                
                                                <div class="author-date">
                                                    <a class="h6 post__author-name fn" href="#">Green Goo Rock</a>
                                                    <div class="post__date">
                                                        <time class="published" datetime="2017-03-24T18:18">
                                                            '.$reply['time'].'
                                                        </time>
                                                    </div>
                                                </div>
                
                                                <div class="more">
                                                    <svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                    
                                                    <ul class="more-dropdown more-with-triangle">
                                                        <li>
                                                            <a href="javascript:void(0)" onclick="setupEditComment(\''.$post->id().'\',\''.$reply->id().'\',\''.$post['userid'].'\')" data-toggle="modal" data-target="#update-comment" >Edit</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0)" onclick="deleteCommentOrReply(\''.$post->id().'\',\''.$reply->id().'\',\''.$post['userid'].'\')">Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                
                                            </div>
                
                                            <p id="c'.$reply->id().'">'.$reply['msg'].'</p>
                
                                            <!--<a href="#" class="post-add-icon inline-items">
                                                <svg class="olymp-heart-icon">
                                                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
                                                </svg>
                                                <span>5</span>
                                            </a>-->
                                            <a href="javascript:void(0)" onclick="showReplyBox(rId'.$reply->id().')" class="reply">Reply</a>
                                                <div class="comment-form inline-items" id="rId'.$reply->id().'" style="display: none">
                    
                                                    <div class="post__author author vcard inline-items">
                                                        <img src="img/author-page.jpg" alt="author">
                                
                                                        <div class="form-group ">
                                                            <textarea id="reply_field'.$reply->id().'" onfocus="setFocusId(\''.$post->id().'\',\''.$post['userid'].'\',\''.$reply->id().'\')" class="form-control" placeholder="Reply Here"></textarea>
                                                        </div>
                                                    </div>
                                
                                                    <button id="reply_button"  class="btn btn-md-2 btn-primary" onclick="insertReply(\''.$post->id().'\',\''.$post['userid'].'\',\''.$comment->id().'\')">Reply</button>
                                
                                                </div>
                                            </li>
                                    ';
                                    /*echo '
                                                <li class="comment-item" id="'.$reply->id().'">
                                                    <div class="post__author author vcard inline-items">
                                                        <img src="img/avatar8-sm.jpg" alt="author">
                
                                                        <div class="author-date">
                                                            <a class="h6 post__author-name fn" href="#">Diana Jameson</a>
                                                            <div class="post__date">
                                                                <time class="published" datetime="2017-03-24T18:18">
                                                                    '.$reply['time'].'
                                                                </time>
                                                            </div>
                                                        </div>
                
                                                        <a href="#" class="more">
                                                            <svg class="olymp-three-dots-icon">
                                                                <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                                                            </svg>
                                                        </a>
                
                                                    </div>
                
                                                    <p>'.$reply['msg'].'</p>
                
                                                    <a href="#" class="post-add-icon inline-items">
                                                        <svg class="olymp-heart-icon">
                                                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
                                                        </svg>
                                                        <span>2</span>
                                                    </a>
                                                    <a href="#" class="reply">Reply</a>
                                                </li>
                                            ';*/
                                }
                            }
                            echo '</ul>
                                   </li>';
                        }
                    }
                    //}

                    echo '
  					</ul>

  					<!-- ... end Comments -->
  					

  					<!-- Comment Form  -->

  					<div class="comment-form inline-items" id="post_comment_div'.$post->id().'"style="display: none">

  						<div class="post__author author vcard inline-items" >
  							<img src="img/author-page.jpg" alt="author">

  							<div class="form-group with-icon-right is-empty">
  								<textarea id="post_comment_field'.$post->id().'" onfocus="setFocusId(\''.$post->id().'\',\''.$post['userid'].'\','." ".')" class="form-control" placeholder=""></textarea>
  							<span class="material-input"></span></div>
  						</div>

  						<button class="btn btn-md-2 btn-primary" onclick="insertComment(\''.$post->id().'\',\''.$post['userid'].'\')">Comment</button>

  					</div>

  					<!-- ... end Comment Form  -->
                </div>';
                }
                ?>
            </div>

            <a id="load-more-button" href="#" class="btn btn-control btn-more" data-load-link="items-to-load.html" data-container="newsfeed-items-grid">
                <svg class="olymp-three-dots-icon">
                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                </svg>
            </a>
        </div>

        <!-- ... end Main Content -->


        <!-- Left Sidebar -->

        <div class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-12 col-12">
            <div class="ui-block">
                <div class="chat-field">
                    <div class="ui-block-title">
                        <h6 class="title">Notifications</h6>
                        <!--<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>-->
                    </div>
                    <div class="mCustomScrollbar" data-mcs-theme="dark">
                        <ul class="widget w-friend-pages-added notification-list friend-requests" id="notification">
                            <!--<li class="inline-items">
                                <div class="author-thumb">
                                    <img src="img/avatar41-sm.jpg" alt="author">
                                </div>
                                <div class="notification-event">
                                    <a href="#" class="h6 notification-friend">The Marina Bar</a>
                                    <span class="chat-message-item">Restaurant / Bar</span>
                                </div>
                                <span class="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="ADD TO YOUR FAVS">
                                    <a href="#">
                                        <svg class="olymp-star-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-star-icon"></use></svg>
                                    </a>
                                </span>

                            </li>-->
                        </ul>
                    </div>

                </div>

                <!-- ... end W-Action -->
            </div>



        </div>

        <!-- ... end Left Sidebar -->


        <!-- Right Sidebar -->

        <div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">
            <div class="ui-block">
                <div class="ui-block-title">
                    <h6 class="title">Top Favourite project</h6>
                </div>

                <!-- W-Playlist -->

                <ol class="widget w-playlist">
                    <li class="js-open-popup" data-popup-target=".playlist-popup">
                        <div class="playlist-thumb">
                            <img src="img/playlist6.jpg" alt="thumb-composition">
                            <div class="overlay"></div>
                            <a href="#" class="play-icon">
                                <svg class="olymp-music-play-icon-big">
                                    <use xlink:href="svg-icons/sprites/icons-music.svg#olymp-music-play-icon-big"></use>
                                </svg>
                            </a>
                        </div>

                        <div class="composition">
                            <a href="#" class="composition-name">Diu project store</a>
                            <a href="#" class="composition-author"></a>
                        </div>

                        <div class="composition-time">
                            <time class="published" datetime="2017-03-24T18:18"></time>
                            <div class="more">
                                <svg class="olymp-three-dots-icon">
                                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                                </svg>
                                <ul class="more-dropdown">
                                    <li>
                                        <a href="#">Add Song to Player</a>
                                    </li>
                                    <li>
                                        <a href="#">Add Playlist to Player</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </li>

                    <li class="js-open-popup" data-popup-target=".playlist-popup">
                        <div class="playlist-thumb">
                            <img src="img/playlist7.jpg" alt="thumb-composition">
                            <div class="overlay"></div>
                            <a href="#" class="play-icon">
                                <svg class="olymp-music-play-icon-big">
                                    <use xlink:href="svg-icons/sprites/icons-music.svg#olymp-music-play-icon-big"></use>
                                </svg>
                            </a>
                        </div>

                        <div class="composition">
                            <a href="#" class="composition-name">Multiplayer quiz</a>
                            <a href="#" class="composition-author"></a>
                        </div>

                        <div class="composition-time">
                            <time class="published" datetime="2017-03-24T18:18"></time>
                            <div class="more">
                                <svg class="olymp-three-dots-icon">
                                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                                </svg>
                                <ul class="more-dropdown">
                                    <li>
                                        <a href="#">Add Song to Player</a>
                                    </li>
                                    <li>
                                        <a href="#">Add Playlist to Player</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </li>
                </ol>

                <!-- .. end W-Playlist -->
            </div>

        </div>

        <!-- ... end Right Sidebar -->

        <!-- Window-popup Blog Post Popup -->

        <div class="modal fade" id="blog-post-popup" tabindex="-1" role="dialog" aria-labelledby="blog-post-popup" aria-hidden="true">

            <div class="modal-dialog window-popup blog-post-popup" role="document">

                <div class="modal-content">

                    <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                        <svg class="olymp-close-icon">
                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                        </svg>
                    </a>

                    <div class="modal-body">
                        <article class="hentry post has-post-thumbnail thumb-full-width">

                            <div class="post__author author vcard inline-items">
                                <img src="img/author-page.jpg" alt="author">

                                <div class="author-date">
                                    <a class="h6 post__author-name fn" href="02-ProfilePage.html" id="popup_post_name">James Spiegel</a>
                                    <!--wrote a <a href="#">blog post</a>-->
                                    <div class="post__date">
                                        <time class="published" datetime="2017-03-24T18:18" id="popup_post_time">
                                            12 hours ago
                                        </time>
                                    </div>
                                </div>

                            </div>


                            <p id="popup_post_msg">Lorem ipsum dolor sit amet, consectadipisicing elit, sed do eiusmod por incidid ut labore et
                                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud lorem exercitation ullamco laboris
                                nisi ut aliquip ex ea commodo consequat.
                            </p>



                            <div class="post-additional-info inline-items">

                                <!--<a href="#" class="post-add-icon inline-items">
                                    <svg class="olymp-heart-icon">
                                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
                                    </svg>
                                    <span>8</span>
                                </a>-->

                                <!--<ul class="friends-harmonic">
                                    <li>
                                        <a href="#">
                                            <img src="img/friend-harmonic1.jpg" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="img/friend-harmonic9.jpg" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="img/friend-harmonic7.jpg" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="img/friend-harmonic4.jpg" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="img/friend-harmonic8.jpg" alt="friend">
                                        </a>
                                    </li>
                                </ul>

                                <div class="names-people-likes">
                                    <a href="#">Diana </a>, <a href="#">Nicholas</a> and
                                    <br>15 more liked this
                                </div>-->


                                <div class="comments-shared">
                                    <a href="#" class="post-add-icon inline-items">
                                        <svg class="olymp-speech-balloon-icon">
                                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use>
                                        </svg>
                                        <span></span>
                                    </a>

                                    <!--<a href="#" class="post-add-icon inline-items">
                                        <svg class="olymp-share-icon">
                                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-share-icon"></use>
                                        </svg>
                                        <span>8</span>
                                    </a>-->
                                </div>


                            </div>

                        </article>

                        <div class="mCustomScrollbar" data-mcs-theme="dark">

                            <ul class="comments-list" id="popup_post_comment">
                                <!--<li class="comment-item">
                                    <div class="post__author author vcard inline-items">
                                        <img src="img/avatar10-sm.jpg" alt="author">

                                        <div class="author-date">
                                            <a class="h6 post__author-name fn" href="#">Elaine Dreyfuss</a>
                                            <div class="post__date">
                                                <time class="published" datetime="2017-03-24T18:18">
                                                    5 mins ago
                                                </time>
                                            </div>
                                        </div>

                                        <a href="#" class="more">
                                            <svg class="olymp-three-dots-icon">
                                                <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                                            </svg>
                                        </a>

                                    </div>

                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium der doloremque laudantium.</p>

                                    <a href="#" class="post-add-icon inline-items">
                                        <svg class="olymp-heart-icon">
                                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
                                        </svg>
                                        <span>8</span>
                                    </a>
                                    <a href="#" class="reply">Reply</a>
                                </li>-->
                            </ul>

                        </div>

                        <form class="comment-form inline-items">

                            <div class="post__author author vcard inline-items">
                                <img src="img/author-page.jpg" alt="author">

                                <div class="form-group with-icon-right ">
                                    <textarea id="popup_post_comment_field" class="form-control" placeholder=""></textarea>
                                </div>
                            </div>

                            <button id="popup_post_comment_button" class="btn btn-md-2 btn-primary">Comment</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- ... end Window-popup Blog Post Popup -->

        <!-- Window-popup Update comment -->

        <div class="modal fade" id="update-comment" tabindex="-1" role="dialog" aria-labelledby="update-header-photo" aria-hidden="true">
            <div class="modal-dialog window-popup update-header-photo" role="document">
                <div class="modal-content">
                    <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                        <svg class="olymp-close-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                    </a>

                    <div class="modal-header">
                        <h6 class="title">Update Comment</h6>
                    </div>

                    <div class="modal-body">
                        <div class="comment-form inline-items" id="helo">

                            <div class="post__author author vcard inline-items">
                                <img src="img/author-page.jpg" alt="author">

                                <div class="form-group ">
                                    <textarea id="edit_comment_field" class="form-control" placeholder="Write your comment"></textarea>
                                </div>
                            </div>

                            <button id="update_comment_button" class="btn btn-md-2 btn-primary" onclick="updateComment()">Update</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- ... end Window-popup Update comment -->

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
<script src="js/sticky-sidebar.js"></script>

<script src="js/base-init.js"></script>
<script defer src="fonts/fontawesome-all.js"></script>

<script src="Bootstrap/dist/js/bootstrap.bundle.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script src="https://www.gstatic.com/firebasejs/6.3.5/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/6.3.5/firebase-firestore.js"></script>

<script type="text/javascript">
    const userId = "<?php echo $_SESSION['id']; ?>";
</script>

<script src="js/firestore.js"></script>
<script src="js/custom.js"></script>
<script src="js/newsfeed.js"></script>



</body>

</html>
