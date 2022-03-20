create table BOOKSHELF1 (
	userid varchar(200),
       	TITLE varchar(500),
	IMAGE varchar(1000),
	DESCRIPTION varchar(3000),
	GENRE varchar(200),	
	LIKE_VALUE varchar(20),
       	
	PRIMARY KEY (userid, TITLE)
);
