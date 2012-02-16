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

class block_twitter_search extends block_base{
    public function init() {
        $this->title = get_string('twitter_search', 'block_twitter_search');
    }

    public function get_content(){
        global $PAGE;
        if ($this->content != null){
            return $this->content;
        }

        $output = "";
        $search_term = (isset($this->config->search_term)) ? $this->config->search_term : '#twitter';
        $search_term_enc = urlencode($search_term);
        $numtweets = (isset($this->config->numtweets)) ? $this->config->numtweets : 5;
        $url = "http://search.twitter.com/search.atom?q=$search_term_enc&rpp=$numtweets";
        $PAGE->requires->js_init_call('M.block_twitter_search.init',array($search_term_enc,$numtweets));
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $xml = curl_exec($ch);
        curl_close($ch);
        if ($xml != false) {
            $dom = DOMDocument::loadXML($xml);
            $tweets = $dom->getElementsByTagName('entry');
            $output .= "<ul class='block_twitter_search_tweets'>";
            foreach ($tweets as $tweet) {
                $output .= "<li class='tweet'>";
                $author = $tweet->getElementsByTagName('author')->item(0);
                $author_img = $tweet->getElementsByTagName('link')->item(1)->attributes->getNamedItem("href")->nodeValue;
                $authorname = $author->getElementsByTagName('name')->item(0)->textContent;
                $authorlink = $author->getElementsByTagName('uri')->item(0)->textContent;
                $output .= "<img src='$author_img' />";
                $output .= "<a href='$authorlink'>$authorname</a>: ";
                $output .= format_text($tweet->getElementsByTagName('content')->item(0)->textContent, FORMAT_HTML);
                $output .= "</li>";
            }
            $output .= "</ul><a class='block_twitter_search_refresh' href='/blocks/twitter_search/tweets.php?q=".$search_term_enc."&n=".$numtweets."' onclick='return false'>update</a>";
            $this->content = new stdClass;
            $this->title = $search_term . get_string('on_twitter', 'block_twitter_search');
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
