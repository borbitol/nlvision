<!--<?php if (count($languages) > 1) { ?>
<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
  <div id="language"><?php echo $text_language; ?>
    <?php foreach ($languages as $language) { ?>
    <img src="image/flags/<?php echo $language['image']; ?>" alt="<?php echo $language['name']; ?>" title="<?php echo $language['name']; ?>" onclick="$('input[name=\'language_code\']').attr('value', '<?php echo $language['code']; ?>'); $(this).parent().parent().submit();" />
    <?php } ?>
    <input type="hidden" name="language_code" value="" />
    <input type="hidden" name="redirect" value="<?php echo $redirect; ?>" />
  </div>
</form>
<?php } ?>-->

<?php if (count($languages) > 1) { ?>

  <div class="header_top_language-picker">
		<button class="curr_lang_code"><?php echo $language_code; ?></button>
		<button></button>
		<ul class="language_dropdown-menu">
			<?php foreach ($languages as $language) if($language['code'] != $language_code){ ?>
			<li><a href="#"><?php echo $language['code']; ?></a></li>
			<?php } ?>
		</ul>
	<form id="lang_form" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
		<input type="hidden" name="language_code" value="" />
		<input type="hidden" name="redirect" value="<?php echo $redirect; ?>" />
	</form>
	</div>

<?php } ?>

