<?php echo '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'; ?>
 <rss version="2.0" xmlns:media="http://search.yahoo.com/mrss/" 
     xmlns:atom="http://www.w3.org/2005/Atom">
     <channel>
         <?php
            while($item = loop_items()):
            if (item_has_files()): 
         ?>
         <item>
             <title><?php echo item('Dublin Core', 'Title'); ?></title>
             <media:description><?php echo item('Dublin Core', 'Description'); ?></media:description>
             <link><?php echo link_to_item(); ?></link>
             <media:thumbnail url="<?php echo $item->Files[0]->getWebPath('archive'); ?>"/>
             <media:content url="<?php echo $item->Files[0]->getWebPath('archive'); ?>"/>
         </item>
            <?php endif; ?>
        <?php endwhile; ?>
     </channel>
</rss>