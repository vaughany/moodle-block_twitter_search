<?php
 
class block_twitter_search_edit_form extends block_edit_form {
  
  protected function specific_definition($mform) {
    $mform->addElement('header', 'configheader', get_string('blocksettings', 'block'));
    $mform->addElement('text', 'config_search_term', get_string('search_term', 'block_twitter_search'));
    $mform->setDefault('config_search_term', '#cheese');
    $mform->setType('config_search_term', PARAM_MULTILANG); 
  }
}
?>
