<?php
  require("lib/connect.php");
  
  settype($_POST['id'], 'integer');
  $filtered = array (
    'id'=>mysqli_real_escape_string($mysqli, $_POST['id'])
  );

  $sql = "
    DELETE
      FROM singer
      WHERE id = {$filtered['id']}";
  $result = mysqli_query($mysqli, $sql);
  if($result === false) {
    echo "삭제하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.";
    error_log(mysqli_error($mysqli));
  } else {
    // echo '성공했습니다. <a href="author.php">돌아가기</a>';
    header('Location: singer.php');
  }
?>
