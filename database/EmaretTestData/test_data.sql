delete from youth

insert into youth (active, first_name, last_name, home_phone, email, graduating_class, college_of_interest, career_aspirations,
		food_snacks, date_of_birth, other_ethnicity_text, ethnicities_id, genders_id, guardian_full_name, guardian_phone, guardian_email)
	values 	(1, 'Albert', 'Anderson', '442-222-3322', 'Pgarton@mail.greenriver.edu', 2021, 'UA', 'Doctor', 'Hot Dogs', '2003-02-02', null, 2, 2, 'Cindy Anderson', '253-111-1111', 'cindy@anderson.com'),
			(1, 'Betty', 'Boston', '552-222-3322', 'Dsloan4@mail.greenriver.edu', 2020, 'UB', 'Doctor', 'Ice Cream', '2002-07-02', '', 3, 3, 'Cindy Boston', '253-111-1111', 'Mark.jhonjohnathan@gmail.com'),
			(0, 'Chandra', 'Cox', '552-222-3322', 'Emaret2@mail.greenriver.edu', 2021, 'UC', 'Doctor', 'Chips', '2002-07-02', '', 4, 4, 'Cindy Cox', '253-111-1111', 'bill@cox.com'),
			(1, 'Donald', 'Doyle', '552-222-3322', 'Pgarton@mail.greenriver.edu', 2022, 'UD', 'Doctor', 'Fruit', '2002-07-02', '', 5, 3, 'Cindy Doyle', '253-111-1111', 'mark.jhonjohnathan@gmail.com'),
			(0, 'Elisabeth', 'Ellison', '552-222-3322', 'Dsloan4@mail.greenriver.edu', 2023, 'UE', 'Doctor', 'Soda', '2002-07-02', '', 6, 3, 'Cindy Ellison', '253-111-1111', 'cindy@ecker.com'),
			(1, 'Floyd', 'Franklin', '552-222-3322', 'Emaret2@mail.greenriver.edu', 2020, 'UF', 'Lawyer', 'Carrots', '2002-07-02', '', 7, 2, 'Cindy Franklin', '253-111-1111', 'cindy@franklin.com');
