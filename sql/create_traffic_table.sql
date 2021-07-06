create table if not exists traffic
(
    ip char(50) not null,
    user_agent varchar(255) not null,
    view_date datetime not null,
    page_url varchar(100) not null,
    views_count int not null,
    constraint traffic_ip_user_agent_page_url_uindex
        unique (ip, user_agent, page_url)
);
