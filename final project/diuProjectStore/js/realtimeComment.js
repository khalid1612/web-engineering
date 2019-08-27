
db.collection("projectComments").doc(projectId).collection("comment").orderBy("time").onSnapshot(function(snapshot) {
    snapshot.docChanges().forEach(function(change) {
        if (change.type === "added") {
            if (skipAddedComment == 0){
                addNewComment(change.doc.id,change.doc.data());
                console.log("new comment added");
            }else{
                skipAddedComment -= 1;
                console.log("old comment loaded");
            }
            console.log("New city: ", change.doc.data());
        }
        else if (change.type === "modified") {
            console.log("Modified city id: ",change.doc.id);
            document.getElementById("c"+change.doc.id).innerHTML = change.doc.data().comment;
            console.log("Modified city: ", change.doc.data());
        }
        else if (change.type === "removed") {
            console.log("Removed city: ", change.doc.data());
        }
    });



  /*  if (comments.length != 0){
        if (type == "added"){
            if (isPageOpen){
                isPageOpen = false;
                showComment(0);
            }else {
                showComment(comments.length-1);
            }
        }
        else if (type == "modified"){
            document.getElementById("p"+commentsId[commentsId.length-1]).innerHTML = comments[comments.length-1].comment;
            console.log("mdify from list");
        }
        else if (type == "removed"){
            document.getElementById(commentsId[commentsId.length-1]).remove();
            console.log("remove from list");
        }
        else if (type == ""){

        }

    }*/

});


function addNewComment(commentId,commentDetails) {
    var comment_list = document.querySelector("#comment_list");

    comment_list.innerHTML += '<li style="background-color: #00b3ee; color: white" class="comment-item has-children" id="'+commentId+'">'+
        '<div class="post__author author vcard inline-items">'+
            '<img src="img/avatar5-sm.jpg" alt="author">'+

                '<div class="author-date">'+
                    '<a class="h6 post__author-name fn" href="#">Green Goo Rock</a>'+
                    '<div class="post__date">'+
                        '<time class="published" datetime="2017-03-24T18:18">'+
                            commentDetails.time +
                        '</time>'+
                    '</div>'+
                '</div>'+

                '<div class="more">'+
                    '<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>'+

                    '<ul class="more-dropdown more-with-triangle">'+
                        '<li>'+
                            '<a href="#" data-toggle="modal" data-target="#update-header-photo">Edit</a>'+
                        '</li>'+
                        '<li>'+
                            '<a href="javascript:void(0)" onclick="deleteComment(\''+commentId+'\')">Delete</a>'+
                        '</li>'+
                    '</ul>'+
                '</div>'+
        '</div>'+

        '<p>'+commentDetails.comment+'</p>'+

        '<a href="javascript:void(0)" onclick="showReplyBox(cId'+commentId+')" class="reply">Reply</a>'+
        '<div class="comment-form inline-items" id="cId'+commentId+'" style="display: none">'+

            '<div class="post__author author vcard inline-items">'+
                '<img src="img/author-page.jpg" alt="author">'+

                    '<div class="form-group ">'+
                        '<textarea id="reply_field" class="form-control" placeholder="Reply Here"></textarea>'+
                    '</div>'+
            '</div>'+

            '<button id="reply_button"  class="btn btn-md-2 btn-primary">Reply</button>'+

        '</div>'+

    '<br><br></li>';


    setTimeout(function(){
        document.getElementById(commentId).removeAttribute("style");
    }, 1000);



}