var commentBtn = document.getElementById("comment_btn");
commentBtn.addEventListener('click', leaveCommentToPost);
function leaveCommentToPost(e)
{
    e.preventDefault();
    var userId = commentBtn.getAttribute("data-id");
    var comment = document.getElementById('comment');
    var postId = document.getElementById('postId');
    var params = "user_id=" + userId + "&comment=" + comment.value + "&post=" + postId.value;
    comment.value = '';

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/post/comment/create', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')

    xhr.onload = function(){
        if(this.status == 200){
            var comments = JSON.parse(this.responseText); 
            var output = '';
            console.log(comments);
            for(const i in comments[0]){
                if( userId == comments[0][i].user_id ){
                    output += '<li class="comment">'+
                                    '<div class="vcard">'+
                                        '<img src="/upload/profile_image/'+comments[0][i].image+'" alt="Image placeholder"'+
                                        'class="width: 60px; height:60px;object-fit:cover;">'+
                                    '</div>'+
                                    '<div class="comment-body">'+
                                        '<h3>'+comments[0][i].name+'</h3>'+
                                        '<div class="meta">' + comments[0][i].time + '</div>'+
                                        '<p>'+comments[0][i].text+'</p>'+
                                        '<p>'+
                                            '<a href="/post/comment/delete/'+comments[0][i].id+'" class="delete btn btn-sm btn-danger mr-2 rounded">Delete</a>'+
                                            '<a href="#" class="delete btn btn-sm btn-secondary rounded">Edit</a>'+
                                        '</p>'+
                                    '</div>'+
                                '</li>';
                } else {
                    output += '<li class="comment">'+
                                    '<div class="vcard">'+
                                        '<img src="/upload/profile_image/'+comments[0][i].image+'" alt="Image placeholder"'+
                                        'class="width: 60px; height:60px;object-fit:cover;">'+
                                    '</div>'+
                                    '<div class="comment-body">'+
                                        '<h3>'+comments[0][i].name+'</h3>'+
                                        '<div class="meta">' + comments[0][i].time + '</div>'+
                                        '<p>'+comments[0][i].text+'</p>'+
                                    '</div>'+
                                '</li>';
                }
                
            }

            document.getElementById('comment_count').innerHTML = (comments[1].total);
            document.getElementById('comment-container').innerHTML = output;
        } else {
            console.log("Page Not Found")
        }
    }
    xhr.send(params);
}