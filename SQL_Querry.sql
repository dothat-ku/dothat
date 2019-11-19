create	table users (
	id SERIAL not null,
	username varchar(64) not null,
	password varchar(108) not null,
	email varchar (128) not null,
	phone varchar (128) null,
	birthday varchar (45) null,
	joined timestamp,
	profile_picture varchar(256) null,
	posts integer null,
	followers integer null,
	following integer null,
	status varchar(64) null,
	primary key(id)
);
create table followers (
	id SERIAL,
	user_id integer,
	follower_id integer,
	primary key (id),
	foreign key (user_id) references users(id)
		on delete set null,
	foreign key (follower_id) references users(id)
		on delete set null

);
create table following (
	id SERIAL,
	user_id integer,
	following_id integer,
	primary key (id),
	foreign key (user_id) references users(id)
		on delete set null,
	foreign key (following_id) references users(id)
		on delete set null
);	
create table posts (
	id SERIAL,
	user_id integer,
	image varchar(256),
	description varchar(960),
	comments integer,
	post_time timestamp,
	primary key (id),
	foreign key (user_id) references users(id)
		on delete set null
);
create table comments (
	id SERIAL,
	post_id integer,
	user_id integer,
	comment varchar(704),
	post_time timestamp,
	primary key (id),
	foreign key (post_id) references posts(id)
		on delete set null,
	foreign key (user_id) references users(id)
		on delete set null
);
create table blacklist (
	id SERIAL,
	ip varchar (15)	
);

drop table comments;
drop table posts;
drop table following;
drop table followers;
drop table users;
drop table blacklist;
