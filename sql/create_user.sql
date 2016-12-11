CREATE DATABASE IW32_Team;

-- 新しくユーザーを作成する
CREATE USER 'iw32'@'localhost' IDENTIFIED BY 'password';

-- 作成したユーザーに作成したデータベースの操作権限を付与する
GRANT ALL PRIVILEGES ON IW32_Team.* TO 'iw32'@'localhost';

-- 設定を反映する
FLUSH PRIVILEGES;
