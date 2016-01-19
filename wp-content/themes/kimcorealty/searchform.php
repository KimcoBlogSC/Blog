<form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
<input type="submit" class="search_submit" name="Submit" value="" />
<input class="search_field" type="text" value="<?php if(trim(wp_specialchars($s,1))!='') echo trim(wp_specialchars($s,1));else echo ' ';?>" name="s" id="s" title="Search" />
</form>