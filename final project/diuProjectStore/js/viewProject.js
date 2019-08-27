function insertProjectComment() {
    const comment = document.getElementById("project_comment_field").value;
    const projectName = document.getElementById("project_name").innerHTML;

    document.getElementById("project_comment_field").value = "";

    insertCommentReplyFirestore("project",projectId,"comment",userId,comment.trim(),"",projectName);
}

function insertProjectReply(commentId) {
    const comment = document.getElementById("reply_field"+commentId).value;
    const projectName = document.getElementById("project_name").innerHTML;

    document.getElementById("reply_field"+commentId).value = "";

    insertCommentReplyFirestore("project",projectId,"reply",userId,comment.trim(),commentId,projectName);
}

function insertProjectReplyReply(commentId, replyId) {
    const comment = document.getElementById("reply_field"+replyId).value;
    const projectName = document.getElementById("project_name").innerHTML;

    document.getElementById("reply_field"+replyId).value = "";

    insertCommentReplyFirestore("project",projectId,"reply",userId,comment.trim(),commentId,projectName);
}

function showRealtimeComments(){
    $("#comment_list").append(

    );
}

db.collection("commentReply").where("projectOrPostID","==",projectId).onSnapshot(function(snapshot) {
    snapshot.docChanges().forEach(function(change) {
        if (change.type === "added") {
            console.log("New city: ", change.doc.data().msg);
        }
        if (change.type === "modified") {
            console.log("Modified city: ", change.doc.data().projectOrPost);
        }
        if (change.type === "removed") {
            console.log("Removed city: ", change.doc.id);
        }
    });
});
