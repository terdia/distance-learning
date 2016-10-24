<?php
if(isset($_REQUEST['txtPostUsername']) && isset($_REQUEST['postTextarea'])
    and empty($_REQUEST['postTextarea']) == false){
    $thepost = $_REQUEST['postTextarea'];
    $post_userid = $_REQUEST['txtPostID'];
    $post_username = $_REQUEST['txtPostUsername'];
    date_default_timezone_set('Asia/Kuala_Lumpur');
    $sql = "INSERT INTO forum (post_userid,post_username,the_post,post_time)
            VALUES(:post_userid,:post_username,:thepost,post_time=now())";

    $con = new data();
    $statement = $con->prepare($sql);
    $statement->execute(array(':post_userid'=>$post_userid,
                              ':post_username'=>$post_username,
                              ':thepost'=>$thepost));
    $insertedID = $con->lastInsertId();
    $update = $con->prepare("UPDATE forum SET post_time=now()
                            WHERE post_id=:postID");
    $update->execute(array('postID'=>$insertedID));

    if($statement->rowCount() > 0){

    }else{
        $error = $statement->errorInfo();
        $commentOutput = "Operation failed with message: " . $error[2];
    }
}else if(isset($_REQUEST['txtReplyPost']) && isset($_REQUEST['txtReplyPost'])
    and empty($_REQUEST['txtReplyPost']) == false){
    $reply = $_REQUEST['txtReplyPost'];
    $reply_userID = $_REQUEST['txtReplyID'];
    $thePostID = $_REQUEST['txtThePostID'];
    $reply_username = $_REQUEST['txtReplyUsername'];
    date_default_timezone_set('Asia/Kuala_Lumpur');

    $sql = "INSERT INTO replythread(post_id,reply_userID,
              reply_username,reply,reply_time)
            VALUES(:post_id,:reply_userID,:reply_username,:reply,now())";

    $con = new data();
    $statement = $con->prepare($sql);
    $statement->execute(array(':reply_userID'=>$reply_userID,
        ':reply_username'=>$reply_username,
        ':reply'=>$reply, 'post_id'=>$thePostID));

    if($statement->rowCount() > 0){

    }else{
        $error = $statement->errorInfo();
        $commentOutput = "Operation failed with message: " . $error[2];
    }
}
if(isset($_GET['idP']) && isset($_GET['postID'])){
        $thePostID = $_GET['postID'];
        $theUserID = $_GET['idP'];
        $commentOutput = "";
        $con = new data();
        $agoObj = new convertToAgo();

        $load = "SELECT * FROM forum WHERE post_id =:post_id
                 AND post_userid=:post_userid";

        $stat = $con->prepare($load);
        $stat->execute(array('post_id'=> $thePostID, 'post_userid'=>$theUserID));

        if($stat->rowCount() > 0){
            while($row = $stat->fetch()){
                $username = $row['post_username'];
                $postID = $row['post_id'];
                $postUserid = $row['post_userid'];
                $postTime = $row['post_time'];
                $post = $row['the_post'];
                $convertedTime = $agoObj->convert_datetime($postTime);
                $whenPost = $agoObj->makeAgo($convertedTime);
                $sql = "SELECT avatar FROM users WHERE matric_no=:matric_no LIMIT 1";
                $statements = $con->prepare($sql);
                $statements->execute(array('matric_no'=> $postUserid));
                if($row = $statements->fetch());{
                    $avatar = $row['avatar'];
                }
                $check_pic = "../students/$postUserid/$avatar";
                $default_pic = "../students/default-no-profile-pic.jpg";

                if($avatar != ""){
                    if(file_exists($check_pic)){
                        $profile_pic = "<img src=".$check_pic." width='50' height='50' />";
                    }
                }else{
                    $profile_pic = "<img src=".$default_pic." width='50' height='50' />";
                }

                $commentOutput .= '<table border="0" id="postTextarea" cellpadding="6" style="width:97%; margin:0 auto;">
                <tr>
                <td width="10%" valign="top">'.$profile_pic.'</td>
                <td width="90%" valign="top" style="line-height:1.5em;">
                <span class="liteGreyColor textsize9"><a href="profile?idP='. $postUserid.'&postID='.$postID.'"><strong>'.$username.'</strong></a> '.$whenPost.'</span><br />
                '.$post.'<br /></td></tr>
                </table><br \>';
                $commentOutput .= '<form class="instantform" method="post">
                <input type="hidden" name="txtThePostID" id="txtThePostID"
                value="'.$postID.'">';
            }
        }
}


if(isset($_GET['idP']) && isset($_GET['postID'])){
$replyOutput = "";
$con = new data();
$agoObj = new convertToAgo();

$loads = "SELECT * FROM replythread
                 WHERE post_id =:post_id
                 ORDER BY post_id DESC";

$stat = $con->prepare($loads);
$stat->execute(array('post_id'=>$postID));

$rows = $stat->rowCount();
$page_rows = 3;
// This tells us the page number of our last page
$last = ceil($rows/$page_rows);
// This makes sure $last cannot be less than 1
if($last < 1){
    $last = 1;
}
$pagenum = 1;
if(isset($_GET['pn'])){
    $pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
}
// This makes sure the page number isn't below 1, or more than our $last page
if ($pagenum < 1){
    $pagenum = 1;
}
else if ($pagenum > $last){
    $pagenum = $last;
}

$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;

$sql2 = "SELECT * FROM replythread
                 WHERE post_id =:post_id
                 ORDER BY post_id DESC $limit";

$replyStatement = $con->prepare($sql2);
$replyStatement->execute(array('post_id'=> $postID));

$textline2 = "Page <b>$pagenum</b> of <b>$last</b>";;

$paginationCtrls = '';
if($last != 1){
    if ($pagenum > 1) {
        $previous = $pagenum - 1;
        $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'&idP='. $postUserid.'&postID='.$postID.'">Previous</a> &nbsp; &nbsp; ';
        for($i = $pagenum-4; $i < $pagenum; $i++){ if($i > 0){ $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'&idP='. $postUserid.'&postID='.$postID.'">'.$i.'</a> &nbsp; '; } } }
    $paginationCtrls .= ''.$pagenum.' &nbsp; ';

    for($i = $pagenum+1; $i <= $last; $i++){
        $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'&idP='.$postUserid.'&postID='.$postID.'">'.$i.'</a> &nbsp;';
        if($i >= $pagenum+4){
            break;
        }
    }
}
if ($pagenum != $last) {
    $next = $pagenum + 1;
    $paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'&idP='. $postUserid.'&postID='.$postID.'">Next</a> ';
}

if($replyStatement->rowCount() > 0){
    while($row = $replyStatement->fetch()){
        $rusername = $row['reply_username'];
        $post_id = $row['post_id'];
        $reply_id = $row['reply_id'];
        $reply_userID = $row['reply_userID'];
        $reply_time = $row['reply_time'];
        $reply = $row['reply'];

        if(($reply_userID) == $_SESSION['adminID']){
            $delete = '<img src="images/delete-icon.png"
                alt="Delete Post" title="Delete Post">';
        }else{
            $delete = "";
        }

        $convertedTime = $agoObj->convert_datetime($reply_time);
        $whenPost = $agoObj->makeAgo($convertedTime);

        $sqlPic = "SELECT avatar FROM users WHERE matric_no=:matric_no LIMIT 1";
        $statements = $con->prepare($sqlPic);
        $statements->execute(array('matric_no'=> $reply_userID));

        if($row = $statements->fetch());{
            $avatar = $row['avatar'];
        }
        $check_pic = "../students/$reply_userID/$avatar";
        $default_pic = "../students/default-no-profile-pic.jpg";

        if($avatar != ""){
            if(file_exists($check_pic)){
                $profile_pic = "<img src=".$check_pic." width='50' height='50' />";
            }
        }else{
            $profile_pic = "<img src=".$default_pic." width='50' height='50' />";
        }

        $replyOutput .='<table border="0" style="border: 1px solid #898989;" cellpadding="6" class="reply">
                            <tr>
                            <td width="10%" valign="top">'.$profile_pic.'</td>
                            <td width="90%" valign="top" style="line-height:1.5em;">
                            <span class="liteGreyColor textsize9"><a href="#?replyUserid='. $reply_userID.'replyPostID='.$post_id.'"><strong>'.$rusername.'</strong></a> '.$whenPost.'</span><br />
                            '.$reply.'<br />
                            <a style="float:right;" href="#" onclick="return false" onmousedown="deleteItem('.$reply_id.',\'replythread\')">'.$delete.'</a>
                            </td>
                            </tr>
                            </table>';
     }
    }
    $replyOutput .= '<br />';
}