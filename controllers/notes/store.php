<?php

  use Core\Validator;
  use Core\Database;
  use Core\Response;

  $config = require base_path('config.php');
  $db = new Database($config['database']);
  $currentUserId = Response::CURRENT_USER_ID;

  $errors = [];

  if (! Validator::string($_POST['body'], 1, 1000)) {
      $errors['body'] = 'A body of no more than 1,000 characters is required.';
  }

  if (empty($errors)) {
      $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
          'body' => $_POST['body'],
          'user_id' => $currentUserId
      ]);

      header('location: /notes');
      die();
  }

?>