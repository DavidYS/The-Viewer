DROP DATABASE IF EXISTS Viewer;
CREATE DATABASE Viewer;
USE Viewer;
CREATE TABLE Users(User_Id int primary key AUTO_INCREMENT,First_Name char(30),Last_Name char(30),password char(30),email char(50),description_id int);
INSERT INTO Users VALUES (1,'David','Ghiurau','123456','email@email.com',1);
CREATE TABLE Details(
	Description_Id int primary key AUTO_INCREMENT,
	User_ID int,
	foreign key (User_ID) references Users(User_ID),
	First_Name char(30),
	Last_Name char(30),
	data char(30),
	gender char(50), 
	address char(50), 
	occupation char(30), 
	skills char(25), 
	phone char(20),
	email char(30), 
	description char(200), 
	language char(5));

INSERT INTO Details VALUES (1,1,'David','Ghiurau', '03/09/1998', 'Male', 'Street','Student', 'None','0757820XXX', 'ghiurau.david98@yahoo.com','Lorem ipsum sit dolor amet','Romanian');

CREATE TABLE `FeedBack` (
  `FeedID` int(100) NOT NULL primary key AUTO_INCREMENT,
  `Feedback` char(250) 
);
CREATE TABLE `movies` (
  `MovieID` int(100) NOT NULL primary key AUTO_INCREMENT,
  `Director` varchar(25) NOT NULL,
  `Title` varchar(25) NOT NULL,
  `Type` varchar(25) NOT NULL
);

INSERT INTO `movies` (`MovieID`, `Director`, `Title`, `Type`) VALUES
(1, 'Director', 'Title ', 'Genre'),
(2, 'Frank Darabont', 'The Shawshank Redemption', 'Drama'),
(3, 'Francis Ford Coppola', 'The Godfather', 'Crime'),
(4, 'Francis Ford Coppola', 'The Godfather: Part II', 'Crime'),
(5, 'Christopher Nolan', 'The Dark Knight', 'Action'),
(6, 'Sidney Lumet', '12 Angry Men', 'Drama'),
(7, 'Steven Spielber', "Schindler's List", 'Biography'),
(8, 'Quentin Tarantino', 'Pulp Fiction', 'Drama'),
(10, 'Sergio Leone', 'The Good, the Bad and the Ugly', 'Western'),
(11, 'David Fincher', 'Fight Club', 'Drama'),
(12, 'Robert Zemeckis', 'Forrest Gump', 'Romance'),
(13, 'Christopher Nolan', 'Inception', 'Sci-Fi'),
(14, 'Martin Scorsese', 'Goodfellas', 'Crime'),
(15, 'Lana Wachowski', 'The Matrix', 'Sci-Fi'),
(16, 'Akira Kurosawa', 'Seven Samurai', 'Adventure'),
(17, 'Fernando Meirelles', 'City of God', 'Drama'),
(18, 'David Fincher', 'Se7en', 'Mystery'),
(19, 'Jonathan Demme', 'The Silence of the Lambs', 'Thriller'),
(20, 'Frank Capra', "It's a Wonderful Life", 'Fantasy'),
(21, 'Roberto Benigni', 'Life Is Beautiful', 'War'),
(22, 'Stanley Kubrick', 'The Shining', 'Horror'),
(23, 'Andrew Stanton', 'Walle-E', 'Animation'),
(24, 'Christopher Nolan', 'The Dark Knight Rises', 'Action'),
(25, 'Hayao Miyazaki', 'Princess Mononoke', 'Fantasy'),
(26, 'James Cameron', 'Aliens', 'Adventure'),
(27, 'Chan-Wook Park', 'OldBoy', 'Mystery'),
(28, 'Sergio Leone', 'Once Upon a Time in America', 'Crime'),
(29, 'Billy Wilder', 'Witness for the Prosecution', 'Drama'),
(30, 'Wolfgang Petersen', 'Das Boot', 'Adventure'),
(31, 'Orsen Welles', 'Citizen Kane', 'Drama'),
(32, 'Alfred Hitchcock', "North by Northwest", 'Action'),
(33, 'Alfred Hitchcock', 'Vertigo', 'Romance'),
(34, 'Quentin Tarantino', 'Reservoir Dogs', 'Drama'),
(35, 'Mel Gibson', 'Braveheart', 'Biography'),
(36, 'Fritz Lang', 'M', 'Crime'),
(37, 'Darren Aronofsky', 'Requiem for a Dream', 'Drama'),
(38, 'Jean-Pierre Jeunet', 'Amelie', 'Comedy'),
(39, 'Stanley Kubrick', 'A Clockwork Orange', 'Crime'),
(40, 'Aamir Khan', 'Like Stars on Earth', 'Music'),
(41, 'Martin Scorsese', 'Taxi Driver', 'Crime'),
(42, 'David Lean', 'Lawrence of Arabia', 'Drama'),
(43, 'Billy Wilder', "Double Indemnity", 'Crime'),
(44, 'Michel Gondry', 'Eternal Sunshine of the Spotless Mind', 'Romance'),
(45, 'Nitesh Tiwari', 'Dangal','Biography');