create table followers (
	id integer,
	user_id integer,
	follower_id integer,
	primary key (id),
	foreign key (user_id, follower_id) references users(id)
		on delete set null
);

create table following (
	id integer,
	user_id integer,
	following_id integer,
	primary key (id),
	foreign key (user_id, following_id) references users(id)
		on delete set null
);

create table posts (
	id integer,
	image varchar(),
	description varchar(128),
	comments integer,
	datetime DATE,
	primary key (id),
	foreign key (comments) references comments(id)
		on delete set null 
);

create table comments (
	id integer,
	post_id integer,
	user_id integer,
	comment varchar(128),
	datetime DATE,
	primary key (id),
	foreign key (post_id) references posts(id)
		on delete set null,
	foreign key (user_id) references users(id)
		on delete set null
);