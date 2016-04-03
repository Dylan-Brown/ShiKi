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



