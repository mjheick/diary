# Diary

A sql-backed diary built in php.

Everyone has a diary. Mine happens to be here.

# Pages

## index.php

Standard landing page.

## preface.php

An explantion as to how this came into being

## diary.php

A diary, in [Madly, Deeply](https://www.amazon.com/dp/1250847958) format.

# Usage

- configure.php to set up variables
- edit preface.php to give your explanation/viewpoint

# mysql

Creating a table that supports emojis and special characters with advice from [stackoverflow](https://stackoverflow.com/questions/39463134/how-to-store-emoji-character-in-mysql-database):

```
CREATE TABLE `diary` (
   `pk` INT UNSIGNED NOT NULL AUTO_INCREMENT,
   `entry_date` DATE NOT NULL,
   `entry_time` TIME NOT NULL,
   `entry` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
   PRIMARY KEY (`pk`)
) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_bin;
```

