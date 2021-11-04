create table banners
(
    id          int auto_increment
        primary key,
    page_url    text                               not null,
    ip_address  text                               not null,
    user_agent  text                               not null,
    views_count int      default 1                 null,
    view_date   datetime default CURRENT_TIMESTAMP null
)
    charset = latin1;

INSERT INTO testovoe.banners (id, page_url, ip_address, user_agent, views_count, view_date) VALUES (1, 'asfasdf', '12123', 'asfdasdf', 1, '2021-11-04 18:35:16');
INSERT INTO testovoe.banners (id, page_url, ip_address, user_agent, views_count, view_date) VALUES (2, '/banner.php', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 8, '2021-11-04 14:19:18');
INSERT INTO testovoe.banners (id, page_url, ip_address, user_agent, views_count, view_date) VALUES (3, 'http://testovoe.loc/index.html', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 1, '2021-11-04 14:19:34');
INSERT INTO testovoe.banners (id, page_url, ip_address, user_agent, views_count, view_date) VALUES (4, 'http://testovoe.loc/index2.html', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 2, '2021-11-04 14:20:41');
