<?php echo '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'; ?>
<rss version="2.0" xmlns:media="http://search.yahoo.com/mrss/" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>

<title><![CDATA[<?php echo settings('site_title'); ?>]]></title>
<link><![CDATA[<?php echo abs_uri(''); ?>]]></link>
<description><![CDATA[<?php echo settings('description'); ?>]]></description>
		
	<?php
		while($item = loop_items()):
           if (item_has_files()): 
		while(loop_files_for_item($item)):
	        $file = get_current_file();
	        if ($file->hasThumbnail()):
	?>

	<item>
		<title><![CDATA[<?php echo item('Dublin Core', 'Title'); ?>]]></title>
		<media:description><![CDATA[<?php echo item('Dublin Core', 'Description'); ?>]]></media:description>
		<link><?php echo abs_item_uri(); ?></link>
		<guid><?php echo $file->getWebPath('thumbnail'); ?></guid>
		<media:thumbnail url="<?php echo $file->getWebPath('thumbnail'); ?>"/>
		<media:content url="<?php echo $file->getWebPath('fullsize'); ?>" type="<?php echo $file->mime_browser; ?>"/>
	</item>
		<?php endif; endwhile;?>
	<?php endif; endwhile;?>
</channel>
</rss>