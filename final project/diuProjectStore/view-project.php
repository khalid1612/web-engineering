<?php require_once "php/checkLogin.php" ?>
<?php require_once "php/userDetails.php" ?>
<?php require_once "php/viewProject.php" ?>
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

<div class="header-spacer"></div>


  <div class="container">
  	<div class="row">
  		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
  			<div class="ui-block">
  				<div class="top-header top-header-favorit">
  					<div class="top-header-thumb">
  						<img src="img/top-header2.jpg" alt="nature">
  						<div class="top-header-author">
  							<div class="author-thumb">
  								<img src="img/author-main2.jpg" alt="author">
  							</div>
  							<div class="author-content">
                                <div id="project_name" class="h3 author-name"><?php echo $projectDetails['name']; ?></div>
  								<div class="country"><?php echo $projectDetails['type']; ?></div>
  							</div>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
  </div>

  <div class="container mt50">
  	<div class="row">
  		<div class="col col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
  			<div class="ui-block">
  				<div class="ui-block-content">
  					<div class="monthly-indicator">
  						<div class="monthly-count">
  							Supervisor/advisor

                <ul class="friends-harmonic mt-3">
                    <?php
                    if ($projectDetails['teacher']){
                        foreach ($projectDetails['teacher'] as $teacher){
                            echo '
                                <li>
                                  <a href="profile-timeline.html?'.$teacher.'">
                                    <img src="img/friend-harmonic5.jpg" alt="friend">
                                  </a>
                                </li>
                                ';
                        }
                    }
                    else{
                        echo "<span class='text-muted'>no supervisor</span>";
                    }
                    ?>
                </ul>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>

      <div class="col col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
  			<div class="ui-block">
  				<div class="ui-block-content">
  					<div class="monthly-indicator">
  						<div class="monthly-count">
  							Group members

                <ul class="friends-harmonic  mt-3">
                    <?php
                        foreach ($projectDetails['groupMember'] as $groupMember){
                            echo '
                                <li>
                                  <a href="profile-timeline.html?Id='.$groupMember.'" target="_blank">
                                    <img src="'.getUserImg($groupMember).'" class="img28" alt="'.getNickName($groupMember).'">
                                  </a>
                                </li>
                                ';
                        }
                    ?>
                </ul>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
      <div class="col col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
  			<div class="ui-block">
  				<div class="ui-block-content">
  					<div class="monthly-indicator">
  						<div class="monthly-count">
  							Progress
                            <ul class="friends-harmonic mt-3">
                                <li>
                                    <?php echo "<span class='text-success'>".$projectDetails['progress']."</span>"; ?>
                                </li>
                            </ul>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
  </div>

  <div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="ui-block">

				<div class="ui-block-title ui-block-title-small">
					<h6 class="title">Details about this project</h6>
				</div>

        <h2 class="p-3">Project estimate end at:  <?php echo "<span class='text-primary'>".$projectDetails['finish']."</span>"; ?></h2>

        <h4 class="p-3"> <?php echo $projectDetails['description']; ?></h4>

        <h5 class="p-3"><?php echo $projectDetails['links']; ?></h5>


			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">

		<!-- Main Content Post Versions -->

		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="ui-block">

        <div class="ui-block-title ui-block-title-small">
					<h6 class="title">comments</h6>
				</div>

				<!-- Post -->
				<article class="hentry post">

						<div class="post-additional-info inline-items">

							<!--<a href="#" class="post-add-icon inline-items">
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
							</div>-->


							<div class="comments-shared">
								<a href="#comment_div" class="post-add-icon inline-items">
									<svg class="olymp-speech-balloon-icon">
										<use xlink:href="svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use>
									</svg>
									<span>
                                    </span>
								</a>

							<!--	<a href="#" class="post-add-icon inline-items">
									<svg class="olymp-share-icon">
										<use xlink:href="svg-icons/sprites/icons.svg#olymp-share-icon"></use>
									</svg>
									<span>24</span>
								</a>-->
							</div>


						</div>

					</article>

				<!-- .. end Post -->

				<!-- Comments -->

				<ul class="comments-list" id="comment_list">

                    <?php
                    $key = 0;
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
                                                <img src="'.getUserImg($comment['userId']).'" class="img36" alt="'.getNickName($comment['userId']).'">
                
                                                <div class="author-date">
                                                    <a class="h6 post__author-name fn" href="profile-timeline.php?id='.$comment['userId'].'" target="_blank">'.getFullName($comment['userId']).'</a>
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
                                                            <a href="javascript:void(0)" onclick="setupEditComment(\''.$projectId.'\',\''.$comment->id().'\',\''.$projectDetails['name'].'\')" data-toggle="modal" data-target="#update-comment" >Edit</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0)" onclick="deleteCommentOrReply(\''.$projectId.'\',\''.$comment->id().'\',\''.$projectDetails['name'].'\')">Delete</a>
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
                                                            <textarea id="reply_field'.$comment->id().'" onfocus="setFocusId(\''.$projectId.'\',\''.$projectDetails['name'].'\',\''.$comment->id().'\')" class="form-control" placeholder="Reply Here"></textarea>
                                                        </div>
                                                    </div>
                                
                                                    <button id="reply_button"  class="btn btn-md-2 btn-primary" onclick="insertProjectReply(\''.$comment->id().'\')">Reply</button>
                                
                                                </div>
                                            <ul class="children" id="comment_reply'.$comment->id().'">
                                    ';

                            foreach ($replies as $reply){
                                if ($reply['commentId'] == $comment->id()){
                                    echo '
                                        <li class="comment-item" id="'.$reply->id().'">
                                            <div class="post__author author vcard inline-items">
                                                <img src="'.getUserImg($reply['userId']).'" class="img36" alt="'.getNickName($reply['userId']).'">
                
                                                <div class="author-date">
                                                    <a class="h6 post__author-name fn" href="profile-timeline.php?id='.$reply['userId'].'" target="_blank">'.getFullName($reply['userId']).'</a>
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
                                                            <a href="javascript:void(0)" onclick="setupEditComment(\''.$projectId.'\',\''.$reply->id().'\',\''.$projectDetails['name'].'\')" data-toggle="modal" data-target="#update-comment" >Edit</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0)" onclick="deleteCommentOrReply(\''.$projectId.'\',\''.$reply->id().'\',\''.$projectDetails['name'].'\')">Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                
                                            </div>
                
                                            <p id="c'.$reply->id().'">'.$reply['msg'].'</p>
              
                                            <a href="javascript:void(0)" onclick="showReplyBox(rId'.$reply->id().')" class="reply">Reply</a>
                                                <div class="comment-form inline-items" id="rId'.$reply->id().'" style="display: none">
                    
                                                    <div class="post__author author vcard inline-items">
                                                        <img src="img/author-page.jpg" alt="author">
                                
                                                        <div class="form-group ">
                                                            <textarea id="reply_field'.$reply->id().'" onfocus="setFocusId(\''.$projectId.'\',\''.$projectDetails['name'].'\',\''.$reply->id().'\')" class="form-control" placeholder="Reply Here"></textarea>
                                                        </div>
                                                    </div>
                                
                                                    <button id="reply_button"  class="btn btn-md-2 btn-primary" onclick="insertProjectReplyReply(\''.$comment->id().'\',\''.$reply->id().'\')">Reply</button>
                                
                                                </div>
                                            </li>
                                    ';
                                }
                            }
                            echo '</ul></li>';
                        }
                    }
					?>
				</ul>

				<!-- ... end Comments -->

				<!-- <a href="#" class="more-comments">View more comments <span>+</span></a> -->


				<!-- Comment Form  -->

				<div class="comment-form inline-items" id="comment_div"">

					<div class="post__author author vcard inline-items">
						<img src="img/author-page.jpg" alt="author">

						<div class="form-group ">
							<textarea id="project_comment_field" class="form-control" placeholder="Write your comment"></textarea>
						</div>
					</div>

					<button id="project_comment_button" class="btn btn-md-2 btn-primary" onclick="insertProjectComment()">Post Comment</button>

				</div>

				<!-- ... end Comment Form  -->
			</div>
		</div>


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

		<!-- ... end Main Content Post Versions -->

  </div>
</div>

  <script>
      function showReplyBox(commentId) {
          var element = $(this);

          $(commentId).slideToggle(300);
          $(this).toggleClass("active");

          return false;

      }
  </script>

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

<script src="https://www.gstatic.com/firebasejs/6.3.5/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/6.3.5/firebase-firestore.js"></script>

<!--  <script type="text/javascript">
      const userId = "<?php /*echo $_SESSION['id']; */?>";
      const projectId = "<?php /*echo $_GET['pId']; */?>";
      var skipAddedComment = "<?php /*echo count($reply); */?>";
      var isCommentLoad = true;
  </script>
 <script src="js/firestoreProject.js"></script>
 <script src="js/realtimeComment.js"></script>
 <script src="js/custom.js"></script>-->
<!--   <script src="js/showComment.js"></script>-->

<script type="text/javascript">
    const userId = "<?php echo $_SESSION['id']; ?>";
    const projectId = "<?php echo $_GET['pId']; ?>";
</script>

<script src="js/firestore.js"></script>
<script src="js/custom.js"></script>
<script src="js/viewProject.js"></script>
<!--<script src="js/newsfeed.js"></script>-->
</body>

</html>
