# ShiKi
NETS213 ShiKi

Shiki-home.html: the homepage for ShiKi.

Shiki-rec.html: the recommendation page for outfits. Sends recommendations to Shiki-rec.php.


Shiki-rec.php: backend - receives and stores recommendations from Shiki-rec.html.

Shiki-rate.html: the rating page for outfits given a tag. Once submitted, this page refreshes with a new tag and new outfits.

Shiki-rate-get.php: receives outfit requests from Shiki-rate.html based on tags displayed.

Shiki-rate-send.php: sends outfits to Shiki-rate.html based on tag.

Shiki-search.html: searches the database for outfits results based on tag inputted. Sends a request to Shiki-search.php.

Shiki-search.php: receives requests from Shiki-search.html and sends results to Shiki-result.html.

Shiki-result.html: displays results of outfit search from Shiki-search.php.

Download all the code on the github repository and place it in one directory. Load the home file by opening it on Chrome. Each request will search through the directory and based on the call, display the appropriate pages with the appropriate information. Recommend outfits on the "Recommend" page and tag the outfits with appropriate tags. Rate outfits from 1-10 based on tags in the "Rate" page. Search for outfits by tag on the "Search" page, and results will be displayed on the "Display" page.

View the website and contribute at https://fling.seas.upenn.edu/~judyweng/cgi-bin/shiki-home.html

The protocols for the website currently are only compatible with Chrome and Firefox, but not Internet Explorer (Microsoft Edge).
