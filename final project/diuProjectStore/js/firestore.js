
    var firebaseConfig = {
        apiKey: "AIzaSyAMuPilUJDxzJpHc8FX32U9nc67Xohj9TM",
        authDomain: "diu-project-store.firebaseapp.com",
        databaseURL: "https://diu-project-store.firebaseio.com",
        projectId: "diu-project-store",
        storageBucket: "diu-project-store.appspot.com",
        messagingSenderId: "105449576865",
        appId: "1:105449576865:web:466019847205ffee"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);


const db = firebase.firestore();

function insertPostFirestore(mPost) {
    db.collection("post").add({
        userid : userId,
        post : mPost,
        time : new Date().toString()
    }).then(function(docRef) {
        console.log("post successfully");
        insertNotification(userId,"post","post","",docRef.id);
    }).catch(function(error) {
        console.error("post failed");
    });
}

function showCommentOnPost(divId,postId,comment,whichPost,msg) {
        $("#"+divId).append(
            '<li class="comment-item has-children" id="'+comment.id+'">'+
                '<div class="post__author author vcard inline-items">'+
                    '<img src="img/avatar5-sm.jpg" alt="author">'+

                        '<div class="author-date">'+
                            '<a class="h6 post__author-name fn" href="#">Green Goo Rock</a>'+
                            '<div class="post__date">'+
                                '<time class="published" dateTime="2017-03-24T18:18">'+
                                    new Date().toString()+
                                '</time>'+
                            '</div>'+
                        '</div>'+

                        '<div class="more">'+
                            '<svg class="olymp-three-dots-icon">'+
                                '<use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>'+
                            '</svg>'+

                            '<ul class="more-dropdown more-with-triangle">'+
                                '<li>'+
                                    '<a href="javascript:void(0)" onClick="setupEditComment(\''+postId+'\',\''+comment.id+'\',\''+whichPost+'\')" data-toggle="modal" data-target="#update-comment">Edit</a>'+
                                '</li>'+
                                '<li>'+
                                    '<a href="javascript:void(0)" onClick="deleteCommentOrReply(\''+postId+'\',\''+comment.id+'\',\''+whichPost+'\')">Delete</a>'+
                                '</li>'+
                            '</ul>'+
                        '</div>'+

                '</div>'+

                '<p id="c'+comment.id+'">'+msg+'</p>'+

                /*'<a href="#" class="post-add-icon inline-items">'+
                    '<svg class="olymp-heart-icon">'+
                        '<use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use>'+
                    '</svg>'+
                    '<span>5</span>'+
                '</a>'+*/
                '<a href="javascript:void(0)" onClick="showReplyBox(cId'+comment.id+')" class="reply">Reply</a>'+
                '<div class="comment-form inline-items" id="cId'+comment.id+'" style="display: none">'+

                    '<div class="post__author author vcard inline-items">'+
                        '<img src="img/author-page.jpg" alt="author">'+

                            '<div class="form-group ">'+
                                '<textarea id="reply_field'+comment.id+'" onFocus="setFocusId(\''+postId+'\',\''+whichPost+'\',\''+comment.id+'\')" class="form-control" placeholder="Reply Here"></textarea>'+
                            '</div>'+
                    '</div>'+

                    '<button id="reply_button" class="btn btn-md-2 btn-primary" onClick="insertReply(\''+postId+'\',\''+whichPost+'\',\''+comment.id+'\')">Reply </button>'+

                '</div>'+
                '<ul class="children" id="comment_reply'+comment.id+'">' +
                '</ul>'+
            '</li>'
        );
}

    //it can be project or post
    function insertCommentReplyFirestore(projectOrPost,projectOrPostID,commentOrReply,userId,msg,commentId,whichPost) {
        //if reply then comment id has value other wise empty

        db.collection("commentReply").add({
            projectOrPost: projectOrPost,
            projectOrPostID: projectOrPostID,
            commentOrReply: commentOrReply,
            userId : userId,
            msg : msg,
            commentId : commentId,
            time : new Date().toString()
        }).then(function(docRef) {
            console.log(commentOrReply+" successfully");
            if (commentOrReply == "comment"){
                var divId = "post_comment"+projectOrPostID;
                showCommentOnPost(divId,projectOrPostID,docRef,whichPost,msg);
            }else{
                var divId = "comment_reply"+commentId;
                showCommentOnPost(divId,projectOrPostID,docRef,whichPost,msg);
            }
            insertNotification(userId,commentOrReply,projectOrPost,whichPost,projectOrPostID);
        }).catch(function(error) {
            console.error(commentOrReply+" failed");
        });
    }

    function insertNotification(userId,status,type,whichPost,postOrProjectID) {
        //status -> edit,delete,comment,reply,share
        //type -> post,project,comment,reply


        // you(byWhom) comment(type) on your(whichPost) project/post(projectOrPost)
        //you comment on hassans project/post
        //hassan comment on your project/post

        //you(byWhom) reply(type) hassan(whichPost) comment post/project(projectOrPost)
        //you reply your comment on m post/project
        //hassan reply your comment on m post/project
        //jodu reply kodus comment on m post/project

        //khalid(byWhom) start(type) a new project(projectOrPost)
        //hassan post(type) a new post
        //you post a new post

        //you(byWhom) delete(type) a comment(projectOrPost)

        //you delete a reply

        //you delete a post


        db.collection("notification").add({
            userId: userId,
            status: status,
            type: type,
            whichPost: whichPost,
            postOrProjectID : postOrProjectID,
            time : new Date().toString(),
        }).then(function(docRef) {
            console.log("notification successfully");
        }).catch(function(error) {
            console.error("notification failed");
        });
    }

    function deleteCommentOrReply(postId,commentId,whichPost) {
        db.collection("commentReply").doc(commentId).delete().then(function() {
            console.log("comment successfully deleted!");
            document.getElementById(commentId).remove();
            insertNotification(userId,"delete","comment",whichPost,postId);
        }).catch(function(error) {
            console.error("comment removing document: ", error);
        });
    }

    function setupEditComment(postId,commentId,whichPost) {
        document.getElementById("edit_comment_field").value = document.getElementById("c"+commentId).innerHTML;
        document.getElementById("edit_comment_field").setAttribute("name", postId);
        document.getElementById("update_comment_button").setAttribute("name", commentId);
    }

    function updateComment() {
        var comment = document.getElementById("edit_comment_field").value;
        var postId = document.getElementById("edit_comment_field").name;
        var commentId = document.getElementById("update_comment_button").name;

        db.collection("commentReply").doc(commentId).update({
            "msg": comment.trim()
        })
            .then(function() {
                console.log("comment update successfully");
                document.getElementById("edit_comment_field").value = "";
                $('#update-comment').modal('hide');
                document.getElementById("c"+commentId).innerHTML = comment;
                insertNotification(userId,"update","comment","",postId)
            })
            .catch(function(error) {
                console.error("comment update failed ", error);
            });

    }