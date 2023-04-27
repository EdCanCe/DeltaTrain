create Database DeltaTrain;
use DeltaTrain;

create table User(
    ID_User bigint NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Password_User varchar(220) NOT NULL,
    Name_User varchar(25) NOT NULL,
    LastName_User varchar(60),
    BirthDate_User date NOT NULL,
    Mail_User varchar(70) NOT NULL,
    Username_User varchar(20) NOT NULL,
    Administrator_User tinyint NOT NULL,
    Description_User varchar(250)
);

create table Progress(
    ID_Progress bigint NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FKID_User_Progress bigint NOT NULL,
    CONSTRAINT FKID_User_Progress FOREIGN KEY (FKID_User_Progress) REFERENCES User(ID_User)
);

create table Activity(
    ID_Activity bigint NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FKID_Progress_Activity bigint NOT NULL,
    CONSTRAINT FKID_Progress_Activity FOREIGN KEY (FKID_Progress_Activity) REFERENCES Progress(ID_Progress),
    Name_Activity varchar(30) NOT NULL
);

create table DailyActivities(
    ID_DailyActivities bigint NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FKID_Progress_DailyActivities bigint NOT NULL,
    CONSTRAINT FKID_Progress_DailyActivities FOREIGN KEY (FKID_Progress_DailyActivities) REFERENCES Progress(ID_Progress),
    FKID_Activity_DailyActivities bigint NOT NULL,
    CONSTRAINT FKID_Activity_DailyActivities FOREIGN KEY (FKID_Activity_DailyActivities) REFERENCES Activity(ID_Activity),
    Date_DailyActivities date NOT NULL,
    AlreadyDone_DailyActivities bool NOT NULL
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
    Description_Exercise varchar(150) NOT NULL,
    Target_Exercise varchar(30) NOT NULL
);

create table RoutineExercise (
    ID_RoutineExercise bigint NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FKID_Routine_RoutineExercise bigint NOT NULL,
    CONSTRAINT FKID_Routine_RoutineExercise FOREIGN KEY (FKID_Routine_RoutineExercise) REFERENCES Routine(ID_Routine),
    FK_Exercise_RoutineExercise bigint NOT NULL,
    CONSTRAINT FK_Exercise_RoutineExercise FOREIGN KEY (FK_Exercise_RoutineExercise) REFERENCES Exercise(ID_Exercise),
    Reps_Exercise varchar(30) NOT NULL
);

create table WeightControl(
    ID_WeightControl bigint NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FKID_RoutineExercise_WeightControl bigint NOT NULL,
    CONSTRAINT FKID_RoutineExercise_WeightControl FOREIGN KEY (FKID_RoutineExercise_WeightControl) REFERENCES RoutineExercise(ID_RoutineExercise),
    Reps_WeightControl varchar(30) NOT NULL,
    Date_WeightControl timestamp NOT NULL
);

create table Recipe(
    ID_Recipe bigint NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FKID_User_Recipe bigint NOT NULL,
    CONSTRAINT FKID_User_Recipe FOREIGN KEY (FKID_User_Recipe) REFERENCES User(ID_User),
    Name_Recipe varchar(30) NOT NULL,
    Tags_Recipe varchar(50) NOT NULL,
    Preparation_Recipe text(1000) NOT NULL,
    Portions_Recipe varchar(15) NOT NULL
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
    CONSTRAINT FKID_Ingredient_RecipeIngredient FOREIGN KEY (FKID_Ingredient_RecipeIngredient) REFERENCES Ingredient(ID_Ingredient),
    Cuantity_RecipeIngredient varchar(50) NOT NULL
);

create table Achievement(
    ID_Achievement bigint NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FKID_User_Achievement bigint NOT NULL,
    CONSTRAINT FKID_User_Achievement FOREIGN KEY (FKID_User_Achievement) REFERENCES User(ID_User),
    Description_Achievement varchar(100) NOT NULL,
    StartDate_Achievement date NOT NULL,
    Completed_Achievement bool NOT NULL,
    FinishDate_Achievement date
);

create table Follow(
    ID_Follow bigint NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FKID_UserA_Follow bigint NOT NULL,
    CONSTRAINT FKID_UserA_Follow FOREIGN KEY (FKID_UserA_Follow) REFERENCES User(ID_User),
    FKID_UserB_Follow bigint NOT NULL,
    CONSTRAINT FKID_UserB_Follow FOREIGN KEY (FKID_UserB_Follow) REFERENCES User(ID_User)
);

create table UserWeight(
    ID_UserWeight bigint NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FKID_User_UserWeight bigint NOT NULL,
    CONSTRAINT FKID_User_UserWeight FOREIGN KEY (FKID_User_UserWeight) REFERENCES User(ID_User),
    Weight_UserWeight float NOT NULL,
    Date_UserWeight date NOT NULL
);

create table UserActivity(
    ID_UserActivity bigint NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FKID_Routine_UserActivity bigint,
    CONSTRAINT FKID_Routine_UserActivity FOREIGN KEY (FKID_Routine_UserActivity) REFERENCES Routine(ID_Routine),
    FKID_Recipe_UserActivity bigint,
    CONSTRAINT FKID_Recipe_UserActivity FOREIGN KEY (FKID_Recipe_UserActivity) REFERENCES Recipe(ID_Recipe),
    FKID_Achievement_UserActivity bigint,
    CONSTRAINT FKID_Achievement_UserActivity FOREIGN KEY (FKID_Achievement_UserActivity) REFERENCES Achievement(ID_Achievement),
    Type_UserActivity tinyint NOT NULL,
    Visibility tinyint NOT NULL
);

create table Post(
    ID_Post bigint NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FKID_UserActivity_Post bigint NOT NULL,
    CONSTRAINT FKID_UserActivity_Post FOREIGN KEY (FKID_UserActivity_Post) REFERENCES UserActivity(ID_UserActivity),
    FKID_User_Post bigint NOT NULL,
    CONSTRAINT FKID_User_Post FOREIGN KEY (FKID_User_Post) REFERENCES User(ID_User),
    FKID_Post_Post bigint,
    CONSTRAINT FKID_Post_Post FOREIGN KEY (FKID_Post_Post) REFERENCES Post(ID_Post),
    Info_Post varchar(250) NOT NULL,
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

ALTER TABLE User
ADD Color_User tinyint DEFAULT 0;

create table NONUSABLE(
    Word_NONUSABLE varchar(60)
);