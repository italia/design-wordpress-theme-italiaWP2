<?php
/**
 * Theme Update Checker Library 1.2 (Patched for PHP 8+ & SQLite Dev Environments)
 * http://w-shadow.com/
 * 
 * Copyright 2012 Janis Elsts
 * Licensed under the GNU GPL license.
 * http://www.gnu.org/licenses/gpl.html
 */

if ( !class_exists('ThemeUpdateChecker') ):
  
/**
 * A custom theme update checker. 
 * 
 * @author Janis Elsts
 * @copyright 2012
 * @version 1.2
 * @access public
 */
class ThemeUpdateChecker {
  public $theme = '';              //The theme associated with this update checker instance.
  public $metadataUrl = '';        //The URL of the theme's metadata file.
  public $enableAutomaticChecking = true; //Enable/disable automatic update checks.
  
  protected $optionName = '';      //Where to store update info.
  protected $automaticCheckDone = false;
  protected static $filterPrefix = 'tuc_request_update_';
                                   
  /**
   * Class constructor.
   *
   * @param string $theme Theme slug, e.g. "twentyten".
   * @param string $metadataUrl The URL of the theme metadata file.
   * @param boolean $enableAutomaticChecking Enable/disable automatic update checking.
   */
  public function __construct($theme, $metadataUrl, $enableAutomaticChecking = true){
    $this->metadataUrl = $metadataUrl;
    $this->enableAutomaticChecking = $enableAutomaticChecking;
    $this->theme = $theme;
    $this->optionName = 'external_theme_updates-'.$this->theme;
    
    $this->installHooks();    
  }
  
  /**
   * Install the hooks required to run periodic update checks and inject update info 
   * into WP data structures.
   * 
   * @return void
   */
  public function installHooks(){
    if ( $this->enableAutomaticChecking ){
      add_filter('pre_set_site_transient_update_themes', array($this, 'onTransientUpdate'));
    }
    
    add_filter('site_transient_update_themes', array($this,'injectUpdate')); 
    add_action('delete_site_transient_update_themes', array($this, 'deleteStoredData'));
  }
  
  /**
   * Retrieve update info from the configured metadata URL.
   * 
   * @param array $queryArgs
   * @return ThemeUpdate|null 
   */
  public function requestUpdate($queryArgs = array()){
    $queryArgs['installed_version'] = $this->getInstalledVersion(); 
    $queryArgs = apply_filters(self::$filterPrefix.'query_args-'.$this->theme, $queryArgs);
    
    $options = array(
      'timeout' => 10,
    );
    $options = apply_filters(self::$filterPrefix.'options-'.$this->theme, $options);
    
    $url = $this->metadataUrl; 
    if ( !empty($queryArgs) ){
      $url = add_query_arg($queryArgs, $url);
    }
    
    $result = wp_remote_get($url, $options);
    
    if ( is_wp_error( $result ) ) {
      return null;
    }
    
    $themeUpdate = null;
    $code = wp_remote_retrieve_response_code($result);
    $body = wp_remote_retrieve_body($result);
    if ( ($code == 200) && !empty($body) ){
      $themeUpdate = ThemeUpdate::fromJson($body);
      if ( ($themeUpdate != null) && version_compare($themeUpdate->version, $this->getInstalledVersion(), '<=') ){
        $themeUpdate = null;
      }
    }
    
    $themeUpdate = apply_filters(self::$filterPrefix.'result-'.$this->theme, $themeUpdate, $result);
    return $themeUpdate;
  }
  
  /**
   * Get the currently installed version of our theme.
   * 
   * @return string Version number.
   */
  public function getInstalledVersion(){
    if ( function_exists('wp_get_theme') ) {
      $theme = wp_get_theme($this->theme);
      if ( is_object( $theme ) && method_exists( $theme, 'get' ) ) {
        return $theme->get('Version');
      }
    }
    return '1.0.0';
  }
  
  /**
   * Check for theme updates. 
   * 
   * @return void
   */
  public function checkForUpdates(){
    $state = get_option($this->optionName);
    if ( empty($state) || !is_object($state) ){
      $state = new StdClass;
      $state->lastCheck = 0;
      $state->checkedVersion = '';
      $state->update = null;
    }
    
    $state->lastCheck = time();
    $state->checkedVersion = $this->getInstalledVersion();
    
    $state->update = $this->requestUpdate();
    update_option($this->optionName, $state);
  }
  
  /**
   * Run the automatic update check. 
   * 
   * @param mixed $value
   * @return mixed
   */
  public function onTransientUpdate($value){
    if ( !$this->automaticCheckDone ){
      $this->automaticCheckDone = true;
      // Previene errori bloccanti se la query fallisce o è in dev locale
      if ( is_object( $value ) ) {
        $this->checkForUpdates();
      }
    }
    return $value;
  }

  /**
   * Insert the latest update (if any) into the update list maintained by WP.
   * 
   * @param mixed $updates Update list.
   * @return mixed Modified update list.
   */
  public function injectUpdate($updates){
    if ( ! is_object( $updates ) ) {
      return $updates;
    }

    $state = get_option($this->optionName);
    
    if ( !empty($state) && is_object($state) && isset($state->update) && !empty($state->update) ){
      if ( ! isset( $updates->response ) || ! is_array( $updates->response ) ) {
        $updates->response = array();
      }
      if ( is_object($state->update) && method_exists($state->update, 'toWpFormat') ) {
        $updates->response[$this->theme] = $state->update->toWpFormat();
      }
    }
    
    return $updates;
  }
  
  /**
   * Delete any stored book-keeping data.
   * 
   * @return void
   */
  public function deleteStoredData(){
    delete_option($this->optionName);
  } 
  
  public function addQueryArgFilter($callback){
    add_filter(self::$filterPrefix.'query_args-'.$this->theme, $callback);
  }
  
  public function addHttpRequestArgFilter($callback){
    add_filter(self::$filterPrefix.'options-'.$this->theme, $callback);
  }
  
  public function addResultFilter($callback){
    add_filter(self::$filterPrefix.'result-'.$this->theme, $callback, 10, 2);
  }
}
  
endif;

if ( !class_exists('ThemeUpdate') ):

class ThemeUpdate {
  public $version;
  public $details_url;
  public $download_url;
  
  public static function fromJson($json){
    $apiResponse = json_decode($json);
    if ( empty($apiResponse) || !is_object($apiResponse) ){
      return null;
    }
    
    $valid = isset($apiResponse->version) && !empty($apiResponse->version) && isset($apiResponse->details_url) && !empty($apiResponse->details_url);
    if ( !$valid ){
      return null;
    }
    
    $update = new self();
    foreach(get_object_vars($apiResponse) as $key => $value){
      $update->$key = $value;
    }
    
    return $update;
  }
  
  public function toWpFormat(){
    $update = array(
      'new_version' => $this->version,
      'url' => $this->details_url,
    );
    
    if ( !empty($this->download_url) ){
      $update['package'] = $this->download_url;
    }
    
    return $update;
  }
}
  
endif;