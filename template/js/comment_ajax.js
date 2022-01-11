var commentBtn = document.getElementById("comment_btn");
commentBtn.addEventListener('click', leaveCommentToPost);
function leaveCommentToPost(e) {
    e.preventDefault();
    var mainBox = document.querySelector('.comment-list')
    var userId = commentBtn.getAttribute("data-id");
    var comment = document.getElementById('comment');
    var postId = document.getElementById('postId');
    var params = "user_id=" + userId + "&comment=" + comment.value + "&post=" + postId.value;
    comment.value = '';

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/post/comment/create', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')

    xhr.onload = function () {
        if (this.status == 200) {
            var result = JSON.parse(this.responseText);

            if (result[0] == 'success') {
                var user = result[1];
                var cmBox = document.createElement('li')
                cmBox.setAttribute('class', 'comment');
                var vcard = document.createElement('div')
                vcard.setAttribute('class', 'vcard');
                var shortImg = document.createElement('img')
                shortImg.setAttribute('src', '/upload/profile_image/' + user.image)
                vcard.appendChild(shortImg);
                cmBox.appendChild(vcard);
                var cmBody = document.createElement('div');
                cmBody.setAttribute('class', 'comment-body')
                cmBody.setAttribute('data-comment-id', result[3].id)
                var shortH3 = document.createElement('h3')
                shortH3.innerHTML = user.name;
                var metaDiv = document.createElement('div')
                metaDiv.setAttribute('class', 'meta')
                metaDiv.innerHTML = result[2]
                var shortCommentDel = document.createElement('a');
                shortCommentDel.setAttribute('comment-id', result[3].id);
                shortCommentDel.setAttribute('class', 'text-white delete btn btn-sm btn-danger rounded');
                shortCommentDel.textContent = 'Delete';
                var shortCommentedit = document.createElement('a');
                shortCommentedit.setAttribute('class', 'mx-1 edit-comment-btn btn text-white mr-1 doNotTouch btn-sm btn-secondary rounded');
                shortCommentedit.setAttribute('data-user-id', result[3].user_id);
                shortCommentedit.setAttribute('data-user-session', user['id']);
                shortCommentedit.textContent = 'Edit';
                var shortCommentReply = document.createElement('a');
                shortCommentReply.setAttribute('style', 'cursor: pointer;');
                shortCommentReply.setAttribute('data-user-id', result[3].user_id);
                shortCommentReply.setAttribute('data-user-session', user['id']);
                shortCommentReply.setAttribute('class', 'reply pb-2 reply-btn pt-1 rounded doNotTouch');
                shortCommentReply.textContent = 'Reply';
                var cmP = document.createElement('p')
                cmP.innerHTML = result[3].text
                cmBody.appendChild(shortH3);
                cmBody.appendChild(metaDiv);
                cmBody.appendChild(cmP);
                cmBody.appendChild(shortCommentDel);
                cmBody.appendChild(shortCommentedit);
                cmBody.appendChild(shortCommentReply);
                var ulChild = document.createElement('ul');
                ulChild.setAttribute('class', 'children');
                cmBox.appendChild(cmBody);
                cmBox.appendChild(ulChild);

                mainBox.appendChild(cmBox);
                document.querySelector('#comment_count').textContent = result[4].total
            }

            if (result[0] == 'error') {
                console.log('error');
            }
        } else {
            console.log("Page Not Found")
        }
    }
    xhr.send(params);
}


$(document).on('click', '.delete-child', DeleteCommentChild);


function DeleteCommentChild(e) {
    e.preventDefault();
    var commentId = this.getAttribute('comment-id');
    var parentBox = this.parentElement.parentElement;
    var params = "comment_id=" + commentId;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/post/comment/delete', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')

    xhr.onload = function () {
        if (this.status == 200) {
            console.log(result);
            var result = JSON.parse(this.responseText);
            if (result[0] == 'success') {
                parentBox.remove();
            }

            if (result[0] == 'error') {
                console.log('error');
            }
        } else {
            console.log("Page Not Found")
        }
    }
    xhr.send(params);
}

$(document).on('click', '.delete', DeleteComment);


function DeleteComment(e) {
    e.preventDefault();
    var commentId = this.getAttribute('comment-id');
    var parentBox = this.parentElement.parentElement;
    var params = "comment_id=" + commentId;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/post/comment/delete', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')

    xhr.onload = function () {
        if (this.status == 200) {
            console.log(result);
            var result = JSON.parse(this.responseText);
            if (result[0] == 'success') {
                parentBox.remove();
            }

            if (result[0] == 'error') {
                console.log('error');
            }
        } else {
            console.log("Page Not Found")
        }
    }
    xhr.send(params);
}