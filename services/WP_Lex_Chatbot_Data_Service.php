<?php

class WP_Lex_Chatbot_Data_Service {
  private $conversation_table;
  private $charset_collate;
  function __construct() {
    global $wpdb;
    $this->conversation_table = $wpdb->prefix . 'wp_lex_chatbot_messages';
    $this->charset_collate = $wpdb->get_charset_collate();
  }
  public function register_database_tables ($file) {
    register_activation_hook($file, array($this, 'initialize_plugin_tables'));
  }
  public function initialize_plugin_tables () {
    global $wpdb;

    $sql = "CREATE TABLE" .$this->conversation_table."(
          id mediumint(9) NOT NULL AUTO_INCREMENT,
          conversation_id bigint NOT NULL,
          speaker VARCHAR NOT NULL,
          utterance VARCHAR NOT NULL,
          intent,

    )". $this->charset_collate.";";

    require_once(ABSPATH. 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
  }

  public function add_message_to_database ($message) {

  }

  public function get_messages_from_database () {

  }



}