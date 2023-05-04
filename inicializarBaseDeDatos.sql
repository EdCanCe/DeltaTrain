create Database DeltaTrain;
use DeltaTrain;

create table User(
    ID_User bigint NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Password_User varchar(220) NOT NULL,
    Name_User varchar(25) NOT NULL,
    LastName_User varchar(60),
    BirthDate_User date NOT NULL,
    Username_User varchar(20) NOT NULL,
    Administrator_User tinyint NOT NULL,
    Description_User varchar(250)
);

create table Routine(
    ID_Routine bigint NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FKID_User_Routine bigint NOT NULL,
    CONSTRAINT FKID_User_Routine FOREIGN KEY (FKID_User_Routine) REFERENCES User(ID_User),
    Name_Routine varchar(30) NOT NULL
);

create table Exercise(
    ID_Exercise bigint NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Name_Exercise varchar(30) NOT NULL,
    Description_Exercise text(500) NOT NULL
);

create table RoutineExercise (
    ID_RoutineExercise bigint NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FKID_Routine_RoutineExercise bigint NOT NULL,
    CONSTRAINT FKID_Routine_RoutineExercise FOREIGN KEY (FKID_Routine_RoutineExercise) REFERENCES Routine(ID_Routine),
    FK_Exercise_RoutineExercise bigint NOT NULL,
    CONSTRAINT FK_Exercise_RoutineExercise FOREIGN KEY (FK_Exercise_RoutineExercise) REFERENCES Exercise(ID_Exercise)
);

create table Recipe(
    ID_Recipe bigint NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FKID_User_Recipe bigint NOT NULL,
    CONSTRAINT FKID_User_Recipe FOREIGN KEY (FKID_User_Recipe) REFERENCES User(ID_User),
    Name_Recipe varchar(30) NOT NULL,
    Preparation_Recipe text(1000) NOT NULL,
    Portions_Recipe varchar(100) NOT NULL
);

create table Ingredient(
    ID_Ingredient bigint NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Name_Ingredient varchar(30) NOT NULL
);

create table RecipeIngredient(
    ID_RecipeIngredient bigint NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FKID_Recipe_RecipeIngredient bigint NOT NULL,
    CONSTRAINT FKID_Recipe_RecipeIngredient FOREIGN KEY (FKID_Recipe_RecipeIngredient) REFERENCES Recipe(ID_Recipe),
    FKID_Ingredient_RecipeIngredient bigint NOT NULL,
    CONSTRAINT FKID_Ingredient_RecipeIngredient FOREIGN KEY (FKID_Ingredient_RecipeIngredient) REFERENCES Ingredient(ID_Ingredient)
);

create table Follow(
    ID_Follow bigint NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FKID_UserA_Follow bigint NOT NULL,
    CONSTRAINT FKID_UserA_Follow FOREIGN KEY (FKID_UserA_Follow) REFERENCES User(ID_User),
    FKID_UserB_Follow bigint NOT NULL,
    CONSTRAINT FKID_UserB_Follow FOREIGN KEY (FKID_UserB_Follow) REFERENCES User(ID_User)
);

create table UserActivity(
    ID_UserActivity bigint NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FKID_Routine_UserActivity bigint,
    CONSTRAINT FKID_Routine_UserActivity FOREIGN KEY (FKID_Routine_UserActivity) REFERENCES Routine(ID_Routine),
    FKID_Recipe_UserActivity bigint,
    CONSTRAINT FKID_Recipe_UserActivity FOREIGN KEY (FKID_Recipe_UserActivity) REFERENCES Recipe(ID_Recipe),
    Type_UserActivity tinyint NOT NULL,
    Visibility tinyint NOT NULL
);

create table Post(
    ID_Post bigint NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FKID_UserActivity_Post bigint,
    CONSTRAINT FKID_UserActivity_Post FOREIGN KEY (FKID_UserActivity_Post) REFERENCES UserActivity(ID_UserActivity),
    FKID_User_Post bigint NOT NULL,
    CONSTRAINT FKID_User_Post FOREIGN KEY (FKID_User_Post) REFERENCES User(ID_User),
    FKID_Post_Post bigint,
    CONSTRAINT FKID_Post_Post FOREIGN KEY (FKID_Post_Post) REFERENCES Post(ID_Post),
    Info_Post text(500) NOT NULL,
    Date_Post timestamp NOT NULL
);

create table LikedPost(
    ID_LikedPost bigint NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FKID_User_LikedPost bigint NOT NULL,
    CONSTRAINT FKID_User_LikedPost FOREIGN KEY (FKID_User_LikedPost) REFERENCES User(ID_User),
    FKID_Post_LikedPost bigint NOT NULL,
    CONSTRAINT FKID_Post_LikedPost FOREIGN KEY (FKID_Post_LikedPost) REFERENCES Post(ID_Post)
);

create table Visuals(
    ID_Visuals bigint NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FKID_UserActivity_Visuals bigint NOT NULL,
    CONSTRAINT FKID_UserActivity_Visuals FOREIGN KEY (FKID_UserActivity_Visuals) REFERENCES UserActivity(ID_UserActivity),
    Info_Visuals longblob NOT NULL
);

ALTER TABLE User
ADD Pfp_User longblob;

ALTER TABLE User
ADD Banner_User longblob;

ALTER TABLE Post
ADD Media_Post longblob;

ALTER TABLE Post
ADD MediaType_Post tinyint;

ALTER TABLE User
ADD Color_User tinyint DEFAULT 0;

create table NONUSABLE(
    Word_NONUSABLE varchar(60)
);

CREATE TABLE Changes(
    ID_Changes INT(11) NOT NULL AUTO_INCREMENT,
    User_Changes VARCHAR(50) NOT NULL,
    Table_Changes VARCHAR(50) NOT NULL,
    Time_Changes DATETIME,
    Description_Changes VARCHAR(255) NOT NULL,
    PRIMARY KEY (ID_Changes)
);

DELIMITER $$
CREATE TRIGGER userCreate AFTER INSERT on User FOR EACH row BEGIN
INSERT INTO Changes (User_Changes, Table_Changes, Description_Changes, Time_Changes)
    VALUES (USER(), EVENT_OBJECT_TABLE(), CONCAT('Creación de cuenta del usuario con ID ', NEW.ID_User), NOW());
END $$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER postCreate AFTER INSERT on Post FOR EACH row BEGIN
INSERT INTO Changes (User_Changes, Table_Changes, Description_Changes, Time_Changes)
    VALUES (USER(), EVENT_OBJECT_TABLE(), CONCAT('Se creó el post con ID ', NEW.ID_Post, ', lo creó el usuario con ID ', NEW.FKID_User_Post), NOW());
END $$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER followDone AFTER INSERT on Follow FOR EACH row BEGIN
INSERT INTO Changes (User_Changes, Table_Changes, Description_Changes, Time_Changes)
    VALUES (USER(), EVENT_OBJECT_TABLE(), CONCAT('El usuario con ID ', NEW.FKID_UserA_Follow, ' ahora sigue al usuario con ID ', NEW.FKID_UserB_Follow), NOW());
END $$
DELIMITER ;