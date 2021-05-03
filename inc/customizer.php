<?php


class Theme_Customizer {

  	public function __construct() {
    	add_action( 'customize_register', [ $this, 'customize_register' ] );
  	}

  	public function customize_register( $wp_customize ) {

  		$wp_customize->add_section('home_section',array(
			'title'=> __('Home Settings','rawnet'),
			'priority'=>10,
		));


		$wp_customize->add_setting('capability_title', array(
		  	'default' => __('','rawnet'),
		  	'transport'=>'refresh'
		) );

		$wp_customize->add_control( 'capability_title', array(
		  	'label' => __( 'Service Title', 'rawnet' ),
		  	'section' => 'home_section',
		  	'type'=>'text'
		) );

		$wp_customize->add_setting('capability_description', array(
		  	'default' => __('','rawnet'),
		  	'transport'=>'refresh'
		) );

		$wp_customize->add_control( 'capability_description', array(
		  	'label' => __( 'Service Description','rawnet'),
		  	'section' => 'home_section',
		  	'type'=>'textarea'
		) );

		$wp_customize->add_setting('portfolio_title', array(
		  	'default' => __('','rawnet'),
		  	'transport'=>'refresh'
		) );

		$wp_customize->add_control( 'portfolio_title', array(
		  	'label' => __( 'Portfolio Title', 'rawnet' ),
		  	'section' => 'home_section',
		  	'type'=>'text'
		) );

		$wp_customize->add_setting('portfolio_description', array(
		  	'default' => __('','rawnet'),
		  	'transport'=>'refresh'
		) );

		$wp_customize->add_control( 'portfolio_description', array(
		  	'label' => __( 'Portfolio Description', 'rawnet' ),
		  	'section' => 'home_section',
		  	'type'=>'textarea'
		) );


		$wp_customize->add_section('callaction_section',array(
			'title'=> __('Call To Action Settings','rawnet'),
			'priority'=>10,
		));

		$wp_customize->add_setting('callaction_upload', array(
			'default'   => '',
			'transport' =>'postMessage'
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'callaction_upload', array(
			'label'    => __( 'Call Action Image', 'rawnet' ),
			'section'  => 'callaction_section',
			'settings' =>'callaction_upload'
		)));

		$wp_customize->add_setting('callaction_title', array(
		  	'default' => __('','rawnet'),
		  	'transport'=>'refresh'
		) );

		$wp_customize->add_control( 'callaction_title', array(
		  	'label' => __( 'Call To Action Title', 'rawnet' ),
		  	'section' => 'callaction_section',
		  	'type'=>'text'
		) );

		$pages = get_pages( array ( 'parent'  => 0 ) );
		$pages = wp_list_pluck( $pages, 'post_title', 'ID' );

		$wp_customize->add_setting('callaction_link', array(
			'default'   => '',
			'transport' =>'postMessage'
		) );

		$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'callaction_link', array(
			    'label'      => __( 'Link', '' ),
			    'description' => __( '', '' ),
			    'settings'   => 'callaction_link',
			    'priority'   => 10,
			    'section'    => 'callaction_section',
			    'type'    => 'select',
			    'choices' => $pages
			)
		) );

		/*** capability section ***/

		$wp_customize->add_section('capability_section',array(
			'title'=> __('Service Settings','rawnet'),
			'priority'=>10,
		));

		$wp_customize->add_setting('ambition_background_text', array(
		  	'default' => __('','rawnet'),
		  	'transport'=>'refresh'
		) );

		$wp_customize->add_control( 'ambition_background_text', array(
		  	'label' => __( 'Background Text', 'rawnet' ),
		  	'section' => 'capability_section',
		  	'type'=>'text'
		) );


		$wp_customize->add_setting('ambition_title', array(
		  	'default' => __('','rawnet'),
		  	'transport'=>'refresh'
		) );

		$wp_customize->add_control( 'ambition_title', array(
		  	'label' => __( 'Title', 'rawnet' ),
		  	'section' => 'capability_section',
		  	'type'=>'text'
		) );

		$wp_customize->add_setting('ambition_description', array(
		  	'default' => __('','rawnet'),
		  	'transport'=>'refresh'
		) );

		$wp_customize->add_control( 'ambition_description', array(
		  	'label' => __( 'Description', 'rawnet' ),
		  	'section' => 'capability_section',
		  	'type'=>'textarea'
		) );


		/*** capability section ***/

		$wp_customize->add_section('project_section',array(
			'title'=> __('Our Works Settings','rawnet'),
			'priority'=>10,
		));

		$wp_customize->add_setting('project_background_text', array(
		  	'default' => __('','rawnet'),
		  	'transport'=>'refresh'
		) );

		$wp_customize->add_control( 'project_background_text', array(
		  	'label' => __( 'Background Text', 'rawnet' ),
		  	'section' => 'project_section',
		  	'type'=>'text'
		) );


		$wp_customize->add_setting('project_title', array(
		  	'default' => __('','rawnet'),
		  	'transport'=>'refresh'
		) );

		$wp_customize->add_control( 'project_title', array(
		  	'label' => __( 'Title', 'rawnet' ),
		  	'section' => 'project_section',
		  	'type'=>'text'
		) );

		$wp_customize->add_setting('project_action_title', array(
		  	'default' => __('','rawnet'),
		  	'transport'=>'refresh'
		) );

		$wp_customize->add_control( 'project_action_title', array(
		  	'label' => __( 'Action Title', 'rawnet' ),
		  	'section' => 'project_section',
		  	'type'=>'text'
		) );

		$wp_customize->add_setting('project_action_link', array(
			'default'   => '',
			'transport' =>'postMessage'
		) );

		$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'project_action_link', array(
			    'label'      => __( 'Action Link', '' ),
			    'description' => __( '', '' ),
			    'settings'   => 'project_action_link',
			    'priority'   => 10,
			    'section'    => 'project_section',
			    'type'    => 'select',
			    'choices' => $pages
			)
		) );

		/*** About section ***/

		$wp_customize->add_section('about_section',array(
			'title'=> __('About Settings','rawnet'),
			'priority'=>10,
		));

		$wp_customize->add_setting('leader_title', array(
		  	'default' => __('','rawnet'),
		  	'transport'=>'refresh'
		) );

		$wp_customize->add_control( 'leader_title', array(
		  	'label' => __( 'Leadership Title', 'rawnet' ),
		  	'section' => 'about_section',
		  	'type'=>'text'
		) );

		$wp_customize->add_setting('leader_description', array(
		  	'default' => __('','rawnet'),
		  	'transport'=>'refresh'
		) );

		$wp_customize->add_control( 'leader_description', array(
		  	'label' => __( 'Leadership Description', 'rawnet' ),
		  	'section' => 'about_section',
		  	'type'=>'textarea'
		) );
  		/*** Social Media Section **/

		$wp_customize->add_section('footer_section',array(
			'title'=> __('Footer Settings','rawnet'),
			'priority'=>10,
		));

		$wp_customize->add_setting('phone_section', array(
		  	'default' => __('','rawnet'),
		  	'transport'=>'refresh'
		) );

		$wp_customize->add_control( 'phone_section', array(
		  	'label' => __( 'Phone', 'rawnet' ),
		  	'section' => 'footer_section',
		  	'type'=>'text'
		) );

		$wp_customize->add_setting('email_section', array(
		  'default' => __( '', 'rawnet' ),
		  'transport'=>'refresh'
		) );

		$wp_customize->add_control( 'email_section', array(
		  'label' => __( 'Email','rawnet' ),
		  'section' => 'footer_section',
		  'type'=>'text'
		) );


		$wp_customize->add_setting('fb_section', array(
		  'default' => __('https://www.facebook.com/',''),
		  'transport'=>'refresh'
		) );

		$wp_customize->add_control( 'fb_section', array(
		  'label' => __( 'FB Link', 'rawnet' ),
		  'section' => 'footer_section',
		  'type'=>'text'
		) );

		$wp_customize->add_setting('twitter_section', array(
		  'default' => __ ( 'https://www.google.com/', '' ),
		  'transport'=>'refresh'
		) );

		$wp_customize->add_control( 'twitter_section', array(
		  'label' => __( 'Twitter Link', 'rawnet' ),
		  'section' => 'footer_section',
		  'type'=>'text'
		) );


		$wp_customize->add_setting('instragram_section', array(
		  'default' => __('https://twitter.com/',''),
		  'transport'=>'refresh'
		) );

		$wp_customize->add_control( 'instragram_section', array(
		  'label' => __( 'Instragram Link','rawnet' ),
		  'section' => 'footer_section',
		  'type'=>'text'
		) );


		$wp_customize->add_setting('linkedin_section', array(
		  'default' => __( 'https://www.linkedin.com/', '' ),
		  'transport'=>'refresh'
		) );

		$wp_customize->add_control( 'linkedin_section', array(
		  'label' => __( 'LinkedIn Link','rawnet'),
		  'section' => 'footer_section',
		  'type'=>'text'
		) );

		$wp_customize->add_setting('copyright_section', array(
		  'default' => __( '', 'rawnet' ),
		  'transport'=>'refresh'
		) );

		$wp_customize->add_control( 'copyright_section', array(
		  'label' => __( 'Copy Right Text','rawnet' ),
		  'section' => 'footer_section',
		  'type'=>'text'
		) );

		$wp_customize->add_setting('logo_upload', array(
			'default'   => '',
			'transport' =>'postMessage'
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'logo_upload', array(
			'label'    => __( 'Logo Upload', 'rawnet' ),
			'section'  => 'title_tagline',
			'settings' =>'logo_upload'
		)));

		$wp_customize->add_setting('logo_black_upload', array(
			'default'   => '',
			'transport' =>'postMessage'
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'logo_black_upload', array(
			'label'    => __( 'Black Logo Upload', 'rawnet' ),
			'section'  => 'title_tagline',
			'settings' =>'logo_black_upload'
		)));

  	}
 }

 new Theme_Customizer();