<?php
echo "<h1>top</h1>";
$m_path =& getClass('path','module');
echo '<ul><li><a href="'.$m_path->currentURL().'?example&c=product2&article=news_articles" target="_self">to sample product</a></li>';
echo '<li><a href="'.$m_path->currentURL().'?tmp1&c=news&article=news_articles" target="_self">to sample product with raintpl template engine</a></li></ul>';