--Part 1: Create and insert in to tables.--
/*drop table tickets ;
drop table booking ;
drop table showings ;
drop table screens ;
drop table customers ;
drop table movies ;

drop sequence customer_id_sequence;
drop sequence showing_id_sequence;
drop sequence booking_ref_sequence;
drop sequence ticket_id_sequence;

create table movies
(
movie_name varchar2(100) primary key, 
movie_length_min int,
release_date date,
director varchar2(50),
pegi_rating varchar(3),

check (pegi_rating in ('U','PG','12+','15+','16+','18+'))
);

CREATE SEQUENCE customer_id_sequence START WITH 1 INCREMENT BY 1;

create table customers
(
customer_id int default customer_id_sequence.nextval primary key,
customer_name varchar2(50),
date_of_birth date,
credit_card_num varchar2(16),
phone_number varchar2(16),
loyalty_card_points int default 0

);

create table screens
(
screen_number int primary key,
t_capacity int,
p_capacity int
);

create sequence showing_id_sequence START WITH 1 INCREMENT BY 1;

create table showings
(
showing_id int default showing_id_sequence.nextval primary key,
screen_number int, 
showing_time varchar2(5),
showing_week int,
movie_name varchar2(100),
price_standard int,
price_premium int,

check (showing_week <= 52),
check (showing_week >= 0),
foreign key (screen_number) references screens(screen_number),
foreign key (movie_name) references movies(movie_name)
);

create sequence booking_ref_sequence START WITH 1 INCREMENT BY 1;

create table booking
(
booking_ref int default booking_ref_sequence.nextval primary key,
customer_id int,
showing_id int,
total_cost int,

foreign key (customer_id) references customers(customer_id),
foreign key (showing_id) references showings(showing_id)
);

create sequence ticket_id_sequence START WITH 1 INCREMENT BY 1;

create table tickets
(
ticket_number int default ticket_id_sequence.nextval primary key,
booking_ref int,
seat_number varchar2(3),
ticket_type char,

foreign key (booking_ref) references booking(booking_ref),
check (ticket_type in ('p','s'))
);

insert into screens (screen_number,t_capacity,p_capacity) values (1,250,65);
insert into screens (screen_number,t_capacity,p_capacity) values (2,150,40);
insert into screens (screen_number,t_capacity,p_capacity) values (3,75,20);
insert into screens (screen_number,t_capacity,p_capacity) values (4,250,65);
insert into screens (screen_number,t_capacity,p_capacity) values (5,150,40);
insert into screens (screen_number,t_capacity,p_capacity) values (6,75,20);
insert into screens (screen_number,t_capacity,p_capacity) values (7,250,65);
insert into screens (screen_number,t_capacity,p_capacity) values (8,150,40);
insert into screens (screen_number,t_capacity,p_capacity) values (9,75,20);
insert into screens (screen_number,t_capacity,p_capacity) values (10,200,55);

insert into movies (movie_name,movie_length_min,release_date,director, pegi_rating) values ('Lord of the Two Towers',120,'05-DEC-2002','Peter Jackson','12+');
insert into movies (movie_name,movie_length_min,release_date,director, pegi_rating) values ('The Importance of being Earnest',110,'08-APR-2008','Ernest Hemmingway','U');
insert into movies (movie_name,movie_length_min,release_date,director, pegi_rating) values ('Einstein''s big adventure',90,'09-DEC-2012','Elsa Einstein','U');
insert into movies (movie_name,movie_length_min,release_date,director, pegi_rating) values ('The House of Horrors',120,'07-NOV-2018','M knight Shamalon','15+');
insert into movies (movie_name,movie_length_min,release_date,director, pegi_rating) values ('Beautiful Horizons',120,'09-JAN-2017','Uve Bol','12+');
insert into movies (movie_name,movie_length_min,release_date,director, pegi_rating) values ('Marion and Michelle',150,'12-DEC-2012','William Shakesphere','18+');

insert into customers(customer_name,date_of_birth,credit_card_num,phone_number,loyalty_card_points) values('Jamie Walsh','02-Dec-1998','4319129088765490','0851369012','0');
insert into customers(customer_name,date_of_birth,credit_card_num,phone_number,loyalty_card_points) values('Liam McCormick','14-Feb-1998','4319213299990121','0871298780','0');
insert into customers(customer_name,date_of_birth,credit_card_num,phone_number,loyalty_card_points) values('Killian Waldron','20-Jan-1997','4319909667565690','0864565541','0');
insert into customers(customer_name,date_of_birth,credit_card_num,phone_number,loyalty_card_points) values('Michael Mouse','09-Mar-1927','4319883345451209','0890061007','0');
insert into customers(customer_name,date_of_birth,credit_card_num,phone_number,loyalty_card_points) values('Daffington Duckworth','20-Nov-2001','4319900087651234','0871321212','0');
insert into customers(customer_name,date_of_birth,credit_card_num,phone_number,loyalty_card_points) values('Ian Cup','14-Jan-2000','4319208123347510','0854178903','0');
insert into customers(customer_name,date_of_birth,credit_card_num,phone_number,loyalty_card_points) values('Asap Rocky','14-Mar-1998','4319123456789101','0869901765','0');
insert into customers(customer_name,date_of_birth,credit_card_num,phone_number,loyalty_card_points) values('Bugsander Bunny','14-Aug-1999','4319908766554543','0851538291','0');
insert into customers(customer_name,date_of_birth,credit_card_num,phone_number,loyalty_card_points) values('Timmy Turner','14-Jun-2010','4319134457800989','0831120987','0');
insert into customers(customer_name,date_of_birth,credit_card_num,phone_number,loyalty_card_points) values('Itchy Scratchy','14-Jul-1950','4319454322134690','0891298780','0');

insert into Showings(screen_number,showing_time,showing_week,movie_name,price_standard,price_premium) values(1,'12:30', 5, 'Lord of the Two Towers', '8', '11');
insert into Showings(screen_number,showing_time,showing_week,movie_name,price_standard,price_premium) values(2,'17:00', 5, 'The Importance of being Earnest', '9', '13');
insert into Showings(screen_number,showing_time,showing_week,movie_name,price_standard,price_premium) values(1,'20:45', 5, 'Marion and Michelle', '10', '15');
insert into Showings(screen_number,showing_time,showing_week,movie_name,price_standard,price_premium) values(3,'11:30', 5, 'The House of Horrors', '8', '11');
insert into Showings(screen_number,showing_time,showing_week,movie_name,price_standard,price_premium) values(2,'18:15', 5, 'Beautiful Horizons', '10', '15');
insert into Showings(screen_number,showing_time,showing_week,movie_name,price_standard,price_premium) values(1,'21:00', 5, 'Lord of the Two Towers', '10', '15');
insert into Showings(screen_number,showing_time,showing_week,movie_name,price_standard,price_premium) values(3,'10:00', 5, 'Marion and Michelle', '8', '11');
insert into Showings(screen_number,showing_time,showing_week,movie_name,price_standard,price_premium) values(2,'12:45', 5, 'The House of Horrors', '8', '11');
insert into Showings(screen_number,showing_time,showing_week,movie_name,price_standard,price_premium) values(1,'16:30', 5, 'Lord of the Two Towers', '9', '13');
insert into Showings(screen_number,showing_time,showing_week,movie_name,price_standard,price_premium) values(3,'20:00', 5, 'Beautiful Horizons', '10', '15');
insert into Showings(screen_number,showing_time,showing_week,movie_name,price_standard,price_premium) values(2,'19:30', 5, 'The Importance of being Earnest', 10,15);
insert into Showings(screen_number,showing_time,showing_week,movie_name,price_standard,price_premium) values(1,'20:15', 5, 'Marion and Michelle',10,15);
insert into Showings(screen_number,showing_time,showing_week,movie_name,price_standard,price_premium) values(2,'21:30', 5, 'Lord of the Two Towers',10,15);
insert into Showings(screen_number,showing_time,showing_week,movie_name,price_standard,price_premium) values(3,'22:00', 5, 'The House of Horrors', 10,15);
*/ 

--Part 2: PL/SQL Transaction--
--Available in "PL-SQL_Movies.txt" & "PL-SQL_Showings.txt"

--Part 3: Queries--

-- (1-3)SELECTION, PROJECTION, AGGREGATION --
SELECT * FROM SHOWINGS WHERE(MOVIE_NAME= 'Lord of the Two Towers' AND PRICE_STANDARD < 10);

--(3) AGGRETION--
SELECT COUNT(SHOWING_ID) AS "Number of Showings", 
ROUND(AVG(MOVIE_LENGTH_MIN) ,0) AS "Average Length (mins)" FROM SHOWINGS
FULL OUTER JOIN MOVIES USING(MOVIE_NAME);

SELECT  UNIQUE(CUSTOMER_NAME), COUNT(CUSTOMER_NAME) AS "TICKETS BOUGHT", TICKET_TYPE, TOTAL_COST, BOOKING_REF FROM TICKETS
JOIN BOOKING USING(BOOKING_REF)
JOIN CUSTOMERS USING(CUSTOMER_ID)
WHERE (TOTAL_COST>25)
GROUP  BY (CUSTOMER_NAME, TICKET_TYPE, TOTAL_COST, BOOKING_REF)
ORDER BY (TOTAL_COST);

