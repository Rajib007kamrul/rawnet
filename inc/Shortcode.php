<?php

class Theme_Shortcode {

    public function __construct() {
      // Post List
      add_shortcode( 'post_list', [ $this, 'post_list_render' ] );
      // Featured Post
      add_shortcode( 'featured_post', [ $this, 'featured_post_render' ] );
      // Post List
      add_shortcode( 'service_list', [ $this, 'service_list_render' ] );
      // Featured Service
      add_shortcode( 'featured_service', [ $this, 'featured_service_render' ] );
      // Team List
      add_shortcode( 'team_list', [ $this, 'team_list_render' ] );
      // Portfolio List
      add_shortcode( 'portfolio_list', [ $this, 'portfolio_list_render' ] );
      // Featured Portfolio
      add_shortcode( 'featured_portfolio', [ $this, 'featured_portfolio_render' ] );
    }

    public function post_list_render( $atts, $content = "" ) {
      extract( shortcode_atts( [], $atts ) );
      ob_start();
      get_template_part( 'template-parts/content', 'postele' );
      return ob_get_clean();
    }

    public function featured_post_render( $atts, $content = "" ) {
      extract( shortcode_atts( [], $atts ) );
      ob_start();
      get_template_part( 'template-parts/content', 'featuredpost' );
      return ob_get_clean();
    }

    public function service_list_render( $atts, $content = "" ) {
      extract( shortcode_atts( [], $atts ) );
      ob_start();
      get_template_part( 'template-parts/content', 'service' );
      return ob_get_clean();
    }

    public function featured_service_render( $atts, $content = "" ) {
      extract( shortcode_atts( [], $atts ) );
      ob_start();
      get_template_part( 'template-parts/content', 'featuredservice' );
      return ob_get_clean();
    }

    public function team_list_render( $atts, $content = "" ) {
      extract( shortcode_atts( [], $atts ) );
      ob_start();
      get_template_part( 'template-parts/content', 'team' );
      return ob_get_clean();
    }

    public function portfolio_list_render( $atts, $content = "" ) {
      extract( shortcode_atts( [], $atts ) );
      ob_start();
      get_template_part( 'template-parts/content', 'portfolio' );
      return ob_get_clean();
    }

    public function featured_portfolio_render( $atts, $content = "" ) {
      extract( shortcode_atts( [], $atts ) );
      ob_start();
      get_template_part( 'template-parts/content', 'featuredportfolio' );
      return ob_get_clean();
    }
}

new Theme_Shortcode();