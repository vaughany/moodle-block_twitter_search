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

class block_twitter_search extends block_base {

    public function init() {
        $this->title = get_string('twitter_search', 'block_twitter_search');
    }

    public function get_content() {
        global $PAGE, $CFG;
        if ($this->content != null) {
            return $this->content;
        }

        $output = "";
        $search_term = (isset($this->config->search_term)) ? $this->config->search_term : '#moodle';
        $search_term_enc = urlencode($search_term);
        $numtweets = (isset($this->config->numtweets)) ? $this->config->numtweets : 5;
        $username = (isset($this->config->show_usernames)) ? $this->config->show_usernames : true;
        $realname = (isset($this->config->show_names)) ? $this->config->show_names : false;
        $image = (isset($this->config->show_images)) ? $this->config->show_images : true;
        $update = (isset($this->config->show_update)) ? $this->config->show_update : true;
        $title = (isset($this->config->title_block)) ? $this->config->title_block : false;
        $url = "http://search.twitter.com/search.atom?q=$search_term_enc&rpp=$numtweets";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $xml = curl_exec($ch);
        curl_close($ch);
        if ($xml != false) {
            $dom = new DOMDocument();
            $dom->loadXML($xml);
            $tweets = $dom->getElementsByTagName('entry');
            $output .= "<ul class='block_twitter_search_tweets'>";
            foreach ($tweets as $tweet) {
                $output .= "<li class='tweet'>";
                $author = $tweet->getElementsByTagName('author')->item(0);
                $author_img = $tweet->getElementsByTagName('link')->item(1)->attributes->getNamedItem("href")->nodeValue;
                $authorname = $author->getElementsByTagName('name')->item(0)->textContent;
                $authorlink = $author->getElementsByTagName('uri')->item(0)->textContent;
                if (($username || $realname) == false) {
                    // Do nothing!
                } else if ($username == false) {
                    // We're assuming that real name is in the las parentheses (pe: SearchMoodle (Search Moodle Extension)).
                    $authorname = substr($authorname, strrpos($authorname, '(')+1, strrpos($authorname, ')')-(strrpos($authorname, '(')+1));
                } else if ($realname == false) {
                    // We take the first part of string, before the last parentheses.
                    $authorname = substr($authorname, 0, strrpos($authorname, '('));
                }
                if ($image == true) {
                    $output .= "<img src='$author_img' />";
                }
                $output .= "<a href='$authorlink'>$authorname</a>: ";
                $output .= format_text($tweet->getElementsByTagName('content')->item(0)->textContent, FORMAT_HTML);
                $output .= "</li>";
            }
            if ($CFG->enableajax && $update) {
                $PAGE->requires->js_init_call('M.block_twitter_search.init', array($search_term_enc, $numtweets));
                $output .= "</ul><a class='block_twitter_search_refresh' href='". $CFG->wwwroot ."/blocks/twitter_search/tweets.php?q=".
                    $search_term_enc."&n=".$numtweets."' onclick='return false'>".get_string('update', 'block_twitter_search')."</a>";
            }
            $this->content = new stdClass;
            if ($title == false) {
                $this->title = $search_term . get_string('on_twitter', 'block_twitter_search');
            } else {
                $this->title = $title;
            }
            $this->content->text = $output;
        } else {
            $this->content = new stdClass;
            $this->content->text = get_string('not_found', 'block_twitter_search');
        }

    }

    public function instance_allow_config() {
        return true;
    }

    public function instance_allow_multiple() {
        return true;
    }
}
