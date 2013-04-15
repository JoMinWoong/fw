<?php
echo "<h1>top</h1>";
$m_path =& getClass('path','module');
echo '<ul><li><a href="'.$m_path->currentURL().'?tmp1&c=news&article=news_articles" target="self">to tmp1 product</a></li>';
echo '<li><a href="'.$m_path->currentURL().'?tmp3&c=product2&article=news_articles" target="self">to tmp3 product</a></li></ul>';