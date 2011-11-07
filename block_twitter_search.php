<?php
class block_twitter_search extends block_base{
  public function init(){
    $this->title  = get_string('twitter_search','block_twitter_search');
  }

  public function get_content(){
    if ($this->content != null){
      return $this->content;
    }

   $output = "";

   $search_term = $this->config->search_term;
   $search_term_enc = urlencode($this->config->search_term);
   $numtweets = $this->config->numtweets;
   $url = "http://search.twitter.com/search.atom?q=$search_term_enc&rpp=$numtweets";
   $ch = curl_init($url);
   curl_setopt($ch, CURLOPT_HEADER,0);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   $xml = curl_exec($ch);
   curl_close($ch);
   $dom = DOMDocument::loadXML($xml);

   $tweets = $dom->getElementsByTagName('entry');
   foreach ($tweets as $tweet) {
     $output .= "<li class='tweet'>";
     $author = $tweet->getElementsByTagName('author')->item(0);
     $authorname = $author->getElementsByTagName('name')->item(0)->textContent;
     $authorlink = $author->getElementsByTagName('uri')->item(0)->textContent;
     $output .= "<a href='$authorlink'>$authorname</a>: ";
     $output .= format_text($tweet->getElementsByTagName('content')->item(0)->textContent,FORMAT_HTML);
     $output .= "</li>";
   }

    $this->content = new stdClass;
    $this->title = $search_term . get_string('on_twitter','block_twitter_search');
    $this->content->text = $output;
  }

  public function instance_allow_config(){
    return true;
  }
}
?>
