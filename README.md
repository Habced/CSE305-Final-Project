# CSE305 Final Project

> Purpose: Restaurant lookup and review app.
- There will be restaurants, and people will leave reviews on the restaurants they visit. 
- Users can open their own restaurant. 
- Users can ask a question about a restaurant they want to visit. Restaurant owners and other users can leave replies.
- Users can leave a feedback/review/rating of each restaurant.
- Users can search for restaurants with filters such as: cuisine, location, highest rating.


**Group Members**

- Kyuri Kyeong: kyuri.kyeong@stonybrook.edu
- Tim (Daekyung Kim): daekyung.kim@stonybrook.edu
- Haseung Lee: haseung.lee@stonybrook.edu

**ER Diagram** 

ER_Diagrams.pdf is a MySqlWorkbench generated ER Diagram
To see before and after of normalization process: 
https://app.lucidchart.com/invitations/accept/d0879816-b16e-47de-9dee-a4961f36c69f


**Link to Hosting Url** https://cse-305-final-project.herokuapp.com/

**User Documentation**

// Hosted by Herokku.
// Assuming you've already install git cli
// Install heroku cli at https://devcenter.heroku.com/articles/heroku-cli#download-and-install
$ heroku login

// After you already did 'git init' in a new workspace
$ heroku git:remote -a cse-305-final-project

// After you've made a normal git commit
// to deploy use the following
$ git push heroku master

Hopefully no one with harmful intent tries to connect
MySql Connection Info: 
mysql://b2b72fbf85a330:81dc8793@us-cdbr-east-06.cleardb.net/heroku_6c43a54853056c9?reconnect=true
(Hostname): us-cdbr-east-06.cleardb.net
(Username): b2b72fbf85a330
(Port): 3306
(Password): Store in Vault ... ==> 81dc8793
