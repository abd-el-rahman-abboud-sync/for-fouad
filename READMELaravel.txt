
//overall notes
// Laravel is an MVC framework and you are not using the core of laravel which is models
// if you use models you will be able to use route model binding, casts, relations way easier
// in laravel there are migrations where you have schemas for your database in a way better and more readable way
// there is also seeders for inserting dummy data
// you do not have to do everything on your own 
// aka : there are 2 first party laravel packages for authentication (breeze or jetstream that you can use)
// there is also a good amount of third party packages that are nice to have: (like spatie media library)
// try to follow the latest way of doing things
// do not ever use ->get() if you are pulling a large amount of data
// it is best practice to use snake_case for database columns
// try to look for route resource and controller resource 
// try to have more simple names (related to the point above);
// there is no consistency in the way you write your code (variable names, routing, view names ...)

// nice to have 
// typehinting, return types

// suggested for reading 
// laravel official docs
// https://github.com/alexeymezenin/laravel-best-practices



TO WHOMEVER IS READING, PLEASE FOLLOW MY DOCUMENTATION TO ACHIEVE THE REQUIREMENTS;

Please Make sure to follow step by step, because we have to for better experience.


//////////////////////////////////////////////Create the database tables:


-- Table: administrators
CREATE TABLE administrators (
    IDAdmin INT AUTO_INCREMENT PRIMARY KEY,
    NameAdmin VARCHAR(255),
    EmailAdmin VARCHAR(255),
    PasswordAdmin VARCHAR(255),
    UsernameAdmin VARCHAR(255),
    AccessType VARCHAR(50),
    Status VARCHAR(50),
    CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UpdatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    LastLogin TIMESTAMP null,
    Active INT
);

-- Table: News
CREATE TABLE News (
    IDNews INT AUTO_INCREMENT PRIMARY KEY,
    TitleNews VARCHAR(255),
    ContentNews TEXT,
    ImageNews VARCHAR(255),
    CategoryNews VARCHAR(255),
    CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- Table: adminNews
CREATE TABLE adminNews (
    IDAdminNews INT AUTO_INCREMENT PRIMARY KEY,
    IDAdmin INT,
    IDNews INT,
    FOREIGN KEY (IDAdmin) REFERENCES administrators(IDAdmin),
    FOREIGN KEY (IDNews) REFERENCES News(IDNews)
);

-- Table: CategoryNews
CREATE TABLE NewsCategory (
    CategoryID INT AUTO_INCREMENT PRIMARY KEY,
    CategoryNews VARCHAR(255) NOT NULL
);




//////////////////////////////////////////////After you create all the tables, please execute these queries:

-- CategoryNews in table news foreign key CategoryID in table NewsCategory
ALTER TABLE News
MODIFY COLUMN CategoryNews INT;
ALTER TABLE News
ADD CONSTRAINT FK_CategoryID
FOREIGN KEY (CategoryNews)
REFERENCES NewsCategory(CategoryID);



INSERT INTO NewsCategory (CategoryNews) VALUES
('Politics'),
('Technology'),
('Economics'),
('Sports'),
('Health');


/////////////////Please now insert those queries

INSERT INTO News (TitleNews, ContentNews, ImageNews, CategoryNews) 
VALUES ('Government Implements New Tax Reform Bill','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','["uploads\\/1708543262_Capture.PNG"]','1');

INSERT INTO News (TitleNews, ContentNews, ImageNews, CategoryNews) 
VALUES ('Government Implements New Tax Reform Bill','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','["uploads\\/mikati.jpg"]','1');

INSERT INTO News (TitleNews, ContentNews, ImageNews, CategoryNews) 
VALUES ('Government Implements New Tax Reform Bill','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','["uploads\\/politics1.jpg"]','1');

INSERT INTO News (TitleNews, ContentNews, ImageNews, CategoryNews) 
VALUES ('Government Implements New Tax Reform Bill','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','["uploads\\/politics2.jpg"]','1');

INSERT INTO News (TitleNews, ContentNews, ImageNews, CategoryNews) 
VALUES ('Government Implements New Tax Reform Bill','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','["uploads\\/politics3.jpeg"]','1');

INSERT INTO News (TitleNews, ContentNews, ImageNews, CategoryNews) 
VALUES ('New Advancements in AI Technology', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', '["uploads\\/1708538924_xai.PNG"]', '2');

INSERT INTO News (TitleNews, ContentNews, ImageNews, CategoryNews) 
VALUES ('Central Bank Announces Interest Rate Hike', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form.', '["uploads\\/1708543301_dollar.jpeg"]', '3');

INSERT INTO News (TitleNews, ContentNews, ImageNews, CategoryNews) 
VALUES ('Underdog Team Upsets Reigning Champions in Nail-biting Soccer Match', 'All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '["uploads\\/1708543321_sports.PNG"]', '4');

INSERT INTO News (TitleNews, ContentNews, ImageNews, CategoryNews) 
VALUES ('Groundbreaking Study Reveals Surprising Benefits of Daily Walking', 'Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '["uploads\\/1708640577_health.jpeg"]', '5');







///////////////////////////Please locate to the /form to create the first admin account before executing the last queries!//////////////////////////////



INSERT INTO adminNews (IDAdmin, IDNews) 
VALUES (1, 1);

INSERT INTO adminNews (IDAdmin, IDNews) 
VALUES (1, 2);

INSERT INTO adminNews (IDAdmin, IDNews) 
VALUES (1, 3);

INSERT INTO adminNews (IDAdmin, IDNews) 
VALUES (1, 4);

INSERT INTO adminNews (IDAdmin, IDNews) 
VALUES (1, 5);

INSERT INTO adminNews (IDAdmin, IDNews) 
VALUES (1, 6);

INSERT INTO adminNews (IDAdmin, IDNews) 
VALUES (1, 7);

INSERT INTO adminNews (IDAdmin, IDNews) 
VALUES (1, 8);

INSERT INTO adminNews (IDAdmin, IDNews) 
VALUES (1, 9);



////////////////////////////////////////////////////////////////////////////////////////////////

After you create you first account login using your credentials. (if the credentials are correct you will be redirected to the dashboard page).

In the NavBar, click on the Categories drop list to check all the categories available. (They will direct you to the homepage).

In the NavBar, click on the News to either "Check News" (Will redirect you to the homepage), or "Create News" (Will redirect you to the /form2) where you can 
create a news that will uploaded and viewed by everyone.

Create Button on the top right will allow you to create more administrators, and sure you can log in using their credentials.

Action button has 2 functionality: Edit where you can edit the credentials, or delete where it hide the user and change the status in the database to 0
and if the users has the active status to 0 it wont display them in the dashboard anymore and they wont be able to log in anymore until they contact a super
admin! ( if they delete themselves they will be logged out) and the reason is to keep track which user has uploaded the news
therefore we can check and contact them.

To logout, please click on the image on the top right in the dashboard page. The user's session will end and he wont be able to browse
other pages except login and form (basic form)