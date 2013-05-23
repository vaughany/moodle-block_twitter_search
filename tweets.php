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

require_once(dirname(__FILE__).'/../../config.php');

require_login();

$PAGE->set_context($context = get_context_instance(CONTEXT_COURSE, $COURSE->id));

$search_term = $_GET['q'];
$search_term_enc = urlencode($search_term);
$numtweets = $_GET['n'];
$url = "http://search.twitter.com/search.atom?q=$search_term_enc&rpp=$numtweets";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$xml = curl_exec($ch);
curl_close($ch);
if ($xml != false) {
    //$dom = DOMDocument::loadXML($xml);
    $dom = new DOMDocument();
    $dom->loadXML($xml);
    $tweets = $dom->getElementsByTagName('entry');
    foreach ($tweets as $tweet) {
        ?>
        <li class="tweet">
        <?php
        $author = $tweet->getElementsByTagName('author')->item(0);
        $author_img = $tweet->getElementsByTagName('link')->item(1)->attributes->getNamedItem("href")->nodeValue;
        $authorname = $author->getElementsByTagName('name')->item(0)->textContent;
        $authorlink = $author->getElementsByTagName('uri')->item(0)->textContent;
        ?>
        <img src="<?php echo $author_img; ?>" />
        <a href="$authorlink"><?php echo $authorname; ?></a>
        <?php echo format_text($tweet->getElementsByTagName('content')->item(0)->textContent, FORMAT_HTML); ?>
        </li>
        <?php
    }
} else {
    echo get_string('not_found', 'block_twitter_search');;
}
