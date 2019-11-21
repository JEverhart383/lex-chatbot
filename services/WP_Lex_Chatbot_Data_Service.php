<?php
class WP_Lex_Chatbot_Data_Service {
  private static $conversation_table = 'wp_lex_chatbot_messages';
  function __construct() {

  }

  public static function initialize_plugin_tables () {
    global $wpdb;
    $table_name = $wpdb->prefix . self::$conversation_table;
    $sql = "CREATE TABLE " . $table_name . " (
          id mediumint(9) NOT NULL AUTO_INCREMENT,
          conversation_id bigint NOT NULL,
          speaker VARCHAR(255) NOT NULL,
          utterance VARCHAR(255) NOT NULL,
          intent VARCHAR(255),
          PRIMARY KEY(id)

    )". $wpdb->get_charset_collate().";";

    require_once(ABSPATH. 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
  }

  public static function add_message_to_database ($message) {
    global $wpdb;
    // Replace with WPDB prepare: https://developer.wordpress.org/reference/classes/wpdb/prepare/
    $table_name = $wpdb->prefix . self::$conversation_table;
    $id = 9999;
    $speaker = "'jeff'";
    $utterance = "'Here are some other words'";
    $intent = "'Here is some other intent'";
    $sql = "INSERT INTO " . $table_name . " (
          conversation_id,
          speaker,
          utterance,
          intent
        ) VALUES (
          {$id},
          {$speaker},
          {$utterance},
          {$intent}
        );";

    require_once(ABSPATH. 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
  }

  public function get_messages_from_database () {

  }



}