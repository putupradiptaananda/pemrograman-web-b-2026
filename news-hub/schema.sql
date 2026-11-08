create database news_hub character set	utf8mb4 collate utf8mb4_0900_ai_ci;
use news_hub;

create table users (
	usr_id				int auto_increment primary key,
    usr_username 		varchar(50) not null unique,
    usr_password_hash 	varchar(255) not null,
    usr_user_role 		enum('admin', 'user') not null default 'user',
    usr_create_date		datetime default current_timestamp
);

create table news (
	news_id				int auto_increment primary key,
    news_title			varchar(255) not null,
    news_category		varchar(50) not null,
    news_content		text not null,
    news_author_id		int not null,
    news_create_date	datetime default current_timestamp
);


-- Dummy 
INSERT INTO users (usr_username, usr_password_hash, usr_user_role)
VALUES ('admin', '$2y$10$L67MkKvGPWfCMA.B2tu0Der6msj1i8qRBwNwB.dnw00GO1RsuFnlG', 'admin');
    
INSERT INTO news (news_title, news_category, news_content, news_author_id)
VALUES 
('Selamat Datang di News Hub', 'Nasional', 'Ini berita contoh pertama.', 1),
('PHP 8.4 Dirilis', 'Teknologi', 'Fitur baru PHP 8.4...', 1),
('Timnas Menang', 'Olahraga', 'Skor akhir 2-1...', 1);
