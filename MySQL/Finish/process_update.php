<?php
  $mysqli = mysqli_connect('localhost', 'user', '******', 'opentutorials');
  settype($_POST['id'], 'integer');
  $filtered = array (
    'title'=>mysqli_real_escape_string($mysqli, $_POST['title']),
    'description'=>mysqli_real_escape_string($mysqli, $_POST['description']),
    'id'=>mysqli_real_escape_string($mysqli, $_POST['id'])
  );

  $sql = "
    UPDATE topic
    SET title = '{$filtered['title']}', description = '{$filtered['description']}'
    WHERE id = '{$filtered['id']}'";
  $result = mysqli_multi_query($mysqli, $sql);
  if($result === false) {
    echo "수정하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.";
    error_log(mysqli_error($mysqli));
  } else {
    echo '성공했습니다. <a href="index.php">돌아가기</a>';
  }
?>
