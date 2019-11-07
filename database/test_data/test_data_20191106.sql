-- use pbunyan_idaydream;
use idaydream;


SET FOREIGN_KEY_CHECKS = 0; 
truncate table volunteer_roles;
truncate table volunteer_references;
truncate table volunteers;
truncate table youth;
SET FOREIGN_KEY_CHECKS = 1;

insert into volunteers (first_name, last_name, home_phone, email, add_to_mailing_list, address1, address2, policy_agreement, city, zip_code, weekend_availability, 
	summer_camp_availability, other_role_text, background_check_agreement, shirt_sizes_id, states_code, lead_sources_id)
values ('Paul', 'Garton', '222-333-4444', 'paul@gmail.com', 1, '111 Main St', 'Apt. 101', 1, 'Auburn', 98002, 1, 1, 'other role text', 1, 4, 'WA', 2),
	   ('Dallas', 'Sloan', '805-333-4444', 'Dallas@gmail.com', 1, '111 Oak St', 'Apt. 201', 1, 'Kent', 98031, 1, 1, 'dallas role text', 1, 3, 'WA', 4),
	   ('Elijah', 'Maret', '360-333-4444', 'Elijah@gmail.com', 1, '111 Pine St', 'Apt. 301', 1, 'Black Diamond', 98015, 1, 1, 'Elijah role text', 1, 5, 'WA', 1);


insert into volunteer_references (full_name, phone_number, email, relationship, volunteers_id)
values ('Paul Ref1', '222-333-2222', 'pr1@gmail.com', 'Neighbor', 1),
('Paul Ref2', '222-333-2222', 'pr2@gmail.com', 'Son', 1),
('Paul Ref3', '222-333-2222', 'pr3@gmail.com', 'Colleague', 1),
('Dallas Ref1', '222-333-2222', 'dr1@gmail.com', 'Neighbor', 2),
('Dallas Ref2', '222-333-2222', 'dr2@gmail.com', 'Son', 2),
('Dallas Ref3', '222-333-2222', 'dr3@gmail.com', 'Colleague', 2),
('Elijah Ref1', '222-333-2222', 'er1@gmail.com', 'Neighbor', 3),
('Elijah Ref2', '222-333-2222', 'er2@gmail.com', 'Son', 3),
('Elijah Ref3', '222-333-2222', 'er3@gmail.com', 'Colleague', 3);


insert into volunteer_roles (volunteers_id, roles_id) values (1, 1), (1, 2), (1, 3), (2, 4), (2, 5), (2, 6), (3, 2), (3, 3), (3, 4);


insert into youth (first_name, last_name, home_phone, email, graduating_class, college_of_interest, 
	food_snacks, date_of_birth, other_gender_text, other_ethnicity_text, ethnicities_id, genders_id)
values ('Joe', 'Williams', '222-222-3322', 'joe@gmail.com', 2020, 'UW', 'Cheetos', '2002-02-02', 
	'other_gender_text', 'other_ethnicity_text', 1, 1),
 ('Maria', 'Lopez', '442-222-3322', 'maria@gmail.com', 2021, 'UW', 'Hot Dogs', '2003-02-02', 
	null, null, 2, 2),
('Manuel', 'Franklin', '552-222-3322', 'manuel@gmail.com', 2020, 'UW', 'Ice Cream', '2002-07-02', 
	'', '', 3, 3);















