function insertPost() {
    const mPost = document.getElementById("post_field").value;

    document.getElementById("post_field").value = "";

    insertPostFirestore(mPost.trim());
}

function showCommentBox(commentId) {
    var element = $(this);

    $(commentId).slideToggle(300);
    $(this).toggleClass("active");

    return false;
}

function showReplyBox(commentId) {
    var element = $(this);

    $(commentId).slideToggle(300);
    $(this).toggleClass("active");

    return false;
}

function showComments(postId) {
    var element = $(this);

    $(postId).slideToggle(300);
    $(this).toggleClass("active");

    return false;
}

function insertComment(postId,whichPost) {
    const mComment = document.getElementById("post_comment_field"+postId).value;

    document.getElementById("post_comment_field"+postId).value = "";

    insertCommentReplyFirestore("post",postId,"comment",userId,mComment.trim(),"",whichPost);

}

function insertReply(postId,whichPost,commentId) {
    const mReply = document.getElementById("reply_field"+commentId).value;

    document.getElementById("reply_field"+commentId).value = "";

    insertCommentReplyFirestore("post",postId,"reply",userId,mReply.trim(),commentId,whichPost);

}

function showPostFromNotification(postId) {
    db.collection("post").doc(postId).get().then(function(doc) {
        if (doc.exists) {
            console.log("Document data:", doc.data());
            document.getElementById("popup_post_name").innerHTML = doc.data().userid;
            document.getElementById("popup_post_time").innerHTML = doc.data().time;
            document.getElementById("popup_post_msg").innerHTML = doc.data().post;
            document.getElementById("popup_post_comment_button").onclick = function() {
                insertComment(postId,doc.data().userid);
            };
            //onclick="insertComment(\''.$post->id().'\',\''.$post['userid'].'\')"

            loadPopUpComment(postId,doc.data().userid);
        } else {
            // doc.data() will be undefined in this case
            console.log("No such document!");
        }
    }).catch(function(error) {
        console.log("Error getting document:", error);
    });
}

function loadPopUpComment(postId, whichPost) {
    var firstLoad = true;
    db.collection("commentReply").orderBy("time").onSnapshot(function(snapshot) {
        snapshot.docChanges().forEach(function(change) {
            if (change.type === "added") {
                if (change.doc.data().commentOrReply == "comment") {
                    showCommentOnPostRealtime(postId, change, whichPost)
                }else{

                }
            }
            if (change.type === "modified") {
                console.log("Modified city: ", change.doc.data());
            }
            if (change.type === "removed") {
                console.log("Removed city: ", change.doc.data());
            }
        });

        if (firstLoad == true){
            snapshot.docChanges().forEach(function(change) {
                if (change.doc.data().commentOrReply == "reply") {
                    showCommentOnPostRealtime(postId, change, whichPost)
                }
            });
            firstLoad = false;
        }
    });



    $("#blog-post-popup").modal();
}

function showCommentOnPostRealtime(postId,data,whichPost) {
    $("#popup_post_comment").append(
        '<li class="comment-item has-children" id="'+data.doc.id+'">'+
        '<div class="post__author author vcard inline-items">'+
        '<img src="img/avatar5-sm.jpg" alt="author">'+

        '<div class="author-date">'+
        '<a class="h6 post__author-name fn" href="#">Green Goo Rock</a>'+
        '<div class="post__date">'+
        '<time class="published" dateTime="2017-03-24T18:18">'+
            data.doc.data().time+
        '</time>'+
        '</div>'+
        '</div>'+

        '<div class="more">'+
        '<svg class="olymp-three-dots-icon">'+
        '<use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>'+
        '</svg>'+

        '<ul class="more-dropdown more-with-triangle">'+
        '<li>'+
        '<a href="javascript:void(0)" onClick="setupEditComment(\''+postId+'\',\''+data.doc.id+'\',\''+whichPost+'\')" data-toggle="modal" data-target="#update-comment">Edit</a>'+
        '</li>'+
        '<li>'+
        '<a href="javascript:void(0)" onClick="deleteCommentOrReply(\''+postId+'\',\''+data.doc.id+'\',\''+whichPost+'\')">Delete</a>'+
        '</li>'+
        '</ul>'+
        '</div>'+

        '</div>'+

        '<p id="c'+data.doc.id+'">'+data.doc.data().msg+'</p>'+

        /*'<a href="#" class="post-add-icon inline-items">'+
            '<svg class="olymp-heart-icon">'+
                '<use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use>'+
            '</svg>'+
            '<span>5</span>'+
        '</a>'+*/
        '<a href="javascript:void(0)" onClick="showReplyBox(cId'+data.doc.id+')" class="reply">Reply</a>'+
        '<div class="comment-form inline-items" id="cId'+data.doc.id+'" style="display: none">'+

        '<div class="post__author author vcard inline-items">'+
        '<img src="img/author-page.jpg" alt="author">'+

        '<div class="form-group ">'+
        '<textarea id="reply_field'+data.doc.id+'" onFocus="setFocusId(\''+postId+'\',\''+whichPost+'\',\''+data.doc.id+'\')" class="form-control" placeholder="Reply Here"></textarea>'+
        '</div>'+
        '</div>'+

        '<button id="reply_button" class="btn btn-md-2 btn-primary" onClick="insertReply(\''+postId+'\',\''+whichPost+'\',\''+data.doc.id+'\')">Reply </button>'+

        '</div>'+
        '<ul class="children" id="comment_reply'+data.doc.id+'">' +
        '</ul>'+
        '</li>'
    );
}

function popupInsertComment(postId,whichPost) {
    const mComment = document.getElementById("popup_post_comment_field").value;

    document.getElementById("popup_post_comment_field").value = "";

    insertCommentReplyFirestore("comment",postId,mComment.trim(),whichPost,"post","");
}


var notificationSound = new Audio('mp3/notification.mp3');
var postSound = new Audio('mp3/post.mp3');
var loadPost = false;

db.collection("post").orderBy("time","desc").onSnapshot(function(snapshot) {
    snapshot.docChanges().forEach(function(change) {

        if (change.type === "added") {
            console.log(snapshot.size);
            console.log(loadPost);
            if (loadPost == true){
                $("#newsfeed-items-grid").prepend(
                    '<div class="ui-block">'+

                        '<article class="hentry post">'+

                            '<div class="post__author author vcard inline-items">'+
                                '<img src="img/author-page.jpg" alt="author">'+

                                    '<div class="author-date">'+
                                        '<a class="h6 post__author-name fn" href="02-ProfilePage.html">James Spiegel</a>'+
                                        '<div class="post__date">'+
                                            '<time class="published" dateTime="2017-03-24T18:18">'+
                                                change.doc.data().time+
                                            '</time>'+
                                        '</div>'+
                                    '</div>'+

                            '</div>'+

                            '<p>'+change.doc.data().post+'</p>'+

                            '<div class="post-additional-info inline-items">'+
                                '<div class="comments-shared">'+
                                    '<a href="javascript:void(0)" class="post-add-icon inline-items" onClick="showComments(post_comment'+change.doc.id+')">'+
                                        '<svg class="olymp-speech-balloon-icon">'+
                                            '<use xlink:href="svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use>'+
                                        '</svg>'+
                                        '<span id="count_post_comment'+change.doc.id+'"></span>'+
                                    '</a>'+
                                '</div>'+
                            '</div>'+

                            '<div class="control-block-button post-control-button">'+
                                '<a href="javascript:void(0)" class="btn btn-control" onClick="showCommentBox(post_comment_div'+change.doc.id+')">'+
                                    '<svg class="olymp-comments-post-icon">'+
                                        '<use xlink:href="svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>'+
                                    '</svg>'+
                                '</a>'+
                            '</div>'+

                        '</article>'+
                            '<ul class = "comments-list" id = "post_comment'+change.doc.id+'" style = "display: none" >'+
                            '</ul>'+
                    '</div>'
                );

                postSound.play();
            }
        }
    });
    loadPost = true;
});


    db.collection("notification").orderBy("time").onSnapshot(function(snapshot) {
        snapshot.docChanges().forEach(function(change) {
            if (change.type === "added") {
                var mByWhom = "";
                var mWhichPost = "";

                if (change.doc.data().byWhom == userId){
                    mByWhom = "You";
                }else{
                    mByWhom = change.doc.data().byWhom;
                }

                if (change.doc.data().whichPost == userId){
                    mWhichPost = "Your";
                }else{
                    mWhichPost = change.doc.data().whichPost;
                }

                if (change.doc.data().type == 'post') {
                    $("#notification").prepend('<li className="inline-items" style="cursor: pointer" onclick="showPostFromNotification(\''+change.doc.data().postOrProjectID+'\')" > ' +
                        /*'<div className="author-thumb">'+
                        '<img src="img/avatar41-sm.jpg" alt="author">'+
                        '</div>'+*/
                        '<div className="notification-event">' +
                        '<a href="#" className="h6 notification-friend">' + mByWhom + " " + '</a> ' +
                        'share a new '+
                        ' <a href="#" className="notification-link">post</a>' +
                        '<span className="notification-date">' +
                        '<time className="entry-date updated"dateTime="2004-07-24T18:18"></br>4 hours ago</time>' +
                        '</span>' +
                        '</div>' +
                        /*'<span className="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="ADD TO YOUR FAVS">'+
                            '<a href="#"><svg className="olymp-star-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-star-icon"></use></svg></a>'+
                        '</span>'+*/

                        '</li>');
                }
                else if (change.doc.data().type == 'comment') {
                    $("#notification").prepend('<li className="inline-items" style="cursor: pointer" onclick="showPostFromNotification()" > ' +
                        /*'<div className="author-thumb">'+
                        '<img src="img/avatar41-sm.jpg" alt="author">'+
                        '</div>'+*/
                        '<div className="notification-event">' +
                        '<a href="#" className="h6 notification-friend">' + mByWhom + " " + '</a> ' +
                        'comment on '+
                        ' <a href="#" className="notification-link">'+mWhichPost + " " + '</a>' +
                        'post'+
                        '<span className="notification-date">' +
                        '<time className="entry-date updated"dateTime="2004-07-24T18:18"></br>4 hours ago</time>' +
                        '</span>' +
                        '</div>' +
                        /*'<span className="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="ADD TO YOUR FAVS">'+
                            '<a href="#"><svg className="olymp-star-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-star-icon"></use></svg></a>'+
                        '</span>'+*/

                        '</li>');
                }
                else if (change.doc.data().type == 'delete' || change.doc.data().type == 'update') {
                    $("#notification").prepend('<li className="inline-items" style="cursor: pointer" onclick="showPostFromNotification()" > ' +
                        /*'<div className="author-thumb">'+
                        '<img src="img/avatar41-sm.jpg" alt="author">'+
                        '</div>'+*/
                        '<div className="notification-event">' +
                        '<a href="#" className="h6 notification-friend">' + mByWhom + " " + '</a> ' +
                        change.doc.data().type+
                        ' a '+
                        change.doc.data().projectOrPost+
                        '<span className="notification-date">' +
                        '<time className="entry-date updated"dateTime="2004-07-24T18:18"></br>4 hours ago</time>' +
                        '</span>' +
                        '</div>' +
                        /*'<span className="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="ADD TO YOUR FAVS">'+
                            '<a href="#"><svg className="olymp-star-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-star-icon"></use></svg></a>'+
                        '</span>'+*/

                        '</li>');
                }

                notificationSound.play();
            }
            if (change.type === "modified") {
                console.log("Modified city: ", change.doc.data());
            }
            if (change.type === "removed") {
                console.log("Removed city: ", change.doc.data());
            }
        });
    });



