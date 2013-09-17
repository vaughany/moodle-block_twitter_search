<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

$string['pluginname']       = 'Twitter Search Block';
$string['twitter_search']   = 'Twitter Search';
$string['search_term']      = 'Search term';
$string['title_block']      = 'Visible block title';
$string['numtweets']        = 'Number of tweets to show';
$string['on_twitter']       = ' on Twitter';
$string['not_found']        = 'We can\'t contact Twitter, please come back later!';
$string['show_names']       = 'Show real names';
$string['show_usernames']   = 'Show @usernames';
$string['show_images']      = 'Show user images';
$string['show_update']      = 'Show update link';
$string['update']           = 'Update';
$string['expand_img_links'] = 'Expand embedded images';

$string['applicationsettings']      = 'Twitter Application Settings';
$string['applicationsettingsinfo']  = 'This twitter search block needs to be registered with Twitter <strong>by you</strong> as an application. We (the block\'s developers) cannot do this centrally for every instance of the Twitter Search Block as the Twitter API only allows 450 requests per 15 minutes per application, which would run out in seconds if this block became too popular.<br><br>Prerequisite: a <a href="http://twitter.com">Twitter</a> account! Follow instructions <a href="https://dev.twitter.com/apps/new">dev.twitter.com/apps/new</a> to register your application, generate your access tokens, then complete the form below with all the appropriate information.';
$string['consumer_key']             = 'Application\'s consumer key';
$string['consumer_secret']          = 'Application\'s consumer secret';
$string['access_token']             = 'Application\'s access token';
$string['access_token_secret']      = 'Application\'s access token secret';
$string['tweettype']                = 'Choose from Mixed, Recent (default) or Popular';
$string['error-twitterauth']        = 'Twitter authentication error. Please contact your administrator to configure this plugin.';