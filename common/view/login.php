<?php
echo "<h1>top</h1>";
$m_path =& getClass('path','module');
print_vd($m_path->currentURL());