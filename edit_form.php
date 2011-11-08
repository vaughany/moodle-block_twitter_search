<?php
// This file is part of Twitter Search block for Moodle
//
// Twitter Search Block for Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Twitter Search Block for Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.
//
// Copyright Kevin Hughes 2011

class block_twitter_search_edit_form extends block_edit_form {

    protected function specific_definition($mform) {
        $mform->addElement('header', 'configheader', get_string('blocksettings', 'block'));
        $mform->addElement('text', 'config_search_term', get_string('search_term', 'block_twitter_search'));
        $mform->setDefault('config_search_term', '#moodle');
        $mform->setType('config_search_term', PARAM_MULTILANG); 
        $mform->addElement('select', 'config_numtweets', get_string('numtweets', 'block_twitter_search'), Range(0,20));
        $mform->setDefault('config_numtweets', 2);
        $mform->setType('config_numtweets', PARAM_INT); 
    }
}
