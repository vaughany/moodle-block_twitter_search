# Twitter Search block for Moodle 2.x

This is a simple block which shows the results of a Twitter search. Any Twitter search as seen on [search.twitter.com](http://search.twitter.com) will work.  You can add multiple Twitter search blocks to a page and configure them to search for different keywords / hashtags.

More information is available at the project's GitHub page: [github.com/kevtufc/moodle-block\_twitter\_search](github.com/kevtufc/moodle-block_twitter_search)


## Recent changes

September 2013: Updated to work with the new Twitter API version 1.1 by Paul Vaughan (<paulvaughan@southdevon.ac.uk> / [github.com/vaughany](http://github.com/vaughany/) / [@sdcmoodle](http://twitter.com/sdcmoodle)).  With the introduction of the new  REST 1.1 API, Twitter searches now require authentication, whereas before, they didn't. This now requires more detailed installation and configuration on behalf of your Moodle administrator but note that this is a little long-winded, not complicated.


## Prerequisites

* Moodle 2.0 or newer.
* A Twitter account (even if unused).


## Installation

### Moodle

1. Download the Zip archive from [moodle.org/plugins](https://moodle.org/plugins/view.php?plugin=block_twitter_search) or [github.com/kevtufc](https://github.com/kevtufc/moodle-block_twitter_search), or clone the repository from GitHub.  (Note that Zips downloaded from GitHub have extra characters on the extracted folder's name and these will need to be removed before use.)  However you get the code, you'll need to end up with a folder called "twitter_search" in your "blocks" folder.

2. Log in to your Moodle with administration privileges and click on "Notifications". This should detect the new block and begin the installation process, as per usual.

3. As part of the installation process you will be asked for four pieces of information:
 * consumer key
 * consumer secret
 * access token
 * access token secret

    ...which can be obtained by following the "Application" procedure below.  The block will absolutely not work unless the requested information is supplied and is valid.

### Twitter account

A prerequisite of this block is a Twitter account. If you do not have one, go to [twitter.com](https://twitter.com/) and create one. You do not have to use it at all, you just need to have one.

### Application (App)

1. Open a new web browser tab. Go to [dev.twitter.com](https://dev.twitter.com/) and sign in with your Twitter account.

2. Hover over the profile image menu (top right), and click on the "My Applications" option which appears.

3. If you already have an application listed, click on the name to see the settings already set and/or edit them. If you have no apps listed, click the "Create a new application" button.

4. Complete the form:
 * __Name__: I suggest "[Your institution] Search Block". Note that you can't have the brand name 'Twitter' as part of the name.
 * __Description__: Describe what the block does.
 * __Website__: Your institution's website's full URL. I pointed ours at our Moodle installation rather than our public website.
 * __Callback URL__: leave completely blank.

5. Read the "_Developer Rules Of The Road_" and click the box to agree to be bound by them. Please note that you are agreeing to be bound by terms and conditions laid out by Twitter, not by the authors of this Moodle block.

6. Complete the CAPTCHA and click the "Create your Twitter application" button. On the page that follows, you will see information about your application, most of which you can ignore, as well as the "consumer key" and "consumer secret" strings, which you need in a moment but should always keep private.

7. Click the "Create my access token" button at the bottom of the page.

    Scroll down to the bottom of the page and if the "access token" and "access token secret" strings are not shown, press the button again after waiting a little while.

8. The page will reload and should show all four pieces of information. This is all that's required.

__Note__: The above four strings should be treated in the same way as you would treat a password: keep it secure (the twitter account you created should itself have a strong password) and disclose it to nobody else.  As the strings are required to be placed into a Moodle configuration screen, anyone else who has administrator-level privileges will be able to see them, but hopefully if they have administrator-level privileges, they're already trusted.

You can recreate your "access token" and "access token secret" strings at any time (the Twitter search block won't work until you put the new strings into it), but if the "consumer secret" becomes compromised, you'll need to delete this Application and start a new one from scratch, following the above procedure. (You don't need a whole new Twitter account, just delete your app and start a new one.)

### Moodle (continued)

9. Copy and paste the four strings exactly as they appear on the above web page into the related Moodle Twitter Search Block configuration screen, ensuring no characters are missed and no new characters are added (e.g. line breaks). Click "Save changes". Your block is now installed and configured.


## Use

1. Log in to your Moodle and go to a course, ensuring you have editing rights.

2. Turn on editing.

3. Add a new Twitter Search block.

    As default, it will search for "#moodle" and show five tweets.  It is advised to change this.

4. Click on the "configuration" icon for the block (usually a cog).

5. You have a number of options for block configuration:
 * __Visible block title__: Set a title, or leave blank for one to be automatically generated.
 * __Search term__: What to search for (see "effective searching", below).
 * __Number of tweets to show__: Choose how many tweets to show on the block. The most likely options are shown, and may be limited by other factors such as search term results or Twitter API limits (100).
 * __Mixed, Recent or Popular tweets__: from the documentation: "_Mixed: include both popular and real time results. Recent: return only the most recent results. Popular: return only the most popular results._" Default is Recent.
 * __Show @usernames__: Shows which user authored the tweet by their username.
 * __Show real names__: Shows which user authored the tweet by their real name (if available).
 * __Show user images__: Shows the profile image for the tweet's author.
 * __Expand embedded images__: If a tweet contains a link to an image, expand it to a clickable thumbnail. Default is expand.
 * __Show update link__: shows a link to reload the tweets without reloading the page.

6. Save the configuration. The block will reload with the new settings.  

7. Loading / reloading any page which has a Twitter Search block on it will refresh the search. Note that this does not always mean that the contents of the block will change.


## Effective Searching

Any search which can be typed into [search.twitter.com](http://search.twitter.com) will work here. 

* __Keywords__: any keyword typed in will work.
* __#Hashtags__: any keyword typed in following a hash # symbol is considered a hashtag and will be searched for as such. Searching for a hashtag may narrow the focus of your search but may miss casual uses of the keyword. (For example, try searching for "moodle" and "#moodle".)
* __@users__: searching for a Twitter username such as @moodler does not return tweets only from that user. Instead it will return uses of that username in tweets (e.g. replies, mentions) from other people.


## To do

This release should very much be considered a work-in-progress release, purely to get the block working with the new API. Common features such as clickable hashtags and usernames (let alone actual links) have not yet been implemented. This will come in a future release.

* Make the AJAX-refresh work properly without duplicating code.
* Add in a blacklist feature (tweets from user X, hashtag / keyword X). (In progress.)


## With thanks to

* Multilingual support and Hebrew translation by Nadav Kavalerchik.
* Catalan translation by Joan Queralt.
* Spanish translation by [Dennis Tobar](https://github.com/dennistobar).
* [Abraham Williams](https://github.com/abraham) for the '[twitteroauth](https://github.com/abraham/twitteroauth)' Twitter API PHP library.


## Releases

__2013-09-17__: v0.4.2 (beta). Added in clickable #hashtags, @usernames, links and 'media links' (e.g. images hosted at pic.twitter.com) following the same patterns as Twitter itself. Embedded images now expand into clickable thumbnail links, or not (on by default).

__2013-09-16__: v0.3 (beta). Updated to work with Twitter's new REST 1.1 API. Some core features not yet implemented.


## Licence

Copyright &copy; 2011-2013 Kevin Hughes <kevtufc@gmail.com>. 

This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program. If not, see <http://www.gnu.org/licenses/>.
