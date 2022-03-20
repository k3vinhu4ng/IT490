create table BOOKSHELF (
	userid varchar(200),
       	BOOK_ID varchar(200),
	LIKE_VALUE varchar(20),
       	BOOK JSON,
	PRIMARY KEY (userid, BOOK_ID)
);
