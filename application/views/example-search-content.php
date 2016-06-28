<?php if(empty($query)): ?>
  <p>You didn't give me a query!</p>
<?php else: ?>
  <p>You would have searched for: <strong><em><?php echo $query; ?></em></strong></p>
<?php endif ?>

<?php if(!empty($various_params)): ?>
  <br />
  <h3>Here are your extra parameters:</h3>
  <?php foreach($various_params as $key => $value): ?>
    <p><strong><?php echo $key; ?>: </strong><?php echo $value; ?></p>
<?php endforeach; endif; ?>

