<?php
/*
Plugin Name: WooCommerce Disqus Reviews
Plugin URI: http://git.io/vTtps/
Description: Replace the WooCommerce Reviews with Disqus.
Version: 1.0
Author: Nel Tseng
Author URI: https://cloudwp.pro/
*/

add_filter('woocommerce_product_tabs', 'cwp_custom_tab', 98);
add_filter('woocommerce_product_tabs', 'cwp_woo_disqus_tab');

function cwp_custom_tab($tabs) {
    
    unset($tabs['reviews']);
    
    return $tabs;
}

function cwp_woo_disqus_tab($tabs) {
    
    $tabs['disqus_tab'] = array('title' => __('留言') , 'priority' => 50, 'callback' => 'cwp_woo_disqus_tab_content');
    
    return $tabs;
}

function cwp_woo_disqus_tab_content() {
    
    echo '<div id="disqus_thread"></div>
    <script type="text/javascript">
      var disqus_shortname = "Your_Disqus_Shortcode";  // 替換你的 Disqus 名稱
  
      (function() {
          var dsq = document.createElement("script"); dsq.type = "text/javascript"; dsq.async = true;
          dsq.src = "//" + disqus_shortname + ".disqus.com/embed.js";
          (document.getElementsByTagName("head")[0] || document.getElementsByTagName("body")[0]).appendChild(dsq);})();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>';
}
