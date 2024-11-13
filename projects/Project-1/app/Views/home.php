<?php $this->view('includes/header') ?>




    <h1>Welcome to Project-1</h1>
    <p>This is the homepage.</p>

<?php
echo '<pre>';
/** @var array $rows */
print_r($rows);
/** @var array $user */
print_r($user);

?>


<?php $this->view('includes/footer') ?>
