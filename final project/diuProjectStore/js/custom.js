
/*control mouse pointer*/
/*
$("#comment_div").focusin(function() {
    console.log("mouse in text area");
});

$("#comment_div").focusout(function() {
    console.log("mouse in text area");
});

$('element').mouseover(function() {
    alert('over');
});*/


/*control key pressd*/

var focusId = "";
var whichPost = "";
var commentId = "";
function setFocusId(postId,whichPost,commentId){
    focusId = postId;
    whichPost = whichPost;
    commentId = commentId;
}

var poUpPostId = "";
var poUpCommentId = "";
var poUpWhichPost = "";
function setPopCommentParameter(postId,whichPost){
    poUpPostId = postId;
    poUpWhichPost = whichPost;
}


document.onkeypress = function keypressed(){
    if (window.event.keyCode == 13) {
        if ($("#reply_field"+commentId).is(':focus')) {
            insertReply(focusId,whichPost,commentId);
        }
        else if ($("#post_field").is(':focus')) {
            insertPost();
        }
        else if ($("#post_comment_field"+focusId).is(':focus')) {
            insertComment(focusId,whichPost);
        }
        else if ($("#edit_comment_field"+focusId).is(':focus')) {
            updateComment();
        }
        else if ($("#popup_post_comment_field").is(':focus')) {
            popupInsertComment(poUpPostId,poUpWhichPost);
        }
        else if ($("#project_comment_field").is(':focus')) {
            insertProjectComment();
        }
    }
}
