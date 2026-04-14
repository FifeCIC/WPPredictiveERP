<?php             
/**
 * EvolveWP PredictiveERP - WordPress.org API
 *
 * Interacts with WordPress.org and fetches plugins data. 
 *
 * @author   Ryan Bayne
 * @category External
 * @package  EvolveWP PredictiveERP/WordPressAPI
 * @since    1.0.0
 */
 
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class EvolveWP_ERP_Wordpressorgapi {  

    /**
    * Query plugin data on WordPress.org
    */
    public function query_plugins( $url = 'http://api.wordpress.org/plugins/info/1.0/', $args = array() ) {
        return wp_remote_post(
            $url,
            array(
                'body' => array(
                    'action' => 'query_plugins',
                    'request' => serialize((object)$args)
                )
            )
        );    
    }

    /**
    * Query plugin data on WordPress.org. 
    */
    public function query_themes( $url = 'http://api.wordpress.org/plugins/info/1.0/', $args = array()) {
        return wp_remote_post(
            $url,
            array(
                'body' => array(
                    'action' => 'query_themes',
                    'request' => serialize((object)$args)
                )
            )
        );    
    }
       
    /**
    * Plugin properties as stored on WordPress.org
    * 
    * @version 1.2
    */
    public function plugin_properties() {              
        return array(
            'slug'              => array( 'description' => __( 'The slug of the plug-in to return the data for.', 'evolvewp-predictiveerp' ) ), 
            'author'            => array( 'description' => __( '(When the action is query_plugins). The author\'s WordPress username, to retrieve plugins by a particular author.', 'evolvewp-predictiveerp' ) ),  
            'version'           => array( 'description' => __( 'Latest plugin version.', 'evolvewp-predictiveerp' ) ),
            'author'            => array( 'description' => __( 'Author name and link to profile.', 'evolvewp-predictiveerp' ) ), 
            'requires'          => array( 'description' => __( 'The minimum WordPress version required.', 'evolvewp-predictiveerp' ) ), 
            'tested'            => array( 'description' => __( 'The latest WordPress version tested.', 'evolvewp-predictiveerp' ) ), 
            'compatibility'     => array( 'description' => __( "An array which contains an array for each version of your plug-in. This array stores the number of votes, the number of 'works' votes and this number as a percentage.", 'evolvewp-predictiveerp' ) ), 
            'downloaded'        => array( 'description' => __( 'The number of times the plugin has been downloaded.', 'evolvewp-predictiveerp' ) ), 
            'rating'            => array( 'description' => __( 'The plugins rating as percentage.', 'evolvewp-predictiveerp' ) ), 
            'num_ratings'       => array( 'description' => __( 'Number of times the plugin has been rated.', 'evolvewp-predictiveerp' ) ),
            'sections'          => array( 'description' => __( "An array with the HTML for each section on the WordPress plug-in page as values, keys can include 'description', 'installation', 'screenshots', 'changelog' and 'faq'.", 'evolvewp-predictiveerp' ) ),  
            'description'       => array( 'description' => __( 'Plugins full description, default false.', 'evolvewp-predictiveerp' ) ),
            'short_description' => array( 'description' => __( 'Plugins short description, default false.', 'evolvewp-predictiveerp' ) ), 
            'name'              => array( 'description' => __( 'Name of the plugin.', 'evolvewp-predictiveerp' ) ),
            'author_profile'    => array( 'description' => __( 'Unsure, please update. Does it return URL to authors profile or an array of the authors details?', 'evolvewp-predictiveerp' ) ), 
            'tags'              => array( 'description' => __( 'Unsure.', 'evolvewp-predictiveerp' ) ),
            'homepage'          => array( 'description' => __( 'Unsure.', 'evolvewp-predictiveerp' ) ), 
            'contributors'      => array( 'description' => __( 'Array of contributors.', 'evolvewp-predictiveerp' ) ), 
            'added'             => array( 'description' => __( 'When the plugin was added to the repository.', 'evolvewp-predictiveerp' ) ),
            'last_updated'      => array( 'description' => __( 'Unsure, please update. It may be the author stated update or the last time the repository for this plugin was updated.', 'evolvewp-predictiveerp' ) ),
        );
    }

    /**
    * Theme properties as stored on WordPress.org
    * 
    * @version 1.2
    */
    public function theme_properties() {            
        return array(
            'slug'              => array( 'description' => __( 'The slug of the theme to return the data for.', 'evolvewp-predictiveerp' ) ), 
            'browse'            => array( 'description' => __( 'Takes the values featured, new or updated.', 'evolvewp-predictiveerp' ) ), 
            'author'            => array( 'description' => __( 'The author\'s username, to retrieve themes by a particular author.', 'evolvewp-predictiveerp' ) ), 
            'tag'               => array( 'description' => __( 'An array of tags with which to retrieve themes for.', 'evolvewp-predictiveerp' ) ),  
            'search'            => array( 'description' => __( 'A search term, with which to search the repository.', 'evolvewp-predictiveerp' ) ), 
            'fields'            => array( 'description' => __( 'An array with a true or false value for each key (field). The fields that are included make up the properties of the returned object above.', 'evolvewp-predictiveerp' ) ),  
            'version'           => array( 'description' => __( 'Themes latest version.', 'evolvewp-predictiveerp' ) ), 
            'author'            => array( 'description' => __( 'Author of the theme.', 'evolvewp-predictiveerp' ) ),
            'preview_url'       => array( 'description' => __( 'URL to wp-themes.com hosted preview.', 'evolvewp-predictiveerp' ) ), 
            'screenshot_url'    => array( 'description' => __( 'URL to screenshot image.', 'evolvewp-predictiveerp' ) ), 
            'screenshot_count'  => array( 'description' => __( 'Number of screenshots the theme has.', 'evolvewp-predictiveerp' ) ), 
            'screenshots'       => array( 'description' => __( 'Array of screenshot URLs', 'evolvewp-predictiveerp' ) ), 
            'rating'            => array( 'description' => __( 'Themes rating as a percentage.', 'evolvewp-predictiveerp' ) ),
            'num_ratings'       => array( 'description' => __( 'Number of times the theme has been rated.', 'evolvewp-predictiveerp' ) ), 
            'downloaded'        => array( 'description' => __( 'Number of times the theme has been downloaded.', 'evolvewp-predictiveerp' ) ), 
            'sections'          => array( 'description' => __( 'Array of the data from each section on the plugins page.', 'evolvewp-predictiveerp' ) ),
            'description'       => array( 'description' => __( 'Description of the theme.', 'evolvewp-predictiveerp' ) ),
            'download_link'     => array( 'description' => __( 'Unsure, please update. Is it a HTML link or URL?', 'evolvewp-predictiveerp' ) ),
            'name'              => array( 'description' => __( 'Name of the theme.', 'evolvewp-predictiveerp' ) ),
            'slug'              => array( 'description' => __( 'The themes slug, may not match themes full name.', 'evolvewp-predictiveerp' ) ),
            'tags'              => array( 'description' => __( 'Theme tags as found in readme.txt', 'evolvewp-predictiveerp' ) ),
            'homepage'          => array( 'description' => __( 'Themes home page.', 'evolvewp-predictiveerp' ) ),
            'contributors'      => array( 'description' => __( 'Array of contributors.', 'evolvewp-predictiveerp' ) ),
            'last_updated'      => array( 'description' => __( 'Unsure, please update. Is it the authors stated last update month and year or is it a repository time.', 'evolvewp-predictiveerp' ) ),
        );
    }
}