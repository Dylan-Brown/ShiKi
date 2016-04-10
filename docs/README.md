# ShiKi

ShiKi is a web app designed to take recommendations from the crowd for outfits based on the weather. Outfits are tagged based on the weather conditions in which they would best be worn. Outfits that are recommended are tagged with relevant information and rated by the crowd.

**Recommendation**

This part of the project has two main components.

1. The first page that you go to, when you click "Recommendation" on the home screen, will let you upload urls or png of pictures from the web or from personal device to Shiki. Shiki will have to save all these pictures. Once you have uploaded all the pictures that you’d like, you click submit.

2. Now, you are asked to update tags for each of these pictures. You are allowed to create your own tag. You will have to atleast have 3 tags per picture, otherwise, Shiki will not let you proceed (will not save any information regarding those pictures).

**Rating**

For the rating section of this project, we hope to design a simple user interface where, given a tag and a set of outfits, we allow a user to rank the three outfits. This will require us to determine a system for choosing which outfits we rate and how we determine which outfits are highest rated. These ratings will be aggregated internally for later use and retrieval in the Results section. We also will need to support an option for users to report images that are deemed inappropriate that were not caught by our quality control module so that we avoid non-intended use of our app.

**Results**

For the results part of this project there are two main components. Since we use a tagging system when people submit recommended outfits we can use the same system to search. Now one major component here is to (1) implement a searching functionality and (2) display either all or a certain amount of valid outfits. The other component of this site allows people to get inspiration on how to plan their weekly outfits ahead of time so there is a weather forecast functionality and there are appropriate outfits (as determined by the crowd) shown for that day. This part requires us to get a weather api working and the front of this requires us to search and show the correct images for each weather and their respective outfits.

**Project Milestones and Points**

Milestone - Points

Getting familiar with java-based web development, writing a homepage - 1

Recommendation page - 1

Tagging system & database for images, tags, etc. - 3

Rating page - 1

Rating system (backend) - 1

Search page - 1

Search functionality (backend) - 1

Interfacing with the related APIs - 2

Using MTurk to get people to help rate - 1

Log in - 1

Using sentiment analysis to prevent URL submissions from adult sites - 2

**Data**

The format of our input data is stored as a series of CSV sheets, with the URLS of specific images on the left and ratings in the center, with their aggregate average on the right. The input file is overwritten by the program and becomes the output file. Additional new URLS and ratings would be placed in additional rows beneath the already existing data for each CSV, where a single  sheet represents a single tag. Currently, our data folder contains a sample sheet containing individual and average ratings based on tags for images.

**How It Works**

The CSVParser class will be used to read in information about given images and their relevant tags, as well as the ratings assigned to those images. Our Recommendation class will determine if a specific image or outfit is related to a given tag and then return any relevant information that later will be used to display that information to the user. Quality control and aggregation in our project are implemented mainly in the same manner; outfits rated by the crowd, especially those seen by large numbers of people, will not have their ratings significantly impacted by extreme opinions (or spammed ratings). The rating, averaged over all user's rating of an outfit for a tag, will then stay as close as possible to the population's mean opinion on the image, assuming sufficiently large amounts of input.

**Where Everything Is**

All of our source code for both the aggregation and quality control modules are in our /src folder. Our example input/output is in the /data folder, and mock-ups of the finished product are in our /doc folder. 

**Improvements to Come**

In the future, we plan to write another Java class, the CSVWriter, to write out our data in the form of a CSV file. Additionally, to prevent images with irrelevant or adult content from being uploaded to our site, we plan on utilizing the Alchemy API's sentiment analysis calls to determine if the site from which the image came has a high level of relevance to our site's purpose. This can further be done by potentially working with image recognition API's that would provide an extra net of protection against the abuse of our site's intended purpose, as well as an ability to report images which the site moderators can manually make judgements on.  
