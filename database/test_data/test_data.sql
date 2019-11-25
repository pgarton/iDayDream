SET FOREIGN_KEY_CHECKS = 0;
delete from youth;
SET FOREIGN_KEY_CHECKS = 1;

/*
-- ethnicities: 1-10
-- genders: 1-4

-- select * from ethnicities;
1	cd-native
2	cd-asian
3	cd-black
4	cd-hispanic
5	cd-mena
6	cd-islander
7	cd-seAsian
8	cd-white
9	cd-multi
10	cd-decline

-- select * from genders;

*/
insert into youth (first_name, last_name, home_phone, email, graduating_class, college_of_interest, career_aspirations,
		food_snacks, date_of_birth, other_ethnicity_text, ethnicities_id, genders_id, guardian_full_name, guardian_phone, guardian_email)
	values 	('Albert', 'Anderson', '(442) 222-3322', 'albert@gmail.com', 2021, 'UA', 'Doctor', 'Hot Dogs', '2003-02-02', null, 2, 2, 'Cindy Anderson', '(253) 111-1111', 'cindy@anderson.com'),
			('Betty', 'Boston', '(552) 222-3322', 'betty0@gmail.com', 2020, 'UB', 'Doctor', 'Ice Cream', '2002-07-02', '', 3, 3, 'Cindy Boston', '(253) 111-1111', 'cindy@boston.com'),
			('Chandra', 'Cox', '(552) 222-3322', 'chandra@gmail.com', 2021, 'UC', 'Doctor', 'Chips', '2002-07-02', '', 4, 4, 'Cindy Cox', '(253) 111-1111', 'bill@cox.com'),
			('Donald', 'Doyle', '(552) 222-3322', 'donald@gmail.com', 2022, 'UD', 'Doctor', 'Fruit', '2002-07-02', '', 5, 3, 'Cindy Doyle', '(253) 111-1111', 'cindy@doyle.com'),
			('Elisabeth', 'Ellison', '(552) 222-3322', 'elisabeth@gmail.com', 2023, 'UE', 'Doctor', 'Soda', '2002-07-02', '', 6, 3, 'Cindy Ellison', '(253) 111-1111', 'cindy@ecker.com'),
			('Floyd', 'Franklin', '(552) 222-3322', 'floyd@gmail.com', 2020, 'UF', 'Lawyer', 'Carrots', '2002-07-02', '', 7, 2, 'Cindy Franklin', '(253) 111-1111', 'cindy@franklin.com'),
			('Gilda', 'Geitner', '(552) 222-3322', 'gilda@gmail.com', 2021, 'UG', 'Lawyer',  'Gum', '2002-07-02', '', 8, 1, 'Cindy Geitner', '(253) 111-1111', 'cindy@geitner.com'),
			('Harris', 'Hart', '(552) 222-3322', 'harris@gmail.com', 2022, 'UH', 'Lawyer',  'Candy', '2002-07-02', '', 9, 2, 'Cindy Hart', '(253) 111-1111', 'cindy@hart.com'),
			('Imelda', 'Irving', '(552) 222-3322', 'imelda@gmail.com', 2023, 'UI', 'Lawyer',  'Ice Cream', '2002-07-02', 'Filipino/Samoan', 10, 3, 'Cindy Irving', '(253) 111-1111', 'cindy@irving.com'),
			('Johnny', 'Johnson', '(552) 222-3322', 'johnny@gmail.com', 2020, 'UJ', 'Lawyer',  'Cereal', '2002-07-02', '', 11, 4, 'Cindy Johnson', '(253) 111-1111', 'cindy@johnson.com'),
			('Keisha', 'King', '(552) 222-3322', 'keisha@gmail.com', 2021, 'UK', 'Lawyer',  'Chips', '2002-07-02', '', 8, 3, 'Bill King', '(253) 111-1111', 'bill@king.com'),
			('Lawrence', 'Lawson', '(552) 222-3322', 'lawrence@gmail.com', 2022, 'UL', 'Lawyer',  'Fruit', '2002-07-02', '', 7, 2, 'Bill Lawson', '(253) 111-1111', 'bill@lawson.com'),
			('Mary', 'Matthews', '(552) 222-3322', 'mary@gmail.com', 2023, 'UM', 'Police Chief',  'Jello', '2002-07-02', '', 6, 1, 'Bill Matthews', '(253) 111-1111', 'bill@matthews.com'),
			('Norbert', 'Nelson', '(552) 222-3322', 'norbert@gmail.com', 2020, 'UN', 'Police Chief',   'Chips', '2002-07-02', '', 5, 2, 'Bill Nelson', '(253) 111-1111', 'bill@nelson.com'),
			('Olivia', 'Olson', '(552) 222-3322', 'olivia@gmail.com', 2021, 'UO', 'Police Chief',   'Yogurt', '2002-07-02', '', 4, 3, 'Bill Olson', '(253) 111-1111', 'bill@olson.com'),
			('Peter', 'Peterson', '(552) 222-3322', 'peter@gmail.com', 2022, 'UP', 'Police Chief',   'Spinach', '2002-07-02', '', 3, 4, 'Bill Peterson', '(253) 111-1111', 'bill@perterson.com'),
			('Queenie', 'Quigley', '(552) 222-3322', 'queenie@gmail.com', 2023, 'UQ', 'Police Chief',   'Popcorn', '2002-07-02', '', 2, 3, 'Bill Quigley', '(253) 111-1111', 'bill@quigley.com'),
			('Ronald', 'Robertson', '(552) 222-3322', 'ronald@gmail.com', 2021, 'UR', 'Police Chief',   'Candy', '2002-07-02', '', 1, 2, 'Bill Robertson', '(253) 111-1111', 'bill@robertson.com'),
			('Sally', 'Sears', '(552) 222-3322', 'sally@gmail.com', 2022, 'US', 'Police Chief',   'Burgers', '2002-07-02', '', 2, 1, 'Bill Sears', '(253) 111-1111', 'bill@sears.com');


SET FOREIGN_KEY_CHECKS = 0;
delete from volunteers;
SET FOREIGN_KEY_CHECKS = 1;

insert into volunteers values (null, true, 'Alex', 'Anderson', '(253) 111-1111', 'alex@gmail.com', true, '111 Apple St', 'Apt. 1', true, 'Tacoma', 98188, 1, 1, 'Other Role Text', true, 'WA', 1, 1, now(), now());
insert into volunteers values (null, true, 'Betty', 'Benjamin', '(253) 111-1111', 'betty@gmail.com', false, '111 Apple St', 'Apt. 1', false, 'Tacoma', 98188, 0, 1, 'Other Role Text', true, 'WA', 1, 1, now(), now());
insert into volunteers values (null, true, 'Charlie', 'Cicarello', '(253) 111-1111', 'charlie@gmail.com', false, '111 Apple St', 'Apt. 1', true, 'Tacoma', 98188, 1, 1, 'Other Role Text', true, 'WA', 1, 1, now(), now());
insert into volunteers values (null, true, 'Doris', 'Davis', '(253) 111-1111', 'doris@gmail.com', true, '111 Apple St', 'Apt. 1', false, 'Tacoma', 98188, 0, 0, 'Other Role Text', true, 'WA', 1, 1, now(), now());
insert into volunteers values (null, true, 'Edward', 'Edwards', '(253) 111-1111', 'edward@gmail.com', true, '111 Apple St', 'Apt. 1', true, 'Tacoma', 98188, 1, 0, 'Other Role Text', true, 'WA', 1, 1, now(), now());
insert into volunteers values (null, true, 'Fran', 'Francis', '(253) 111-1111', 'fran@gmail.com', false, '111 Apple St', 'Apt. 1', false, 'Tacoma', 98188, 0, 0, 'Other Role Text', true, 'WA', 1, 1, now(), now());
insert into volunteers values (null, true, 'Grant', 'Griggs', '(253) 111-1111', 'grant@gmail.com', false, '111 Apple St', 'Apt. 1', true, 'Tacoma', 98188, 1, 1, 'Other Role Text', true, 'WA', 1, 1, now(), now());
insert into volunteers values (null, true, 'Helen', 'Hopewell', '(253) 111-1111', 'helen@gmail.com', true, '111 Apple St', 'Apt. 1', false, 'Tacoma', 98188, 0, 1, 'Other Role Text', true, 'WA', 1, 1, now(), now());
insert into volunteers values (null, true, 'Igor', 'Ignatowski', '(253) 111-1111', 'igor@gmail.com', false, '111 Apple St', 'Apt. 1', true, 'Tacoma', 98188, 1, 0, 'Other Role Text', true, 'WA', 1, 1, now(), now());
insert into volunteers values (null, true, 'Janet', 'Jackson', '(253) 111-1111', 'janet@gmail.com', true, '111 Apple St', 'Apt. 1', false, 'Tacoma', 98188, 0, 0, 'Other Role Text', true, 'WA', 1, 1, now(), now());
insert into volunteers values (null, true, 'Kyle', 'King', '(253) 111-1111', 'kyle@gmail.com', false, '111 Apple St', 'Apt. 1', true, 'Tacoma', 98188, 1, 1, 'Other Role Text', true, 'WA', 1, 1, now(), now());
insert into volunteers values (null, true, 'Lina', 'Lazurus', '(253) 111-1111', 'lina@gmail.com', true, '111 Apple St', 'Apt. 1', false, 'Tacoma', 98188, 0, 0, 'Other Role Text', true, 'WA', 1, 1, now(), now());

truncate table volunteer_references;

insert into volunteer_references values (null, 1, true, 'Alice Anderson', '(253) 111-1111', 'alice@gmail.com', 'Friend', now(), now());
insert into volunteer_references values (null, 1, true, 'Bruno Boston', '(253) 111-1111', 'bruno@gmail.com', 'Friend', now(), now());
insert into volunteer_references values (null, 1, true, 'Cicci Ciccone', '(253) 111-1111', 'cicci@gmail.com', 'Friend', now(), now());
insert into volunteer_references values (null, 2, true, 'Darren Darby', '(253) 111-1111', 'darren@gmail.com', 'Friend', now(), now());
insert into volunteer_references values (null, 2, true, 'Edgar Elfman', '(253) 111-1111', 'edgar@gmail.com', 'Friend', now(), now());
insert into volunteer_references values (null, 2, true, 'Fran Franklin', '(253) 111-1111', 'fran@gmail.com', 'Friend', now(), now());
insert into volunteer_references values (null, 3, true, 'Gino Gigantus', '(253) 111-1111', 'gino@gmail.com', 'Friend', now(), now());
insert into volunteer_references values (null, 3, true, 'Henrietta Hanson', '(253) 111-1111', 'henrietta@gmail.com', 'Friend', now(), now());
insert into volunteer_references values (null, 3, true, 'Iggy Ikeman', '(253) 111-1111', 'iggy@gmail.com', 'Friend', now(), now());
insert into volunteer_references values (null, 3, true, 'Janice Jenner', '(253) 111-1111', 'janice@gmail.com', 'Friend', now(), now());

insert into volunteer_roles values (null, true, 1, 1, now(), now());
insert into volunteer_roles values (null, true, 1, 3, now(), now());
insert into volunteer_roles values (null, true, 1, 5, now(), now());
insert into volunteer_roles values (null, true, 2, 2, now(), now());
insert into volunteer_roles values (null, true, 2, 4, now(), now());
insert into volunteer_roles values (null, true, 2, 6, now(), now());
insert into volunteer_roles values (null, true, 3, 1, now(), now());
insert into volunteer_roles values (null, true, 3, 2, now(), now());
insert into volunteer_roles values (null, true, 3, 3, now(), now());
insert into volunteer_roles values (null, true, 3, 4, now(), now());
insert into volunteer_roles values (null, true, 3, 5, now(), now());
