-- auto-generated definition
create table users
(
    id           int auto_increment
        primary key,
    first_name   varchar(128) not null,
    last_name    varchar(128) null,
    email        varchar(255) null,
    mobile_phone varchar(20)  null,
    password     varchar(255) null,
    constraint users__uk_email
        unique (email)
);

