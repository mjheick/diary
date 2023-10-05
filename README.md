# Diary

A sql-backed diary built in php.

Everyone has a diary. Mine happens to be here.

# Pages

## index.php

A diary, in [Madly, Deeply](https://www.amazon.com/dp/1250847958) [format](https://www.theguardian.com/film/2022/sep/24/alan-rickmans-secret-showbiz-diaries-harry-potter).

```
2000
23 August
6.30pm Pile into the car and drive to Siena to get to Il Campo before dark. To the Patio Bar where, around 8pm, I called LA and said OK to HP [Harry Potter].

24 August
Around the pool and feeling a bit nothing about HP which really disturbs me – or is it because I’m reading Martin Amis’s Experience which charts A Life …
```

# mysql

Creating a table that supports emojis and special characters with advice from [stackoverflow](https://stackoverflow.com/questions/39463134/how-to-store-emoji-character-in-mysql-database):

```
CREATE TABLE `diary` (
   `pk` INT UNSIGNED NOT NULL AUTO_INCREMENT,
   `entry_time` DATETIME NOT NULL,
   `entry` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
   PRIMARY KEY (`pk`)
) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_bin;
```

# todo

- implement diary_entries_per_page configuration option. currently diary dumps all to screen
- Subscribed/notify email hook for new entries, crossposting to wordpress?
