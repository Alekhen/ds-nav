<?php

$nav_collapsed = false;
//$nav_collapsed = ( !empty( $Route->query['nav'] ) && $Route->query['nav'] === '1' ) ? true : false;

?>
      </div><!--#main-->

    </div><!--#content-container-->

  </section><!--#content-->

</div><!--#page-->

<div id="tooltip" class="text-tooltip">Search</div>
<div id="browser-size" class="text-subheading"></div>
<div id="overlay" class="<?= !$nav_collapsed ? 'active' : '' ?>"></div>

<script src="<?= APP_URL ?>/js/ds-nav.js"></script>

</body>
