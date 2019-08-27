// $(document).ready(function () {

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

    function insertPost() {

    }


    function insertComment() {
        var comment = document.getElementById("comment_field").value;

        document.getElementById("comment_field").value = "";

        db.collection("projectComments").doc(projectId).collection("comment").add({
            userid: userId,
            comment: comment.trim(),
            time: new Date().toString()
        }).then(function(docRef) {
            console.log("comment successfully");
            document.getElementById("comment_field").placeholder = "Write your comment";
        }).catch(function(error) {
            console.error("comment failed");
        });

    }



    
    function insertReply(commentId) {
        var comment = document.getElementById("reply_field").value;
        document.getElementById("reply_field").value = "";

        db.collection("projectComments").doc(projectId).collection("comment").doc(commentId).collection("reply").add({
            userid: userId,
            comment: comment.trim(),
            time: new Date().toString()
        })
            .then(function(docRef) {
                console.log("reply successfully");
                document.getElementById("reply_field").placeholder = "Write your reply";
            })
            .catch(function(error) {
                console.error("reply failed");
            });
    }



    function deleteComment(commentId) {
        db.collection("projectComments").doc(projectId).collection("comment").doc(commentId).collection("reply").get().then(function(querySnapshot) {
            querySnapshot.forEach(function(doc) {
                // doc.data() is never undefined for query doc snapshots
                console.log(doc.id, " => ", doc.data());
                db.collection("projectComments").doc(projectId).collection("comment").doc(commentId).collection("reply").doc(doc.id).delete().then(function() {
                    console.log("Document successfully deleted!");
                    document.getElementById(doc.id).remove();
                }).catch(function(error) {
                    console.error("Error removing document: ", error);
                });
            });
            deleteCommentPermanently(commentId);
        });
    }

    function deleteCommentPermanently(commentId) {
        db.collection("projectComments").doc(projectId).collection("comment").doc(commentId).delete().then(function() {
            console.log("Document successfully deleted!");
            document.getElementById(commentId).remove();
        }).catch(function(error) {
            console.error("Error removing document: ", error);
        });
    }

    function deleteReply(replyId) {
        db.collection("projectComments").doc(projectId).collection("comment").doc(commentId).collection("reply").doc(replyId).delete().then(function() {
            console.log("reply successfully deleted!");
            document.getElementById(commentId).remove();
        }).catch(function(error) {
            console.error("Error removing document: ", error);
        });
    }

    function setupEditComment(commentId) {
        document.getElementById("edit_comment_field").value = document.getElementById("c"+commentId).innerHTML;
        document.getElementById("update_comment_button").setAttribute("name", commentId);
    }

    function updateComment() {
        var comment = document.getElementById("edit_comment_field").value;
        var commentId = document.getElementById("update_comment_button").name;

        db.collection("projectComments").doc(projectId).collection("comment").doc(commentId).update({
            "comment": comment
        })
            .then(function() {
                console.log("comment update successfully");
                document.getElementById("edit_comment_field").value = "";
                $('#update-comment').modal('hide');
            })
            .catch(function(error) {
                console.error("comment update failed ", error);
            });

    }









//});