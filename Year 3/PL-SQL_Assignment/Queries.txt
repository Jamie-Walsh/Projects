--Part 3: Queries--
--ALTER SESSION SET CURRENT_SCHEMA = dt2nn3_a8;

------------------------
--     SELECTION      --
------------------------
SELECT * FROM MOVIES;

--Showing lord of the rings showings for under 10 euro.
SELECT * FROM SHOWINGS WHERE(MOVIE_NAME= 'Lord of the Two Towers' AND PRICE_STANDARD < 10);

--showing customers that are allowed watch 18s movies.
SELECT UNIQUE(CUSTOMER_NAME) AS "Customers Over 18", 
DATE_OF_BIRTH AS "Date of Birth" FROM CUSTOMERS 
GROUP BY(CUSTOMER_NAME, DATE_OF_BIRTH) 
HAVING (DATE_OF_BIRTH <= ADD_MONTHS(SYSDATE, -(12 * 18)));

------------------------
--     PROJECTION     --
------------------------
SELECT CUSTOMER_NAME Name, LOYALTY_CARD_POINTS FROM CUSTOMERS;

SELECT UNIQUE(MOVIE_NAME) Title, RELEASE_DATE AS "Release Date"  FROM SHOWINGS JOIN MOVIES USING(MOVIE_NAME);

SELECT DISTINCT(CUSTOMER_ID) AS "Account Number", CUSTOMER_NAME Name FROM CUSTOMERS ORDER BY(CUSTOMER_ID);


------------------------
--     AGGRETION      --
------------------------
--Details useful for planning the time schedule, including the number of showings and average film length.
SELECT COUNT(UNIQUE(SCREEN_NUMBER)) AS "Number of Screens",
COUNT(SHOWING_ID) AS "Number of Showings", 
ROUND(AVG(MOVIE_LENGTH_MIN) ,0) AS "Average Length (mins)" FROM SCREENS
FULL OUTER JOIN SHOWINGS USING(SCREEN_NUMBER)
FULL OUTER JOIN MOVIES USING(MOVIE_NAME);

--Displaying the transactions between customers who've spent over 25 euro.
SELECT  UNIQUE(CUSTOMER_NAME), COUNT(CUSTOMER_NAME) AS "TICKETS BOUGHT", 
TICKET_TYPE, TOTAL_COST, BOOKING_REF FROM TICKETS
JOIN BOOKING USING(BOOKING_REF)
JOIN CUSTOMERS USING(CUSTOMER_ID)
WHERE (TOTAL_COST>25)
GROUP  BY (CUSTOMER_NAME, TICKET_TYPE, TOTAL_COST, BOOKING_REF)
ORDER BY (TOTAL_COST) DESC;

--Calculating the total income for week 5.
SELECT SUM(TOTAL_COST) AS "Week 5 Total Income" FROM BOOKING;

--Calculating the number of standard tickets in each screen using aggregation.
SELECT SCREEN_NUMBER AS "Screen Number", MAX(T_CAPACITY) AS "All Seats", P_CAPACITY AS "Premium Seats",
sum(T_CAPACITY - P_CAPACITY) AS "Standard" FROM SCREENS
GROUP BY (SCREEN_NUMBER, T_CAPACITY, P_CAPACITY)
ORDER BY (SCREEN_NUMBER) ASC;


------------------------
--       UNION        --
------------------------
--Displays showing times for people who wish to see either lord of the rings or the house of horrors.
SELECT MOVIE_NAME, SHOWING_TIME, DAY_SHOWING FROM SHOWINGS 
LEFT JOIN BOOKING USING(SHOWING_ID) 
WHERE(MOVIE_NAME = 'Lord of the Two Towers')

UNION

SELECT MOVIE_NAME, SHOWING_TIME, DAY_SHOWING FROM SHOWINGS 
LEFT JOIN BOOKING USING(SHOWING_ID) 
WHERE(MOVIE_NAME LIKE '%The House%');


------------------------
--        MINUS       --
------------------------
--Send discount codes by phone to customers who have points on their loyalty card.
SELECT CUSTOMER_NAME, PHONE_NUMBER, LOYALTY_CARD_POINTS FROM CUSTOMERS

MINUS

SELECT CUSTOMER_NAME, PHONE_NUMBER, LOYALTY_CARD_POINTS FROM CUSTOMERS 
WHERE (LOYALTY_CARD_POINTS < 1);


------------------------
--     DIFFERENCE     --
------------------------
???


------------------------
--     INNER JOIN     --
------------------------
--Shows movies that have sold tickets.
SELECT UNIQUE(MOVIE_NAME) FROM SHOWINGS
INNER JOIN BOOKING USING(SHOWING_ID);


------------------------
--     OUTER JOIN     --
------------------------
--Shows all screens, including ones not showing movies.
SELECT UNIQUE(SCREEN_NUMBER) FROM SHOWINGS
FULL OUTER JOIN SCREENS USING(SCREEN_NUMBER)
ORDER BY (SCREEN_NUMBER);


------------------------
--      SEMI-JOIN     --
------------------------ 
SELECT MOVIE_NAME  FROM MOVIES 
WHERE EXISTS (SELECT * FROM SHOWINGS WHERE SCREEN_NUMBER = 1);


------------------------
--      ANTI-JOIN     --
------------------------
--Shows movies that haven't been shown.
SELECT MOVIE_NAME ,DIRECTOR FROM MOVIES 
WHERE MOVIE_NAME NOT IN (SELECT MOVIE_NAME FROM SHOWINGS);

------------------------
--CORRELATED SUB-QUERY--
------------------------
--Find people who have payed more than average for their tickets.
SELECT UNIQUE(CUSTOMER_NAME) Name,CUSTOMER_ID, TOTAL_COST FROM CUSTOMERS
JOIN BOOKING USING(CUSTOMER_ID) 
WHERE TOTAL_COST > (SELECT AVG(TOTAL_COST) FROM BOOKING)
ORDER BY (CUSTOMER_ID);

