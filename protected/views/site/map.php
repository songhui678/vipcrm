<urlset>
   <?php foreach($topics as $v){ ?>
   <url>
       <loc><?php echo $v->link; ?></loc>
       <lastmod><?php echo date('Y-m-d',$v->create_time); ?></lastmod>
       <priority>1.0</priority>
   </url>
   <?php } ?>
</urlset>