var comment_list = document.querySelector("#comment_list");

/*comment_list.innerHTML += '<li class="comment-item has-children">'+
    '<div class="post__author author vcard inline-items">'+
        '<img src="img/avatar5-sm.jpg" alt="author">'+

            '<div class="author-date">'+
                '<a class="h6 post__author-name fn" href="#">Green Goo Rock</a>'+
                '<div class="post__date">'+
                    '<time class="published" dateTime="2017-03-24T18:18">'+
                        '1 hour ago'+
                    '</time>'+
                '</div>'+
            '</div>'+

            '<div class="more">'+
                '<svg class="olymp-three-dots-icon">'+
                    '<use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>'+
                '</svg>'+

                '<ul class="more-dropdown more-with-triangle">'+
                    '<li>'+
                        '<a href="#" data-toggle="modal" data-target="#update-header-photo">Edit</a>'+
                    '</li>'+
                    '<li>'+
                        '<a href="#" data-toggle="modal" data-target="#update-header-photo">Delete</a>'+
                    '</li>'+
                '</ul>'+
            '</div>'+
    '</div>'+

    '<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugiten, sed quia</p>'+

    '<a href="#" class="reply">Reply</a>'+

    '<ul class="children">'+
        '<li class="comment-item">'+
            '<div class="post__author author vcard inline-items">'+
                '<img src="img/avatar5-sm.jpg" alt="author">'+

                    '<div class="author-date">'+
                        '<a class="h6 post__author-name fn" href="#">Green Goo Rock</a>'+
                        '<div class="post__date">'+
                            '<time class="published" dateTime="2017-03-24T18:18">'+
                                '1 hour ago'+
                            '</time>'+
                        '</div>'+
                    '</div>'+

                    '<div class="more">'+
                        '<svg class="olymp-three-dots-icon">'+
                            '<use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>'+
                        '</svg>'+

                        '<ul class="more-dropdown more-with-triangle">'+
                            '<li>'+
                                '<a href="#" data-toggle="modal" data-target="#update-header-photo">Edit</a>'+
                            '</li>'+
                            '<li>'+
                                '<a href="#" data-toggle="modal" data-target="#update-header-photo">Delete</a>'+
                            '</li>'+
                        '</ul>'+
                    '</div>'+

                    '<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugiten, sed quia'+
                        'consequuntur magni dolores eos qui ratione voluptatem sequi en lod nesciunt. Neque porro'+
                        'quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur adipisci velit en lorem ipsum'+
                        'der.'+
                    '</p>'+

                    '<a href="#" class="reply">Reply</a>'+
        '</li>'+
    '</ul>'+

'</li>';*/

var userId = "<?php $_SESSION['id']; ?>";

var comments = new Array();
var commentsId = new Array();

var projectId = document.getElementById("comment_button").name;

var type = "";
var isPageOpen = true;

db.collection("projectComments").doc(projectId).collection("comment").orderBy("time").onSnapshot(function(snapshot) {
    snapshot.docChanges().forEach(function(change) {
        if (change.type === "added") {
            type = "added";
            console.log("New city: ", change.doc.data());
        }
        else if (change.type === "modified") {
            type = "modified";
            console.log("Modified city: ", change.doc.data());
        }
        else if (change.type === "removed") {
            type = "removed";
            console.log("Removed city: ", change.doc.data());
        }


        comments.push(change.doc.data());
        commentsId.push(change.doc.id);
    });

    console.log(comments);
    console.log(commentsId);


    if (comments.length != 0){
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

    }

});




function collectReply(commentNo) {
    var reply = new Array();
    var reply_id = new Array();

    console.log(commentNo);

    db.collection("projectComments").doc(projectId).collection("comment").doc(commentsId[commentNo]).collection("reply").get().then(function(querySnapshot) {
        querySnapshot.forEach(function(doc) {
            console.log(doc.id +" => "+ doc.data());
            if (doc.data()){
                console.log(doc.data());
                reply.push(doc.data());
                reply_id.push(doc.id);
            }
        });
        if (reply.length == 0){
            showComment(commentNo);
        }else{
            showCommentWithReply(commentNo,reply,reply_id);
        }
    });
}

function showComment(commentNo) {
    console.log("comment for"+ commentNo);
    $("#comment_list").append('<li class="comment-item has-children" id="'+commentsId[commentNo]+'">'+
        '<div class="post__author author vcard inline-items">'+
        '<img src="img/avatar5-sm.jpg" alt="author">'+

        '<div class="author-date">'+
        '<a class="h6 post__author-name fn" href="#">'+commentsId[commentNo]+'</a>'+
        '<div class="post__date">'+
        '<time class="published" dateTime="2017-03-24T18:18">'+
        comments[commentNo].time
        +'</time>'+
        '</div>'+
        '</div>');

        if (comments[commentNo].userid == userId) {
            $("#comment_list").append('<div class="more">' +
                '<svg class="olymp-three-dots-icon">' +
                '<use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>' +
                '</svg>' +

                '<ul class="more-dropdown more-with-triangle">' +
                '<li>' +
                '<a href="javascript:void(0)" onclick="setupEditComment(' + commentNo + ')" data-toggle="modal" data-target="#update-comment">Edit</a>' +
                '</li>' +
                '<li>' +
                '<a href="javascript:void(0)" onclick="deleteComment(' + commentNo + ')">Delete</a>' +
                '</li>' +
                '</ul>' +
                '</div>' +
                '</div>');
        }

        $("#comment_list").append('<p id="p'+commentsId[commentNo]+'">'+comments[commentNo].comment+'</p>'+

        '<a href="#" class="reply">Reply</a></br></br>'+
        '</li>');

    if (commentNo != commentsId.length-1){
        collectReply(commentNo += 1);
    }
}


function showCommentWithReply(commentNo, reply, reply_id) {
    console.log("comment for"+ commentNo);
    $("#comment_list").append('<li class="comment-item has-children">'+
        '<div class="post__author author vcard inline-items">'+
        '<img src="img/avatar5-sm.jpg" alt="author">'+

        '<div class="author-date">'+
        '<a class="h6 post__author-name fn" href="#">'+commentsId[commentNo]+'</a>'+
        '<div class="post__date">'+
        '<time class="published" dateTime="2017-03-24T18:18">'+
        '1 hour ago'+
        '</time>'+
        '</div>'+
        '</div>'+

        '<div class="more">'+
        '<svg class="olymp-three-dots-icon">'+
        '<use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>'+
        '</svg>'+

        '<ul class="more-dropdown more-with-triangle">'+
        '<li>'+
        '<a href="#" data-toggle="modal" data-target="#update-header-photo">Edit</a>'+
        '</li>'+
        '<li>'+
        '<a href="#" data-toggle="modal" data-target="#update-header-photo">Delete</a>'+
        '</li>'+
        '</ul>'+
        '</div>'+
        '</div>'+

        '<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugiten, sed quia</p>'+

        '<a href="#" class="reply">Reply</a>'+

        '<ul class="children">');


        for (i in reply) {
            $("#comment_list").append('<li class="comment-item">' +
            '<div class="post__author author vcard inline-items">' +
            '<img src="img/avatar5-sm.jpg" alt="author">' +

            '<div class="author-date">' +
            '<a class="h6 post__author-name fn" href="#">Green Goo Rock</a>' +
            '<div class="post__date">' +
            '<time class="published" dateTime="2017-03-24T18:18">' +
            '1 hour ago' +
            '</time>' +
            '</div>' +
            '</div>' +

            '<div class="more">' +
            '<svg class="olymp-three-dots-icon">' +
            '<use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>' +
            '</svg>' +

            '<ul class="more-dropdown more-with-triangle">' +
            '<li>' +
            '<a href="#" data-toggle="modal" data-target="#update-header-photo">Edit</a>' +
            '</li>' +
            '<li>' +
            '<a href="#" data-toggle="modal" data-target="#update-header-photo">Delete</a>' +
            '</li>' +
            '</ul>' +
            '</div>' +

            '<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugiten, sed quia' +
            'consequuntur magni dolores eos qui ratione voluptatem sequi en lod nesciunt. Neque porro' +
            'quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur adipisci velit en lorem ipsum' +
            'der.' +
            '</p>' +

            '<a href="#" class="reply">Reply</a>' +
            '</li>');
        }

    $("#comment_list").append('</ul>'+

        '</li>');

    if (commentNo != commentsId.length-1){
        collectReply(commentNo += 1);
    }
}

function setupEditComment(commentNo) {
    document.getElementById("edit_comment_field").value = comments[commentNo].comment;
    document.getElementById("update_comment_button").setAttribute("name", commentsId[commentNo]);
}






