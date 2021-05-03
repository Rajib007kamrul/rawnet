<?php

if ( ! function_exists( 'jagmit_paging_nav' ) )  {

	function jagmit_paging_nav( $total_page ) {

		$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$query_args   = array();
		$url_parts    = explode( '?', $pagenum_link );

		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}

		$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

		$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

		$links = paginate_links( array(
	      'base'     	=> $pagenum_link,
	      // 'format'   	=> $format,
	      'total'    	=> $total_page,
	      'current'  	=> $paged,
	      'add_args' 	=> array_map( 'urlencode', $query_args ),
	      'type'     	=> 'array'
		 ));

		if ( $links )  { ?>
			<div class="pagination u-mt-double">
                <span> <?php esc_html_e('Page', 'rawnet' ); ?> </span>
	        	<select class="dynamic_select select u-mh-half">
		            <?php
		            	foreach ( $links as $pgl ) {
		                	if(strpos($pgl, 'class="prev') || strpos($pgl, 'class="next')){
		                    	continue;
		                	}
			                $option = str_replace('<a','<option',$pgl);
			                $option = str_replace('<span','<option id="current" selected ',$option);
			                $option = str_replace('a>','option>',$option);
			                $option = str_replace('span>','option>',$option);
			                $option = str_replace('href','value',$option);
			                $option = str_replace('current"','" id="current" selected',$option);
			                echo $option; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		            	}
		            ?>
		        </select>
		        <span>of <span> <?php echo $total_page;  // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped?> </span></span>
		    </div>
	<?php }
	}
}
?>