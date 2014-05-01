<?php

$flash_messages = $this->flasher->get();

if ($flash_messages === NULL) return NULL;

foreach($flash_messages as $key_type => $messages) :
	foreach ($messages as $message) :?>

	<div class="flasher flasher-<?php echo $key_type ;?>">
	    <span><?php echo $message; ?></span>
	</div>

<?php
	endforeach;
endforeach;

unset($flash_messages);

$this->flasher->clear();