<?php if ($module_position == 'content_top' || $module_position == 'content_bottom'): ?>
  <?php require 'hit_content.tpl'; ?>
<?php else: ?>
  <?php require 'hit_column.tpl'; ?>
<?php endif; ?>
