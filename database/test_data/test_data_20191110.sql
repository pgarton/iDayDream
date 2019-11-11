use paulsbun_idaydream;
-- use idaydream;


SET FOREIGN_KEY_CHECKS = 0; 
truncate table youth;
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
insert into youth (first_name, last_name, home_phone, email, graduating_class, college_of_interest, 
	food_snacks, date_of_birth, other_gender_text, other_ethnicity_text, ethnicities_id, genders_id)
values 	('Joe', 'Williams', '222-222-3322', 'joe@gmail.com', 2020, 'UW', 'Cheetos', '2002-02-02','', 'other_ethnicity_text', 10, 1),
		('Maria', 'Lopez', '442-222-3322', 'maria@gmail.com', 2021, 'UW', 'Hot Dogs', '2003-02-02', null, null, 2, 2),
		('Manuel0', 'Franklin0', '552-222-3322', 'manuel0@gmail.com', 2020, 'UW', 'Ice Cream', '2002-07-02', '', '', 3, 3),
        ('Manuel1', 'Franklin0', '552-222-3322', 'manuel1@gmail.com', 2020, 'UW', 'Ice Cream', '2002-07-02', '', '', 4, 4),
        ('Manuel2', 'Franklin0', '552-222-3322', 'manuel2@gmail.com', 2020, 'UW', 'Ice Cream', '2002-07-02', '', '', 5, 3),
        ('Manuel3', 'Franklin0', '552-222-3322', 'manuel3@gmail.com', 2020, 'UW', 'Ice Cream', '2002-07-02', '', '', 6, 3),
        ('Manuel4', 'Franklin0', '552-222-3322', 'manuel4@gmail.com', 2020, 'UW', 'Ice Cream', '2002-07-02', '', '', 7, 2),
        ('Manuel5', 'Franklin0', '552-222-3322', 'manuel5@gmail.com', 2020, 'UW', 'Ice Cream', '2002-07-02', '', '', 8, 1),
        ('Manuel6', 'Franklin0', '552-222-3322', 'manuel6@gmail.com', 2020, 'UW', 'Ice Cream', '2002-07-02', '', '', 9, 2),
        ('Manuel7', 'Franklin0', '552-222-3322', 'manuel7@gmail.com', 2020, 'UW', 'Ice Cream', '2002-07-02', '', 'Filipino/Somoan', 10, 3),
        ('Manuel8', 'Franklin0', '552-222-3322', 'manuel8@gmail.com', 2020, 'UW', 'Ice Cream', '2002-07-02', '', '', 11, 4),
        ('Manuel9', 'Franklin0', '552-222-3322', 'manuel9@gmail.com', 2020, 'UW', 'Ice Cream', '2002-07-02', '', '', 8, 3),
        ('Michael0', 'Wilson0', '552-222-3322', 'michael0@gmail.com', 2020, 'UW', 'Ice Cream', '2002-07-02', '', '', 7, 2),
        ('Manuel1', 'Wilson1', '552-222-3322', 'michael1@gmail.com', 2020, 'UW', 'Ice Cream', '2002-07-02', '', '', 6, 1),
        ('Manuel2', 'Wilson2', '552-222-3322', 'michael2@gmail.com', 2020, 'UW', 'Ice Cream', '2002-07-02', '', '', 5, 2),
        ('Manuel3', 'Wilson3', '552-222-3322', 'michael3@gmail.com', 2020, 'UW', 'Ice Cream', '2002-07-02', '', '', 4, 3),
        ('Manuel4', 'Wilson4', '552-222-3322', 'michael4@gmail.com', 2020, 'UW', 'Ice Cream', '2002-07-02', '', '', 3, 4),
        ('Manuel5', 'Wilson5', '552-222-3322', 'michael5@gmail.com', 2020, 'UW', 'Ice Cream', '2002-07-02', '', '', 2, 3),
        ('Manuel6', 'Wilson6', '552-222-3322', 'michael6@gmail.com', 2020, 'UW', 'Ice Cream', '2002-07-02', '', '', 1, 2),
        ('Manuel7', 'Wilson7', '552-222-3322', 'michael7@gmail.com', 2020, 'UW', 'Ice Cream', '2002-07-02', '', '', 2, 1),
        ('Manuel8', 'Wilson8', '552-222-3322', 'michael8@gmail.com', 2020, 'UW', 'Ice Cream', '2002-07-02', '', '', 3, 2)
        ;
        
        
      
        
        
