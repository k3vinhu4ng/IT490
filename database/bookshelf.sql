create table BOOKSHELF (
	userid varchar(200),
       	BOOK_ID varchar(200),
       	BOOK JSON,
	PRIMARY KEY (userid, BOOK_ID)
);
