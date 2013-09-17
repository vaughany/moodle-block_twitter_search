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
// Copyright Kevin Hughes 2011.

class block_twitter_search_edit_form extends block_edit_form {

    protected function specific_definition($mform) {
        $mform->addElement('header', 'configheader', get_string('blocksettings', 'block'));

        $mform->addElement('text', 'config_title_block', get_string('title_block', 'block_twitter_search'));
        $mform->setType('config_title_block', PARAM_MULTILANG);

        $mform->addElement('text', 'config_search_term', get_string('search_term', 'block_twitter_search'));
        $mform->setDefault('config_search_term', '#moodle');
        $mform->setType('config_search_term', PARAM_MULTILANG);

        $mform->addElement('select', 'config_numtweets', get_string('numtweets', 'block_twitter_search'),
            array(1 => 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 15 => 15, 20 =>20, 25 => 25, 30 => 30, 40 => 40, 50 => 50));
        $mform->setDefault('config_numtweets', 5);
        $mform->setType('config_numtweets', PARAM_INT);

        // New option: tweet types.
        $mform->addElement('select', 'config_tweettype', get_string('tweettype', 'block_twitter_search'),
            array('mixed' => 'Mixed', 'recent' => 'Recent', 'popular' => 'Popular'));
        $mform->setDefault('config_tweettype', 'recent');
        $mform->setType('config_tweettype', PARAM_MULTILANG);

        $mform->addElement('advcheckbox', 'config_show_usernames', get_string('show_usernames', 'block_twitter_search'));
        $mform->setDefault('config_show_usernames', true);
        $mform->setType('config_show_usernames', PARAM_BOOL);

        $mform->addElement('advcheckbox', 'config_show_names', get_string('show_names', 'block_twitter_search'));
        $mform->setDefault('config_show_names', true);
        $mform->setType('config_show_names', PARAM_BOOL);

        $mform->addElement('advcheckbox', 'config_show_images', get_string('show_images', 'block_twitter_search'));
        $mform->setDefault('config_show_images', true);
        $mform->setType('config_show_images', PARAM_BOOL);

        $mform->addElement('advcheckbox', 'config_expand_img_links', get_string('expand_img_links', 'block_twitter_search'));
        $mform->setDefault('config_expand_img_links', true);
        $mform->setType('config_expand_img_links', PARAM_BOOL);

        $mform->addElement('advcheckbox', 'config_show_update', get_string('show_update', 'block_twitter_search'));
        $mform->setDefault('config_show_update', true);
        $mform->setType('config_show_update', PARAM_BOOL);
    }
}
