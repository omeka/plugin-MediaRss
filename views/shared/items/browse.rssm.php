<?php echo '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'; ?>
 <rss version="2.0" xmlns:media="http://search.yahoo.com/mrss/" 
     xmlns:atom="http://www.w3.org/2005/Atom">
     <channel>
         <?php
            while($item = loop_items()):
            if (item_has_files()): 
			while(loop_files_for_item($item)):
		        $file = get_current_file();
		        if ($file->hasThumbnail()):
         ?>
         <item>
             <title><?php echo item('Dublin Core', 'Title'); ?></title>
             <media:description><?php echo item('Dublin Core', 'Description'); ?></media:description>
             <link><?php echo item_uri(); ?></link>
             <media:thumbnail url="<?php echo $file->getWebPath('thumbnail'); ?>"/>
             <media:content url="<?php echo $file->getWebPath('fullsize'); ?>"/>
         </item>
            <?php endif; endwhile;?>
        <?php endif; endwhile; ?>
     </channel>
</rss>