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
// Copyright Paul Vaughan 2013.

$settings->add(new admin_setting_heading(
    'block_twitter_search_header',
    get_string('applicationsettings', 'block_twitter_search'),
    get_string('applicationsettingsinfo', 'block_twitter_search'),
    null
));

$settings->add(new admin_setting_configtext(
    'block_twitter_search_consumer_key',
    get_string('consumer_key', 'block_twitter_search'),
    null,
    null
));

$settings->add(new admin_setting_configtext(
    'block_twitter_search_consumer_secret',
    get_string('consumer_secret', 'block_twitter_search'),
    null,
    null
));

$settings->add(new admin_setting_configtext(
    'block_twitter_search_access_token',
    get_string('access_token', 'block_twitter_search'),
    null,
    null
));

$settings->add(new admin_setting_configtext(
    'block_twitter_search_access_token_secret',
    get_string('access_token_secret', 'block_twitter_search'),
    null,
    null
));
