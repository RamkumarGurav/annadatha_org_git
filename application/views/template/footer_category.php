<?
foreach ($footer_category as $fc) {
  ?>
  <li><a href="<?php echo base_url() . $fc->slug_url ?>"><?php echo $fc->name ?></a></li>
<? } ?>